<?php
/**
 * Created by PhpStorm.
 * User: smcg
 * Date: 2018/7/5
 * Time: 10:00
 */

//使用 OpenSSL的 php扩展对密码进行加密
class AesHelper
{
    const CIPHER = 'AES-128-CBC';   //加密方式 string
    const OPTIONS = OPENSSL_RAW_DATA;  //options (int) 是以下标记的按位或 ：OPENSSL_RAW_DATA 、OPENSSL_ZERO_PADDING

    /*
     * Aes加密
     * @data    待加密数据
     * @key     加密密匙
     * @cipher  加密方式
     */
    public static function encrypt($data, $key, $cipher = 'AES-128-CBC',$optins = self::OPTIONS)
    {
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $encrypt_data_raw = openssl_encrypt($data, $cipher, $key, $optins, $iv);
        $hmac = hash_hmac('sha256', $encrypt_data_raw, $key, $as_binary=true);
        $encrypt_data = base64_encode( $iv.$hmac.$encrypt_data_raw );
        return $encrypt_data;
    }

    /*
     * AES解密
     * @data    待解密数据
     * @key     加密密匙
     */
   public static function decrypt($data,$key,$cipher = 'AES-128-CBC',$optins = self::OPTIONS)
   {
       $decode_data = base64_decode($data);
       $ivlen = openssl_cipher_iv_length($cipher);
       $iv = substr($decode_data, 0, $ivlen);
       $hmac = substr($decode_data, $ivlen, $sha2len=32);
       $decode_data_raw = substr($decode_data, $ivlen+$sha2len);
       $original_data = openssl_decrypt($decode_data_raw, $cipher, $key, $optins, $iv);
       $calcmac = hash_hmac('sha256', $decode_data_raw, $key, $as_binary=true);
       if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
       {
            return $original_data;
       }
   }

}