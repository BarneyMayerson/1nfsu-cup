<script setup>
import { useForm } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import PasswordInput from "@/Components/Shared/PasswordInput.vue";
import PrimaryLikeGameButton from "@/Components/Shared/PrimaryLikeGameButton.vue";
import SecondaryLikeGameButton from "@/Components/Shared/SecondaryLikeGameButton.vue";
import { useModal } from "momentum-modal";

const { close } = useModal();

const props = defineProps({
  email: String,
  token: String,
});

const form = useForm("ForgotPasswordForm", {
  token: props.token,
  email: props.email,
  password: "",
  password_confirmation: "",
});

function submit() {
  form.post("/reset-password");
}
</script>

<template>
  <form
    @submit.prevent="submit"
    @keyup.delete="close"
    class="w-full space-y-10"
  >
    <FloatLabelInput
      v-model="form.email"
      label="Email"
      type="email"
      id="email"
      :error="form.errors.email"
      required
    />
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
    <div class="flex items-center justify-end space-x-2">
      <SecondaryLikeGameButton
        id="cancel-button"
        :class="{ 'opacity-50': form.processing }"
        :disabled="form.processing"
        @click="close"
      >
        Cancel
      </SecondaryLikeGameButton>
      <PrimaryLikeGameButton
        :class="{ 'opacity-50': form.processing }"
        :disabled="form.processing"
      >
        Reset
      </PrimaryLikeGameButton>
    </div>
  </form>
</template>
