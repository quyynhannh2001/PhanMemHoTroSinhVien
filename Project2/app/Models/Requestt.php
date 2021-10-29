<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Requestt extends Model
{
    use HasFactory;

    static function getIndex(){
        // $requests = DB::table('requestt')->where('student_id', Auth::id())->get();
        // return $requests;
        
        return DB::table('requestt')->get();
        // ->join('department','requestt.dept_id','=','department.id')
        // ->select('requestt.*','department.*')->get();
        //DB::table('requestt')->where('status',0)->get(); cac yeu cau chua duoc giai quyet
    }
    static function getRstudent(){
        $id = Auth::guard('student')->user()->id;
        $requests = DB::table('requestt')->where('student_id', $id)->where('active','=',NULL)->get();
        // $requests = DB::table('requestt')->get();
        // dd($requests);
        return $requests;
        // return DB::table('requestt')->get();
        //DB::table('requestt')->where('status',0)->get(); cac yeu cau chua duoc giai quyet
    }
    static function getBan(Request $request){
       
        
        return DB::table('requestt')
        ->join('department','requestt.dept_id','=','department.id')
        ->select('requestt.*','department.id as department_id','department.name')
        ->where('dept_id',$request->searchBan)
        ->get();
        //DB::table('requestt')->where('status',0)->get(); cac yeu cau chua duoc giai quyet
    }


    // huong dan them - START
    static function getAllSupport() {
        $id = Auth::guard('support')->user()->id;
        //lay ra dept_id cua nguoi dung dang dang nhap
        $rs = DB::table('userr')
            ->join('department','userr.dept_id','=','department.id')
            ->select('userr.*','department.id as department_id')
            ->where('userr.id','=',$id) // thay 1 thanh Auth::id() sau khi lam Auth  
            // ->where('userr.id','=',)
            ->first();
            // dd($rs);
        //Lay toan bo request theo dept_id (chi xem duoc request cua bo phan ma user thuoc ve)
        $requests = DB::table('requestt')->where('dept_id', $rs->department_id)->get();
        return $requests;
    }
    static function getById($id){
        $rs = DB::table('requestt')
            ->join('department','requestt.dept_id','=','department.id')

            ->select('requestt.*','department.name as deparment_name')
            ->where('requestt.id','=',$id)
            ->get();
        if(count($rs)==1) return $rs[0];
        else return NULL;
    }
    static function getStt(){
        $id = Auth::guard('support')->user()->dept_id;
        return DB::table('requestt')
        
        // ->where('userr.id','=',$id) // thay 1 thanh Auth::id() sau khi lam Auth  
        ->where('requestt.status','=',0)
        ->where('requestt.dept_id','=',$id)
            // ->where('userr.id','=',)
        ->get();
    }
    // huong dan them - END
    static function processUpdate($id,$reply,$status,$user_id,$current_datetime){
        // dd($reply);
       $rs =  DB::table('requestt')
       ->where('id','=',$id)
       ->update([
           'reply'=>$reply,
           'status'=>$status,
           'user_id'=>$user_id,
           'updated_at'=>$current_datetime]);
    }
    static function destroy($id)
    {
        return DB::table('requestt')->delete($id);
    }
    // static function show($reply){
    //     return DB::table('requestt')->whereNotNull('reply')->get();
    // }
    
    //     static function show()
    // {
    //     return DB::table('requestt')->where('status','=',1)->get();
    // }
    static function getDate(){
        
        return DB::table('requestt')->select('created_at')->get();

    }
    public function department(){
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    // public function solved(Request $request){
    //     return DB::table('requestt')->where('status',0)->get();
    // }
    // public function notsolved(Request $request){
    //     return DB::table('requestt')->where('status',1)->get();
    // }
    static function getSolved(){
        
        return DB::table('requestt')->where('status',1)->get();

    }
    static function getNotSolved(){

        
        return DB::table('requestt')->where('status',0)->get();

    }
}