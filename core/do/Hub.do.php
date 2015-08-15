<?php
/**
 * Sub Domain
 * @author Ltre<ltrele@gmail.com>
 * @since 2015-8-15
 */
class HubDo extends DIDo {

    function start() {
        $sub = Url::getVariableDomain();
        dump("当前子域名：{$sub}");
    }

}