<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class generalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function keyGen($jum)
    {
        return str_random($jum);
    }

    public function hiGan(Request $request)
    {
        $req = $request->input();
        return "Hi Gan ". $req['name'];
    }

    //
}
