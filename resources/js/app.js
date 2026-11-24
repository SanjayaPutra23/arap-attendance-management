import * as bootstrap from 'bootstrap';
import L from 'leaflet';

window.bootstrap = bootstrap;
window.L = L;

// Register Service Worker for PWA
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').then(
            (registration) => {
                console.log('ARAP ServiceWorker registered successfully:', registration.scope);
            },
            (err) => {
                console.warn('ARAP ServiceWorker registration failed:', err);
            }
        );
    });
}

// Sidebar scroll persistence (Anti-Jump)
(function () {
    function initSidebarScroll() {
        const sidebar = document.getElementById('sidebarMenuScrollable');
        if (!sidebar) return;

        const savedScroll = sessionStorage.getItem('arap_sidebar_scroll');
        if (savedScroll !== null) {
            sidebar.scrollTop = parseInt(savedScroll, 10);
        }

        sidebar.addEventListener('scroll', function () {
            sessionStorage.setItem('arap_sidebar_scroll', sidebar.scrollTop);
        }, { passive: true });

        sidebar.querySelectorAll('a, button').forEach(function (el) {
            el.addEventListener('click', function () {
                sessionStorage.setItem('arap_sidebar_scroll', sidebar.scrollTop);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebarScroll);
    } else {
        initSidebarScroll();
    }
})();
