<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import ResetPasswordForm from "@/Forms/Auth/PasswordResetForm.vue";

defineProps({
  email: String,
  token: String,
});
</script>

<template>
  <Head title="Reset Password" />
  <Modal>
    <template #title>Set a New Password</template>
    <p class="mt-4">Check out email address and choose new password.</p>
    <div class="mt-16">
      <ResetPasswordForm :email="email" :token="token" />
    </div>
  </Modal>
</template>
