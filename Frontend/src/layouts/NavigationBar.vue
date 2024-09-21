<template>
  <q-header class="flex h-[60px] w-full max-w-full justify-center bg-white">
    <div class="flex w-full max-w-[1160px] items-center justify-between">
      <q-img
        src="icons/Opportuneer.svg"
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
import NavigationLinks from 'src/components/NavigationBar/NavigationLinks.vue';
</script>

<style scoped></style>
