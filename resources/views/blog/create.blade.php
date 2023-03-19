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

<div class="w-4/5 m-auto pt-20">
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf



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
         
               

                <button type="submit" class="nav-link text-light btn btn-primary btn-lg">
                    สร้าง
                </button>
              
              </div>
            </div>
          </nav>


        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlInput1">ชื่อเรื่อง</label>
                    <input name="title" type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Type any text...">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleFormControlSelect2">หมวดหมู่ (เลือกได้มากกว่า 1)</label>
                    <select multiple name="category_id[]" id="category_id" class="form-control" id="exampleFormControlSelect2">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mt-3">
                    <label for="exampleFormControlInput1">ที่อยู่แบบกำหนดเอง</label>
                    <input name="slug" type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="ภาษาอังกฤษเท่านั้น">
                </div>


                <div class="mt-3">
                    <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                        <span class="mt-2 text-base leading-normal">
                            รูปภาพปก
                        </span>
                        <input type="file" name="image" class="hidden">
                    </label>
                </div>
            </div>





            <div class="col">

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">เนื้อหา</label>
                    <textarea name="description" id="body" class="form-control" rows="8"></textarea>

                </div>
              
            </div>
        </div>
    </form>
</div>



<script src="https://cdn.tiny.cloud/1/325ujzwmhqwn5vr9igupk2en8n45cczu0ws13loprxow194o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
        tinymce.init({
            selector: 'textarea#body',
            plugins: 'image code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | image',
            images_upload_url: '{{ route('manage.image.upload') }}',
            images_upload_credentials: true,
    images_upload_url: '{{ route('manage.image.upload') }}',
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '{{ route('manage.image.upload') }}');
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
        });
    </script>

@endsection