<!-- CABECERA -->
<header
  class="header-animado bg-white text-[#1F3A5F] py-4 z-50 relative"
  id="mainHeader"
  style="border-bottom: 4px solid transparent; border-image: linear-gradient(to right, #1877c0, #fcc201); border-image-slice: 1;"
>
  <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
    <img src="{{ asset('images/Halappet.png') }}" alt="Logo Halappetit" class="w-48 h-auto" />

    <nav class="hidden md:flex space-x-8 font-medium text-[17px] tracking-wide" id="desktopNav">
      <a class="nav-link relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('inicio') }}">
        Inicio
      </a>
      <a class="nav-link relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('restaurantes.index') }}">
        Explorar Restaurantes
      </a>
      <a class="nav-link relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('solicitudes.create') }}">
        Publicar Restaurante
      </a>
      <a href="{{ route('foro.index') }}" class="nav-link relative text-[#1F3A5F] hover:text-[#FCC201] transition">
            Foro
      </a>

      @auth
      <div class="flex items-center gap-4">
        <!-- Icono de perfil -->
        <a href="{{ route('perfil.show') }}" title="Mi perfil" class="hover:text-[#FCC201] transition">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.667-10 5v3h20v-3c0-3.333-6.67-5-10-5z"/>
          </svg>

        </a>

        <!-- Cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex items-center gap-2 text-[#FCC201] hover:underline">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Cerrar sesión
          </button>
        </form>
      </div>
      @else
      <a href="{{ route('login') }}" class="flex items-center gap-2 text-[#FCC201] hover:underline">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l4-4m-4 4l4 4" />
        </svg>
        Iniciar sesión
      </a>
      @endauth
    </nav>

    <button aria-label="Abrir menú" class="md:hidden w-8 h-8 relative z-50" id="menuBtn">
      <span class="line top-line"></span>
      <span class="line middle-line"></span>
      <span class="line bottom-line"></span>
    </button>
  </div>
</header>
