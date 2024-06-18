<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->paginate(15);
        return view('home', compact('asset'));
    }

    public function homeAssetDetail(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('homeAssetDetail', compact('asset'));
    }

    public function adminHome()
    {
        $assets = Asset::select('type', DB::raw('count(*) as total'))
                    ->groupBy('type')
                    ->get();
        return view('dashboard', compact('assets'));
    }
}
