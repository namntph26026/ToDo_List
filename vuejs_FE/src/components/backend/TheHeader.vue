<template>
     <header class="hea" style="position: relative;">
            <div class="row">

                <div class="col-md-3">

                    <div class="row">
                        <div class="col-md-3">
                            <i class="fas fa-bars toggle_menu" @click="toggleMenu"></i>
                            <i class="fas fa-house"></i>

                        </div>
                        <div class="col-md-9"  @click="openModalkey">
                            <form class="d-flex" role="search">
                                <div style="padding-top: 1%;">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search" style="color: white;" >
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="headerdiv">
                        <!-- hình dấu cộng -->
                        <svg width="24" height="24" viewBox="0 0 24 24" class="svgicon">
                            <g fill="none" fill-rule="evenodd" transform="translate(4 3)">
                                <mask id="jd4FBg" fill="#fff">
                                    <path
                                        d="M9 8h7a.5.5 0 1 1 0 1H9v7a.5.5 0 1 1-1 0V9H1a.5.5 0 0 1 0-1h7V1a.5.5 0 0 1 1 0v7z">
                                    </path>
                                </mask>
                                <g mask="url(#jd4FBg)">
                                    <path fill="currentColor" d="M-4-3h24v24H-4z"></path>
                                </g>
                            </g>
                        </svg>
                        <!-- hình tròn -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="svgicon">
                            <g fill="none" fill-rule="evenodd">
                                <g fill="currentColor" fill-rule="nonzero">
                                    <g>
                                        <g>
                                            <path
                                                d="M12 3c4.97 0 9 4.03 9 9s-4.03 9-9 9-9-4.03-9-9 4.03-9 9-9zm0 1c-4.418 0-8 3.582-8 8 0 .702.09 1.383.26 2.031l2.886-2.885c.196-.195.512-.195.708 0l2.646 2.647 4.793-4.794L13 9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h3.52l.052.005L16.5 8c.036 0 .071.004.105.011l.046.012.04.015c.014.005.027.012.04.019.013.006.025.013.036.02l.035.025c.014.01.027.02.04.033l.012.011.011.013c.012.012.023.025.033.039l-.044-.052c.026.027.05.056.069.087l.02.034.02.042.014.04c.005.015.009.03.012.046l.006.033.005.051V12c0 .276-.224.5-.5.5s-.5-.224-.5-.5V9.706l-5.146 5.148c-.196.195-.512.195-.708 0L7.5 12.207 4.618 15.09C5.827 17.974 8.677 20 12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8z"
                                                transform="translate(-564 -480) translate(528 444) translate(36 36)">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <!-- dấu hỏi chấm -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                aria-hidden="true" class="svgicon svgiconcham"  @click="toggleList2">
                                <path
                                    d="M12 3a9 9 0 11-.001 18.001A9 9 0 0112 3zm0 1a8 8 0 100 16 8 8 0 000-16zm-.093 10.794c.47 0 .802.355.802.856 0 .495-.331.85-.802.85-.471 0-.808-.355-.808-.85 0-.501.337-.856.808-.856zm.128-7.294c1.465 0 2.465.954 2.465 2.213 0 .96-.47 1.639-1.215 2.11-.738.458-.948.8-.948 1.443v.397H11.32v-.562c-.006-.808.366-1.358 1.163-1.86.674-.433.936-.818.936-1.473 0-.758-.559-1.314-1.425-1.314-.878 0-1.436.544-1.5 1.418H9.5c.064-1.32.901-2.372 2.535-2.372z"
                                    fill="currentColor" fill-rule="nonzero"></path>
                            </svg>
                            <ul class="list2" :style="{ display: list2Display }" style="position:absolute; z-index: 1;">
                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M12 3a9 9 0 11-.001 18.001A9 9 0 0112 3zm0 1a8 8 0 100 16 8 8 0 000-16zm-.093 10.794c.47 0 .802.355.802.856 0 .495-.331.85-.802.85-.471 0-.808-.355-.808-.85 0-.501.337-.856.808-.856zm.128-7.294c1.465 0 2.465.954 2.465 2.213 0 .96-.47 1.639-1.215 2.11-.738.458-.948.8-.948 1.443v.397H11.32v-.562c-.006-.808.366-1.358 1.163-1.86.674-.433.936-.818.936-1.473 0-.758-.559-1.314-1.425-1.314-.878 0-1.436.544-1.5 1.418H9.5c.064-1.32.901-2.372 2.535-2.372z"
                                                fill="currentColor" fill-rule="nonzero">
                                            </path>
                                        </svg><span class="spanlist">Help</span>
                                    </li>
                                </button>
                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg width="24" height="24" aria-hidden="true">
                                            <g fill="none" fill-rule="evenodd">
                                                <path fill="currentColor" d="M9.5 19h10a.5.5 0 110 1h-10a.5.5 0 110-1z">
                                                </path>
                                                <path stroke="currentColor"
                                                    d="M4.42 16.03a1.5 1.5 0 00-.43.9l-.22 2.02a.5.5 0 00.55.55l2.02-.21a1.5 1.5 0 00.9-.44L18.7 7.4a1.5 1.5 0 000-2.12l-.7-.7a1.5 1.5 0 00-2.13 0L4.42 16.02z">
                                                </path>
                                            </g>
                                        </svg><span class="spanlist">Inspiration</span>
                                    </li>

                                </button>
                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.368 4.002L15.436 4c.892 0 1.215.093 1.54.267.327.174.583.43.757.756.174.326.267.65.267 1.54v8.873c0 .892-.093 1.215-.267 1.54a1.81 1.81 0 01-.756.757c-.326.174-.65.267-1.54.267H6.563c-.892 0-1.215-.093-1.54-.267a1.817 1.817 0 01-.757-.756c-.16-.301-.252-.6-.265-1.345L4 6.564c0-.892.093-1.215.267-1.54a1.81 1.81 0 01.756-.757c.301-.16.6-.252 1.345-.265zM6.394 5l-.305.01c-.305.018-.449.06-.594.138a.818.818 0 00-.346.346c-.1.187-.141.37-.148.9v9.21l.01.306c.018.305.06.449.138.594a.818.818 0 00.346.346c.187.1.37.141.9.148l9.041.001c.662 0 .863-.039 1.07-.149a.819.819 0 00.345-.346c.1-.187.141-.37.148-.9L17 6.565c0-.662-.039-.864-.149-1.07a.818.818 0 00-.346-.345c-.187-.1-.37-.141-.9-.148h-9.21zM19 9h1v1h-1V9zm1 2h-1v1h1v-1zm-1 2h1v1h-1v-1zm1 2h-1v1h1v-1zm-1 2h1v1h-1v-1zM9 19h1v1H9v-1zm2 0h1v1h-1v-1zm3 0h-1v1h1v-1zm1 0h1v1h-1v-1zm3 0h-1v1h1v-1z">
                                            </path>
                                        </svg><span class="spanlist">Templates</span>
                                    </li>
                                </button>

                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            aria-hidden="true">
                                            <g fill="currentColor" fill-rule="evenodd">
                                                <path
                                                    d="M6.5 14h2v1h-2v-1zm10-2h1v1h-1v-1zm0-2h1v1h-1v-1zm-10 2h1v1h-1v-1zm0-2h1v1h-1v-1zm2 2h1v1h-1v-1zm0-2h1v1h-1v-1zm2 2h1v1h-1v-1zm0-2h1v1h-1v-1zm2 2h1v1h-1v-1zm0-2h1v1h-1v-1zm2 2h1v1h-1v-1zm0-2h1v1h-1v-1zm1 4h2v1h-2v-1zm-6 0h5v1h-5v-1z">
                                                </path>
                                                <path fill-rule="nonzero"
                                                    d="M6.56 7c-.66 0-.86.04-1.07.15a.82.82 0 00-.34.34C5.04 7.7 5 7.9 5 8.56v6.88c0 .66.04.86.15 1.07a.82.82 0 00.34.34c.21.11.41.15 1.07.15h10.88c.66 0 .86-.04 1.07-.15a.82.82 0 00.34-.35c.11-.2.15-.4.15-1.06V8.56c0-.66-.04-.86-.15-1.07a.82.82 0 00-.35-.34c-.2-.11-.4-.15-1.06-.15H6.56zm0-1h10.88c.89 0 1.21.1 1.54.27.32.17.58.43.75.75.18.33.27.65.27 1.54v6.88c0 .89-.1 1.21-.27 1.54a1.8 1.8 0 01-.75.75c-.33.18-.65.27-1.54.27H6.56c-.89 0-1.21-.1-1.54-.27a1.82 1.82 0 01-.75-.75c-.18-.33-.27-.65-.27-1.54V8.56c0-.89.1-1.21.27-1.54.17-.32.43-.58.75-.75.33-.18.65-.27 1.54-.27z">
                                                </path>
                                            </g>
                                        </svg><span class="spanlist">Keyboard shortcuts</span>
                                    </li>
                                </button>

                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 62 62" aria-hidden="true">
                                            <path
                                                d="M18.46 24.16a1.3 1.3 0 011.83-1.82l7.75 7.75c.5.5.5 1.32 0 1.82l-7.75 7.75a1.3 1.3 0 11-1.83-1.82L25.3 31l-6.84-6.84zm9.96 15.88c0-.71.57-1.29 1.29-1.29h12.91a1.3 1.3 0 110 2.58H29.71a1.3 1.3 0 01-1.3-1.29z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M44.78 10.33c3.8 0 6.89 3.09 6.89 6.9v27.55c0 3.8-3.09 6.89-6.9 6.89H17.23a6.89 6.89 0 01-6.89-6.9V17.23c0-3.8 3.09-6.89 6.9-6.89h27.55zm-.22 2.59H17.44a4.52 4.52 0 00-4.51 4.18l-.01.34v27.12a4.52 4.52 0 004.18 4.51l.34.01h27.12a4.52 4.52 0 004.51-4.18l.01-.34V17.44a4.52 4.52 0 00-4.18-4.51l-.34-.01z"
                                                fill="currentColor"></path>
                                        </svg><span class="spanlist">Command menu</span>
                                    </li>
                                </button>

                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M17.436 3c.892 0 1.215.093 1.54.267.327.174.583.43.757.756.174.326.267.65.267 1.54v12.873c0 .892-.093 1.215-.267 1.54a1.81 1.81 0 01-.756.757c-.326.174-.65.267-1.54.267H6.563c-.892 0-1.215-.093-1.54-.267a1.81 1.81 0 01-.757-.756c-.16-.301-.252-.6-.265-1.345L4 5.564c0-.892.093-1.215.267-1.54a1.81 1.81 0 01.756-.757c.301-.16.6-.252 1.345-.265L17.436 3zm.17 1.001H6.394l-.305.01c-.305.018-.449.06-.594.138a.814.814 0 00-.346.346c-.05.093-.085.186-.109.321l-.023.186-.008.114-.008.278v13.212l.01.305c.018.305.06.449.138.594a.814.814 0 00.346.346c.093.05.186.085.321.109l.186.023.114.008.278.008h11.212l.278-.008.114-.008.186-.023c.135-.024.228-.059.321-.109a.814.814 0 00.346-.346c.05-.093.085-.186.109-.321l.023-.186.008-.114.008-.278V5.394l-.008-.278-.008-.114-.023-.186a1.007 1.007 0 00-.109-.321.814.814 0 00-.346-.346 1.007 1.007 0 00-.321-.109l-.186-.023-.114-.008-.278-.008zM13 17v1H7v-1h6zm4-3v1H7v-1h10zm-.5-8a.5.5 0 01.5.5l-.001.01L17 10.5a.5.5 0 01-1 0l-.001-2.793-4.145 4.147a.501.501 0 01-.765-.638l.057-.07L15.292 7H12.5a.5.5 0 010-1h4z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg><span class="spanlist">Getting started guide</span>
                                    </li>
                                </button>

                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            aria-hidden="true">
                                            <path fill="currentColor"
                                                d="M12 6c3.052 0 5.5 2.448 5.5 5.5 0 1.32-.393 2.274-1.266 3.562l-.425.615c-.588.856-.891 1.411-1.078 2.02l-.468 2.338a1.2 1.2 0 01-1.177.965h-2.172a1.2 1.2 0 01-1.177-.965l-.458-2.291c-.21-.68-.512-1.23-1.088-2.067l-.425-.615C6.893 13.774 6.5 12.819 6.5 11.5 6.5 8.448 8.948 6 12 6zm1.65 12h-3.3l.368 1.84a.2.2 0 00.196.16h2.172a.2.2 0 00.196-.16L13.65 18zM12 7c-2.5 0-4.5 2-4.5 4.5 0 2.326 1.73 3.353 2.576 5.498h3.848c.845-2.145 2.576-3.172 2.576-5.498C16.5 9 14.5 7 12 7zm7.582 7.1l1.848.765a.5.5 0 11-.383.924l-1.847-.766a.5.5 0 01.382-.923zm-14.511.27a.5.5 0 01-.27.653l-1.848.766a.5.5 0 01-.383-.924l1.848-.765a.5.5 0 01.653.27zM21.7 7.482a.5.5 0 01-.27.653l-1.849.765a.5.5 0 01-.382-.923l1.847-.766a.5.5 0 01.654.27zm-18.748-.27l1.847.765a.5.5 0 01-.382.923L2.57 8.135a.5.5 0 11.383-.924zm13.065-5.413a.5.5 0 01.27.654L15.524 4.3a.5.5 0 01-.923-.382l.765-1.848a.5.5 0 01.653-.27zm-7.383.27l.766 1.85a.5.5 0 01-.923.382L7.71 2.453a.5.5 0 11.924-.383z">
                                            </path>
                                        </svg><span class="spanlist">What's new</span>
                                    </li>
                                </button>
                                <hr>
                                <button class="btn btnlist">
                                    <li class="lilist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            aria-hidden="true">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M5.06 11.085l-1.17.955a.5.5 0 11-.633-.774l1.68-1.372a1 1 0 011.379.11l1.44 1.615a.5.5 0 01-.747.665l-.957-1.074a6 6 0 0010.934 4.13l.718.718A7 7 0 015.06 11.085zm13.905 1.62l1.07-.936a.5.5 0 01.66.752l-1.618 1.415a1 1 0 01-1.4-.082l-1.359-1.502a.5.5 0 01.742-.67l.902.997A6 6 0 007.014 8.661l-.718-.719a7 7 0 0112.67 4.764z">
                                            </path>
                                        </svg><span class="spanlist">What's new</span>
                                    </li>
                                </button>


                            </ul>
                        </div>
                        <!-- cái chuông -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="svgicon">
                            <path
                                d="M12 3a5.75 5.75 0 015.75 5.75c0 3.24.682 5.875 2.03 7.927A1.5 1.5 0 0118.525 19H14.5a2.5 2.5 0 01-5 0H5.475a1.501 1.501 0 01-1.254-2.323C5.568 14.625 6.25 11.989 6.25 8.75A5.75 5.75 0 0112 3zm1.5 16h-3a1.5 1.5 0 003 0zM12 4a4.75 4.75 0 00-4.75 4.75c0 3.423-.731 6.248-2.193 8.476a.5.5 0 00.418.774h13.05a.5.5 0 00.418-.774c-1.462-2.227-2.193-5.053-2.193-8.476A4.75 4.75 0 0012 4z"
                                fill="currentColor" fill-rule="nonzero"></path>
                        </svg>
                        <!-- <img src="/backend/img/avt.png" alt="" width="10%" id="imglist"> -->
                        <img src="../../assets/images/avt.png" alt="" width="30" id="imglist" @click="toggleList3">
                    </div>
                    <ul class="list" :style="{display: inforuser }" style="position: relative;z-index: 2; ">
                        <li><button type="button" class="btnaaa">
                                <div class="row" @click="showModalInfor">
                                    <div class="col-md-2" >
                                      <img src="../../assets/images/avt.png" alt="" width="32" id="imglist">
                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname1">{{ User.name }}</span>
                                        <span class="spanname2">{{User.email }}</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <hr style="color: #d0cece;" width="100%">
                        <li style="margin-top: -7px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fas fa-plus cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Add workspace</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <hr style="color: #d0cece" width="100%">
                        <li style="margin-top: -7px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-solid fa-palette cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Theme</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <li style="margin-top: 4px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-solid fa-print cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Print</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <li style="margin-top: 4px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-solid fa-puzzle-piece cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Integration</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <hr style="color: #d0cece" width="100%">
                        <li style="margin-top: 4px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-regular fa-star cong" style="color: yellow;"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Upgrade to Pro</span>
                                    </div>
                                </div>
                            </button>
                        </li>

                        <li style="margin-top: 4px;"><button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-solid fa-mobile-button cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Download apps</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <hr style="color: #d0cece" width="100%">
                        <li style="margin-top: 4px;" @click="logout()">
                          <button type="button" class="btnaaa">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fa-solid fa-arrow-right-from-bracket cong"></i>

                                    </div>
                                    <div class="col-md-10">
                                        <span class="spanname3">Log out</span>
                                    </div>
                                </div>
                            </button>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="modal" id="modalkey" style="margin-top: 5%"  
              v-if="isOpen1"
              @keydown.esc="closeModalkey"
              @click="closeModalkey"
              tabindex="-1">
                <div class="modal-dialog modal-lg ">
                  <!-- <form action="" method="post" @submit.prevent="addproject()"> -->
                    <div class="modal-content" @click.stop>
                      <div class="modal-header">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 1.5rem;"></i>
                        <input class="form-control me-2" type="search" placeholder="What would you like to do?"
                                            aria-label="Search" style="border: none; background-color: initial; box-shadow: none;" v-model="searchQuery" @input="getSearch">
                        <p>Ctrl</p><p>+</p><p>k</p>
                      </div>
                      <div class="modal-body">
                        <div :style="{ display: searchedKeywordsan }">
                          <div style="display: flex; justify-content: space-between; font-weight: 600;">
                            <div>
                                <p>Recent searches</p>
                            </div>
                            <div>
                              <p>Clear</p>
                            </div>
                          </div>
                          <div v-for="(keyword, index) in searchedKeywords11" :key="keyword"  class="searchkw" style="display: flex;justify-content: space-between;">
                            <div>
                              <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" class="quick_find__recent_search_icon"><path fill="currentColor" fill-rule="evenodd" d="M12 12h4v1h-5V8h1v4zm-7 0h2l-2.5 3L2 12h2a8 8 0 1 1 8 8v-1a7 7 0 1 0-7-7z"></path></svg>
                              <span style="margin-left:10px" @click="keywordsearchedit(keyword)">{{ keyword }}</span>
                            </div>
                            <div >
                              <svg viewBox="0 0 24 24" class="icon_close" width="18" height="18" aria-hidden="true" @click.stop="removeKeyword(index)"><path fill="currentColor" fill-rule="nonzero" d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z"></path></svg>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div>
                          <p class="project_search" :style="{ display: project_search }" style="font-weight: 600;">Project</p>
                          <p :style="{ display: no_project }">Không tìm thấy project nào.</p>
                          <ul class="task_search_ul" v-for="resultproject  in searchResultsProject" :key="resultproject.id" style="  list-style: none;padding: 8px;padding-left: 0;">
                            <router-link :to="{name: 'backend-app-deltail-project',params:{id: resultproject .id}}" style="color: inherit; text-decoration: none">
                                <div style="display: flex;justify-content: space-between;" @click="saveKeywords">
                                  <div>
                                    <li style="font-weight: 500;">{{ resultproject .project_name }}</li>
                                  </div>
                                  <div style="display: flex; align-items: center;">
                                    <img src="../../assets/images/avt.png" alt="" width="25" style="border-radius: 50%;">
                                    <p style="padding-top: 5%;font-weight: 300;font-size: 0.9rem;" >- personal</p>
                                  </div>
                                </div>
                            </router-link>
                          </ul>
                        </div>
                        <div>
                          <p class="task_search" :style="{ display: task_search }" style="font-weight: 600;">Task</p>
                          <p :style="{ display: no_task }">Không tìm thấy task nào.</p>
                          <div @click="openModal3()">
                            <ul class="task_search_ul" v-for="result in searchResults" :key="result.id" style="list-style: none; padding: 0px;color: inherit; text-decoration: none">
                              <a href="javascript:void(0)" @click="redirectToDetail(result.id, result.id_project)">
                                <a href="javascript:void(0" @click="deltail">
                                  <div @click="saveKeywords">
                                    <li>
                                      <span style="font-weight: 500;">{{ result.task_name }}</span>
                                      <span style="float: right; font-weight: 300; font-size: 0.9rem;">
                                        <img src="../../assets/images/avt.png" alt="" width="25" style="border-radius: 50%;"> / {{ result.id_project === null ? 'inbox' : result.project_name }}
                                      </span>
                                    </li>
                                    <p style="font-size: 1rem; font-weight: 300;">{{ result.task_description }}</p>
                                  </div>
                                </a>
                              </a>
                            </ul>
                          </div>
                          <!-- <router-link :to="{name: 'backend-search'}"> -->
                           <a href="javascript:void(0)" @click="showMoreResults">
                            <p class="task_search_ul" style="padding: 10px;padding-left: 0;text-decoration: none;" :style="{display: task_search1}">Show more results</p>
                           </a>
                          <!-- </router-link> -->
                        </div>
                        
                        <div class="vertical-menu" :style="{ display: Navigation }">
                          <p style="font-weight: 600;">Navigation</p>
                          <router-link :to="{name: 'backend-today'}" exact replace> 
                            <a class="nav-link active"
                            ><i class="fas fa-house" style="color: rgb(121, 117, 117);"></i><span id="countinbox"
                              >Go to home <span id="record-count" style="float: right"></span> </span
                            ></a>
                          </router-link>
                          <router-link :to="{name: 'backend-app'}">
                          <a class="nav-link active"
                            ><i class="fas fa-inbox"></i
                            ><span id="countinbox"
                              >Go to Inbox</span></a>
                          </router-link>

                          <router-link :to="{name: 'backend-today'}">
                            <a class="nav-link active"
                              ><i class="fas fa-calendar-week"></i><span id="countinbox"
                                >Go to Today <span id="record-count" style="float: right"></span> </span
                            ></a>
                          </router-link>
                            <a class="nav-link active"
                              ><i class="fas fa-calendar-alt"></i><span id="countinbox"
                                >Go to Shortly<span id="record-count" style="float: right"></span> </span
                            ></a>
                            <a class="nav-link active"
                              ><i class="fas fa-shapes"></i><span id="countinbox"
                                >Go to Filters and labels <span id="record-count" style="float: right"></span> </span
                            ></a>
                        </div>
                        
                      </div>
                    </div>
                </div>
            </div>

              <div class="modal" id="myModal3">
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
                          <img src="../../assets/images/avt.png" style="border-radius: 50%;" width="10"/>
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
        </header>
        <div>
          <!-- <a-button type="primary" >Open Modal</a-button> -->
          <a-modal v-model:open="open_infor" title="Thông tin tài khoản" @ok="handleOkInfor">
            <br>
            <div>
              <p style="font-weight: 500;">Avatar</p>
              <img src="../../assets/images/avt.png" alt="" width="45" id="imglist">
            </div>
            <br>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700">Name</label>
              <input
                type="text"
                class="form-control"
                id=""
                :value="User.name"
              />
            </div>
            <div class="mb-3" :style="{ display: changeemail }">
              <label class="form-label" style="font-weight: 700">E-Mail</label> <br>
              <span>{{ User.email }}</span> <br>
              <a-button type="primary" style="margin-top: 2%;" @click="formEmail" >Change email</a-button>
            </div>
            <div :style="{ display: showformemail }">
              <p>Cập nhật email bạn sử dụng cho tài khoản Todoist của mình. Email của bạn hiện tại là {{ User.email }} .</p>
              <form action="" @submit.prevent="updateEmailchange">
                    <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Email mới</label>
                    <input
                      type="email"
                      class="form-control"
                      id=""
                      v-model="email"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Xác nhận email mới</label>
                    <input
                      type="email"
                      class="form-control"
                      id=""
                      v-model="checkmail"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id=""
                      v-model="password1"
                    />
                  </div>
                  <div >
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <button class="btn btn-danger" style=" margin-left: 3% ;" @click="offformemai">Cancel</button>
                    <!-- <a-button type="primary" style="margin-top: 2%; margin-left: 3% ;" @click="offformemai">Cancel</a-button> -->
                  </div>
                  <br>
                  <p style="color: red;">{{ validatechangeEmailerror }}</p>
              </form>
            </div>
            <br>
            <div class="mb-3" :style="{ display: changepassword }">
              <label class="form-label" style="font-weight: 700">Password</label> <br>
              <a-button type="primary" style="margin-top: 2%;" @click="formPassword">Change password</a-button>
            </div>
            <div :style="{ display: showformpassword }">
              <form action="" @submit.prevent="updatePasswordchange()">
                    <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Password hiện tại</label>
                    <input
                      type="password"
                      class="form-control"
                      id=""
                      v-model="password"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Password mới</label>
                    <input
                      type="password"
                      class="form-control"
                      id=""
                      v-model="passwordnew"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" style="font-weight: 700">Xác nhận password mới</label>
                    <input
                      type="password"
                      class="form-control"
                      id=""
                      v-model="passwordcheck"
                    />
                  </div>
                  <div >
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a-button type="primary" style="margin-top: 2%; margin-left: 3% ;" @click="offformPassword">Cancel</a-button>
                  </div>
              </form>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-weight: 700">Xóa tài khoản</label> <br>
              <p>Thao tác này sẽ xóa ngay lập tức tất cả dữ liệu của bạn, bao gồm nhiệm vụ, dự án, nhận xét, v.v. mà không thể hoàn tác. Tìm hiểu thêm.</p>
              <a-button type="primary" danger ghost @click="deleteuser(User.id)">Xóa tài khoản</a-button>
            </div>
          </a-modal>
        </div>
