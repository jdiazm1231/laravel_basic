@extends('layouts.app')

@section('container')
  @if( count($errors) > 0)

    @foreach($errors -> all() as $err)
      <div class="alert alert-danger">
        <p> Por favor validar : {{ $err  }} </p>
      </div>

    @endforeach

  @endif
  <form action="{{ route('update_post_path', ["post_id" => $post_id->id]) }}" method="POST">

    {{ csrf_field()  }}

    {{ method_field('PUT') }}

    <div class="form-group">
      <label class="control-label col-md-2" for="title">Titulo</label>
      <div class="col-md-10">
        <input type="text" value="{{ $post_id->title }}" name="title" placeholder="Titulo" id="title"
               class="form-control">
      </div>
      <label class="control-label col-md-2" for="description">Descripcion</label>
      <div class="col-md-10">
        <textarea name="description" class="form-control" id="description" rows="3">{{ $post_id->description }}</textarea>
      </div>
      <label class="control-label col-md-2" for="url">Url</label>
      <div class="col-md-10">
        <input type="text" value="{{ $post_id->url }}" name="url" id="url" placeholder="url" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"> Editar Post </button>
      </div>
    </div>

  </form>
@endsection