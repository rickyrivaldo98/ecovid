<?= $this->extend('layouts/lending_layout'); ?>

<?= $this->section('lending-content'); ?>
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
    /*Overrides for Tailwind CSS */

    /*Form fields*/
    .dataTables_length label,
    .dataTables_filter label,
    .dataTables_info,
    .dataTables_paginate .paginate_button {
        font-size: 14px;
    }

    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568;
        /*text-gray-700*/
        padding-left: 1rem;
        /*pl-4*/
        padding-right: 1rem;
        /*pl-4*/
        padding-top: .5rem;
        /*pl-2*/
        padding-bottom: .5rem;
        /*pl-2*/
        line-height: 1.25;
        /*leading-tight*/
        border-width: 2px;
        /*border-2*/
        border-radius: .25rem;
        border-color: #edf2f7;
        /*border-gray-200*/
        background-color: #edf2f7;
        /*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;
        /*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #571deb !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        cursor: pointer !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    .dataTables_paginate .previous:hover,
    .dataTables_paginate .next:hover {

        background: #eaf5fc !important;
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #3E7EAC !important;
        /*bg-indigo-500*/
    }
</style>
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
                            <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2 dark:text-gray-400">Managemen
                                Puskesmas</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1
                class="text-white max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-5xl dark:text-white">
                Managemen Puskesmas</h1>
        </div>
    </div>
</section>
<!-- End block -->

<!-- Start block -->
<section class=" bg-bgContent dark:bg-gray-800 ">
    <div
        class="relative -top-4 lg:-top-14 bg-white border-solid border-2 border-gray-100 rounded-lg max-w-screen-xl px-4 py-6 mx-auto  lg:px-6">
        <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                    <div class="flex flex-row justify-between items-center">
                        <div>
                            <h5 class="text-blueGray-400  font-bold text-lg ">
                                List Data User Puskesmas
                            </h5>
                            <p class="text-sm">Jawa Tengah</p>
                        </div>
                        <div>
                            <button data-te-toggle="modal" data-te-target="#modalAddUser" data-te-ripple-init
                                data-te-ripple-color="light"
                                class="bg-green-500 rounded-lg text-xs md:text-sm px-3 py-2 text-white hover:bg-green-600"><i
                                    class="fas fa-plus mr-1"></i> Add
                                User</button>
                        </div>
                    </div>

                    <!-- <span class="font-semibold text-xl text-blueGray-700">
                        350,897
                    </span> -->
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

        <div class="flex-auto p-4">
            <table id="example" class="stripe hover text-sm"
                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Nama</th>
                        <th data-priority="3">Username</th>
                        <th data-priority="4">Email</th>
                        <th data-priority="5">No HP</th>
                        <th data-priority="6">Kabupaten</th>
                        <th data-priority="7">Puskesmas</th>
                        <th data-priority="8">Alamat</th>
                        <th data-priority="9">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($meta['data_user'] as $data) :?>
                    <tr>
                        <td>
                            <?= $no++  ?>
                        </td>
                        <td>
                            <?= $data['nama_lengkap']  ?>
                        </td>
                        <td>
                            <?= $data['username']  ?>
                        </td>
                        <td>
                            <?= $data['email']  ?>
                        </td>
                        <td>
                            <?= $data['noHP']  ?>
                        </td>
                        <td>
                            <?= $data['nama_kab_kota']  ?>
                        </td>
                        <td>
                            <?= $data['nama_puskesmas']  ?>
                        </td>
                        <td>
                            <?= $data['alamat']  ?>
                        </td>
                        <td class="flex flex-row justify-center items-center space-x-2">
                            <a href="#" type="button" data-id="<?= $data['id'] ?>" onclick="editUser(this)"
                                class="btn-popupz-edit text-center w-10 p-2 text-xs text-blue-600 bg-blue-200 rounded-md dark:text-blue-500 "><i
                                    class="fas fa-edit"></i>
                            </a>
                            <a href="#" type="button" data-id="<?= $data['id'] ?>" onclick="resetPassword(this)"
                                class="btn-popupz-reset text-center w-10  p-2 text-xs text-yellow-600 bg-yellow-200 rounded-md dark:text-yellow-500 "><i
                                    class="fas fa-rotate-left"></i>
                            </a>
                            <a href="#" type="button" data-id="<?= $data['id'] ?>" onclick="deleteUser(this)"
                                class="btn-popupz text-center w-10  p-2 text-xs text-red-600 bg-red-200 rounded-md dark:text-red-500 "><i
                                    class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- End block -->
