
<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

Route::post('/stories', [StoryController::class, 'store'])
    ->middleware(['api', \Illuminate\Http\Middleware\HandleCors::class]);


Route::get('/test-api-key', function () {
    return response()->json([
        'env' => env('STORYWRITER_API_KEY'),
        'config' => config('services.storywriter.api_key'),
    ]);
});



Route::post('/storywriter', function (Request $request) {
    \Log::info($request->all());
    dd(config('services.storywriter.api_key'));
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . config('services.storywriter.api_key'),
    ])->post('https://api-inference.huggingface.co/models/mistralai/Mistral-7B-Instruct-v0.3', [
        'inputs' => $request->input('inputs'), // match the frontend key
        'parameters' => [
            'max_new_tokens' => 1024,
            'temperature' => 0.7,
            'top_p' => 0.95,
            'do_sample' => true,
        ],
    ]);

    return $response->json(['received_prompt' => $request->input('inputs')]);

});