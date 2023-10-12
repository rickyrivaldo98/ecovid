<header class="fixed w-full" style="z-index: 99;">
    <nav id="navbar" class="bg-white border-gray-200 py-4 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="/" class="flex items-center">
                <img src="<?=base_url()?>img/covid-head.svg" class="h-6 mr-3 sm:h-9" alt="dashboard-Logo" />
            </a>
            <div class="flex items-center lg:order-2">
                <?php if(logged_in()&&(has_permission('menu-dashboard'))): ?>
                <ul class="md:flex  flex-row flex-wrap items-center lg:ml-auto mr-0">
                    <button id="dropdownAvatarButton" data-dropdown-toggle="dropdownAvatar"
                        class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-bgFooter dark:hover:text-bgFooter dark:text-white"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <div class="relative">
                            <img class="w-8 h-8 mr-2 rounded-full" src="<?=base_url()?>img/<?=user()->profil_picture?>"
                                alt="user photo">
                            <span
                                class="bottom-0 left-6 absolute  w-3 h-3 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                        </div>
                        <?= user()->nama_lengkap?>
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown profile -->
                    <div id="dropdownAvatar"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="font-medium "> <?=(get_role(user()->id)[0]->name)?></div>
                            <div class="truncate text-xs">
                                <?= user()->email?>
                            </div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownInformdropdownAvatarButtonationButton">
                            <li>
                                <a href="/profile"
                                    class="block px-4 py-2 <?php if (htmlentities($meta['identifier'])=='is_profile'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> dark:hover:text-white">Settings</a>
                            </li>
                            <?php if((in_groups('superAdmin')||in_groups('admin'))&&(has_permission('menu-list-puskesmas')||has_permission('menu-list-admin'))): ?>
                            <li>
                                <a href="/puskesmas"
                                    class="block px-4 py-2 <?php if (htmlentities($meta['identifier'])=='is_list_puskesmas'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> dark:hover:text-white">Data
                                    Puskesmas</a>
                            </li>
                            <?php endif; ?>
                            <?php if((in_groups('superAdmin')||in_groups('admin')||in_groups('puskesmas'))&&(has_permission('menu-list-puskesmas')||has_permission('menu-list-admin'))): ?>
                    
                    <li>
                    <a href="/dataaktual"
                                    class="block px-4 py-2 <?php if (htmlentities($meta['identifier'])=='is_list_data_aktual'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> dark:hover:text-white">Data
                                    Aktual</a>
                       
                    </li>
                    <?php endif; ?>
                        </ul>
                        <div class="py-2">
                            <a href="/logout"
                                class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 dark:hover:bg-red-600 dark:text-red-200 dark:hover:text-white"><i
                                    class="fas fa-power-off mr-2"></i>Sign
                                out</a>
                        </div>
                    </div>
                </ul>
                <?php else: ?>
                <a href="/login"
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"><i class="fas fa-user-nurse mr-2"></i>Login</a>
                <?php endif; ?>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <?php if((in_groups('superAdmin')||in_groups('admin'))&&(has_permission('menu-list-puskesmas')||has_permission('menu-list-admin'))): ?>
                    <li>
                        <a href="/"
                            class="block py-2 pl-3 pr-4 bg-transparent  <?php if (htmlentities($meta['identifier'])=='is_home'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> lg:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/puskesmas"
                            class="block py-2 pl-3 pr-4 bg-transparent  <?php if (htmlentities($meta['identifier'])=='is_list_puskesmas'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> lg:p-0 dark:text-white">Managemen
                            Puskesmas</a>
                    </li>
                    <?php endif; ?>
                    <?php if((in_groups('superAdmin')||in_groups('admin')||in_groups('puskesmas'))&&(has_permission('menu-list-puskesmas')||has_permission('menu-list-admin'))): ?>
                    
                    <li>
                        <a href="/dataaktual"
                            class="block py-2 pl-3 pr-4 bg-transparent  <?php if (htmlentities($meta['identifier'])=='is_list_data_aktual'){echo 'text-purple-700';}else{echo 'text-gray-700 hover:text-purple-700';} ?> lg:p-0 dark:text-white">Data Aktual</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>