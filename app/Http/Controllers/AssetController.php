<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = Asset::orderBy('created_at', 'desc');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($filter) {
            $query->where('type', 'like', '%' . $filter . '%');
        }

        $assets = $query->paginate(10);

        return view('assets.index', compact('assets', 'search', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
        ]);

        $name = request()->input('name');
        $type = request()->input('type');
        $location = request()->input('location');
        $code = '';

        session_start();
        function getNextCode($type)
        {
            // Periksa apakah nilai terakhir ada di sesi
            if (!isset($_SESSION['last_number'][$type])) {
                $_SESSION['last_number'][$type] = 0; // Inisialisasi dengan 0 jika tidak ada
            }

            // Tambah nilai terakhir dengan 1
            $_SESSION['last_number'][$type]++;

            // Kembalikan kode baru
            return $_SESSION['last_number'][$type];
        }

        switch ($type) {
            case 'Meja':
                $code = 'A-' . getNextCode('Meja');
                break;
            case 'Kursi':
                $code = 'B-' . getNextCode('Kursi');
                break;
            case 'Perangkat Komputer':
                $code = 'C-' . getNextCode('Perangkat Komputer');
                break;
            case 'Lemari':
                $code = 'D-' . getNextCode('Lemari');
                break;
            case 'Papan Tulis':
                $code = 'E-' . getNextCode('Papan Tulis');
                break;
            case 'Alat Tulis Kelas':
                $code = 'F-' . getNextCode('Alat Tulis Kelas');
                break;
            case 'Jam':
                $code = 'G-' . getNextCode('Jam');
                break;
            case 'Pendingin Ruangan':
                $code = 'H-' . getNextCode('Pendingin Ruangan');
                break;
            case 'Perangkat Suara':
                $code = 'I-' . getNextCode('Perangkat Suara');
                break;
            case 'APAR':
                $code = 'J-' . getNextCode('APAR');
                break;
            case 'Perangkat Praktikum Lab':
                $code = 'K-' . getNextCode('Perangkat Praktikum Lab');
                break;
            case 'Alat Musik':
                $code = 'L-' . getNextCode('Alat Musik');
                break;
            case 'Alat Olahraga':
                $code = 'M-' . getNextCode('Alat Olahraga');
                break;
            case 'P3K':
                $code = 'N-' . getNextCode('P3K');
                break;
        }

        Asset::create([
            'code' => $code,
            'name' => $name,
            'type' => $type,
            'location' => $location
        ]);

        return redirect()->route('admin/assets')->with('success', 'Asset added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.detail', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->update($request->all());

        return redirect()->route('admin/assets')->with('success', 'Asset updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('admin/assets')->with('success', 'Asset deleted successfully!');
    }
}
