import './bootstrap';

// ========= MENÚ MÓVIL =========
const menuBtn = document.getElementById("menuBtn");
const mobileMenu = document.getElementById("mobileMenu");
const overlay = document.getElementById("overlay");

function toggleMenu() {
    const isHidden = mobileMenu.classList.contains("menu-hidden");

    mobileMenu.classList.toggle("menu-hidden");
    mobileMenu.classList.toggle("menu-visible");
    overlay.classList.toggle("overlay-hidden");
    overlay.classList.toggle("overlay-visible");
    menuBtn.classList.toggle("open");

    const linksMovil = mobileMenu.querySelectorAll(".nav-link-movil");

    if (isHidden) {
        // Abrir menú
        linksMovil.forEach((link, index) => {
            link.classList.remove("opacity-0", "translate-x-4");
            link.classList.add("opacity-100", "translate-x-0");
            link.style.transitionDelay = `${index * 100}ms`;
        });
        document.documentElement.classList.add("no-scroll");
        document.body.style.overflow = "hidden";
    } else {
        // Cerrar menú
        linksMovil.forEach((link) => {
            link.classList.remove("opacity-100", "translate-x-0");
            link.classList.add("opacity-0", "translate-x-4");
            link.style.transitionDelay = "0ms";
        });
        document.documentElement.classList.remove("no-scroll");
        document.body.style.overflow = "auto";
    }
}

// Función para cerrar el menú
function closeMenu() {
    if (!mobileMenu.classList.contains("menu-hidden")) {
        toggleMenu();
    }
}

// Event listeners para el menú
if (menuBtn && mobileMenu && overlay) {
    menuBtn.addEventListener("click", toggleMenu);
    overlay.addEventListener("click", toggleMenu);
}

// Cerrar menú al hacer clic en un enlace (opcional)
document.addEventListener('DOMContentLoaded', () => {
    const mobileLinks = document.querySelectorAll('.nav-link-movil a, .nav-link-movil[href]');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Pequeño delay para permitir la navegación
            setTimeout(closeMenu, 100);
        });
    });
});

// Cerrar menú con tecla Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeMenu();
    }
});

// ========= ANIMACIONES DE ENTRADA =========
document.addEventListener("DOMContentLoaded", () => {
    // Animación del header
    const header = document.getElementById("mainHeader");
    if (header) {
        // Delay inicial para el header
        setTimeout(() => {
            header.classList.add("header-visible");
        }, 100);

        // Animación de los enlaces del menú desktop
        const links = document.querySelectorAll("#desktopNav .nav-link");
        links.forEach((link, index) => {
            setTimeout(() => {
                link.classList.remove("opacity-0", "translate-y-4");
                link.classList.add("opacity-100", "translate-y-0");
            }, 500 + index * 150);
        });
    }

    // Animación del hero section (si existe)
    const heroSection = document.getElementById("heroSection");
    if (heroSection) {
        setTimeout(() => {
            heroSection.classList.remove("opacity-0", "translate-y-10");
            heroSection.classList.add("opacity-100", "translate-y-0");
        }, 800);
    }

    // Animación de "Quienes Somos" (si existe)
    setTimeout(() => {
        const quienesSomos = document.getElementById("quienesSomos");
        if (!quienesSomos) return;

        quienesSomos.classList.remove("opacity-0", "translate-y-10");
        quienesSomos.classList.add("opacity-100", "translate-y-0");

        const titulo = quienesSomos.querySelector("h2 span");
        const subtitulo = quienesSomos.querySelector("p");

        if (titulo && subtitulo) {
            setTimeout(() => {
                titulo.classList.remove("opacity-0", "translate-y-8");
                titulo.classList.add("opacity-100", "translate-y-0");

                subtitulo.classList.remove("opacity-0", "translate-y-8");
                subtitulo.classList.add("opacity-100", "translate-y-0");
            }, 300);
        }

        const imagen = quienesSomos.querySelector(".relative.group");
        const texto = quienesSomos.querySelector(".space-y-8");

        if (imagen && texto) {
            setTimeout(() => {
                imagen.classList.remove("opacity-0", "-translate-x-10");
                imagen.classList.add("opacity-100", "translate-x-0");

                texto.classList.remove("opacity-0", "translate-x-10");
                texto.classList.add("opacity-100", "translate-x-0");
            }, 600);
        }

        const propuestaValor = document.getElementById("propuestaValor");

        if (propuestaValor) {
            setTimeout(() => {
                propuestaValor.classList.remove("opacity-0", "translate-y-10");
                propuestaValor.classList.add("opacity-100", "translate-y-0");

                const items = propuestaValor.querySelectorAll(".flex.items-start");
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.remove("opacity-0");
                        item.classList.add("opacity-100");
                    }, index * 200);
                });
            }, 900);
        }
    }, 1500);
});

