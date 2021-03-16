<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Topics/Index', [
            'topics' => Topic::inRandomOrder()
                ->withCount(['members'])
                ->get()
                ->map(function ($topic) {
                    return [
                        'image' => $topic->profile_photo_url,
                        'members_count' => $topic->members_count,
                        'name' => $topic->name,
                        'slug' => $topic->slug,
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
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return Inertia::render('Topics/Show', [
            'topic' => [
                'image' => $topic->profile_photo_url,
                'members' => $topic->members
                    ->shuffle()
                    ->take(48)
                    ->map(function ($member) {
                        return [
                            'image' => $member->profile_photo_url,
                            'online' => $member->isOnline(),
                            'name' => $member->name,
                            'slug' => $member->slug,
                        ];
                    }),
                'name' => $topic->name,
                'posts' => $topic->posts()
                    ->withCount(['comments', 'hearts'])
                    ->get()
                    ->map(function ($post) {
                        return [
                            'author' => $post->author->only(['name', 'slug']),
                            'body' => $post->body,
                            'comments_count' => $post->comments_count,
                            'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                            'hearts_count' => $post->hearts_count,
                            'image' => $post->profile_photo_url,
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
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
