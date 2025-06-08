<!-- CABECERA -->
<header 
    class="header-animado bg-white text-[#1F3A5F] py-4 z-50 relative"
    id="mainHeader"
    style="border-bottom: 4px solid transparent; border-image: linear-gradient(to right, #1877c0, #fcc201); border-image-slice: 1;"
>
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
        <img src="{{ asset('images/Halappet.png') }}" alt="Logo Halappetit" class="w-48 h-auto" />
        
        <nav class="hidden md:flex space-x-8 font-medium text-[17px] tracking-wide" id="desktopNav">
          <a class="nav-link flex items-center gap-2 relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('inicio') }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              Inicio
          </a>

          <a class="nav-link flex items-center gap-2 relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('restaurantes.index') }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
              Explorar Restaurantes
          </a>

          <a class="nav-link flex items-center gap-2 relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('solicitudes.create') }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              Publicar Restaurante
          </a>

          <a class="nav-link flex items-center gap-2 relative text-[#1F3A5F] hover:text-[#FCC201] transition" href="{{ route('foro.index') }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
              </svg>
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

<!-- Overlay para menú móvil -->
<div id="overlay" class="fixed inset-0 bg-black overlay-hidden z-40"></div>

<!-- Menú móvil -->
<div id="mobileMenu" class="menu-hidden fixed top-0 right-0 h-full w-80 max-w-[80vw] bg-white shadow-2xl z-50 overflow-y-auto">
    <div class="p-6 pt-20">
        <!-- Logo en menú móvil -->
        <div class="mb-8 pb-6 border-b border-gray-200">
            <img src="{{ asset('images/Halappet.png') }}" alt="Logo Halappetit" class="w-40 h-auto mx-auto" />
        </div>
        
        <!-- Enlaces de navegación móvil -->
        <nav class="space-y-2">
            <a href="{{ route('inicio') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#1F3A5F] hover:text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Inicio
                </div>
            </a>
            
            <a href="{{ route('restaurantes.index') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#1F3A5F] hover:text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Explorar Restaurantes
                </div>
            </a>
            
            <a href="{{ route('solicitudes.create') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#1F3A5F] hover:text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Publicar Restaurante
                </div>
            </a>
            
            <a href="{{ route('foro.index') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#1F3A5F] hover:text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    Foro
                </div>
            </a>
        </nav>
        
        <!-- Sección de usuario en móvil -->
        @auth
        <div class="mt-8 pt-6 border-t border-gray-200 space-y-2">
            <a href="{{ route('perfil.show') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#1F3A5F] hover:text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.667-10 5v3h20v-3c0-3.333-6.67-5-10-5z"/>
                    </svg>
                    Mi Perfil
                </div>
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="nav-link-movil opacity-0 translate-x-4 w-full text-left py-4 px-4 text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        Cerrar Sesión
                    </div>
                </button>
            </form>
        </div>
        @else
        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('login') }}" class="nav-link-movil opacity-0 translate-x-4 block py-4 px-4 text-[#FCC201] hover:bg-gray-50 rounded-lg transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l4-4m-4 4l4 4" />
                    </svg>
                    Iniciar Sesión
                </div>
            </a>
        </div>
        @endauth
    </div>
</div>