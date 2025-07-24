import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            redirect: {name: 'projects'}
        },
        {
            path: '/projects',
            component: () => import('@/components/projects/MyProjectsComponent.vue'),
            name: 'projects'
        }
    ]
})


export default router
