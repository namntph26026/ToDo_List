<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-5" style="margin-top: 10%">
            <form action="" method="POST" @submit.prevent="forgotpass">
              <div class="mb-3">
                <h1 style="width: 50%; font-weight: 700">Quên mật khẩu ?</h1>
                <br />
                <p style="width: 80%">
                  Để đặt lại mật khẩu, vui lòng nhập địa chỉ email tài khoản
                  Todoist của bạn.
                </p>
              </div>
              <div class="mb-3">
                <div class="password-input-container">
                  <input
                    type="email"
                    class="form-control"
                    aria-describedby="emailHelp"
                    placeholder="Saisissez votre adresse e-mail..."
                    name="email"
                    id="email"
                    v-model="email"
                    @input="updateerror()"
                  />
                  <div :style="{ display: errorEmail }" style="color: red">
                    <p
                      id="element-2"
                      class="a83bd4e0 a8d37c6e _8f5b5f2b _2a3b75a1"
                    >
                      <span
                        class="cd105f69 _2a3b75a1 _973d00d0 _6016f4fb e5a9206f"
                        ><svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          aria-hidden="true"
                        >
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8 2.5C4.96243 2.5 2.5 4.96243 2.5 8C2.5 11.0376 4.96243 13.5 8 13.5C11.0376 13.5 13.5 11.0376 13.5 8C13.5 4.96243 11.0376 2.5 8 2.5ZM1.5 8C1.5 4.41015 4.41015 1.5 8 1.5C11.5899 1.5 14.5 4.41015 14.5 8C14.5 11.5899 11.5899 14.5 8 14.5C4.41015 14.5 1.5 11.5899 1.5 8ZM8.66667 10.3333C8.66667 10.7015 8.36819 11 8 11C7.63181 11 7.33333 10.7015 7.33333 10.3333C7.33333 9.96514 7.63181 9.66667 8 9.66667C8.36819 9.66667 8.66667 9.96514 8.66667 10.3333ZM8.65766 5.65766C8.65766 5.29445 8.36322 5 8 5C7.99087 5.00008 7.98631 5.00013 7.98175 5.00025C7.97719 5.00038 7.97263 5.00059 7.96352 5.00101C7.60086 5.02116 7.3232 5.33149 7.34335 5.69415L7.50077 8.52774C7.53575 9.15742 8.46425 9.15742 8.49923 8.52774L8.65665 5.69415C8.65707 5.68503 8.65728 5.68047 8.65741 5.67591C8.65754 5.67135 8.65758 5.66679 8.65766 5.65766Z"
                            fill="currentColor"
                          ></path></svg></span
                      ><font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit">{{ validateloginErrorEmail }}</font
                      ></font>
                    </p>
                    <!-- <span style="color: red">{{ validateloginError }}</span> -->
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btna btn-danger">
                <span style="font-weight: 600; font-size: 1, 5rem; color: white"
                  >Đặt lại mật khẩu của tôi</span
                >
              </button>
            </form>
            <br>
            <router-link :to="{path: 'login'}">
              <a href="" class="amot" >Để đăng nhập</a>
            </router-link>
              
          </div>
          <div class="col-md-7">
            <img src="https://todoist.b-cdn.net/assets/images/9ba6f31fc750cc2b5eaf8b4fbeec2788.png" alt="" style="width: 100%;margin-top: 20%;">
            <!-- <video
              class="small-video"
              poster="https://todoist.b-cdn.net/assets/images/c3fd023a570fc04ad3a60190af32ddd8.png"
            >
              <source
                src="https://todoist.b-cdn.net/assets/video/d1cc9a7bd4e95120022d9a2d66d14fbe.mp4"
                type="video/mp4"
              />
            </video> -->
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</template>
<script>
import { defineComponent, reactive, ref, toRefs } from "vue";
import axios from "axios";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";

export default defineComponent({
  setup() {
    const router = useRouter();
    const route = useRoute();
    const errors = ref({});
    const validateloginErrorEmail = ref("");
    const errorEmail = ref("none");
    const forgotpassword = reactive({
      email: "",
    });

    const updateerror = () => {
      if (register.email.trim() !== "") {
        errorEmail.value = "none";
      }
    };
    const validatelogin = () => {
      if (forgotpassword.email.trim() === "") {
        validateloginErrorEmail.value = "Bạn cần nhập email !!";
        errorEmail.value = "block";
        return false;
      }

      //check email
      axios
        .get("http://127.0.0.1:8000/api/checkEmail", {
          params: {
            email: forgotpassword.email,
          },
        })
        .then((response) => {
          console.log(response.data.exists);
          if (response.data.exists == true) {
            validateloginErrorEmail.value = "Email đã tồn tại";
            errorEmail.value = "block";
            return false;
          }
        })
        .catch((error) => {
          console.error(error);
          // Xử lý lỗi nếu cần thiết
        });
      validateloginErrorEmail.value = "";
      return true;
    };

    const forgotpass = ()=> {
        axios
            .post('http://127.0.0.1:8000/api/password/reset',forgotpassword)
            .then((response)=>{
                if(response){
                    message.success("Đặt lại mật khẩu thành công, vui lòng checkMail !!");
                    router.push({ name: "frontend-login" });
                }
               
            })
    }

    return {
      errors,
      ...toRefs(forgotpassword),
      forgotpass,
      validateloginErrorEmail,
      errorEmail,
      updateerror,
    };
  },
});
</script>
<style scoped>
.navbar {
  position: fixed !important;
  top: 0 !important;
  width: 100%;
  background-color: white;
}

