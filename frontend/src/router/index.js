import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/Dashboard.vue';
import UserAccount from '../views/UserAccount.vue';
import UserDetails from '../views/UserDetails.vue'; 
import ReviseDocuments from '../views/ReviseDocuments.vue'; 
import Logs from '../views/Logs.vue';
import Login from '../views/Login.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/Dashboard',
      component: Dashboard,
      name: 'Dashboard',
      meta: { requiresAuth: true }, // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/UserAccount', 
      component: UserAccount,
      name: 'UserAccount',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/Logs',
      component: Logs,
      name: 'Logs',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/UserDetails/:id',
      component: UserDetails,
      name: 'UserDetails',
      props: true, // Pass route params as props to UserDetails component
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/ReviseDocuments',
      component: ReviseDocuments,
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/Login', 
      component: Login,
      name: 'Login',
    },
  ],
});

// Route guard to check if the user is authenticated
router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('token');

  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (!isAuthenticated) {
      next({ name: 'Login' }); // Redirect unauthenticated users to login page
    } else {
      next(); // Proceed to the next route
    }
  } else {
    next(); // Proceed to the next route
  }
});

export default router;
