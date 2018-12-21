<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * @name 权限安全插件
 * @require 需要Acl|Event|Dispatcher|Session|Flash
 * @auth hzq
 */
class SecurityPlugin extends Plugin
{
    //公共权限（无需登录也能访问）
    private function get_public_resource()
    {
        return array(
            'index' => array('index','dosomething'),
            'common' => array('valicate'),
            'errors' => array('show404','show_noplugin'),
            'goods' => array('index','products','detail'),
            'user' => array('login','regist','pw_1','pw_2','pw_3','test'),
            'order' => array('index','detail','submit')
        );
    }

    //私有权限（需登录）
    private function get_private_resources()
    {
        return array(
            'user' => array('index','login','register','userinfo')
        );
    }

    //验证私有权限
    private function validated_private_resources($controller,$action)
    {
        $private_resources = $this->get_private_resources();
        $actions = $private_resources[$controller];
        if (isset($actions) == false) return false;
        return in_array($action,$actions);
    }

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl()
    {
        //throw new \Exception("something");
        //以下是权限的缓存,修改的时候取消注释
        $this->persistent->destroy();
        if (!isset($this->persistent->acl)) {
            //实例化Acl
            $acl = new Phalcon\Acl\Adapter\Memory();
            //设置默认权限（禁止）
            $acl->setDefaultAction(Phalcon\Acl::DENY);

            $roles = array(
                "users" => new Phalcon\Acl\Role('Users'),
                "guests" => new Phalcon\Acl\Role('Guests')
            );
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            //Private area resources
            $privateResources = $this->get_private_resources();
            foreach ($privateResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            //Public area resources
            $publicResources = $this->get_public_resource();
            foreach ($publicResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            //Grant access to public areas to both users and
            foreach ($roles as $role) {
                foreach ($publicResources as $resource => $actions) {
                    foreach ($actions as $action) {
                        $acl->allow($role->getName(), $resource, $action);
                    }
                }
            }

            //Grant acess to private area to role Users
            foreach ($privateResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('Users', $resource, $action);
                }
            }

            //The acl is stored in accounts, APC would be useful here too
            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        //Check whether the "auth" variable exists in session to define the ative role
        $auth = $this->session->get('auth');
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        if (!$auth){
            $role = 'Guests';
        } else {
            $this->loginTimeout($controller, $action,true);
            $role = 'Users';
        }

        //Take the active controller/action from the dispatcher
        $acl = $this->getAcl();
        $allowed = $acl->isAllowed($role, $controller, $action);

        if ($allowed != Acl::ALLOW){
            if ($role != 'Users'){
                $allowedUsers = $acl->isAllowed('Users', $controller, $action);
                if ($allowedUsers == Acl::ALLOW){
                    $this->view->disable();
                    $this->flash->error('登录账户失效，为了您的账号安全，请重新登录!');exit(0);
                }

            }else{
//                if ($action == 'clearcache' && $controller == 'admin') {
//                    $this->persistent->destroy();
//                    CacheManage::clear();
//                    $this->logout_action($controller, $action, 401.16);
//                    exit(0);
//                }
            }

            if ($role == 'Users') {
                $validated_reslut = $this->validated_private_resources($controller, $action);
                if ($validated_reslut) {
                    $this->persistent->destroy();
//                    CacheManage::clear();
                    return true;
                }
            }

            $this->forward('errors/show_noplugin');
//            $this->flash->error('您无权限进入该模块，请联系系统管理员！');exit(0);
//            Utils::ActionResultError('403', '您无权限进入该模块，请联系系统管理员！!', null);
        }
    }

    /*
     *会员登录时间检查，长时间没操作强制掉线
     */
    public function loginTimeout($controller, $action, $activeExpireTime = true)
    {

    }

    /*
     *系统自动退出会员账号
     */
    private function logout_action($controller, $action, $msg = '保障您的账户安全，闲置过久系统自动退出，请重新登录。')
    {
        $this->clearSession();
        if ($controller == 'index' && $action == 'index') {
            $location = "location: /index/login";
            header($location);
            exit(0);
        } elseif ($controller == 'admin' && $action == 'clearcache') {
            header("location: /");
            exit(0);
        } else {
            Utils::SetHeaderContentTypeJson();
            Utils::ActionResultError('401.1', $msg, null);
        }
    }

    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
        return $this->dispatcher->forward(
            array(
                'controller' => $uriParts[0],
                'action' => $uriParts[1],
                'params' => $params
            )
        );
    }
}