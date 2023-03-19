<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">RMUTTO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/blog/calendar">ปฎิทินการศึกษา</a>
              </li>
              @guest

              <li class="nav-item">
                <a class="nav-link" href="https://page.line.me/251opcbo?openQrModal=true">ติดต่อ</a>
              </li>
          
              @else
        
        
           
              <li class="nav-item">
                <a class="nav-link" href="/manage">{{ Auth::user()->name }}</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  {{ csrf_field() }}
                </form>
              </li>
              @endguest

              
            </ul>
          </div>
        </div>
      </nav>