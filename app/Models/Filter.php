<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\User;


class Filter
{
    public static function clear(){
        $product = Data::fetchAll('products');
        return $product;
    }
    public static function filter($keywords, $criteries,$sortBy,$sortCol, $from,$to){
        if($sortBy == "price" or $sortBy == "date" ){
            $sort = 'DESC';
        }else{
            $sort = 'ASC';
        }
        $array =[];
        $keywords = explode (",", $keywords);
        $criteries = explode (",", $criteries);
         $product = DB::table('products')->select('*')->whereBetween('price', [$from, $to])->whereIn('color',$keywords);
         foreach ($criteries as $key => $critery) {
             $product->orWhereIn($critery,$keywords);
         }
          return $product->get();
         
    }
    public static function sort($sortBy, $sortCol){
        if($sortBy == "price" or $sortBy == "date" ){
            $sort = 'DESC';
        }else{
            $sort = 'ASC';
        }
        $product = DB::table('products')->select('*')->orderBy($sortCol,$sort)->get();
        return $product;

    }
    public static function adminFilter($keywords,$amount){
        $keywords = explode (",", $keywords);
        foreach($keywords as $keyword){
        $product = DB::table('products')->select('*')->where('category_id',$keyword)->orWhere('amount',$amount)->orWhere('timestamp','like','%'.$keyword.'%')->get();
        }
        return $product;

    }
    public static function search($search){
        $product = DB::table('products')->select('*')->where('name','like','%'.$search.'%')->get();
        return $product;
    }
}
// $product = DB::table('products')->select('price')->foreach ($columns as $color){
//     orWhere('color',$color)
// }->orderBy('price', 'asc')->get();