<script setup>
import { inject } from "vue";
import { Head } from "@inertiajs/vue3";

const user = inject("authUser", null);
</script>

<template>
  <Head title="Your profile" />

  <div class="container mx-auto">{{ user.name }}, it is your cabinet!!</div>
</template>
