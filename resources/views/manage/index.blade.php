@extends('layouts.app')

@section('content')
<style>
    .cover-list-rmu {
        width: 100px;
        height: 100px;
        overflow: hidden;
    }
</style>
<div class="mb-5">
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            เนื้อหาทั้งหมด
        </h1>
    </div>
</div>

@if (session()->has('message'))
<div class="alert alert-primary" role="alert">
{{ session()->get('message') }}
</div>

@endif

@if (Auth::check())
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">More Posts</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/manage">รีเฟช</a>
          </li>
          
        </ul>
 
       
        <a class="nav-link" href="/category">จัดการแท็ก</a>
        <a class="nav-link btn btn-primary text-light" href="/blog/create">สร้างใหม่</a>
      
      </div>
    </div>
  </nav>
@endif
</div>
<table class="table table-striped table-hover border ">
    <thead>
        <tr>
            <th>ภาพหน้าปก</th>
            <th>ชื่อเรื่อง</th>
            <th>รายละเอียด</th>
            <th>เกี่ยวข้องกับ</th>
            <th>แก้ไข</th>
            <th>ลบออก</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($posts) && $posts->count())
        @foreach ($posts as $post)
     
        <tr>
        <td>
            <div class="cover-list-rmu">
                <img class="img-fluid rounded-start" style="height:100%;width:100%;object-fit:cover;" src="{{ asset('images/' . $post->image_path) }}" alt="">

            </div>
        </td>
            <td>{{ $post->title }}
                <br>
            <a class="link-primary" href="/blog/{{$post->slug}}">
                   * rmutto.ac.th/blog/{{$post->slug}}
                </a>
              
            </td>
            <td> By <span>{{ $post->user->name }}</span>
                <hr><span> Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
            </td>
            <td>
           
            @if ($post->categories)
                @foreach ($post->categories as $category)
                <a href="{{ route('category.show', $category->name) }}" class="text-decoration-none">
                    <span class="badge bg-dark"> {{ $category->name }}</span>

                </a>
                @endforeach
                @endif
            </td>
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <td>
          
                <span>
                    <a href="/blog/{{ $post->slug }}/edit" class="btn btn-success btn-sm">
                        Edit
                    </a>
                </span>

            
      
            </td>
            <td>
            <span>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger btn-sm" type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            </td>
            @endif
            </div>
            </div>
            @endforeach
            @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif

    </tbody>
</table>
{!! $posts->links() !!}



@endsection