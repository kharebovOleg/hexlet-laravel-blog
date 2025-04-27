@extends('layouts.app')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href="{{$article->id}}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <p><a href="/articles/{{ $article->id }}/edit">изменить статью</a></p>
        <form action="/articles/{{ $article->id }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link p-0">Удалить</button>
        </form>
    @endforeach
@endsection