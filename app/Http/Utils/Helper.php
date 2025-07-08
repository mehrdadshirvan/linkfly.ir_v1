<?php

include 'SiteHelper.php';
include 'AuthHelper.php';
include 'HttpHelper.php';
include 'DateHelper.php';
include 'FileHelper.php';
include 'FormHelper.php';
include 'QueryHelper.php';


function PanelMenuItemIsActive($url) : string{
    return request()->is($url) ? 'bg-gray-100 text-first' : 'text-gray-500';
}

function uuid()
{
    return \Illuminate\Support\Str::uuid();
}






/**
 * قرارداد با ویزاپیک
 *
 * @param $visaID
 * @return int|null
 */
function findDocumentIDForContract($visaID)
{
    //اکستنشن ۱۸۸
    if ($visaID == 20) return 708;
    //888 AAT
    if ($visaID == 21) return 708;
    //اسپانسرشیپ ۴۸۲,اسپانسرشیپ ۴۹۴,اسپانسرشیپ ۱۸۶
    if ($visaID == 18 || $visaID == 19 || $visaID == 16) return 700;
    //توریستی
    if ($visaID == 15) return 687;
    //EOI تا ویزای اسکیل
    //    if($visaID == 11) return 573;
    //همراه
    if ($visaID == 10) return 558;
    //تحصیلی,دانش‌آموزی - گاردین
    if ($visaID == 8 || $visaID == 12) return 518;
    //بیزینسی 188
    if ($visaID == 3) return 215;
    //اسسمنت,EOI تا ویزای اسکیل,اسسمنت همراه,اسکیل ورکر
    if ($visaID == 6 || $visaID == 9 || $visaID == 17 || $visaID == 11) return 214;
    // EasyMove,بیزینسی 888
    if ($visaID == 1 || $visaID == 7) return 174;
    return null;
}

/**
 * تمدید قرارداد
 *
 * @param $visaID
 * @return int|null
 */
function findDocumentIDForContractRenewal($visaID)
{
    //اکستنشن ۱۸۸
    if ($visaID == 20) return 721;
    //888 AAT
    if ($visaID == 21) return 720;
    //اسپانسرشیپ ۴۸۲,اسپانسرشیپ ۴۹۴,اسپانسرشیپ ۱۸۶
    if ($visaID == 18 || $visaID == 19 || $visaID == 16) return 719;
    //توریستی
    if ($visaID == 15) return 718;
    //EOI تا ویزای اسکیل
    if ($visaID == 11) return 717;
    //همراه
    if ($visaID == 10) return 716;
    //تحصیلی,دانش‌آموزی - گاردین
    if ($visaID == 8 || $visaID == 12) return 715;
    //بیزینسی 188
    if ($visaID == 3) return 714;
    //اسسمنت,EOI تا ویزای اسکیل,اسسمنت همراه,اسکیل ورکر
    if ($visaID == 6 || $visaID == 9 || $visaID == 17 || $visaID == 11) return 710;
    // EasyMove,بیزینسی 888
    if ($visaID == 1 || $visaID == 7) return 713;
    return null;
}

/**
 * تغییر پکیج
 *
 * @param $visaID
 * @return int|null
 */
function findDocumentIDForChangeContractPackage($visaID)
{
    //اکستنشن ۱۸۸
    if ($visaID == 20) return 730;
    //888 AAT
    if ($visaID == 21) return 729;
    //اسپانسرشیپ ۴۸۲,اسپانسرشیپ ۴۹۴,اسپانسرشیپ ۱۸۶
    if ($visaID == 18 || $visaID == 19 || $visaID == 16) return 728;
    //توریستی
    if ($visaID == 15) return 727;
    //EOI تا ویزای اسکیل
    if ($visaID == 11) return 726;
    //همراه
    if ($visaID == 10) return 725;
    //تحصیلی,دانش‌آموزی - گاردین
    if ($visaID == 8 || $visaID == 12) return 724;
    //بیزینسی 188
    if ($visaID == 3) return 723;
    //اسسمنت,EOI تا ویزای اسکیل,اسسمنت همراه,اسکیل ورکر
    if ($visaID == 6 || $visaID == 9 || $visaID == 17 || $visaID == 11) return 711;
    // EasyMove,بیزینسی 888
    if ($visaID == 1 || $visaID == 7) return 722;
    return null;
}


/**
 * تغییر قرارداد
 *
 * @param $visaID
 * @return int|null
 */
function findDocumentIDForChangeContract($visaID)
{
    //اکستنشن ۱۸۸
    if ($visaID == 20) return 739;
    //888 AAT
    if ($visaID == 21) return 738;
    //اسپانسرشیپ ۴۸۲,اسپانسرشیپ ۴۹۴,اسپانسرشیپ ۱۸۶
    if ($visaID == 18 || $visaID == 19 || $visaID == 16) return 737;
    //توریستی
    if ($visaID == 15) return 736;
    //EOI تا ویزای اسکیل
    if ($visaID == 11) return 735;
    //همراه
    if ($visaID == 10) return 734;
    //تحصیلی,دانش‌آموزی - گاردین
    if ($visaID == 8 || $visaID == 12) return 733;
    //بیزینسی 188
    if ($visaID == 3) return 732;
    //اسسمنت,EOI تا ویزای اسکیل,اسسمنت همراه,اسکیل ورکر
    if ($visaID == 6 || $visaID == 9 || $visaID == 17 || $visaID == 11) return 712;
    // EasyMove,بیزینسی 888
    if ($visaID == 1 || $visaID == 7) return 731;
    return null;
}




