<script setup>
import { ref } from "vue";
import VueMultiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.css";

const options = [
  {
    language: "Javascript",
    libs: [
      { name: "Vue.js", category: "Front-end" },
      { name: "Adonis", category: "Backend" },
      { name: "Bootstrap", category: "Front-end", $isDisabled: true },
    ],
  },
  {
    language: "Ruby",
    libs: [
      { name: "Rails", category: "Backend" },
      { name: "Sinatra", category: "Backend" },
    ],
  },
  {
    language: "Other",
    libs: [
      { name: "Laravel", category: "Backend" },
      { name: "Phoenix", category: "Backend" },
    ],
  },
];

const value = ref("");
</script>

<template>
  <label class="typo__label">Groups</label>
  <VueMultiselect
    v-model="value"
    :options="options"
    :multiple="true"
    group-values="libs"
    group-label="language"
    :group-select="true"
    placeholder="Type to search"
    track-by="name"
    label="name"
    ><span slot="noResult"
      >Oops! No elements found. Consider changing the search query.</span
    ></VueMultiselect
  >
  <pre class="language-json"><code>{{ value  }}</code></pre>
</template>

<style>
.multiselect__spinner {
  @apply bg-white dark:bg-sky-900;
}

.multiselect__spinner::before,
.multiselect__spinner::after {
  border-color: #41b883 transparent transparent;
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

.multiselect__input:hover,
.multiselect__single:hover {
  border-color: #cfcfcf;
}

.multiselect__input:focus,
.multiselect__single:focus {
  border-color: #a8a8a8;
}

.multiselect__tags {
  @apply bg-white dark:bg-sky-900;
}

.multiselect__tag {
  @apply bg-emerald-500 text-white;
}

.multiselect__tag-icon::after {
  @apply text-gray-200;
}

/* // Remove these lines to avoid green closing button
  //.multiselect__tag-icon:focus,
  //.multiselect__tag-icon:hover {
  //  background: #369a6e;
  //} */

.multiselect__tag-icon:focus::after,
.multiselect__tag-icon:hover::after {
  @apply text-white;
}

.multiselect__current {
  border: 1px solid #e8e8e8;
}

.multiselect__select::before {
  color: #999;
  border-color: #999 transparent transparent transparent;
}

.multiselect__placeholder {
  color: #adadad;
}

.multiselect__content-wrapper {
  @apply bg-white dark:bg-sky-900;
  border: 1px solid #e8e8e8;
  border-top: none;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.multiselect--above .multiselect__content-wrapper {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom: none;
  border-top: 1px solid #e8e8e8;
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

.multiselect__option--selected::after {
  content: attr(data-selected);
  color: silver;
  background: inherit;
}

.multiselect__option--selected.multiselect__option--highlight {
  background: #ff6a6a;
  color: #fff;
}

.multiselect__option--selected.multiselect__option--highlight::after {
  background: #ff6a6a;
  content: attr(data-deselect);
  color: #fff;
}

.multiselect--disabled .multiselect__current,
.multiselect--disabled .multiselect__select {
  @apply bg-red-300;
  color: #a6a6a6;
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

.multiselect__option--disabled.multiselect__option--highlight {
  background: #dedede;
}

.multiselect__option--group-selected.multiselect__option--highlight {
  background: #ff6a6a;
  color: #fff;
}

.multiselect__option--group-selected.multiselect__option--highlight::after {
  background: #ff6a6a;
  content: attr(data-deselect);
  color: #fff;
}
</style>
