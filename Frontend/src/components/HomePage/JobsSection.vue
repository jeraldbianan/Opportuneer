<template>
  <section class="my-[90px] flex flex-col items-center">
    <h3 class="font-montserrat text-3xl font-bold">Latest Jobs</h3>
    <div class="mt-10 grid w-full max-w-container grid-cols-3">
      <div v-for="job in listings" :key="job.id">
        <JobCard :job="job" />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';

import JobCard from '../UI/Cards/JobCard.vue';
import { useListingStore } from 'src/stores/listing-store';
import { storeToRefs } from 'pinia';

const listingStore = useListingStore();
const { listings } = storeToRefs(listingStore);

onMounted(() => {
  listingStore.getListings();
});
</script>

<style scoped></style>
