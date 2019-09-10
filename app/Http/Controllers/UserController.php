<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(){
		return view('userlogin');
    }	
    
    public function signup(){
		return view('signup');
    }	

    public function home(){
        return view('home');
    }

    public function showcart(){
        return view('showcart');
    }

    public function checkuser(Request $request){
        $request->validate([
			'username'=>'required',
			'password'=>'required'
		]);
		
        
        $username = $request->input('username');
		$password = $request->input('password');
	

		//After validation 
		$result = \DB::table('users')
				->select('id','email','password')
				->where('email', '=', $username)
				->where('password', '=', md5($password))
				->get();
				
		if(count($result)>0){			
			session(['username'   => $username]);
					
			return redirect('user/showcart');
		}
		else{
			return redirect('user/')->with('invalid_login', 'Invalid Credentials !');
		}
	
    }

    public function insertuser(Request $request){
        $user = new User();

        $request->validate([
			'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobileno'=>'required',
            'address'=>'required',
        ]);
        
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = md5($request->password);
        $user->mobileno = $request->mobileno;
        $user->address  = $request->address;

        $user->save();
        return redirect('user/signup')->with('success', 'User Added Successfully');
    }
    
}
