import { defineStore } from "pinia";
import axios from 'redaxios';
import { useRouter } from "vue-router";

export const useAdminStore = defineStore('user', {
    state: () => ({
      user: null,
      token: localStorage.getItem('token') || null,
      refreshTimeout: null,
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
        async refresh() {
            try {

                const response = await axios.post('http://127.0.0.1:8000/api/auth/admin/refresh', null, {
                    headers: {
                        "Authorization": `Bearer ${this.token}`
                    }
                })

                console.log(response)
                
                console.log("Received data ", response.data)
                const { token } = response.data
                this.token = token
                localStorage.setItem('token', token)
                console.log("refesh success", token)
            }
            catch (error) {
                console.log("An error occuredd while refreshing user token. ", error)
            }
        }
    }
})