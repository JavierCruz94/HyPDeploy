<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = auth()->user();
        //$user = Auth::user();

        if ($user->isAdmin()) {
            return redirect('/adminWatch');
        }
        if ($user->isConsultant()) {
            return redirect('/regVisit');
        }
        if ($user->isCustomer()) {
            return redirect('/customerReq');
        }
    }
}
