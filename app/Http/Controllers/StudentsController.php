<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public static function index(){
        return view('student/all', [
            "title" => "student",
            "students" => Student::all()
        ]);
    }

    public function show($student){
        return view('student.detail',[
            "title" => "detail.student",
            "student" => Student::find($student)
        ]);
    }

    public function create(){
        return view('student.create',[
            "title" => "New Data Student",
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
        return redirect('/student/all')-> with('success', 'Data siswa berhasil di tambahkan');
        
    }

    public function destroy($student)
    {
        $student = Student::destroy($student);

        if (!$student) {
            return redirect('/student/all')->with('error', 'Student not found');
        }

        return redirect('/student/all')->with('success', 'Student deleted successfully');
    }

    public function edit($studentId)
    {
        $student = Student::find($studentId);

        if (!$student) {
            return redirect('/student/all')->with('error', 'Student not found');
        }

        return view('student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
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
            return redirect('/student/all')->with('error', 'Student not found');
        }

        $student->update($validateData);

        return redirect('/student/all')->with('success', 'Student updated successfully');
    }


}