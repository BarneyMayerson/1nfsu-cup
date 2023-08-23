<script setup>
import { Head } from "@inertiajs/vue3";
import Avatar from "@/Components/User/Avatar.vue";
import { flagSrc } from "@/Countries/flag";
import { countryListAlpha2Array } from "@/Countries/countries-list";

const props = defineProps(["user"]);

const mergedName = props.user ? props.user.name.replace(" ", "") : null;
const country = props.user
  ? countryListAlpha2Array.find(
      (country) => country.code === props.user.country
    ).name
  : null;
const flag = props.user ? flagSrc(props.user.country) : null;
</script>

<template>
  <Head title="Public Profile" />
  <div class="container mx-auto">
    <main>
      <div v-if="user">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
          <div
            class="flex items-start justify-center space-x-4 md:justify-start"
          >
            <div
              class="h-24 w-24 flex-shrink-0 lg:h-36 lg:w-36 xl:h-48 xl:w-48"
            >
              <Avatar :src="user.avatar" />
            </div>

            <div>
              <h3 class="text-2xl font-semibold tracking-wide">
                {{ user.name }}
              </h3>
              <p class="opacity-50">{{ mergedName }}</p>
            </div>

            <div>
              <img id="flag" class="w-32" :src="flag" />
              <p class="mt-1 text-sm opacity-75">{{ country }}</p>
            </div>
          </div>

          <div
            class="flex items-center justify-center space-x-4 md:justify-end"
          >
            <div
              class="mx-3 h-32 w-40 border-2 bg-transparent p-4 text-center dark:border-sky-400"
            >
              <p class="text-lg font-bold">Tourneys</p>
              <span class="text-6xl">8</span>
              <span class="text-4xl"> / </span>
              <span class="text-2xl">1</span>
            </div>

            <div
              class="mx-3 h-32 w-40 border-2 bg-transparent p-4 text-center dark:border-sky-400"
            >
              <p class="text-lg font-bold">Competitions</p>
              <span class="text-6xl">18</span>
              <span class="text-4xl"> / </span>
              <span class="text-2xl">6</span>
            </div>
          </div>
        </div>

        <div class="mt-4 md:mt-10">
          <div class="text-xl">Site Points (SP): 123</div>
        </div>
      </div>
      <div v-else>
        <div class="flex justify-center">
          <div class="my-4 flex items-center sm:my-16 sm:justify-start">
            <div class="border-r px-4 text-3xl tracking-wider">404</div>

            <div class="ml-4 text-3xl uppercase tracking-wider">
              No such profile found
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
