import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            ssr: 'resources/js/ssr.tsx',
            refresh: true,
        }),
        react({
            jsxRuntime: 'automatic',
            fastRefresh: true,
        }),
    ],
    server: {
        watch: {
            usePolling: false,
            ignored: [
                '**/node_modules/**',
                '**/storage/**',
                '**/public/**',
            ]
        }
    },
    build: {
        sourcemap: false,
    },
});
