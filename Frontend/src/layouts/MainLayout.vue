<template>
  <q-layout view="lHh Lpr lFf">
    <NavigationBar />
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup lang="ts">
import NavigationBar from './NavigationBar.vue';
</script>
