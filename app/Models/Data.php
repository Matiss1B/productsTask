<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public static function fetchAll($table){
        return DB::select("SELECT * FROM $table");
    }
    public static function where($table, $where, $keyword){
        return DB::select("SELECT * FROM $table WHERE $where = $keyword");
    }
    public static function fetchCol($table,$col){
        return DB::table($table)->select($col);
    }
    public static function exists($table, $where, $keyword){
       return DB::table($table)->where($where, $keyword)->exists();
    }
    public static function insert($table, $data){
        if(DB::table($table)->insert($data)){
            return true;
        }else{
            return false;
        }
    }
    public static function updateFunction($table, $where, $keyword, $data){
        if(DB::table($table)->where($where, $keyword)->update($data)){
           return true;
       }else{
           return false;
       }
    }
}
