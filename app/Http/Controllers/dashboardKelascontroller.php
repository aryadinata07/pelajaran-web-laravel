<?php

namespace App\Http\Controllers;
use App\Models\Kelas;

use Illuminate\Http\Request;

class dashboardKelascontroller extends Controller
{
    //
    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard.kelas.index', ['title' => 'Kelas', 'kelas' => $kelas]);
    }

    public function create()
    {
        return view('dashboard.kelas.create', ['title' => 'Add New Kelas']);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        Kelas::create($validateData);

        return redirect('/dashboard/kelas')->with('success', 'Kelas added successfully');
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('/dashboard/kelas')->with('error', 'Kelas not found');
        }

        return view('dashboard.kelas.edit', ['title' => 'Edit Kelas', 'kelas' => $kelas]);
    }

    public function destroy($id)
    {
        $kelas = Kelas::destroy($id);

        if (!$kelas) {
            return redirect('/dashboard/kelas')->with('error', 'Kelas not found');
        }

        return redirect('/dashboard/kelas')->with('success', 'Kelas deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('/dashboard/kelas')->with('error', 'Kelas not found');
        }

        $kelas->update($validateData);

        return redirect('/dashboard/kelas')->with('success', 'Kelas updated successfully');
    }

}
