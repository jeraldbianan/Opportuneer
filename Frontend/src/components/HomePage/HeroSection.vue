<template>
  <section
    class="flex h-full min-h-[900px] w-full justify-center bg-[url('images/curve.jpg')] bg-cover bg-center"
  >
    <div
      class="my-[90px] flex w-full max-w-container flex-nowrap items-center justify-between gap-[73px]"
    >
      <q-img
        :src="heroImage"
        class="relative h-auto max-h-full w-full max-w-[622px] object-contain"
      >
        <div
          class="absolute left-[58px] top-[132px] flex h-[133px] w-[130px] flex-col items-center justify-center rounded-lg bg-white"
        >
          <p class="font-open-sans text-3xl font-extrabold text-dark-blue">
            {{ listings.length }}
          </p>
          <p class="mt-2 font-open-sans text-base font-semibold text-black">
            Job Offer{{ listings.length > 1 ? 's' : '' }}
          </p>
        </div>
      </q-img>
      <div class="flex w-full max-w-[466px] flex-col">
        <h1 class="font-montserrat text-4xl font-semibold !leading-[130%]">
          Your <span class="font-black text-dark-blue">Dream Job</span> is Just
          a Search Away
        </h1>
        <p class="mt-[35px] font-open-sans text-base !leading-[160%]">
          Discover top opportunities tailored to your skills and aspirations.
          Start applying and take the next step in your career today!
        </p>
        <div class="mt-12 flex">
          <q-input
            borderless
            v-model="keyword"
            placeholder="keyword"
            input-class="placeholder:text-light-blue px-3 mr-4 w-[169px] bg-light-pink/40 rounded-lg h-11 font-open-sans text-xs"
          />
          <q-input
            borderless
            v-model="location"
            placeholder="location"
            input-class="placeholder:text-light-blue px-3 w-[169px] bg-light-pink/40 rounded-lg h-11 font-open-sans text-xs rounded-r-none rounded-br-none"
          />
          <q-btn
            unelevated
            class="h-11 w-[68px] rounded-l-none rounded-bl-none bg-dark-blue/70 text-light-pink"
          >
            <q-icon
              name="svguse:/icons/actions/arrow_forward.svg#arrow-forward"
              class="h-4 w-4 text-light-pink"
            />
          </q-btn>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { storeToRefs } from 'pinia';

import heroImage from '/images/hero image.png';

import { useListingStore } from 'src/stores/listing-store';

const listingStore = useListingStore();
const { listings } = storeToRefs(listingStore);

const keyword = ref('');
const location = ref('');

onMounted(() => {
  listingStore.getListings();
});
</script>

<style lang="scss" scoped></style>
