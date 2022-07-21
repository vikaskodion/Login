<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Posts;
use App\Models\UserReview;

class PostsController extends Controller
{
    public function postForm(Request $request)
    {
        return view("post_form");
    }
    public function savePost(Request $request)
    {
        //print_r($request->all());die;
        //validation rules
        $request->validate([
            'postname' =>'required|min:4|string|max:255',
            'postslug'=>'required|min:4|string|max:255',
            'posttag' => 'required|min:4|string|max:255',
            'smalldes' => 'required|min:4|string|max:255',
            'detaildes' => 'required|min:4|string|max:255',
        ]);
        // print_r($request->all()); die;
        $posts = new Posts;
        $posts->post_name = $request['postname'];
        $posts->post_slug = $request['postslug'];
        $posts->post_tag = $request['posttag'];
        $posts->small_desc = $request['smalldes'];
        $posts->detailed_desc = $request['detaildes'];
        $posts->save();
        
        return redirect(route('posts_list'))->with('message','Profile Updated');
      
    }

    public function viewPosts(){

        if(Auth::user()->role==2 || Auth::user()->role==1){
            $posts = Posts::paginate(2);
            return view('posts_list',['posts'=>$posts]);
        }
        else{
            return view('home');
        }
        
    }

    public function post_edit($id){
       $data =  Posts::where("id",$id)->first();
        if(Auth::user()->role==2|| Auth::user()->role==1){
            return view('post_edit',compact('data'));
        }

    }
    
    public function delete($id)
    {
        //echo $id; die;
        $user = Posts::find($id);
        $user->delete();
        //return redirect('posts-list')->with('status','user Delete Sucessfully');
        return redirect(route('posts_list'))->with('status','user Delete Sucessfully');
    }

    public function approvePost($id)
    {
        //validation rules
        $validator = \Validator::make(compact("id"), [
            'id' =>'required|numeric|exists:posts,id'
        ]);
 
        if ($validator->fails()) {
            return redirect(route('posts_list'))
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $post = Posts::where('id',$id)->first();
        $post->post_status = 1;
        $post->update();
        
        return redirect()->route('posts_list')->with('message','Post Approved');
      
    }

    
    public function post($slug){
        $data =  Posts::where("post_slug",$slug)->first();  
        if(Auth::user()->role==2|| Auth::user()->role==1){
            $rev_data = UserReview::where("post_id",$data["id"])->paginate(5);
            return view('post',compact('data', 'rev_data'));
        }       
    }

    public function saveReview(Request $request){
        $request->validate(
            [
                'rating' => 'required',
                'comment' => 'required'
            ]
        );
        
        $posts = new UserReview;
        $posts->user_id = Auth::user()->id;
        $posts->post_id = $request['post_id'];
        $posts->rating = $request['rating'];
        $posts->comment = $request['comment'];
        $posts->save();
    }

    public function test(){
        $posts = Posts::all()->toArray();
        return view('test',['posts' => $posts]);
    }

    public function archive($id){
        $post = Posts::where('id',$id)->first();
        $post->post_status=2;
        $post->save();
        return redirect()->route('posts_list');
    }

    public function deleteComment($review_id){
    
        $comment= UserReview::where('id',$review_id)->delete();

    }

}

