<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::index();
        return view('student.index',['student'=>$student]);
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
        $request->validate([
            'id' => 'bail|required|min:4',
            'name' => 'bail|required|max:50',
            'dob' => 'bail|required|date',
            'phone' => 'bail|required|max:12|regex:/(0[1-9]{2})-[0-9]{3}-[0-9]{4}/',
            'sex' =>'bail|required',
            'address' =>'bail|required',
            'subject' =>'bail|required',
            'status' =>'bail|required',
            'email' => 'bail|required|ends_with:@gmail.com',
            'password' =>'bail|required|min:6',
            'repassword'=>'bail|required|same:password|min:6|',
            'image'=>'bail|required',
        ],[
           'id.required'=>'Mã sinh viên không được để trống.', 
           'id.min'=>'Mã sinh viên phải có ít nhất 4 kí tự.',
           'name.required'=>'Tên sinh viên không được để trống.',
           'phone.required'=>'SĐT sinh viên không được để trống.',
           'phone.regex' => 'SĐT phải có định dạng 0xx-xxx-xxxx.',
           'phone.max' => 'SĐT không tồn tại.',
           'dob.required' => 'Ngày sinh không được để trống',
           'address.required' => 'Địa chỉ không được để trống',
           'email.required'=>'Email không được để trống.',
        //    'email.email' => 'Email phải đúng định dạng @.',
           'email.ends_with' =>'Email phải kết thúc bằng đuôi @gmail.com',
           'password.required' => 'Mật khẩu không được để trống ',
           
           'repassword.same' =>'Mật khẩu nhập lại phải trùng với mật khẩu nhập trước đó',
           'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
           'repassword.required'=>'Nhập lại mật khẩu không được để trống',
           'repassword.min' => "Mật khẩu nhập lại phải có ít nhất 6 kí tự",
           'image.required' => 'Hình ảnh không được để trống',
           
        ]);
        // dd($request->status);
        $id = $request->input('id');
        $name = $request->input('name');
        $dob = $request->input('dob');
        $phone = $request->input('phone');
        $sex = $request->input('sex');
        $address = $request->input('address');
        $subject = $request->input('subject');
        $status = $request->input('status');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $note = $request->input('note');
        $fileName = time().".".$request->file('image')->extension();
        // dd((int)$status);
        $request->file('image')->storeAs('public',$fileName);
        $path = 'storage/'.$fileName;
        $data = ['id'=>$id,
                    'name'=>$name,
                    'dob'=>$dob,
                    'phone'=>$phone,
                    'sex'=>$sex,
                    'address'=>$address,
                    'subject'=>$subject,
                    'status'=>$status,
                    'email'=>$email,
                    'password'=>$password,
                    'image'=>$path,
                    'note'=>$note];
        $rs = Student::storeStudent($data);
        // dd($rs);
        // $student = Student::index();
        // return redirect('student.index',['student'=>$student]);
        return redirect(route('admin.student.index'))->with('success','Thêm mới thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::get($id);
        // dd($student);
        if($student == NULL){
            return "Không có sinh viên có MSV = ".$id;
        }
        else return view('student.details',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::get($id);
        if($student == NULL){
            return "Không có sinnh viên có MSV = ".$id;
        }
        else return view('student.edit',['student'=>$student]);
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
            'dob' => 'bail|required|date',
            'phone' => 'bail|required|max:12|regex:/(0[1-9]{2})-[0-9]{3}-[0-9]{4}/',
            'sex' =>'bail|required',
            'address' =>'bail|required',
            'subject' =>'bail|required',
            'status' =>'bail|required',
            'email' => 'bail|required|ends_with:@gmail.com',
            // 'password' =>'bail|required|min:6',
            // 'repassword'=>'bail|required|same:password|min:6|',
            // 'image'=>'bail|required',
        ],[
           'id.required'=>'Mã sinh viên không được để trống.', 
           'id.min'=>'Mã sinh viên phải có ít nhất 4 kí tự.',
           'name.required'=>'Tên sinh viên không được để trống.',
           'phone.required'=>'SĐT sinh viên không được để trống.',
           'phone.regex' => 'SĐT phải có định dạng 0xx-xxx-xxxx.',
           'phone.max' => 'SĐT không tồn tại.',
           'dob.required' => 'Ngày sinh không được để trống',
           'address.required' => 'Địa chỉ không được để trống',
           'email.required'=>'Email không được để trống.',
        //    'email.email' => 'Email phải đúng định dạng @.',
           'email.ends_with' =>'Email phải kết thúc bằng đuôi @gmail.com',
        //    'password.required' => 'Mật khẩu không được để trống ',
           
        //    'repassword.same' =>'Mật khẩu nhập lại phải trùng với mật khẩu nhập trước đó',
        //    'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
        //    'repassword.required'=>'Nhập lại mật khẩu không được để trống',
        //    'repassword.min' => "Mật khẩu nhập lại phải có ít nhất 6 kí tự",
        //    'image.required' => 'Hình ảnh không được để trống',
           
        ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $dob = $request->input('dob');
        $phone = $request->input('phone');
        $sex = $request->input('sex');
        $address = $request->input('address');
        $subject = $request->input('subject');
        $status = $request->input('status');
        $email = $request->input('email');
        // $password = $request->input('password');
        $note = $request->input('note');
        // $fileName = time().".".$request->file('image')->extension();

        // $request->file('image')->storeAs('public',$fileName);
        // $path = 'storage/'.$fileName;

        $rs = Student::processUpdate($id,$name,$dob,$phone,$sex,$address,$subject,$status,$email,$note);
        if($rs == 0){
            // return "Cấp nhật dữ liệu không thành công";
            return redirect('admin/student')->with('error','Cập nhật không thành công');
        }
        else{
            return redirect('admin/student')->with('success','Cập nhật thành công');
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
        
        $rs = Student::destroy($id);
        if($rs == 0){
            // return "Xóa dữ liệu không thành công";
            return redirect('admin/student')->with('error','Xóa không thành công');
        }
        else{
            return redirect('admin/student')->with('success','Xóa thành công');
        }
    }
}
