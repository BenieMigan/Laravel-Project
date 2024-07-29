@extends('layouts.app')

@section('content')
<div class="container">

    <span class="border border-primary">

    <h1>Articles</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un Article</a>

    <table class="table mt-4">
        <br><br>
        <h5>Après création de ton article, appuye maintenant le titre de l'article que tu as créé si tu veux ajouter un commentaire.</h5>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Commentaires</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->comments_count }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
    </span>
</div>
@endsection
