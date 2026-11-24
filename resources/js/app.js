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
