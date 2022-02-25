<?php

namespace JWOBDN;

class WsStockController
{
    public function __construct()
    {
    }

    public static function getStockPrecor()
    {
        // example:
        // http://precor.test/wp-json/ws_precor/v1/getStock?sku=432139&id_soc=PR01
        register_rest_route('ws_precor/v1', '/getStock', array(
            'methods' => 'GET',
            'callback' => function ($params) {
                $params = $params->get_params();
                $response = precor_getStockBySkuAndIdSoc(intval($params["sku"]), $params["id_soc"]);
                return ($response);
            }
        ));
    }
}
