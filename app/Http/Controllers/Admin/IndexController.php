<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|exists:admins,email',
            'admin_password' => 'required',
        ]);

        if (Admin::login($request->admin_email, $request->admin_password))
        {
            return redirect('admin/dashboard');
        }

        return back();
    }
}
