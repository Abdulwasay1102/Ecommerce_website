<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view ('admin.category',compact('data'));

    }
    public function add_category(Request $request){
        $category = new Category;

        $category->category_name=  $request->category;
        $category->save();
        
        // toastr()->addSuccess('Category AddedSucessfuly.');
        // 
        Flasher::addSuccess('Category added successfully!');
        return redirect()->back();
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        Flasher::addSuccess('Category Deleted successfully!');
        // toastr()->timeOut(100000)->closeButton()->addSucess('Category deleted Sucessfully');
        return redirect()->back();

    }
    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category( Request $request, $id){
        $data = Category::find($id);
        $data->category_name= $request->category;
        $data->save();
         Flasher::addSuccess('Category Updated successfully!');
        // return redirect()->back();
        return redirect('/view_category');

    }
}
