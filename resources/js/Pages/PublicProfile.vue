<script setup>
import { Head } from "@inertiajs/vue3";

defineProps(["user"]);
</script>

<template>
  <Head title="Public Profile" />
  <div class="container mx-auto">
    <main>
      <div v-if="user">
        <p>Public Profile Goes Here ...</p>
        <p>{{ user.name }}</p>
        <p>{{ user.country }}</p>
        <p>{{ user.avatar }}</p>
      </div>
      <div v-else>
        <div class="flex justify-center">
          <div class="my-4 flex items-center sm:my-16 sm:justify-start">
            <div class="border-r px-4 text-3xl tracking-wider">404</div>

            <div class="ml-4 text-3xl uppercase tracking-wider">
              No such profile found
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
