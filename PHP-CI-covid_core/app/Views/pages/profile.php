<?= $this->extend('layouts/lending_layout'); ?>

<?= $this->section('lending-content'); ?>
<script src="https://cdn.jsdelivr.net/npm/tw-elements@1.0.0-beta1/dist/js/index.min.js"></script>
<!-- Start block -->
<section class=" dark:bg-gray-900"
    style="background: url('<?=base_url()?>img/banner-puskesmas.png'); background-size: cover;">
    <div
        class="grid max-w-screen-xl px-4 pt-24 pb-16 md:pt-32 md:pb-24 mx-auto lg:gap-8 xl:gap-0 lg:py-28 lg:grid-cols-12 lg:pt-20 ">
        <div class="mr-auto place-self-center lg:col-span-7 lg:py-10 space-y-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-white dark:text-gray-400 dark:hover:text-white underline">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-300 md:ml-2 dark:text-gray-400">Settings</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1
                class="text-white max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-5xl dark:text-white">
                Edit Data Profile</h1>
        </div>
    </div>
</section>
<!-- End block -->

<!-- Start block -->
<section class=" bg-bgContent dark:bg-gray-800 ">
    <div
        class=" relative -top-4 lg:-top-14 bg-white border-solid border-2 border-gray-100 rounded-lg max-w-screen-xl px-4 py-6 mx-auto  lg:px-6">
        <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                    <div class="flex flex-row justify-between items-center">
                        <div>
                            <h5 class="text-blueGray-400  font-bold text-lg ">
                                Detail Profile
                            </h5>
                            <p class="text-sm">
                                <?= user()->nama_lengkap?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-auto px-4">
            <hr>
        </div>
        <?php if(session()->getFlashData('success')): ?>
        <div class="flex-auto px-4">
            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-green-100 py-5 px-6 text-base text-green-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <?= session()->getFlashData('success')?>
            </div>
        </div>
        <?php elseif(session()->getFlashData('error')) : ?>
        <div class="flex-auto px-4">
            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-red-100 py-5 px-6 text-base text-red-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <?= session()->getFlashData('error')?>
            </div>
        </div>
        <?php endif; ?>
        <div class="flex-auto px-4 pt-4 ">
            <div class="flex items-center space-x-4">
                <img class="w-28 h-28 rounded" src="<?=base_url()?>img/<?=user()->profil_picture?>" alt="profile-img">
                <div class="flex flex-col justify-center align-items-center space-y-4">
                    <div class="space-y-2 md:space-y-0">
                        <button
                            class="bg-green-500 rounded-lg text-sm md:text-sm px-3 py-2 text-white hover:bg-green-600 shadow-md"
                            data-te-toggle="modal" data-te-target="#photoModal" data-te-ripple-init
                            data-te-ripple-color="light"><i class="fas fa-upload mr-1"></i>Upload
                            new photo</button>
                        <button onclick="window.location.href='/profile'"
                            class="border border-gray-400 bg-transparent rounded-lg text-xs md:text-sm px-3 py-2 text-gray-400 hover:bg-gray-400 hover:text-white shadow-md"><i
                                class="fas fa-rotate-left mr-1"></i>Reset</button>
                    </div>
                    <div class="font-medium dark:text-white">
                        <p class="text-xs italic text-gray-500 dark:text-gray-400">Allowed JPG or PNG. Max size of
                            1000Kb
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-auto p-4">
            <form id="form_edit_profile" action="/profile/editUser/<?=user()->id?>" method="POST" autocomplete="off"
                autofill="off">
                <?= csrf_field() ?>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="edit-username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="edit-username" name="edit-username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= user()->username?>" placeholder="username" required>
                    </div>
                    <div>
                        <label for="edit-email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        </label>
                        <input type="email" id="edit-email" name="edit-email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="email@gmail.com" value="<?= user()->email?>"
                            pattern="[\w]*@*[a-z]*\.*[\w]{5,}(\.)*(com)*(@gmail\.com)" required>
                    </div>
                    <div>
                        <label for="edit-fullname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap</label>
                        <input type="text" id="edit-fullname" name="edit-fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Lengkap" value="<?= user()->nama_lengkap?>" required>
                    </div>
                    <div>
                        <label for="edit-nohp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            HP
                        </label>
                        <input type="tel" id="edit-nohp" name="edit-nohp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="081*********" pattern="^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$"
                            value="<?= user()->noHP?>" required>
                    </div>
                    <div>
                        <label for="edit-kabupaten"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota
                        </label>

                        <select id="edit-kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 <?php if(!(in_groups('superAdmin')&&(has_permission('edit-profile-kabupaten')||has_permission('edit-profile-puskesmas')))){
                                echo 'cursor-not-allowed';
                            }else{
                                echo 'cursor-pointer ';
                            } ?>" name="edit-kabupaten" required <?php
                            if(!(in_groups('superAdmin')&&(has_permission('edit-profile-kabupaten')||has_permission('edit-profile-puskesmas')))){
                            echo 'disabled' ; } ?>>
                            <option value="" selected disabled>Sedang Memuat</option>
                            <?php foreach($meta['data_kabupaten'] as $data): ?>
                            <option value="<?=$data->id_kab_kota?>"><?=$data->nama_kab_kota?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="edit-puskesmas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Puskesmas
                        </label>
                        <select id="edit-puskesmas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 <?php if(!(in_groups('superAdmin')&&(has_permission('edit-profile-kabupaten')||has_permission('edit-profile-puskesmas')))){
                                echo 'cursor-not-allowed';
                            }else{
                                echo 'cursor-pointer ';
                            } ?>" name="edit-puskesmas" required>
                            <option value="" selected disabled>Sedang Memuat</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                            required>
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pastikan
                        data yang diisi <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">benar dan
                            valid</a>.</label>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                        class="fas fa-save mr-2"></i>Simpan</button>
            </form>
        </div>
    </div>
