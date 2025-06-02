@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-[60vw_40vw] gap-6 px-4 py-6">

    <!-- Sección izquierda: listado de restaurantes -->
    <div class="space-y-6">
        <div class="flex items-center gap-2">
            <input type="text" id="searchInput" placeholder="Buscar restaurante, barrio o ciudad..." class="w-full border rounded px-4 py-2">
            <button id="searchBtn" class="bg-yellow-400 px-3 py-2 rounded">🔍</button>
        </div>

        <p>{{ count($restaurantes) }} resultados</p>

        @foreach($restaurantes as $index => $restaurante)
            <div class="card-restaurante flex flex-col md:flex-row gap-4 bg-white rounded shadow p-4 {{ $index >= 4 ? 'hidden' : '' }}">
                <a href="{{ route('restaurantes.show', $restaurante->slug) }}" class="flex-1 flex flex-col md:flex-row gap-4 hover:shadow-lg transition">
                    <img src="{{ $restaurante->foto_principal }}" alt="{{ $restaurante->nombre }}" class="w-full md:w-32 h-32 object-cover rounded">

                    <div class="flex flex-col justify-between w-full">
                        <div>
                            <h3 class="text-xl font-semibold text-[#1F3A5F]">{{ $restaurante->nombre }}</h3>
                            <p class="text-sm text-gray-600"><strong>Dirección:</strong> {{ $restaurante->direccion }}</p>
                            <p class="text-sm text-gray-600 ciudad"><strong>Ciudad:</strong> {{ $restaurante->ciudad }}</p>
                            <p class="text-sm text-gray-600"><strong>Tipo de cocina:</strong> {{ $restaurante->tipo_cocina }}</p>
                            <p class="text-sm text-gray-600"><strong>Teléfono:</strong> {{ $restaurante->telefono }}</p>
                            <p class="text-sm text-gray-600"><strong>Descripción:</strong> {{ Str::limit($restaurante->descripcion, 100) }}</p>
                            @if($restaurante->verificado)
                                <span class="inline-block mt-2 text-green-500 font-semibold text-sm">✅ Verificado</span>
                            @endif
                        </div>
                    </div>
                </a>

                <div class="mt-4">
                    <button onclick="comoLlegar('{{ $restaurante->latitud }}', '{{ $restaurante->longitud }}')"
                        class="inline-block bg-yellow-400 text-[#1F3A5F] px-4 py-2 rounded hover:bg-yellow-300 transition">
                        📍 Cómo llegar
                    </button>

                    @auth
                    <form action="{{ route('favorito.toggle', $restaurante->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit"
                            class="text-sm px-4 py-2 rounded 
                            {{ auth()->user()->restaurantesFavoritos->contains($restaurante->id) ? 'bg-red-200 text-red-700' : 'bg-blue-200 text-blue-700' }}">
                            {{ auth()->user()->restaurantesFavoritos->contains($restaurante->id) ? '💔 Quitar de favoritos' : '❤️ Añadir a favoritos' }}
                        </button>
                    </form>
                    @endauth
                </div>
            </div>
        @endforeach

        @if(count($restaurantes) > 4)
            <div class="text-center mt-6">
                <button id="loadMoreBtn" class="bg-yellow-400 text-[#1F3A5F] px-6 py-3 rounded hover:bg-yellow-300 transition">
                    Ver más restaurantes
                </button>
            </div>
        @endif
    </div>

    <!-- Sección derecha: Mapa sticky -->
    <div class="hidden md:block">
        <div id="map" class="w-full h-[calc(100vh-120px)] sticky top-20 rounded shadow"></div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Leaflet core -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.min.js"></script>

<script>
    const restaurantes = @json($restaurantes);
    const map = L.map('map').setView([40.416775, -3.703790], 11); // esto es Madrid por defecto 

    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // este es la capa de OpenStreetMap
        attribution: '&copy; OpenStreetMap contributors' //
    }).addTo(map);

    restaurantes.forEach(r => {
        if (r.latitud && r.longitud) {
            L.marker([r.latitud, r.longitud])
                .addTo(map)
                .bindPopup(`<strong>${r.nombre}</strong><br>${r.direccion}`);
        }
    });

    document.getElementById('searchBtn').addEventListener('click', () => {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('.card-restaurante').forEach(card => {
            const nombre = card.querySelector('h3').textContent.toLowerCase();
            const ciudad = card.querySelector('.ciudad')?.textContent.toLowerCase() || '';
            card.style.display = (nombre.includes(searchTerm) || ciudad.includes(searchTerm)) ? 'flex' : 'none';
        });
    });

    let visibleCount = 4;
    const increment = 4;
    const cards = document.querySelectorAll('.card-restaurante');
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            let hiddenCards = Array.from(cards).filter(card => card.classList.contains('hidden'));

            hiddenCards.slice(0, increment).forEach(card => {
                card.classList.remove('hidden');
            });

            visibleCount += increment;

            if (visibleCount >= cards.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
    }

    let routingControl = null;

    function comoLlegar(destLat, destLng) {
        if (!navigator.geolocation) {
            alert("Tu navegador no soporta geolocalización.");
            return;
        }

        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                if (routingControl) {
                    map.removeControl(routingControl);
                }

                routingControl = L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLng),
                        L.latLng(destLat, destLng)
                    ],
                    routeWhileDragging: false,
                    show: false,
                    addWaypoints: false,
                    createMarker: function(i, waypoint, n) {
                        return L.marker(waypoint.latLng, {
                            icon: L.icon({
                                iconUrl: i === 0 
                                    ? 'https://cdn-icons-png.flaticon.com/512/64/64113.png'
                                    : 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                                iconSize: [25, 25]
                            })
                        });
                    }
                }).addTo(map);

                routingControl.on('routesfound', function(e) {
                    const route = e.routes[0];
                    const distanciaKm = (route.summary.totalDistance / 1000).toFixed(2);
                    const duracionMin = Math.round(route.summary.totalTime / 60);

                    const popupContent = `
                        <strong>Ruta calculada en coche:</strong><br>
                        <b>${distanciaKm} km</b><br>
                        <b>${duracionMin} min</b>
                    `;

                    const destino = L.latLng(destLat, destLng);
                    L.popup()
                        .setLatLng(destino)
                        .setContent(popupContent)
                        .openOn(map);
                });

                map.fitBounds([
                    [userLat, userLng],
                    [destLat, destLng]
                ]);
            },
            (error) => {
                alert("No se pudo obtener tu ubicación. Asegúrate de permitir el acceso.");
                console.error(error);
            }
        );
    }
</script>
@endsection