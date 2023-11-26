<script setup>
import { computed, defineProps } from "vue";
import FlagCountryField from "./FlagCountryField.vue";

const props = defineProps(["resourceName", "field"]);
const fieldValue = computed(() => props.field.displayedAs || props.field.value);
</script>

<template>
  <FlagCountryField :fieldValue="fieldValue" />
</template>