</section>
<!-- End block -->
<!-- Start block -->
<section class=" bg-bgContent dark:bg-gray-800 mb-12">
    <div
        class=" relative top-3 md:top-4 lg:-top-6 bg-white border-solid border-2 border-gray-100 rounded-lg max-w-screen-xl px-4 py-6 mx-auto  lg:px-6 ">
        <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                    <div class="flex flex-row justify-between items-center">
                        <div>
                            <h5 class="text-blueGray-400  font-bold text-lg ">
                                Ubah Password
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-auto px-4">
            <hr>
        </div>
        <div class="flex-auto px-4 pt-4">
            <div id="alert-4"
                class="flex p-4  text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                role="alert">
                <i class="fa-solid fa-lock fa-beat-fade pt-1"
                    style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Password akan langsung diubah menjadi password yang baru. Pastikan mengisi dengan <a href="#"
                        class="font-semibold underline hover:no-underline">benar</a>.
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-4" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <?php if(session()->getFlashData('success_pass')): ?>
        <div class="flex-auto px-4">
            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-green-100 py-5 px-6 text-base text-green-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <?= session()->getFlashData('success_pass')?>
            </div>
        </div>
        <?php elseif(session()->getFlashData('error_pass')) : ?>
        <div class="flex-auto px-4">
            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-red-100 py-5 px-6 text-base text-red-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <?= session()->getFlashData('error_pass')?>
            </div>
        </div>
        <?php endif; ?>
        <div class="flex-auto p-4">
            <?php $validation = \Config\Services::validation(); ?>
            <form action="/profile/editPassword/<?=user()->id?>" method="post" autocomplete="off">
                <div class="mb-6 relative">
                    <label for="edit_old_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
                    <input type="password" id="edit_old_password" name="edit_old_password" autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                    <i id="eye_old" class="fas fa-eye-slash absolute top-10 right-3 cursor-pointer"
                        onclick="showPassword('edit_old_password',this.id)"></i>
                </div>
                <div class="mb-6 relative">
                    <label for="edit_new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                    <input type="password" id="edit_new_password" name="edit_new_password" autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                    <i id="eye_new" class="fas fa-eye-slash absolute top-10 right-3 cursor-pointer"
                        onclick="showPassword('edit_new_password',this.id)"></i>
                </div>
                <div class="mb-6 relative">
                    <label for="edit_confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="edit_confirm_password" autocomplete="off" name="edit_confirm_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                    <i id="eye_confirm" class="fas fa-eye-slash absolute top-10 right-3 cursor-pointer"
                        onclick="showPassword('edit_confirm_password',this.id)"></i>
                </div>
                <button type="submit"
                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800"><i
                        class="fas fa-save mr-2"></i>Simpan</button>
            </form>

        </div>
    </div>
