<?php
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;

class UserController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->tag->setTitle('会员中心');
        $this->view->title = '会员中心';
        $this->view->current_controller = $this->router->getControllerName();
        $this->view->current_action = empty($this->router->getActionName()) ? 'index' : $this->router->getActionName();
    }

    /*
     * 验证post数据
     */
    public function validatePostData($post_data,$validate_qq=false,$validate_email=false)
    {
        $validateData = new Validation();

        //用户名验证
        $validateData
            ->add('username',new PresenceOf(array(
            'message' => '用户名不能为空',
            'cancelOnFail' => true
        )))
            ->add('username',new Regex(array(
                'message' => '用户名包含无效字符',
                'pattern' => '/^[u4e00-u9fa5a-zA-Z0-9_]{1}[\w]{1,29}$|^\w+([-+.\']\w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*$/i'
            )));

        //密码验证
        $validateData
            ->add('password',new PresenceOf(array(
            'message' => '用户密码不能为空',
            'cancelOnFail' => true
        )))
            ->add('password',new Regex(array(
                'message' => '密码为6-22数字或字母组合',
                'pattern' => '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,22}$/'
            )));

        if ($validate_qq){
            //QQ验证
            $validateData
                ->add('qq',new Regex(array(
                    'message' => '请输入正确格式的QQ号',
                    'pattern' => '/^[1-9][0-9]{4,11}$/'
                )));
        }

        if ($validate_email){
            //QQ验证
            $validateData
                ->add('email',new Regex(array(
                    'message' => 'email地址格式不正确，请重新输入',
                    'pattern' => '/^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/'
                )));
        }

        $messages = $validateData->validate($post_data);
        if (count($messages)){
            foreach ($messages as $message){
                $this->actionResultWarn($message->getMessage());
            }
        }

    }

    public function indexAction()
    {

    }

    //会员登录
    public function loginAction()
    {
        if ($this->request->isPost()){
            $this->view->disable();
//            $this->session->start();
            $username = $this->request->getPost('username','trim');
            $password = $this->request->getPost('password','trim');
            if (!isset($username) || empty($username)){
//                $this->actionResultWarn('用户名不能为空');
//                exit(0);
            }
            if (!isset($password) || empty($password)){
//                $this->actionResultWarn('密码不能为空');
//                exit(0);
            }
            //            $this->validateCode('logvc','logvc');   //验证码验证
            $parameters = array(
                'username' => $username
            );
            $user = Users::findFirst(array(
                'username = :username:',
                'bind' => $parameters
            ));
            if (!$user || empty($user)){
                $this->actionResultWarn('用户名或密码错误');
                exit(0);
            }
            if ($user->enable != 1){
                if ($user->enable == 0){
                    $this->actionResultWarn('用户状态异常，请联系管理员处理');
                    exit(0);
                } elseif($user->enable == 2){
                    $this->actionResultWarn('用户被锁定，请联系管理员处理');
                    exit(0);
                }
            }
            $user_password = md5($username.$password);
            if ($user_password !== $user->password){
                $this->actionResultWarn('密码错误，请重新输入');
                exit(0);
            }
            $ip = Utils::getIP();
            $user->last_login_ip = $ip;
            $user->last_login_time = date('Y-m-d H:i:s',time());
            $result = $user->save();
            if ($result){
                //登录日志
                $user_login_record = new UserLoginRecord();
                $user_login_record->user_id = $user->user_id;
                $user_login_record->login_time_day = date("Y-m-d H:i:s",time());
                $user_login_record->login_time = time();
                $user_login_record->user_name = $user->username;
                $user_login_record->login_ip = $ip;
                $result1 = $user_login_record->save();
            }

            $this->session->set($user->username,$user);

            $aaa = $this->session->get($user->username);
            var_dump($aaa);exit();

            $this->actionResultWarn('登录成功');

        } else {
            $this->tag->setTitle('登录中心');
            $this->view->title = '会员中心';
        }
    }

    //会员注册
    public function registAction()
    {
        if($this->request->isPost()){
            $this->view->disable();
            $this->validateCode('validcode_reg','regvc');  //开发过程先关闭验证功能
            //用户、密码验证
            $post_data = $this->request->getPost();
            $this->validatePostData($post_data);  //开发过程先关闭验证功能
            $username = $this->request->getPost('username','trim');
            $password = $this->request->getPost('password','trim');
            $confirm_password = $this->request->getPost('confirm_password','trim');
            $parameters = array(
                'username' => $username
            );

            $reg_users = Users::find(array(
                'username = :username:',
                'bind' => $parameters
            ))->toArray();

            if (count($reg_users)){
                $this->actionResultWarn('用户名已存在');
            }

            if ($password != $confirm_password ){
                $this->actionResultWarn('两次密码不一致');
            }

            $time = date('Y-m-d H:i:s',time());
            $users = new Users();
            $reg_data = array();
            $reg_data['user_id'] = Utils::getUniqid();
            $reg_data['username'] = $username;
            $reg_data['password'] = md5($username.$password);
            $reg_data['register_ip'] = Utils::getIP();
            $reg_data['reg_time'] = $time;
            $reg_data['enable'] = 1;
            $reg_data['reg_from'] = 0;
            $reg_data['validate_key'] = $users->createValidateKey();
            $reg_data['add_time'] = $time;
            $result = $users->create($reg_data);

            if (!$result){
                //添加记录失败，获取错误信息
                $errorMessage = implode(',', $users->getMessages());
                $this->actionResultWarn($errorMessage);
                exit();
            } else {
                $message = '注册成功';
                $state = 1;
                $this->actionResultWarn($message,$state);
            }
        }else{
            $this->tag->setTitle('会员注册');
            $this->view->title = '会员中心';
        }

    }

    //会员注册
    public function pw_1Action()
    {
        $this->tag->setTitle('会员注册');
        $this->view->title = '会员中心';
    }

    //会员注册
    public function pw_2Action()
    {
        $this->tag->setTitle('会员注册');
        $this->view->title = '会员中心';
    }
    //会员注册
    public function pw_3Action()
    {
        $this->tag->setTitle('会员注册');
        $this->view->title = '会员中心';
    }
}