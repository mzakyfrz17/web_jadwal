<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPelajaran;
use Illuminate\Support\Facades\Auth;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $jadwalPelajaran = JadwalPelajaran::where('user_id', $userId)->get();
        return view('jadwals.index', compact('jadwalPelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal = new JadwalPelajaran();
        $jadwal->mata_pelajaran = $request->mata_pelajaran;
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login
        $jadwal->save();
        return redirect()->route('jadwals.store')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwalPelajaran $jadwal)
    {
        return view('jadwals.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwalPelajaran $jadwal)
    {
        return view('jadwals.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPelajaran $jadwal)
    {
        $jadwal->update($request->all());
        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPelajaran $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
