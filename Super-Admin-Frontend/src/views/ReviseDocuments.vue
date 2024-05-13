<template>
  <div>
    <h1>Update Document</h1>
    <form @submit.prevent="submitForm">
      <div class="mb-3">
        <label class="form-label">
          <a :href="existingDocuments.license" target="_blank">License</a>
        </label>
        <input type="file" class="form-control" id="license" aria-describedby="licenseHelp" accept="application/pdf,image/*">
      </div>

      <div class="mb-3">
        <label class="form-label">
          <a :href="existingDocuments.nbi_clearance" target="_blank">NBI Clearance</a>
        </label>
        <input type="file" class="form-control" id="nbi_clearance" aria-describedby="nbiClearanceHelp" accept="application/pdf,image/*">
      </div>

      <div class="mb-3">
        <label class="form-label">
          <a :href="existingDocuments.lto_driving_history" target="_blank">LTO Driving History</a>
        </label>
        <input type="file" class="form-control" id="lto_driving_history" aria-describedby="ltoDrivingHistoryHelp" accept="application/pdf,image/*">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</template>

<script>
import axios from "redaxios";

export default {
  data() {
    return {
      existingDocuments: {},
      result: {
        license: "",
        nbi_clearance: "",
        lto_driving_history: "",
      },
    };
  },
  created() {
    // Fetch existing documents and token from URL
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('token');
    
    // Validate token
    this.validateToken(token);
  },
  methods: {
    validateToken(token) {
      axios
        .get(`http://127.0.0.1:8000/api/user/validate-token/${token}`)
        .then((response) => {
          if (response.data.valid) {
            // Token is valid, fetch existing documents
            this.fetchExistingDocuments();
          } else {
            // Token is not valid, redirect to error page
            window.location.href = "/error";
          }
        })
        .catch((error) => {
          console.error("Error validating token:", error);
          // Redirect to error page if there's an error
          window.location.href = "/error";
        });
    },

  } //End of method
};
</script>
