<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IInvoice;
use App\Models\OInvoice;
use App\Models\Customer;
use App\Models\User;
use App\Models\Distributor;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->breadcrumb = [
            'object'    => 'Trang chủ',
            'page'      => ''
        ];
        $this->module = 'dashboard';
        $this->title = 'Trang chủ';
    }

    public function index()
    {
        return $this->openView('modules.dashboard.dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with([
            'error' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
