<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        $customerCount=customerCount();
        return View('admin.dashboard',compact('customerCount'));
    }
}
