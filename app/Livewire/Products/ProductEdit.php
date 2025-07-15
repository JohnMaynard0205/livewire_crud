<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $productId;
    public $product;
    
    // Form fields
    public $code;
    public $name;
    public $quantity;
    public $price;
    public $description;
    public $attachment;

    protected $rules = [
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'attachment' => 'nullable|image|max:1024', // 1MB max
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($productId);
        
        // Populate form fields
        $this->code = $this->product->code;
        $this->name = $this->product->name;
        $this->quantity = $this->product->quantity;
        $this->price = $this->product->price;
        $this->description = $this->product->description;
    }

    public function updatedCode()
    {
        $this->validate([
            'code' => 'required|string|max:255|unique:products,code,' . $this->productId,
        ]);
    }

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
            // Delete old attachment if exists
            if ($this->product->attachment) {
                Storage::disk('public')->delete($this->product->attachment);
            }
            
            $data['attachment'] = $this->attachment->store('uploads', 'public');
        }

        $this->product->update($data);
        
        session()->flash('message', 'Product updated successfully!');
        
        return redirect()->route('products.show', $this->productId);
    }

    public function cancel()
    {
        return redirect()->route('products.show', $this->productId);
    }

    public function render()
    {
        return view('livewire.products.product-edit');
    }
} 