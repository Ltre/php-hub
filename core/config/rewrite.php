<?php
class DIRouteRewrite {
    
    /**
     * 自定义路由重写规则
     * 书写原则，特殊在前，通用在后
     * 详见：
     *      DIRoute::rewrite() @ __route.php
     */
    static $rulesMap;
    
    /**
     * 不需要重写的
     * 左侧为相对于脚本目录的URI
     * 右侧表示重写失败时是否终止程序
     * 这些规则不受常量DI_KILL_ON_FAIL_REWRITE影响
     */
    static $withoutMap = array(
        'index.php' => false,
        'index.html' => false,
        'index.htm' => false,
        'favicon.ico' => true,
    	'robots.txt' => true,
    );
    
}


//以下代码为适应泛解析而配置，和原框架代码有所不同
$hostname = substr( ($h = $_SERVER['HTTP_HOST']), 0, (false !== ($pos = strpos($h, ':')) ? $pos : strlen($h)) );
$hostPrefix = preg_replace('/(.*)\.(phphub\.dev|dev\.larele\.com)$/i', '$1', $hostname);

DIRouteRewrite::$rulesMap = array(
    "://{$hostPrefix}.phphub.dev" => 'hub/start',
    "://{$hostPrefix}.dev.larele.com" => 'hub/start',
    '://phphub.dev' => 'main/start',
    '://dev.larele.com' => 'main/start',
);

DIRouteRewrite::$rulesMap += array(
    's' => 'shell.shell',
    's.html' => 'shell.shell',
    
    '<D>' => '<D>/start',
    '<D>.htm' => '<D>/start',
    '<D>.html' => '<D>/start',
    
    '<nums>' => 'test/start/<nums>',
     
    '<D>/<F>' => '<D>/<F>',
    '<D>-<F>' => '<D>/<F>',
    '<A>.<B>' => '<A>.<B>',
    '<A>.<B>.<C>' => '<A>.<B>.<C>',
);
