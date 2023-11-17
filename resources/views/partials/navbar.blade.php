
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <div class="container">
        <a class="navbar-brand" href="/home">SPMulut</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/home">
                Home
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link {{ ($title === "Penyakit") ? 'active' : '' }}" href="/penyakit">
                Penyakit
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link {{ ($title === "Tentang") ? 'active' : '' }}" href="/about">
                Tentang
              </a>
            </li> --}}
          </ul>

          <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sudah Terlogin, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard/penyakit">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" href="/" class="dropdown-item"><i class="bi-bi-box-arrow-right"></i>
                      Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Login") ? 'active' : '' }} "href="/login" ><i class="bi bi-box-arrow-in-right"></i> 
                Admin
              </a>
            </li>
            @endauth
          </ul>

        </div>
      </div>
    </nav>