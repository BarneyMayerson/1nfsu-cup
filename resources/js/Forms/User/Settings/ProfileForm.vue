<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import CountrySelect from "@/Components/CountrySelector/CountrySelect.vue";
import Button from "@/Components/Shared/Button.vue";
import { flash } from "@/Services/Flash";

const props = defineProps({
  user: Object,
});

const form = useForm("ProfileForm", {
  name: props.user.name,
  country: props.user.country ?? null,
});

function changeCountry(code) {
  form.country = code;
}

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

    <div>
      <p class="mb-1 ml-3 text-sm text-gray-600 dark:text-gray-300">Country</p>
      <CountrySelect
        id="country"
        @country-selected="changeCountry"
        :init-value="props.user.country"
      />
    </div>
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
