<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
        # code...
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
        # code...
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        #validate category
        $category = Category::findOrFail($validatedData['category_id']);

        // create relationship
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            // for multiple images, name will be duplicated, so append it with iteration number
            $i = 1;
            foreach($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect('admin/products/')->with('message', 'Product Added Successfully');
        // return $product->id;
        # code...
    }

    public function edit(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        $brands = Brand::all();
        // dd($categories);
        return view('admin.products.edit', compact('categories', 'product',  'brands'));
        # code...
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        # code...
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
                        ->products()->where('id', $product_id)->first();

        if ($product) {
            # code...
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
    
                // for multiple images, name will be duplicated, so append it with iteration number
                $i = 1;
                foreach($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$ext;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }

            return redirect('admin/products')->with('message', 'Product updated successfully.');

        } else {
            # code...
            return redirect('admin/products')->with('message', 'No such product found.');
        }
        
        
    }
    
    public function destroyImage(int $product_image_id)
    {
        # code...
        $productImage = ProductImage::findOrFail($product_image_id);
        
        # check the image path and delete
        if (File::exists($productImage->image)) {
            # delete the file
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Image deleted successfully.');
    }
    
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $productImage){
                # check the image path and delete
                if (File::exists($productImage->image)) {
                    # delete the file
                    File::delete($productImage->image);
                }
            }
        } 
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully.');
    }
}
