import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/home/HomeView.vue'
import NotFound from '../components/NotFound.vue'
import AboutView from '../views/about/AboutView.vue'
import NewsView from '../views/news/NewsView.vue'
import NewsAbout from '../views/news/NewsAbout.vue'
import SpecialistsView from '../views/specialists/SpecialistsView.vue'
import MembershipRequest from '../views/specialists/MembershipRequest.vue'
import EducationRequest from '../views/specialists/EducationRequest.vue'
import PatientsView from '../views/patients/PatientsView.vue'
import LoginView from '../views/auth/LoginView.vue'
import AdminView from '../views/admin/AdminView.vue'
import AdminNewsList from '../views/admin/AdminNewsList.vue'
import AdminNewsAbout from '../views/admin/AdminNewsAbout.vue'
import AdminNewsAdd from '../views/admin/AdminNewsAdd.vue'
import AdminMembershipList from '../views/admin/AdminMembershipList.vue'
import AdminMembershipAbout from '../views/admin/AdminMembershipAbout.vue'


const routes = [
  {
    path: '/',
    name: 'HomeView',
    component: HomeView, 
    meta: {
      hideNavbar: false,
     }
    
  },
  {
    path: '/news/',
    name: 'NewsView',
    component: NewsView, 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/news/:id/', 
    name: 'NewsAbout',
    component: NewsAbout,
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/about/',
    redirect: '/about/us', 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/about/:id/',
    name: 'AboutView',
    component: AboutView, 
    meta: {
      hideNavbar: false,
     }
  },
  {
    path: '/specialists/:id/',
    name: 'SpecialistsView',
    component: SpecialistsView, 
    meta: {
      hideNavbar: false,
     }
  },
  {
    path: '/specialists/',
    redirect: '/specialists/membership/', 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/specialists/membership-request/',
    name: 'MembershipRequest',
    component: MembershipRequest, 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/specialists/education-request/',
    name: 'EducationRequest',
    component: EducationRequest, 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/patients/',
    redirect: '/patients/useful-info', 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/patients/:id/',
    name: 'PatientsView',
    component: PatientsView, 
    meta: {
      hideNavbar: false,
     }
  },
  {
    path: '/login/',
    name: 'LoginView',
    component: LoginView,
    meta: {
      hideNavbar: true,
     },
  }, 
  {
    path: '/admin',
    redirect: '/admin/dashboard', 
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard',
    name: 'AdminView',
    component: AdminView,
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard/news-list',
    name: 'AdminNewsList',
    component: AdminNewsList,
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard/news-list/:id/', 
    name: 'AdminNewsAbout',
    component: AdminNewsAbout,
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard/news-list/add-news',
    name: 'AdminNewsAdd',
    component: AdminNewsAdd,
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard/membership-list',
    name: 'AdminMembershipList',
    component: AdminMembershipList,
    meta: {
      hideNavbar: true,
     }
  }, 
  {
    path: '/admin/dashboard/membership-list/:id/', 
    name: 'AdminMembershipAbout',
    component: AdminMembershipAbout,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/:catchAll(.*)',
    name: "NotFound",
    component: NotFound,
  },
  

 /* {
    path: '/:pathMatch(.*)*',
    name: "NotFound",
    component: NotFound,
  }*/
]

const router = createRouter({
  history: createWebHistory('/'),
  routes, 
  scrollBehavior(to, from, savedPosition) {
    // always scroll to top
    return { top: 0 }
  },
})

export default router
