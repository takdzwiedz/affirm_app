<?php


echo "Tu powstanie moduł wysyłki sms<br>";

require_once('vendor/autoload.php');

/*
 * Dokumentacja: https://github.com/SerwerSMSpl/serwersms-php-api-v2
 *
 * */

try{
    $serwersms = new SerwerSMS\SerwerSMS(SMSSERWER_USERNAME,SMSSERWER_PASSWORD);

    // SMS FULL
    $result = $serwersms->messages->sendSms(
        array(
//            '+48694473288',
//            '+48509468732'
        ),
        'Możesz zostać milionerem!',
        'Mozesz',
        array(
            'details' => true,
            'utf' => true
        )
    );


    echo 'Skolejkowano: '.$result->queued.'<br />';
    echo 'Niewysłano: '.$result->unsent.'<br />';

    foreach($result->items as $sms){
        echo 'ID: '.$sms->id.'<br />';
        echo 'NUMER: '.$sms->phone.'<br />';
        echo 'STATUS: '.$sms->status.'<br />';
        echo 'CZĘŚCI: '.$sms->parts.'<br />';
        echo 'WIADOMOŚĆ: '.$sms->text.'<br />';
    }

} catch(Exception $e){
    echo 'ERROR: '.$e->getMessage();
}
