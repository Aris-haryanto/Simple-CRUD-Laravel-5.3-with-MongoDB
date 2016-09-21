<?php

namespace App\Http\Controllers;

use App\Models\PrimaryModels as Moloquent;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Input, Redirect;

class PrimaryController extends Controller
{
    function index(){
        return Redirect::to('home');
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
    function deleteAll(){
        
        $return = Moloquent::where('_id','!=','')->delete();
        
        return Redirect::to('home');

    }
    
    function generateFake(Request $request){
        $count = $request->input('fakedata');

        if($count < 1000){
        	$faker = Faker::create();
    		for ($i=1; $i <= $count; $i++) {
    			$user = new Moloquent;
    			$user->username = $faker->name;
    			$user->email = $faker->email;
                $user->address = $faker->address;
    			$user->save();
    		}
        }
        return Redirect::to('home');
    }
    
}
