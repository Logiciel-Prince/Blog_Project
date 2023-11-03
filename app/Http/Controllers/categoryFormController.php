<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryData;
use Validator;

class categoryFormController extends Controller
{
    public function addCategoryRecord(Request $request){
        $rules=[
            'title'=>'required|max:20',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
           ];
          $message= [
            'required'=>'The Field  is required',
            'Image.mimes'=>'extensin  jpg png and gif only',
           ];
           $validator=Validator::make($request->all(),$rules,$message);
           if($validator->fails()){
             return redirect('form')->withInput()->withErrors($validator->message);
           }else{
            $data=$request->input();
            try{
                $crud= new categoryData;
                $file=$request->file('image');
                $filename=$file->getClientOriginalName();
                $destinationPath=public_path().'/categoryImages/';
                $file->move($destinationPath,$filename);
                $crud->image=$filename;
                $crud->title=$data['title'];
                $crud->save();
                return redirect()->back()->withSuccess('category saved!');
            }
            catch(Exception $e){
                return redirect('form')->with('failed',"operation failed");
            }
           }
    }
    public function displayCategoryRecord(){
        $categoryData=categoryData::paginate(3);
        return view('displayCategory',compact('categoryData'));
    }
    public function deleteCategoryRecord($id){
        $record=categoryData::find($id);
        $record->delete();
        return redirect('displayCategory');
    }
    public function editCategoryRecord($id){
        $editData=categoryData::find($id);
        return view('categoryFormPage',compact('editData'));
    }
    public function updateCategoryRecord(Request $request, $id='')
    {
        $this->validate($request, [
            'title'=>'required|max:20',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $data=$request->input();
        $category = categoryData::find($id);
        $file=$request->file('image');
        $filename=$file->getClientOriginalName();
        $destinationPath=public_path().'/categoryImages/';
        $file->move($destinationPath,$filename);
        $category->image=$filename;
        $category->title=$data['title'];
        $category->save();

        return redirect('displayCategory')->with('success', ' Updated');
    }
}
