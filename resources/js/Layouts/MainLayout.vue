<script setup>
import { computed, provide } from "vue";
import { usePage } from "@inertiajs/vue3";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";
import { Modal } from "momentum-modal";

const authUser = computed(() => usePage().props.auth.user);

provide("authUser", authUser);
</script>

<template>
  <div class="min-h-screen">
    <div
      class="sticky top-0 z-40 w-full flex-none bg-white/95 backdrop-blur transition-colors duration-500 supports-[backdrop-filter]:bg-white/50 dark:border-slate-50/[0.06] dark:bg-transparent lg:z-10 lg:border-b lg:border-slate-900/10"
    >
      <Header />
    </div>
    <div class="px-8 py-6">
      <slot />
    </div>
    <div class="sticky top-[100vh] w-full">
      <div
        class="mt-8 bg-white/95 py-12 backdrop-blur transition-colors duration-500 supports-[backdrop-filter]:bg-white/50 dark:border-slate-50/[0.06] dark:bg-transparent md:border-t md:border-slate-900/10 dark:md:border-slate-100/50"
      >
        <Footer />
      </div>
    </div>
  </div>

  <Modal />
</template>