</section>
<!-- Modal edit photo-->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="photoModal" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="photoModalLabel"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Edit Foto Profil
                </h5>
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="/profile/editFotoProfil/<?=user()->id?>" method="POST" enctype="multipart/form-data"
                class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <div class="flex items-center justify-center w-full">
                        <label for="profil_picture"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div id="label-inputz" class=" flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX.
                                    1000Kb)</p>
                            </div>
                            <div id="label-preview" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
                                <img id="img-preview" class="w-36 h-36 rounded mb-2"
                                    src="<?=base_url()?>img/<?=user()->profil_picture?>" alt="profile-img">
                                <p id="nama-preview" class="text-xs text-gray-500 dark:text-gray-400">title.jpeg</p>
                            </div>
                            <input type="file" class="hidden" id="profil_picture" name="profil_picture"
                                onchange="previewImage()" />
                        </label>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="submit"
                        class="inline-block rounded bg-bgFooter px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                        <i class="fas fa-save mr-1"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End block -->
<script>
    var user_id = "<?=user()->id?>"
    function previewImage() {
        const reader = new FileReader()
        const inputImg = document.querySelector('#profil_picture')
        const areaInput = document.querySelector('#label-inputz')
        const areaPreview = document.querySelector('#label-preview')
        const imgPreview = document.querySelector('#img-preview')
        const namaPreview = document.querySelector('#nama-preview')
        namaPreview.textContent = inputImg.files[0].name
        reader.readAsDataURL(inputImg.files[0])
        reader.onload = function (e) {
            imgPreview.src = e.target.result
        }
        if (areaPreview.classList.contains('hidden')) {
            areaPreview.classList.remove('hidden')
            areaInput.classList.add('hidden')
        }
    }
    function showPassword(fields, eye) {
        document.querySelector(`#${fields}`).type = document.querySelector(`#${fields}`).type != 'password' ? 'password' : 'text'
        if (document.querySelector(`#${eye}`).classList.contains('fa-eye')) {
            document.querySelector(`#${eye}`).classList.remove('fa-eye')
            document.querySelector(`#${eye}`).classList.add('fa-eye-slash')
        } else {
            document.querySelector(`#${eye}`).classList.remove('fa-eye-slash')
            document.querySelector(`#${eye}`).classList.add('fa-eye')
        }
    }
    function callAPIDropdown(parent, child) {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>profile/dropdownPuskesmas",
            data: { id_kabupaten: $(`#${parent}`).val() },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (res) {
                $(`#${child}`).html(res.list_puskesmas);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
    $(document).ready(function () {
        $.ajax({
            type: 'get',
            url: '<?= base_url(); ?>profile/editModal',
            data: { user_id: user_id },
            dataType: "json",
            success: function (response) {
                // document.querySelector('#edit-alamat').value = response[0].alamat
                var parentValues = document.querySelector('#edit-kabupaten').options
                for (i = 0; i < parentValues.length; i++) {
                    if (i == 0) {
                        parentValues[0].innerHTML = 'Pilih Kabupaten'
                    }
                    if (parentValues[i].value == response[0].id_kab_kota) {
                        if (parentValues[i].hasAttribute('selected')) {
                            parentValues[i].removeAttribute('selected')
                        }
                        parentValues[i].setAttribute('selected', 'selected')
                    }
                }
                callAPIDropdown('edit-kabupaten', 'edit-puskesmas')
            }
        });
        $("#edit-kabupaten").change(function () {
            callAPIDropdown(this.id, 'edit-puskesmas')
        });
    });
</script>
<?= $this->endSection(); ?>