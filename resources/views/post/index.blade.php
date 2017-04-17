@extends('layouts.app')

@section('container')
  {{ $posts ->render() }}

  @foreach($posts as $post)
    <div class="row">
      <div class="col-md-12">
        <h2>
          <a href="{{ route('post_path',['post' => $post -> id ])  }}"> {{$post -> title}}</a>
          <small>
            <a href="{{ route('edit_post_path', ['post_id' => $post->id])  }}" class="btn btn-primary"> Editar </a>
          </small>
          <form action="{{ route('delete_post_path', ["post" => $post->id]) }}" method="POST">

            {{ csrf_field()  }}

            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger"> Eliminar</button>

          </form>
        </h2>
        <p>
          Posted <b> {{$post -> created_at ->diffForHumans() }} </b>
        </p>

      </div>
    </div>
    <hr>
  @endforeach

  {{ $posts ->render() }}
@endsection
