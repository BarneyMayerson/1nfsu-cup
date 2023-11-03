<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import { useModal } from "momentum-modal";
import PasswordInput from "@/Components/Shared/PasswordInput.vue";
import Button from "@/Components/Shared/Button.vue";
import { flash } from "@/Services/Flash";

const { close } = useModal();

const form = useForm("PasswordForm", {
  password: "",
  password_confirmation: "",
});

function submit() {
  form.post(route("settings.account.password.update"), {
    onSuccess: () => flash(),
  });
}
</script>

<template>
  <form @submit.prevent="submit" class="w-full space-y-10">
    <PasswordInput
      v-model="form.password"
      label="Password"
      id="password"
      :error="form.errors.password"
      required
    />
    <PasswordInput
      v-model="form.password_confirmation"
      label="Repeat Password"
      id="password-confirmation"
      required
    />

    <div class="mt-1 flex items-center justify-end space-x-3">
      <Button
        intent="secondary"
        @click="close"
        type="button"
        :disabled="form.processing"
      >
        Cancel
      </Button>
      <Button
        type="submit"
        :disabled="form.processing"
        :loading="form.processing"
      >
        Change my password
      </Button>
    </div>
  </form>
</template>
