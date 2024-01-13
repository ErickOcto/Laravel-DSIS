<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 2)->get();
        // $users = Classroom::leftJoin('majors', 'classrooms.major_id', '=', 'majors.id')
        //          ->leftJoin('users', 'classrooms.id', '=', 'users.classroom_id')
        //          ->where('users.is_admin', 2)
        //          ->select('users.name as name', 'majors.name as major_name',
        //          'classrooms.name as classroom_name', 'users.created_at as created_at',
        //          'users.image as photo', 'users.id as id', 'users.email as email')
        //          ->get();

        //dd($users);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $majors = Major::all();
        return view('admin.user.create', compact('majors', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();

        $major = Major::where('id', $classroom->major_id)->first();

        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'classroom_id' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Sorry, Something went wrong',
            ]);
        }

        $image = $request->file('photo');
        $image->storeAs('public/users', $image->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'major_id' => $major->id,
            'classroom_id' => $request->classroom_id,
            'is_admin' => 2,
            'nis' => $request->nis,
            'image' => $image->hashName(),
        ]);

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
