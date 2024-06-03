<template>
	<div id="app" :class="{ 'dark': isDarkMode }">
	  <!-- Your page content -->
	  <router-view />
	</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		isDarkMode: false
	  }
	},
	methods: {
	  toggleMode() {
		this.isDarkMode = !this.isDarkMode;
	  }
	}
  }
  </script>
  
  <style>
  .dark {
	/* Styles for dark mode */
  }
  </style>