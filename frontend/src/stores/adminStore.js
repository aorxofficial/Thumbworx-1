import { defineStore } from "pinia";
import axios from 'redaxios';
import { jwtDecode }from 'jwt-decode';

export const useAdminStore = defineStore('user', {
    state: () => ({
      user: null,
      token: localStorage.getItem('token') || null,
      refreshTimeout: null,
    }),
    actions: {
        async login(email, password) {
            const response = await axios.post('http://127.0.0.1:8000/api/auth/admin/login', {
                email,
                password
            })

            const { token } = response.data;
            this.token = token
            localStorage.setItem('token', token)

            this.router.push({ name: 'Dashboard' })
        },
        logout() {
            this.token = null
            this.user = null
            localStorage.removeItem('token')

            this.router.push({ name: 'Login' })
        },
        async refresh() {
            try {

                const response = await axios.post('http://127.0.0.1:8000/api/auth/admin/refresh', null, {
                    headers: {
                        "Authorization": `Bearer ${this.token}`
                    }
                })
                const { token } = response.data
                this.token = token
                localStorage.setItem('token', token)

                await this.checkTokenExpiryAndRefresh()
            }
            catch (error) {
                console.log("An error occuredd while refreshing user token. ", error)
            }
        },
        async checkTokenExpiryAndRefresh() {
            if (!this.token) return

            const currentTimeInSeconds = Math.floor(Date.now() / 1000)
            const decodedToken = jwtDecode(this.token)

            if (decodedToken.exp && currentTimeInSeconds + 120 >= decodedToken.exp) {
                console.log("Token about to expire")
                try {
                    console.log("Token near timeout. Updating...");
                    await this.refresh();
                    console.log("Token refreshed.");
                } catch (error) {
                    console.log('Token expired. Logging out...');
                    this.logout();
                }
            } else {
                const timeUntilExpiry = (decodedToken.exp * 1000) - Date.now() - 120 * 1000;
                console.log("Token refresh in ", Math.floor(timeUntilExpiry / 60000), " minutes. (", timeUntilExpiry, " )")
                
                if (this.refreshTimeout) {
                    clearTimeout(this.refreshTimeout);
                }

                this.refreshTimeout = setTimeout(() => {
                    this.checkTokenExpiryAndRefresh();
                }, timeUntilExpiry >  0 ? timeUntilExpiry : 0);
            }
        }
    },
})