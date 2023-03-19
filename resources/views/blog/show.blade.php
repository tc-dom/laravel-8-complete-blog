@extends('layouts.app')

@section('content')


<style>
    .drop_caper{
        overflow: hidden;
        display: block;
        width: 100%;
    }
    .drop_caper img{
        width: 100% !important;
        max-width: 100%;
        display: block;
        margin: 20px auto;
        border-radius: 12px;
    }
</style>
<div class="mt-3 mb-5">
    <h1>{{$post->title}}</h1>
    <span>
        By <span>{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}

    </span>
</div>
<div class="cover_rmutto">
    <img src="{{asset('images/' . $post->image_path)}}" alt="" srcset="">
</div>


<div class="row g-5">
    <div class="col-md-8">
        <div class="mb-3">
            @if ($post->categories)
            @foreach ($post->categories as $category)
            <a class="badge bg-dark text-white" href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a>
            @endforeach
            @endif
        </div>
        <div class="drop_caper">
        <p>{!! $post->description !!}</p>
        </div>





    </div>

    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded">
                <a href="https://rmuttoautonomous.rmutto.ac.th">
                    <h4 class="fst-italic">อ่านเลยยย</h4>
                </a>

                <p class="mb-0">เรื่องเด่นในรั้ว มทร.
                    ร่วมศึกษาข้อมูลการเป็นมหาวิทยาลัยในกำกับของรัฐ

                    ร่วมศึกษาข้อมูลการเป็นมหาวิทยาลัยในกำกับของรัฐ ได้ที่

                </p>
            </div>

            <div class="p-4">
                <h4 class="fst-italic">การเข้าถึง</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="http://regis.rmutto.ac.th/registrar/home.asp">ระบบทะเบียนออนไลน์</a></li>
                    <li><a href="http://library.rmutto.ac.th/liberty/main.do">ระบบห้องสมุดอัตโนมัติ</a></li>
                    <li><a href="https://lib.rmutto.ac.th/?page_id=1812">ระบบหนังสืออิเล็กทรอนิกส์</a></li>
                    <li><a href="https://template.rmutto.ac.th/studentemail/">ระบบอีเมล์นักศึกษา</a></li>
                    <li><a href="https://lib.rmutto.ac.th/?page_id=1812">ฐานข้อมูลออนไลน์</a></li>
                    <li><a href="https://tablet.rmutto.ac.th/regis/">ระบบยืมเเท็ปเเล็ต</a></li>
                    <li><a href="https://e-manage.rmutto.ac.th/">ระบบ e-manage RMUTTO</a></li>
                    <li><a href="http://mis.rmutto.ac.th/">ระบบ MIS</a></li>
                    <li><a href="https://template.rmutto.ac.th/personemail/">ระบบอีเมล์บุคลากร</a></li>
                    <li><a href="https://ita.rmutto.ac.th/">ITA 2565</a></li>
                    <li><a href="https://ita.rmutto.ac.th/">ITA 2564</a></li>
                    <li><a href="https://www.rmutto.ac.th/index.php?menu=ita63">ITA 2563</a></li>
                    <li><a href="https://www.rmutto.ac.th/index.php?menu=ita62">ITA 2562</a></li>
                </ol>
            </div>

            <div class="p-4">
                <h4 class="fst-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="https://www.youtube.com/user/RMUTTOChannel">YouTube</a></li>
                    <li><a href="https://page.line.me/251opcbo?openQrModal=true">Line</a></li>
                    <li><a href="https://twitter.com/RMUTT0">Twitter</a></li>
                    <li><a href="https://www.facebook.com/rmutto.ac.th/">Facebook</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection