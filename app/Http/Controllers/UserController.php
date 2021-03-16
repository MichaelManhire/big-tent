<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            'members' => User::inRandomOrder()
                ->get()
                ->map(function ($user) {
                    return [
                        'image' => $user->profile_photo_url,
                        'name' => $user->name,
                        'online' => $user->isOnline(),
                        'slug' => $user->slug,
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
            'member' => [
                'topics' => $user->topics
                    ->shuffle()
                    ->take(48)
                    ->map(function ($topic) {
                        return [
                            'image' => $topic->profile_photo_url,
                            'name' => $topic->name,
                            'slug' => $topic->slug,
                        ];
                    }),
                'image' => $user->profile_photo_url,
                'name' => $user->name,
                'online' => $user->isOnline(),
                'posts' => $user->posts()
                    ->withCount(['comments', 'hearts'])
                    ->get()
                    ->map(function ($post) {
                        return [
                            'body' => $post->body,
                            'comments_count' => $post->comments_count,
                            'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                            'topic' => optional($post->topic)->name,
                            'hearts_count' => $post->hearts_count,
                            'image' => $post->profile_photo_url,
                            'topic' => optional($post->topic)->only(['name', 'slug']),
                            'name' => $post->name,
                            'slug' => $post->slug,
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