// ========= UTILIDADES ADICIONALES =========

// Detectar cambios de orientación en móviles
window.addEventListener('orientationchange', () => {
    // Cerrar menú si está abierto al cambiar orientación
    if (!mobileMenu.classList.contains("menu-hidden")) {
        setTimeout(closeMenu, 100);
    }
});

// Detectar cambios de tamaño de ventana
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        // Si la ventana se hace más grande que el breakpoint md, cerrar menú móvil
        if (window.innerWidth >= 768 && !mobileMenu.classList.contains("menu-hidden")) {
            closeMenu();
        }
    }, 250);
});

// ========= COOKIES (mantener funcionalidad existente) =========
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    const expires = "expires=" + date.toUTCString();
    document.cookie =
        name + "=" + value + ";" + expires + ";path=/;SameSite=Lax";
}

function getCookie(name) {
    const cookieName = name + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");

    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length);
        }
    }
    return "";
}

function checkCookieConsent() {
    const cookieConsent = getCookie("cookieConsent");
    if (cookieConsent === "") {
        const cookieBanner = document.getElementById("cookieConsent");
        if (cookieBanner) {
            cookieBanner.classList.remove("hidden");
            cookieBanner.classList.add("cookie-slide-up");
            document.documentElement.classList.add("no-scroll");
        }
    }
}

function hideCookieBanner() {
    const cookieBanner = document.getElementById("cookieConsent");
    if (cookieBanner) {
        cookieBanner.classList.remove("cookie-slide-up");
        cookieBanner.classList.add("cookie-slide-down");

        setTimeout(() => {
            cookieBanner.style.display = "none";
            document.documentElement.classList.remove("no-scroll");
        }, 500);
    }
}

// ========= EVENTOS DE COOKIES =========
document.getElementById("acceptAllCookies")?.addEventListener("click", () => {
    setCookie("cookieConsent", "all", 365);
    setCookie("performanceCookies", "true", 365);
    setCookie("functionalityCookies", "true", 365);
    setCookie("marketingCookies", "true", 365);
    hideCookieBanner();
});

document.getElementById("rejectAllCookies")?.addEventListener("click", () => {
    setCookie("cookieConsent", "essential", 365);
    setCookie("performanceCookies", "false", 365);
    setCookie("functionalityCookies", "false", 365);
    setCookie("marketingCookies", "false", 365);
    hideCookieBanner();
});

document.getElementById("showSettings")?.addEventListener("click", function() {
    const cookieSettings = document.getElementById("cookieSettings");
    if (cookieSettings) {
        cookieSettings.classList.remove("hidden");
        this.classList.add("hidden");
    }
});

document.getElementById("saveSettings")?.addEventListener("click", () => {
    const performanceToggle = document.getElementById("performanceToggle");
    const functionalityToggle = document.getElementById("functionalityToggle");
    const marketingToggle = document.getElementById("marketingToggle");

    if (performanceToggle && functionalityToggle && marketingToggle) {
        const performance = performanceToggle.checked;
        const functionality = functionalityToggle.checked;
        const marketing = marketingToggle.checked;

        setCookie("cookieConsent", "custom", 365);
        setCookie("performanceCookies", performance.toString(), 365);
        setCookie("functionalityCookies", functionality.toString(), 365);
        setCookie("marketingCookies", marketing.toString(), 365);

        hideCookieBanner();
    }
});

// ========= INICIALIZAR TOGGLES =========
function initCookieToggles() {
    const performance = getCookie("performanceCookies") === "true";
    const functionality = getCookie("functionalityCookies") === "true";
    const marketing = getCookie("marketingCookies") === "true";

    const performanceToggle = document.getElementById("performanceToggle");
    const functionalityToggle = document.getElementById("functionalityToggle");
    const marketingToggle = document.getElementById("marketingToggle");

    if (performanceToggle) {
        performanceToggle.checked = performance;
    }
    if (functionalityToggle) {
        functionalityToggle.checked = functionality;
    }
    if (marketingToggle) {
        marketingToggle.checked = marketing;
    }
}

// ========= INICIALIZACIÓN =========
window.addEventListener("load", () => {
    checkCookieConsent();
    initCookieToggles();
});
