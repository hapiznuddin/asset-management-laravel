<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $asset = Asset::orderBy('created_at', 'desc')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(2);
        return view('home', compact('asset'));
    }

    public function adminHome()
    {
        return view('dashboard');
    }
}
