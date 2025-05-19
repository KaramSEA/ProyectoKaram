<footer class="bg-[#0D1B2A] text-white py-10 mt-20">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-sm">
        <div>
            <h4 class="text-lg font-bold text-[#FCC201] mb-4">Halappetit</h4>
            <p class="text-gray-300">Tu guía de confianza para encontrar restaurantes halal certificados en Madrid.</p>
        </div>

        <div class="text-center">
            <h4 class="text-lg font-semibold mb-2 text-[#FCC201]">Certificado por:</h4>
            <div class="flex justify-center">
                <img src="{{ asset(path: 'images/certificadoHalal.png') }}" alt="Certificado Halal" class="h-20 mx-auto md:mx-0" />
            </div>
        </div>

        <div>
            <h4 class="text-lg font-bold text-[#FCC201] mb-4">Contacto</h4>
            <p class="text-gray-300">Email: contacto@halappetit.com</p>
            <p class="text-gray-300">Teléfono: +34 600 123 456</p>
            <p class="text-gray-300">Madrid, España</p>
        </div>
    </div>

    <div class="text-center text-gray-400 mt-8 text-xs border-t border-gray-700 pt-6">
        © {{ date('Y') }} Halappetit. Todos los derechos reservados.
    </div>
</footer>


