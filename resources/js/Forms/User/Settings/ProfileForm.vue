<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import Button from "@/Components/Shared/Button.vue";
import { showFlash } from "@/Services/Flash";

function flash() {
  const flash = usePage().props.flash;

  showFlash({
    message: flash.message,
    type: flash.type,
    position: flash.position,
    timeout: flash.timeout,
  });
}

const props = defineProps({
  user: Object,
});

const form = useForm("ProfileForm", {
  name: props.user.name,
});

function submit() {
  form.put(route("settings.profile.update"), {
    preserveScroll: true,
    onSuccess: () => flash(),
  });
}
</script>

<template>
  <form @submit.prevent="submit" class="w-full space-y-10">
    <FloatLabelInput
      v-model="form.name"
      label="Name"
      type="name"
      id="name"
      hint="Your name may appear around NFSU Cup where you contribute. You can change it at any time."
      :error="form.errors.name"
      required
    />

    <Button
      type="submit"
      intent="success"
      :disabled="form.processing"
      :loading="form.processing"
    >
      Update profile
    </Button>
  </form>
</template>
