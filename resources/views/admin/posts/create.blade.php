@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea un post:</h1>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action=" {{route('admin.posts.store')}} " method="POST">
      @csrf
      @method('POST')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title:</label>
        <input 
        value=" {{old('title')}} "
        type="text" 
        class="form-control
        @error('title') is-invalid @enderror " 
        id="title" 
        name="title" 
        placeholder="Title" 
        aria-describedby="emailHelp">

        @error('title')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Content:</label>
        <textarea 
        type="text" 
        class="form-control
        @error('content') is-invalid @enderror " 
        id="content"
        name="content">
        {{old('content')}}
        </textarea>

        @error('content')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <select 
        name="category_id"
        id="category_id"
        class="form-control" 
        aria-label="Default select example">
          <option selected>Selezionare una categoria</option>
          @foreach ($categories as $category)
            <option 
            @if ($category->id == old('category_id'))
              selected
            @endif
            value=" {{$category->id}} ">{{$category->name}}</option>
          @endforeach
          
        </select>
      </div>
      <div class="mb-3">
        <span class="d-inline-block mr-4">Tags:</span>
        @foreach ($tags as $tag)
          <span class="d-inline-block mr-4">
            <input 
            @if(in_array($tag->id, old('tags', [])))
              checked
            @endif
            class="form-check-input" 
            type="checkbox" 
            value=" {{$tag->id}} " 
            id="tag{{$loop->iteration}}"
            name="tags[]">
            <label 
            class="form-check-label" 
            for="tag{{$loop->iteration}}">
              {{$tag->name}}
            </label>
          </span>
        @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>

</div>
@endsection