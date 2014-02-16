<?php

define('SAE_ACCESSKEY', 'sae');
define('SAE_SECRETKEY', 'sae');

// font style
define("SAE_Italic",2);
define("SAE_Oblique",3);


// font name
define("SAE_SimSun",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_SimKai",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_SimHei",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_Arial",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_MicroHei",__DIR__.DIRECTORY_SEPARATOR.'wqy-microhei.ttc');

// anchor postion
define("SAE_TOP_LEFT","tl");
define("SAE_TOP_CENTER","tc");
define("SAE_TOP_RIGHT","tr");
define("SAE_CENTER_LEFT","cl");
define("SAE_CENTER_CENTER","cc");
define("SAE_CENTER_RIGHT","cr");
define("SAE_BOTTOM_LEFT","bl");
define("SAE_BOTTOM_CENTER","bc");
define("SAE_BOTTOM_RIGHT","br");

// errno define
define("SAE_Success", 0); // OK
define("SAE_ErrKey", 1); // invalid accesskey or secretkey
define("SAE_ErrForbidden", 2); // access fibidden for quota limit
define("SAE_ErrParameter", 3); // parameter not exist or invalid
define("SAE_ErrInternal", 500); // internal Error
define("SAE_ErrUnknown", 999); // unknown error

//redis app number
define("APP_NUMBER",10) ;

define('SAE_Font_Sun',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_Kai',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_Hei', __DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_MicroHei',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');

/**
 * Sae基类
 * 
 * STDLib的所有class都应该继承本class,并实现SaeInterface接口  
 *
 * @author Easychen <easychen@gmail.com>
 * @version $Id$
 * @package sae
 * @ignore
 */
/**
 * SaeObject
 *
 * @package sae
 * @ignore
 */


abstract class SaeObject implements SaeInterface
{
  function __construct()
  {
    // 
  }
}
/**
 * SaeInterface , public interface of all sae client apis
 *
 * all sae client classes must implement these method for setting accesskey and secretkey , getting error infomation.
 * @package sae
 * @ignore
 **/

interface SaeInterface
{
  public function errmsg();
  public function errno();
  public function setAuth( $akey , $skey );
}

function get_appname()
{
  return $_SERVER['HTTP_APPNAME'] ;
}

function get_app_version()
{
  return $_SERVER['HTTP_APPVERSION'] ;
}
