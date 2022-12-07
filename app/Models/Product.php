<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Data;

class Product extends Model
{
    public static function insert($data){
        if (Data::exists('products','name', $data['name'])) {
            $product = DB::table('products')->select('wh_amount')->where('name', $data['name'])->first();
            $newAmount = $product->wh_amount + $data['amount'];
            $update=['wh_amount' => $newAmount];
            if(Data::updateFunction('products','name', $data['name'],$update)){
                return true;
            }else{
                return false;
            }           
        }else{
            if(Data::insert('products',$data)){
                return true;
            }else{
                return false;
            }
        }
    }
    public static function del($id){
            if(DB::table('products')->where('id', $id)->delete()){
                return true;
            }
        }
    public static function edit($id,$data){
        if(Data::updateFunction("products","id",$id,$data)){
            return true;
        }
        return redirect('adminList');
    }
}