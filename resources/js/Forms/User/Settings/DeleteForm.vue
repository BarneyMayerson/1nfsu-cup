<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import { useModal } from "momentum-modal";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import Button from "@/Components/Shared/Button.vue";
import { flash } from "@/Services/Flash";

const { close } = useModal();

const form = useForm("DeleteForm", {
  email: "",
  phrase: "",
});

function submit() {
  form.delete(route("settings.account.destroy"), {
    onSuccess: () => flash(),
  });
}
</script>

<template>
  <form @submit.prevent="submit" class="w-full space-y-10">
    <FloatLabelInput
      v-model="form.email"
      label="Email"
      id="email"
      hint="Enter a new email."
      :error="form.errors.email"
      required
    />

    <FloatLabelInput
      v-model="form.phrase"
      label="Confirmation phrase"
      id="phrase"
      hint="To verify, type 'delete my accout right now' above."
      :error="form.errors.phrase"
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
        intent="danger"
        type="submit"
        :disabled="form.processing"
        :loading="form.processing"
      >
        Delete this account
      </Button>
    </div>
  </form>
</template>
