<?php
/**
 * Created by PhpStorm.
 * User: hzq
 * Date: 2018/7/1
 * Time: 17:07
 */

class CommonController extends ControllerBase
{
   public function initialize()
   {
        parent::initialize();
   }

   //验证码
   public function valicateAction($name = 'validationcode', $oLen = 4, $oType = 'NUMBER', $oWidth = 66, $oHeight = 44, $oFontSize = 16, $x = 14, $y = 15)
   {
       $this->view->disable();
       $validate = new ValidateCode();
       $validate->GetValidateImg($name, $oLen, $oType, $oWidth, $oHeight, $oFontSize, $x, $y);
   }


}