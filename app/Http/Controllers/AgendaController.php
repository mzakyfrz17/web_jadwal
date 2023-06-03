<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $agenda = Agenda::where('user_id', $userId)->get();
        return view('agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        $agenda = new Agenda;
        $agenda->title = $request->title;
        $agenda->date = $request->date;
        $agenda->description = $request->description;
        $agenda->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login
        $agenda->save();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->update($request->all());
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
