<script setup>
import { Head } from "@inertiajs/vue3";
import LikeGameNav from "@/Navigations/LikeGameNav.vue";
</script>

<script>
import HeroLayout from "@/Layouts/HeroLayout.vue";

export default {
  layout: HeroLayout,
};
</script>

<template>
  <Head title="Home" />
  <main class="container mx-auto">
    <div class="relative">
      <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-x-8">
        <div class="pt-4 lg:col-span-8 lg:px-0 lg:pt-12 xl:col-span-9">
          <div class="relative mx-auto lg:mx-0">
            <div class="border bg-white">
              <img
                src="storage/static/grand-station.webp"
                alt="Grand Station"
                class="brightness-150 saturate-50 dark:brightness-100 dark:saturate-100"
              />
            </div>
            <div
              class="absolute bottom-2 px-4 text-sky-300 dark:text-sky-400 lg:px-8"
            >
              <h1
                class="mt-24 text-4xl font-bold tracking-tight sm:mt-10 sm:text-6xl"
              >
                Data to enrich your online business
              </h1>
              <p class="mt-6 text-lg leading-8">
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui
                lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat
                fugiat aliqua.
              </p>
            </div>
          </div>
        </div>
        <div
          class="mt-8 lg:col-span-4 lg:mr-4 xl:absolute xl:inset-0 xl:left-2/3 xl:mt-24 xl:mr-0"
        >
          <LikeGameNav />
        </div>
      </div>
    </div>
  </main>
</template>
