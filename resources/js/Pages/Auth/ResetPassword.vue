<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({
  email: String,
  token: String,
});
</script>

<template>
  <Head title="Reset Password" />
  <div class="flex justify-center py-6">
    <p>Reset password page goes here...</p>
    <div class="mt-6 block">email = {{ email }}</div>
    <div class="mt-6 block">token = {{ token }}</div>
  </div>
</template>
