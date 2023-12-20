<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //create customer page
    public function create(){
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        // dd($posts['total']);
        return view('create',compact('posts'));
    }

    // post create
    public function postCreate(Request $request){

        $this->postValidationCheck($request);
        $data = $this->getPostData($request);
        Post::create($data); // Insert into database
        return redirect()->route('post#createPage')->with(['insertSuccess'=>'Post ဖန်တီးခြင်းအောင်မြင်ပါသည်!']);

        // return back();
        // return view('create');
        // return redirect(); (it's for URL)

    }

    //post Delete

    public function postDelete($id){
        //First Way
        // Post::where('id',$id)->delete();

        //Second Way
        $post = Post::find($id)->delete();

        return redirect()->route('post#createPage')->with(['deleteSuccess'=>'Delete လုပ်ခြင်းအောင်မြင်ပါသည်']);

    }

    //update

    public function updatePage($id){
        $post = Post::where('id',$id)->get()->toArray();
        //$post = Post::where('id',$id)->first()->toArray();
        return view('update',compact('post'));
    }

    //edit post

    public function editPage($id){
        $post = Post::where('id',$id)->get()->toArray();
        return view('edit',compact('post'));
    }

    //update post
    public function update(Request $request){
        $this->postValidationCheck($request);
        $updateData = $this->getPostData($request);
        $id = $request->postID;
        Post::where('id',$id)->update($updateData); // Must be Array Format
        return redirect()->route('post#createPage')->with(['UpdateSuccess'=>'Update လုပ်ခြင်းအောင်မြင်ပါသည်']);
    }


    // get post data
    private function getPostData($UserInput){
        $response = [
            'title' => $UserInput->postTitle,
            'description' => $UserInput->postDescription,
        ];

        return $response;
    }

    //post Validation Check
    private function postValidationCheck($request){
        $validationRules = [
            'postTitle' => 'required|min:5|unique:posts,title',
            'postDescription'=> 'required|min:5'
        ];

        $validationMessage = [
            'postTitle.required' => 'Post Title ဖြည့်ရန်လိုအပ်ပါသည်',
            'postDescription.required' => 'Post Description ဖြည့်ရန်လိုအပ်ပါသည်',
            'postTitle.unique' => 'Post Title ခေါင်းစဉ် တူနေသည် ထပ်မံကြိုးစားကြည့်ပါ'
        ];

        Validator::make($request->all(),$validationRules,$validationMessage)->validate();

        //Old Way
        // $validator = Validator::make($request->all(),[
        //     'postTitle' => 'required|min:5|unique:posts,title',
        //     'postDescription' => 'required',
        // ]);

        // if($validator->fails()){
        //     return back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
    }

}
