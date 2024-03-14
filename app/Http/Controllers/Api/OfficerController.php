<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $officers = User::where('is_admin', 3)->get();

        return new TeacherResource(true, "Success Fetching Data", $officers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        //dd($request->all());

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->is_admin = 3;

    $user->save();
        return response()->json(['message' => 'Officer created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $officer = User::find($id);

        if (!$officer) {
            return response()->json(['error' => 'Officer no data'], 404);
        }

        return response()->json(['data' => $officer], 200);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $officer = User::find($id);

        if (!$officer) {
            return response()->json(['error' => 'Officer no data'], 404);
        }

        $officer->name = $request->input('name');
        $officer->email = $request->input('email');
        if ($request->filled('password')) {
            $officer['password'] = bcrypt($request->password);
        }
        $officer->save();

        return response()->json(['message' => 'Officer updated successfully', 'data' => $officer], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
    }

    public function searchOfficer(Request $request){
        $request->validate([
            'name' => 'string|required',
        ]);
        if($request->has('name')) {
            $officers = User::where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%')
                      ->orWhere('email', 'like', '%' . $request->name . '%');
            })
            ->where('is_admin', '=', 3)
            ->get();
        } else {
            $officers = User::where('is_admin', 3)->get();
        }
        return new TeacherResource(true, 'Success', $officers);
    }
}
