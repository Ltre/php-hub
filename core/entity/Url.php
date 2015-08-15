<?php
class Url {
    
    static function getVariableDomain(){
        $hostname = substr( ($h = $_SERVER['HTTP_HOST']), 0, (false !== ($pos = strpos($h, ':')) ? $pos : strlen($h)) );
        $hostPrefix = preg_replace('/(.*)\.(phphub\.dev|dev\.larele\.com)$/i', '$1', $hostname);
        return $hostPrefix;
    }
    
}