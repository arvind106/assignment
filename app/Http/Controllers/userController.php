<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
   
    public function index(Request $request) {
       $data = User::all();
       //dd($user);
       
       return view('welcome', ['data'=>$data]);
    }

    public function create() {
        $data = [
            'title' => 'Create User'
        ];
        return view('index', $data);
    }

    public function store(Request $request) {

        dd($request);

       
    }

    public function edit($id = NULL) {

    
    }

    public function update(Request $request, $id) {

       
    }

    public function destroy(Request $request, $id = NULL) {
       
    }
}
