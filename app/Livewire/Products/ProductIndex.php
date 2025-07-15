<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ProductIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $deleteProduct = null;
    public $showDeleteModal = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function delete(Product $product)
    {
        $this->deleteProduct = $product;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        if ($this->deleteProduct) {
            // Delete attachment if exists
            if ($this->deleteProduct->attachment) {
                Storage::disk('public')->delete($this->deleteProduct->attachment);
            }
            
            $this->deleteProduct->delete();
            session()->flash('message', 'Product deleted successfully!');
        }
        
        $this->showDeleteModal = false;
        $this->deleteProduct = null;
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('code', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.products.product-index', [
            'products' => $products
        ]);
    }
} 