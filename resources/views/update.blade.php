@extends('master')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class=" col-6 offset-3">
                <div class="my-3">
                    <a href="{{ route('post#home') }}" class=" text-decoration-none text-black" >
                        <i class="fa-solid fa-arrow-left"></i> back
                    </a>
                </div>
                <h3> {{ $post[0]['title']}} </h3>
                <p class=" text-muted">
                    {{ $post[0]['description'] }}
                </p>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-3 offset-8">
                <a href="{{ route('edit#editPage',$post[0]['id']) }}">
                    <button class=" btn bg-dark text-white">Edit</button>
                </a>
            </div>
        </div>
    </div>

@endsection
