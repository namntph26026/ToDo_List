<template>
  <div class="container">
    <div class="content-area" style="position: relative">
      <div id="fullcalendar">
        <FullCalendar :options="calendarOptions" @dateClick="openModal" @eventClick="openModalEdit" />
      </div>
    </div>
    <div class="modal" id="myModaldate" style="margin-top: 5%">
      <div class="modal-dialog">
        <form action="" method="post" @submit.prevent="addTask">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Thêm task</h5>
              <button class="btn rounded-circle square-button">
                <i class="fas fa-question"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder="Task name"
                  style="font-weight: bold"
                  v-model="task_name_add"
                />
              </div>
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder="Description"
                  v-model="task_description_add"
                />
              </div>
              <div class="mb-3">
                <input
                  type="date"
                  class="form-control"
                  id=""
                  v-model="clickedDate"
                  
                />
              </div>
              <div class="mb-3">
                <select class="form-select" aria-label="Default select example" v-model="priority_add">
                  <option value="1" >Sự ưu tiên 1</option>
                  <option value="2">Sự ưu tiên 2</option>
                  <option value="3">Sự ưu tiên 3</option>
                </select>
              </div>
            </div>
            <div class="modal-footer" style="display: flex;justify-content: space-between;">
              <div class="mb-3">
                <select
                    class="form-select slec"
                    aria-label="Default select example"
                    style="border: none"
                    name="id_project"
                    id="id_project"
                    v-model="id_project_add"
                  >
                    <option value="" selected>INBOX</option>
                    <option
                      v-for="project in projects"
                      :key="project.id"
                      :value="project.id"
                     
                    >
                      {{ project.project_name }}
                    </option>
                  </select>
              </div>
              <div>
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
          </div>
        </form>
      </div>
    </div>
    <div class="modal" id="myModaldateEdit" style="margin-top: 5%">
      <div class="modal-dialog">
        <form action="" method="post" @submit.prevent="updateTask">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">UPDATE task</h5>
              <button class="btn rounded-circle square-button">
                <i class="fas fa-question"></i>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="" id="idtask_edit" v-model="id_task" >
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder="Task name"
                  style="font-weight: bold"
                  v-model="task_name"
                />
              </div>
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder="Description"
                  v-model="task_description"
                />
              </div>
              <div class="mb-3">
                <input
                  type="date"
                  class="form-control"
                  id=""
                  v-model="clickedDate_edit"
                  
                />
              </div>
              <div class="mb-3">
                <select class="form-select" aria-label="Default select example" v-model="priority">
                  <option value="1" >Sự ưu tiên 1</option>
                  <option value="2">Sự ưu tiên 2</option>
                  <option value="3">Sự ưu tiên 3</option>
                </select>
              </div>
            </div>
            <div class="modal-footer" style="display: flex;justify-content: space-between;">
              <div class="mb-3">
                <select
                    class="form-select slec"
                    aria-label="Default select example"
                    style="border: none"
                    name="id_project"
                    id="id_project"
                    v-model="id_project"
                  >
                    <option value="" selected>INBOX</option>
                    <option
                      v-for="project in projects"
                      :key="project.id"
                      :value="project.id"
                     
                    >
                      {{ project.project_name }}
                    </option>
                  </select>
              </div>
              <div>
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
                Cật nhật
              </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref,reactive,toRefs } from "vue";
import axios from "axios";
import { message } from "ant-design-vue";
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

export default defineComponent({
  components: {
    FullCalendar,
  },
  setup() {
    const open = ref(false);
    const clickedDate = ref(null);
    const projects = ref([]);
    const taskadd = reactive({
    task_name_add: "",
    task_description_add: "",
    clickedDate: "",
    priority_add: 1,
    id_project_add: "",
    });
    const taskedit = reactive({
    id_task: "",
    task_name: "",
    task_description: "",
    clickedDate_edit: "",
    priority: 1,
    id_project: "",
    });
    
    // const handleDateClick = (arg) => {
    //   open.value = true;
    //   clickedDate.value = arg.dateStr;
    //   console.log(arg.dateStr);
    // };
    function openModal(arg) {
      const myModal = new bootstrap.Modal(
        document.getElementById("myModaldate")
      );
      myModal.show();
      taskadd.clickedDate = arg.dateStr;
      console.log(arg.dateStr);
    }
    
    function openModalEdit(arg) {
      const myModal = new bootstrap.Modal(
        document.getElementById("myModaldateEdit")
      );
      myModal.show();
      console.log(arg.event);
      taskedit.id_task = arg.event._def.extendedProps.id_task;
      taskedit.task_name = arg.event._def.title;
      taskedit.task_description = arg.event._def.extendedProps.description;
      taskedit.clickedDate_edit = arg.event._def.extendedProps.deadline;
      taskedit.priority = arg.event._def.extendedProps.priority;
      if(!arg.event._def.extendedProps.id_project){
        taskedit.id_project = "";
      }else{
         taskedit.id_project = arg.event._def.extendedProps.id_project;
      }
     

       
      // taskadd.clickedDate = arg.dateStr;
      // console.log(arg.dateStr);
    }

    // const deltask = (arg) => {
    //   console.log(arg.event);
    // }
    const calendarOptions = ref({
      plugins: [dayGridPlugin, interactionPlugin], // Sử dụng plugin interactionPlugin
      initialView: "dayGridMonth",
      events: [],
      dateClick: openModal,
      eventClick: openModalEdit,
    });

    const listtaskcalendar = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/listtask", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          const events = response.data.data.map((task) => ({
            id_task: task.id,
            title: task.task_name,
            date: task.deadline,
            description: task.task_description,
            priority: task.priority,
            deadline: task.deadline,
            id_project: task.id_project
          }));

          calendarOptions.value.events = events;
        })
    };

    listtaskcalendar();

    const getProject = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/project", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          projects.value = response.data.data;
        });
    };
    getProject();

    const addTask = () => {
      const token = localStorage.getItem("token");
        const formData = new FormData();
        formData.append("task_name", taskadd.task_name_add);
        formData.append("task_description", taskadd.task_description_add);
        formData.append("deadline", taskadd.clickedDate);
        formData.append("priority", taskadd.priority_add);
        formData.append("id_project", taskadd.id_project_add);
        axios
          .post("http://127.0.0.1:8000/api/task", formData, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          })
          .then((response) => {
            if (response) {
              message.success("Thêm task thành công !!");

              listtaskcalendar();
              // router.push({ name: "backend-today" });

              taskadd.task_name_add = "";
              taskadd.task_description_add = "";
              taskadd.priority_add = 1;
              taskadd.id_project_add = "";
            }
          })
          .catch((error) => {
            console.log(error);
          });
    };

    const updateTask = () => {
      const token = localStorage.getItem("token");
      let taskId = $("#idtask_edit").val();
      axios
        .put(`http://127.0.0.1:8000/api/task/${taskId}`, taskedit, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            message.success("update task thành công!");
            listtaskcalendar();
            
            // getProjectFavorites();
            // router.push({ name: "backend-app" });
          }
        });
    };


    const handleOk = (e) => {
      console.log(e);
      open.value = false;
    };

   

    return {
      open,
      clickedDate,
      calendarOptions,
      openModal,
      openModalEdit,
      handleOk,
      projects,
      ...toRefs(taskadd),
      addTask,
      ...toRefs(taskedit),
      updateTask
    };
  },
});
</script>

<style scoped>
#fullcalendar {
  width: 90%;
  margin: 5%;
}
</style>
