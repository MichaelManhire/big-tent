<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            'posts' => Post::latest()
                ->with(['author', 'topic'])
                ->withCount(['comments', 'hearts'])
                ->get()
                ->map(function ($post) {
                    return [
                        'author' => $post->author->only(['name', 'slug']),
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
                'author' => $post->author->only(['name', 'slug']),
                'body' => $post->body,
                'comments' => $post->comments()
                    ->withCount(['hearts'])
                    ->get()
                    ->map(function ($comment) {
                        return [
                            'author' => [
                                'name' => $comment->author->name,
                                'slug' => $comment->author->slug,
                                'online' => $comment->author->isOnline(),
                            ],
                            'body' => $comment->body,
                            'comments_count' => $comment->replies->count(),
                            'created_at' => Carbon::parse($comment->created_at)->diffForHumans(),
                            'hearts_count' => $comment->hearts_count,
                            'id' => $comment->id,
                            'image' => $comment->author->profile_photo_url,
                            'replies' => $this->getReplies($comment),
                        ];
                    })
                    ->simplePaginate(),
                'comments_count' => $post->comments->count(),
                'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                'topic' => optional($post->topic)->only(['name', 'slug']),
                'hearts_count' => $post->hearts->count(),
                'image' => $post->profile_photo_url,
                'name' => $post->name,
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

    /**
     * Get the replies to the comment.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getReplies(Comment $comment)
    {
        return $comment->replies()->withCount(['hearts'])->get()->map(function ($reply) {
            return [
                'author' => [
                    'name' => $reply->author->name,
                    'slug' => $reply->author->slug,
                    'online' => $reply->author->isOnline(),
                ],
                'body' => $reply->body,
                'comments_count' => $reply->replies->count(),
                'created_at' => Carbon::parse($reply->created_at)->diffForHumans(),
                'hearts_count' => $reply->hearts_count,
                'id' => $reply->id,
                'image' => $reply->author->profile_photo_url,
                'replies' => $this->getReplies($reply),
            ];
        });
    }
}
