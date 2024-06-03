<template>
    <div>
      <Sidebar v-if="$route.meta.sidebar"></Sidebar>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  
  export default {
    components: {
      Sidebar,
    },
  };
  </script>