@extends('layouts.app')

@section('content')
<div class="container">
    <h1> {{$post->title}} </h1>
    <div>
        <h5 class="d-inline-block">Categoria:</h5>
        @if ($post->category)
            {{$post->category->name}}
        @endif
    </div>
    
    
    <div>
        <h5 class="d-inline-block">Tags:</h5>
        @forelse ($post->tags as $tag)
            <span class="badge bg-primary"> {{$tag->name}} </span>
        @empty
            -
        @endforelse
    </div>


    <p> {{$post->content}} </p>
    <a href=" {{route('admin.posts.index')}} ">Torna all'elenco</a>

    <div class="p-4"><a class="btn-success p-2 rounded" href=" {{route('admin.posts.edit', $post)}} ">Edit</a></div>
    
   

</div>
@endsection