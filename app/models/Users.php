<?php
/**
 * Created by PhpStorm.
 * User: smcg
 * Date: 2018/7/4
 * Time: 21:37
 */
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\Regex;

class Users extends \Phalcon\Mvc\Model
{
    /*
     * @var int id
     */
    public $id;
    /*
     * @var string user_id 用户id
     */
    public $user_id;
    /*
     * @var string username 用户名
     */
    public $username;
    /*
     * @var string rel_name 全名
     */
    public $rel_name;
    /*
     * @var string password 用户密码
     */
    public $password;
    /*
     * @var string draw_password 现金操作密码
     */
    public $draw_password;
    /*
     * @money decimal money 用户金额
     */
    public $money;
    /*
     * @var string idcard 证件号
     */
    public $idcard;
    /*
     * @var string qq
     */
    public $qq;
    /*
     * @var string mobile 手机号
     */
    public $mobile;
    /*
     * @var string email 邮箱
     */
    public $email;
    /*
     * @var string register_ip 注册ip
     */
    public $register_ip;
    /*
     * @var string reg_time 注册时间
     */
    public $reg_time;
    /*
     * @var string last_login_ip 最后登录ip
     */
    public $last_login_ip;
    /*
     * @var datetime last_login_time 最后登录时间
     */
    public $last_login_time;
    /*
     * @var string father_id 上级id
     */
    public $father_id;
    /*
     * @var int enable 用户状态 0-禁用，1-启用，2-锁定
     */
    public $enable=0;
    /*
     * @var string remark 备注
     */
    public $remark;
    /*
     * @var int reg_from 注册来源 0-自主注册，1-推荐注册，2-后台添加
     */
    public $reg_from;
    /*
     * @var string validate_key 用户敏感数据加密密匙
     */
    public $validate_key;
    /*
     * @add_time datetime add_time 新建记录时间
     */
    public $add_time;

    /*
     * initialize()在请求期间仅被调用一次
     */
    public function initialize(){
        $this->setSource('u_users');
    }

    /**
     * 加密登录密码
     * @param string $password
     * @return string
     */
    public function createPassword($password)
    {
        return md5($this->username . $password);
    }

    /*
     * onConstruct() 在实例被创建的时候单独进行初始化
     */
    public function onConstruct()
    {

    }

    //映射到 u_users 表
    public function getSource()
    {
        return 'u_users';
    }

    public function validation()
    {
        $this->validate(
            new Uniqueness(
                array(
                    "field" => "username",
                    "message" => "用户名已存在"
                )
            )
        );
        return $this->validationHasFailed() != true;
    }

    public function beforeValidationOnCreate()
    {

    }

    public function beforeSave()
    {
//        echo '数据保存前';
    }


    /**
     * 查询后置方法
     * 获取记录的初始化以及准备
     * 从数据库中获取了一条记录之后,自动调用，可以为某些字段做处理
     */
    public function afterFetch()
    {
        $this->remark = '查询后操作';
    }

    /**
     * 生成用户加密密钥
     * @return string
     */
    public function createValidateKey()
    {
        return md5(time() . $this->username);
    }

}