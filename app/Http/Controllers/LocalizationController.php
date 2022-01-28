<?php

namespace App\Http\Controllers;


class LocalizationController extends Controller
{
    public function __invoke($local)
    {
        \Session::put('localization', $local);
        return back();
    }
}
