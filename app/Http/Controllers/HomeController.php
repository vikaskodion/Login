<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
     public function edit($id)
    {
     
        return view('edit');
    }
    public function edit_user(Request $request)
    {
       // echo $id;die;
            //validation rules
        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'lastname'=>'required|min:4|string|max:255',
            'role' => 'required|in:1,2,3'
        ]);
        // print_r($request->all()); die;
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->role = $request['role'];
        $user->update();
        if(Auth::user()->role==1)
        {
            return redirect()->route('users_list')->with('message','Profile Updated');
        } 
        else
        {
            return redirect()->route('home')->with('message','Profile Updated');
        }
        
      
    }

    public function user_list($id)
    {
        if(Auth::user()->role!=1)
        {
            return redirect('edit');
        }
        else
        {
            
        $user = User::find($id);
        return view ('listedit',['user'=>$user]);
        }
    }

    public function delete($id)
    {
        //echo $id;die;
        $delete = User::find($id)->delete();
        return redirect()->route('userlist');
    }
    
}


 