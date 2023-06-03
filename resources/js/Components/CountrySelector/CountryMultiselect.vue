<script setup>
import { ref } from "vue";
import VueMultiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.css";
import { countryListAlpha2Array } from "./countries-list";

const selectedCountry = ref("");
</script>

<template>
  <VueMultiselect
    v-model="selectedCountry"
    :options="countryListAlpha2Array"
    track-by="code"
    label="name"
    placeholder="Search country"
  />

  <p class="mt-2 font-bold">{{ selectedCountry.code }}</p>
</template>
