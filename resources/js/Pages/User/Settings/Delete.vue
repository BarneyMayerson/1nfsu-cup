<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import DeleteForm from "@/Forms/User/Settings/DeleteForm.vue";
import ExclamationIcon from "@/Components/Shared/Icons/ExclamationIcon.vue";
</script>

<template>
  <Head title="Delete your account" />
  <Modal>
    <template #title>Are you sure you want to do this?</template>
    <div class="mt-8">
      <div
        class="-mx-16 flex items-center justify-center space-x-2 bg-red-400/50 px-2 py-6 text-red-600 dark:text-red-200"
      >
        <div class="h-8 w-8">
          <ExclamationIcon />
        </div>
        <p class="text-sm">This is extremely important.</p>
      </div>
    </div>
    <div class="mt-4">
      <ul class="list-disc space-y-2">
        <li>
          We will immediately delete your account. All of your tourney result,
          posts and comments will remind on the site signed with your username.
        </li>
        <li>
          Your username will be not available to registration on this site.
        </li>
      </ul>
    </div>
    <div class="-mx-16 mt-4 h-2 bg-red-400/50"></div>
    <div class="-mx-3 mt-10">
      <DeleteForm />
    </div>
  </Modal>
</template>
