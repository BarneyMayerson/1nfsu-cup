<script setup>
import { ref, computed } from "vue";

defineProps({
  id: {
    type: String,
    required: true,
  },
  label: {
    type: String,
    required: true,
  },
  modelValue: {
    type: String,
  },
  error: {
    type: [String, Boolean],
  },
});

const type = ref("password");

const isShowPassword = computed(() => type.value === "text");

const toggleType = () =>
  (type.value = isShowPassword.value ? "password" : "text");
</script>

<template>
  <div>
    <div
      class="relative rounded-md border bg-white px-3 py-2 shadow-sm focus-within:ring-2 dark:bg-sky-900"
      :class="
        error
          ? 'border-red-300 focus-within:border-red-600 focus-within:ring-red-600'
          : 'border-gray-400 focus-within:ring-indigo-600 dark:focus-within:ring-sky-300'
      "
    >
      <input
        :id="id"
        :type="type"
        class="peer block w-full bg-transparent pr-8 outline-none autofill:text-fill-gray-900 autofill:dark:text-fill-sky-400"
        v-bind="{ ...$attrs, class: null }"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        placeholder=" "
      />
      <label
        :for="id"
        class="absolute left-3 -top-6 text-sm transition-all peer-placeholder-shown:top-2 peer-placeholder-shown:text-base peer-focus:-top-6 peer-focus:text-sm"
        :class="
          error
            ? 'text-red-500 dark:text-red-400'
            : 'text-gray-600 peer-focus:text-indigo-600 dark:text-gray-300 dark:peer-focus:text-sky-300'
        "
      >
        {{ label }}
      </label>

      <button
        @click="toggleType"
        type="button"
        class="absolute right-1 top-0 h-full px-2 focus:scale-110"
      >
        <svg
          v-if="!isShowPassword"
          viewBox="0 0 20 20"
          fill="currentColor"
          class="h-5 w-5"
        >
          <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
          <path
            fill-rule="evenodd"
            d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
            clip-rule="evenodd"
          />
        </svg>
        <svg
          v-if="isShowPassword"
          viewBox="0 0 20 20"
          fill="currentColor"
          class="h-5 w-5"
        >
          <path
            fill-rule="evenodd"
            d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z"
            clip-rule="evenodd"
          />
          <path
            d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z"
          />
        </svg>
      </button>
    </div>
    <div
      v-if="error"
      id="error"
      class="mt-1 ml-3 text-xs text-red-600 dark:text-red-400"
    >
      {{ error }}
    </div>
  </div>
</template>
