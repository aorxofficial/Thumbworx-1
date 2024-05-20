import { defineStore } from "pinia";
import axios from 'redaxios';
import { useRouter } from "vue-router";

export const useUserStore = defineStore('user', {
    state: () => ({
      user: null,
      token: null
    }),
    setup() {
        const router = useRouter()
        return { router }
    },
    actions: {
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
            console.log("Hello")
            this.token = null
            this.user = null
            localStorage.removeItem('token')
        },
        refresh() {

        }
    }
})