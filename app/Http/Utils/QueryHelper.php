<?php

use App\Http\Controllers\Pkg\Upload\UploadFileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

function QueryHelper($columns, $request, $default)
{
    $data = [];
    $booleanColumns = [];
    $mediaFiledName = ['image' ,'logo' ,'cover' , 'thumb' ,'avatar' ,'file'];

    foreach ($columns as $value) {
        if ($value == 'password') {
            $password = '';
            if (!empty($default->get('password'))) {
                $password = $default->get('password');
            }
            if (!empty($request->get('password'))) {
                $password = Hash::make($request->get('password'));
            }
            $data[$value] = $password;
        }elseif ($value == 'create_user_id' || $value == 'creator_id' || $value == 'user_id') {
            $data[$value] = !empty($default->get($value))
                ? $default->get($value)
                : $request->get($value, Auth::id());
        }
        elseif ($value == 'api_token') {
            $data[$value] = !empty($default->get('api_token')) ? $default->get('api_token') : Str::random('256');
        }
        elseif ($value == 'slug') {
            $data[$value] = setSlug($request->get('name', $default->get('name', NULL)));
        }
        elseif ($value == 'uuid') {
            $data[$value] = Str::uuid()->toString();
        }
        elseif (in_array($value, $booleanColumns)) {
            $data[$value] = !empty($request->get($value)) ? TRUE : FALSE;
        }
        elseif (in_array($value,$mediaFiledName)) {
            $data[$value] = uploadHelper($value,$request, $default);
        }
        elseif ($request->get($value) === 'NULL'){
            $data[$value] = NULL;
        }
        else {
            $data[$value] = $request->get($value, $default->get($value, NULL));
        }
    }
    return $data;
}


function uploadHelper($field,$request, $default)
{
    $url = $default->get($field);
    if (!empty($request->file($field)) || $request->hasFile($field) || ($request->is_web && $request->file)) {
        // for some times give file content no file part
        $file = UploadFileController::upload($request->file($field));
        $url = $file ? $file['url'] : null;
    }
    return $url;
}

function setSlug($string)
{
    $slug = strtolower($string);
    // Replace spaces and special characters with hyphens
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    // Trim hyphens from the beginning and end
    $slug = trim($slug, '-');
    return $slug;
}
