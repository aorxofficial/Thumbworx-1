<template>
  <main id="Home-page">
    <h1>Logs</h1>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Logs ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Action</th>
          <th scope="col">Timestamp</th>
        </tr>
      </thead>
      <tbody>
        <!-- v-bind means binding multiple attributes -->
        <tr v-for="log in logs" v-bind:key="log.logs_id">
          <td>{{ log.logs_id }}</td>
		  <!-- Joined table from users table -->
		  <td>{{ log.user && `${log.user.first_name} ${log.user.last_name}` }}</td>
      <!-- <td>{{ log.admin && `${log.admin.first_name} ${log.admin.last_name}` }}</td> -->
          <td>{{ log.action }}</td>
          <td>{{ log.created_at }}</td>
        </tr>
      </tbody>
    </table>
  </main>
</template>

<script>
import axios from "redaxios";

export default {
  name: "Logs",
  data() {
    return {
      logs: {},
    };
  },
  created() {
    this.fetchLogs();
  },

  methods: {
    fetchLogs() {
      axios
        .get("http://127.0.0.1:8000/api/admin/logs")
        .then((response) => {
          this.logs = response.data;
        })
        .catch((error) => {
          console.error("Error fetching logs:", error);
        });
    },
  },
};
</script>
