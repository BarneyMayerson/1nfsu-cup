<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import PasswordForm from "@/Forms/User/Settings/PasswordForm.vue";
</script>

<template>
  <Head title="Change password" />
  <Modal>
    <template #title>Really change your password?</template>
    <div class="-mx-3 mt-10">
      <PasswordForm />
    </div>
  </Modal>
</template>
