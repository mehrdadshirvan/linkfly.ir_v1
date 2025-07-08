<?php

function generateFileSize($size) : string
{
    $sizeInKb = ((int) $size) / 1024;
    if ($sizeInKb > 1024) {
        $sizeInKb = round((float)($sizeInKb / 1024), 2) . 'mb';
    } else {
        $sizeInKb = round((float)$sizeInKb, 2) . 'kb';
    }
    return $sizeInKb;
}


