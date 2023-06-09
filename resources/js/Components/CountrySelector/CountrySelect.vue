<script setup>
import { ref } from "vue";
import VueMultiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.css";
import { countryListAlpha2Array } from "./countries-list";

const props = defineProps({
  flagsPath: {
    type: String,
    default: "/storage/static/flags/",
  },
  flagsExt: {
    type: String,
    default: ".svg",
  },
  initValue: {
    type: String,
    default: "",
  },
});

const countryFlagSrc = (code) =>
  props.flagsPath + code.toLowerCase() + props.flagsExt;

const country = ref(
  countryListAlpha2Array.find((country) => country.code === props.initValue)
);
</script>

<template>
  <VueMultiselect
    v-model="country"
    :options="countryListAlpha2Array"
    track-by="code"
    label="name"
    placeholder="Search country"
    :show-labels="false"
    @select="$emit('countrySelected', country.code)"
  >
    <template v-slot:singleLabel="props">
      <div class="flex items-start">
        <img class="w-6" :src="countryFlagSrc(props.option.code)" />
        <span class="ml-2">{{ props.option.name }}</span>
      </div>
    </template>
    <template v-slot:option="props">
      <div class="flex items-center">
        <img class="inline-flex w-5" :src="countryFlagSrc(props.option.code)" />
        <span class="ml-2">{{ props.option.name }}</span>
      </div>
    </template>
  </VueMultiselect>
</template>

<style>
.multiselect__spinner {
  @apply bg-white dark:bg-sky-900;
}

.multiselect {
  @apply text-gray-700 dark:text-gray-300;
}

.multiselect--disabled {
  @apply bg-red-300;
}

.multiselect__input,
.multiselect__single {
  @apply bg-white dark:bg-sky-900;
}

.multiselect__input::placeholder {
  @apply text-gray-700 dark:text-gray-300;
}

.multiselect__tags {
  @apply border-gray-400 bg-white dark:bg-sky-900;
}

.multiselect__tag {
  @apply bg-emerald-500 text-white;
}

.multiselect__tag-icon::after {
  @apply text-gray-200;
}

.multiselect__tag-icon:focus::after,
.multiselect__tag-icon:hover::after {
  @apply text-white;
}

.multiselect__placeholder {
  @apply text-gray-600 dark:text-gray-300;
}

.multiselect__content-wrapper {
  @apply bg-white dark:bg-sky-900;
}

.multiselect__option--highlight {
  @apply bg-emerald-500 text-white;
}

.multiselect__option--highlight::after {
  content: attr(data-select);
  @apply bg-emerald-500 text-white;
}

.multiselect__option--selected {
  @apply bg-gray-100 text-gray-700 dark:bg-sky-950 dark:text-gray-300;
}

.multiselect--disabled .multiselect__current,
.multiselect--disabled .multiselect__select {
  @apply bg-red-300 text-gray-400 dark:text-gray-300;
}

.multiselect__option--disabled {
  @apply !bg-gray-300 !text-gray-400 dark:!bg-sky-800;
}

.multiselect__option--group {
  @apply bg-gray-300 text-gray-700 dark:bg-sky-700 dark:text-gray-300;
}

.multiselect__option--group.multiselect__option--highlight {
  @apply bg-gray-600 text-white dark:bg-sky-950;
}

.multiselect__option--group.multiselect__option--highlight::after {
  @apply bg-gray-600 dark:bg-sky-950;
}

.multiselect__content-wrapper {
  @apply border border-t-0 border-gray-400;
}
</style>
