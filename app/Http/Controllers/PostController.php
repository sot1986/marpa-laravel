<?php

namespace App\Http\Controllers;

use App\Contracts\TestInterface;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Services\SendEmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {
        return view('posts.create');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::query()
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(perPage: 5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Post::create([
            ...$request->validated(),
            'user_id' => $request->user()->id
        ]);

        // create posts

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post, SendEmailService $sendEmailService)
    {
        if ($request->user()->can('sendEmail')) {
            $sendEmailService->sendEmail(
                $request->user()->email,
                'Post edited',
                'Your post is going to been edited'
            );
        }


        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    }

    public function showId(Request $request, Post $post_id)
    {
        dd($request->post_id, $post_id);
    }
}