</template>
<script>
import { defineComponent, reactive, ref, toRefs, onMounted, watch,onUnmounted,watchEffect } from "vue";
import moment from "moment";
import axios from "axios";
import { message } from "ant-design-vue";
import { useRouter  } from "vue-router";
import { useRoute } from "vue-router";
export default defineComponent ({
    setup() {
    const router = useRouter();
    const route = useRoute();
    const list2Display = ref('none');
    const inforuser = ref('none');
    const isOpen1 = ref(false);
    const searchQuery = ref('');
    const searchResults = ref([]);
    const searchResultsProject = ref([]);
    const Navigation = ref('block');
    const task_search = ref('none');
    const task_search1 = ref('none');
    const projects = ref([]);
    const isActive = ref(false);
    const project_search = ref('none');
    const searchedKeywordsan = ref('block');
    const no_project = ref('none');
    const no_task = ref('none');
    const previousRoute = ref('');
    const searchedKeywords11 = ref([]);
    const User = ref([]);
    const open_infor = ref(false);
    const showformemail = ref('none');
    const changeemail = ref('block');
    const validatechangeEmailerror = ref("")

    const showformpassword = ref('none');
    const changepassword = ref('block');

    const showModalInfor = () => {
      open_infor.value = true;
      inforuser.value = "none";
      showformemail.value = "none";
      changeemail.value="block";
      showformpassword.value="none";
      changepassword.value="block";
      changeemailuser.checkmail= "";
      changeemailuser.email="";
      changeemailuser.password1=""

      //password
      changepassworduser.password = "";
      changepassworduser.passwordcheck="";
      changepassworduser.passwordnew=""
    };

    const handleOkInfor = e => {
      console.log(e);
      open_infor.value = false;
      
      
    };
    const toggleActive = () => {
      isActive.value = true;
    };
    const taskedeltail = reactive({
      id_task_deltail: "",
      task_name_deltail: "",
      task_description_deltail: "",
      deadline_deltail: "",
      priority_deltail: 1,
      id_project_deltail: 2,
    });

    const changeemailuser = reactive({
      email: "",
      checkmail: "",
      password1: ""
    });
    
    const changepassworduser = reactive({
      password: "",
      passwordnew: "",
      passwordcheck: ""
    })
    function openModal3() {
      const myModal = new bootstrap.Modal(document.getElementById("myModal3"));
      myModal.show();
      closeModalkey();
    }
    const toggleMenu = () => {
      this.$emit('toggle-menu');
    };

    const toggleList2 = () => {
      list2Display.value = list2Display.value === 'block' ? 'none' : 'block';
    };

    const toggleList3 = () => {
      inforuser.value = inforuser.value === 'block' ? 'none' : 'block';
    };

    const openModalkey = () => {
      isOpen1.value = true;
      
    };

    const formEmail = () => {
      showformemail.value = 'block';
      changeemail.value = 'none';
      offformPassword();
    }
    const offformemai = () => {
      changeemail.value = 'block';
      showformemail.value= 'none';
      changeemailuser.email= "";
      changeemailuser.checkmail = "";
      changeemailuser.password1=""
    }
    //password
    const formPassword = () => {
      showformpassword.value = 'block';
      changepassword.value = 'none';
      offformemai();
    }
    const offformPassword = () => {
      changepassword.value = 'block';
      showformpassword.value= 'none',
      changepassworduser.password="";
      changepassworduser.passwordcheck="";
      changepassworduser.passwordnew=""
    }

    const closeModalkey = () => {
      isOpen1.value = false;
      searchQuery.value= "";
      Navigation.value = 'block';
      searchResults.value=[];
      searchResultsProject.value=[];
      task_search.value = "none";
      project_search.value = "none";
      no_project.value = 'none';
      no_task.value = 'none';
      task_search1.value='none';
      searchedKeywordsan.value='block';
    };
    const handleKeyDown = (event) => {
      if (event.ctrlKey && event.key === "k") {
        event.preventDefault();
        openModalkey();
      }
    };

    onMounted(() => {
      window.addEventListener("keydown", handleKeyDown);
    });

    onUnmounted(() => {
      window.removeEventListener("keydown", handleKeyDown);
    });


    const getSearch = () => {
        if (searchQuery.value.length >= 3) {
          Navigation.value = 'none';
          searchedKeywordsan.value='none';

        } else {
          Navigation.value = 'block';
          task_search.value = "none";
          project_search.value = "none";
          no_project.value = 'none';
          no_task.value = 'none';
          searchedKeywordsan.value='block';
          // searchResultsProject.value=[];
        };

        
        const token = localStorage.getItem("token");
        // alert(token);
        if (searchQuery.value.length >= 3) {
          axios
          .get(`http://127.0.0.1:8000/api/search?query=${searchQuery.value}`,{
            headers: {
              Authorization: `Bearer ${token}`,
            },
          })
          .then((response)=>{
            if(response.status===200){
              searchResults.value = response.data.data;
               task_search.value = "block";
                if (searchResults.value.length === 0 ) {
                  // Không tìm thấy kết quả tìm kiếm
                  no_task.value = 'block';
                  task_search1.value='none'
                } else {
                  no_task.value = 'none';
                  task_search1.value='block'
                }
            }else{
              console.log('Lỗi');
            }
              
          })
          .catch(error => {
            console.error(error);
          });   
          
          axios
            .get(`http://127.0.0.1:8000/api/searchProject?query=${searchQuery.value}`,{
              headers: {
                Authorization: `Bearer ${token}`,
              },
            })
            .then((response)=>{
              if(response.status===200){
                searchResultsProject.value = response.data.data;
              // console.log(response.data);
                project_search.value = "block";
                if (searchResultsProject.value.length === 0 ) {
                  // Không tìm thấy kết quả tìm kiếm
                  no_project.value = 'block';
                } else {
                  no_project.value = 'none';
                }
              }else{
                console.log("lỗi");
              }
             
            })
            .catch(error => {
              console.error(error);
            }); 
        }else{
          searchResults.value=[];
          searchResultsProject.value=[];
          task_search1.value='none'
        }
           
    }

    const saveKeywords = () => {
      const keyword = searchQuery.value;
      const savedKeywords = localStorage.getItem('searchedKeywords');
      let searchedKeywords = savedKeywords ? JSON.parse(savedKeywords) : [];

      // Kiểm tra từ khóa đã tồn tại trong mảng searchedKeywords
      const existingIndex = searchedKeywords.findIndex((key) => key === keyword);

      // Nếu từ khóa đã tồn tại, loại bỏ nó khỏi mảng
      if (existingIndex !== -1) {
        searchedKeywords.splice(existingIndex, 1);
      }

      // Thêm từ khóa mới vào đầu mảng
      searchedKeywords.unshift(keyword);

      // Giới hạn chỉ lưu 5 từ khóa
      if (searchedKeywords.length > 5) {
        searchedKeywords = searchedKeywords.slice(0, 5);
      }

      localStorage.setItem('searchedKeywords', JSON.stringify(searchedKeywords));

      searchedKeywords11.value = searchedKeywords;
      console.log(searchedKeywords);
    };
    

    const removeKeyword = (index) => {
      if (typeof index !== 'number' || index < 0 || index >= searchedKeywords11.value.length) {
        console.error('Invalid index');
        return;
      }

      searchedKeywords11.value.splice(index, 1);
      saveKeywordsToLocalStorage(searchedKeywords11.value);
    };

    // Lấy từ localStorage
    function getKeywordsFromLocalStorage() {
      const storedKeywords = localStorage.getItem('searchedKeywords');
      return storedKeywords ? JSON.parse(storedKeywords) : [];
    }
    getKeywordsFromLocalStorage();
    // Lưu vào localStorage
    function saveKeywordsToLocalStorage(keywords) {
      localStorage.setItem('searchedKeywords', JSON.stringify(keywords));
    }


    const keywordsearchedit = (keyword) => {
      searchQuery.value = keyword;
      getSearch();
    }
    // saveKeywords();
    const showMoreResults = () => {
      const query = searchQuery.value;
      router.push({ name: 'backend-search', query: { query } });
    };

    const deltail = () => {
      const token = localStorage.getItem("token");
      axios
        .get(`http://127.0.0.1:8000/api/task/${route.params.secondId}`, {
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
          if (!response.data.id_project) {
            // Chọn "inbox" mặc định
              taskedeltail.id_project_deltail = "";
            } else {
              // Lấy giá trị id_project
              taskedeltail.id_project_deltail = response.data.id_project;
            }

          //comment

          comments.value = response.data.comment_list;
        })
        .catch((error) => {
          console.log(error);
        });
    };
    deltail();
    // console.log(id_task);
    // const addComment = () => {
    //   const token = sessionStorage.getItem("token");
    //   const formData = new FormData();
    //   formData.append("comment_text", commentadd.comment_text_add);
    //   formData.append("id_task", commentadd.id_task_add);
    //   axios
    //     .post("http://127.0.0.1:8000/api/comment", formData, {
    //       headers: {
    //         Authorization: `Bearer ${token}`,
    //       },
    //     })
    //     .then((response) => {
    //       if (response) {
    //         message.success("Bình luận thành công !!");
    //         deltail();
    //         commentadd.comment_text_add = "";
    //         window.history.back();
    //       }
    //     })
    //     .catch((error) => {
    //       console.log(error);
    //     });
    // };

    // const editComment = (commentID) => {
    //   const token = sessionStorage.getItem("token");
    //   axios
    //     .get(`http://127.0.0.1:8000/api/comment/edit/${commentID}`, {
    //       headers: {
    //         Authorization: `Bearer ${token}`,
    //       },
    //     })
    //     .then((response) => {
    //       // console.log(response);
    //       commentedit.id_task = response.data.id_task;
    //       commentedit.id = response.data.id;
    //       commentedit.comment_text = response.data.comment_text;
    //       commentedit.id_user = response.data.id_user;
    //     })
    //     .catch((error) => {
    //       console.log(error);
    //     });
    // };

    // const updateComment = () => {
    //   const token = sessionStorage.getItem("token");
    //   let commentID_edit = $("#id_comment_edit").val();
    //   // const formData = new FormData();
    //   // formData.append("comment_text", commentedit.comment_text_edit);
    //   // formData.append("id_task", commentedit.id_task_edit);
    //   // formData.append("id", commentedit.id_comment);
    //   // formData.append("id_user", commentedit.id_user_edit);
    //   axios
    //     .put(
    //       `http://127.0.0.1:8000/api/comment/update/${commentID_edit}`,
    //       commentedit,
    //       {
    //         headers: {
    //           Authorization: `Bearer ${token}`,
    //         },
    //       }
    //     )
    //     .then((response) => {
    //       console.log(response);
    //       console.log(commentedit);
    //       if (response) {
    //         message.success("Sửa bình luận thành công !!");
    //         deltail();
    //         cardDisplay_comment.value = "none";
    //         router.push({ name: "backend-app-deltail-project" });
    //       }
    //     })
    //     .catch((error) => {
    //       console.log(error);
    //     });
    // };
    const getProject = () => {
      const token = localStorage.getItem("token");
      axios
        .get("http://127.0.0.1:8000/api/project", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log(response);
          projects.value = response.data.data;
        });
    };
    getProject();

    watchEffect(() => {
      deltail();
      if (route.path !== previousRoute.value) {
        closeModalkey();
      }
    });

    const logout = () => {
      const token = localStorage.getItem("token");
      axios
        .delete("http://127.0.0.1:8000/api/logout", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          if (response) {
            localStorage.removeItem("token");
            localStorage.removeItem("searchedKeywords"); 
            message.success("Đăng xuất thành công !!");
            router.push({ name: "frontend-login" });
          }
        });
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
          // console.log(response.data.data);
          if (response) {
            User.value = response.data.data
          }
        });
    }
    deltailUser();

    const updateEmailchange = () => {
      const token = localStorage.getItem("token");
      // const formData = new FormData();
      // formData.append("email", changeemailuser.email);
      if(validatechangeEmail()){
        axios
        .put('http://127.0.0.1:8000/api/changeemail',changeemailuser, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          // console.log(response.data.data);
          if (response) {
            message.success("Đã thay đổi email thành công!!");
            changeemailuser.email = "";
            changeemailuser.password1="";
            changeemailuser.checkmail="";
            changeemail.value = 'block';
            showformemail.value= 'none';
            deltailUser();
          }
        })
        .catch((error)=> {
          console.log(error);
          message.error("Thay đổi không thành công vui lòng kiểm tra lại mật khẩu !")
        })
      }
      
    }
    
    const validatechangeEmail = () => {
      if(changeemailuser.email.trim()=== ""){
        return false;
      }

      if(changeemailuser.checkmail.trim()===""){
        return false;
      }

      if(changeemailuser.password1.trim()===""){
        return false;
      }

      if(changeemailuser.email !== changeemailuser.checkmail){
        validatechangeEmailerror.value = "Email xác nhận của bạn không khớp với email mới của bạn. Vui lòng thử lại."
        return false;
      }
      validatechangeEmailerror.value ="";
      return true;
    }

    const updatePasswordchange = () => {
      const token = localStorage.getItem("token");
      // const formData = new FormData();
      // formData.append("password", changepassworduser.passwordnew);
      // if(validatechangeEmail()){
        axios
        .put('http://127.0.0.1:8000/api/changepassword',changepassworduser, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          // console.log(response.data.data);
          if (response) {
            message.success("Đã thay đổi password thành công!!");
            changepassworduser.password="";
            changepassworduser.passwordcheck="";
            changepassworduser.passwordnew="";
            changepassword.value="block"
            showformpassword.value="none"
          }
        })
        .catch((error)=> {
          console.log(error);
          message.error("Thay đổi không thành công vui lòng kiểm tra lại mật khẩu !")
        })
      // }
    }

    function redirectToDetail(id,id_project) {
      if(id_project){
        router.push({ name: 'backend-search-deltail-task', params:{id: id_project, secondId: id}});
      }else{
        router.push({ name: 'backend-app-deltail-search', params: {secondId: id} });
      }
      
    }

    const deleteuser = (idUser) => {
      const token = localStorage.getItem('token');
      if (confirm("Bạn có chắc chắn muốn xóa tài khoản không thông tin của bạn sẽ mất hêt ?")) {
        axios
        .delete(`http://127.0.0.1:8000/api/deleteuser/${idUser}`,{
          headers: {
            Authorization: `Bearer ${token}`
          }
        })
        .then((response)=> {
          if(response){
            localStorage.removeItem("token");
            localStorage.removeItem("searchedKeywords"); 
            message.success("xóa tài khoản thành công !!");
            router.push({ name: "frontend-login" });

          }
        })
      }
      
    }
    return {
      redirectToDetail,
      open_infor,
      showModalInfor,
      handleOkInfor,
      isOpen1,
      openModal3,
      openModalkey,
      closeModalkey,
      list2Display,
      inforuser,
      toggleMenu,
      toggleList2,
      toggleList3,
      formEmail,
      Navigation,
      searchResultsProject,
      task_search,
      task_search1,
      project_search,
      no_project,
      no_task,
      searchedKeywordsan,
      previousRoute,
      showMoreResults,
      ...toRefs(taskedeltail),
      
      projects,
      User,
      getSearch,
      searchQuery,
      searchResults,
      saveKeywords,
      searchedKeywords11,
      removeKeyword,
      getKeywordsFromLocalStorage,
      keywordsearchedit,
      logout,
      showformemail,
      changeemail,
      offformemai,
      ...toRefs(changeemailuser),
      validatechangeEmailerror,
      showformpassword,
      changepassword,
      formPassword,
      offformPassword,
      updateEmailchange,
      ...toRefs(changepassworduser),
      updatePasswordchange,
      deleteuser
     
    };
  }
})
</script>
<style scoped>
.router-link-exact-active,
.router-link-active {
  color: inherit; /* Giữ màu sắc mặc định */
  text-decoration: none; /* Loại bỏ gạch chân */
}
.task_search_ul:hover {
  background-color: lightgray;
}

