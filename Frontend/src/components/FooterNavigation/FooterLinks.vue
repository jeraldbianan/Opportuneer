<template>
  <div class="flex gap-[30px]">
    <div class="flex w-[168px] flex-col text-black/60">
      <h4 class="font-montserrat text-lg font-medium">Pages</h4>
      <div class="mt-2 flex flex-col gap-1">
        <div v-for="link in links" :key="link.name">
          <router-link :to="link.url" class="font-open-sans text-xs">{{
            link.name
          }}</router-link>
        </div>
      </div>
    </div>
    <div class="flex w-[168px] flex-col text-black/60">
      <h4 class="font-montserrat text-lg font-medium">Contact</h4>
      <div class="mt-2 flex flex-col gap-2">
        <p @click="sendEmail" class="cursor-pointer font-open-sans text-xs">
          jeraldbianan@gmail.com
        </p>
        <a
          href="https://jeraldbianan.com/#/"
          target="_blank"
          class="font-open-sans text-xs"
          >My website</a
        >
      </div>
    </div>
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

const email = ref('jeraldbianan@gmail.com');

const sendEmail = () => {
  window.location.href = `mailto:${email.value}`;
};
</script>

<style scoped></style>
