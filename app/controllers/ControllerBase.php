<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {

    }

    /** 警告，不记录日志
     * @param null $message
     * @param int $state
     * @param string $data
     */
    public function actionResultWarn($message=null,$state=0,$data=''){
        $this->jsonExit(Utils::ActionResult($state,$message,$data));
    }

    public function jsonExit($value){
        $this->view->disable();
        Utils::SetHeaderContentTypeJson();
        echo $value;
        exit(0);
    }

    /*
     * 验证码验证
     * @param string $validcode
     */
    public function validateCode($validcode,$sessionName){
        $validCode = $this->request->getPost($validcode);
        if (!isset($validCode) || empty($validCode)){
            $message = '验证码不能为空';
            $this->actionResultWarn($message);
            exit(0);
        }

        //获取$session上验证码
        $validCode1 = $this->session->get($sessionName);
        if (strcasecmp($validCode,$validCode1) != 0){
            $this->session->remove($sessionName);
            $message = '验证码错误，请重新输入';
            $this->actionResultWarn($message);
            exit(0);
        }
    }


}
