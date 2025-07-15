<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductCreate extends Component
{
    use WithFileUploads;
    
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

    public function save()
    {
        $this->validate();

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

        $product = Product::create($data);
        
        session()->flash('message', 'Product created successfully!');
        
        return redirect()->route('products.show', $product->id);
    }

    public function cancel()
    {
        return redirect()->route('products.index');
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
        return view('livewire.products.product-create');
    }
} 