<script setup>
import { flagSrc } from "../countries/flag";
import { countryListAlpha2Array } from "../countries/countries-list";

const props = defineProps(["fieldValue"]);

const country = props.fieldValue
  ? countryListAlpha2Array.find((country) => country.code === props.fieldValue)
      .name
  : "Not defined";
const flag = props.fieldValue ? flagSrc(props.fieldValue) : null;
</script>

<template>
  <span class="flex items-center space-x-2">
    <img v-if="flag" class="w-6" :src="flag" />
    <span>{{ country }}</span>
  </span>
</template>
