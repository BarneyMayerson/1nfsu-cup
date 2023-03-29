<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import PrimaryLikeGameButton from "@/Components/Shared/PrimaryLikeGameButton.vue";
import SecondaryLikeGameButton from "@/Components/Shared/SecondaryLikeGameButton.vue";
import { useModal } from "momentum-modal";
import { showFlash } from "@/Services/Flash";

const { close } = useModal();

function flashAndClose() {
  const flash = usePage().props.flash;

  showFlash({
    message: flash.message,
    type: flash.type,
    position: flash.position,
    timeout: flash.timeout,
  });

  close();
}

const form = useForm("ForgotPasswordForm", {
  email: "",
});

function submit() {
  form.post("/forgot-password", {
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
