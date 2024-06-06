import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/admin/Dashboard.vue';
import UserAccount from '../views/admin/UserAccount.vue';
import UserDetails from '../views/admin/UserDetails.vue';
import ReviseDocuments from '../views/admin/ReviseDocuments.vue';
import Logs from '../views/admin/Logs.vue';
import AccountRecover from '../views/admin/AccountRecover.vue';
import LandingPage from '../views/homepage/LandingPage.vue';
import Registration from '../views/main/Registration.vue';
import LoginMain from '../views/main/Login-main.vue';
import Login from '../views/admin/Login.vue';
import DefaultLayout from '../layouts/DefaultLayout.vue';
import ClientAccount from '../views/admin/ClientAccount.vue';
import ClientBooking from '../views/admin/ClientBooking.vue';
import HelperAccount from '../views/admin/HelperAccount.vue';
import HelperBooking from '../views/admin/HelperBooking.vue';
import HelperLogs from '../views/admin/HelperLogs.vue';
import HelperRatings from '../views/admin/HelperRatings.vue';
import { useAdminStore } from '../stores/adminStore';

const routes = [
  {   
    path: '/landing-page',
    component: LandingPage,
    meta: { requiresGuest: true, sidebar: false },
    name: 'LandingPage',
  },
  {
    path: '/login',
    component: LoginMain,
    meta: { requiresGuest: true, sidebar: true },
    name: 'LoginMain',
  },
  {
    path: '/registration',
    component: Registration,
    meta: { requiresGuest: true, sidebar: true },
    name: 'Registration',
  },
  {   
    path: '/admin',
    component: DefaultLayout,
    children: [
      {
        path: 'login',
        component: Login,
        meta: { requiresGuest: true, sidebar: false },
        name: 'LoginAdmin',
      },
      {
        path: 'dashboard',
        component: Dashboard,
        name: 'Dashboard',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'useraccount',
        component: UserAccount,
        name: 'UserAccount',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'logs',
        component: Logs,
        name: 'Logs',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'userdetails/:id',
        component: UserDetails,
        name: 'UserDetails',
        props: true,
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'revisedocuments',
        component: ReviseDocuments,
        name: 'ReviseDocuments',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'accountrecover',
        component: AccountRecover,
        name: 'AccountRecover',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'clientaccount',
        component: ClientAccount,
        name: 'ClientAccount',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'clientbooking',
        component: ClientBooking,
        name: 'ClientBooking',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'helperaccount',
        component: HelperAccount,
        name: 'HelperAccount',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'helperlogs',
        component: HelperLogs,
        name: 'HelperLogs',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'helperratings',
        component: HelperRatings,
        name: 'HelperRatings',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: 'helperbooking',
        component: HelperBooking,
        name: 'HelperBooking',
        meta: { requiresAdmin: true, sidebar: true },
      },
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
  const adminStore = useAdminStore();
  const user = adminStore.user;
  console.log(user)

  const requiresGuest = to.matched.some(record => record.meta.requiresGuest);
  const requiresAdmin = to.matched.some(record => record.meta.requiresAdmin);

  console.log("requires guest", requiresGuest);
  console.log("requires admin", requiresAdmin);
  console.log(user);

  console.log(user?.user_type);
  
  if (requiresGuest && user) {
    if (user.user_type === 'admin') {
      next({ name: 'Dashboard' });
    } else {
      // Redirect to another appropriate route if user is not admin
      next({ name: 'LandingPage' });
    }
  } else if (requiresAdmin && (!user || user.user_type !== 'admin')) {
    next({ name: 'LoginAdmin' });
  } else {
    next();
  }
});

export default router;
