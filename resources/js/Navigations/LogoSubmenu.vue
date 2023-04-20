<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import AppLogo from "@/Components/AppLogo.vue";
</script>

<template>
  <div class="md:flex md:items-center md:gap-12">
    <Link class="block" :href="route('home')">
      <span class="sr-only">Home</span>
      <AppLogo class="h-10 w-full" />
    </Link>
  </div>
</template>
