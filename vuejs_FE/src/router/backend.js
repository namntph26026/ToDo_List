const backend = [
    {
        path: "/backend",
        component: () => import("../layouts/backend.vue"),
        children : [
            {
                path : "app",
                name : "backend-app",
                component: () => import("../pages/backend/app.vue"),
            },
            {
                path : "app/:id/edit",
                name : "backend-app-edit",
                component: () => import("../pages/backend/app.vue"),
            },
            {
                path : "app/:id/deltail",
                name : "backend-app-deltail",
                component: () => import("../pages/backend/app.vue"),
            },
            {
                path : "app/deltail/:secondId",
                name : "backend-app-deltail-search",
                component: () => import("../pages/backend/app.vue"),
                props: (route) => ({ secondId: route.params.secondId})
            },
            {
                path : "app/:id/deltailProject",
                name : "backend-app-deltail-project",
                component: () => import("../pages/backend/deltail.vue"),
            },
            {
                // path : "app/:iddeltail/deltailProject1",
                path : "app/:id/deltailProject/:iddeltail/task",
                name : "backend-deltail-deltail",
                component: () => import("../pages/backend/deltail.vue"),
            },

            // today
            {
                path : "today",
                name : "backend-today",
                component: () => import("../pages/backend/today.vue"),
            },
            {
                path : "today/:id/deltail",
                name : "backend-today-deltail",
                component: () => import("../pages/backend/today.vue"),
            },

            // search

            {
                path: "search",
                name: "backend-search",
                component: () => import("../pages/backend/search.vue"),
                props: (route) => ({ query: route.query.query })
            },
            {
                path: "search/:id/deltail",
                name: "backend-search-deltail",
                component: () => import("../pages/backend/search.vue"),
                props: (route) => ({ query: route.query.query })
            },
            {
                path: "search/:id/deltail/:secondId",
                name: "backend-search-deltail-task",
                component: () => import("../pages/backend/deltail.vue"),
                props: (route) => ({ id: route.params.id, secondId: route.params.secondId, query: route.query.query })
            },

            //comming
            {
                path : "comming",
                name : "backend-comming",
                component: () => import("../pages/backend/comming.vue"),
            },

            {
                path : "infor",
                name : "backend-infor",
                component: () => import("../pages/backend/inforuser.vue"),
            },

        ]
    }
];
export default  backend;