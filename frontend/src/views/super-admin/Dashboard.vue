<template>
  <div class="relative justify-center w-full px-10 py-10">
    <button  type="button" class="absolute top-3 right-12 text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 me-2 mb-2">
    Generate Report
    
    </button>
  <div class="grid grid-cols-1 gap-4 p-4 m-auto sm:grid-cols-2 lg:grid-cols-4">

      <!-- card component -->
  <div class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg h-28 dark:bg-gray-800 dark:border-gray-600 group">
            <div class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ totalClients }}</p>
              <p>Total Clients</p>
            </div>
  </div>

  <div class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg h-28 dark:bg-gray-800 dark:border-gray-600 group">
            <div class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ totalHelpers }}</p>
              <p>Total Helpers</p>
            </div>
  </div>
       <!-- card component -->
       <div class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg h-28 dark:bg-gray-800 dark:border-gray-600 group">
            <div class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl">{{ totalDrivers }}</p>
              <p>Total Drivers</p>
            </div>
  </div>

  </div>
  </div>
  </template>



<script>
import axios from 'redaxios';
import { ref, onMounted } from 'vue';
import { useAdminStore } from '../../stores/adminStore';

export default {
  name: 'Dashboard',
  setup() {
    const totalClients = ref(null);
    const totalDrivers = ref(null);
    const totalHelpers = ref(null);

    const fetchTotalClientCount = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/dashboard/total-client-users-count');
        totalClients.value = response.data.total_client_users;
      } catch (error) {
        console.error('Error fetching total client count:', error);
      }
    };

    const fetchTotalDriverCount = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/dashboard/total-driver-users-count');
        totalDrivers.value = response.data.total_driver_users;
      } catch (error) {
        console.error('Error fetching total driver count:', error);
      }
    };

    const fetchTotalHelperCount = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/dashboard/total-helper-users-count');
        totalHelpers.value = response.data.total_helper_users;
      } catch (error) {
        console.error('Error fetching total driver count:', error);
      }
    };

    // onMounted(() => {
    //   fetchTotalClientCount();
    //   fetchTotalDriverCount(); // Fetch total driver count on component mount
    //   fetchTotalHelperCount();
    // });

    return {
      totalClients,
      totalDrivers,
      totalHelpers
    };
  },
};
</script>