<template>
  <div class="vertical-menu" :class="{ abc: expanded }">
    <nav class="nav flex-column">
      <router-link
        :to="{
          name: 'backend-app',
        }"
      >
        <a class="nav-link active" style="display: flex;justify-content: space-between;">
          <div>
            <i class="fas fa-inbox"></i>
            <span id="countinbox">Inbox</span>
          </div>
          <div>
            <span id="record-count">{{ projectInboxTaskCounts.task_count }}</span> 
          </div>
          </a>
      </router-link>

      <router-link
        :to="{
          name: 'backend-today',
        }"
      >
        <a class="nav-link" style="display: flex; justify-content: space-between;">
          <div>
            <i class="fas fa-calendar-week"></i>
            <span class="">Today</span>
          </div>
          <div>
            <span>{{ projectTodayTaskCounts.task_count }}</span>
          </div>
        </a>
      </router-link>
      <router-link
        :to="{
          name: 'backend-comming',
        }"
      >
        <a class="nav-link" href="#"
          ><i class="fas fa-calendar-alt"></i>Shortly</a
        >
      </router-link>
      <a class="nav-link" href="#"
        ><i class="fas fa-shapes"></i>Filters and labels</a
      >
      <a class="nav-link pro" style="height: 45px;" :style="{ display: favoritesan }"
        ><span class="menupro">Favorites</span>
        <i
          class="fas fa-sort-down"
          :class="{ flipped: isFlipped }"
          @click="toggleFlipped"
        ></i
      ></a>
      <div
        class="listpro favorites"
        id="listproject_favorites"
        style="
          display: block;
          justify-content: space-between;
          padding-right: 10px;
          flex-direction: column;
        "
        :style="{ display: favoritesDisplay }"
      >
        <div
          class="project-favorite"
          v-for="projectFavoritesTaskCount in projectFavoritesTaskCounts"
          :key="projectFavoritesTaskCount.project.id"
        >
          <a class="nav-link" href="">
            <span class="count1"
              >{{ projectFavoritesTaskCount.project.project_name }} 
              (<span>{{ projectFavoritesTaskCount.task_count }}</span>)
            </span
            >
          </a>
          <div>
            <!-- <button
              type="button"
              class="btn btndue open-modal-btn editbutton"
              data-bs-target="#myModal1"
              data-id=""
            >
              <a><i class="fa-solid fa-pen"></i></a>
            </button> -->
            <button
              type="button"
              class="btn btndue remove_favorite"
              data-bs-target="#myModal5"
              data-id=""
            >
              <a @click="removeFav(projectFavoritesTaskCount.project.id)"
                ><i class="fa-solid fa-trash"></i
              ></a>
            </button>
          </div>
        </div>
      </div>
      <a class="nav-link pro" style="height: 45px"
        ><span class="menupro">Projects</span
        ><i class="fas fa-plus" id="openModalBtn" @click="openModal"></i
        ><i
          class="fas fa-sort-down fa-sort-down1"
          :class="{ flipped: isFlipped1 }"
          @click="toggleProjecta"
        ></i
      ></a>
      <div
        class="projecta"
        style="display: block"
        :style="{ display: projectaDisplay }"
        v-for="projectTaskCount in projectTaskCounts"
        :key="projectTaskCount.project.id"
      >
        <div class="listpro">
          <a href="">
            <router-link
              :to="{
                name: 'backend-app-deltail-project',
                params: { id: projectTaskCount.project.id },
              }"
            >
              <a class="nav-link" href="">
                <!-- <input type="hidden" :value="project.id" id="id_project_count"> -->
                <span class="count1">
                  {{ projectTaskCount.project.project_name }}
                  (<span>{{ projectTaskCount.task_count }}</span>)
                  </span
                >
              </a>
            </router-link>
          </a>
          <div>
            <!-- <router-link
              :to="{ name: 'backend-app-edit', params: { id: project.id } }"
            > -->
            <a href="javascript:void(0)" @click="geteditProject(projectTaskCount.project.id)">
              <button
                type="button"
                class="btn btndue open-modal-btn editbutton"
                data-bs-target="#myModal1"
                data-id=""
                @click="openModal1"
              >
                <a><i class="fa-solid fa-pen"></i></a>
              </button>
            </a>
            <!-- </router-link> -->

            <button type="button" class="btn btndue">
              <a href="javascript:void(0)" @click="delProject(projectTaskCount.project.id)">
                <i class="fa-solid fa-trash"></i>
              </a>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="modal" id="myModal" style="margin-top: 5%">
    <div class="modal-dialog">
      <form action="" method="post" @submit.prevent="addproject()">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add project</h5>
            <button class="btn rounded-circle square-button">
              <i class="fas fa-question"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700">Name</label>
              <input
                type="text"
                class="form-control"
                id=""
                name="project_name"
                v-model="project_name_1"
                @input="updateButtonColor"
              />
              <span>{{ project_name_1_error }}</span>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700"
                >Workspace</label
              >
              <select
                class="form-select"
                aria-label="Default select example"
                name="project_workspace"
                v-model="project_workspace_1"
              >
                <option value="1">Riêng tư</option>
                <option value="2">Cộng đồng</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700"
                >Add to favorites</label
              >
              <select
                class="form-select"
                aria-label="Default select example"
                name="project_favorites"
                v-model="project_favorites_1"
              >
                <option value="1">Có</option>
                <option value="2">Không</option>
              </select>
            </div>
            <p style="font-size: 0.9rem">
              View is synced between teammates in shared projects.
              <span style="color: red">Learn more.</span>
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="btn btn-danger addproject"
              :style="{ background: btnaddproject }"
            >
              Add
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="modal" id="myModal1" style="margin-top: 5%">
    <div class="modal-dialog">
      <form
        action=""
        method="post"
        id="editProjectForm"
        @submit.prevent="updateProject()"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">UPdate project</h5>
            <button class="btn rounded-circle square-button">
              <i class="fas fa-question"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <input
                type="hidden"
                class="form-control"
                id="idproject_edit"
                v-model="id_project"
              />
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700">Name</label>
              <input
                type="text"
                class="form-control"
                id="project_name"
                v-model="project_name"
              />
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700"
                >Workspace</label
              >
              <select
                class="form-select"
                aria-label="Default select example"
                id="project_workspace"
                v-model="project_workspace"
              >
                <option value="1">Riêng tư</option>
                <option value="2">Cộng đồng</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700"
                >Add to favorites</label
              >
              <select
                class="form-select"
                aria-label="Default select example"
                id="project_favorites"
                v-model="project_favorites"
              >
                <option value="1">Có</option>
                <option value="2">Không</option>
              </select>
            </div>

            <p style="font-size: 0.9rem">
              View is synced between teammates in shared projects.
              <span style="color: red">Learn more.</span>
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button type="submit" class="btn btn-danger">UPdate</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { defineComponent, reactive, ref, toRefs, onMounted,watchEffect } from "vue";
import axios from "axios";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
export default defineComponent({
  setup() {
    const router = useRouter();
    const route = useRoute();
    const plusIconDisplay = ref("none");
    const isFlipped = ref(false);
    const favoritesDisplay = ref("block");
    const isFlipped1 = ref(false);
    const projectaDisplay = ref("block");
    const projects = ref([]);
    const projectTaskCounts = ref([]);
    const projectFavoritesTaskCounts = ref([]);
    const projectInboxTaskCounts = ref([]);
    const projectTodayTaskCounts = ref([]);
    const projectDeltail = ref([]);
    const projects_favo = ref([]);
    const project_name_1_error = ref("");
    const btnaddproject = ref("#EDA59E");
    const favoritesan = ref("");
    // const project_workspace = ref([]);
    // const project_favorites = ref([])

    const projectadd = reactive({
      project_name_1: "",
      project_workspace_1: 1,
      project_favorites_1: 1,
    });

    const projectedit = reactive({
      id_project: "",
      project_name: "",
      project_workspace: 1,
      project_favorites: 1,
    });

    // const projectRemoveFavo = reactive({
    //   project_favorites: 1,
    // });
    const errors = ref({});
    function showPlusIcon() {
      plusIconDisplay.value = "inline-block";
    }

    function hidePlusIcon() {
      plusIconDisplay.value = "none";
    }

    function toggleFlipped() {
      isFlipped.value = !isFlipped.value;
      favoritesDisplay.value =
        favoritesDisplay.value === "block" ? "none" : "block";
    }

    function openModal() {
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
    }

    function openModal1() {
      const myModal = new bootstrap.Modal(document.getElementById("myModal1"));
      myModal.show();
    }

    function toggleProjecta() {
      isFlipped1.value = !isFlipped1.value;
      projectaDisplay.value =
        projectaDisplay.value === "block" ? "none" : "block";
    }
    const getProject = () => {
      const token = localStorage.getItem("token");
      if (token) {
        axios
          .get("http://127.0.0.1:8000/api/project", {
            headers: {
              Authorization: `Bearer ${token}`, // Thêm token vào header Authorization
            },
          })
          .then((response) => {
            projects.value = response.data.data;
            // console.log(response);
          });
      } else {
        router.push({ name: "frontend-login" });
      }
    };
    getProject();

    // const getProjectFavorites = () => {
    //   const token = localStorage.getItem("token");
    //   axios
    //     .get("http://127.0.0.1:8000/api/project_favorites", {
    //       headers: {
    //         Authorization: `Bearer ${token}`,
    //       },
    //     })
    //     .then((response) => {
    //       console.log(response);
    //       projects_favo.value = response.data.data;
    //     });
    // };
    // getProjectFavorites();

    const removeFav = (ProjectFavoId) => {
      const token = localStorage.getItem("token");
      let formData = {
        project_favorites: 2,
      };
      axios
        .put(`http://127.0.0.1:8000/api/project/${ProjectFavoId}`, formData, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            message.success("Xóa khỏi Favo thành công !!");
           fetchProjectFavoritesTaskCounts();
            // router.push({ name: "backend-app" });
          }
        });
    };
    const addproject = () => {
      const token = localStorage.getItem("token");
      if (validateproject()) {
        const formData = new FormData();
        formData.append("project_name", projectadd.project_name_1);
        formData.append("project_workspace", projectadd.project_workspace_1);
        formData.append("project_favorites", projectadd.project_favorites_1);
        axios
          .post("http://127.0.0.1:8000/api/project", formData, {
            headers: {
              Authorization: `Bearer ${token}`, // Thêm token vào header Authorization
            },
          })
          .then((response) => {
            if (response) {
              // location.reload();
              message.success("Thêm project thành công!");
              fetchProjectTaskCounts();
              fetchProjectFavoritesTaskCounts();
              alert("Thêm thành công!!")
              // router.push({ name: "backend-app" });
              projectadd.project_name_1 = "";
              projectadd.project_workspace_1 = 1;
              projectadd.project_favorites_1 = 1;
            }
          });
      }
    };

    const geteditProject = (projectID) => {
      const token = localStorage.getItem("token");
      // const projectID = `${route.params.id}`
      axios
        .get(`http://127.0.0.1:8000/api/project/${projectID}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          // console.log(response);
          if (response) {
            projectedit.id_project = response.data.id;
            projectedit.project_name = response.data.project_name;
            projectedit.project_workspace = response.data.project_workspace;
            projectedit.project_favorites = response.data.project_favorites;
          }

          // router.push({name: "backend-app-edit"})
          // location.reload();
        })
        .catch((error) => {
          console.log(error);
        });
    };

    const updateProject = () => {
      const token = localStorage.getItem("token");
      let projectId = $("#idproject_edit").val();
      axios
        .put(`http://127.0.0.1:8000/api/project/${projectId}`, projectedit, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            message.success("update project thành công!");
            fetchProjectTaskCounts();
            fetchProjectFavoritesTaskCounts();
            // router.push({ name: "backend-app" });
          }
        });
    };

    const delProject = (id_project) => {
      const token = localStorage.getItem("token");
      if (confirm("Bạn có chắc chắn muốn xóa project này?")) {
        axios
          .delete(`http://127.0.0.1:8000/api/project/${id_project}`, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          })
          .then((response) => {
            if (response) {
              message.success("Xóa project thành công !!");
              fetchProjectTaskCounts();
              fetchProjectFavoritesTaskCounts();
            }
          });
      }
    };

    // const deltailProject = (deltailProjectId) => {
    //   const token = sessionStorage.getItem("token");
    //   axios
    //     .get(`http://127.0.0.1:8000/api/project/${deltailProjectId}`,{
    //       headers: {
    //         Authorization: `Bearer ${token}`,
    //       },
    //     })
    //     .then((response)=>{
    //       console.log(response);
    //       projectDeltail.value = response.data.data
    //     })
    // };

    //đêm task theo id_project


    const fetchProjectTaskCounts = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/projects/task-count", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          projectTaskCounts.value = response.data.project_task_counts;
          console.log(response.data.project_task_counts);
        })
        .catch((error) => {
          console.log(error);
        });
    };

    onMounted(fetchProjectTaskCounts);

    const fetchProjectFavoritesTaskCounts = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/projectsfarorites/task-count", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
            projectFavoritesTaskCounts.value = response.data.project_task_favorites_counts;
            console.log(response.data.project_task_favorites_counts.length);
          console.log(response);
            if(response.data.project_task_favorites_counts.length===0){
              favoritesan.value = "none"
            }else{
              favoritesan.value = "block"
            }
            
          
        })
        .catch((error) => {
          console.log(error);
        });
    };
    onMounted(fetchProjectFavoritesTaskCounts);

    const fetchProjectInboxTaskCounts = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/projects/inbox/task-count", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          projectInboxTaskCounts.value = response.data;
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    };

    onMounted(fetchProjectInboxTaskCounts);

    const fetchProjectTodayTaskCounts = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/projects/today/task-count", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          projectTodayTaskCounts.value = response.data;
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    };

    onMounted(fetchProjectTodayTaskCounts);

    // validate form
    const updateButtonColor = () => {
      if (projectadd.project_name_1.trim() === "") {
        btnaddproject.value = "#EDA59E";
      } else {
        btnaddproject.value = "#DC3545";
      }
    };
    const validateproject = () => {
      if (projectadd.project_name_1.trim() === "") {
        // project_name_1_error.value = 'Bạn cần nhập project_name';
        return false;
      }

      project_name_1_error.value = "";
      return true;
    };
    // watchEffect(() => {
      // onMounted(fetchProjectFavoritesTaskCounts);
      // onMounted(fetchProjectTaskCounts);
    // });
    return {
      projects,
      projects_favo,
      plusIconDisplay,
      isFlipped,
      favoritesDisplay,
      favoritesan,
      isFlipped1,
      projectaDisplay,
      showPlusIcon,
      hidePlusIcon,
      toggleFlipped,
      openModal,
      openModal1,
      toggleProjecta,
      projectDeltail,
      // deltailProject,
      // thêm project
      errors,
      ...toRefs(projectadd),
      addproject,
      project_name_1_error,
      btnaddproject,
      updateButtonColor,

      ...toRefs(projectedit),
      geteditProject,

      updateProject,
      // ...toRefs(projectRemoveFavo),
      removeFav,
      delProject,
      projectTaskCounts,
      projectFavoritesTaskCounts,
      projectInboxTaskCounts,
      projectTodayTaskCounts
    };
  },
});
// const projectDeltail = ref([]);
// export const deltailProject = (deltailProjectId) => {
//   // Logic của hàm deltailProject
//   const token = sessionStorage.getItem("token");
//   axios
//     .get(`http://127.0.0.1:8000/api/project/${deltailProjectId}`, {
//       headers: {
//         Authorization: `Bearer ${token}`,
//       },
//     })
//     .then((response) => {
//       console.log(response);
//       projectDeltail.value = response.data.data;
//     });
//   return {
//     projectDeltail,
//   };
// };
</script>

