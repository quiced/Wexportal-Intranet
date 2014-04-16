<?php
function getRandomString($value)
{
    $length = $value;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[rand(0, strlen($characters)-1)];
    }

    return $string;
}

function pass()
{
    return getRandomString(10);
}

function secure($value)
{

    $pass = sha1($value . "1dsa354");
    return $pass;
}