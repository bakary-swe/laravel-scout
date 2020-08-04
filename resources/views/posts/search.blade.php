@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Post</h1>
        <form action="{{route('posts.search')}}" method="get">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control input-lg" name="q" placeholder="Search for post..."
                value="{{old('q')}}">

                <span class="input-group-btn">
                    <button class="btn btn-dedfault btn-lg" type="submit">Search</button>
                </span>
            </div>
        </form>

        <hr/>

        @foreach ($results as $post)
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-8">
                    <a href="{{route('posts.show', $post->id)}}">
                        <h3>{{$post->title}}</h3>
                    </a>
                </div>
                <div class="col-md-4">
                    @if ($post->published)
                        <h4><span class="label label-success pull-right">PUBLISHED</span></h4>
                    @else
                        <h4><span class="label label-default pull-right">DRAFT</span></h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {{str_limit($post->content, 250)}}
                    </p>
                </div>
            </div>
        @endforeach

        <hr/>
        <div class="text-center">
            @if(count($results) > 0)
                {{$results->links()}}
            @endif
        </div>
    </div>
@endsection