<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(config('Paginate.pagination'));
        return view('student.list')->with('listStudent', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $allRequest  = $request->all();
        if($request->hasFile('avatar')) {
            $path = Storage::putFile('avatar', $request->file('avatar'));
            $destinationPath = 'public/images/student' ;
            $image = $request->file('avatar');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destinationPath, $imageName);
            $allRequest['avatar'] = $imageName;
        }
        
        Student::create($allRequest);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit')->with('getStudent',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $avatar = uniqid() . "_" . $file->getClientOriginalName();
            $oldAvatar = Student::find($id)->avatar;
            Storage::delete('public/' .$oldAvatar);
            $request->file('avatar')->storeAs('public', $avatar);
            $student['avatar'] = $avatar;
        }
        Student::findOrFail($id)->update($student);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('student.index');
    }
}
