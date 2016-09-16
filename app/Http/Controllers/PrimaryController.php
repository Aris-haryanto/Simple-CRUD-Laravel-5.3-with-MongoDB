<?php

namespace App\Http\Controllers;

use App\Models\PrimaryModels as Moloquent;
use Illuminate\Http\Request;
use Input, Redirect;

class PrimaryController extends Controller
{
    function index(){
        //We dont need this
    }

    function pages($template){
        $getAllData = Moloquent::all();
        return view($template, ['data_user' => $getAllData]);
    }

    function save(Request $request){
        $getTable = new Moloquent;
        $getTable->username = $request->input('username');
        $getTable->email = $request->input('email');
        $getTable->address = $request->input('address');
        $getTable->save();

        return Redirect::to('home')
                ->with('success','You have been successfully insert data');
    }

    function update(Request $request){
        $id = $request->input('id');
        
        $getTable = Moloquent::find($id);
        $getTable->username = $request->input('username');
        $getTable->email = $request->input('email');
        $getTable->address = $request->input('address');
        $getTable->save();
        
        return Redirect::to('home')
                ->with('success','You have been successfully update data');

    }
    function getdata($id){
        $getData = Moloquent::where('_id', $id)
                            ->get();
        
        $getAllData = Moloquent::all();
        
        return view('edit', ['get_user' => $getData, 'data_user' => $getAllData]);
    }
    function delete($id){
        
        $return = Moloquent::where('_id', $id)
                                ->delete();
        
        return Redirect::to('home')
                ->with('success','You have been successfully deleted data');

    }
    
    function createFaker(){
    	$faker = Faker::create();
		for ($i=1; $i < 2000000; $i++) {
			$user = new Moloquent;
			$user->name = $faker->name;
			$user->email = $faker->email;
			$user->save();
		}
    }
}
