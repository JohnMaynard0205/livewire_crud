@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Add New Product</span>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">&larr; Back</a>
        </div>
        <div class="px-6 py-6">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="code" class="block text-gray-700 font-semibold mb-1">Code</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('code') border-red-500 @enderror">
                    @error('code')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700 font-semibold mb-1">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror">
                    @error('quantity')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="price" class="block text-gray-700 font-semibold mb-1">Price</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                    <textarea id="description" name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="attachment" class="block text-gray-700 font-semibold mb-1">Product Image</label>
                    <input type="file" id="attachment" name="attachment" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('attachment') border-red-500 @enderror">
                    <small class="text-gray-500 block mt-1">Supported formats: JPG, JPEG, PNG, GIF, WEBP (Max size: 2MB)</small>
                    @error('attachment')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition-colors duration-200">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
