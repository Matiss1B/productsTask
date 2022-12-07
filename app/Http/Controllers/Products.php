<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Product;

class Products extends Controller
{
    public function insert(){
        request()->validate([
            'name'=> 'required|max:30|min:3',
            'category'=> 'required|max:30',
            'desc'=> 'required',
            'weight'=> 'required|max:30',
            'amount'=> 'required|max:30',
            'color'=> 'required|max:20',
            'size'=> 'required|max:20',
            'shipping'=> 'required|max:30',
            'price'=> 'required|max:30',
        ]);
        $data = [
            "name"=>request('name'),
            "category_id"=>request('category'),
            "description"=> request('desc'),
            "img" => request()->file('img')->store('images'),
            "weight" => request('weight'),
            "amount" => request('amount'),
            "color" => request('color'),
            "size" => request('size'),
            "shipping" => request('shipping'),
            "price" => request('price'),
            "is_avaliable" => "1",
            "wh_amount" => request('amount'),


        ];
         if (Product::insert($data)){
            return back();
        }else{
            redirect("adminList");
        }
    }
    public function delete($id){
        $data=[
            "id"=>$id,
        ];
        if(Product::del($data)){
            return back();
        }
    }
    public function edit($id){
        return view('edit',[
            "products" => Data::where("products","id",$id),
            "categorys"=>Data::fetchAll("category"),
        ]);
    }
    public function editProduct($id){
        request()->validate([
            'name'=> 'required|max:30|min:3',
            'category'=> 'required|max:30',
            'desc'=> 'required',
            'weight'=> 'required|max:30',
            'amount'=> 'required|max:30',
            'color'=> 'required|max:20',
            'size'=> 'required|max:20',
            'shipping'=> 'required|max:30',
            'price'=> 'required|max:30',
        ]);
        $data = [
        "id"=>$id,
        "name" => request('name'),
        "category_id" => request('category'),
        "description" => request('desc'),
        "weight" => request('weight'),
        "amount" => request('amount'),
        "color" => request('color'),
        "size" => request('size'),
        "shipping" => request('shipping'),
        "price" => request('price'),
        ];
        if(Product::edit($id,$data)){
        return redirect('adminList');
        }
    }

}
