<?php
/**
 * 参照__env.php建议，按己所需，重新定制特性
 */
$hostname = substr( ($h = $_SERVER['HTTP_HOST']), 0, (false !== ($pos = strpos($h, ':')) ? $pos : strlen($h)) );
$hostSuffix = preg_replace('/.*\.(phphub\.dev|dev\.larele\.com)$/i', '$1', $hostname);
switch ($hostSuffix) {
    //以下使用本地
	case '127.0.0.1':
	case 'localhost':
    case 'phphub.dev': //绑定本地hosts
	    {
	        define('DI_ROUTE_REWRITE', true);
	        break;
	    }

	case 'dev.larele.com'://linode tokyo
    	{
    	    define('DI_DEBUG_MODE', false);
    	    define('DI_IO_RWFUNC_ENABLE', true);
    	    define('DI_ROUTE_REWRITE', true);
    	    break;
    	}
	default:die;//环境不明确，终止执行
}


define('DI_SMARTY_DEFAULT', false);//暂时所有环境不默认采用smarty
define('DI_KILL_ON_FAIL_REWRITE', true);