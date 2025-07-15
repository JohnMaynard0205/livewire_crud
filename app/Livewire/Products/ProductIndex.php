<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductIndex extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $showModal = false;
    public $editingProduct = null;
    public $deleteProduct = null;
    public $showDeleteModal = false;

    // Form fields
    public $code;
    public $name;
    public $quantity;
    public $price;
    public $description;
    public $attachment;

    protected $rules = [
        'code' => 'required|string|max:255|unique:products,code',
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'attachment' => 'nullable|image|max:1024', // 1MB max
    ];

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

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit(Product $product)
    {
        $this->editingProduct = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingProduct) {
            // Update existing product
            $this->rules['code'] = 'required|string|max:255|unique:products,code,' . $this->editingProduct->id;
            $this->validate();

            $data = [
                'code' => $this->code,
                'name' => $this->name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
            ];

            if ($this->attachment) {
                // Delete old attachment if exists
                if ($this->editingProduct->attachment) {
                    Storage::disk('public')->delete($this->editingProduct->attachment);
                }
                
                $data['attachment'] = $this->attachment->store('uploads', 'public');
            }

            $this->editingProduct->update($data);
            session()->flash('message', 'Product updated successfully!');
        } else {
            // Create new product
            $data = [
                'code' => $this->code,
                'name' => $this->name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
            ];

            if ($this->attachment) {
                $data['attachment'] = $this->attachment->store('uploads', 'public');
            }

            Product::create($data);
            session()->flash('message', 'Product created successfully!');
        }

        $this->closeModal();
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

    public function closeModal()
    {
        $this->showModal = false;
        $this->editingProduct = null;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->code = '';
        $this->name = '';
        $this->quantity = '';
        $this->price = '';
        $this->description = '';
        $this->attachment = null;
        $this->resetValidation();
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