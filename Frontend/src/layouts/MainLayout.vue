<template>
  <q-layout view="hHh lpR fff">
    <NavigationBar />

    <q-page-container>
      <q-page>
        <router-view />
      </q-page>
    </q-page-container>

    <FooterNavigation />
  </q-layout>
</template>

<script setup lang="ts">
import FooterNavigation from './FooterNavigation.vue';
import NavigationBar from './NavigationBar.vue';
</script>
