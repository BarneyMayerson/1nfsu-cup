<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import PrimaryLikeGameButton from "@/Components/Shared/PrimaryLikeGameButton.vue";
import SecondaryLikeGameButton from "@/Components/Shared/SecondaryLikeGameButton.vue";
import { useModal } from "momentum-modal";
import { useToast, POSITION } from "vue-toastification";

const { close } = useModal();
const toast = useToast();

function flash() {
  const flash = usePage().props.flash;

  toast(flash.message, {
    position: POSITION.BOTTOM_RIGHT,
    timeout: 10000,
    type: flash.type,
    closeOnClick: false,
  });
}

const form = useForm("ForgotPasswordForm", {
  email: "",
});

function submit() {
  form.post("/forgot-password", {
    onSuccess: () => flash(),
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
        :class="{ 'opacity-50': form.processing }"
        :disabled="form.processing"
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
