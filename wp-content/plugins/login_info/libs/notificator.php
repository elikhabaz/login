<?php
function notificator_send_message( $text ){

    $postArgs           = array();
    $postArgs['to']     = 'Pn3bkz97zgUs0ac7h5W1G24vevTtUM1bCcJSvQy2';
    $postArgs['text']   = print_r( $text, true );

    $ch = curl_init( 'https://notificator.ir/api/v1/send' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postArgs );

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5 );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5 );

    // execute!
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    return json_decode( $response );
    
}