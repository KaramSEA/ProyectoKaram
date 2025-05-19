
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LUCA TIC</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @include('partes.header') 
</head>
  <body class="bg-gray-100 text-gray-800 relative">
    @if(auth()->check())
    <span class="text-[#FCC201] font-semibold">
        Bienvenido, {{ auth()->user()->nombre }}
    </span>
    @else
    <p>no</p>
@endif
  
    <main>
      
    
    <section
  class="relative bg-[#0D1B2A] text-center py-40 overflow-hidden opacity-0 translate-y-10 transition-all duration-1000 ease-out"
  id="heroSection"
>
  <div
    class="absolute inset-0 bg-cover bg-center"
    style="background-image: url('/images/coucous.jpg');"
  ></div>
  @auth
    
    <span class="text-[#FCC201] font-semibold">
        Bienvenido, {{ auth()->user()->nombre }}
    </span>
  @endauth

  <!-- Aquí directamente el contenedor del input -->
  <div class="relative z-10 flex justify-center items-center">
    <div class="bg-white/80 backdrop-blur-md p-4 rounded-xl shadow-lg w-full max-w-2xl mx-4">
      <div class="relative">
        <input 
          type="text" 
          placeholder="Código postal, barrio de Madrid (Ej: 28005, Lavapiés, Halal...)" 
          class="w-full p-4 pr-16 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-[#FCC201] text-[#1F3A5F] placeholder-gray-400 text-lg"
        >
        <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-[#FCC201] p-2 rounded-lg hover:bg-[#e6b000] transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1F3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>
      <!-- Seccion de explora mas -->
       

       

      
      <!-- Nueva Sección Quienes Somos mejorada -->
      <!-- Sección Quienes Somos con animaciones -->
      <section
        class="bg-white py-20 px-4 w-full opacity-0 translate-y-10 transition-all duration-1000 ease-out"
        id="quienesSomos"
      >
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#1F3A5F] mb-6">
              <span
                class="relative inline-block opacity-0 translate-y-8 transition-all duration-700 ease-out"
              >
                <span class="relative z-10"> Halappetit </span>
                <span
                  class="absolute bottom-0 left-0 w-full h-3 bg-[#FCC201]/40 -z-0 transform translate-y-1"
                >
                </span>
              </span>
            </h2>
            <p
              class="text-lg text-gray-600 max-w-3xl mx-auto opacity-0 translate-y-8 transition-all duration-700 ease-out"
            >
            Descubre el equipo detrás de tu guía halal en Madrid. Nos apasiona conectar la comunidad musulmana con los mejores establecimientos certificados, ofreciendo una experiencia auténtica y confiable.
            </p>
          </div>
          <div class="grid md:grid-cols-2 gap-16 items-center mb-20">
            <!-- Imagen profesional con efecto hover -->
            <div
              class="relative group overflow-hidden rounded-xl shadow-2xl opacity-0 -translate-x-10 transition-all duration-700 ease-out"
            >
            <img src="{{ asset('images/FotoGeneral.jpg') }}" alt="Foto general" class="w-full h-auto" />

              <div
                class="absolute inset-0 bg-gradient-to-t from-[#1F3A5F]/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-700 flex items-end p-8"
              >
                <h3 class="text-white text-2xl font-bold">
                  Restaurantes de calidad halal
                </h3>
              </div>
            </div>
            <div
              class="space-y-8 opacity-0 translate-x-10 transition-all duration-700 ease-out"
            >
              <div>
                <h3
                  class="text-3xl font-bold text-[#1F3A5F] mb-4 relative inline-block"
                >
                  <span class="relative z-10"> Halappetit </span>
                  <span
                    class="absolute bottom-0 left-0 w-full h-2 bg-[#FCC201]/40 -z-0 transform translate-y-1"
                  >
                  </span>
                </h3>
                <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                HalalAppetit es una plataforma web desarrollada para facilitar la búsqueda de restaurantes y 
                servicios halal en Madrid. Nuestra misión es ofrecer a la comunidad musulmana una herramienta 
                intuitiva, rápida y visualmente atractiva que garantice opciones de calidad, certificadas y accesibles.

                </p>
                <p class="text-gray-700 leading-relaxed text-lg">
                Nos centramos en conectar a los usuarios con experiencias gastronómicas auténticas, proporcionando filtros 
                personalizados, ubicaciones geolocalizadas y una interfaz adaptada a todo tipo de dispositivos.
               
                </p>
              </div>
              <div class="grid grid-cols-2 gap-4">
                <div
                  class="bg-[#F8F9FA] p-6 rounded-lg border-l-4 border-[#FCC201] transform hover:scale-[1.02] transition duration-300"
                >
                  <h4 class="font-bold text-[#1F3A5F] mb-2">Misión</h4>
                  <p class="text-gray-600 text-sm">
                  Ofrecer una solución digital confiable y moderna 
                  para acceder fácilmente a establecimientos halal en Madrid.
                  </p>
                </div>
                <div
                  class="bg-[#F8F9FA] p-6 rounded-lg border-l-4 border-[#1877C0] transform hover:scale-[1.02] transition duration-300"
                >
                  <h4 class="font-bold text-[#1F3A5F] mb-2">Visión</h4>
                  <p class="text-gray-600 text-sm">
                  Ser el referente digital en España en búsqueda de productos y servicios halal,
                     fomentando inclusión, accesibilidad y autenticidad cultural.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <section class="bg-white py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-[#1F3A5F] mb-10 text-center">Explora Restaurantes Halal</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($restaurantes as $restaurante)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ $restaurante->foto_principal }}" alt="{{ $restaurante->nombre }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                            <h3 class="text-xl font-bold text-[#1F3A5F] mb-2">{{ $restaurante->nombre }}</h3>
                            <p class="text-gray-600 text-sm">{{ $restaurante->direccion }}, {{ $restaurante->ciudad }}</p>
                            <p class="mt-2 text-sm text-gray-700">{{ Str::limit($restaurante->descripcion, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </section>
          <!-- Propuesta de Valor con iconos -->
          <div
            class="bg-gradient-to-r from-[#0D1B2A] to-[#1F3A5F] rounded-2xl p-12 text-white shadow-2xl opacity-0 translate-y-10 transition-all duration-1000 ease-out"
            id="propuestaValor"
          >
            <div class="max-w-4xl mx-auto">
              <h3
                class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-center"
              >
                <span
                  class="border-b-4 md:border-b-4 border-[#FCC201] pb-0 md:pb-2"
                >
                  Nuestra Propuesta de Valor
                </span>
              </h3>

              <div class="grid md:grid-cols-2 gap-8">
                <div
                  class="flex items-start space-x-4 opacity-0 transition-all duration-700 ease-out"
                >
                  <div class="flex-shrink-0 bg-[#FCC201] rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1F3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                    
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-2">
                    Búsqueda personalizada
                    </h4>
                    <p class="text-gray-300">
                      Filtros inteligentes por ubicación, barrio, tipo de comida y certificación halal.


                    </p>
                  </div>
                </div>
                <div
                  class="flex items-start space-x-4 opacity-0 transition-all duration-700 ease-out"
                >
                  <div class="flex-shrink-0 bg-[#FCC201] rounded-full p-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1F3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
    d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zM12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z" />
</svg>

                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-2">Ubicación precisa</h4>
                    <p class="text-gray-300">
                    Resultados basados en geolocalización para encontrar restaurantes cercanos de forma rápida.


                    </p>
                  </div>
                </div>
                <div
                  class="flex items-start space-x-4 opacity-0 transition-all duration-700 ease-out"
                >
                  <div class="flex-shrink-0 bg-[#FCC201] rounded-full p-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1F3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
    d="M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
</svg>

                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-2">Diseño accesible
                    </h4>
                    <p class="text-gray-300">
                    Interfaz clara, moderna y adaptada a todos los dispositivos para una experiencia fluida.


                    </p>
                  </div>
                </div>
                <div
                  class="flex items-start space-x-4 opacity-0 transition-all duration-700 ease-out"
                >
                  <div class="flex-shrink-0 bg-[#FCC201] rounded-full p-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1F3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
    d="M12 3l2 2m0 0l2-2m-2 2v3m0 6v9M5 17a4 4 0 017-2.65A4 4 0 0119 17v2H5v-2zM8 21h8" />
</svg>

                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-2">Compromiso con la autenticidad</h4>
                    <p class="text-gray-300">
                    Verificación visual y textual de establecimientos que cumplen con normativas halal.

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('partes.footer') 
      

      

      <!--Esta parte del codigo es todo con lo que tiene que ver las cookies-->
      <!-- Aviso de Cookies Mejorado -->
      <div
        class="fixed bottom-0 left-0 right-0 bg-[#1F3A5F] text-white p-6 hidden z-50 shadow-lg"
        id="cookieConsent"
      >
        <div class="max-w-7xl mx-auto">
          <div
            class="flex flex-col md:flex-row justify-between items-start gap-6"
          >
            <div class="flex-1">
              <h3 class="text-xl font-bold mb-3 text-[#FCC201]">
                Preferencias de privacidad
              </h3>
              <p class="text-sm mb-4">
                Utilizamos cookies y tecnologías similares en nuestro sitio web
                y procesamos sus datos personales (como su dirección IP) para
                personalizar contenido, integrar medios y analizar el tráfico.
                También compartimos estos datos con terceras partes según sus
                preferencias.
              </p>
              <p class="text-xs">
                &iquest;Tiene menos de 14 años? No puede dar su consentimiento a
                los servicios opcionales. Pida a sus padres o tutores legales
                que acepten estos servicios por usted.
              </p>
            </div>
            <div class="flex flex-col gap-3 w-full md:w-auto">
              <div class="flex flex-col sm:flex-row gap-3">
                <button
                  class="bg-[#FCC201] text-[#1F3A5F] px-6 py-2 rounded-md font-medium hover:bg-[#e6b000] transition-colors whitespace-nowrap"
                  id="acceptAllCookies"
                >
                  Aceptar todo
                </button>
                <button
                  class="bg-transparent border border-white text-white px-6 py-2 rounded-md font-medium hover:bg-white hover:text-[#1F3A5F] transition-colors whitespace-nowrap"
                  id="rejectAllCookies"
                >
                  Continuar sin aceptar
                </button>
              </div>
              <button
                class="text-[#FCC201] text-sm underline hover:no-underline text-left md:text-center"
                id="showSettings"
              >
                Configurar preferencias
              </button>
            </div>
          </div>
          <!-- Configuración avanzada (oculta inicialmente) -->
          <div
            class="hidden mt-6 pt-6 border-t border-gray-500"
            id="cookieSettings"
          >
            <h4 class="text-lg font-bold mb-4">
              Configuración individual de cookies
            </h4>
            <div class="grid md:grid-cols-2 gap-6">
              <!-- Grupo de cookies 1 -->
              <div class="bg-[#2a4a75] p-4 rounded-lg">
                <div class="flex justify-between items-start mb-2">
                  <h5 class="font-bold">Cookies esenciales</h5>
                  <div
                    class="relative inline-block w-12 mr-2 align-middle select-none"
                  >
                    <input
                      checked=""
                      class="hidden"
                      disabled=""
                      id="essentialToggle"
                      type="checkbox"
                    />
                    <label
                      class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-not-allowed"
                      for="essentialToggle"
                    >
                      <span
                        class="block h-6 w-6 rounded-full bg-[#FCC201] transform translate-x-6"
                      >
                      </span>
                    </label>
                  </div>
                </div>
                <p class="text-xs text-gray-300">
                  Estas cookies son necesarias para el funcionamiento básico del
                  sitio web y no se pueden desactivar.
                </p>
              </div>
              <!-- Grupo de cookies 2 -->
              <div class="bg-[#2a4a75] p-4 rounded-lg">
                <div class="flex justify-between items-start mb-2">
                  <h5 class="font-bold">Cookies de rendimiento</h5>
                  <div
                    class="relative inline-block w-12 mr-2 align-middle select-none"
                  >
                    <input
                      class="hidden performance-cookie"
                      id="performanceToggle"
                      type="checkbox"
                    />
                    <label
                      class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                      for="performanceToggle"
                    >
                      <span
                        class="toggle-span block h-6 w-6 rounded-full bg-white transform"
                      >
                      </span>
                    </label>
                  </div>
                </div>
                <p class="text-xs text-gray-300">
                  Nos permiten analizar el uso del sitio web y mejorar su
                  experiencia.
                </p>
              </div>
              <!-- Grupo de cookies 3 -->
              <div class="bg-[#2a4a75] p-4 rounded-lg">
                <div class="flex justify-between items-start mb-2">
                  <h5 class="font-bold">Cookies de funcionalidad</h5>
                  <div
                    class="relative inline-block w-12 mr-2 align-middle select-none"
                  >
                    <input
                      class="hidden functionality-cookie"
                      id="functionalityToggle"
                      type="checkbox"
                    />
                    <label
                      class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                      for="functionalityToggle"
                    >
                      <span
                        class="toggle-span block h-6 w-6 rounded-full bg-white transform"
                      >
                      </span>
                    </label>
                  </div>
                </div>
                <p class="text-xs text-gray-300">
                  Permiten recordar sus preferencias y personalizar su
                  experiencia.
                </p>
              </div>
              <!-- Grupo de cookies 4 -->
              <div class="bg-[#2a4a75] p-4 rounded-lg">
                <div class="flex justify-between items-start mb-2">
                  <h5 class="font-bold">Cookies de marketing</h5>
                  <div
                    class="relative inline-block w-12 mr-2 align-middle select-none"
                  >
                    <input
                      class="hidden marketing-cookie"
                      id="marketingToggle"
                      type="checkbox"
                    />
                    <label
                      class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                      for="marketingToggle"
                    >
                      <span
                        class="toggle-span block h-6 w-6 rounded-full bg-white transform"
                      >
                      </span>
                    </label>
                  </div>
                </div>
                <p class="text-xs text-gray-300">
                  Utilizadas por servicios de terceros para mostrar publicidad
                  relevante.
                </p>
              </div>
            </div>
            <div class="mt-6 flex justify-between items-center">
              <a
                class="text-[#FCC201] text-sm underline hover:no-underline"
                href="/politica-privacidad.html"
              >
                Ver política de privacidad completa
              </a>
              <button
                class="bg-[#FCC201] text-[#1F3A5F] px-6 py-2 rounded-md font-medium hover:bg-[#e6b000] transition-colors"
                id="saveSettings"
              >
                Guardar preferencias
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>