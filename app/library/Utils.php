<?php

/**
 * Created by PhpStorm.
 * User: hzq
 * Date: 2018/2/1
 * Time: 23:27
 */
class Utils
{
    //设置json的content-type
    public static function setHeaderContentTypeJson()
    {
        header('Content-type: application/json');
    }

    public static function ActionResultError($state, $message, $data)
    {
        $arr = array(
            "state" => $state,
            "msg" => $message,
            "data" => empty($data) ? '' : $data
        );
        header("errorjson:" . json_encode(json_encode($arr)));
        exit(0);
    }

    /**
     * 获取客户端IP地址
     * @return string
     */
    public static function getIP()
    {
        if (isset($_SERVER['HTTP_X_REAL_IP'])) {    //nginx 代理模式下，获取客户端真实IP
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } else if (getenv('HTTP_CLIENT_IP')) {  //客户端的ip
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {     //浏览当前页面的用户计算机的网关
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];  //浏览当前页面的用户计算机的ip地址
        }
        if (empty($ip)) return $ip;
        $ips = explode(",", $ip);
        return $ips[0];
    }

    /**
     * 客户端Ajax请求返回Json格式信息
     * @param $state 1 表示操作成功，非1：表示操作失败 ,其它参数自定义
     * @param $message 操作成功或失败信息
     * @param $data 操作成功返回数据集（json格式
     * @return json
     */
    public static function ActionResult($state, $message, $data)
    {
        $arr = array(
            "state" => $state,
            "msg" => $message,
            "data" => empty($data) ? '' : $data
        );
        return json_encode($arr);
    }

    /**
     * 获取uuid
     * @return string
     */
    public static function getUniqid()
    {
        $rand_id = rand(10000, 50000);
        return uniqid() . $rand_id;
        //return uniqid().rand(1, 10000);
//        return uniqid(rand(1, 10000));
    }

    //var_dump
    public static function dump($content)
    {
        echo '<pre style="color:red">--------------</br>';
        var_dump($content);
        echo '-------------------</pre>';
    }
}