import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/visual-editor.js'],
            refresh: true,
        }),
    ],

    server: {
        // Allow cross-origin requests so ngrok (and any tunnel) can load assets.
        cors: true,
        // Bind to all interfaces so the Vite dev server is reachable outside localhost.
        host: '0.0.0.0',
        hmr: {
            // When VITE_DEV_SERVER_URL is set (e.g. your ngrok URL), HMR and asset
            // URLs will point there instead of localhost:5173.
            // Set in .env: VITE_DEV_SERVER_URL=https://xxxx.ngrok-free.app
            host: process.env.VITE_DEV_SERVER_URL
                ? new URL(process.env.VITE_DEV_SERVER_URL).hostname
                : 'localhost',
            ...(process.env.VITE_DEV_SERVER_URL
                ? { protocol: 'wss', clientPort: 443 }
                : {}),
        },
    },
});
