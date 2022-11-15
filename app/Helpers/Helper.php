<?php
namespace App\Helpers;
use DB;

class Helper{
	public static function connectionScheme($model_table,$is_model = 0)
    {
        $conn = 'mysql';
        if(env('IS_ONE_CONNECTION','no') == 'yes'){
           
        }
        if($is_model){
            $query = $model_table::on($conn);
        }else{
            $query = DB::Connection($conn)->table($model_table);
        }
        return $query;
    }

    public static function insert_exception($type,$ex)
    {
      $lastInsertId = \App\Helpers\Helper::connectionScheme('tbl_exception',0)->insert(['exception'=>$ex,'type'=>$type]); 
      
    }

    
}
?>