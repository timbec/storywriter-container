<div class="max-w-xl mx-auto p-6 bg-white shadow rounded">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700">Name</label>
            <input type="text" wire:model="name" class="w-full border border-gray-300 px-3 py-2 rounded" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700">Email</label>
            <input type="email" wire:model="email" class="w-full border border-gray-300 px-3 py-2 rounded" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700">Message</label>
            <textarea wire:model="message" rows="5" class="w-full border border-gray-300 px-3 py-2 rounded"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Send Message
        </button>
    </form>
</div>
