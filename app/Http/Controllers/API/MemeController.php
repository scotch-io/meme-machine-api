<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meme;
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
    public function index()
    {
        $user = auth('api')->user();
        if ($user) {
            $memes = Meme::whereUserId($user->id);
        } else {
            $memes = Meme::latest()->get();
        }

        return QueryBuilder::for($memes)->jsonPaginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['gif_id' => 'string', 'text' => 'string']);

        // get our data and captioned url
        $data = $request->only(['gif_id', 'text']);
        try {
            $data['captioned_url'] = caption_gif($data['gif_id'], $data['text']);
        } catch (\Exception $e) {}

        // if there is a user, apply their user_id
        if ($user = auth('api')->user()) $data['user_id'] = $user->id;

        // create the meme
        try {
            $meme = Meme::create($data);
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
    public function show(Meme $meme)
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
    public function update(Request $request, Meme $meme)
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
    public function destroy(Meme $meme)
    {
        $user = auth('api')->user();

        // validate that the user is the one deleting it

        try {
            $meme->destroy();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return ['message' => 'Successfully deleted.'];
    }
}
