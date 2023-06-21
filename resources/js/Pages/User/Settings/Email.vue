<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import EmailForm from "@/Forms/User/Settings/EmailForm.vue";
import ExclamationIcon from "@/Components/Shared/Icons/ExclamationIcon.vue";
</script>

<template>
  <Head title="Change email" />
  <Modal>
    <template #title>Really change your email?</template>
    <div class="mt-8">
      <div
        class="-mx-16 flex items-center justify-center space-x-2 bg-red-400/50 px-2 py-6 text-red-600 dark:text-red-200"
      >
        <div class="h-8 w-8">
          <ExclamationIcon />
        </div>
        <p class="text-sm">
          Unexpected bad things will happen if you don’t read this!
        </p>
      </div>
    </div>
    <div class="mt-4">
      <ul class="list-disc space-y-2">
        <li>We will not send an email to verify your address.</li>
        <li>we will not be able to verify that your address is correct.</li>
        <li>
          So if you enter the wrong address, you will not be able to restore
          access to your account and will not be able to receive ordered
          notifications.
        </li>
      </ul>
    </div>
    <div class="-mx-16 mt-4 h-2 bg-red-400/50"></div>
    <div class="-mx-3 mt-10">
      <EmailForm />
    </div>
  </Modal>
</template>
