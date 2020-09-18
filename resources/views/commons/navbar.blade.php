<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="site_title collapse navbar-collapse navbar-left">
      <a class="navbar-brand" href="/">North Beach</a>
    @if (Auth::check())
      <ul class="navbar-nav mr-auto"></ul>
      <div class="site_title navbar-right">
        {{--投稿ページリンク--}}
        <a class="navbar-brand" href="{{route('posts.create')}}">Post</a>
        {{-- ランキングページリンク  --}}
        <a class="navbar-brand" href="#">Top Charts</a>
        {{-- ログアウトページリンク  --}}
        <a class="navbar-brand" href="{{route('logout.get')}}">Logout</a>
    @else      
      <ul class="navbar-nav mr-auto"></ul>
      <div class="site_title navbar-right">
        {{-- ランキングページリンク  --}}
        <a class="navbar-brand" href="#">Top Charts</a>
        {{-- ユーザ登録ページリンク  --}}
        <a class="navbar-brand" href="{{route('signup.get')}}">Sign Up</a>
        {{-- ログインページリンク  --}}
        <a class="navbar-brand" href="{{route('login')}}">Login</a>
      </div>
    @endif
    </div>
  </nav>
</header>