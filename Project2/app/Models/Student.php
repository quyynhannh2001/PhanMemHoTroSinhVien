<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{
    use HasFactory;
    protected $table = "student";
    // protected $guarded = "student";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable =[
        'id','password','name','dob','phone','sex','address','subject','status','email','image','note'
    ];
    protected $hidden = [
        'password',
    ];
    static function index(){
        return DB::table('student')->get();
    }
    static function create(){
        return DB::table('student')->get();
    }
    static function storeStudent($data){
        // dd($data);
        return DB::table('student')->insert($data);
    }
    static function get($id){
        $rs = DB::table('student')->where('id','=',$id)->get();
        if(count($rs)==1) return $rs[0];
        else return NULL;
    }
    static function processUpdate($id,$name,$dob,$phone,$sex,$address,$subject,$status,$email,$note){
        return DB::table('student')->where('id','=',$id)->update(['id'=>$id,'name'=>$name,'dob'=>$dob,'phone'=>$phone,'sex'=>$sex,'address'=>$address,'subject'=>$subject,'status'=>$status,'email'=>$email,'note'=>$note]);
    }
    static function destroy($id){
        return DB::table('student')->delete($id);
    }
   
}
