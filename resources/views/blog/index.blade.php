@extends('layouts.app')

@section('content')


<style>
    .post_cover{
        height: 300px;
        overflow: hidden;
    }
    .bar_flex{
        margin-bottom: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
</style>
<div class="bar_flex">
    <h1>ล่าสุดจากมหาลัย</h1>
    {!! $posts->links() !!}
</div>

<div class="row">
    @if(!empty($posts) && $posts->count())
    @foreach ($posts as $post)

    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
        <div class="card mb-3">
          <div class="post_cover">
            <img class="img-fluid rounded-start card-img-top" style="height:100%;width:100%;object-fit:cover;" src="{{ asset('images/' . $post->image_path) }}" alt="">

          </div>

            <div class="card-body">
        
              <a href="/blog/{{ $post->slug }}" class="link-primary text-decoration-none">
                <h5 class="card-title">{{ $post->title }}</h5>
            </a>
            <p class="card-text">
                @if ($post->categories)
                @foreach ($post->categories as $category)
                <a class="badge bg-dark text-light" href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a>
                @endforeach
                @endif
            </p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        
    </div>
      @endforeach
      @else
      <h1>ไม่มีโพสต์ที่จะแสดง</h1>
  @endif
</div>

@endsection