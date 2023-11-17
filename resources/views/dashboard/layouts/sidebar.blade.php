<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/penyakit') ? 'active' : '' }}" href="/dashboard/penyakit">
            Penyakit
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/gejala') ? 'active' : '' }}" href="/dashboard/gejala">
            Gejala
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/basis') ? 'active' : '' }}" href="/dashboard/basis">
            Basis Pengetahuan
          </a>
        </li>
      </ul>
    </div>
  </nav>