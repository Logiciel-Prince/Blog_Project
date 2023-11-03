<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogData;
use Validator;

class blogFormController extends Controller
{
    public function AddRecord(Request $request)
    {
        $rules = [
            'title' => 'required|max:20',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'description' => 'required|max:150',
            'categories' => 'required',
        ];
        $message = [
            'required' => 'The Field  is required',
            'Image.mimes' => 'extensin  jpg png and gif only',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            dd($validator);
            return redirect('form')->withInput()->withErrors($validator->message);
        } else {
            $data = $request->input();
            try {
                $crud = new blogData;
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $destinationPath = public_path() . '/blogimages/';
                $file->move($destinationPath, $filename);
                $crud->image = $filename;
                $crud->title = $data['title'];
                $crud->categories = json_encode($data['categories']);
                $crud->description = $data['description'];
                $crud->save();
                return redirect('displayBlogRecords')->withSuccess('Blog saved!');
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }
    public function displayRecord()
    {
        $blogData = blogData::paginate(3);
        return view('displayBlogRecords', compact('blogData'));
    }
    public function deleteBlogRecord($id)
    {
        $record = blogData::find($id);
        $record->delete();
        return redirect('displayBlogRecords');
    }

    public function editBlogRecord($id)
    {
        $editData = blogData::find($id);
        return view('blogFormPage', compact('editData'));
    }

    public function updateBlogRecord(Request $request, $id = '')
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'description' => 'required|max:150',
            'categories' => 'required',
        ]);
        $data = $request->input();
        $blog = blogData::find($id);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path() . '/blogimages/';
        $file->move($destinationPath, $filename);
        $blog->image = $filename;
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->categories = $data['categories'];
        $blog->save();

        return redirect('displayBlogRecords')->with('success', 'Blog Updated');
    }
}
