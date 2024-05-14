<template>
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Total Client</h2>
          <p>{{ totalClients }}</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Total Helper</h2>
          <p>{{ totalHelpers }}</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Total Driver</h2>
          <p>{{ totalDrivers }}</p>
        </div>
      </div>
    </div>

	<div class="row">
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Box 1</h2>
          <p>This is the content of box 1.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Box 2</h2>
          <p>This is the content of box 2.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-box">
          <h2>Box 3</h2>
          <p>This is the content of box 3.</p>
        </div>
      </div>
    </div>
  </div>


</template>


<script>
import axios from 'redaxios';
import { ref, onMounted } from 'vue';

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

    onMounted(() => {
      fetchTotalClientCount();
      fetchTotalDriverCount(); // Fetch total driver count on component mount
      fetchTotalHelperCount();
    });

    return {
      totalClients,
      totalDrivers,
      totalHelpers
    };
  },
};
</script>