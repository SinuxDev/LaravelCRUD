@extends('master')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-5">
                <div class="p-3">
                    @if (session('insertSuccess'))
                        <div class=" alert-message">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('insertSuccess') }} </strong>
                                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                            </div>
                        </div>
                    @endif

                    @if (session('UpdateSuccess'))
                        <div class=" alert-message">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('UpdateSuccess') }} </strong>
                                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                            </div>
                        </div>
                    @endif

                    @if (session('deleteSuccess'))
                        <div class=" alert-message">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('deleteSuccess') }} </strong>
                                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                            </div>
                        </div>
                    @endif

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <form action="{{ route('post#create') }}" method="POST">
                        @csrf
                        <div class="text-group mb-3">
                            <label for="">Post Title </label>
                            <input type="text" name="postTitle" id="" class=" form-control @error('postTitle') is-invalid @enderror" value=" {{old('postTitle')}} " placeholder=" Enter Post Title...">
                            @error('postTitle')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-group mb-3">
                            <label for="">Post Description </label>
                            <textarea name="postDescription" id="" cols="30" rows="10" class=" form-control @error('postDescription') is-invalid @enderror" placeholder=" Description..."> {{old('postDescription')}} </textarea>
                            @error('postDescription')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <input type="submit" name="btnSubmit" value="Create" class=" btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-7">
                <h3>
                    Total - {{ $posts->total() }}
                </h3>
                <div class="data-container">
                    @foreach ($posts as $item )
                            <div class="post p-3  shadow-sm mb-3">
                                <div class="row">
                                    <h5 class=" col-7"> {{ $item['title'] }} || {{ $item['id'] }} </h5>
                                </div>
                                {{-- <p class=" text-muted"> {{ substr($item['description'],0,200) }} </p> --}}
                                <p class=" text-muted"> {{ Str::words($item['description'], 25, '...') }} </p>

                                <span>
                                    <small>
                                        <i class=" fa-solid fa-money-bill-1" ></i> {{ $item->price }} Kyats
                                    </small>
                                </span> |

                                <span>
                                    {{ $item->address }}
                                </span> |

                                <span>
                                    {{ $item->rating }} <i class=" fa-solid fa-star text-warning" ></i>
                                </span>

                                <div class=" text-end">
                                    <a href="{{ route('post#delete',$item['id']) }}">
                                        <button class=" btn btn-danger btn-sm"><i class="fa-solid fa-trash mx-1"></i>ဖျက်ရန်</button>
                                    </a>
                                    <a href="{{ route('post#updatePage',$item['id']) }}">
                                        <button class=" btn btn-primary btn-sm"><i class="fa-solid fa-file-lines mx-1"></i>အပြည့်စုံဖတ်ရန်</button>
                                    </a>
                                </div>
                            </div>
                    @endforeach

                        {{-- @for ($i=0; $i<count($posts); $i++)
                            <div class="post p-3  shadow-sm mb-3">
                                <h5> {{ $posts[$i]['title'] }} </h5>
                                <p class=" text-muted"> {{ $posts[$i]['description'] }} </p>
                                <div class=" text-end">
                                    <button class=" btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    <button class=" btn btn-primary btn-sm"><i class="fa-solid fa-file-lines"></i></button>
                                </div>
                            </div>
                        @endfor --}}
                  </div>

                  {{ $posts->links() }}

                </div>
            </div>
        </div>
    </div>



@endsection
