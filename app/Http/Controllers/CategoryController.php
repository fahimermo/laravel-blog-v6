<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use Auth;


class CategoryController extends Controller
{
    public function addCategory(Request $request){
     if ($request->isMethod('post')) {
     	
           $data=$request->all();


           if (empty($data['category_status'])) {

              $data['category_status']=0;
        }
        else{

             $data['category_status']=1;
        }

     	$category=new Category;

     	$category->category_name=$data['category_name'];

     	$category->category_desc=$data['category_desc'];

     	$category->category_url=$data['category_url'];

         $category->category_status=$data['category_status'];

     	$category->save();

     	return redirect()->back()->with('flash_message_success','You successfully add the category');


     }


    	return view('admin.category.add_category');
    }

    public function viewCategories(){

        $viewCategories=Category::get();


        return view('admin.category.view_category')->with( compact("viewCategories"));
    }

    public function editCategory(Request $request, $id=null){
           if($request->isMethod('post')){
            
            $data=$request->all();
            
           if(empty($data['category_status'])){
                
                $data['category_status']=0;
            }
                else{
                    $data['category_status']=1;
                }


           
         Category::where(['id'=>$id])->update(['category_name'=>$data['category_name'], 'category_desc'=>$data['category_desc'], 'category_url'=>$data['category_url'], 'category_status'=>$data['category_status']]); 
                    
            return redirect('admin/view-categories')->with('flash_message_success','Category Updated Successfully');
        }
        $categoryDetails_admin= Category::where(['id'=>$id])->first();

        return view('admin.category.edit_categories')->with(compact('categoryDetails_admin'));
     
    }


    public function deleteCategory(Request $request, $id=null){

      Category::where(['id'=>$id])->delete();
      Post::where(['category_id'=>$id])->delete();
 
    return redirect()->back()->with('flash_message_success','Category has been Successfully Deleted');



    }

    


   
         public function catDropdown(Request $request, $id=null){
      
/*$category=Category::select('category_name','id')->where('id',$request->id)->first();

        // return response()->json($category);

                return view('admin.posts.add_post')->with(compact("category"));  */

    }

}
