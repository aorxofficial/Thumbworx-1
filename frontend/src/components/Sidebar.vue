<template>
	<div>
	  <button
		data-drawer-target="sidebar-multi-level-sidebar"
		data-drawer-toggle="sidebar-multi-level-sidebar"
		aria-controls="sidebar-multi-level-sidebar"
		type="button"
		class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600"
	  >
		<span class="sr-only">Open sidebar</span>
		<svg
		  class="w-6 h-6"
		  aria-hidden="true"
		  fill="currentColor"
		  viewBox="0 0 20 20"
		  xmlns="http://www.w3.org/2000/svg"
		>
		  <path
			clip-rule="evenodd"
			fill-rule="evenodd"
			d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
		  ></path>
		</svg>
	  </button>
  
	  <aside
		id="sidebar-multi-level-sidebar"
		class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
		aria-label="Sidebar"
	  >
		<div class="h-full px-3 py-4 overflow-y-auto bg-blue-800 dark:bg-gray-800">
		  <a href="#" class="flex items-center ps-2.5 mb-5">
			<img
			  src="https://th.bing.com/th/id/R.f60de85e220a6c066dca269bae4e4eed?rik=5V1xnEBnOuZrJg&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2ftruck-silhouette-images%2ftruck-silhouette-images-24.png&ehk=XOXvl%2bhOQLME4sLz9fccgTnrTYWeaP9o7p%2fun%2bLw0nk%3d&risl=&pid=ImgRaw&r=0"
			  class="h-14 w-14 me-3 sm:h-14 sm:w-14 rounded-full"
			  alt="Thumbworx logo"
			/>
			<div>
			  <span class="text-xl font-bold whitespace-nowrap text-white">Thumbworx <br></span>
			  <span class="block font-semibold  text-white">Trucking Management System</span>
			</div>
		  </a>
  
 
		  <ul class="space-y-2 font-medium">
	 <li>
	   <router-link
		 to="/Dashboard"
		 class="flex items-center w-full p-2 text-base 
		   text-white transition duration-75 rounded-lg 
		   group hover:bg-gray-300
		   dark:text-white dark:hover:bg-gray-700"
	   >
		 <svg
		   xmlns="http://www.w3.org/2000/svg"
		   fill="none"
		   viewBox="0 0 24 24"
		   stroke-width="1.5"
		   stroke="currentColor"
		   class="flex-shrink-0 w-7 h-7 text-cotton transition duration-75 group-hover:text-gray-900 dark:text-gray-400 
				  dark:group-hover:text-blue-500"
		 >
		   <path
			 stroke-linecap="round"
			 stroke-linejoin="round"
			 d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 
			 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 
			 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25Z"
		   />
		 </svg>
		 <span class="ms-3 group-hover:text-black">Dashboard</span>
	   </router-link>
			</li>
  
			<li>
			  <button
				type="button"
				class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-300
				dark:text-white dark:hover:bg-gray-700"
				aria-controls="dropdown-example"
				data-collapse-toggle="dropdown-example"
			  >
				<svg
				  class="flex-shrink-0 w-7 h-7 text-cotton transition duration-75 group-hover:text-gray-900 dark:text-gray-400 
				  dark:group-hover:text-blue-500"
				  aria-hidden="true"
				  xmlns="http://www.w3.org/2000/svg"
				  fill="none"
				  viewBox="0 0 24 24"
				  stroke-width="1.5"
				  stroke="currentColor"
				>
				  <path
					stroke-linecap="round"
					stroke-linejoin="round"
					d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 
					2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 
					3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3Z"
				  />
 
 
				</svg>
				<span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap group-hover:text-black">
				  Registration <br> Management</span>
				<svg
				class="w-3 h-3 ms-auto text-cotton dark:text-white group-hover:text-blue-500 dark:group-hover:text-yellow-500"
				  aria-hidden="true"
				  xmlns="http://www.w3.org/2000/svg"
				  fill="none"
				  viewBox="0 0 10 6"
 
 
				  
				>
				  <path
					stroke="currentColor"
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="m1 1 4 4 4-4"
				  />
				</svg>
			  </button>
			  <ul id="dropdown-example" class="hidden py-2 space-y-2">
				<li>
				  <button
					type="button"
					class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg 
					pl-11 group hover:bg-gray-300 dark:text-gray dark:hover:bg-gray-700"
					aria-controls="dropdown-sub"
					data-collapse-toggle="dropdown-sub"
				  >
				 
				   
				  <span class="ml-3 flex items-center group-hover:text-black space-x-3">
				   <svg class="flex-shrink-0 w-6 h-6 text-cotton transition duration-75 group-hover:text-gray-900 dark:text-gray-400 
						   dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
					 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
 
 
					  />
				   </svg>
				   <span class="group-hover:text-black text-sm">Driver Management</span>
				   </span>
 
				   <svg
					   class="w-3 h-3 ms-auto text-cotton dark:text-white group-hover:text-blue-500 dark:group-hover:text-yellow-500"
					   aria-hidden="true"
					   xmlns="http://www.w3.org/2000/svg"
					   fill="none"
					   viewBox="0 0 10 6"
					 >
					   <path
						 stroke="currentColor"
						 stroke-linecap="round"
						 stroke-linejoin="round"
						 stroke-width="2"
						 d="m1 1 4 4 4-4"
					   />
					 </svg>
				  </button>
			  
 
				  <ul id="dropdown-sub" class="hidden py-2 space-y-2">
					   <li> <router-link to="/UserAccount" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   
						 <!-- Yung Router-LINK diyan ililink yung page para don -->
						 <span class="ml-6 group-hover:text-black text-sm">Account</span>
					   </router-link>
					   </li>
					   <li><router-link to="/ReviseDocuments" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
							<!-- Yung Router-LINK diyan ililink yung page para don (Not sure kung eto yung dapat na page) -->  
						 <span class="ml-6 group-hover:text-black text-sm">Booking</span>
						 </router-link>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Rating</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Evaluation</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Logs</span>
						 </a>
					   </li>
					 </ul> 
				</li>
				<li>
				  <button
					type="button"
					class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg 
					pl-11 group hover:bg-gray-300 dark:text-gray dark:hover:bg-gray-700"
					aria-controls="dropdown-helper"
					data-collapse-toggle="dropdown-helper"
				  >
				 
				   
				  <span class="ml-3 flex items-center group-hover:text-black space-x-3">
				   <svg class="flex-shrink-0 w-6 h-6 text-cotton transition duration-75 group-hover:text-gray-900 dark:text-gray-400 
						   dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
						   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
 
		 
				   </svg>
				   <span class="group-hover:text-black text-sm">Helper Management</span>
				   </span>
 
				   <svg
					   class="w-3 h-3 ms-auto text-cotton dark:text-white group-hover:text-blue-500 dark:group-hover:text-yellow-500"
					   aria-hidden="true"
					   xmlns="http://www.w3.org/2000/svg"
					   fill="none"
					   viewBox="0 0 10 6"
					 >
					   <path
						 stroke="currentColor"
						 stroke-linecap="round"
						 stroke-linejoin="round"
						 stroke-width="2"
						 d="m1 1 4 4 4-4"
					   />
					 </svg>
				  </button>
			  
 
				  <ul id="dropdown-helper" class="hidden py-2 space-y-2">
					   <li> <router-link to="/UserAccount" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   
						 <!-- Yung Router-LINK diyan ililink yung page para don -->
						 <span class="ml-6 group-hover:text-black text-sm">Account</span>
					   </router-link>
					   </li>
					   <li><router-link to="/ReviseDocuments" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
							<!-- Yung Router-LINK diyan ililink yung page para don (Not sure kung eto yung dapat na page) -->  
						 <span class="ml-6 group-hover:text-black text-sm">Booking</span>
						 </router-link>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Rating</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Evaluation</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Logs</span>
						 </a>
					   </li>
					 </ul> 
				   </li>
				   <li>
				  <button
					type="button"
					class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg 
					pl-11 group hover:bg-gray-300 dark:text-gray dark:hover:bg-gray-700"
					aria-controls="dropdown-client"
					data-collapse-toggle="dropdown-client"
				  >
				 
				  <span class="ml-3 flex items-center group-hover:text-black space-x-3">
				   <svg class="flex-shrink-0 w-6 h-6 text-cotton transition duration-75 group-hover:text-gray-900 dark:text-gray-400 
						   dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
					 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
 
					  />
				   </svg>
				   <span class="group-hover:text-black text-sm">Client Management</span>
				   </span>
 
				   <svg
					   class="w-3 h-3 ms-auto text-cotton dark:text-white group-hover:text-blue-500 dark:group-hover:text-yellow-500"
					   aria-hidden="true"
					   xmlns="http://www.w3.org/2000/svg"
					   fill="none"
					   viewBox="0 0 10 6"
					 >
					   <path
						 stroke="currentColor"
						 stroke-linecap="round"
						 stroke-linejoin="round"
						 stroke-width="2"
						 d="m1 1 4 4 4-4"
					   />
					 </svg>
				  </button>
			  
 
				  <ul id="dropdown-client" class="hidden py-2 space-y-2">
					   <li> <router-link to="/UserAccount" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   
						 <!-- Yung Router-LINK diyan ililink yung page para don -->
						 <span class="ml-6 group-hover:text-black text-sm">Account</span>
					   </router-link>
					   </li>
					   <li><router-link to="/ReviseDocuments" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
							<!-- Yung Router-LINK diyan ililink yung page para don (Not sure kung eto yung dapat na page) -->  
						 <span class="ml-6 group-hover:text-black text-sm">Booking</span>
						 </router-link>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Rating</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Evaluation</span>
						 </a>
					   </li>
					   <li>
						 <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-white dark:hover:bg-gray-700">
						   <span class="ml-6 group-hover:text-black text-sm">Logs</span>
						 </a>
					   </li>
					 </ul> 
				   </li>
				 </ul>
			  
			</li>
		  </ul>
		</div>
	  </aside>
	</div>
  </template>
  
  <script>
  export default {
	name: "Sidebar",
	mounted() {
   document.querySelectorAll("[data-collapse-toggle]").forEach((button) => {
	 button.addEventListener("click", function () {
	   const target = document.getElementById(button.getAttribute("aria-controls"));
	   target.classList.toggle("hidden");
	 });
   });
 
   document.querySelectorAll("[data-drawer-toggle]").forEach((button) => {
	 button.addEventListener("click", function () {
	   const target = document.getElementById(button.getAttribute("data-drawer-target"));
	   target.classList.toggle("-translate-x-full");
	 });
   });
   const testButton = document.querySelector("[data-test-toggle]"); // Select the "Test" button
 testButton.addEventListener("click", function () {
   const testSubMenu = document.getElementById(testButton.getAttribute("aria-controls")); // Get the submenu based on the aria-controls attribute
   testSubMenu.classList.toggle("hidden"); // Toggle the visibility of the submenu
 });
	}
 }
  </script>
  
  <style scoped>
  /* Add custom styles if needed */
  </style>
  