<x-filament::page>



@if ($record->images)
        <div>
            <h2 class="text-lg font-semibold">Image:</h2>
            {{-- Since 'images' is a base64 string, output it directly --}}
            <img src="{{ $record->images }}" alt="Story Image" class="max-w-full h-auto">
        </div>
    @endif
    <h1 class="text-2xl font-bold mb-4">{{ $record->title }}</h1>

    <div class="mb-6">
        <h2 class="text-lg font-semibold">Story Text:</h2>
        <div class="story-content"><p>{!! nl2br(e($record->body)) !!}</p>
        </div> {{-- Use 'body' which is the correct field --}}
    </div>

</x-filament::page>
