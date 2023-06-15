<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import Avatar from "@/Components/User/Avatar.vue";
import Button from "@/Components/Shared/Button.vue";
import { flash } from "@/Services/Flash";

const props = defineProps({
  user: Object,
});

const hasAvatar = ref(Boolean(props.user.avatar));
const src = ref(props.user.avatar);

const form = useForm({
  avatar: null,
});

function previewImage(e) {
  const file = e.target.files[0];

  src.value = URL.createObjectURL(file);
  form.avatar = file;
}

function submit() {
  form.post(route("settings.profile.setAvatar"), {
    preserveScroll: true,
    onSuccess: () => {
      flash();
      hasAvatar.value = true;
    },
  });
}

function removeAvatar() {
  src.value = null;

  form.delete(route("settings.profile.removeAvatar"), {
    preserveScroll: true,
    onSuccess: () => {
      flash();
      hasAvatar.value = false;
    },
  });
}
</script>

<template>
  <div>
    <p class="text-sm text-gray-600 dark:text-gray-300">Profile picture</p>

    <div class="mx-auto mt-1 h-64 w-64">
      <Avatar :src="src" :isFromBaseUrl="false" />
    </div>

    <form @submit.prevent="submit">
      <div class="h-6">
        <progress
          v-if="form.progress"
          :value="form.progress.percentage"
          class="h-0.5 w-full"
          max="100"
        >
          {{ form.progress.percentage }}
        </progress>
      </div>

      <input
        id="file"
        type="file"
        class="hidden h-px w-px opacity-0"
        accept="image/*"
        @input="previewImage"
      />
      <div class="mt-2 flex justify-center">
        <label
          for="file"
          class="inline-flex min-h-[32px] cursor-pointer items-center justify-center rounded-md bg-sky-600 px-3 py-0.5 text-sm text-white hover:bg-sky-700 dark:bg-sky-700 dark:hover:bg-sky-600"
        >
          Select an image...
        </label>
      </div>

      <div class="mt-1 flex justify-center">
        <Button type="submit" :loading="form.processing">
          Attach to profile
        </Button>
      </div>
    </form>
    <div v-if="hasAvatar" class="mt-3 flex justify-center">
      <Button intent="warning" @click="removeAvatar">
        Remove profile picture
      </Button>
    </div>
  </div>
</template>

<style scoped>
progress::-webkit-progress-value {
  background-color: #20b2aa;
}
progress::-webkit-progress-bar {
  background-color: #e5e7eb;
}
</style>
