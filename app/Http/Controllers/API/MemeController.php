<?php

namespace App\Http\Controllers\API;

use App\Meme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\QueryBuilder\QueryBuilder;

class MemeController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Meme::class, 'meme');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $memes = Meme::whereUserId($user->id);
        return QueryBuilder::for($memes)->jsonPaginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, ['gif_id' => 'string', 'text' => 'string']);

        try {
            $meme = $user->memes()->create($request->only(['gif_id', 'text']));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return $meme;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Meme $meme)
    {
        return $meme;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Meme $meme)
    {
        $this->validate($request, ['gif_id' => 'string', 'text' => 'string']);

        try {
            $meme = $meme->update($request->only(['gif_id', 'text']));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return $meme;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Meme $meme)
    {
        try {
            $meme->destroy();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return ['message' => 'Successfully deleted.'];
    }
}
