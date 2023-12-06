<template>
    <div class="container" style="text-align: center">
      <div class="content-area" style="position: relative">
        <div class="grid-container">
          <div class="column"></div>
          <div
            class="column"
            style="display: flex; justify-content: space-between"
          >
          <h1>abc</h1>
          </div>
          <div class="column"></div>
        </div>
      </div>
    </div>
  </template>
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
  