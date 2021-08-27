<?php


namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Cache;
use App\Models\Admin\Country;




class ElementRepository
{
    public function fetchAll()
    {
        // return Cache::set('items',Country::all());
        // if(empty (Cache::has('items'))){
        //     return Cache::set('items',Country::all());
        // }
        // else{

            //     return Cache::remember('items',30);
        // return Cache::forget('items');
        return Cache::remember('items', 100, function () {
            return Country::all();
            // Cache::insert($data);
        }); 
        // return $country;
        //   return response()->json(['items' => $country]);

    }

    public function show()
    {
        
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
       
    }
}
