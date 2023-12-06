const frontend = [
    {
        path: "",
        component: () => import("../layouts/frontend.vue"),
        children : [
            {
                path : "",
                name : "frontend-home",
                component: () => import("../pages/frontend/home.vue"),
                meta: { requiresGuest: true }
            },
            {
                path : "login",
                name : "frontend-login",
                component: () => import("../pages/frontend/login.vue"),
                meta: { requiresGuest: true }
            },
            {
                path : "register",
                name : "frontend-register",
                component: () => import("../pages/frontend/register.vue"),
                meta: { requiresGuest: true }
            },

            {
                path : "forgotpassword",
                name : "frontend-forgotpassword",
                component: () => import("../pages/frontend/Forgotpassword.vue"),
                meta: { requiresGuest: true }
            }

        ]
    }
];

export default  frontend;