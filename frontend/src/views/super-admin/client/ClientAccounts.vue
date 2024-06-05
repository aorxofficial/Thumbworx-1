<template>
    <div class="w-screen object-fill ">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 flex justify-center">
        <div class="inline-block py-2 sm:px-6 lg:px-8 
        mt-20 rounded-2xl border-solid border-slate-500 drop-shadow-md bg-white">
          <div class="overflow-hidden ">
          <!-- tablecontainer -->
                    <div class="block">
                      <!-- searchbar part -->
                      <div class=" p-2 flex flex-wrap justify-between">
                        <form class="w-1/2 ">   
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class="block w-full p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                            </div>
                          <div>
                        </div>
                        </form>
    
                      <div 
                      class="relative inline-block text-left">
                        <!-- driver filter -->
                      <div>
                        <div>
                            <button type="button" @click="toggle" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-blue px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                              Client type filter
                              <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                              </svg>
                            </button>
                        </div>
                      </div>
                      
                      <div v-if="showDropdown" class=" absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                          <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Type 1</a>
                          <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Type 2</a>
                          <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Type 3</a>
                          <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">--Clear--</a>
                        </div>
                      </div>
                    </div>
                  </div>
      
        
          <div class="">
            <br>
            <h2>Client Account Records</h2>
            <br>
            <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
              <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
                  <th scope="col px-6 py-4">Client ID</th>
                  <th scope="col px-6 py-4">Name</th>
                  <th scope="col px-6 py-4">Email</th>
                  <th scope="col px-6 py-4">Phone Number</th>
                  <th scope="col px-6 py-4">Status</th>
                  <th scope="col px-6 py-4">Action</th>
                </tr>
              </thead>
               <tbody>
        
                <tr v-for="user in filteredResults" v-bind:key="user.id"
                  class="border-b border-neutral-200 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-white/10 dark:hover:bg-neutral-600">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{ user.id }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ user.first_name }} {{ user.last_name }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ user.email }}m</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ user.phone_number1 }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ getStatusDisplay(user.account_status) }}</td>
                  <td class="whitespace-nowrap px-6 py-4"><router-link :to="'/ClientDetails/' + user.id">View</router-link> </td>
               </tr>
    
              </tbody>
    
          
            </table>
    
    
      <!-- page turner button -->
      <div class="w-full flex justify-between p-4 border-t border-blue-gray-50">
        <button
          class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Previous
        </button>
          
        <button
          class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Next
        </button>
      </div>
          </div>
    </div>
          </div>
        </div>
      </div>
    </div>
  
    </template>
    
  <script> //Bawal tanggalin ung script tag para makita pa rin display kasi part sya ng default code
  import axios from "redaxios";
  import { useAdminStore } from '../../../stores/adminStore';
  
  export default {
    name: 'UserAccount',
    data() {
      return {
        result: [], // Change to array
        showDropdown: false,
      };
    },
      computed: {
    filteredResults() {
      return this.result.filter(user => user.user_type === "Client");
    },
  },
    created() {
      // Fetch user account data when the component is created
      this.UserAccountLoad();
    },
    methods: {
      UserAccountLoad() {
        // Access the adminStore to get the token
        const adminStore = useAdminStore();
        const token = adminStore.token;
  
        if (!token) {
          console.error('Token not available');
          return;
        }
  
        var page = "http://127.0.0.1:8000/api/user";
        
        // Make an authenticated API request using the token for authorization
        axios.get(page, {
          headers: {
            Authorization: `Bearer ${token}`
          }
        }).then(({ data }) => {
          console.log(data);
          this.result = data;
        }).catch(error => {
          console.error('Error fetching user account data:', error);
        });
      },
      getStatusDisplay(accountStatus) {
        // Convert integer status to display text
        switch (accountStatus) {
          case 0:
            return "Pending";
          case 1:
            return "Onboarding";
          case 2:
            return "Denied";
          case 3:
            return "Terminated";
          case 4:
            return "Cancelled";
          case 5:
            return "Blocked";
          case 6:
            return "Freezed";
          default:
            return accountStatus;// Return status as is if not matched | lalabas lng ung number
        }
      },
      toggle() {
        this.showDropdown = !this.showDropdown;
      },
    },
  };
  </script>
  
  