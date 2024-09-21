<template>
  <div class="my-[90px] flex flex-col items-center">
    <h3 class="font-montserrat text-3xl font-bold">Latest Jobs</h3>
    <div class="max-w-container mt-10 grid w-full grid-cols-3">
      <div v-for="job in jobsList" :key="job.id">
        <JobCard :job="job" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';

import { getListings } from 'src/services/apiService';
import { Job } from 'src/types/listings';
import JobCard from '../UI/Cards/JobCard.vue';

const jobsList = ref<Job[]>([]);

onMounted(() => {
  fetchListings();
});

const fetchListings = async () => {
  try {
    const response = await getListings();
    jobsList.value = response;
  } catch (err) {
    console.log(err);
  }
};
</script>

<style scoped></style>
