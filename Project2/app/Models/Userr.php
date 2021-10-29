<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Userr extends Authenticatable
{
    use HasFactory;
    protected $table = "userr";
    // protected $guarded = "student";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable =[
        'id','password','name','dob','phone','sex','address','dept_id','status','email','image','note'
    ];
    protected $hidden = [
        'password',
    ];
    static function index(){
        return DB::table('userr')->get();
    }
    static function create(){
        return DB::table('userr')->get();
    }
    static function storeUserr($data){
        return DB::table('userr')->insert($data);
    }
    static function get($id){
        $rs = DB::table('userr')->where('id','=',$id)->get();
        // ->join('department','userr.id', '=', 'department.id')
        //     ->where('userr.id','=',$id)
        // ->select('userr.*','department.id','department.name')
        // ->get();

        if(count($rs)==1) return $rs[0];
        else return NULL;
        
        
    }
    static function processUpdate($id,$name,$dob,$phone,$sex,$address,$dept_id,$status,$email,$note){
        return DB::table('userr')->where('id','=',$id)->update(['id'=>$id,'name'=>$name,'dob'=>$dob,'phone'=>$phone,'sex'=>$sex,'address'=>$address,'dept_id'=>$dept_id,'status'=>$status,'email'=>$email,'note'=>$note]);

    }
    static function destroy($id)
    {
        return DB::table('userr')->delete($id);
    }
}
