<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/27
 * Time: 9:56
 */

class RedisHelper
{
    protected $_redis = null;
    protected $opencluster = true; //集成
    private $_host;
    private $_port;
    private $_pwd;
    private $_timeout;
    private $_nodes;

    public function __construct(FrontendInterface $frontend, $options = null)
    {
        if (!extension_loaded('redis')) {
            exit('服务器不支持redis扩展');
        }
        $this->_connect();
    }

    /**
     * Create internal connection to redis
     */
    public function _connect()
    {
        try{
            $frontCache = new \Phalcon\Cache\Frontend\Data(array(
                "lifetime" => 600 //1d * 24h * 60m * 60s = 86400s
            ));
            $cacheOptions=array(
                //"prefix" => "api_cache_model_",
                "host" => App::CACHE_HOST,
                "port" => App::CACHE_PORT,
                // "auth" => (CACHE_PASSWORD&&CACHE_PASSWORD!="")?CACHE_PASSWORD:null,
                "statsKey"=>App::CACHE_DB_FLAG,
                "persistent" => true,
                "cluster"=>App::CACHE_USECLUSTER,
                "prefix"=>"__".App::CACHE_DB_FLAG."__",
                "second_prefix"=>App::CLIENT_NAME,
            );

        }catch (Exception $e){
            throw new Exception($e);
            return false;
        }
        return true;
    }

}