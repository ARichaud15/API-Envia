<?php
    $curl = curl_init();

    //Se crea un array el cual contiene todos los datos para poder generar un numero de guia
    $data = array (
        'origin' => array (
            'name' => 'pedro mx',
            'company' => 'osk',
            'email' => 'osgosf8@gmail.com',
            'phone' => '8116300800',
            'street' => 'av vasconcelos',
            'number' => '1400',
            'district' => 'mirasierra',
            'city' => 'Monterrey',
            'state' => 'NL',
            'country' => 'MX',
            'postalCode' => '66236',
            'reference' => '',
        ),
            
        'destination' => array (
            'name' => 'pedro1',
            'company' => 'empresa',
            'email' => 'osgosf8@gmail.com',
            'phone' => '8116300800',
            'street' => 'av vasconcelos',
            'number' => '1400',
            'district' => 'palo blanco',
            'city' => 'monterrey',
            'state' => 'NL',
            'country' => 'MX',
            'postalCode' => '66240',
            'reference' => '',
        ),
        
        'packages' => array ( 0 => 
            array (
                'content' => 'camisetas rojas',
                'amount' => 1,
                'type' => 'box',
                'dimensions' => 
            
            array (
                'length' => 2,
                'width' => 5,
                'height' => 5,
            ),
            
            'weight' => 13,
            'insurance' => 0,
            'declaredValue' => 40,
            'weightUnit' => 'KG',
            'lengthUnit' => 'CM',
            ),
        ),
        
        'shipment' => array (
            'carrier' => 'fedex',
            'service' => 'express',
            'type' => 1,
        ),
        
        'settings' => array (
            'printFormat' => 'PDF',
            'printSize' => 'STOCK_4X6',
            'comments' => 'comentarios de el envio',
        ),

    );

    $data_json = json_encode($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api-test.envia.com/ship/generate/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data_json,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer 566fd9eb53c8db25565bbfb67b194ca54d248f58e544be0c41a7f631bb424991"
        ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    

    curl_close($curl);
    echo ($response);

?>
