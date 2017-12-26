<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\custom_field\CustomField;
use App\Model\custom_field\CustomFieldDetail;
use App\Model\custom_field\CustomFieldValue;

class CustomFieldController extends Controller
{
     public function group_list()
     {
        $lists=CustomField::orderby('id', 'desc')->paginate(10);
        return view('admin.custom-field.group_list',["lists"=>$lists]);
     }

     public function get_acf_group($id)
     {
         $acf_values="";
         $acf_group=CustomField::find($id);
         // return $_GET['post_id'];

         if (isset($_GET['post_id']))
         {
            $acf_values=CustomFieldValue::where([
                                  ['cfl_group_id', $id],
                                  ['post_id',$_GET['post_id']],
                              ])->first();
          }
          $view = view('admin.custom-field.acf_group_value',['acf_group'=>$acf_group,'acf_values'=>$acf_values]);
          return $view;
     }

     public function get_cf_detail_type($id)
     {
           $view = view('admin.custom-field.add_acf_detail',['id'=>$id]);
           return $view;
     }

     public function g_view($id)
     {
         $cf_group=CustomField::find($id);
         return view("admin.custom-field.g_view",["acf_group"=>$cf_group]);
     }

     public function add_acf_detail()
     {
          $view = view('admin.custom-field.add_acf_detail');
          return $view;
     }

     public function add_new()
     {
        return view("admin.custom-field.add_group");
       //return json_encode(["status"=>0,"message"=>"success"]);
     }

     // public function add_group($value='')
     // {
     //     return view("custom-field.add_group");
     // }

     public function create()
     {
         $fields=$_POST['cf_list'];
         //return $fields;

         foreach ($fields as $key =>$value) {
             if (empty($value)) {
               return json_encode(["status"=>1,"message"=>$key." is empty !"]);
                // return json_encode(["status"=>1,"message"=>"Please, fill all fields completely!"]);
             }
         }

         CustomField::insert($fields);
         return json_encode(["status"=>0,"message"=>"Has been created!!"]);
     }

     public function g_edit($id)
     {
         $cf_group=CustomField::find($id);
         return view("admin.custom-field.g_edit",["acf_group"=>$cf_group]);

     }

     public function g_update(Request $request,$id)
     {
             $request=$request->all();
             $group=[
                      'group_name'=>$request['g_name'],
                      'cf_name1'=>$request['cf_name1'],
                      'cf_type1'=>$request['cf_type1'],
                      'cf_name2'=>$request['cf_name2'],
                      'cf_type2'=>$request['cf_type2'],
                      'cf_name3'=>$request['cf_name3'],
                      'cf_type3'=>$request['cf_type3'],
                      'cf_name4'=>$request['cf_name4'],
                      'cf_type4'=>$request['cf_type4'],
                      'cf_name5'=>$request['cf_name5'],
                      'cf_type5'=>$request['cf_type5'],
             ];

            CustomField::where('id',$id)->update($group);
            echo "<script>
                        alert('Has been updated!!');
                        window.location.href='http://localhost/cms-fixes/public/admin/custom_field';
                  </script>";
     }

     public function g_delete($id)
     {
           CustomField::destroy($id);
           echo "<script>
                       alert('Has been deleted!!');
                       window.location.href='http://localhost/cms-fixes/public/admin/custom_field';
                 </script>";
     }
}
