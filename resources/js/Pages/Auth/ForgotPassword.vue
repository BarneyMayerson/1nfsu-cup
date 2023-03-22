<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import ForgotPasswordForm from "@/Forms/Auth/ForgotPasswordForm.vue";
import RegularLink from "@/Components/Shared/RegularLink.vue";

defineProps({
  status: String,
});
</script>

<script>
import HeroLayout from "@/Layouts/HeroLayout.vue";

export default {
  layout: HeroLayout,
};
</script>
<template>
  <Head title="Forgot Password" />
  <Modal>
    <template #title>Forgot Your Password?</template>
    <div
      v-if="status"
      id="status"
      class="mt-8 text-sm font-medium text-green-600 dark:text-green-400"
    >
      <p>{{ status }}</p>
    </div>
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
