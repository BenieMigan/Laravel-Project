@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($post) ? 'Modifier' : 'Créer' }} un Article</h1>
    <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Modifier' : 'Créer' }}</button>
    </form>
</div>
@endsection
