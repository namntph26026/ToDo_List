import {createRouter, createWebHistory } from 'vue-router' ;
import frontend from './frontend.js'
import backend from './backend.js'

const routes = [...frontend,...backend];

const router = createRouter({
    history: createWebHistory(),
    routes
})
router.beforeEach((to, from, next) => {
    const isLoggedIn = !!localStorage.getItem('token'); // Kiểm tra xem token có tồn tại hay không
  
    if (to.meta.requiresAuth && !isLoggedIn) {
      next('/login'); // Chuyển hướng người dùng về trang đăng nhập nếu chưa đăng nhập
    } else if (to.meta.requiresGuest && isLoggedIn) {
        next('/backend/app');// Chuyển hướng người dùng về trang dashboard nếu đã đăng nhập
    } else {
      next(); // Cho phép truy cập bình thường
    }
  });
export default router;