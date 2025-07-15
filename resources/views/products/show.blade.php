@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Product Information</span>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                &larr; Back
            </a>
        </div>
        <div class="px-6 py-6 space-y-6">
            <div>
                <span class="block text-gray-600 font-semibold">Code:</span>
                <span class="block text-lg text-gray-900">{{ $product->code }}</span>
            </div>
            <div>
                <span class="block text-gray-600 font-semibold">Name:</span>
                <span class="block text-lg text-gray-900">{{ $product->name }}</span>
            </div>
            <div>
                <span class="block text-gray-600 font-semibold">Quantity:</span>
                <span class="block text-lg text-gray-900">{{ $product->quantity }}</span>
            </div>
            <div>
                <span class="block text-gray-600 font-semibold">Price:</span>
                <span class="block text-lg text-gray-900">${{ number_format($product->price, 2) }}</span>
            </div>
            <div>
                <span class="block text-gray-600 font-semibold">Description:</span>
                <span class="block text-gray-900">{{ $product->description }}</span>
            </div>
            <div>
                <span class="block text-gray-600 font-semibold">Product Image:</span>
                @if($product->attachment)
                    <img src="{{ asset('uploads/' . $product->attachment) }}" alt="{{ $product->name }}" class="mt-2 rounded-lg border shadow max-w-xs max-h-60 object-cover">
                @else
                    <span class="text-gray-400">No image uploaded</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection