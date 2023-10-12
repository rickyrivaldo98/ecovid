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
                            <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2 dark:text-gray-400">Daftar Data Aktual Covid</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1
                class="text-white max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-5xl dark:text-white">
                Data Aktual Covid</h1>
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
                                List Data Aktual Covid 
                            </h5>
                            <p class="text-sm">Jawa Tengah</p>
                        </div>
                        <div>
                            <div class="flex flex-row justify-between items-center gap-2">
                                <div>
                                    <p class="text-sm">Status : </p>
                                </div>
                                <button 
                                class="bg-green-500 rounded-lg text-xs md:text-sm px-3 py-2 text-white hover:bg-green-600"><?=(get_role(user()->id)[0]->name) ?></button>
                                <?php if (user()->id_kabupaten && user()->id_kabupaten!=''): ?>
                                    <?php if((get_role(user()->id)[0]->name)=='puskesmas'): ?>
                                        <button 
                                    class="bg-green-500 rounded-lg text-xs md:text-sm px-3 py-2 text-white hover:bg-green-600"><?=(get_puskesmas(user()->id_puskesmas)[0]->nama_puskesmas) ?></button>
                                    <?php else: ?>
                                        <button 
                                    class="bg-green-500 rounded-lg text-xs md:text-sm px-3 py-2 text-white hover:bg-green-600"><?=(get_kabupaten(user()->id_kabupaten)[0]->nama_kab_kota) ?></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            
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
                        <th data-priority="2">Nama Puskesmas</th>
                        <th data-priority="3">Nama Kabupaten</th>
                        <th data-priority="4">Tahun</th>
                        <th data-priority="5">Minggu (Tahun)</th>
                        <th data-priority="6">Minggu (Tahun Selanjutnya)</th>
                        <th data-priority="7">Positif</th>
                        <th data-priority="8">Sembuh</th>
                        <th data-priority="9">Meninggal</th>
                        <th data-priority="10">Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- End block -->
<!-- Modal Delete -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalDeleteData" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalDeleteDataLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    <i class="text-red-500 fa-solid fa-trash fa-bounce mr-2"></i>Konfirmasi Delete Data Aktual
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
                <p>Konfirmasi data aktual ini akan dihapus.</p>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end modal-delete-response rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script defer>
    function deleteData(data) {
        var data_id = data.getAttribute("data-id");
        $.ajax({
            type: 'post',
            url: '<?= base_url(); ?>dataaktual/deleteModal',
            data: {data_id: data_id},
            success: function (response) {
                $('.modal-delete-response').html(response);
                $('#modalDeleteData').modal('show');
            }
        });
    }
     $(document).ready(function () {
        let id_pus = "<?php echo user()->id_puskesmas?>"
        let id_kab = "<?php echo user()->id_kabupaten?>"
        console.log(id_pus + " " + "kb:" + id_kab);
        show_content(id_pus,id_kab)
        function show_content(id_pus = '',id_kab = '') {
            var table = $('#example').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                // scrollX: true,
                ajax: {
                    url: "<?php echo site_url('dataaktual/listdata') ?>",
                    type: "POST",
                    data: {
                        'id_pus': id_pus,
                        'id_kab': id_kab,
                    },
                    datatype: "json",

                },
                lengthMenu: [
                    [25, 50, 75, -1],
                    [25, 50, 75, 'All']
                ],
                columnDefs: [{
                    targets: [],
                    orderable: false,
                },],
                // dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
                // dom: "<'flex flex-row justify-between'<'sm:w-1/3'l><'sm:w-1/3 flex justify-center text-center'B><'sm:w-1/3'f>>rtip",
                // buttons: [{
                //     extend: 'excel',
                //     text: '<i class="fa-solid fa-file-export fa-bounce mr-2"></i>Export to Excel',
                //     className: 'px-4 py-2 text-sm bg-orange-500 hover:bg-orange-400 rounded-lg text-white font-semibold',
                // }
                    // 'excel',
                // ],
            })
                .columns.adjust()
                .responsive.recalc();

        }
    });
</script>

<?= $this->endSection(); ?>