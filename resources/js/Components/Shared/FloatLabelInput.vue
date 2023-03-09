<script setup>
defineProps({
  id: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "text",
  },
  label: {
    type: String,
    required: true,
  },
  modelValue: {
    type: [String, Number],
    default: "",
  },
  error: {
    type: [String, Boolean],
  },
  hint: {
    type: [String, Boolean],
  },
});
</script>

<template>
  <div>
    <div
      class="relative rounded-md border bg-white px-3 py-2 shadow-sm focus-within:ring-2 dark:bg-sky-900"
      :class="{
        'border-red-300 focus-within:border-red-600 focus-within:ring-red-600':
          error,
        'border-gray-400 focus-within:ring-indigo-600 dark:focus-within:ring-sky-300':
          !error,
      }"
    >
      <input
        :id="id"
        :type="type"
        class="peer block w-full bg-transparent outline-none text-fill-gray-900 dark:text-fill-sky-400"
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
    </div>

    <div
      v-if="error"
      id="error"
      class="mt-1 ml-3 text-xs text-red-600 dark:text-red-400"
    >
      {{ error }}
    </div>
    <div
      v-else-if="hint"
      id="hint"
      class="mt-1 ml-3 text-xs text-gray-600 dark:text-sky-300"
    >
      {{ hint }}
    </div>
  </div>
</template>
