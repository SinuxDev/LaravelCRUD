@extends('master')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class=" col-6 offset-3">
                <div class="my-3">
                    <a href="{{ route('post#updatePage',$post[0]['id']) }}" class=" text-decoration-none text-black" >
                        <i class="fa-solid fa-arrow-left"></i> back
                    </a>
                </div>
                <form action="{{ route('post#update')}}" method="POST" >
                    @csrf
                    <label>Post Title</label>
                    <input type="hidden" name="postID" id="" value="{{ $post[0]['id'] }}">
                    <input type="text" name="postTitle" class=" form-control my-3 @error('postTitle') is-valid @enderror" value="{{ old('postTitle',$post[0]['title']) }}" placeholder=" Enter post title">
                    @error('postTitle')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label>Post Description</label>
                    <textarea class=" form-control my-3 @error('postDescription') is-valid @enderror " name="postDescription" id="" cols="30" rows="10" placeholder=" Enter Post Description">{{ $post[0]['description'] }}</textarea>
                    @error('postDescription')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="submit" value="Update" class=" btn bg-danger text-white">
                </form>
            </div>
        </div>

    </div>

@endsection
