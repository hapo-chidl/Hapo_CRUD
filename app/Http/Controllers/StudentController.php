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
        $students = Student::simplePaginate(15);
        return view('student.list')->with('listStudent',$students);
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
    if($request->hasFile('avatar'))
    {
        $path = Storage::putFile('avatar', $request->file('avatar'));
        $destination_path = 'public/images/student' ;
        $image = $request->file('avatar');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image') -> storeAs($destination_path, $image_name);
        $allRequest['avatar'] = $image_name;
    }
    Student::insert([
        'avatar' => $allRequest['avatar'],
        'email' => $allRequest['email'],
        'full_name' => $allRequest['full_name'],
        'address' => $allRequest['address'],
    ]);
	return redirect('student');
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
        $student = Student::find($id);
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
        $update_student =Student::where('id', $request->id)->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'address' => $request->address
        ]);
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', '=', $id)->delete();
        return redirect('student');
    }
}
