<template>
  <q-header class="flex h-[60px] w-full max-w-full justify-center bg-white">
    <div class="max-w-container flex w-full items-center justify-between">
      <q-img
        :src="logo"
        alt="Opportuneer Logo"
        width="170px"
        height="37px"
        fit="fill"
      />
      <NavigationLinks />
    </div>
  </q-header>
</template>

<script setup lang="ts">
import logo from '/icons/Opportuneer.svg';
import NavigationLinks from 'src/components/NavigationBar/NavigationLinks.vue';
</script>

<style scoped></style>
