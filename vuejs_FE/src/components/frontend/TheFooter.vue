<template>
    <div style="background: #fcf5ee">
        <aside>
        <p class="pgai">
            Gain calmness and clarity with the <br />
            world’s most beloved productivity app
        </p>
        <p class="p337">337,000+ ★★★★★ reviews on Google Play and App Store</p>
        <center>
            <button type="button" class="btn btnget btn-danger">
            Get started free
            </button>
        </center>
        <br />
        <center>
            <button class="btn btnget">
            <i class="fa-solid fa-download"></i
            ><span
                style="
                margin-left: 10px;
                color: #bcb8b8;
                font-weight: 400;
                font-size: 1rem;
                "
                >Download apps</span
            >
            </button>
        </center>
        </aside>
        <center>
        <hr width="90%" />
        </center>
    
   <footer>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <img src="/frontend/img/logo.png"
                        alt="" width="30%">
                    <br><br>
                    <p class="pjoin">Join millions of people who organize <br> work and life with Todoist.</p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="pf">Features</p>
                            <p class="pf">How It Works</p>
                            <p class="pf">For Teams</p>
                            <p class="pf">Pricing</p>
                            <p class="pf">Templates</p>
                        </div>
                        <div class="col-md-3">
                            <p class="pf">Resources</p>
                            <p class="pf">Download Apps</p>
                            <p class="pf">Help Center</p>
                            <p class="pf">Productivity Methods</p>
                            <p class="pf">Integrations</p>
                            <p class="pf">Channel Partners</p>
                            <p class="pf">Developer API</p>
                            <p class="pf">Status</p>
                        </div>
                        <div class="col-md-3">
                            <p class="pf">Company </p>
                            <p class="pf">About Us</p>
                            <p class="pf">Careers</p>
                            <p class="pf">Inspiration Hub</p>
                            <p class="pf">Press</p>
                            <p class="pf">Twist</p>
                        </div>

                        <div class="col-md-3">
                            <i class="fa-brands fa-twitter"></i> <br>
                            <i class="fa-brands fa-youtube"></i> <br>
                            <i class="fa-brands fa-facebook"></i> <br>
                            <i class="fa-brands fa-instagram"></i>
                        </div>

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </footer>
    </div>
</template>
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

.pcl{
    font-weight: 700;
    color: rgb(214, 70, 56);
}
.pthe1{
    font-size: 2.5rem;
    font-weight: 700;
}
.pju{
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

.card{
    width: 100% !important;
    text-align: center !important;
}
.card-text{
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

.pcon{
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

  .btna{
    width: 70%;
    margin-top: 2%;
    border: 1px solid #e4e4e4 !important;
    display: inline-block;
  }

  .form-control{
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

  .amot{
    font-size: 0.8rem;
    color: #666666;
    margin-top: 2%;
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

    .ptodo{
      text-align: center;
      font-size: 2.5rem;
      font-weight: 700;
    }

    .pthe{
      text-align: center;
      font-size: 2rem;
      font-weight: 700;
    }

    .btnsi{
      background: #F4F2EF !important;
      color: #6b6a68  !important;
      border: none !important;
    }

    .spanadd{
      margin-left: 2%;
    }
    .pgai{
      font-size: 2rem;
      text-align: center;
      font-weight: 700;
      padding-top: 10%;
    }
    .p337{
      font-size: 1.2rem;
      text-align: center;
      color: #6F6B61;
    }
    .btnget{
      font-weight: 600 !important;
      font-size: 1.6rem;
    }
    .fa-download{
      color: #bcb8b8;
    }

    .pjoin{
      font-weight: 500;
      font-size: 1.1rem;
    }

    .fa-brands{
      font-size: 2rem;
      margin-top: 20px;
    }

    .pf{
      font-weight: 600;
    }
</style>