<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Arsip::with('kategori')->latest();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $arsips = $query->get();

        return view('arsip.index', compact('arsips'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string',
            'file_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file_pdf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('surat', $fileName,'public');

        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_path' => Storage::url($filePath),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan!');
    }

        public function destroy(Arsip $arsip)
    {
        if (Storage::exists($arsip->file_path)) {
            Storage::delete($arsip->file_path);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil dihapus!');
    }

    public function show(Arsip $arsip)
    {
        return view('arsip.show', compact('arsip'));
    }

    public function download(Arsip $arsip)
    {
        return Storage::download($arsip->file_path);
    }
}