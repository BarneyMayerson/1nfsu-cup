<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import ForgotPasswordForm from "@/Forms/Auth/ForgotPasswordForm.vue";
import RegularLink from "@/Components/Shared/RegularLink.vue";

defineProps({
  status: String,
});
</script>

<template>
  <Head title="Forgot Password" />
  <Modal>
    <template #title>Forgot Your Password?</template>
    <p class="mt-10 text-center">
      No problem. Just let us know your email address and we will email you a
      password reset link that will allow you to choose a new one.
    </p>
    <div class="mt-16">
      <ForgotPasswordForm />
    </div>
    <div class="mt-10 flex justify-center">
      <RegularLink href="/register" class="self-center font-semibold">
        or Register an Account
      </RegularLink>
    </div>
  </Modal>
</template>
