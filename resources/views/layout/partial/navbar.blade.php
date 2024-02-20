<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Laravel</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student/all">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/extra">Ekstra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kelas">Kelas</a>
                </li>
            </ul>
            @if(Auth::check())
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit" class="btn">Logout</button>
                          </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="btn btn-outline-success">Login</a>
            @endif
        </div>
    </div>
</nav>
