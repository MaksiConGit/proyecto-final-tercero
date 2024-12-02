<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fs-5 fw-semibold" href="javascript:void(0)">Fray Luis Beltrán</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->


        <!-- User -->
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="../template_files/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="{{ route('accountable.redirect', Auth::user()->id) }}">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="../template_files/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                        <!-- Nombre completo del modelo relacionado -->
                        <small class="text-muted">
                          @if (Auth::user()->accountable)
                              {{ Auth::user()->accountable->name ?? '' }} {{ Auth::user()->accountable->lastname ?? '' }}
                          @else
                              No asignado
                          @endif
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id)}}">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">Mi perfil</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{route('profile.edit')}}">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Opciones</span>
                  </a>
                </li>
    
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Salir</span>
                    </a>
                  </form>
                </li>
              </ul>
            </li>
            @else
                <a href="{{ route('login') }}">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

        
        <!--/ User -->
      </ul>
    </div>

</nav>
