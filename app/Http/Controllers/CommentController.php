<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->paginate(10);
        return view('comments.index', compact('post', 'comments'));
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create($validatedData);

        return redirect()->route('posts.show', $post)->with('success', 'Commentaire ajouté avec succès!');
    }

    public function edit(Comment $comment)
    {
        $post = $comment->post; 
        return view('comments.edit', compact('comment', 'post'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $comment->update($validatedData);

        return redirect()->route('posts.show', $comment->post)->with('success', 'Commentaire modifié avec succès!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post);
    }
}