.navbar-nav {
  display: flex;
  align-items: center;
}
.container-full {
  display: flex;
  justify-content: center;
}

.navbar {
  width: 100%;
}

.navbar-left {
  margin-right: auto;
}

.navbar-right {
  margin-left: auto;
}

.fixed-menu {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 999;
  /* background-color: rgba(255, 255, 255, 0.9); */
}

.video-container {
  position: relative;
}

.video-container img {
  border-radius: 10px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 70%;
  max-width: 900px;
  height: auto;
}

/* .menu{
    background-color: white !important;
} */

/* .nav-item {
    margin: 8px;
} */

.btnnav {
  height: fit-content;
  margin-top: 7% !important;
}

.finally {
  /* font-size: 2.5rem !important; */
  text-align: center;
  /* width: 30% !important; */
  margin-top: 3% !important;
}

.pbanner1 {
  font-size: 2.8rem;
  font-weight: 700;
  line-height: 35px;
}

.pbanner2 {
  margin-top: 5% !important;
  text-align: center;
}

.btnhed {
  font-weight: 700 !important;
  /* font-size: 1.5rem !important; */
}

.pcl {
  font-weight: 700;
  color: rgb(214, 70, 56);
}
.pthe1 {
  font-size: 2.5rem;
  font-weight: 700;
}
.pju {
  font-size: 1.3em;
  font-weight: 300;
}
.imgcodinh {
  position: fixed !important;
  top: 500px;
  right: 0;
  transform: translateY(-20%);
  width: 50% !important;
}

.card {
  width: 100% !important;
  text-align: center !important;
}
.card-text {
  font-weight: 600;
}

.image-container {
  position: relative;
  width: 200px;
  height: 200px;
  overflow: hidden;
  display: inline-block;
  margin-right: 10px;
}

.moving-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 200px;
  height: 200px;
  background-size: cover;
  animation: moveImage 10s linear infinite;
}

@keyframes moveImage {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(-50%);
  }
}

.pcon {
  font-size: 2rem;
  font-weight: 700;
}

.btn {
  display: inline-flex;
  align-items: center;
}

.btn a {
  display: flex;
  align-items: center;
  text-decoration: none;
}

.btn svg {
  width: 40px;
  height: 18px;
  margin-right: 5px;
}

.btn span {
  white-space: nowrap;
  color: black;
  font-weight: 700;
  font-size: 1.2rem;
}

.btna {
  width: 70%;
  margin-top: 2%;
  border: 1px solid #e4e4e4 !important;
  display: inline-block;
}

.form-control {
  width: 70% !important;
}

/* Định dạng hình ảnh biểu tượng cái mắt */
.eye-icon svg {
  width: 20px;
  height: 20px;
  fill: gray;
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}

/* Định dạng hình ảnh biểu tượng cái mắt khi hover */
.eye-icon svg:hover {
  fill: red;
}

.amot {
  font-size: 0.8rem;
  color: #666666;
  margin-top: 2%;
  margin-left: 25%;
}

.small-video {
  width: 100%;
  height: auto;
}

.vertical-menu {
  height: 100vh; /* Chiều cao của menu dọc chiếm toàn bộ màn hình */
  width: 250px; /* Độ rộng của menu dọc */
  background-color: #f8f9fa; /* Màu nền của menu dọc */
  padding-top: 20px; /* Khoảng cách từ đỉnh menu đến nội dung */
}

.vertical-menu .nav-link {
  padding: 10px; /* Khoảng cách giữa các mục trong menu */
  color: #000; /* Màu chữ trong menu */
}

.vertical-menu .nav-link:hover {
  background-color: #e9ecef; /* Màu nền khi di chuột qua mục trong menu */
}

.vertical-menu .nav-link.active {
  background-color: #007bff; /* Màu nền của mục hiện tại */
  color: #fff; /* Màu chữ của mục hiện tại */
}

/* CSS tùy chỉnh cho khu vực nội dung chính */
.content-area {
  height: 100vh; /* Chiều cao của khu vực nội dung chiếm toàn bộ màn hình */
  padding: 20px; /* Khoảng cách từ nội dung chính đến các cạnh của khung */
}

.swiper-container {
  width: 600px;
  height: 400px;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

.slider {
  display: flex;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: auto;
}

.swiper-container {
  flex: 1;
  margin-right: 10px;
}

.swiper-scrollbar {
  top: 10px;
  left: 20%;
}

.swiper-scrollbar:nth-of-type(2) {
  top: 10px;
  right: 20%;
}

.ptodo {
  text-align: center;
  font-size: 2.5rem;
  font-weight: 700;
}

.pthe {
  text-align: center;
  font-size: 2rem;
  font-weight: 700;
}

.btnsi {
  background: #f4f2ef !important;
  color: #6b6a68 !important;
  border: none !important;
}

.spanadd {
  margin-left: 2%;
}
.pgai {
  font-size: 2rem;
  text-align: center;
  font-weight: 700;
  padding-top: 10%;
}
.p337 {
  font-size: 1.2rem;
  text-align: center;
  color: #6f6b61;
}
.btnget {
  font-weight: 600 !important;
  font-size: 1.6rem;
}
.fa-download {
  color: #bcb8b8;
}

.pjoin {
  font-weight: 500;
  font-size: 1.1rem;
}

.fa-brands {
  font-size: 2rem;
  margin-top: 20px;
}

.pf {
  font-weight: 600;
}
</style>
