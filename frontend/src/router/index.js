import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/super-admin/Dashboard.vue';
import DriverAccounts from '../views/super-admin/driver/DriverAccounts.vue';
import DriverDetails from '../views/super-admin/driver/DriverDetails.vue'; 
import ReviseDocuments from '../views/super-admin/ReviseDocuments.vue'; 
import DriverLogs from '../views/super-admin/driver/DriverLogs.vue';
import Login from '../views/super-admin/Login.vue';
import AccountRecover from '../views/super-admin/client/AccountRecover.vue';
import LandingPage from '../views/super-admin/LandingPage.vue';
import Header from '../views/super-admin/Header.vue';
import ClientAccounts from '../views/super-admin/client/ClientAccounts.vue';
import ClientDetails from '../views/super-admin/client/ClientDetails.vue'; 
import ClientLogs from '../views/super-admin/client/ClientLogs.vue';

import HelperAccounts from '../views/super-admin/helper/HelperAccounts.vue';
import HelperDetails from '../views/super-admin/helper/HelperDetails.vue';
import HelperLogs from '../views/super-admin/helper/HelperLogs.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/Header',
      component: Header,
      name: 'Header',
      meta: { requiresAuth: false }, // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/LandingPage',
      component: LandingPage,
      name: 'LandingPage',
      meta: { requiresAuth: false }, // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/Dashboard',
      component: Dashboard,
      name: 'Dashboard',
      meta: { requiresAuth: true }, // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/DriverAccounts', 
      component: DriverAccounts,
      name: 'DriverAccounts',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/DriverLogs',
      component: DriverLogs,
      name: 'DriverLogs',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },
    {
      path: '/DriverDetails/:id',
      component: DriverDetails,
      name: 'DriverDetails',
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

    {
      path: '/AccountRecover',
      component: AccountRecover,
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/ClientAccounts', 
      component: ClientAccounts,
      name: 'ClientAccounts',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/ClientDetails/:id',
      component: ClientDetails,
      name: 'ClientDetails',
      props: true, // Pass route params as props to UserDetails component
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/ClientLogs',
      component: ClientLogs,
      name: 'ClientLogs',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/HelperAccounts', 
      component: HelperAccounts,
      name: 'HelperAccounts',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/HelperDetails/:id',
      component: HelperDetails,
      name: 'HelperDetails',
      props: true, // Pass route params as props to UserDetails component
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
    },

    {
      path: '/HelperLogs',
      component: HelperLogs,
      name: 'HelperLogs',
      meta: { requiresAuth: true },  // Add this line of code para hindi maaccess kapag hindi naka-login.
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
