
<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StoryController;

Route::post('/stories', [StoryController::class, 'store'])
    ->middleware(['api', \Illuminate\Http\Middleware\HandleCors::class]);
