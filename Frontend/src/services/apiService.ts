import axios from 'axios';

const BASE_URL = import.meta.env.VITE_API_BASE_URL;
console.log('BASE_URL:', BASE_URL);

const apiClient = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Fetch all listings
export const getListings = async () => {
  try {
    const response = await apiClient.get('/listings');
    return response.data;
  } catch (error) {
    console.error('Error fetching listings:', error);
    throw error;
  }
};

// Fetch a listing by ID
export const getListingById = async (id: number) => {
  try {
    const response = await apiClient.get(`/listings/${id}`);
    return response.data;
  } catch (error) {
    console.error(`Error fetching listing with ID ${id}:`, error);
    throw error;
  }
};
