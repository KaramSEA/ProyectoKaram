<!-- CABECERA -->
<header
  class="header-animado bg-white text-[#1F3A5F] py-4 z-50 relative"
  id="mainHeader"
  style="border-bottom: 4px solid transparent; border-image: linear-gradient(to right, #1877c0, #fcc201); border-image-slice: 1;"
>
  <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
    <img src="{{ asset('images/Halappet.png') }}" alt="Logo Halappetit" class="w-48 h-auto" />

    <nav class="hidden md:flex space-x-8 font-medium text-[17px] tracking-wide" id="desktopNav">
      <a class="nav-link relative opacity-0 translate-y-4 text-[#1F3A5F] hover:text-[#FCC201] transition-all duration-500 after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#FCC201] after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300" href="#">
        Inicio
      </a>
      <a class="nav-link relative opacity-0 translate-y-4 text-[#1F3A5F] hover:text-[#FCC201] transition-all duration-500 after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#FCC201] after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300" href="{{ route('restaurantes.index') }}">
        Explorar Restaurantes
      </a>
      <a class="nav-link relative opacity-0 translate-y-4 text-[#1F3A5F] hover:text-[#FCC201] transition-all duration-500 after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#FCC201] after:left-0 after:-bottom-1 hover:after:w-full after:transition-all after:duration-300" href="#">
        ¿Quiénes somos?
      </a>
     

      @auth
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

<!-- FONDO OSCURO -->
<div class="fixed left-0 w-full bg-black overlay-hidden z-30" id="overlay"></div>

<!-- Menú lateral móvil -->
<div class="fixed right-0 bg-white text-gray-900 p-6 pt-8 menu-hidden z-40 flex flex-col gap-6 w-3/6 text-[16px] font-medium" id="mobileMenu">
  <a class="nav-link-movil opacity-0 translate-x-4 transition-all duration-700 relative text-[#1F3A5F] hover:text-[#FCC201]" href="#">
    Inicio
  </a>
  <a class="nav-link-movil opacity-0 translate-x-4 transition-all duration-700 relative text-[#1F3A5F] hover:text-[#FCC201]" href="#">
    ¿Quiénes somos?
  </a>
  <a class="nav-link-movil opacity-0 translate-x-4 transition-all duration-700 relative text-[#1F3A5F] hover:text-[#FCC201]" href="#">
    Proyectos
  </a>

  @auth
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
@else
  <a href="{{ route('login') }}" class="flex items-center gap-2 text-[#FCC201] hover:underline">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l4-4m-4 4l4 4" />
    </svg>
    Iniciar sesion
  </a>
@endauth

  <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg border-t border-gray-200">
    <div class="mt-auto pb-4">
      <h4 class="text-[#fcc201] font-bold mb-2 ml-1">Contactos:</h4>
      <div class="grid grid-cols-2 gap-4 ml-4">
        <div>
          <p class="text-sm text-gray-700 font-medium">Madrid</p>
          <p class="text-sm text-gray-700">+34 91 028 99 27</p>
        </div>
        <div>
          <p class="text-sm text-gray-700 font-medium">Barcelona</p>
          <p class="text-sm text-gray-700">+34 93 355 49 98</p>
        </div>
      </div>
    </div>
  </div>
</div>
