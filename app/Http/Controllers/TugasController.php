<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index() {
        $tugas = Tugas::all();
        return view('tugas.index', compact('tugas'));
    }

    public function create() {
        return view('tugas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
        ]);

        Tugas::create($request->all());
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat!');
    }

    public function edit(Tugas $tugas) {
        return view('tugas.edit', compact('tugas'));
    }

    public function update(Request $request, Tugas $tugas) {
        $tugas->update($request->all());
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy(Tugas $tugas) {
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
