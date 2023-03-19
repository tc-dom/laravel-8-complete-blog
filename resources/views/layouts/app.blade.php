<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Rajamangala university of technology">
  <link rel="icon" href="/images/rmutto.png" type="image/png" sizes="12x16">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Rajamangala university of technology</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Noto Sans Thai', sans-serif;
    }

    .cover_rmutto {
      width: 100%;
      max-height: 500px;
      overflow: hidden;
      margin-bottom: 30px;
      border-radius: 12px;
    }

    .ember {
      display: inline-block;
      margin: 10px;
    }

    .ember svg {
      width: 25px;
      height: 25px;
      fill: #999;
    }

    .cover_rmutto img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .container_rmutto {
      
    }

    .drop_caper::first-letter {
      -webkit-initial-letter: 4;
      initial-letter: 4;
      color: orange;
      font-weight: bold;
      margin-right: .75em;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="blog.css" rel="stylesheet">
</head>

<body>

  <div class="container_rmutto">

  @include('layouts.header')
    <div class="nav-scroller py-1 mb-2">
    @include('layouts.navbar')
    </div>
      <div class="container mb-5">
        <div>
          @yield('content')
        </div>

      
      </div>

      <div>
          @include('layouts.footer')
        </div>
    </div>
  


</body>

</html>