<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;

class dashboardStudentController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');

        $students = Student::query();
    
        if ($searchQuery) {
            $students->where('nama', 'like', '%' . $searchQuery . '%')
                     ->orWhere('nis', 'like', '%' . $searchQuery . '%');
        }
    
        $students = $students->get();
    
        return view('dashboard.student.index', [
            'title' => 'Student List',
            'students' => $students,
        ]);
    }
    
    public function show($student){
        return view('dashboard.student.detail',[
            "title" => "detail.student",
            "student" => Student::find($student)
        ]);
    }


    public function create(){
        return view('dashboard.student.create',[
            "student" => student::all(),
            "grade" => Kelas::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);
        Student::create($validateData);
        return redirect('/dashboard/student')-> with('success', 'Data siswa berhasil di tambahkan');     
    }

    public function edit($studentId)
    {
        $student = Student::find($studentId);

        if (!$student) {
            return redirect('/dashboard/student')->with('error', 'Student not found');
        }
        
        return view('dashboard.student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            "grade" => Kelas::all()
        ]);
    }

    public function update(Request $request, $studentId)
    {
        $validateData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

        $student = Student::find($studentId);

        if (!$student) {
            return redirect('/dashboard/student')->with('error', 'Student not found');
        }

        $student->update($validateData);

        return redirect('/dashboard/student')->with('success', 'Student updated successfully');
    }

    public function destroy($student)
    {
        $student = Student::destroy($student);

        if (!$student) {
            return redirect('/dashboard')->with('error', 'Student not found');
        }

        return redirect('/dashboard')->with('success', 'Student deleted successfully');
    }



}
