<script setup>
import { useForm } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import PrimaryLikeGameButton from "@/Components/Shared/PrimaryLikeGameButton.vue";
import SecondaryLikeGameButton from "@/Components/Shared/SecondaryLikeGameButton.vue";
import { useModal } from "momentum-modal";
import { route } from "momentum-trail";
import { flash } from "@/Services/Flash";

const { close } = useModal();

function flashAndClose() {
  flash();
  close();
}

const form = useForm("ForgotPasswordForm", {
  email: "",
});

function submit() {
  form.post(route("password.email"), {
    onSuccess: () => flashAndClose(),
  });
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
    <div class="flex items-center justify-end space-x-2">
      <SecondaryLikeGameButton
        id="cancel-button"
        @click="close"
        :class="{ 'cursor-not-allowed opacity-50': form.processing }"
        :disabled="form.processing"
      >
        Cancel
      </SecondaryLikeGameButton>
      <PrimaryLikeGameButton
        :class="{ 'cursor-not-allowed opacity-50': form.processing }"
        :disabled="form.processing"
      >
        Reset
      </PrimaryLikeGameButton>
    </div>
  </form>
</template>