<style scoped>
.addproject {
  border: none;
}
.vertical-menu {
  min-height: 110%;
  /* height: 100%; */

  width: 30%;

  background-color: #f8f9fa;

  padding-top: 20px;
}

.vertical-menu .nav-link {
  padding: 10px;

  color: #000;
}

.vertical-menu .nav-link:hover {
  background-color: #e9ecef;
}

.vertical-menu .nav-link.active {
  background-color: #eeeeee;
  color: black;
}

.content-area {
  height: 100vh;
  padding: 20px;
}

.form-control {
  background: none !important;
  /* color: white !important; */
  height: 87%;
}

form[role="search"] input::-webkit-input-placeholder {
  color: white;
}

form[role="search"] input::-moz-placeholder {
  color: white;
}

form[role="search"] input::-ms-input-placeholder {
  color: white;
}

form[role="search"] input::placeholder {
  color: white;
}

.fa-inbox {
  font-size: 1.5rem;
  color: #72a1e9 !important;
}

a.nav-link i {
  margin-right: 10px;
}

.fa-calendar-week {
  font-size: 1.5rem;
  color: #4b9244 !important;
}

.fa-calendar-alt {
  font-size: 1.5rem;
  color: #6a2fc2 !important;
}

.fa-shapes {
  font-size: 1.5rem;
  color: #d6a05a !important;
}

