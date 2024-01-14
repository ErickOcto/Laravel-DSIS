<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = DB::table('teachers_subjects')->where('teachers_subjects.user_id', Auth::user()->id)
                ->join('users', 'teachers_subjects.user_id', '=', 'users.id')
                ->join('subjects', 'teachers_subjects.subject_id', '=', 'subjects.id')
                ->join('classrooms', 'teachers_subjects.classroom_id', '=', 'classrooms.id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'subjects.name as subject_name', 'teachers_subjects.id as id')
                ->get();

        //$classrooms = User::where('classroom_id', $class->classroom_id)->count();

        return view('teacher.assessment.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAss($id)
    {
        $class = DB::table('teachers_subjects')->where('teachers_subjects.user_id', Auth::user()->id)->where('teachers_subjects.id', $id)
                ->join('classrooms', 'teachers_subjects.classroom_id', '=', 'classrooms.id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'teachers_subjects.id as id')
                ->first();
        $users = User::where('classroom_id', $class->classroom_id)->where('is_admin', 2)
        ->get();
        return view('teacher.assessment.create', compact('users', 'class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'user_id' => 'required',
            'teacher_subject_id' => 'required',
            'assessment_date' => 'required',
            'value' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' => "Gagal menilai siswa"]);
        }

        $assessment = Assessment::where('user_id', '=', $request->user_id)->first();

        //dd($assessment->user_id);
        if(!empty($assessment->user_id)){
            return redirect()->back()->with(['error' => "Gagal menilai siswa"]);
        }

        Assessment::create($request->all());

        return redirect()->route('teacher.assessment.show', $request->teacher_subject_id)->with(['success' => "Berhasil menilai siswa"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = DB::table('teachers_subjects')->where('teachers_subjects.user_id', Auth::user()->id)->where('teachers_subjects.id', $id)
                ->join('users', 'teachers_subjects.user_id', '=', 'users.id')
                ->join('subjects', 'teachers_subjects.subject_id', '=', 'subjects.id')
                ->join('classrooms', 'teachers_subjects.classroom_id', '=', 'classrooms.id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'subjects.name as subject_name', 'teachers_subjects.id as id')
                ->first();

        $users = User::where('classroom_id', $class->classroom_id)->where('is_admin', 2)
        ->join('assessments', 'assessments.user_id', '=', 'users.id')
        ->select('users.*', 'assessments.value as value', 'assessments.assessment_date as date' )
        ->get();

        //dd($users);
        return view('teacher.assessment.show', compact('users', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = DB::table('teachers_subjects')->where('teachers_subjects.user_id', Auth::user()->id)->where('teachers_subjects.id', $id)
                ->join('classrooms', 'teachers_subjects.classroom_id', '=', 'classrooms.id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'teachers_subjects.id as id')
                ->first();

        $assessment = Assessment::where('teacher_subject_id', $id)->first();

        $user = User::where('classroom_id', $class->classroom_id)->where('is_admin', 2)->where('user_id', $assessment->user_id)
        ->join('assessments', 'assessments.user_id', '=', 'users.id')
        ->select('users.*', 'assessments.value as value', 'assessments.assessment_date as date' )
        ->first();
        return view('teacher.assessment.edit', compact('user', 'class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return "test";
        $assessment = Assessment::where('teacher_subject_id', $id)->first();
        $validators = Validator::make($request->all(), [
            'user_id' => 'required',
            'teacher_subject_id' => 'required',
            'assessment_date' => 'required',
            'value' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->route('teacher.assessment.show', $request->teacher_subject_id)->with(['error' => "Gagal menilai siswa"]);
        }

        $assessment->update($request->all());

        return redirect()->route('teacher.assessment.show', $request->teacher_subject_id)->with(['success' => "Berhasil menyimpan perubahan"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Assessment::where('teacher_subject_id', $id)->delete();
       return redirect()->back()->with(['success' => "Berhasil menghapus penilaian"]);
    }
}
