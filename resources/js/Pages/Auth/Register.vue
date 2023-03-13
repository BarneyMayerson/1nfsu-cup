<script setup>
import { Head, Link } from "@inertiajs/vue3";
import RegisterForm from "@/Forms/Auth/RegisterForm.vue";
</script>

<template>
  <Head title="Register" />
  <div>
    <RegisterForm />
  </div>
  <div class="flex justify-center">
    <Link href="/login" as="button">Already Have an Account?</Link>
  </div>
</template>
