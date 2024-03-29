<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function login($email, $password)
    {
        $admin = Admin::where('email', $email)->first();

        if ($admin)
        {
            if (\Hash::check($password, $admin->password))
            {
                session(['admin_email' => $admin->email]);
                session(['admin_name' => $admin->name]);

                return true;
            }
        }

        return false;
    }

    public static function guest()
    {
        if (! session('admin_email'))
            return true;
        return false;
    }

    public static function logout()
    {
        session()->forget(['admin_email', 'admin_name']);
    }
}
