<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <span class="text-2xl font-bold text-gray-900">Add New Product</span>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                &larr; Back to Products
            </a>
        </div>
        
        <div class="px-6 py-6">
            <form wire:submit.prevent="save" class="space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column - Form Fields -->
                    <div class="space-y-6">
                        <div>
                            <label for="code" class="block text-gray-700 font-semibold mb-2">Code <span class="text-red-500">*</span></label>
                            <input type="text" id="code" wire:model="code" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('code') border-red-500 @enderror"
                                   placeholder="Enter product code">
                            @error('code') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" wire:model="name" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                   placeholder="Enter product name">
                            @error('name') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity <span class="text-red-500">*</span></label>
                            <input type="number" id="quantity" wire:model="quantity" min="0"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror"
                                   placeholder="Enter quantity">
                            @error('quantity') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-gray-700 font-semibold mb-2">Price <span class="text-red-500">*</span></label>
                            <input type="number" id="price" wire:model="price" step="0.01" min="0"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror"
                                   placeholder="Enter price">
                            @error('price') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                            <textarea id="description" wire:model="description" rows="4"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                                      placeholder="Enter product description (optional)"></textarea>
                            @error('description') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column - Image Upload -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Product Image</label>
                            
                            <!-- File Upload -->
                            <input type="file" wire:model="attachment" accept="image/*"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('attachment') border-red-500 @enderror">
                            
                            <!-- File Upload Help Text -->
                            <p class="text-sm text-gray-500 mt-1">
                                Supported formats: JPG, JPEG, PNG, GIF, WEBP (Max size: 2MB). 
                                Image upload is optional.
                            </p>
                            
                            @error('attachment') 
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                            @enderror

                            <!-- Image Preview -->
                            @if($attachment)
                                <div class="mt-4">
                                    <span class="block text-sm text-gray-600 mb-2">Image Preview:</span>
                                    <img src="{{ $attachment->temporaryUrl() }}" 
                                         alt="Image preview" 
                                         class="rounded-lg border shadow max-w-full max-h-48 object-cover">
                                </div>
                            @else
                                <div class="mt-4">
                                    <div class="flex flex-col items-center justify-center w-full h-48 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <span class="text-gray-500 text-center">Upload an image (optional)</span>
                                    </div>
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
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 