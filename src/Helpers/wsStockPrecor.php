<?php
function precor_getServiceClient(): SoapClient
{
    // $wsdl = "http://192.168.50.132:8002/sap/bc/srt/wsdl/bndg_EC860AAA970429F180C900505601055A/wsdl11/allinone/ws_policy/document?sap-client=400?wsdl";
    $wsdl =  assetWebservices("webstock.xml");
    $username = "EXT_NOVA";
    $password = "Novategica2$";

    $options = array(
        'trace' => true,
        'login' => $username,
        'password' => $password,
        'authentication' => SOAP_AUTHENTICATION_BASIC,
        'soap_version' => SOAP_1_1,
        'connection_timeout' => 15,
        'encoding' => 'UTF-8'
    );
    $client = new SoapClient($wsdl, $options);
    // $client->__setSoapHeaders(array($wsse_header));
    return $client;
}

function precor_getStockBySkuAndIdSoc($sku, $id_soc)
{
    try {
        $ws = precor_getServiceClient();

        $response = $ws->ZsdpefEcom01(
            array(
                "IdMat" =>   intval($sku),
                "IdSoc" => $id_soc
            )
        );
        $object = new stdClass();
        $object->status = true;
        if ($response) {
            $stock = doubleval($response->StockWeb) ?? 0;
            $object->stock = $stock;
            $object->sku = $sku;
            $object->id_soc = $id_soc;
            $object->msg = "OK";
            return $object;
        }
        $object->status = false;
        return $object;
    } catch (\Throwable $th) {
        $object = new stdClass();
        $object->status = false;
        $object->msg = $th->getMessage();
        return $object;
    }
}
