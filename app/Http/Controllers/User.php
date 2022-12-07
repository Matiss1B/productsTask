<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Data;



class User extends Controller
{
    public function checkAdmin(){
            request()->validate([
                'adminUser'=> 'required|max:30|min:5',
                'adminPass'=> 'required|max:30|min:5',
            ]);
            $data = [
                "username"=> request('adminUser'),
                "password"=> request('adminPass'),
            ];
            if(Users::admin($data)){
                return view('list',[
                    "products" => Data::fetchAll("products"),
                    "categorys" => Data::fetchAll("category"),
                ]);
            }else{
                return back();
            }

    }
    public function checkUser(){
        request()->validate([
            'user'=> 'required|max:30|min:5',
            'pass'=> 'required|max:30|min:5',
        ]);
        $data = [
            "username"=> request('user'),
            "password"=> request('pass'),
        ];
        if(Users::login($data)){
            return view('productList',[
                "products" => Data::fetchAll("products"),
                "categorys" => Data::fetchAll("category"),
                "colors" =>Data::fetchCol("products","color")->distinct()->get(),
            ]);
        }else{
            return back();
        }

    }
    public function register(){
        request()->validate([
            'username'=> 'required|max:30|min:5|unique:users',
            'password'=> 'required|max:30|min:5',
            'confirm'=> 'required|max:30|min:5',

        ]);
        $data=[
            'username'=>request('username'), 
            'password' =>request('username'), 
            "confirm"=> request('confirm'),
        ];
        if(Users::register($data)){
            return redirect('login');
        }else{
            ddd("Err");
        }
    }

            
}
