<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'partners' => Partner::count(),
            'services' => Service::count(),
            'messages' => Message::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
