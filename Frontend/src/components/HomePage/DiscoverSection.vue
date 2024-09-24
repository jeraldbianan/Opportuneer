<template>
  <section class="flex justify-center">
    <div
      class="my-[90px] flex w-full max-w-container flex-nowrap items-center justify-between gap-[73px]"
    >
      <div class="flex w-full max-w-[466px] flex-col">
        <h1 class="font-montserrat text-4xl font-semibold !leading-[130%]">
          <span class="font-black text-dark-blue">Empowering</span> Your Career
          Journey
        </h1>
        <p class="mt-6 font-open-sans text-base !leading-[160%]">
          From job discovery to application support, we provide the tools you
          need to succeed in today’s competitive job market.
        </p>
        <div class="mt-10 flex">
          <q-btn
            unelevated
            label="Discover Now"
            class="h-10 w-[169px] bg-dark-blue/70 font-open-sans text-xs font-semibold normal-case text-white"
          />
        </div>
      </div>

      <q-img
        :src="heroImage2"
        class="h-auto max-h-full w-full max-w-[622px] object-contain"
      />
    </div>
  </section>
</template>

<script setup lang="ts">
import heroImage2 from '/images/hero-image-2.png';
</script>

<style scoped></style>
