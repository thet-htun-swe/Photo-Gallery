<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="/" class="navbar-brand {{ Request::is("/") ? 'active disabled' : '' }}" >Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('albums-create') }}" class="navbar-brand {{ Request::is("/albums/create") ? 'active disabled' : '' }}" >Create Album</a>
                </li>
            </ul>                
        </div>
    </div>
</nav>