import { configDefaults, defineConfig } from "vitest/config";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: true,
    }),
    vue(),
  ],
  test: {
    environment: "jsdom",
    exclude: [...configDefaults.exclude, "vendor/laravel/nova"],
  },
});
