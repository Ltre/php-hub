<?php
/**
 * 配置数据库基本信息
 * 【！！强烈建议！！】
 * 不要将本文件中的外网数据库信息提交
 */
$hostname = substr( ($h = $_SERVER['HTTP_HOST']), 0, (false !== ($pos = strpos($h, ':')) ? $pos : strlen($h)) );
$hostSuffix = preg_replace('/.*\.(phphub\.dev|dev\.larele\.com)$/i', '$1', $hostname);
if (in_array($hostSuffix, array(
    '127.0.0.1',
    'localhost',
    'phphub.dev',//绑定本地HOSTS
))){
	
    class DIDBConfig {
        static $driver = 'DIMySQL';//驱动类
        static $host = '127.0.0.1';
        static $port = 3306;
        static $db = 'phphub';
        static $user = 'root';
        static $pwd = 'ltre';
        static $table_prefix = 'ph_';//表前缀
    }
    class DIMMCConfig {
        static $domain = 'phphub';
        static $host = '127.0.0.1';
        static $port = 11211;
    }
    
} elseif (in_array($hostname, array(
    'dev.larele.com'
))) {
    
    class DIDBConfig {
        static $driver = 'DIMySQL';//驱动类
        static $host = 'localhost';
        static $port = 3306;
        static $db = '';
        static $user = '';
        static $pwd = '';
        static $table_prefix;//表前缀
    }
    class DIMMCConfig {
        static $domain = 'doinject';
        static $host;
        static $port;
    }
    
} else {
    
    die;//环境不明确，终止
    
}