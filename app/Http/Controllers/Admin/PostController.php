<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Model\custom_field\CustomField;
use App\Model\custom_field\CustomFieldValue;
use App\Model\custom_field\CustomFieldDetail;
use App\Model\Post;
use App\Model\Category;
use App\Form;
use Validator;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::where('parent_id','=', '0')->pluck('title', 'id');
        $posts= Post::orderby('updated_at', 'desc')->paginate(10);
        return view('admin.post',['posts'=>$posts, 'cat'=>$cat, 'subcat'=>array()]);
    }

    public function getsub(Request $r)
    {
        $main_category_id = $r->parent_id;
        $subcat = Category::where('parent_id','=', $main_category_id)->get();
        foreach ($subcat as $s) {
            echo "<option value='".$s->id."'>".$s->title."</option>";
        }
    }

    public function create()
    {
        $cat = Category::where('parent_id', '0')->orderBy('parent_id', 'asc')->get();
        $subcat = Category::where('parent_id','!=', '0')->orderBy('parent_id', 'asc')->get();
        $acf= CustomField::all();
        return view('admin.post_create', array('cat' => $cat,'acf'=>$acf, 'subcat'=>$subcat));
    }

    public function store(Request $request){
        $get_cf_name=(isset($request['cf_detail_name']) ? $request['cf_detail_name']  : "");
        $get_cf_type=(isset($request['cf_detail_type']) ? $request['cf_detail_type']  : "");
        $get_cf_value=(isset($request['cf_detail_value']) ? $request['cf_detail_value']  : "");
        $get_cf_file=(isset($request['cf_file']) ? $request['cf_file']  : "");
        // 'title', 'main_category_id', 'sub_category_id', 'short_description', 'feature_photo', 'detail_description', 'detail_photo', 'custom_field1', 'custom_field2', 'custom_field3', 'custom_field4', 'custom_field5'

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'main_category_id' => 'required',
            'short_description' => 'required',
            'feature_photo' => 'required',
            'detail_description' => 'required',
            // 'detail_photo' => 'required',
            'attach_file'=>'max:50000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
              ->withInput()
              ->withErrors($validator);
        }
        $structure= "upload/posts/";
        $feature_photo="";
        if($request->file('feature_photo')!=NULL){

          $file = $request->file('feature_photo');

          if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="JPG" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="PNG" || $file->getClientOriginalExtension()=="gif" || $file->getClientOriginalExtension()=="GIF"){

            $feature_photo = $file->getClientOriginalName();
            $file->move($structure, $feature_photo);
          }
        }


        $attach_file="";
        if($request->file('attach_file')!=NULL){

          $file = $request->file('attach_file');

          if($file->getClientOriginalExtension()=="pdf" || $file->getClientOriginalExtension()=="mp4"){

            $attach_file = $file->getClientOriginalName();
            $file->move($structure, $attach_file);
          }
        }

        $detail_photo="";
        if($request->file('detail_photo')!=NULL){

          $file = $request->file('detail_photo');

          if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="JPG" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="PNG" || $file->getClientOriginalExtension()=="gif" || $file->getClientOriginalExtension()=="GIF"){

            $detail_photo = $file->getClientOriginalName();
            $file->move($structure, $detail_photo);
          }
        }

        $arr=[
                'title' => $request->title,
                'main_category_id' => $request->main_category_id,
                'sub_category_id' => ($request->sub_category_id)?$request->sub_category_id : '0',
                'short_description' => ($request->short_description)? $request->short_description : '',
                'feature_photo' => $feature_photo,
                'attach_file' => $attach_file,
                'detail_description' => ($request->detail_description)? $request->detail_description : '',
                'detail_photo' => $detail_photo,
                'custom_field1' => ($request->custom_field1)? $request->custom_field1 : '', // for_ASO
                'custom_field2' => ($request->custom_field2)? $request->custom_field2 : '',
                'custom_field3' => ($request->custom_field3)? $request->custom_field3 : '',
                'custom_field4' => ($request->custom_field4)? $request->custom_field4 : '',
                'custom_field5' => ($request->custom_field5)? $request->custom_field5 : '',
            ];

            $post_id=Post::insertGetId($arr);

            $group['cfl_group_id']=$request['acf_group'];
            $group['post_id']=$post_id;

            // get acf_list_value
            if ($request['acf_group']!=0)
            {
                 $group['cf_value1']=($data->hasFile('cf_value1'))
                       ? PostController::img_name($data['cf_value1'])
                       : $data['cf_value1'];

                 $group['cf_value2']=($data->hasFile('cf_value2'))
                      ? PostController::img_name($data->cf_value2)
                      :$data['cf_value2'];

                 $group['cf_value3']=($data->hasFile('cf_value3'))
                      ? $group['cf_value3']= PostController::img_name($data->cf_value3)
                      : $data['cf_value3'];

                 $group['cf_value4']=($data->hasFile('cf_value4'))
                        ? PostController::img_name($data->cf_value4)
                        : $data['cf_value4'];

                 $group['cf_value5']=($data->hasFile('cf_value5'))
                        ? PostController::img_name($data->cf_value5)
                        : $data['cf_value5'];
                 //dd($group);
                 CustomFieldValue::insert($group);
          }

          if ($get_cf_type!="")
          {
                for ($i=0; $i <count($get_cf_type) ; $i++) {
                       $details['post_id']=$post_id;
                       $details['cf_name']=$get_cf_name[$i];
                       $details['cf_type']=$get_cf_type[$i];

                       if ($get_cf_type[$i]==4) {
                            $file = current($get_cf_file);
                            $photo=PostController::img_name($file);

                            $details['cf_value']=$photo;

                            array_shift($get_cf_file);
                       }

                       else {
                               $value = current($get_cf_value);
                               $details['cf_value']=$value;
                               array_shift($get_cf_value);
                       }

                       $post_details[]=$details;
                }

                CustomFieldDetail::insert($post_details);
            }

        return redirect()->route('admin.post');
    }

    function img_name($file)
    {
         $fileName = $file->getClientOriginalName();
         $destinationPath = "images/";

          if($fileName) {
               $file->move($destinationPath, $fileName);
           }

          return $fileName;
    }

    //update post by ASO
    public function edit($id)
    {
        $posts = Post::find($id);
        $cat = Category::where('parent_id', '0')->orderBy('parent_id', 'asc')->get();
        $subcat = Category::where('parent_id','!=', '0')->orderBy('parent_id', 'asc')->get();
        $cf_values=CustomFieldValue::where('post_id',$id)->first();
        $cf_details=CustomFieldDetail::where('post_id',$id)->get();

        $cf_lists=CustomField::all();
        $cfl_group_id=$cf_values['cfl_group_id'];
        $get_group_id=CustomField::where('id',$cfl_group_id);

        return view('admin.post_edit',compact('posts','cat','subcat','cf_values','cf_details','cf_lists','cf_lists','get_group_id'));
    }

    //store update post
    public function update($id, Request $request)
    {
        // $post= Post::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'main_category_id' => 'required',
            // 'short_description' => 'required',
            //'feature_photo' => 'required',
            // 'detail_description' => 'required',
            //'detail_photo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
              ->withInput()
              ->withErrors($validator);
        }


        $structure= "upload/posts/";
        $feature_photo="";
        if($request->file('feature_photo')!=NULL){

          $file = $request->file('feature_photo');

          if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="JPG" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="PNG" || $file->getClientOriginalExtension()=="gif" || $file->getClientOriginalExtension()=="GIF"){

            $feature_photo = $file->getClientOriginalName();
            $file->move($structure, $feature_photo);
          }
        }

        $attach_file="";
        if($request->file('attach_file')!=NULL){

          $file = $request->file('attach_file');

          if($file->getClientOriginalExtension()=="pdf"){

            $attach_file = $file->getClientOriginalName();
            $file->move($structure, $attach_file);
          }
        }

        $detail_photo="";
        if($request->file('detail_photo')!=NULL){

          $file = $request->file('detail_photo');

          if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="JPG" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="PNG" || $file->getClientOriginalExtension()=="gif" || $file->getClientOriginalExtension()=="GIF"){

            $detail_photo = $file->getClientOriginalName();
            $file->move($structure, $detail_photo);
          }
        }

        $arr=[
                'id'=>$id,
                'title' => $request->title,
                'main_category_id' => $request->main_category_id,
                'sub_category_id' => $request->sub_category_id,
                'short_description' => $request->short_description,
                'feature_photo' => $feature_photo,
                'attach_file' => $attach_file,
                'detail_description' => $request->detail_description,
                'detail_photo' => $detail_photo,
                'custom_field1' => ($request->custom_field1)? $request->custom_field1 : '',
                'custom_field2' => ($request->custom_field2)? $request->custom_field2 : '',
                'custom_field3' => ($request->custom_field3)? $request->custom_field3 : '',
                'custom_field4' => ($request->custom_field4)? $request->custom_field4 : '',
                'custom_field5' => ($request->custom_field5)? $request->custom_field5 : '',
            ];
        $post = Post::findOrFail($id);
        // $input = $request->all();
        $post->fill($arr)->save();

        return redirect()->route('admin.post');
    }
    //show post by id
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post_show',compact('post'));
    }
    //delete  post
    public function delete($id)
    {
      $post = Post::find($id)->delete();
      return redirect()->back()->with('success','Post is successfully deleted!');
    }

    public function search(Request $request)
    {
        $input = $request->all();
        $posts = new Post(); // for_ASO to check fixes this is more better in filter

        $subcat = array();

        if($request->get('search')){
            $posts = $posts->where("title", "LIKE", "%{$request->get('search')}%");
        }

        if($request->get('category_id')){
            $posts = $posts->where("main_category_id", "=", $request->get('category_id'));
            $subcat = Category::where('parent_id','=', $request->get('category_id'))->get();
        }

        if($request->get('sub_category_id')){
            $posts = $posts->where("sub_category_id", "=", $request->get('sub_category_id'));
        }

        $sub_category_id = ($request->get('sub_category_id'))? $sub_category_id = $request->get('sub_category_id') : '';

        $posts = $posts->orderby('updated_at', 'desc');
        $posts = $posts->paginate(10);
        $cat = Category::where('parent_id','=', '0')->pluck('title', 'id');
        return view('admin.post', ['posts'=>$posts, 'cat'=>$cat, 'subcat' => $subcat, 'sub_category_id' => $sub_category_id]);
     }
     //show member
     public function show_member()
     {
       $members= Form::orderby('id', 'desc')->paginate(10);
        return view('admin.member',['members'=>$members]);
     }

     public function member_search()
     {

     }
}
