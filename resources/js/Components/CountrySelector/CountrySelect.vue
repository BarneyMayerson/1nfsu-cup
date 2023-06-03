<script setup>
import { ref } from "vue";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import { countryListAlpha2Array } from "./countries-list";

const selectedCountry = ref("");
</script>

<template>
  <v-select
    v-model="selectedCountry"
    label="name"
    :options="countryListAlpha2Array"
    :reduce="(country) => country.code"
    class="w-full rounded-md border bg-white text-fill-gray-900 dark:bg-sky-900 dark:text-fill-sky-400"
    placeholder="Search country"
  />

  <p class="mt-2 font-bold">{{ selectedCountry }}</p>
</template>
