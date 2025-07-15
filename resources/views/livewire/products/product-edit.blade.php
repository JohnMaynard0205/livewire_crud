<div class="max-w-4xl mx-auto px-4 py-8">
    @if(session('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Edit Product</span>
            <a href="{{ route('products.show', $productId) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                &larr; Back to Product
            </a>
        </div>
        
        <div class="px-6 py-6">
            <form wire:submit.prevent="save" class="space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column - Form Fields -->
                    <div class="space-y-6">
                        <div>
                            <label for="code" class="block text-gray-700 font-semibold mb-2">Code</label>
                            <input type="text" id="code" wire:model="code" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('code') border-red-500 @enderror">
                            @error('code') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                            <input type="text" id="name" wire:model="name" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                            @error('name') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
                            <input type="number" id="quantity" wire:model="quantity" min="0"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror">
                            @error('quantity') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
                            <input type="number" id="price" wire:model="price" step="0.01" min="0"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                            @error('price') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                            <textarea id="description" wire:model="description" rows="4"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"></textarea>
                            @error('description') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column - Image Upload -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Product Image</label>
                            
                            <!-- Current Image Display -->
                            @if($product->attachment)
                                <div class="mb-4">
                                    <span class="block text-sm text-gray-600 mb-2">Current Image:</span>
                                    <img src="{{ Storage::url($product->attachment) }}" 
                                         alt="Current product image" 
                                         class="rounded-lg border shadow max-w-full max-h-48 object-cover">
                                    <p class="text-xs text-gray-500 mt-1">Current: {{ $product->attachment }}</p>
                                </div>
                            @endif

                            <!-- File Upload -->
                            <input type="file" wire:model="attachment" accept="image/*"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('attachment') border-red-500 @enderror">
                            
                            <!-- File Upload Help Text -->
                            <p class="text-sm text-gray-500 mt-1">
                                Supported formats: JPG, JPEG, PNG, GIF, WEBP (Max size: 2MB). 
                                Leave empty to keep current image.
                            </p>
                            
                            @error('attachment') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror

                            <!-- New Image Preview -->
                            @if($attachment)
                                <div class="mt-4">
                                    <span class="block text-sm text-gray-600 mb-2">New Image Preview:</span>
                                    <img src="{{ $attachment->temporaryUrl() }}" 
                                         alt="New image preview" 
                                         class="rounded-lg border shadow max-w-full max-h-48 object-cover">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 pt-6 border-t">
                    <button type="button" wire:click="cancel" 
                            class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 