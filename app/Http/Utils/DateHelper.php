<?php

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;


function changeDateFormat($date, $format = 'Y/m/d') : string | null{
    if (!empty($date)) {
        return Carbon::parse($date)->setTimezone('Asia/Tehran')->format($format);
    }
    return null;
}

function betweenDateToToday($date,$format = 'Y/m/d') : string | null{
    if (!empty($date)) {
        return Carbon::parse($date)->diffInDays(Carbon::now())->format($format);
    }
    return null;
}

function ageMiladi($birthdate){
    $age = "";
    $carbon = Carbon::parse($birthdate)->diff(Carbon::now());
    if (!empty($carbon->y)) {
        $age .= $carbon->y . ' ' . __("Years") . ' ';
    }
    if (!empty($carbon->m)) {
        $age .= $carbon->m . ' ' . __("Months") . ' ';
    }
    if (!empty($carbon->d)) {
        $age .= $carbon->d . ' ' . __("Days") . ' ';
    }
    return $age;
}


function ConvertDateMiladiToJalali($date,$toFormat = 'Y/m/d',$convertToPersianNumber = true){
    $result = null;
    if (!empty($date)) {
        $result =  Jalalian::forge(Carbon::parse($date)->timezone('Asia/Tehran')->format($toFormat))->format($toFormat);
    }
    if($convertToPersianNumber && !empty($result)){
        $result = convertNumbers($result);
    }
    return $result;
}


function calculateAgeJalali($jalaliDate) {
    // Convert the Jalali date string to a Jalalian date object
    $dateParts = explode('/', $jalaliDate);
    if (count($dateParts) !== 3) {
        return null;
    }

    // Parse the Jalali date into year, month, and day
    $year = (int) $dateParts[0];
    $month = (int) $dateParts[1];
    $day = (int) $dateParts[2];

    // Create a Jalalian date object
    $jalaliDateObject = new Jalalian($year, $month, $day);

    // Convert the Jalalian date object to a Carbon instance
    $gregorianDate = Carbon::instance($jalaliDateObject->toCarbon());

    // Calculate the age based on the current date
    $currentDate = Carbon::now();

    return abs(round($currentDate->diffInYears($gregorianDate)));
}
