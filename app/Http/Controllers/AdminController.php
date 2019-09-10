<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;

class AdminController extends Controller
{
    public function login(){
        return view('adminlogin');
    }


    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect('/admin')->with('status','Logged out successfully');
    }

    /*
		Function to check the login user
	*/
	
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

        // dd($result);

		if(count($result)>0){			
			session(['username'   => $username]);
			// if($result[0]->usertype == 2){
			// 	return redirect('user/adminaddress');
			// }			
			return redirect('admin/addproduct');
		}
		else{
			return redirect('admin/')->with('invalid_login', 'Invalid Credentials !');
		}
	
    }
    

    // To Add category
    public function addcategory(Request $request){
        
        return view('addcategory');
    }

    public function insertcategory(Request $request){
        $category = new Category();

        $request->validate([
			'title'=>'required',
        ]);
        
        $category->name = $request->title;
        $category->save();
        return redirect('/admin/addcategory')->with('status', 'Category Added Successfully !');
    }



    // To Add Products
    public function addproduct(Request $request){
        return view('addproduct');
    }

    public function insertproduct(Request $request){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'description'=>'required',
            'image'=>'required',
            'price'=>'required',
        ]);

        $product = new Products();

        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file_ext = $file->getClientOriginalExtension();
        $fileInfo = pathinfo($file_name);
        $filename = $fileInfo['filename'];

        $destinationPath = public_path('uploads');
        if(!empty($file)){
            $file->move($destinationPath,$file_name);
        }
        
     

        $product->title = $request->input('title');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->image = 'uploads/'.$file_name;
        $product->price = $request->input('price');

        $product->save();

        return redirect('/admin/addproduct')->with('status', 'Product Added Successfully !');
    }

    /* Show Categories */

    public function showcategory(Request $request){
        $categories = Category::all();
        return view('showcategory')->with('categories',$categories);
    }

    public function showproduct(Request $request){
        $products = Products::all();
        return view('showproducts')->with('products',$products);
    }

}
