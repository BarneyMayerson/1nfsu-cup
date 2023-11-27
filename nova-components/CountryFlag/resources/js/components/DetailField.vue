<script setup>
import FlagCountryField from "./FlagCountryField.vue";

defineProps(["index", "resource", "resourceName", "resourceId", "field"]);
</script>

<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <FlagCountryField :field-value="field.value" />
    </template>
  </PanelItem>
</template>
