<script setup>
import { computed } from "vue";
import { cva } from "class-variance-authority";

const props = defineProps({
  iconLeft: Object,
  iconRight: Object,
  loading: Boolean,
  disabled: Boolean,
  as: {
    type: [String, Object],
    default: "button",
  },
  intent: {
    type: String,
    validator: (val) =>
      ["success", "primary", "secondary", "warning", "danger"].includes(val),
    default: "primary",
  },
});

const buttonClass = computed(() => {
  return cva(
    "inline-flex items-center px-3 py-0.5 min-h-[32px] justify-center text-sm font-semibold rounded-md text-white",
    {
      variants: {
        intent: {
          success:
            "bg-emerald-600 hover:bg-emerald-700 dark:hover:bg-emerald-500",
          primary: "bg-sky-600 hover:bg-sky-700 dark:hover:bg-sky-500",
          secondary: "bg-gray-600 hover:bg-gray-700 dark:hover:bg-gray-500",
          danger: "bg-red-600 hover:bg-red-700 dark:hover:bg-red-500",
          warning: "bg-yellow-600 hover:bg-yellow-700 dark:hover:bg-yellow-500",
        },
        disabled: {
          true: "cursor-not-allowed !bg-neutral-500 text-neutral-300",
        },
      },
    }
  )({
    intent: props.intent,
    disabled: props.disabled,
  });
});
</script>

<template>
  <component :is="props.as" :disabled="props.disabled" :class="buttonClass">
    <svg
      v-if="props.loading"
      class="absolute h-5 w-5 animate-spin"
      fill="none"
      viewBox="0 0 24 24"
    >
      <circle
        class="opacity-25"
        cx="12"
        cy="12"
        r="10"
        stroke="currentColor"
        stroke-width="4"
      ></circle>
      <path
        class="opacity-75"
        fill="currentColor"
        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
      ></path>
    </svg>
    <component
      :is="props.iconLeft"
      :class="['mr-2 h-5 w-5', props.loading && 'invisible']"
    />

    <span :class="[props.loading && 'invisible']">
      <slot />
    </span>

    <component
      :is="props.iconRight"
      :class="['ml-2 h-5 w-5', props.loading && 'invisible']"
    />
  </component>
</template>
