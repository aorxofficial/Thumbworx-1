<template>
  <div class="p-auto
  w-full
  bg-[url('https://www.frost.com/wp-content/uploads/2017/07/Connected-truck-telematics.jpg')]">
    <div class="flex items-center min-h-screen p-4 lg:justify-center center-margin">
        <div
          class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md"
        >
          <div
            class="p-4 py-6 text-white bg-blue-500 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly"
          >
           <div class="my-3 text-4xl font-bold tracking-wider tracking-widest text-center">
              <a href="#" >Thumbworx</a>
            </div>
            <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
              With the power of Thumbworx, you can now focus only on functionaries for your products, while leaving the
              Trucking on us!
            </p>
          </div>
          <div class="p-5 bg-white md:flex-1">
            <img class="m-auto size-40 center-margin" src="https://th.bing.com/th/id/R.f60de85e220a6c066dca269bae4e4eed?rik=5V1xnEBnOuZrJg&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2ftruck-silhouette-images%2ftruck-silhouette-images-24.png&ehk=XOXvl%2bhOQLME4sLz9fccgTnrTYWeaP9o7p%2fun%2bLw0nk%3d&risl=&pid=ImgRaw&r=0" alt="" srcset="">
            <h3 class="my-4 text-2xl font-semibold text-center text-gray-700">Super Admin Login</h3>
            <form @submit.prevent="login" class="flex flex-col space-y-5">
              <div class="flex flex-col space-y-1">
                <label for="email" class="text-sm font-semibold text-gray-500">Email</label>
                <input
                  type="email"
                  id="email"
                  placeholder="ex: admin@gmail.com"
                  v-model="email"
                  autofocus
                  class="px-4 py-2 transition duration-300 border rounded border-slate-500 focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                />
              </div>
              <div class="flex flex-col space-y-1">
                <div class="flex items-center justify-between">
                  <label for="password" class="text-sm font-semibold text-gray-500">Password</label>
                    </div>
                <input
                  type="password"
                  id="password"
                  placeholder="********"
                  v-model="password"
                  class="px-4 py-2 transition duration-300 border rounded border-slate-500 focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                />
              </div>
              <div>
                <button
                  type="submit"
                  class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-blue-500 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-blue-200 focus:ring-4"
                >
                  Log in
                </button>
              </div>
            </form>
          </div>
        </div>
  </div>
  </div>
  </template>

<script>
import axios from 'redaxios';

export default {
  data() {
    return {
      email: '',
      password: '',
      error: null,
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/auth/admin/login', {
          email: this.email,
          password: this.password,
        });

        const { token } = response.data;
        localStorage.setItem('token', token); // Store token securely in localStorage
        this.$router.push({ name: 'Dashboard' }); // Redirect to dashboard page after login
      } catch (error) {
        this.error = 'Invalid email or password';
        console.error('Error:', error);
      }
    },
  },
};
</script>