<!-- Modal -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddUser" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddUserLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Registrasi User Puskesmas
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
            <form action="/puskesmas" method="POST" class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-fullname">
                                Nama Lengkap User
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-fullname" name="grid-fullname" type="text" placeholder="Jonathan Yeho"
                                autocomplete="off" autofill="off" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-username">
                                Username
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-username" name="grid-username" type="text" placeholder="ex: jonathan12"
                                autocomplete="off" autofill="off" required>
                            <!-- border-red-500 -->
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-nohp">
                                No Handphone
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-nohp" name="grid-nohp" type="text" placeholder="081*********"
                                autocomplete="off" autofill="off" pattern="^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-kabupaten">
                                Kabupaten/Kota
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-kabupaten" name="grid-kabupaten">
                                    <option value="" selected disabled>Pilih Kabupaten</option>
                                    <?php foreach($meta['data_kabupaten'] as $data): ?>
                                    <option value="<?=$data->id_kab_kota?>"><?=$data->nama_kab_kota?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-puskesmas">
                                Nama Puskesmas
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-puskesmas" name="grid-puskesmas">
                                    <option value="" selected disabled>Pilih Puskesmas</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="submit"
                        class="inline-block rounded bg-green-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                        <i class="fas fa-save mr-1"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalEditUser" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Edit User Puskesmas
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
            <form id="form_edit_user" action="" method="POST" class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="edit-fullname">
                                Nama Lengkap User
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="edit-fullname" name="edit-fullname" type="text" placeholder="Jonathan Yeho"
                                autocomplete="off" autofill="off" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="edit-username">
                                Username
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="edit-username" name="edit-username" type="text" placeholder="ex: jonathan12"
                                autocomplete="off" autofill="off" required>
                            <!-- border-red-500 -->
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="edit-nohp">
                                No Handphone
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="edit-nohp" name="edit-nohp" type="text" placeholder="081*********"
                                autocomplete="off" autofill="off" pattern="^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="edit-kabupaten">
                                Kabupaten/Kota
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="edit-kabupaten" name="edit-kabupaten">
                                    <option value="" disabled>Pilih Kabupaten</option>
                                    <?php foreach($meta['data_kabupaten'] as $data): ?>
                                    <option value="<?=$data->id_kab_kota?>"><?=$data->nama_kab_kota?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="edit-puskesmas">
                                Nama Puskesmas
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="edit-puskesmas" name="edit-puskesmas">
                                    <option value="" selected disabled>Pilih Puskesmas</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="submit"
                        class="inline-block rounded bg-blue-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Reset -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalResetUser" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalResetUserLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Konfirmasi Reset Password
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
            <div data-te-modal-body-ref class=" p-4">
                <p>Password akan di reset ke setelan default.</p>
            </div>
            <div
                class="modal-reset-response flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">

            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalDeleteUser" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalDeleteUserLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Konfirmasi Delete User
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
            <div data-te-modal-body-ref class=" p-4">
                <p>Password akan di reset ke setelan default.</p>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end modal-delete-response rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    function callAPIDropdown(parent, child) {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>puskesmas/dropdownPuskesmas",
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
    function resetPassword(data) {
        var user_id = data.getAttribute("data-id");
        $.ajax({
            type: 'post',
            url: '<?= base_url(); ?>puskesmas/resetModal',
            data: { user_id: user_id },
            success: function (response) {
                $('.modal-reset-response').html(response);
                $('#modalResetUser').modal('show');
            }
        });
    }
    function deleteUser(data) {
        var user_id = data.getAttribute("data-id");
        $.ajax({
            type: 'post',
            url: '<?= base_url(); ?>puskesmas/deleteModal',
            data: { user_id: user_id },
            success: function (response) {
                $('.modal-delete-response').html(response);
                $('#modalDeleteUser').modal('show');
            }
        });
    }
    function editUser(data) {
        var user_id = data.getAttribute("data-id");
        $.ajax({
            type: 'get',
            url: '<?= base_url(); ?>puskesmas/editModal',
            data: { user_id: user_id },
            dataType: "json",
            success: function (response) {
                document.querySelector('#edit-username').value = response[0].username
                document.querySelector('#edit-fullname').value = response[0].nama_lengkap
                document.querySelector('#edit-nohp').value = response[0].noHP
                var parentValues = document.querySelector('#edit-kabupaten').options
                for (i = 0; i < parentValues.length; i++) {
                    if (parentValues[i].value == response[0].id_kab_kota) {
                        if (parentValues[i].hasAttribute('selected')) {
                            parentValues[i].removeAttribute('selected')
                        }
                        parentValues[i].setAttribute('selected', 'selected')
                    }
                }
                callAPIDropdown('edit-kabupaten', 'edit-puskesmas')
                document.querySelector("#form_edit_user").action = `/puskesmas/editUser/${response[0].id}`;
                $('#modalEditUser').modal('show');
            }
        });
    }
    $(document).ready(function () {
        $("#grid-kabupaten").change(function () {
            callAPIDropdown(this.id, 'grid-puskesmas')
        });
        $("#edit-kabupaten").change(function () {
            callAPIDropdown(this.id, 'edit-puskesmas')
        });
        var table = $('#example').DataTable({
            responsive: true
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
<?= $this->endSection(); ?>