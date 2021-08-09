<?php

namespace App\Http\Helper\Admin;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ListingHelper
{
    // check if value exists
    public static function is_val($var, $key = null, $default = null) {
        if( empty($key) ) {
            if( isset($var) && !empty($var) )
                return $var;
            else
                return $default;
        }
        else {
            if( is_array($var) && array_key_exists($key, $var) )
                return self::is_val($var[$key], null, $default);
            else if( is_object($var) && isset($var->$key) )
                return self::is_val($var->$key, null, $default);
        }

        return $default;
    }

    public static function check_array_has_value($array){
        foreach ($array as $value){
            if($value !== '') return true;
        }
        return false;
    }

    public static function paginate_per_page($table_name = null) {
        $user_paginate_val = Setting::where('name', $table_name.'_paginate_per_page')->get()->first();
        return isset($user_paginate_val->value) && !empty($user_paginate_val->value) ? $user_paginate_val->value : '10';
    }

    public static function filter($table,$params,$query = null,$unset_keys = null){

        unset($params['page']);
        if(!self::check_array_has_value($params)) return $query;
        $search = isset($params['search']) ? $params['search'] : '';
        unset($params['search']);
        unset($params['is_archive']);

        $schema = Schema::getColumnListing($table);
        $schema = array_flip($schema);
        if($unset_keys){
            foreach ($unset_keys as $unset)
                unset($schema[$unset]);
        }

        foreach ($params as $key=>$param){
            //if($search) unset($schema[$key]); // Comment this if we want to ignore other fields from global search
            if($param == '') continue;
            if($query){
                $query = $query->where($key,$param);
            }else{
                $query = DB::table($table)->where($key,$param);
            }
        }
        if($search){
            $flag = false;
            if($query){
                $query = $query->where(function ($query) use ($search,$schema,$flag){
                    foreach ($schema as $column=>$key){
                        if(!$flag){
                            $flag = true;
                            $query = $query->where($column,'like',"%{$search}%");
                        }else{
                            $query = $query->orWhere($column,'like',"%{$search}%");
                        }
                    }
                });
            }else{
                foreach ($schema as $column=>$key){
                    if(!$flag){
                        $flag = true;
                        $query = DB::table($table)->where($column,'like',"%{$search}%");
                    }else{
                        $query = $query->orWhere($column,'like',"%{$search}%");
                    }
                }
            }
        }
        return $query;
    }
}
