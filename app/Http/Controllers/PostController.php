<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::with(['author', 'group'])->withCount(['comments', 'hearts'])->get()->map(function ($post) {
                return [
                    'author' => $post->author->name,
                    'body' => $post->body,
                    'comments_count' => $post->comments_count,
                    'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                    'group' => optional($post->group)->name,
                    'hearts_count' => $post->hearts_count,
                    'id' => $post->id,
                    'image' => $post->author->profile_photo_url,
                    'show_url' => URL::route('posts.show', $post),
                    'title' => $post->title,
                ];
            }),
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => [
                'author' => $post->author->name,
                'body' => $post->body,
                'comments' => $post->comments()->withCount(['hearts'])->get()->map(function ($comment) {
                    return [
                        'author' => $comment->author->name,
                        'body' => $comment->body,
                        'comments_count' => $comment->replies->count(),
                        'created_at' => Carbon::parse($comment->created_at)->diffForHumans(),
                        'hearts_count' => $comment->hearts_count,
                        'id' => $comment->id,
                        'image' => $comment->author->profile_photo_url,
                        'replies' => $comment->replies()->withCount(['hearts'])->get()->map(function ($reply) {
                            return [
                                'author' => $reply->author->name,
                                'body' => $reply->body,
                                'comments_count' => $reply->replies->count(),
                                'created_at' => Carbon::parse($reply->created_at)->diffForHumans(),
                                'hearts_count' => $reply->hearts_count,
                                'id' => $reply->id,
                                'image' => $reply->author->profile_photo_url,
                            ];
                        }),
                    ];
                }),
                'comments_count' => $post->comments->count(),
                'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                'group' => optional($post->group)->name,
                'hearts_count' => $post->hearts->count(),
                'id' => $post->id,
                'image' => $post->author->profile_photo_url,
                'title' => $post->title,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
