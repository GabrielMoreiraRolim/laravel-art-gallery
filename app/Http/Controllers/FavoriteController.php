<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'artwork_id' => 'required',
        ]);

        $favorite = Favorite::firstOrCreate([
            'user_id' => $request->user_id,
            'artwork_id' => $request->artwork_id,
        ]);

        return response()->json($favorite);
    }

    public function index($user_id)
    {
        return Favorite::where('user_id', $user_id)->with('artwork')->get();
    }
}
