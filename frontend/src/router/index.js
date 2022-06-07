import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Form from '../views/FormPage.vue'
import ShowAnswer from '../views/ShowAnswer.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/formpage/:id',
    name: 'Form',
    component: Form,
    props: true,
  },
  {
    path: '/showanswer/:id',
    name: 'Answer',
    component: ShowAnswer,
    props: true,
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router
