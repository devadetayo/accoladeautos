<nav class="d-flex flex-column w-full justify-content-between align-items-center h-auto z-10 position-relative navbar--scrolling border-wb-1 border-w-0 border-solid border-slate-100 dark:border-slate-800" style="top: 0;">
    <section class="d-flex w-full px-40 sm:px-16 py-16 sm:py-12 justify-content-between align-items-center position-relative sm:justify-content-between">
        <a href="<?php echo ROOT ?>/home" class="d-none sm:d-flex justify-content-center align-items-center font-s-lg no-decoration-text h-min font-w-medium color-black dark:color-white hover:font-w-medium font-mono parent gap-8">
            <img src="<?php echo ROOT ?>/assets/images/logo-light.png" class="dis-light" width="32" height="32"><span class="sm:d-none text-capitalize">codeace</span>
        </a>

        <h3 class="font-w-medium text-capitalize font-s-xl color-black dark:color-white sm:d-none"><?php echo $url[1]; ?></h3>

        <ul class="d-flex h-full gap-8 w-auto">

            <li class="d-flex w-full h-full align-items-center justify-content-center">
                <a class="d-flex justify-content-center align-items-center h-full no-decoration-text border-round-full p-8 hover:color-blue-500 search-trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M456.69,421.39,362.6,327.3a173.81,173.81,0,0,0,34.84-104.58C397.44,126.38,319.06,48,222.72,48S48,126.38,48,222.72s78.38,174.72,174.72,174.72A173.81,173.81,0,0,0,327.3,362.6l94.09,94.09a25,25,0,0,0,35.3-35.3ZM97.92,222.72a124.8,124.8,0,1,1,124.8,124.8A124.95,124.95,0,0,1,97.92,222.72Z"/></svg>
                </a>

                <div class="search-wrapper d-none justify-content-center align-items-center w-44 position-relative sm:w-full z-40 sm:bg-white dark:sm:bg-slate-900 sm:d-none sm:position-absolute" style="top: 0; left: 0;">
                    <form class="search-form w-full" method="POST" action="<?php echo ROOT ?>/search">
                        <label class="w-full d-flex align-items-center justify-content-center position-relative">
                            <input type="text" name="search-term" class="bg-transparent search-box w-full h-24 border-round-pill bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-w-2 border-solid pl-48 focus:border-blue-500 transition-duration-300 transition-ease-in-out transition-property-all" placeholder="Looking for something" value="">
                            <span class="position-absolute" style="left: 12px; top: 12px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor" width="24" height="24" class="search-icon"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"/></svg></span>
                        </label>
                    </form>
                </div>
            </li>

            <li class="w-full h-auto d-none dark:d-flex">
                <a href="<?php echo ROOT ?>/home" class="d-flex align-items-center justify-content-start p-8 gap-8 w-full h-auto no-decoration-text hover:bg-white hover:color-black dark:hover:bg-slate-800 dark:hover:color-white active:color-blue-500 border-round-full light-mode">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M120,40V32a8,8,0,0,1,16,0v8a8,8,0,0,1-16,0Zm8,24a64,64,0,1,0,64,64A64.07,64.07,0,0,0,128,64ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-8-8A8,8,0,0,0,50.34,61.66Zm0,116.68-8,8a8,8,0,0,0,11.32,11.32l8-8a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l8-8a8,8,0,0,0-11.32-11.32l-8,8A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l8,8a8,8,0,0,0,11.32-11.32ZM40,120H32a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Zm88,88a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-8A8,8,0,0,0,128,208Zm96-88h-8a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Z"/></svg>
                </a>
            </li>

            <li class="d-flex w-full h-auto">
                <a class="d-flex align-items-center justify-content-start p-8 gap-8 w-full h-auto no-decoration-text hover:bg-white hover:color-black dark:hover:bg-slate-800 dark:hover:color-white active:color-blue-500 border-round-full dark-mode open-calendar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z"/></svg></a>
            </li>

            <div class="d-flex align-items-center position-relative dropdown">
                <a class="d-flex justify-content-center align-items-center p-4 bg-blue-500 border-round-pill dropdown-trigger gap-8 no-decoration-text w-auto" style="height: 32px; width: 32px;">
                    <span class="border-round-pill d-flex overflow-hidden w-full h-full">
                        <img src="<?php echo ROOT ?>/assets/images/avatars/male.jpg" class="d-flex object-fit-cover object-position-center w-full h-full">
                    </span>
                </a>
                <ul class="position-absolute p-0 h-0 d-flex flex-column bg-white dark:bg-slate-800 box-shadow-2xl border-round-lg transition-property-all transition-ease-in-out transition-duration-300 overflow-hidden dropdown-content" style="right: 0; top: 48px; min-width: 180px;">
                    <li class="d-flex align-items-center justify-content-start"><a href="<?php echo ROOT ?>/profile/<?php echo $row['username']; ?>" class="d-flex align-items-center justify-content-start w-full px-8 py-8 gap-8 no-decoration-text hover:bg-slate-50 dark:hover:bg-slate-900 hover:color-slate-500 dark:hover:color-white border-solid border-round-lg border-wb-1 border-w-0 border-slate-50 dark:border-slate-900"><svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M332.64,64.58C313.18,43.57,286,32,256,32c-30.16,0-57.43,11.5-76.8,32.38-19.58,21.11-29.12,49.8-26.88,80.78C156.76,206.28,203.27,256,256,256s99.16-49.71,103.67-110.82C361.94,114.48,352.34,85.85,332.64,64.58Z"/><path d="M432,480H80A31,31,0,0,1,55.8,468.87c-6.5-7.77-9.12-18.38-7.18-29.11C57.06,392.94,83.4,353.61,124.8,326c36.78-24.51,83.37-38,131.2-38s94.42,13.5,131.2,38c41.4,27.6,67.74,66.93,76.18,113.75,1.94,10.73-.68,21.34-7.18,29.11A31,31,0,0,1,432,480Z"/></svg> Profile</a></li>
                    <li class="d-flex align-items-center justify-content-start"><a href="<?php echo ROOT ?>/logout" class="d-flex align-items-center justify-content-start w-full px-8 py-8 gap-8 no-decoration-text hover:bg-slate-50 dark:hover:bg-slate-900 hover:color-slate-500 dark:hover:color-white"><svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M160,256a16,16,0,0,1,16-16H320V136c0-32-33.79-56-64-56H104a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H264a56.06,56.06,0,0,0,56-56V272H176A16,16,0,0,1,160,256Z"/><path d="M459.31,244.69l-80-80a16,16,0,0,0-22.62,22.62L409.37,240H320v32h89.37l-52.68,52.69a16,16,0,1,0,22.62,22.62l80-80a16,16,0,0,0,0-22.62Z"/></svg> Logout</a></li>
                </ul>
            </div>

            <li class="w-full h-full d-none sm:d-flex" id="showSideNav">
                <a class="d-flex justify-content-center align-items-center h-full no-decoration-text border-round-full p-8 hover:color-blue-500 hover:bg-slate-100 dark:hover:bg-slate-800 active:bg-slate-300 dark:active:bg-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"/></svg>
                </a>
            </li>
        </ul>
    </section>

</nav>