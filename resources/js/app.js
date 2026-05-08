import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

function startAlpine() {
    if (window.__aapscmAlpineStarted) {
        return;
    }

    window.__aapscmAlpineStarted = true;
    Alpine.start();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startAlpine, { once: true });
} else {
    startAlpine();
}

// Decodes Cloudflare email-protection spans emitted by x-cms.cf-email.
// Runs once at load and again after any DOM addition (for Livewire/Alpine swaps).
function decodeCfEmails(root = document) {
    root.querySelectorAll('a.__cf_email__[data-cfemail]').forEach((el) => {
        const hex = el.getAttribute('data-cfemail');
        if (!hex || hex.length < 4) return;
        const k = parseInt(hex.substr(0, 2), 16);
        let email = '';
        for (let i = 2; i < hex.length; i += 2) {
            email += String.fromCharCode(parseInt(hex.substr(i, 2), 16) ^ k);
        }
        el.setAttribute('href', 'mailto:' + email);
        el.textContent = email;
        el.classList.remove('__cf_email__');
    });
}
document.addEventListener('DOMContentLoaded', () => decodeCfEmails());

// Elementor-style fadeInUp / fadeInDown reveal on scroll.
// Elements with data-reveal="fadeInUp|fadeInDown" start invisible, then animate
// once they enter the viewport.
function initReveals() {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 },
    );
    els.forEach((el) => io.observe(el));
}
document.addEventListener('DOMContentLoaded', initReveals);
