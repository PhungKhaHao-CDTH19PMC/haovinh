<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
}
