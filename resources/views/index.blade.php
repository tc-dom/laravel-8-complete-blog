@extends('layouts.app')

@section('content')
<main class="container">

    <div class="grid grid-cols-1 m-auto mb-5" style="background-image: url(
    'images/rmutto.jpg'
);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    height: 500px;">
        <div class="p-4 p-md-5 mb-4 text-white rounded">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Rajamangala university of technology</h1>
                <p class="lead my-3">เอกลักษณ์ของมหาวิทยาลัย : มหาวิทยาลัยนำความรู้สู่สังคม อัตลักษณ์ของมหาวิทยาลัย : บัณฑิตนักปฏิบัติ</p>

            </div>
        </div>
    </div>


    <div>
        @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
        @endif

        @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create" class="btn btn-primary mb-5">
                Create post
            </a>
        </div>
        @endif
    </div>
    <h1 class="mb-5">ข่าวสารจากมหาลัย</h1>
    <div class="row mb-2">

        @foreach ($posts as $post)


        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img-fluid rounded-start" style="height:100%;width:100%;object-fit:cover;" src="{{ asset('images/' . $post->image_path) }}" alt="">


                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="/blog/{{ $post->slug }}" class="link-dark text-decoration-none">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>
                            <p class="card-text">
                                @if ($post->categories)
                                @foreach ($post->categories as $category)
                                <a class="badge bg-light text-dark" href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a>
                                @endforeach
                                @endif

                            </p>
                            <p class="card-text"><small class="text-muted">

                                    @if($post->user->name)
                                    By <span>{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}

                                    @endif
                                </small></p>
                         
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @endforeach



    </div>


    <div class="d-block mb-5" style="text-align:right">

        <a href="/blog" class="btn btn-secondary btn-sm">อ่านเพิ่มเติม</a>
    </div>

    <div class="row g-5">
        <div class="col-md-8">


            <article class="blog-post">
                <h2 class="blog-post-title">ประวัติความเป็นมา</h2>
                <p class="blog-post-meta">Mar 19, 2023 by <a href="#">RMUTTO</a></p>

                <p> มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก เป็นมหาวิทยาลัยด้านวิทยาศาสตร์และเทคโนโลยี จัดตั้งขึ้นตามพระราชบัญญัติมหาวิทยาลัยเทคโนโลยีราชมงคล พ.ศ. 2548 ซึ่งได้รับ การประกาศ ในราชกิจจานุเบกษาและมีผลบังคับใช้ตั้งแต่วันที่ 19 มกราคม 2548 เป็นต้นมา โดยในพระราชบัญญัติ ฉบับนี้ ได้กำหนดให้รวมกลุ่มวิทยาเขตในสังกัดสถาบันเทคโนโลยีราชมงคล จำนวน 4 วิทยาเขตและ 1 คณะ ตามมาตรา 65(3) ได้แก่ วิทยาเขตจักรพงษภูวนารถ วิทยาเขตอุเทนถวาย วิทยาเขตบางพระ วิทยาเขตจันทบุรี และคณะเกษตรศาสตร์บางพระ พร้อมทั้งให้ยกฐานะขึ้นเป็นมหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก ตามมาตรา 5(3)

                    มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก จัดการศึกษาทั้งในระดับปริญญาโท ปริญญาตรี และระดับต่ำกว่าปริญญาตรี ในสาขาวิชาชีพต่างๆ กระจายอยู่ตามวิทยาเขตในสังกัดทั้ง 4 แห่ง ตามความเชี่ยวชาญเฉพาะทางของแต่ละวิทยาเขต ซึ่งหน่วยงานแต่ละแห่งของมหาวิทยาลัยฯล้วนมีประวัติในการก่อตั้ง และจัดการศึกษาด้านวิชาชีพไม่น้อยกว่า 50 ปี ดังนั้น มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก จึงจัดเป็นมหาวิทยาลัยทางด้านวิทยาศาสตร์และเทคโนโลยี 1 ใน 15 แห่ง ที่จัดการศึกษาระดับ ปริญญาสายวิชาชีพ ด้วยความเชี่ยวชาญมาอย่างยาวนานแห่งหนึ่งของประเทศไทย</p>
                <h2>Blockquotes</h2>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/hIIVPkf7DwM?start=6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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

</main>










@endsection