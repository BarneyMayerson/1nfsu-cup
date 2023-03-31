<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import LoginForm from "@/Forms/Auth/LoginForm.vue";
import RegularLink from "@/Components/Shared/RegularLink.vue";
import { route } from "momentum-trail";

defineProps({
  status: String,
});
</script>

<template>
  <Head title="login" />
  <div class="flex justify-center py-6">
    <Modal>
      <template #title>Welcome Back!</template>
      <div class="mt-16">
        <LoginForm />
      </div>
      <div class="mt-10 flex flex-col justify-center space-y-8">
        <RegularLink :href="route('password.request')" class="self-center">
          Forgot Your Password?
        </RegularLink>
        <RegularLink
          :href="route('register')"
          class="self-center font-semibold"
        >
          Register an Account
        </RegularLink>
      </div>
    </Modal>
  </div>
</template>
