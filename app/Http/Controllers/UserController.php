<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::inRandomOrder()
                ->get()
                ->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'image' => $user->profile_photo_url,
                        'name' => $user->name,
                        'show_url' => URL::route('users.show', $user),
                    ];
                })
                ->simplePaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => [
                'image' => $user->profile_photo_url,
                'name' => $user->name,
                'posts' => $user->posts()
                    ->withCount(['comments', 'hearts'])
                    ->get()
                    ->map(function ($post) {
                        return [
                            'author' => $post->author->name,
                            'author_show_url' => URL::route('users.show', $post->author),
                            'body' => $post->body,
                            'comments_count' => $post->comments_count,
                            'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                            'group' => optional($post->group)->name,
                            'hearts_count' => $post->hearts_count,
                            'id' => $post->id,
                            'image' => $post->profile_photo_url,
                            'group' => optional($post->group)->name,
                            'group_show_url' => $post->group ? URL::route('groups.show', $post->group) : null,
                            'name' => $post->name,
                            'show_url' => URL::route('posts.show', $post),
                        ];
                    })
                    ->simplePaginate(),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
