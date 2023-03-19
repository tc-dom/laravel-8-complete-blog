
@extends('layouts.app')

@section('content')

 
@if ($errors->any())
<div class="w-4/5 m-auto">
    <ul>
        @foreach ($errors->all() as $error)

        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    </ul>
</div>
@endif

<nav class="navbar mb-5 navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">สร้างใหม่..</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/manage">เนื้อหา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/category">จัดการแท็ก</a>
          </li>
          
        </ul>
 
       

       
      
      </div>
    </div>
  </nav>

<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
  
 
      <label for="inputPassword2" class="sr-only">กรอกชื่อแท็กที่ต้องการสร้างใหม่</label>
      <input  value="{{$category->name}}"    name="name" type="text" class="form-control"  placeholder="ตัวอย่าง ... บางพระ">
   
    <button type="submit" class="mt-5 btn btn-primary mb-2">บันทึก</button>
  </form>

    </div>
</div>

@endsection
