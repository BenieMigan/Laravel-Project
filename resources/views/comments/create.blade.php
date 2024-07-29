@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($comment) ? 'Modifier' : 'Ajouter' }} un Commentaire</h1>
    <form action="{{ isset($comment) ? route('comments.update', $comment) : route('comments.store', $post) }}" method="POST">
        @csrf
        @if (isset($comment))
            @method('PUT')
        @endif
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <label for="author_name">Nom</label>
            <input type="text" name="author_name" id="author_name" class="form-control" value="{{ old('author_name', $comment->author_name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Commentaire</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $comment->content ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($comment) ? 'Modifier' : 'Ajouter' }}</button>
    </form>
</div>
@endsection
