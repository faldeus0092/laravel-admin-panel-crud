<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public function deleteCategory($category_id)
    {
        // dd($category_id);
        // set the category id to delete
        $this->category_id = $category_id;
        # code...
    }
    
    public function destroyCategory()
    {
        // dd ($this->category_id);
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if (FIle::exists($path)) {
            File::delete($path);
            # code...
        }
        $category->delete();
        session()->flash('message', 'Category deleted');

        #dispact event to close modal
        $this->dispatchBrowserEvent('close-modal');
        # code...
    }
}
