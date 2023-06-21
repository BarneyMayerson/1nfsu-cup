<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import { useModal } from "momentum-modal";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import Button from "@/Components/Shared/Button.vue";
import { flash } from "@/Services/Flash";

const { close } = useModal();

const form = useForm("NameForm", {
  name: "",
});

function submit() {
  form.post(route("settings.account.name.update"), {
    onSuccess: () => flash(),
  });
}
</script>

<template>
  <form @submit.prevent="submit" class="w-full">
    <FloatLabelInput
      v-model="form.name"
      label="New name"
      id="name"
      hint="Enter a new name."
      :error="form.errors.name"
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
        Change my name
      </Button>
    </div>
  </form>
</template>
