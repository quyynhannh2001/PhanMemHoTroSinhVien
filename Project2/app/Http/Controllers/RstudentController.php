<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Requestt;
use App\Models\Rstudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RstudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rstudent = Rstudent::getIndex();
        $requestt = Requestt::getRstudent();
        // dd($requestt);
        return view('rstudent.list',['requestt'=>$requestt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requestt = Requestt::getIndex();
        $department = Department::index();
        $student = Student::index();
        return view('rstudent.create',['requestt'=>$requestt],['department'=>$department],['student'=>$student]);
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
            'req_title' => 'bail|required',
            'req_content' => 'bail|required',
        ],[
           'req_title.required'=>'Tiêu đề yêu cầu không được để trống.', 
           'req_content.required'=>'Nội dung yêu cầu không được để trống.',
           
        ]);
        $id = $request -> input('id');
        $dept_id = $request -> input('dept_id');
        $student_id = $request -> input('student_id');
        $req_title = $request -> input('req_title');
        $req_content = $request -> input('req_content');
        $status = $request -> input('status');
        $current_datetime = \Carbon\Carbon::now()->toDateTimeString();
        // $fileName = time().".".$request->file('image')->extension();
        
        // $request->file('image')->storeAs('public',$fileName);
        // $path = 'storage/'.$fileName;
      if($request->hasFile('image')){
        
        $fileName = time().".".$request->file('image')->extension();
        
        $request->file('image')->storeAs('public',$fileName);
        $path = 'storage/'.$fileName;
        $data = ['id'=>$id,
        'dept_id'=>$dept_id,
        'student_id'=>$student_id,
        'req_title'=>$req_title,
        'req_content'=>$req_content,
        'image'=>$path,
        'status'=>$status,
        'created_at'=>$current_datetime]; 
$rs = Rstudent::store($data);
// dd($rs);
return redirect(route('student.rstudent.index'))->with('success','Gửi yêu cầu hỗ trợ thành công!');
      }
      else{
        // return "Không có ảnh nào được tải lên";
        $data = ['id'=>$id,
        'dept_id'=>$dept_id,
        'student_id'=>$student_id,
        'req_title'=>$req_title,
        'req_content'=>$req_content,
        // 'image'=>$path,
        'status'=>$status,
        'created_at'=>$current_datetime]; 
$rs = Rstudent::store($data);
// dd($rs);
return redirect(route('student.rstudent.index'))->with('success','Gửi yêu cầu hỗ trợ thành công!');
      }
       
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestt = Requestt::getById($id);
        if($requestt == NULL){
            return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        }
        
        return view('rstudent.details',['requestt'=>$requestt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $requestt = Requestt::getById($id);
        // if($requestt == NULL){
        //     return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        // }
        
        // return view('rstudent.edit',['requestt'=>$requestt]);
        
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
        $active=$request->input('active');
       $rs = Rstudent::xoa($active,$id);
       if($rs == 0){
            // return "Không thể xóa";
            return redirect('student/rstudent')->with('Error', 'Xóa không thành công');
       }
       else return redirect('student/rstudent')->with('Success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
