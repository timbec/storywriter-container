<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Name
            </label>
            <input type="text" 
                   id="name" 
                   wire:model="name" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name') 
                <span class="text-red-600 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email
            </label>
            <input type="email" 
                   id="email" 
                   wire:model="email" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email') 
                <span class="text-red-600 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label for="userMessage" class="block text-sm font-medium text-gray-700 mb-2">
                Message
            </label>
            <textarea id="userMessage" 
                      wire:model="userMessage" 
                      rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('userMessage') 
                <span class="text-red-600 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
            Send Message
        </button>
    </form>
</div>