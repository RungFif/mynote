import './bootstrap';

import Alpine from 'alpinejs';
import { animate as anime } from '../../node_modules/animejs/lib/anime.esm.js';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Animate page fade-in
    anime({
        targets: 'body',
        opacity: [0, 1],
        duration: 1200,
        easing: 'easeOutExpo',
    });

    // Animate all cards/containers
    anime({
        targets: '.shadow, .rounded, .bg-white',
        translateY: [80, 0],
        opacity: [0, 1],
        delay: anime.stagger(120, {start: 400}),
        duration: 1200,
        easing: 'easeOutElastic(1, .8)'
    });

    // Animate buttons
    anime({
        targets: 'a, button',
        scale: [0.7, 1],
        opacity: [0, 1],
        delay: anime.stagger(80, {start: 800}),
        duration: 900,
        easing: 'easeOutBack'
    });

    // Animate note list items with color and rotation
    anime({
        targets: '.p-4',
        rotate: [8, 0],
        backgroundColor: [
            '#f0f9ff', '#f3e8ff', '#fef9c3', '#f1f5f9', '#fff7ed', '#fef2f2', '#f0fdf4'
        ],
        delay: anime.stagger(100, {start: 1000}),
        duration: 1200,
        easing: 'easeOutExpo',
        direction: 'alternate',
        loop: false
    });
});
