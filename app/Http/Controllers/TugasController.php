<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $tugas = Tugas::where('user_id', $userId)->get();
        return view('tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $tugas = new Tugas;
        $tugas->judul = $request->judul;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->deadline = $request->deadline;
        $tugas->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login
        $tugas->save();
        return redirect()->route('tugas.store')->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        return view('tugas.show', compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.edit', compact('tugas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tugas = Tugas::findOrFail($id);

        $tugas->judul = $request->input('judul');
        $tugas->deskripsi = $request->input('deskripsi');
        $tugas->deadline = $request->input('deadline');

        $tugas->save();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tugas)
    {
        $tugas = Tugas::findOrFail($tugas);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus');
    }
}
