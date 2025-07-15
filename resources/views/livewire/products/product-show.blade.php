<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Product Information</span>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                &larr; Back to Products
            </a>
        </div>
        
        <div class="px-6 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Details -->
                <div class="space-y-6">
                    <div>
                        <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide">Code</span>
                        <span class="block text-xl text-gray-900 mt-1">{{ $product->code }}</span>
                    </div>
                    
                    <div>
                        <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide">Name</span>
                        <span class="block text-xl text-gray-900 mt-1">{{ $product->name }}</span>
                    </div>
                    
                    <div>
                        <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide">Quantity</span>
                        <span class="block text-xl text-gray-900 mt-1">
                            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $product->quantity > 10 ? 'bg-green-100 text-green-800' : ($product->quantity > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $product->quantity }} units
                            </span>
                        </span>
                    </div>
                    
                    <div>
                        <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide">Price</span>
                        <span class="block text-xl text-gray-900 mt-1">{{ number_format($product->price, 2) }}</span>
                    </div>
                    
                    <div>
                        <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide">Description</span>
                        <span class="block text-gray-900 mt-1 leading-relaxed">
                            {{ $product->description ?: 'No description available for this product.' }}
                        </span>
                    </div>
                    
                    <div class="pt-4">
                        <div class="flex gap-3">
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Back to List
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Product
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Product Image -->
                <div class="flex flex-col items-center justify-center">
                    <span class="block text-gray-600 font-semibold text-sm uppercase tracking-wide mb-4">Product Image</span>
                    @if($product->attachment)
                        <div class="relative">
                            <img src="{{ Storage::url($product->attachment) }}" 
                                 alt="{{ $product->name }}" 
                                 class="rounded-lg border shadow-lg max-w-full max-h-96 object-cover">
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center w-64 h-64 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300">
                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-500 text-center">No image available</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> 