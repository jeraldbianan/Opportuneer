import { defineStore } from 'pinia';
import axios from 'axios';
import { Job } from 'src/types/listings';

const BASE_URL = import.meta.env.VITE_API_BASE_URL;

const apiClient = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
});

export const useListingStore = defineStore('listing', {
  state: () => ({
    listings: [] as Job[],
  }),
  getters: {},
  actions: {
    async getListings() {
      try {
        const response = await apiClient.get('/listings');
        this.listings = response.data;
      } catch (error) {
        console.error('Error fetching listings:', error);
        throw error;
      }
    },
  },
});
