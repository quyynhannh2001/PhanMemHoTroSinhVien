<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::index();
        return view('department.index',['department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'bail|required|min:4',
            'name' => 'bail|required|max:50',
            'phone' => 'bail|required|max:12|regex:/(0[1-9]{2})-[0-9]{3}-[0-9]{4}/',
            'email' => 'bail|required|email',
        ],[
           'id.required'=>'Mã Phòng/Ban không được để trống.', 
           'name.required'=>'Tên Phòng/Ban không được để trống.',
           'phone.required'=>'SĐT Phòng/Ban không được để trống.',
           'phone.regex' => 'SĐT phải có định dạng 0xx-xxx-xxxx.',
           'phone.max' => 'SĐT không tồn tại.',
           'email.required'=>'Email Phòng/Ban không được để trống.',
           'email.email' => 'Email phải đúng định dạng @.',
           'id.min'=>'Mã Phòng/Ban phải có ít nhất 4 kí tự.',
        ]);

        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');
    
        $rs = Department::store($id,$name,$phone,$email,$note);
        $department = Department::index();
        // return view('department.index',['department'=>$department])->with('success','Thêm mới thành công');
        return redirect(route('admin.department.index'))->with('success','Thêm mới thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::get($id);
        if($department == NULL){
            return "Không có phòng/ban có mã = ".$id;
        }
        else return view('department.details',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::get($id);
        if($department == NULL){
            return "Không có phòng/ban có mã = ".$id;
        }
        else return view('department.edit',['department'=>$department]);
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
        $request->validate([
            'id' => 'bail|required|min:4',
            'name' => 'bail|required|max:50',
            'phone' => 'bail|required|max:12|regex:/(0[1-9]{2})-[0-9]{3}-[0-9]{4}/',
            'email' => 'bail|required|ends_with:@gmail.com',
        ],[
           'id.required'=>'Mã Phòng/Ban không được để trống.', 
           'name.required'=>'Tên Phòng/Ban không được để trống.',
           'phone.required'=>'SĐT Phòng/Ban không được để trống.',
           'phone.regex' => 'SĐT phải có định dạng 0xx-xxx-xxxx.',
           'phone.max' => 'SĐT không tồn tại.',
           'email.required'=>'Email Phòng/Ban không được để trống.',
           'email.ends_with' => 'Email phải đúng định dạng @gmail.com.',
           'id.min'=>'Mã Phòng/Ban phải có ít nhất 4 kí tự.',
        ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');

        $rs = Department::processUpdate($id,$name,$phone,$email,$note);

        if($rs == 0){
            // return "Cập nhật dữ liệu không thành công";
            return redirect('admin/department')->with('success','Cập nhật không thành công');
        }
        else{
            return redirect('admin/department')->with('success','Cập nhật thành công');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = Department::destroy($id);
        if($rs == 0){
            // return "Xóa dữ liệu không thành công";
            return redirect('admin/department')->with('success','Xóa không thành công');
        }
        else{
            return redirect('admin/department')->with('success','Xóa thành công');
        }
    }
}
