<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rstudent extends Model
{
    use HasFactory;

    public $timestamps = true;

    static function store($data){
        return DB::table('requestt')->insert($data);
    }
    static function xoa($active,$id){
        return DB::table('requestt')->where('id','=',$id)->update(['active'=>$active]);
        // $rs = "UPDATE requestt SET active = 1 WHERE id = '$id'";
        // return $rs;
    }

    
}
