<template>
  <div class="container" style="text-align: center">
    <div class="content-area" style="position: relative">
      <div class="grid-container">
        <div class="column"></div>
        <div
          class="column"
          style="display: flex; justify-content: space-between"
        >
          <p class="pin">Inbox <span id="countinbox"></span></p>
          <div>
            <button type="button" class="btn btndue">
              <i class="fas fa-sliders-h"></i><span class="spandue">View</span>
            </button>
            <button type="button" class="btn btndue">
              <i class="far fa-comment-alt"></i
              ><span class="spandue">Comments</span>
            </button>
            <button type="button" class="btn btndue">
              <i class="fas fa-ellipsis-h"></i>
            </button>
          </div>
        </div>
        <div class="column"></div>
      </div>
      <div class="grid-container">
        <div class="column"></div>
        <div class="column">
          <div
            class="form-check form-check-inline"
            id="listtasktoday"
            style="
              display: flex;
              justify-content: space-between;
              padding-right: 10px;
              flex-direction: column;
            "
            v-for="task in tasks"
            :key="task.id"
          >
            <div class="project-favorite">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="flexCheckDefault"
                @click="complete(task.id)"
              />
              <a href="" @click="deltail(task.id)">
                <router-link
                  :to="{
                    name: 'backend-app-deltail',
                    params: { id: task.id },
                  }"
                >
                  <div class="detailtasktoday" data-id="" @click="openModal2()">
                    <label class="form-check-label" for="inlineCheckbox1"
                      ><h5>{{ task.task_name }}</h5> </label
                    ><br />
                    <p>{{ task.task_description }}</p>
                  </div>
                </router-link>
              </a>
              <div style="display: flex; margin-left: 60%">
                <a href="javascript:void(0)" @click="editTask(task.id)">
                  <button
                    type="button"
                    class="btn btndue btnedittask"
                    data-bs-target="#myModal2"
                    data-id=""
                    @click="toggleCard_eidt"
                  >
                    <a><i class="fa-solid fa-pen"></i></a></button
                  ><br /><br />
                </a>
                <a href="javascript:void(0)" @click="delTask(task.id)">
                  <button
                    type="button"
                    class="btn btndue btndeletetask"
                    data-bs-target="#myModal2"
                    data-id="'+task.id+'"
                  >
                    <a><i class="fa-solid fa-trash"></i></a></button
                  ><br /><br />
                </a>
              </div>
            </div>
            <hr />
          </div>
        </div>
      </div>
      <center><hr width="65%" /></center>
      <div class="grid-container">
        <div class="column"></div>
        <div class="column">
          <div
            class="box cardedit"
            style="display: none"
            :style="{ display: cardDisplay_edit }"
          >
            <form
              action=""
              id="edittaskform"
              method="POST"
              data-id=""
              @submit.prevent="updateTask()"
            >
              <div class="form1">
                <div class="mb-3">
                  <input
                    type="hidden"
                    id="id_task_edit"
                    name="id_task"
                    v-model="id_task1"
                  />
                  <input
                    type="text"
                    class="form-control inputtask"
                    placeholder="Task name"
                    style="font-weight: bold"
                    name="task_name"
                    id="name"
                    v-model="task_name"
                  />
                  <input
                    type="text"
                    class="form-control inputtask"
                    placeholder="Description"
                    name="task_description"
                    id="taskdescription"
                    v-model="task_description"
                  />

                  <div style="margin-left: -43%">
                    <button type="button" class="btn" style="width: 20%">
                      <span class="date-wrapper">
                        <input
                          type="date"
                          style="width: 100%"
                          name="deadline"
                          id="taskdeadline"
                          class="datepicker"
                          v-model="deadline"
                        />
                      </span>
                    </button>
                    <button type="button" class="btn" style="width: 20%">
                      <select
                        class="form-select"
                        aria-label="Default select example"
                        name="priority"
                        id="taskpriority"
                        v-model="priority"
                      >
                        <option value="1" selected>Sự ưu tiên 1</option>
                        <option value="2">Sự ưu tiên 2</option>
                        <option value="3">Sự ưu tiên 3</option>
                      </select>
                    </button>
                  </div>
                  <br />
                  <div style="display: flex; justify-content: space-between">
                    <button type="button" class="btn" style="width: 30%">
                      <select
                        class="form-select"
                        aria-label="Default select example"
                        id="idproject"
                        v-model="id_project"
                      >
                        <option value="">INBOX</option>
                        <option
                          v-for="project in projects"
                          :key="project.id"
                          :value="project.id"
                        >
                          {{ project.project_name }}
                        </option>
                      </select>
                    </button>
                    <div style="margin-top: 2%">
                      <button
                        type="button"
                        class="btn btn-secondary canceloff"
                        @click="toggleCard_eidt"
                      >
                        cancel
                      </button>
                      <button type="submit" class="btn btn-danger">
                        update
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="grid-container">
        <div class="column"></div>
        <div class="column" style="display: flex">
          <button type="button" class="btn btndue listtask" @click="toggleCard">
            <i class="fas fa-plus cong1"></i
            ><span style="margin-left: 5px">Add task</span>
          </button>
        </div>
        <div class="column"></div>
      </div>
      <div class="grid-container">
        <div class="column"></div>
        <div class="column">
          <form
            action=""
            method="post"
            id="addformtask"
            @submit.prevent="addTask()"
          >
            <div
              class="card mb-3"
              style="width: 100%; margin-top: -6%; display: none"
              :style="{ display: cardDisplay }"
            >
              <div class="card-body">
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control iptaskname"
                    placeholder="Task name"
                    style="font-weight: bold"
                    name="task_name"
                    id="task_name"
                    v-model="task_name_add"
                    @input="updatecolorbtn()"
                  />
                  <input
                    type="text"
                    class="form-control iptaskname"
                    placeholder="Description"
                    name="task_description"
                    id="task_description"
                    v-model="task_description_add"
                  />
                </div>
                <div class="mb-3" style="margin-left: -50%">
                  <button
                    type="button"
                    class="btn btndue"
                    style="width: 17%; margin-left: 5%"
                  >
                    <input
                      type="date"
                      style="width: 100%"
                      name="deadline"
                      id="deadline"
                      v-model="deadline_add"
                    />
                  </button>
                  <button type="button" class="btn btndue" style="width: 20%">
                    <select
                      class="form-select"
                      aria-label="Default select example"
                      name="priority"
                      id="priority"
                      v-model="priority_add"
                    >
                      <option value="1" selected>Sự ưu tiên 1</option>
                      <option value="2">Sự ưu tiên 2</option>
                      <option value="3">Sự ưu tiên 3</option>
                    </select>
                  </button>
                </div>
              </div>
              <div class="card-footer bg-transparent">
                <button type="button" class="btn btndue">
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
                </button>
                <div style="margin-top: 5px">
                  <button
                    type="button"
                    class="btn btn-secondary cancel"
                    @click="toggleCard"
                  >
                    Cancel
                  </button>
                  <button
                    type="submit"
                    class="btn btn-danger"
                    :style="{ background: btnaddtask }"
                    style="border: none"
                  >
                    Add task
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="column"></div>
      </div>
      <div class="grid-container todayabc" :style="{ display: todayabc }">
        <div class="column"></div>
        <div
          class="column"
          style="display: flex; justify-content: space-around"
        >
          <div>
            <img
              src="https://todoist.b-cdn.net/assets/images/c85c3d1811442a987adb401a5bd11814.jpg"
              srcset="
                https://todoist.b-cdn.net/assets/images/7bf32068f9c7d9914018a8b16be80ffb.jpg 2x,
                https://todoist.b-cdn.net/assets/images/cdc9dd785e3308510e0a89959e3daea4.jpg 3x
              "
            />
            <p class="pyour">Your peace of mind is priceless</p>
            <p class="pwell">
              Well done, {{ User.name }}! All your <br />
              team's tasks are organized in the right <br />
              place.
            </p>
            <br /><br /><br /><br /><br />
            <i class="far fa-question-circle" style="color: #dc4c3e"></i
            ><a href="" style="color: #dc4c3e; margin-left: 10px"
              >How to declutter your mind with the Inbox</a
            >
          </div>
        </div>
        <div class="column"></div>
      </div>
    </div>
  </div>
  <div class="modal" id="myModal2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">INBOX</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="grid-container1">
            <div class="column" style="padding: 15px">
              <form action="" method="post" id="edittaskformmodal">
                <div class="form-check">
                  <input type="hidden" id="id_task" name="id_task" />
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <div class="formboxtoday" @click="toggleActive">
                    <input
                      type="text"
                      class="form-control1 inputtasktoday"
                      placeholder="Task name"
                      style="font-weight: bold; margin-left: 7px"
                      name="task_name"
                      id="name1"
                      v-model="task_name_deltail"
                    />
                    <input
                      type="text"
                      class="form-control inputtasktoday"
                      placeholder="Description"
                      name="task_description"
                      id="taskdescription1"
                      v-model="task_description_deltail"
                    />
                  </div>
                </div>
                <div
                  style="float: right; margin-top: 5px"
                  class="btngrouptoday"
                  :class="{ active: isActive }"
                >
                  <button type="button" class="btn btn-secondary">Đóng</button>
                  <button type="button" class="btn btn-primary">Lưu</button>
                </div>
              </form>
              <hr style="margin-top: 60px" />
              <div
                v-for="comment in comments"
                :key="comment.id"
                class="comments-container"
              >
                <img
                  src="../../assets/images/avt.png"
                  style="border-radius: 50%"
                  width="10"
                />
                <div class="comment-info">
                  <div class="user-info">
                    <p class="user-name">{{ comment.user.name }}</p>
                    <p class="comment-date">{{ comment.created_at }}</p>
                  </div>

                  <div style="display: flex">
                    <p class="comment-text">{{ comment.comment_text }}</p>
                    <div style="display: flex">
                      <a href="javascript:void(0)" @click="toggleCard_comment">
                        <button
                          type="button"
                          class="btn"
                          data-id=""
                          @click="editComment(comment.id)"
                        >
                          <a><i class="fa-solid fa-pen aaa"></i></a></button
                        ><br /><br />
                      </a>
                      <a href="">
                        <button type="button" class="btn" data-id="'+task.id+'">
                          <a><i class="fa-solid fa-trash"></i></a></button
                        ><br /><br />
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div :style="{ display: cardDisplay_comment }">
                <form action="" method="POST" @submit.prevent="updateComment()">
                  <input
                    type="hidden"
                    name=""
                    id="id_comment_edit"
                    v-model="id"
                  />
                  <input type="hidden" name="" id="" v-model="id_task" />
                  <input
                    type="hidden"
                    name=""
                    id="id_user_edit"
                    v-model="id_user"
                  />
                  <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="2"
                    v-model="comment_text"
                  ></textarea>
                  <!-- <input type="text" name="" id="" > -->
                  <br />
                  <button type="submit" class="btn btn-primary">
                    Sửa comment
                  </button>
                </form>
              </div>
              <div @click="handleDocumentClick">
                <div
                  style="margin-top: 60px; display: flex"
                  class="commentan"
                  v-show="!commentFormVisible"
                >
                  <img
                    src="/backend/img/avt.png"
                    alt=""
                    width="35"
                    style="border-radius: 50%"
                  />
                  <button
                    type="button"
                    class="btn btncomment"
                    @click="showCommentForm"
                  >
                    <span style="float: left">Comment</span>
                  </button>
                </div>
                <div
                  class="formcomment"
                  style="display: none"
                  v-show="commentFormVisible"
                >
                  <form
                    action=""
                    method="post"
                    id="comment-form"
                    @submit.prevent="addComment()"
                  >
                    <div class="form-check">
                      <input
                        type="hidden"
                        class="form-control inputtasktoday"
                        placeholder=""
                        name="id_tasktoday"
                        id="id_tasktoday"
                      />
                      <div class="formboxtoday1">
                        <input
                          type="hidden"
                          name=""
                          id=""
                          v-model="id_task_add"
                        />
                        <textarea
                          name="comment_text"
                          id="comment-text"
                          cols="30"
                          rows="3"
                          class="inputtasktoday"
                          placeholder="Comment"
                          v-model="comment_text_add"
                        ></textarea>
                      </div>
                      <button
                        type="submit"
                        class="btn btn-danger"
                        style="margin-left: 80%; margin-top: 10px"
                      >
                        Comment
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="column" style="background-color: #fafafa">
              <div style="padding: 10px">
                <p class="titletoday">project</p>
                <button type="button" class="btn" style="width: 100%">
                  <select
                    class="form-select"
                    aria-label="Default select example"
                    id="idproject1"
                    v-model="id_project_deltail"
                  >
                    <option value="">INBOX</option>
                    <option
                      v-for="project in projects"
                      :key="project.id"
                      :value="project.id"
                    >
                      {{ project.project_name }}
                    </option>
                  </select>
                </button>
                <p class="titletoday">Due date</p>
                <button type="button" class="btn" style="width: 100%">
                  <span class="date-wrapper">
                    <input
                      type="date"
                      style="width: 100%"
                      name="deadline"
                      id="taskdeadline1"
                      class="datepicker"
                      v-model="deadline_deltail"
                    />
                  </span>
                </button>
                <p class="titletoday">Priority</p>
                <button type="button" class="btn" style="width: 100%">
                  <select
                    class="form-select"
                    aria-label="Default select example"
                    name="priority"
                    id="taskpriority1"
                    v-model="priority_deltail"
                  >
                    <option value="1" selected>Sự ưu tiên 1</option>
                    <option value="2">Sự ưu tiên 2</option>
                    <option value="3">Sự ưu tiên 3</option>
                  </select>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {
  defineComponent,
  reactive,
  ref,
  toRefs,
  onMounted,
  watch,
  watchEffect,
} from "vue";
import moment from "moment";
import axios from "axios";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
// import { deltailProject } from "../TheMenu";
export default defineComponent({
  setup() {
    const router = useRouter();
    const route = useRoute();
    const projects = ref([]);
    const tasks = ref([]);
    const comments = ref([]);
    const cardDisplay = ref("none");
    const todayabc = ref("block");
    const cardDisplay_edit = ref("none");
    const cardDisplay_comment = ref("none");
    const btnaddtask = ref("#EDA59E");

    const isActive = ref(false);
    const commentFormVisible = ref(false);
    const User = ref([]);

    const formatDate = () => {
      return moment(value * 1000).format("MM/DD/YYYY");
    };

    const toggleActive = () => {
      isActive.value = true;
    };

    const handleClickOutside = (event) => {
      if (!event.target.closest(".formboxtoday")) {
        isActive.value = false;
      }
    };

    onMounted(() => {
      document.addEventListener("mousedown", handleClickOutside);
    });
    function openModal2() {
      const myModal = new bootstrap.Modal(document.getElementById("myModal2"));
      myModal.show();
    }

    const showCommentForm = (event) => {
      commentFormVisible.value = true;
      cardDisplay_comment.value = "none";
      event.stopPropagation();
    };

    const handleDocumentClick = (event) => {
      const formcomment = document.querySelector(".formcomment");
      const commentan = document.querySelector(".commentan");
      if (!formcomment.contains(event.target)) {
        commentFormVisible.value = false;
        formcomment.style.display = "none";
        commentan.style.display = "block";
      }
    };

    const taskadd = reactive({
      task_name_add: "",
      task_description_add: "",
      deadline_add: "",
      priority_add: 1,
      id_project_add: "",
    });

    const taskedit = reactive({
      id_task1: "",
      task_name: "",
      task_description: "",
      deadline: "",
      priority: 1,
      id_project: "",
    });

    const taskedeltail = reactive({
      id_task_deltail: "",
      task_name_deltail: "",
      task_description_deltail: "",
      deadline_deltail: "",
      priority_deltail: 1,
      id_project_deltail: 2,
    });
    const commentadd = reactive({
      comment_text_add: "",
      id_task_add: "",
    });

    const commentedit = reactive({
      id: "",
      comment_text: "",
      id_task: "",
      id_user: "",
    });
    const id_task_add = ref(route.params.id);

    // Sử dụng watch để theo dõi thay đổi của tham số id_task trên URL
    watch(
      () => route.params.id,
      (newIdTask) => {
        id_task_add.value = newIdTask;
        commentadd.id_task_add = id_task_add.value;
      }
    );

    function toggleCard() {
      cardDisplay.value = cardDisplay.value === "block" ? "none" : "block";
      // todayabc.value = todayabc.value === "none" ? "block" : "none";
    }

    function toggleCard_comment() {
      cardDisplay_comment.value = "block";
      commentFormVisible.value = false;
    }
    function toggleCard_eidt() {
      cardDisplay_edit.value =
        cardDisplay_edit.value === "block" ? "none" : "block";
      // todayabc.value = todayabc.value === "none" ? "block" : "none";
    }

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

    const getTasks = () => {
      const token = localStorage.getItem("token");
        axios
        .get("http://127.0.0.1:8000/api/task", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log(response);
          tasks.value = response.data.data;
        });
    };
    getTasks();

    const addTask = () => {
      const token = localStorage.getItem("token");
      if (validatetask()) {
        const formData = new FormData();
        formData.append("task_name", taskadd.task_name_add);
        formData.append("task_description", taskadd.task_description_add);
        formData.append("deadline", taskadd.deadline_add);
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

              getTasks();
              // router.push({ name: "backend-today" });

              taskadd.task_name_add = "";
              taskadd.task_description_add = "";
              taskadd.deadline_add = "";
              taskadd.priority_add = 1;
              taskadd.id_project_add = 1;
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    };

    const editTask = (taskID) => {
      const token = localStorage.getItem("token");
      axios
        .get(`http://127.0.0.1:8000/api/task/${taskID}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log(response);
          taskedit.id_task1 = response.data.id;
          taskedit.task_name = response.data.task_name;
          taskedit.task_description = response.data.task_description;
          taskedit.deadline = response.data.deadline;
          taskedit.priority = response.data.priority;
          taskedit.id_project = "";
        })
        .catch((error) => {
          console.log(error);
        });
    };

    const updateTask = () => {
      const token = localStorage.getItem("token");
      let taskeditId = $("#id_task_edit").val();
      // alert(taskeditId)
      axios
        .put(`http://127.0.0.1:8000/api/task/${taskeditId}`, taskedit, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            message.success("Cập nhật thành công !!");
            getTasks();
          }
        })
        .catch((error) => {
          console.log(error);
        });
    };

    const delTask = (id_task) => {
      const token = localStorage.getItem("token"); 
      if (confirm("Bạn có chắc chắn muốn xóa task này?")) {
        axios
          .delete(`http://127.0.0.1:8000/api/task/${id_task}`, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          })
          .then((response) => {
            if (response) {
              message.success("Xóa task thành công !!");
              getTasks();
            }
          });
      }
    };

    const complete = (completeID) => {
      const token = localStorage.getItem("token");
      let formData = {
        statusht: 2,
      };
      axios
        .put(`http://127.0.0.1:8000/api/task/${completeID}`, formData, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            message.success("Bạn đã hoàn thành nhiệm vụ !!");
            getTasks();
          }
        });
    };

    const deltail = () => {
      const token = localStorage.getItem("token");
      axios
        .get(`http://127.0.0.1:8000/api/task/${route.params.id}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log(response);
          taskedeltail.id_task_deltail = response.data.id;
          taskedeltail.task_name_deltail = response.data.task_name;
          taskedeltail.task_description_deltail =
            response.data.task_description;
          taskedeltail.deadline_deltail = response.data.deadline;
          taskedeltail.priority_deltail = response.data.priority;
          taskedeltail.id_project_deltail = "";

          //comment

          comments.value = response.data.comment_list;
        })
        .catch((error) => {
          console.log(error);
        });
    };

    watchEffect(() => {
      deltail();
    });
    // console.log(id_task);
    const addComment = () => {
      const token = localStorage.getItem("token");
      if (validatecomment()) {
        const formData = new FormData();
        formData.append("comment_text", commentadd.comment_text_add);
        formData.append("id_task", commentadd.id_task_add);
        axios
          .post("http://127.0.0.1:8000/api/comment", formData, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          })
          .then((response) => {
            if (response) {
              message.success("Bình luận thành công !!");
              deltail();
              commentadd.comment_text_add = "";
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    };

    const editComment = (commentID) => {
      const token = localStorage.getItem("token");
      axios
        .get(`http://127.0.0.1:8000/api/comment/edit/${commentID}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          // console.log(response);
          commentedit.id_task = response.data.id_task;
          commentedit.id = response.data.id;
          commentedit.comment_text = response.data.comment_text;
          commentedit.id_user = response.data.id_user;
        })
        .catch((error) => {
          console.log(error);
        });
    };

    const updateComment = () => {
      const token = localStorage.getItem("token");
      let commentID_edit = $("#id_comment_edit").val();
      // const formData = new FormData();
      // formData.append("comment_text", commentedit.comment_text_edit);
      // formData.append("id_task", commentedit.id_task_edit);
      // formData.append("id", commentedit.id_comment);
      // formData.append("id_user", commentedit.id_user_edit);
      axios
        .put(
          `http://127.0.0.1:8000/api/comment/update/${commentID_edit}`,
          commentedit,
          {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          }
        )
        .then((response) => {
          console.log(response);
          console.log(commentedit);
          if (response) {
            message.success("Sửa bình luận thành công !!");
            deltail();
            cardDisplay_comment.value = "none";
          }
        })
        .catch((error) => {
          console.log(error);
        });
    };

    //validate task
    const updatecolorbtn = () => {
      if (taskadd.task_name_add.trim() === "") {
        btnaddtask.value = "#EDA59E";
      } else {
        btnaddtask.value = "#DC3545";
      }
    };
    const validatetask = () => {
      if (taskadd.task_name_add.trim() === "") {
        return false;
      }
      return true;
    };

    const validatecomment = () => {
      if (commentadd.comment_text_add.trim() === "") {
        return false;
      }
      return true;
    };

    const deltailUser = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/deltailuser", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log(response.data.data);
          if (response) {
            User.value = response.data.data;
          }
        });
    };
    deltailUser();

    return {
      formatDate,
      commentFormVisible,
      showCommentForm,
      handleDocumentClick,
      isActive,
      toggleActive,
      openModal2,
      todayabc,
      cardDisplay,
      toggleCard,
      cardDisplay_edit,
      toggleCard_eidt,
      cardDisplay_comment,
      toggleCard_comment,
      projects,
      tasks,
      comments,
      User,
      ...toRefs(taskadd),
      addTask,
      btnaddtask,
      updatecolorbtn,

      ...toRefs(taskedit),
      updateTask,
      editTask,

      ...toRefs(taskedeltail),
      deltail,

      ...toRefs(commentadd),
      addComment,
      id_task_add,

      ...toRefs(commentedit),
      updateComment,
      editComment,
      complete,
      delTask,
    };
  },
});
</script>
<style scoped>
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
#imglist {
  /* margin-left: 85%; */
  border-radius: 50%;
}

