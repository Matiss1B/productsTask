<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Data;

class Users extends Model
{
    public static function admin($data){
        if (Data::exists("users","username",$data['username']) && Data::exists("users","password",$data['password'])) {
            $user = DB::table('users')->select('id')->where('username',$data['username'])->first();
            request()->session()->put('admin_id', $user->id);
            return true;
        }else{
            return false;
        }
    }
    public static function login($data){
        if (Data::exists("users","username",$data['username']) && Data::exists("users","password",$data['password'])) {
            $user = DB::table('users')->select('id')->where('username',$data['username'])->first();
            request()->session()->put('user_id', $user->id);
            return true;
        }else{
            return false;
        }
    }
    public static function register($data){
        if($data['password'] == $data['confirm']){
            $data = [
                "username"=> $data['username'], 
                "password" => $data['password'], 
            ];
            if(Data::insert('users',$data)){
                return true;
            };
        }else{
            return false;
        }
    }
}
