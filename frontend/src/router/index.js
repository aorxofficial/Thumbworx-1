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
    path: '/loginadmin',
    component: Login,
    meta: { requiresGuest: true, sidebar: false },
    name: 'LoginAdmin',
  },
  {   
    path: '/',
    component: DefaultLayout,
    children:[
      {
        path: '/dashboard',
        component: Dashboard,
        name: 'Dashboard',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: '/user-account',
        component: UserAccount,
        name: 'UserAccount',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: '/logs',
        component: Logs,
        name: 'Logs',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: '/user-details/:id',
        component: UserDetails,
        name: 'UserDetails',
        props: true,
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: '/revise-documents',
        component: ReviseDocuments,
        name: 'ReviseDocuments',
        meta: { requiresAdmin: true, sidebar: true },
      },
      {
        path: '/account-recover',
        component: AccountRecover,
        name: 'AccountRecover',
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
  const adminStore = useAdminStore()
  const user = adminStore.user 

  const requiresGuest = to.matched.some(record => record.meta.requiresGuest)
  const requiresAdmin = to.matched.some(record => record.meta.requiresAdmin)

  console.log("requires guest", requiresGuest)
  console.log("requires admin", requiresAdmin)
  console.log(user)
  
  next()
  // if (requiresGuest && user) {
  //     if (user.user_type == 'admin') {
  //       next({ name: "Dashboard" })
  //     } else {

  //     }
  // } else if (requiresAdmin && !user) {
  //   // next({ name: "Login"})
  // } else {
  //   next()
  // }
});

export default router;
