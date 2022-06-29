<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    public $brand_id, $name, $slug, $status;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
        # code...
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        # code...
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
        # code...
    }
    
    public function closeModal()
    {
        $this->resetInput();
        # code...
    }

    public function openModal()
    {
        $this->resetInput();
        # code...
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
        # code...
    }

    public function destroyBrand()
    {
        Brand::find($this->brand_id)->delete();
        session()->flash('message', 'Brand deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
        # code...
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
        Brand::find($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
        # code...
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        # code...
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'asc')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('layouts.admin')->section('content');
    }
}
