<?php
/**
 * Created by PhpStorm.
 * User: hzq
 * Date: 2018/7/1
 * Time: 16:39
 */

if(!isset($_SESSION)){ session_start(); }
header("Content-type: image/gif");

/*
 * 生成验证码
 */
class ValidateCode{
    function __construct(){
    }

    /** 定制验证码
     * @param null $oLen 要显示的字符的个数
     * @param null $oType 数字/字符/数字和字符
     * @param null $oWidth 生成图像的宽度
     * @param null $oHeight 生成图像的高度
     * @param null $oFontSize 图像字体大小
     * @param null $x 文字的X坐标
     * @param null $y 文字的Y坐标
     */
    function  GetValidateImg($sessionName,$oLen, $oType, $oWidth, $oHeight, $oFontSize, $x, $y)
    {
        $_SESSION[$sessionName]=null;
        $type = 'gif';
        $width = isset($oWidth) ? $oWidth  : 60;
        $height =  isset($oHeight) ? $oHeight  : 20;
        $fontsize = isset($oFontSize) ? $oFontSize  : 10;
        $x = isset($x) ? $x  : 10;
        $y = isset($y) ? $y  : 2;
        srand ( ( double ) microtime () * 1000000 );
        $randval = $this->randStr ( $oLen==null ? 4 :$oLen, $oType==null ? 'NUMBER' :$oType );
        if ($type != 'gif' && function_exists ( 'imagecreatetruecolor' )) {
            $im = @imagecreatetruecolor ( $width, $height );
        } else {
            $im = @imagecreate ( $width, $height );
        }
        $r = Array (
            225,
            211,
            255,
            223
        );
        $g = Array (
            225,
            236,
            237,
            215
        );
        $b = Array (
            225,
            236,
            166,
            125
        );
        $key = rand ( 0, 3 );
        $backColor = ImageColorAllocate ( $im, $r [$key], $g [$key], $b [$key] );
        $borderColor = ImageColorAllocate ( $im, 0, 0, 0 );
        $pointColor = ImageColorAllocate ( $im, 255, 170, 255 );
        @imagefilledrectangle ( $im, 0, 0, $width - 1, $height - 1, $backColor );
        @imagerectangle ( $im, 0, 0, $width - 1, $height - 1, "" );
        $stringColor = ImageColorAllocate ( $im, 555, 51, 153 );
        for($i = 0; $i <= 100; $i ++) {
            $pointX = rand ( 2, $width - 2 );
            $pointY = rand ( 2, $height - 2 );
            @imagesetpixel ( $im, $pointX, $pointY, $pointColor );
        }

        @imagestring($im, $fontsize, $x, $y, $randval, $stringColor);
        $ImageFun = 'Image' . $type;
        $ImageFun ( $im );
        @ImageDestroy ( $im );
        $_SESSION [$sessionName] = $randval;
        echo '';
    }
    function randStr($len = 6, $format = 'NUMBER') {
        switch ($format) {
            case 'ALL' :
                $chars = '0123456789';
                break;
            case 'CHAR' :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'NUMBER' :
                $chars = '0123456789';
                break;
            case 'NUMBERCHAR':
                $chars = '012DEFGHIJKLM3456RSTU789ABCNOPQVWXYZ';
                break;
            default :
                $chars = '0123456789';
                break;
        }
        $string = "";
        while ( strlen ( $string ) < $len )
            $string .= substr ( $chars, (mt_rand () % strlen ( $chars )), 1 );
        return $string;
    }

}