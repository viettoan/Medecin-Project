<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Eloquent\User;

class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *Tran Van My
     *25/09/2017
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sites.loginadmin.index');
    }
}
