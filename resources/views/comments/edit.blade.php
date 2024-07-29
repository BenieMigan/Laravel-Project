@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Commentaire</h1>
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <label for="author_name">Nom</label>
            <input type="text" name="author_name" id="author_name" class="form-control" value="{{ old('author_name', $comment->author_name) }}" required>
        </div>
        <div class="form-group">
            <label for="content">Commentaire</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $comment->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
