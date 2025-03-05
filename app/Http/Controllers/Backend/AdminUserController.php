<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = AdminUser::all();
        return view('backend.admin_user.index', [
            'users' => $users
        ]);
    }
}
