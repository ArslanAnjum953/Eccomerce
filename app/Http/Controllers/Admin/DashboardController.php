<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::All();
        return view('admin.users.index' , compact('users'));
    }
}
