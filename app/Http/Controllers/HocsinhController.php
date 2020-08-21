<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\CreateStudent;

use Illuminate\Support\Facades\DB;

use Session;

class HocsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = DB::table('students')->select('id','full_name','email','avatar','address')->get();
	    return view('Templates.list')->with('listhocsinh',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudent $request)
    {
        $allRequest  = $request->all();
	    $dataInsertToDatabase = array(
		    'full_name'  => $allRequest['full_name'],
		    'email' =>$allRequest['email'],
		    'avatar' => $allRequest['avatar'],
		    'address' =>$allRequest['address'],
	);
	
	$insertData = DB::table('students')->insert($dataInsertToDatabase);
	if ($insertData) {
		Session::flash('success', 'Thêm mới học sinh thành công!');
	}else {                        
		Session::flash('error', 'Thêm thất bại!');
	}
	
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
        $getData = DB::table('students')->select('id','full_name','email','avatar','address')->where('id',$id)->get();
        return view('Templates.edit')->with('getHocSinhById',$getData);
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
        $updateData = DB::table('studentư')->where('id', $request->id)->update([
		    'full_name' => $request->Fullname,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'address' => $request->address
        ]);

	if ($updateData) {
		Session::flash('success', 'Sửa học sinh thành công!');
	}else {                        
		Session::flash('error', 'Sửa thất bại!');
    }
    
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
        $deleteData = DB::table('students')->where('id','=',$id)->delete();
        if ($deleteData) {
            Session::flash('success', 'Xóa học sinh thành công!');
        }else {                        
            Session::flash('error', 'Xóa thất bại!');
        }
       return  redirect('student');
    }
}
