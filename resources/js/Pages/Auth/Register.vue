<script setup>
import { Head } from "@inertiajs/vue3";
import RegisterForm from "@/Forms/Auth/RegisterForm.vue";
import RegularLink from "@/Components/Shared/RegularLink.vue";
</script>

<template>
  <Head title="Register" />
  <div>
    <RegisterForm />
  </div>
  <div class="flex justify-center">
    <RegularLink href="/login" as="button">
      Already Have an Account?
    </RegularLink>
  </div>
</template>
