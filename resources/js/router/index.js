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
    path: '/about/:id/',
    name: 'AboutView',
    component: AboutView, 
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
    redirect: '/about/1', 
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
    redirect: '/specialists/1/', 
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
    path: '/patients/:id/',
    name: 'PatientsView',
    component: PatientsView, 
    meta: {
      hideNavbar: false,
     }
  },
  {
    path: '/patients/',
    redirect: '/patients/1', 
    meta: {
      hideNavbar: false,
     }
  }, 
  {
    path: '/:pathMatch(.*)*',
    component: NotFound,
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes, 
  scrollBehavior(to, from, savedPosition) {
    // always scroll to top
    return { top: 0 }
  },
})

export default router
