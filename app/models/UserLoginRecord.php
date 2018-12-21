<?php
/**
 * Created by PhpStorm.
 * User: hzq
 * Date: 2018/8/16
 * Time: 23:04
 */
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\Regex;

class UserLoginRecord extends \Phalcon\Mvc\Model{
    /*
     * var int aid
     */
    public $aid;
    /*
     * var string user_id 用户id
     */
    public $user_id;
    /*
     * var string login_time_day 登陆时间只存日期格式
     */
    public $login_time_day;
    /*
     * var datetime login_time 登录时间
     */
    public $login_time;
    /*
     * var string user_name 用户名
     */
    public $user_name;
    /*
     * var string login_ip  登录ip
     */
    public $login_ip;
    /*
     * var string login_area 登录地区(登录ip对应的地址)
     */
    public $login_area;
    /*
     * var string login_terminal 登录终端：0-h5,1-android,2-iphone,3-web
     */
    public $login_terminal;
    /*
     * var string enter 登录入口：1-游戏大厅，2-Promotion
     */
    public $enter;

    public function initialize(){
        $this->setSource('log_user_login');
    }
    //映射到 u_users 表
    public function getSource()
    {
        return 'log_user_login';
    }
    public function beforeCreate(){
        if (!isset($this->login_area) || empty($this->login_area)){
            $this->login_area = '中国';
        }
        if (!isset($this->login_terminal) || empty($this->login_terminal)){
            $this->login_terminal = 0;
        }
        if (!isset($this->enter) || empty($this->enter)){
            $this->enter =1;
        }
    }
}