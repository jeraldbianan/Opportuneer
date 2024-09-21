<template>
  <q-footer class="flex w-full justify-center bg-light-pink py-10">
    <div class="max-w-container flex w-full flex-col">
      <div class="flex justify-between">
        <div class="flex flex-col">
          <q-img
            :src="logo"
            alt="Opportuneer Logo"
            width="170px"
            height="37px"
            fit="fill"
          />
          <p class="mt-1 font-open-sans text-sm !leading-[130%] text-black">
            Connecting Talent with Opportunity
          </p>
          <div class="mt-8 flex flex-col">
            <p class="font-open-sans text-xs text-black">Connect with me</p>
            <div class="mt-2 flex gap-2">
              <div v-for="contact in callToActionContacts" :key="contact.id">
                <a :href="contact.url" target="_blank">
                  <q-icon
                    :name="`img:icons/contact/${contact.iconSrc}`"
                    class="h-10 w-10 transition-all hover:scale-105"
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
        <FooterLinks />
      </div>
      <p class="mt-[76px] font-open-sans text-xs text-black/40">
        © Copyright - Jerald Bianan
      </p>
    </div>
  </q-footer>
</template>

<script setup lang="ts">
import { callToActionContacts } from 'src/data/callToActionContacts';

import logo from '/icons/Opportuneer.svg';
import FooterLinks from 'src/components/FooterNavigation/FooterLinks.vue';
</script>