#imglist2 {
  /* margin-right: 85%; */
  border-radius: 50%;
}

.grid-container {
  display: grid;
  grid-template-columns: 1fr 4fr 1fr;
  /* Chia container thành hai cột bằng nhau */
  grid-gap: 10px;
  /* Khoảng cách giữa các cột */
  /* text-align: center; */
}

.pin {
  font-weight: 700;
  font-size: 1.5rem;
  display: flex;
  justify-content: start;
}

.iptaskname {
  border: none !important;
}

/* Bỏ hiệu ứng hover */
.iptaskname:hover {
  background-color: transparent !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

/* Bỏ hiệu ứng hover */
.slec:hover {
  background-color: transparent !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

.slec:focus {
  outline: none !important;
  box-shadow: none !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

/* Bỏ màu xanh khi click vào ô input */
.iptaskname:focus {
  outline: none !important;
  box-shadow: none !important;
  /*Thêm các thuộc tính khác nếu cần*/
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

.spandue {
  margin-left: 7px;
  font-size: 0.9rem;
}

.card-footer {
  display: flex;
  justify-content: space-between;
}

.card {
  border: 1px solid #e6e6e6 !important;
  /* display: none !important; */
}

.card-footer {
  border: 1px solid #e6e6e6 !important;
}

.pyour {
  font-weight: 600;
}

.pwell {
  font-weight: 300;
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
.box {
  border: 1px solid gray;
  width: 100%;
  border-radius: 5px;
}

.form1 {
  padding: 10px;
}

.inputtask {
  border: none !important;
}

.inputtask:hover {
  background-color: transparent !important;
}

.inputtask:focus {
  outline: none !important;
  box-shadow: none !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

.project-favorite {
  display: flex;
  justify-content: space-between;
  padding-right: 10px;
  margin-bottom: 10px;
}

.grid-container1 {
  display: grid;
  grid-template-columns: 2fr 1fr;
  /* Chia container thành hai cột bằng nhau */
  /* Khoảng cách giữa các cột */
  /* text-align: center; */
}

.formboxtoday {
  height: 110px;
  border-radius: 5px;
  border: 1px solid transparent;
  /* Đặt border mặc định */
  transition: border-color 0.1s ease;
  /* Hiệu ứng chuyển đổi màu border */
}

.formboxtoday.active {
  border-color: blue;
  /* Màu border khi active */
}

.btngrouptoday {
  display: none;
  /* Ẩn các nút mặc định */
}

.btngrouptoday.active {
  display: block;
  /* Hiển thị các nút khi có lớp active */
}

.inputtasktoday {
  border: none !important;
}

.inputtasktoday:hover {
  background-color: transparent !important;
}

.inputtasktoday:focus {
  outline: none !important;
  box-shadow: none !important;
  /*Thêm các thuộc tính khác nếu cần*/
}

.btncomment {
  border-radius: 20px;
  width: 90%;
  margin-left: 5px;
  border: 1px solid rgb(221, 221, 221) !important;
  background-color: transparent;
  /* Đặt màu nền ban đầu */
  transition: background-color 0.1s ease;
}

.btncomment:hover {
  background-color: #fafafa;
}

.titletoday {
  font-weight: 500;
}

.formboxtoday1 {
  border: 1px solid gainsboro;
  border-radius: 5px;
  min-height: 100px;
  width: 100%;
}

.comments-container {
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

.comments-container img {
  width: 50px;
  height: 50px;
  flex-shrink: 0;
}

.comments-container .comment-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}

.comments-container .comment-info p {
  margin: 0;
}

.comments-container .user-info {
  display: flex;
  align-items: center;
  gap: 5px;
}
.user-name {
  font-weight: 700;
}
.comment-date {
  font-size: 0.85rem;
  padding-left: 10px;
}
</style>
