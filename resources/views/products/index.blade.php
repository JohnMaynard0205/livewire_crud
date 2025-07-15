@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Product List</span>
            <div class="flex items-center gap-4 mt-2 md:mt-0">
                <span class="text-gray-700">Welcome, <strong>{{ auth()->user()->name }}</strong>!</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium px-3 py-1 rounded transition-colors duration-200 border border-red-200 bg-red-50 hover:bg-red-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        <div class="px-6 py-4">
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 mb-4 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded shadow transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </a>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S#</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-900 font-semibold">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $product->code }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $product->quantity }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200 text-xs font-medium transition-colors duration-200">
                                            Show
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 text-xs font-medium transition-colors duration-200">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Do you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-100 text-red-800 rounded hover:bg-red-200 text-xs font-medium transition-colors duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-red-500 font-semibold">
                                    No Product Found!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection