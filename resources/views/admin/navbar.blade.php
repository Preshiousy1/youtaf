<header class="blog-header py-3">
  <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
      {{-- <span class="mr-2"><a class="text-muted" href="/about">About</a></span>
      <span class="mr-2"> <a class="text-muted" href="/services">Services</a></span> --}}
      <a class="text-muted ml-4" href="/categories">Categories</a>
      <a class="text-muted ml-4" href="/posts">Posts</a>
      <a class="text-muted ml-4" href="/settings">Settings</a>


    </div>
    <div class="col-4 text-center ">
      <a href="/" >
        <img src="/storage/images/YOUTAF_1.png" height="70px" alt="youtaf logo" />
      </a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
     
    <a  class="text-muted" href="/search" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>

      {{-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> --}}
      <!-- Authentication Links -->
      @guest
     
          <a class=" btn btn-sm btn-outline-secondary mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
     
      @if (Route::has('register'))
         
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
         
      @endif
  @else
      <li class="nav-item dropdown list-unstyled">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/home">Dashboard</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
  @endguest
    </div>
  </div>
</header>