.searchkw:hover {
  background-color: lightgray;
}
.nav-link:hover {
  background-color: lightgray;
}
.nav-link.active {
  /* background-color: #eeeeee; */
  color: black;
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


a.nav-link i {
  margin-right: 10px;
}
.nav-link {
  display: flex;
  align-items: center;
  padding: 8px;
}

.nav-link .menupro {
  margin-right: 60%;
  width: 10%;
  font-weight: 600;
  font-size: 1.2rem;
}


#imglist {
  /* margin-left: 85%; */
  border-radius: 50%;
  padding-top: 1%;
}

#imglist2 {
  /* margin-right: 85%; */
  border-radius: 50%;
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

#modalkey {
  position: fixed;
  top: -70px;
  left: 0;
  width: 100%;
  height: 100%;
  border: 1px solid rgba(0, 0, 0, 0.3);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-dialog {
  width: 40% !important;
  max-width: 800px;
}

.modal-content {
  background-color: white;
  padding: 20px;
}
  .hea {
  background: #DC4C3E;
  height: 40px;

}

.hea .menu_icon {
  background-image: none;
  /* Xóa hình nền của SVG */
}

.fa-bars {
  font-size: 1.5rem;
  color: white;
  margin-left: 10px;
  margin-top: 6px;
}

.fa-house {
  font-size: 1.5rem;
  color: white;
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
.list {
  display: none;
  position: relative;
  background: white;
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 10px;
  margin-left: 55px;
  margin-top: 2%;
  width: 80%;
  list-style-type: none;
}

#imglist {
  /* margin-left: 85%; */
  border-radius: 50%;
}

