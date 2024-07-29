@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Commentaires</h2>
    <a href="{{ route('comments.create', $post) }}" class="btn btn-primary">Ajouter un Commentaire</a>
    <ul class="list-group mt-4">
        @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <strong>{{ $comment->author_name }}</strong>
                <p>{{ $comment->content }}</p>
                <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
