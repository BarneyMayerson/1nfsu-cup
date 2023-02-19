<script setup>
defineProps({
  name: String,
});
</script>

<template>
  <div class="px-4 py-2">
    <h2 class="text-2xl font-semibold">Hello {{ name }}</h2>
  </div>
</template>
