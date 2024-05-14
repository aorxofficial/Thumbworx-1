<template>
  <div class="container">
    <h2>Accounts</h2>

    <h2>Driver</h2>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Driver ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in result" v-bind:key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.first_name }} {{ user.last_name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.phone_number1 }}</td>
          <td>{{ getStatusDisplay(user.account_status) }}</td>
          <td>
            <!-- Getting the specific ID | Ikaw bahala mag customize ng url -->
            <router-link :to="'/UserDetails/' + user.id">View</router-link> 
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
//Bawal tanggalin ung script tag para makita pa rin display kasi part sya ng default code
import axios from "redaxios";

export default { //provides a more modular and organized way to define multiple data properties within a component
    name: 'UserAccount',
    data() {
        return {
            result: {},
        };
    },
  created() { //fetches data from the API when the component is created
    this.UserAccountLoad();
  },
  mounted() {
    console.log("mounted() called.......");
  },

  methods: { //responsible for making the API request to fetch user data.
    UserAccountLoad() {
      var page = "http://127.0.0.1:8000/api/user";
      axios.get(page).then(({ data }) => {
        console.log(data);
        this.result = data;
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
          return "Active";
        default:
          return accountStatus; // Return status as is if not matched | lalabas lng ung number
      }
    },
  },
};
</script>
