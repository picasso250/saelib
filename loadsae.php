<?php

// storage
define( 'SAE_STOREHOST', 'http://stor.sae.sina.com.cn/storageApi.php' );
define('SAE_STORAGE_STORAGE_DIR',$SAEStorage.DIRECTORY_SEPARATOR.'storage'); //ccc
define('VCODE_HOST','127.0.0.1:'.HTTP_PORT.'/sae/vcode.php') ;
define('XHPROF_HOST', '/vendor/xhprof/xhprof_html/index.php') ;
define('STORAGE_HOST','127.0.0.1:'.HTTP_PORT.'/storage') ;

define('SAE_MYSQL_DB', 'app_'.$_SERVER['HTTP_APPNAME']);

define('SAE_TMP_PATH', $SAEStorage.DIRECTORY_SEPARATOR.'tempstorage';

define( 'SAE_APPNAME', $_SERVER['HTTP_APPNAME'] );
define( 'SAE_APPVERSION', $_SERVER['HTTP_APPVERSION']);
define('SAE_ACCESSKEY', 'sae');
define('SAE_SECRETKEY', 'sae');


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

function sae_xhprof_start()
{
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

function sae_xhprof_end()
{
    $xhprof_data = xhprof_disable();
    $appname = get_appname() ;
    $XHPROF_ROOT = __DIR__ .'/vendor/xhprof';
    include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
    include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";
    $xhprof_runs = new XHProfRuns_Default();
    
    // save raw data for this profiler run using default
    // implementation of iXHProfRuns.
    $xhprof_runs = new XHProfRuns_Default();

    // save the run under a namespace "appname"
    $run_id = $xhprof_runs->save_run($xhprof_data, $appname);
    echo "---------------\n".
     "Assuming you have set up the http based UI for \n".
     "XHProf at some address, you can view run at \n".
     "<a href=\"http://".XHPROF_HOST."?run=$run_id&source=$appname\">http://".XHPROF_HOST."?run=$run_id&source=$appname</a> \n".
     "---------------\n";
}
