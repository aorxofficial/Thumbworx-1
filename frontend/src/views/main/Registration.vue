<template>
  <div class="max-w-3xl mx-auto py-8">
    <div class="bg-blue shadow-md rounded-lg p-6">
      <div v-if="step === 1">
        <!-- First Step Form -->
        <h2 class="text-xl font-bold mb-4">Step 1: Basic Information</h2>
        <form @submit.prevent="secondStep">
          <div class="mb-4">
            <label class="block text-gray-700">User Type</label>
            <select v-model="form.usertype" class="form-select mt-1 block w-full">
              <option value="driver">Driver</option>
              <option value="client">Client</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">First Name</label>
            <input v-model="form.firstname" type="text" class="form-input mt-1 block w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Last Name</label>
            <input v-model="form.lastname" type="text" class="form-input mt-1 block w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Middle Name</label>
            <input v-model="form.middlename" type="text" class="form-input mt-1 block w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input v-model="form.email" type="email" class="form-input mt-1 block w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Gender</label>
            <div>
              <label><input type="radio" v-model="form.gender" value="male" /> Male</label>
              <label><input type="radio" v-model="form.gender" value="female" /> Female</label>
              <label><input type="radio" v-model="form.gender" value="other" /> Other</label>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Marital Status</label>
            <div>
              <label><input type="radio" v-model="form.maritalStatus" value="single" /> Single</label>
              <label><input type="radio" v-model="form.maritalStatus" value="married" /> Married</label>
              <label><input type="radio" v-model="form.maritalStatus" value="divorced" /> Divorced</label>
              <label><input type="radio" v-model="form.maritalStatus" value="widowed" /> Widowed</label>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Phone Number</label>
            <input v-model="form.phoneNumber" type="text" class="form-input mt-1 block w-full" />
          </div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
        </form>
      </div>
      <div v-else-if="step === 2">
        <!-- Second Step Form -->
        
        <h2 class="text-xl font-bold mb-4">Step 2: Additional Information </h2>
        <form @submit.prevent="thirdStep">
          <div class="mb-4">
            <label class="block text-gray-700">Permanent Address</label>
            <input v-model="form.permanentAddress.homenumber" type="text" placeholder="Home Number" class="form-input mt-1 block w-full" />
            <input v-model="form.permanentAddress.street" type="text" placeholder="Street" class="form-input mt-1 block w-full" />
            <input v-model="form.permanentAddress.barangay" type="text" placeholder="Barangay" class="form-input mt-1 block w-full" />
            <input v-model="form.permanentAddress.city" type="text" placeholder="City" class="form-input mt-1 block w-full" />
            <input v-model="form.permanentAddress.province" type="text" placeholder="Province" class="form-input mt-1 block w-full" />
            <input v-model="form.permanentAddress.region" type="text" placeholder="Region" class="form-input mt-1 block w-full" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Current Address</label>
            <input v-model="form.currentAddress.homenumber" type="text" placeholder="Home Number" class="form-input mt-1 block w-full" />
            <input v-model="form.currentAddress.street" type="text" placeholder="Street" class="form-input mt-1 block w-full" />
            <input v-model="form.currentAddress.barangay" type="text" placeholder="Barangay" class="form-input mt-1 block w-full" />
            <input v-model="form.currentAddress.city" type="text" placeholder="City" class="form-input mt-1 block w-full" />
            <input v-model="form.currentAddress.province" type="text" placeholder="Province" class="form-input mt-1 block w-full" />
            <input v-model="form.currentAddress.region" type="text" placeholder="Region" class="form-input mt-1 block w-full" />
          </div>
          <button type="button" @click="firstStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
      </form>
      </div>


      <div v-else-if="step === 3">
        <form @submit.prevent="thirdStep">
           <!-- Third Step Form -->
          <div v-if="form.usertype === 'driver'">
            <h2 class="text-xl font-bold mb-4">Step 3: Additional Information (Driver)</h2>
            <div class="mb-4">
              <label class="block text-gray-700">Emergency Contact Full Name</label>
              <input v-model="form.emergencyContact.fullname" type="text" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Relationship</label>
              <input v-model="form.emergencyContact.relationship" type="text" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Phone Number</label>
              <input v-model="form.emergencyContact.phoneNumber" type="text" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Email</label>
              <input v-model="form.emergencyContact.email" type="email" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Address</label>
              <input v-model="form.emergencyContact.address" type="text" class="form-input mt-1 block w-full" />
            </div>
          </div>
          <div v-else-if="form.usertype === 'client'">
            <h2 class="text-xl font-bold mb-4">Step 3: Additional Information (Client)</h2>
            <div class="mb-4">
              <label class="block text-gray-700">Company Name</label>
              <input v-model="form.company.Name" type="text" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Company Telephone Number</label>
              <input v-model="form.company.TelephoneNumber" type="text" class="form-input mt-1 block w-full" />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Company Address</label>
              <input v-model="form.company.Address" type="text" class="form-input mt-1 block w-full" />
            </div>
          </div>
         <h2 class="text-xl font-bold mb-4" v-else> Please Go Back and Select a User Type  </h2>

         <div v-if="form.usertype == 'driver'"> 
          <button type="button" @click="secondStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button> </div>

          <div v-else-if="form.usertype == 'client'">
          <button type="button" @click="secondStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button> </div>

          <div v-else> 
            <button type="button" @click="secondStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MultistepForm',
  data() {
    return {
      step: 1,
      form: {
        usertype: '',
        firstname: '',
        lastname: '',
        middlename: '',
        email: '',
        gender: '',
        maritalStatus: '',
        phoneNumber: '',
        permanentAddress: {
          homenumber: '',
          street: '',
          barangay: '',
          city: '',
          province: '',
          region: '',
        },
        currentAddress: {
          homenumber: '',
          street: '',
          barangay: '',
          city: '',
          province: '',
          region: '',
        },
        emergencyContact: {
          fullname: '',
          relationship: '',
          phoneNumber: '',
          email: '',
          address: '',
        },
        company: {
          Name: '',
          TelephoneNumber: '',
          Address: '',
        },
      },
    };
  },
  methods: {
    thirdStep() {
      this.step = 3;
    },
    secondStep() {
      this.step = 2;
    },
    firstStep() {
      this.step = 1;
    },
    submitForm() {
      // Submit the form data
      console.log('Form submitted', this.form);
      // You can add your form submission logic here
    },
  },
};
</script>


