<script setup>
defineProps({
  name: String,
});
</script>

<template>
  <div class="inline-block">
    <h2 class="text-2xl font-semibold">Hello {{ name }}</h2>
  </div>
</template>
