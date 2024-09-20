<template>
  <div class="flex items-center gap-5">
    <div v-for="link in links" :key="link.name">
      <router-link
        :to="link.url"
        class="font-open-sans text-xs font-semibold text-black"
        >{{ link.name }}</router-link
      >
    </div>
    <q-btn
      unelevated
      label="Login"
      class="h-10 w-[99px] bg-dark-blue/70 font-open-sans text-xs font-semibold normal-case text-white"
    />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const links = ref([
  {
    name: 'Home',
    url: '/',
  },
  {
    name: 'Jobs List',
    url: '/listings',
  },
  {
    name: 'About us',
    url: '/about',
  },
  {
    name: 'Contact',
    url: '/contact',
  },
]);
</script>

<style scoped></style>
