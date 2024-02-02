import vituum from 'vituum';
import tailwindcss from '@vituum/vite-plugin-tailwindcss';
import postcss from '@vituum/vite-plugin-postcss';
import posthtml from '@vituum/vite-plugin-posthtml';
import handlebarsPlugin from '@vituum/vite-plugin-handlebars';
import handlebars from 'handlebars';
import layouts from 'handlebars-layouts';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';

export default {
  plugins: [
    vituum(),
    handlebarsPlugin({
      helpers: {
        ...layouts(handlebars),
      },
      root: './src',
    }),
    ViteImageOptimizer({
      /* pass your config */
    }),
    tailwindcss(),
    postcss(),
    posthtml(),
  ],
  build: {
    target: 'esnext',
    rollupOptions: {
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`,
      },
    },
  },
};
