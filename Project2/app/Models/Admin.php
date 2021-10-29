<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = "admins";
    protected $guarded = "admin";
    protected $fillable =[
        'email','password','name'
    ];
    protected $hidden = [
        'password',
    ];
    // public function getAuthPassword() {
    //     return $this->password;
    // }
    // static function getIndex(){
    //     return DB::table('admins')->get();
    // }
}
