use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\FavoriteController;

// Login ou registro automático
Route::post('/login', [UserController::class, 'login']);

// Ver galeria de artes
Route::get('/artworks', [ArtworkController::class, 'index']);

// Favoritar uma arte
Route::post('/favorites', [FavoriteController::class, 'store']);

// Ver artes favoritas de um usuário
Route::get('/favorites/{user_id}', [FavoriteController::class, 'index']);
