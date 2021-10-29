<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Userr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userr = Userr::index();
        return view('userr.index',['userr'=>$userr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::index();

        return view('userr.create',['department'=>$department]);

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
            'dept_id' =>'bail|required',
            'status' =>'bail|required',
            'email' => 'bail|required|ends_with:@gmail.com',
            'password' =>'bail|required|min:6',
            'repassword'=>'bail|required|same:password|min:6|',
            'image'=>'bail|required',
        ],[
           'id.required'=>'Mã HTV không được để trống.', 
           'id.min'=>'Mã HTV phải có ít nhất 4 kí tự.',
           'name.required'=>'Tên HTV không được để trống.',
           'phone.required'=>'SĐT HTV không được để trống.',
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
        $id = $request -> input('id');
        $name = $request -> input('name');
        $dob = $request -> input('dob');
        $phone = $request -> input('phone');
        $sex = $request -> input('sex');
        $address = $request -> input('address');
        $dept_id = $request -> input('dept_id');
        $status = $request -> input('status');
        $email = $request -> input('email');
        $password = Hash::make($request->input('password'));
        $note = $request -> input('note');
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
                    'dept_id'=>$dept_id,
                    'status'=>$status,
                    'email'=>$email,
                    'password'=>$password,
                    'image'=>$path,
                    'note'=>$note]; 
        $rs = Userr::storeUserr($data);
        return redirect(route('admin.userr.index'))->with('success','Thêm mới thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::index();
        $userr = Userr::get($id);
        if($userr == NULL){
            return "Không có hỗ trợ viên có MHTV = ".$id;
        }
        else return view('userr.details',['userr'=>$userr, 'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::index();
        $userr = Userr::get($id);
        if($userr == NULL){
            return "Không có hỗ trợ viên có MHTV = ".$id;
        }
        else return view('userr.edit',['userr'=>$userr, 'department'=>$department]);
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
            'dept_id' =>'bail|required',
            'status' =>'bail|required',
            'email' => 'bail|required|ends_with:@gmail.com',
            // 'password' =>'bail|required|min:6',
            // 'repassword'=>'bail|required|same:password|min:6|',
            // 'image'=>'bail|required',
        ],[
           'id.required'=>'Mã HTV không được để trống.', 
           'id.min'=>'Mã HTV phải có ít nhất 4 kí tự.',
           'name.required'=>'Tên HTV không được để trống.',
           'phone.required'=>'SĐT HTV không được để trống.',
           'phone.regex' => 'SĐT phải có định dạng 0xx-xxx-xxxx.',
           'phone.max' => 'SĐT không tồn tại.',
           'dob.required' => 'Ngày sinh không được để trống',
           'address.required' => 'Địa chỉ không được để trống',
           'email.required'=>'Email không được để trống.',
        //    'email.email' => 'Email phải đúng định dạng @.',
           'email.ends_with' =>'Email phải đúng định dạng @gmail.com',
        //    'password.required' => 'Mật khẩu không được để trống ',
           
        //    'repassword.same' =>'Mật khẩu nhập lại phải trùng với mật khẩu nhập trước đó',
        //    'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
        //    'repassword.required'=>'Nhập lại mật khẩu không được để trống',
        //    'repassword.min' => "Mật khẩu nhập lại phải có ít nhất 6 kí tự",
        //    'image.required' => 'Hình ảnh không được để trống',
           
        ]);
        $id = $request -> input('id');
        $name = $request -> input('name');
        $dob = $request -> input('dob');
        $phone = $request -> input('phone');
        $sex = $request -> input('sex');
        $address = $request -> input('address');
        $dept_id = $request -> input('dept_id');
        $status = $request -> input('status');
        $email = $request -> input('email');
        // $password = $request -> input('password');
        $note = $request -> input('note');
        // $fileName = time().".".$request->file('image')->extension();
        // $request->file('image')->storeAs('public',$fileName);
        // $path = 'storage/'.$fileName;

        $rs = Userr::processUpdate($id,$name,$dob,$phone,$sex,$address,$dept_id,$status,$email,$note);
        if($rs == 0){
            // return "Cập nhật dữ liệu không thành công";
            return redirect('admin/userr')->with('error', 'Cập nhật không thành công');
        }
        else{
            return redirect('admin/userr')->with('success', 'Cập nhật thành công');
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
        $rs = Userr::destroy($id);
        if($rs == 0){
            // return "Xóa dữ liệu không thành công";
            return redirect('admin/userr')->with('error','Xóa không thành công');
        }
        else{
            return redirect('admin/userr')->with('success','Xóa thành công');
        }

    }
}
