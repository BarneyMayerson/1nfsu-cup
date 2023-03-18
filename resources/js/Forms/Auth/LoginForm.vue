<script setup>
import { useForm } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import PasswordInput from "@/Components/Shared/PasswordInput.vue";
import PrimaryLikeGameButton from "@/Components/Shared/PrimaryLikeGameButton.vue";
import SecondaryLikeGameButton from "@/Components/Shared/SecondaryLikeGameButton.vue";
import { useModal } from "momentum-modal";

const { close } = useModal();

const form = useForm("LoginForm", {
  email: "",
  password: "",
});

function submit() {
  form.post("/login");
}
</script>

<template>
  <form @submit.prevent="submit" class="w-full space-y-10">
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
    <div class="flex items-center justify-end space-x-2">
      <SecondaryLikeGameButton
        id="cancel-button"
        @click="close"
        :class="{ 'opacity-50': form.processing }"
        :disabled="form.processing"
      >
        Cancel
      </SecondaryLikeGameButton>
      <PrimaryLikeGameButton
        :class="{ 'opacity-50': form.processing }"
        :disabled="form.processing"
      >
        Login
      </PrimaryLikeGameButton>
    </div>
  </form>
</template>
