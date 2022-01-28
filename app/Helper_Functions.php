<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;


//function hasRole($moduleMethod){
//    $count = count(array_diff( Auth::user()->getRoleNames()->toArray(), Config::get('roles.' . $moduleMethod)));
//
//    if ($count == 0) {
//        return true;
//    }
//    return false;
//}
//
//
//function checkUserRole($moduleMethod) {
//    if (hasRole($moduleMethod)) {
//        return true;
//    }
//    return false;
//}

function getRoleName($user)
{
    return $user->roles->first()->name;
}

function normalDateFormat($date)
{
    if($date == null)
    {
        return "Not Available";
    }

    return Carbon\Carbon::parse($date)->format('d-m-y');
}

function getWordWithSpace($word)
{
    return implode(' ', preg_split('/(?=[A-Z])/', Str::studly($word) ) );
}