#imglist2 {
  /* margin-right: 85%; */
  border-radius: 50%;
}

.list li:hover {
  background-color: #EEEEEE;
  height: 120% !important;
}

.btnaaa {
  background: none;
  border: none;
  width: 100%;
}

.spanname1 {

  display: flex;
  justify-content: start;
  font-weight: 700;
  font-size: 0.9rem;
}

.spanname2 {

  display: flex;
  justify-content: start;
  font-weight: 300;
  font-size: 0.9rem;
  color: #8A8A8A;
}

.spanname3 {
  display: flex;
  justify-content: start;
  font-weight: 300;
  font-size: 1rem;
  color: #3a3a3a;
}

.cong {
  color: #3a3a3a;
  font-size: 1rem;
}
#calendar {
  max-width: 900px;
  margin: 0 auto;
}

.headerdiv {
  display: flex;
  justify-content: end;
  padding-right: 10px;
}
.svgicon {
  position: relative;
  color: white;
  margin-right: 13px;
  margin-top: 7px;
}

.list2 {
  display: none;
  position: absolute;
  background: white;
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 10px;
  margin-left: -250px;
  margin-top: 10px;
  width: 18%;
  list-style-type: none;
}


.btnlist:hover {
  background-color: gray;
}

.btnlist {
  position: relative;
  width: 100%;
}

.lilist {
  display: flex;
  justify-content: start;
}

.spanlist {
  margin-left: 10px;
}

hr {
  border: none;
  height: 1px;
  background-color: #cac9c9;
  margin: 4px 0;
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