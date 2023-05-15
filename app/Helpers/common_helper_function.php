<?php

use App\Models\ArtistProfileApprove;
use App\Models\DealDayTime;

function check_verification($artist_id, $table_name, $column_name, $row_id)
{
    $data = ArtistProfileApprove::where(['artist_id' => $artist_id, 'table_name' => $table_name, 'column_name' => $column_name, 'row_id' => $row_id])->first();
    if (!empty($data)) {
        return $data->status;
    } else {
        return 2;
    }
}

function encrypts($plainText, $key)
{
    $key = hextobin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
    $encryptedText = bin2hex($openMode);
    return $encryptedText;
}

function decrypts($encryptedText, $key)
{
    $key = hextobin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText = hextobin($encryptedText);
    $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
    return $decryptedText;
}
//*********** Padding Function *********************

function pkcs5_pad($plainText, $blockSize)
{
    $pad = $blockSize - (strlen($plainText) % $blockSize);
    return $plainText . str_repeat(chr($pad), $pad);
}

//********** Hexadecimal to Binary function for php 4.0 version ********

function hextobin($hexString)
{
    $length = strlen($hexString);
    $binString = "";
    $count = 0;
    while ($count < $length) {
        $subString = substr($hexString, $count, 2);
        $packedString = pack("H*", $subString);
        if ($count == 0) {
            $binString = $packedString;
        } else {
            $binString .= $packedString;
        }

        $count += 2;
    }
    return $binString;
}


function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}


function get_deal_day_time($day , $deal_id)
{
    $daytime = DealDayTime::where(['day'=>$day, 'deal_id'=> $deal_id])->get()->toArray();
    return $daytime;
}

function get_day($num)
{
    switch ($num) {
        case '0':
            $day = 'mon';
            break;
        case '1':
            $day = 'tue';
            break;
        case '2':
            $day = 'wed';
            break;
        case '3':
            $day = 'thu';
            break;
        case '4':
            $day = 'fri';
            break;
        case '5':
            $day = 'sat';
            break;
        case '6':
            $day = 'sun';
            break;
    }

    return $day;
}
