<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use Response;

class CatController extends Controller
{
    public function getCats()
    {
        $cats = Category::all();
        return view('admin.blog.categouries', compact('cats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);
        $cat = new Category();
        $cat->name = $request['name'];
        $cat->save();

        return view('admin.ajax.addedcat', compact('cat'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$request['id'],
        ]);
        $cat = Category::find($request['id']);
        $cat->name = $request['name'];
        $cat->save();

        return $cat;
    }

    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->back()->with(['success'=>'Post Deleted Successfully']);
    }

}
