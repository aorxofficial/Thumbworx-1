import { defineStore } from "pinia";
import axios from 'redaxios';

export const useUserStore = defineStore('user', {
    state: () => ({
      user: null,
      token: null
    }),
    actions: {
        sampleFunction() {
            console.log("Hello")
        },
        async login(email, password) {
            const response = await axios.post('http://127.0.0.1:8000/api/auth/admin/login', {
                email,
                password
            })
            const { token } = response.data;
            this.token = token
            localStorage.setItem('token', token)
        },
        logout() {
            
        },
        refresh() {

        }
    }
})