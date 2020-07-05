<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function create(){
        return view('admin\post.createPost');
    }

    public function postStore(Request $request){

        $validatedData = $request->validate([
            'contentTitle' => 'required | max:255 |unique:contents',
            'details' => 'required | max:500',
            'publishSection' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
        ]);

        $data=array();
        $data['contentTitle']=$request->contentTitle;
        $data['contentDetails']=$request->details;
        $data['contentType']="post";
        $data['publishSection']=$request->publishSection;
        $data['status']="no";

        $image = $request->file('image');

        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['contentLink'] = $image_url;

            $select = DB::table('contents')->insert($data);


            if($select){
                $notification=array(
                    'message'=>'Successfully post created',
                    'alert-type'=>'success'
                );

                return  Redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'message'=>'Something is wrong',
                    'alert-type'=>'error'
                );
                return  Redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
                'message'=>'Something is wrong',
                'alert-type'=>'error'
            );
            return  Redirect()->back()->with($notification);
        }
    }

    public function createVideo(){
        return view('admin\post.createVideo');
    }

    public function videoStore(Request $request){

        $validatedData = $request->validate([
            'contentTitle' => 'required | max:255 |unique:contents',
            'details' => 'required | max:500',
            'publishSection' => 'required',
            'contentLink' => 'required | unique:contents,contentUrl'
        ]);

        $data=array();
        $data['contentTitle']=$request->contentTitle;
        $data['contentDetails']=$request->details;
        $data['contentType']="video";
        $data['publishSection']=$request->publishSection;
        $data['status']="no";

        //store the URL into a variable
        $url = $request->contentLink;
        //extract the ID
        preg_match(
                '/[\?\&]v=([^\?\&]+)/',
                $url,
                $matches
            );

        $id = $matches[1];


        $data['contentLink'] = "https://www.youtube.com/embed/$id";
        $data['contentUrl'] = $url;

        $select = DB::table('contents')->insert($data);


        if($select){
            $notification=array(
                'message'=>'Successfully post created',
                'alert-type'=>'success'
            );

            return  Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something is wrong',
                'alert-type'=>'error'
            );
            return  Redirect()->back()->with($notification);
        }

    }

    public function show(){
        return view('admin/post.publishPost');
    }

    public function getData(){

       $data=DB::table('contents')->where('status','=','no')->get();

        return Datatables::of($data)->addColumn('action', function($data){

            return  '<a onclick ="publishData('.$data->id.')" class="btn btn-success text-white">Publish</a>';
        })->make(true);
    }

    public function update($id){

        $update = DB::table('contents')
              ->where('id', $id)
              ->update(['status' => "yes"]);

        return response()->json(['success'=>'Record is successfully updated.']);
    }

    public function showUnPublish(){

        return view('admin/post.unPublishPost');
    }

    public function getPublishPostData(){
        $data=DB::table('contents')->where('status','=','yes')->get();

        return Datatables::of($data)->addColumn('action', function($data){

            return  '<a onclick ="unPublishData('.$data->id.')" class="btn btn-success text-white">UnPublish</a>';
        })->make(true);
    }

    public function updateUnpublish($id){

        $update = DB::table('contents')
              ->where('id', $id)
              ->update(['status' => "no"]);

        return response()->json(['success'=>'Record is successfully updated.']);
    }


}
