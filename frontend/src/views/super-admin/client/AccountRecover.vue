<template>
    <div class="container">
      <h2>Accounts</h2>
  
      <h2>Recover</h2>
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
          <tr v-for="user in restoredUsers" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.first_name }} {{ user.last_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone_number1 }}</td>
            <td>{{ getStatusDisplay(user.account_status) }}</td>
            <td>
              <button class="btn btn-primary" @click="recoverAccount(user.id)">
                Recover
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from "redaxios";
  
  export default {
    name: "AccountRecover",
    data() {
      return {
        result: [],
      };
    },
    created() {
      this.loadUserAccounts();
    },
    computed: {
      // Filter users where is_restore is equal to 1
      restoredUsers() {
        return this.result.filter(user => user.is_restore === 1);
      }
    },
    methods: {
      loadUserAccounts() {
        axios.get("http://127.0.0.1:8000/api/user").then(({ data }) => {
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
            return accountStatus;
        }
      },
      recoverAccount(id) {
        axios.put(`http://127.0.0.1:8000/api/user/account-recover/${id}`)
          .then(response => {
            this.loadUserAccounts(); // Reload user accounts after recovery
            console.log("User restored successfully:", response.data);
            // Show alert that the account has been restored
            alert("Account has been restored!");
          })
          .catch(error => {
            console.error("Error recovering account:", error);
          });
      },
    },
  };
  </script>
  