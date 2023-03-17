<script setup>
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";
import { useModal } from "momentum-modal";

const { show, close, redirect } = useModal();
</script>

<template>
  <TransitionRoot appear as="template" :show="show">
    <Dialog
      as="div"
      class="relative z-10 text-gray-900 dark:text-sky-400"
      @close="close"
    >
      <TransitionChild
        @after-leave="redirect"
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div
          class="fixed inset-0 bg-black/20 backdrop-blur-sm transition-opacity"
        />
      </TransitionChild>

      <div class="du fixed inset-0 overflow-y-auto">
        <div
          class="flex min-h-full items-center justify-center p-4 text-center"
        >
          <TransitionChild
            as="template"
            enter="duration-300 ease-linear"
            enter-from="opacity-0 -translate-y-full"
            enter-to="opacity-100 translate-0"
            leave="duration-200 ease-linear"
            leave-from="opacity-100 translate-0"
            leave-to="opacity-0 -translate-y-full"
          >
            <DialogPanel
              class="w-full max-w-lg transform overflow-hidden rounded-2xl bg-gray-100 p-6 text-left align-middle shadow-xl shadow-black transition-all dark:bg-sky-900 md:px-16 md:py-16"
            >
              <DialogTitle
                as="h3"
                class="text-center text-2xl font-medium leading-6 text-gray-900 dark:text-sky-400"
              >
                <slot name="title" />
              </DialogTitle>
              <slot />
              <div class="absolute top-0 right-0 pt-4 pr-4">
                <button
                  type="button"
                  class="rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                  @click="close"
                >
                  <span class="sr-only">Close</span>
                  <svg
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
