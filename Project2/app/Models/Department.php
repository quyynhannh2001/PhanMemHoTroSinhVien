<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;

    static function index(){
        return DB::table('department')->get();
    }
    static function create(){
        return DB::table('department')->get();
    }
    static function store($id,$name,$phone,$email,$note){
        return DB::table('department')->insert(['id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,'note'=>$note]);
    }
    static function get($id){
        $rs = DB::table('department')->where('id','=',$id)->get();
        if(count($rs)==1) return $rs[0];
        else return NULL;
    }
    static function processUpdate($id,$name,$phone,$email,$note){
        return DB::table('department')->where('id','=',$id)->update(['id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,'note'=>$note]);
    }
    static function destroy($id)
    {
        return DB::table('department')->delete($id);
    }
   
}
