
<template>
    <div class="w-full">
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

                  </div>
      
        
          <div class="">
            <br>
            <h2>Booking</h2>
            <br>
            <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
              <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
                  <th scope="col px-6 py-4">Booking ID</th>
                  <th scope="col px-6 py-4">Company Name</th>
                  <th scope="col px-6 py-4">Driver ID</th>
                  <th scope="col px-6 py-4">Truck ID</th>
                  <th scope="col px-6 py-4">Status</th>
                  <th scope="col px-6 py-4">Action</th>
                </tr>
              </thead>
              <tbody>
        
                <tr v-for="user in result" v-bind:key="1" 
                  class="border-b border-neutral-200 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-white/10 dark:hover:bg-neutral-600">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{ 1 }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ 1 }} {{ 1 }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ 1}}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ 1 }}</td>
                  <td :class="getStatusClass(1)" class="whitespace-nowrap px-6 py-4">
                    {{ getStatusDisplay(1) }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4"><button class="btn btn-primary" @click="viewBookingDetails(1)">View</button> </td>
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

    <div id="bookingDetailsPop" class=" w-full absolute z-10 bg-black bg-opacity-50 pt-20 pb-20">
    <!-- pop up content div -->
     <div class="rounded-lg drop-shadow-lg border-1 border-slate-400 bg-white w-fit ml-auto mr-auto">
          <!-- popup header --> 
          <div class="px-8 text-white bg-blue-600 rounded-tl-lg rounded-tr-lg flex items-stretch"> 
            <legend class="self-center">Booking Details</legend>
            <!-- close btn -->
            <img @click="closePopup" src="https://www.nicepng.com/png/full/52-521935_close-button-png.png" class="size-7 self-center" alt="">
          </div>

          <!-- popup body -->
          <div class="p-8">

          <!-- book info div -->
          <div class="drop-shadow-lg">
            <!-- header -->
            <div class="rounded-tl-lg rounded-tr-lg p-3 text-xl bg-slate-200">
                <h6>Book Information</h6>
            </div>
            <!-- body -->
            <div class="rounded-bl-lg rounded-br-lg p-3 bg-slate-100">
              <div class="row">
                <div class="col mb-3">
                  <label for="disabledTextInput1" class="form-label">Booking ID:</label>
                  <!-- first_name and others is from the database. Hindi sya tinawag directly dito sa script code sa baba -->
                  <input
                    type="text"
                    id="disabledTextInput1"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>

                <div class="col mb-3">
                  <label for="disabledTextInput2" class="form-label">Date:</label>
                  <input
                    type="text"
                    id="disabledTextInput2"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
                <div class="col mb-3">
                  <label for="disabledTextInput3" class="form-label">Location</label>
                  <input
                    type="text"
                    id="disabledTextInput3"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="disabledTextInput4" class="form-label">Client ID</label>
                  <input
                    type="text"
                    id="disabledTextInput4"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
                <div class="col mb-3">
                  <label for="disabledTextInput5" class="form-label">Age</label>
                  <input
                    type="text"
                    id="disabledTextInput5"
                    class="form-control"
                    disabled
                    :value="2"
                  />
                </div>
                <div class="col mb-3">
                  <label for="disabledTextInput6" class="form-label">Gender</label>
                  <input
                    type="text"
                    id="disabledTextInput6"
                    class="form-control"
                    disabled
                    :value="2"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="disabledTextInput7" class="form-label"
                    >Company Name</label
                  >
                  <input
                    type="text"
                    id="disabledTextInput7"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
                <div class="col mb-3">
                  <label for="disabledTextInput8" class="form-label">User Type</label>
                  <input
                    type="text"
                    id="disabledTextInput8"
                    class="form-control"
                    disabled
                    :value="2"
                  />
                </div>
                <div class="col"></div>
                <!-- Empty column for alignment -->
              </div>

              <div class="row">
                <div class="col mb-3">
                  <label for="disabledTextInput7" class="form-label"
                    >Company Name</label
                  >
                  <input
                    type="text"
                    id="disabledTextInput7"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
                <div class="col mb-3">
                  <label for="disabledTextInput8" class="form-label">Status</label>
                  <input
                    type="text"
                    id="disabledTextInput8"
                    class="form-control"
                    disabled
                    :value="9"
                  />
                </div>
                <div class="col"></div>
                <!-- Empty column for alignment -->
              </div>
              
            </div>
          </div>
          <!-- contact info div -->
          <br>
          <div class="drop-shadow-lg">
            <div class="rounded-tl-lg rounded-tr-lg p-3 text-xl bg-slate-200">
              <h6>Driver/Helper Information</h6>
            </div>

            <div class="rounded-bl-lg rounded-br-lg p-3 bg-slate-100">
                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput9" class="form-label"
                        >Driver ID</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput9"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput10" class="form-label"
                        >Fullname</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput10"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput11" class="form-label">Driver Type</label>
                        <input
                        type="text"
                        id="disabledTextInput11"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput9" class="form-label"
                        >Truck ID</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput9"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput10" class="form-label"
                        >Vehicle Type</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput10"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput9" class="form-label"
                        >Helper ID</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput9"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput10" class="form-label"
                        >Fullname</label
                        >
                        <input
                        type="text"
                        id="disabledTextInput10"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput11" class="form-label">Helper Type</label>
                        <input
                        type="text"
                        id="disabledTextInput11"
                        class="form-control"
                        disabled
                        :value="2"
                        />
                    </div>
                </div>



            </div>
        </div>
    <br>

          <!-- buttons div -->
          <div class="flex justify-end">
            
              <button class="m-3 w-90 bg-red-600
              py-2 px-5 text-white font-semibold rounded-full shadow-md hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-400 focus:ring-opacity-75
              " @click="cancelBooking(3)">Cancel Booking</button>
          </div>

          </div>


     </div>
  </div>

</template>

<script>

//Bawal tanggalin ung script tag para makita pa rin display kasi part sya ng default code
import axios from "redaxios";

export default { //provides a more modular and organized way to define multiple data properties within a component
    name: 'Booking',
    data() {
        return {
         



        };
    },
  created() { //fetches data from the API when the component is created
    this.loadBooking();
  },
  mounted() {
    console.log("mounted() called.......");
  },

  methods: { //responsible for making the API request to fetch user data.
    loadBooking() {
     
    },
    cancelBooking(bookID){
        alert("Book Has been cancel.")
        this.closePopup()
    },
    getStatusClass(status) {
      switch (status) {
        case 0:
          return "status-pending";
        case 1:
          return "status-onboarding";
        case 2:
          return "status-denied";
        case 3:
          return "status-active";
        default:
          return "";
      }
    },
    getStatusDisplay(bookingStatus) {
      // Convert integer status to display text
      switch (bookingStatus) {
        case 0:
          return "Pending";
        case 1:
          return "Onboarding";
        case 2:
          return "Denied";
        case 3:
          return "Active";
        default:
          return bookingStatus; // Return status as is if not matched | lalabas lng ung number
      }
    },
    closePopup(){
      document.getElementById("bookingDetailsPop").classList.add('collapse');
    },
    // new function popup vieww of details
    viewBookingDetails(bookID){
        document.getElementById("bookingDetailsPop").classList.remove('collapse');
    },
 

  },
};


</script>







<style scoped>
.status-pending {
  color: yellow;
}
.status-onboarding {
  color: blue;
}
.status-denied {
  color: red;
}
.status-active {
  color: green;
}
</style>

