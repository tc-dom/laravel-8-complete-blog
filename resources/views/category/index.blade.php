@extends('layouts.app')

@section('content')
<div class="mb-5">
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            แท็กทั้งหมด
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
      <a class="navbar-brand" href="#">More Categories</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/category">รีเฟช</a>
          </li>
          
        </ul>
 
       
        <a class="nav-link" href="/manage">จัดการโพสต์</a>
        <a class="nav-link btn btn-primary text-light" href="/category/create">สร้างใหม่</a>
      
      </div>
    </div>
  </nav>
@endif

</div>
<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th>ชื่อแท็ก</th>
            <th>จำนวนที่ถูกใช้</th>
            <th>สร้างเมื่อ</th>
            @if (Auth::check())
            <th>แก้ไข</th>
            <th>ลบ</th>
            @else
            <th>ดู</th>
            @endif
        </tr>
    
    </thead>
    <tbody>
        @if(!empty($categories) && $categories->count())
        @foreach ($categories as $category)

        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->posts_count }}</td>
            <td>Created on {{ date('jS M Y', strtotime($category->updated_at)) }}</>
            </td>
            @if (isset(Auth::user()->id) && Auth::user()->id == $category->user_id)
            <td>
               
                <span class="float-right">
                    <a href="/category/{{ $category->id }}/edit" class="btn btn-success btn-sm">
                        Edit
                    </a>
                </span>

           
              
            </td>
            <td>
                <span class="float-right">
                    <form action="/category/{{ $category->id }}" method="POST">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger btn-sm" type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            </td>
            @else
            <td>
                <a href="/category/{{ $category->name }}" class="btn btn-primary btn-sm">Views</a>
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
{!! $categories->links() !!}




@endsection