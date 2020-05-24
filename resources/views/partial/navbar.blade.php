<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">@current_time</a>
      </div>
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="#">Auth</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        @auth()
        <a class="btn btn-sm btn-outline-secondary" href="{{route('userProfile')}}">Profile({{optional(auth()->user())->name}})</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{route('userLogout')}}">Logout</a>
        @endauth
        @guest()
         <a class="btn btn-sm btn-outline-secondary" href="{{route('registration')}}">Register</a>
         <a class="btn btn-sm btn-outline-secondary" href="{{route('userlogin')}}">Login</a>
         @endguest
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

      <a class="p-2 text-muted" href="#">Home</a>
      <a class="p-2 text-muted" href="#">Contact</a>

    </nav>
  </div>
