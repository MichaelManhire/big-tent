<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Groups/Index', [
            'groups' => Group::inRandomOrder()->withCount(['members'])->get()->map(function ($group) {
                return [
                    'id' => $group->id,
                    'image' => $group->profile_photo_url,
                    'members_count' => $group->members_count,
                    'name' => $group->name,
                    'show_url' => URL::route('groups.show', $group),
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
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return Inertia::render('Groups/Show', [
            'group' => [
                'image' => $group->profile_photo_url,
                'members' => $group->members->shuffle()->map(function ($member) {
                    return [
                        'id' => $member->id,
                        'image' => $member->profile_photo_url,
                        'name' => $member->name,
                    ];
                }),
                'name' => $group->name,
                'posts' => $group->posts()->withCount(['comments', 'hearts'])->get()->map(function ($post) {
                    return [
                        'author' => $post->author->name,
                        'body' => $post->body,
                        'comments_count' => $post->comments_count,
                        'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                        'hearts_count' => $post->hearts_count,
                        'id' => $post->id,
                        'image' => $post->profile_photo_url,
                        'name' => $post->name,
                        'show_url' => URL::route('posts.show', $post),
                    ];
                }),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
