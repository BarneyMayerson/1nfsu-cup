<script setup>
import { useForm } from "@inertiajs/vue3";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";
import Button from "@/Components/Shared/Button.vue";
import UserIcon from "@/Components/Shared/Icons/UserIcon.vue";

const props = defineProps({
  user: Object,
});
const form = useForm("ProfileForm", {
  name: props.user.name,
});
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

    <div class="flex space-x-2">
      <Button :icon-left="UserIcon"> Update profile </Button>
      <Button :icon-right="UserIcon" intent="secondary">
        Update profile
      </Button>
      <Button :icon-left="UserIcon" intent="warning"> Update profile </Button>
      <Button :icon-left="UserIcon" intent="danger"> Update profile </Button>
    </div>

    <div class="mt-4 flex space-x-2">
      <Button :icon-left="UserIcon" loading> Update profile </Button>
      <Button :icon-left="UserIcon" intent="secondary" loading>
        Update profile
      </Button>
      <Button :icon-left="UserIcon" intent="warning" loading>
        Update profile
      </Button>
      <Button :icon-left="UserIcon" intent="danger" loading>
        Update profile
      </Button>
    </div>

    <div class="mt-4 flex space-x-2">
      <Button :icon-left="UserIcon" disabled> Update profile </Button>
      <Button :icon-left="UserIcon" intent="secondary" disabled>
        Update profile
      </Button>
      <Button :icon-left="UserIcon" intent="warning" disabled>
        Update profile
      </Button>
      <Button :icon-left="UserIcon" intent="danger" disabled>
        Update profile
      </Button>
    </div>
  </form>
</template>
