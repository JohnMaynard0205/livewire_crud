@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Edit Product</span>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">&larr; Back</a>
        </div>
        <div class="px-6 py-6">
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="code" class="block text-gray-700 font-semibold mb-1">Code</label>
                    <input type="text" id="code" name="code" value="{{ $product->code }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('code') border-red-500 @enderror">
                    @error('code')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700 font-semibold mb-1">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror">
                    @error('quantity')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="price" class="block text-gray-700 font-semibold mb-1">Price</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                    <textarea id="description" name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="attachment" class="block text-gray-700 font-semibold mb-1">Product Image</label>
                    @if($product->attachment)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/' . $product->attachment) }}" alt="Current product image" class="rounded-lg border shadow max-w-xs max-h-40 object-cover">
                            <p class="text-xs text-gray-500 mt-1">Current image: {{ $product->attachment }}</p>
                        </div>
                    @endif
                    <input type="file" id="attachment" name="attachment" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('attachment') border-red-500 @enderror">
                    <small class="text-gray-500 block mt-1">Supported formats: JPG, JPEG, PNG, GIF, WEBP (Max size: 2MB). Leave empty to keep current image.</small>
                    @error('attachment')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition-colors duration-200">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
