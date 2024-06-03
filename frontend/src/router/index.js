import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/super-admin/Dashboard.vue';
import UserAccount from '../views/super-admin/UserAccount.vue';
import UserDetails from '../views/super-admin/UserDetails.vue';
import ReviseDocuments from '../views/super-admin/ReviseDocuments.vue';
import Logs from '../views/super-admin/Logs.vue';
import Login from '../views/super-admin/Login.vue';
import AccountRecover from '../views/super-admin/AccountRecover.vue';
import LandingPage from '../views/super-admin/LandingPage.vue';
import Header from '../views/super-admin/Header.vue';
import DefaultLayout from '../layouts/DefaultLayout.vue';
import Logins from '../views/main/Login-main.vue';
import Registration from '../views/main/Registration.vue';


const routes = [
  {
    path: '/login',
    component: Login,
    meta: { requiresAuth:false, sidebar: false },
    name: 'Login',
  },
  {
    path: '/registration',
    component: Registration,
    meta: { sidebar: false },
    name: 'Registration',
  },
  {
    path: '/',
    component: DefaultLayout,
    children: [
      {
        path: 'dashboard',
        component: Dashboard,
        name: 'Dashboard',
        meta: { requiresAuth: false, sidebar: true },
      },
      {
        path: 'user-account',
        component: UserAccount,
        name: 'UserAccount',
        meta: { requiresAuth: true, sidebar: true },
      },
      {
        path: 'logs',
        component: Logs,
        name: 'Logs',
        meta: { requiresAuth: true, sidebar: true },
      },
      {
        path: 'user-details/:id',
        component: UserDetails,
        name: 'UserDetails',
        props: true,
        meta: { requiresAuth: true, sidebar: true },
      },
      {
        path: 'revise-documents',
        component: ReviseDocuments,
        name: 'ReviseDocuments',
        meta: { requiresAuth: true, sidebar: true },
      },
      {
        path: 'account-recover',
        component: AccountRecover,
        name: 'AccountRecover',
        meta: { requiresAuth: false, sidebar: true },
      },
      {
        path: 'landing-page',
        component: LandingPage,
        name: 'LandingPage',
        meta: { requiresAuth: false, sidebar: false },
      },
      {
        path: 'header',
        component: Header,
        name: 'Header',
        meta: { requiresAuth: false, sidebar: true },
      },
      {
        path: 'logins',
        component: Logins,
        meta: { sidebar: false },
        name: 'Logins',
      }
        ],
  },
  {
    path: '/:catchAll(.*)',
    redirect: '/login',
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});
router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('token');
  const userType = localStorage.getItem('userType'); // Assuming userType is stored in localStorage

  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!isAuthenticated) {
      next({ name: 'Login' });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;