.nav-link {
  display: flex;
  align-items: center;
}

.nav-link .menupro {
  margin-right: 60%;
  width: 10%;
  font-weight: 600;
  font-size: 1.2rem;
}

.pro i {
  margin-left: auto;
}

.pro {
  display: flex;
  align-items: center;
  position: relative;
}

.pro i {
  display: none;
  margin-left: 5px;
}

.pro:hover i {
  display: inline-block;
}

.pro {
  display: flex;
  align-items: center;
  position: relative;
}

.pro .fa-sort-down {
  transition: transform 0.3s ease;
}

.pro .flipped {
  transform: rotate(90deg);
}

#imglist {
  /* margin-left: 85%; */
  border-radius: 50%;
}

#imglist2 {
  /* margin-right: 85%; */
  border-radius: 50%;
}

.btndue:hover {
  background-color: transparent !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

.btndue {
  margin-left: 10px;
  border: 1px solid #e6e6e6 !important;
}

.btndue {
  border: none !important;
}

/* Bỏ hiệu ứng hover */
.btndue:hover {
  background-color: #f5f5f5 !important;
  color: black;
  /*Thêm các thuộc tính khác nếu cần*/
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}
hr {
  border: none;
  height: 1px;
  background-color: #cac9c9;
  margin: 4px 0;
}

.listpro {
  display: flex;
  justify-content: space-between;
  padding-right: 10px;
}
.listpro:hover {
  background-color: #e9ecef;
}

.project-favorite {
  display: flex;
  justify-content: space-between;
  padding-right: 10px;
  margin-bottom: 10px;
}
</style>
