<script setup>
import { Head } from "@inertiajs/vue3";
import Modal from "@/Components/Shared/Modal.vue";
import RegisterForm from "@/Forms/Auth/RegisterForm.vue";
import RegularLink from "@/Components/Shared/RegularLink.vue";
</script>

<script>
import HeroLayout from "@/Layouts/HeroLayout.vue";

export default {
  layout: HeroLayout,
};
</script>

<template>
  <Head title="Register" />
  <Modal>
    <template #title>Register New Account</template>
    <div class="mt-8">
      <RegisterForm />
    </div>
    <div class="mt-8 flex justify-center">
      <RegularLink href="/login" as="button">
        Already Have an Account?
      </RegularLink>
    </div>
  </Modal>
  <!-- 
  <-->
</template>
