<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
        # code...
    }

    public function create()
    {
        return view('admin.category.create');
        # code...
    }

    public function store(CategoryFormRequest $request)
    {
        # code...
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            # code...
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category',$filename);
            $category->image = $filename;
        }
       
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->save();
        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
        # code...
    }

    public function update(CategoryFormRequest $request, $category)
    {
        # store form request data
        $validatedData = $request->validated();
        # get the actual data to edit
        $category = Category::findOrFail($category);

        # replace them with request data...
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            # code...
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                # code...
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category',$filename);
            $category->image = $filename;
        }
       
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        # update category
        $category->update();
        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }
}
