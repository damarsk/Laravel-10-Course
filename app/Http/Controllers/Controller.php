<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{   
    // Error Handling
    public function notfound() {
        return view('errors.404');
    }

    // Another Method
    public function about() {
        return view('about');
    }
}
