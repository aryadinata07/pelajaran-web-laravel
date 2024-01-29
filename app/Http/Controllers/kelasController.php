<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.all', ['title' => 'Kelas', 'kelas' => $kelas]);
    }

    public function create()
    {
        return view('kelas.create', ['title' => 'Add New Kelas']);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        Kelas::create($validateData);

        return redirect('/kelas')->with('success', 'Kelas added successfully');
    }

    public function destroy($id)
    {
        $kelas = Kelas::destroy($id);

        if (!$kelas) {
            return redirect('/kelas')->with('error', 'Kelas not found');
        }

        return redirect('/kelas')->with('success', 'Kelas deleted successfully');
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('/kelas')->with('error', 'Kelas not found');
        }

        return view('kelas.edit', ['title' => 'Edit Kelas', 'kelas' => $kelas]);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('/kelas')->with('error', 'Kelas not found');
        }

        $kelas->update($validateData);

        return redirect('/kelas')->with('success', 'Kelas updated successfully');
    }

    public function detail($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('/kelas')->with('error', 'Kelas not found');
        }

        return view('kelas.detail', ['title' => 'Kelas Detail', 'kelas' => $kelas]);
    }
}
