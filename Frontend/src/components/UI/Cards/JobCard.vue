<template>
  <q-card
    class="w-[367px] rounded-lg bg-light-pink/50 p-[30px] transition-all hover:scale-105"
  >
    <q-card-section class="flex items-center gap-3">
      <q-img
        :src="job.logo_url"
        :alt="job.company"
        width="80px"
        height="80px"
        class="rounded-2xl"
      />
      <div class="flex flex-col">
        <p class="font-open-sans text-xs font-bold text-light-blue">
          {{ `${job.city}, ${job.country}` }}
        </p>
        <p class="font-open-sans text-xl font-bold">{{ job.company }}</p>
      </div>
    </q-card-section>

    <q-separator class="my-6 h-[1px] w-full text-light-blue" />

    <q-card-section>
      <p class="font-open-sans text-xl font-semibold">{{ job.title }}</p>
      <p class="mt-4 line-clamp-4 font-open-sans text-base !leading-[140%]">
        {{ job.description }}
      </p>
      <div class="mt-8 flex items-center justify-between">
        <div class="flex flex-col gap-2 font-open-sans text-xs">
          <p>{{ job.type }}</p>
          <p>{{ `₱${job.salary} - ₱${job.secondary_salary}` }}</p>
        </div>
        <q-btn
          unelevated
          label="Details"
          class="h-7 w-[94px] bg-dark-blue/70 font-open-sans text-[10px] font-semibold normal-case text-white"
        />
      </div>
    </q-card-section>
  </q-card>
</template>

<script setup lang="ts">
import { Job } from 'src/types/listings';
import { PropType } from 'vue';

defineProps({
  job: {
    type: Object as PropType<Job>,
    required: true,
  },
});
</script>

<style scoped></style>
