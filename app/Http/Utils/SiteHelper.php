<?php



function generateTabTitle($title) : string{

    return (!empty($title) ? __($title) : '') . ' | ' . __(env('APPLICATION_NAME'));
}


function shortText($text, $NumberCharacters = 70) : string {
    return !empty($text) ?  mb_substr(strip_tags($text), 0, $NumberCharacters) . (strlen($text) > $NumberCharacters ? '...' : '') : '';
}


function convertNumbers($string, $toLatin = false)
{
    $farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    $english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    if (!$toLatin) {
        return str_replace($english_array, $farsi_array, $string);
    }
    return str_replace($farsi_array, $english_array, $string);
}



function checkDirection() : string {
    $local =  \Illuminate\Support\Facades\App::getLocale();
    return $local == 'fa' ? 'rtl' : 'ltr';
}


function generateHash($string = null) : string
{
    return hash_hmac('sha512', (!empty($string) ? $string : date('YmdH')), config('anin-has.HASH_SECRET_KEY'));
}




