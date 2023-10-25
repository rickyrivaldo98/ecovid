<?= $this->extend('layouts/lending_layout'); ?>

<?= $this->section('lending-content'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements@1.0.0-beta1/dist/js/index.min.js"></script>
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
<style>
    .loader {
        width: 30px;
        height: 30px;
        border: 5px solid indigo;
        border-radius: 50%;
        border-top-color: #0001;
        display: inline-block;
        animation: spinner .7s linear infinite;
    }

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<!-- Start block -->
<section class="bg-bgContent dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-14 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7 lg:py-10">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                Dashboard Statistik <br>Kasus COVID-19 Provinsi Jawa Tengah.</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                Media informasi dan prediksi kasus Covid-19 di Jawa Tengah. Hadirkan data dan visualisasi
                perkembangan kasus terkini Covid-19.
            </p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <button type="button" onClick="document.getElementById('start_section').scrollIntoView();"
                    class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-bgHeader focus:ring-4 focus:ring-bgHeader dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Mulai Eksplorasi
                </button>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_42B8LS.json" background="transparent"
                speed="1" style="width: 520px; height: 406px;" loop autoplay></lottie-player>
        </div>
    </div>
</section>
<!-- End block -->

<!-- Start block -->

<section id="start_section" class="bg-bgContent dark:bg-gray-800 ">
    <div
        class="bg-white border-solid border-2 border-gray-100 rounded-lg max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-9 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols xl:gap-16">
            <div class="text-gray-500 sm:text-md dark:text-gray-400">
                <h2 class="mb-4 text-xl font-extrabold tracking-tight text-gray-900 dark:text-white">Sebaran
                    Covid-19 di Jawa Tengah</h2>
                <p class="mb-8 font-light lg:text-md">Anda dapat
                    menemukan statistik terbaru mengenai jumlah kasus terkonfirmasi, kasus aktif, kesembuhan, dan
                    kematian di Jawa Tengah. <br> Kami mengupdate informasi ini setiap hari, sehingga Anda dapat
                    yakin
                    bahwa Anda mendapatkan data terkini yang tersedia.</p>
                <!-- List -->
                <hr class="bg-gray-200 dark:border-gray-700">
                <ul role="list" class="bg-bgHeader rounded-lg p-4 space-y-5 my-7">
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium leading-tight text-gray-900 dark:text-white">Tidak
                            seluruh data kasus memiliki kelengkapan alamat Kota/Kab, Kecamatan dan Kelurahan/Desa
                            (butuh proses verifikasi) sehingga tidak seluruhnya dapat divisualisasikan.</span>
                    </li>
                </ul>
                <iframe defer class="flex w-full mb-4 rounded-lg lg:mb-0 lg:flex h-[200px] md:h-[400px]" loading="lazy"
                    allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d821845.5841104316!2d109.1198177407516!3d-7.229820906716965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65759b9cd518dd%3A0xc377d19d8fedbc46!2sJawa%20Tengah!5e0!3m2!1sid!2sid!4v1681064986671!5m2!1sid!2sid">
                </iframe>
            </div>

        </div>
    </div>
</section>
<!-- End block -->
<!-- Start block -->
<section id="predict_section" class="bg-bgContent dark:bg-gray-800">
    <!-- items-center -->
    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-16 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols xl:gap-16">
            <div class=" text-gray-500 sm:text-md dark:text-gray-400">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div>
                                <h2 class="mb-2 text-xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                    Data Aktual
                                    Covid-19</h2>
                                <p class="mb-4 md:mb-8 font-light lg:text-md">Update Terakhir:
                                    <?=date('d F Y H:i:s', strtotime($meta['data_datetime'][0]->created_at)) ?>

                                </p>
                            </div>
                            <div class="mb-4 md:mb-0">
                                <?php if (logged_in() && (in_groups('superAdmin')) && (has_permission('menu-dashboard'))) : ?>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataAktual" data-te-ripple-init
                                    data-te-ripple-color="light"
                                    class="bg-bgFooter rounded-lg text-sm px-3 py-2 text-white hover:bg-bgFooterHover">Data
                                    Aktual<i class="fas fa-plus ml-3"></i></button>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataPrediksi"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    class="bg-transparent border border-bgFooter  rounded-lg text-sm px-3 py-2 text-bgFooter hover:border-transparent hover:bg-bgFooter hover:text-white">Buat
                                    Prediksi<i class="fas fa-plus ml-3"></i></button>
                                <?php elseif (logged_in() && (in_groups('admin'))) : ?>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataAktualKabupaten"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    class="bg-bgFooter rounded-lg text-sm px-3 py-2 text-white hover:bg-bgFooterHover">Data
                                    Aktual<i class="fas fa-plus ml-3"></i></button>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataPrediksiKabupaten"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    class="bg-transparent border border-bgFooter  rounded-lg text-sm px-3 py-2 text-bgFooter hover:border-transparent hover:bg-bgFooter hover:text-white">Buat
                                    Prediksi<i class="fas fa-plus ml-3"></i></button>
                                <?php elseif (logged_in() && (in_groups('puskesmas'))) : ?>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataAktualPuskesmas"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    class="bg-bgFooter rounded-lg text-sm px-3 py-2 text-white hover:bg-bgFooterHover">Data
                                    Aktual<i class="fas fa-plus ml-3"></i></button>
                                <button data-te-toggle="modal" data-te-target="#modalAddDataPrediksiPuskesmas"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    class="bg-transparent border border-bgFooter  rounded-lg text-sm px-3 py-2 text-bgFooter hover:border-transparent hover:bg-bgFooter hover:text-white">Buat
                                    Prediksi<i class="fas fa-plus ml-3"></i></button>
                                <?php else : ?>
                                <button data-te-toggle="modal" data-te-target="#modallogin" data-te-ripple-init
                                    data-te-ripple-color="light"
                                    class=" bg-bgFooter  rounded-lg text-sm px-3 py-2 text-white hover:bg-bgFooterHover ">Buat
                                    Prediksi<i class="fas fa-plus ml-3"></i></button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (session()->getFlashData('success')) : ?>
                        <div class="flex-auto px-4">
                            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-green-100 py-5 px-6 text-base text-green-700"
                                role="alert">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <?= session()->getFlashData('success') ?>

                            </div>
                        </div>
                        <br>
                        <?php elseif (session()->getFlashData('error')) : ?>
                        <div class="flex-auto px-4">
                            <div class="mt-2 inline-flex w-full items-center rounded-lg bg-red-100 py-5 px-6 text-base text-red-700"
                                role="alert">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <?= session()->getFlashData('error') ?>
                            </div>
                        </div>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                        <div class="flex flex-col md:flex-row justify-between items-center px-4">
                            <div>
                                <p class="mt-2 font-light lg:text-md">Silahkan Pilih Minggu dalam Tahun Selanjutnya
                                </p>
                                <form name="tanggal" id="tanggal" action="">
                                    <div class="flex flex-row mt-2 gap-2 justify-between">
                                        <div class="">
                                            <div>
                                                <select name="dariminggu" id="dariminggu"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected disabled>Pilih Dari Minggu Ke-</option>
                                                    <?php foreach ($meta['data_minggu'] as $data) : ?>
                                                    <option value="<?= $data->minggudalamtahun ?>">
                                                        <?= $data->minggudalamtahun ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div>
                                                <select name="tahun" id="tahun"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected disabled>Pilih Tahun</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit"
                                            class=" text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bgFobg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFbg-bgFooter">
                                            Submit
                                        </button>
                                        <button type="button" name="button" id="rezet"
                                            class=" text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bgFobg-bgFooter dark:hover:bg-orange-600 focus:outline-none dark:focus:ring-bgFbg-bgFooter">
                                            Reset
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div>
                    <div class="flex-auto p-4">
                        <div class="pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                            <div id="chartDataAktual" data-te-toggle="modal" data-te-target="#modaldataaktual"
                                data-te-ripple-init data-te-ripple-color="light"></div>
                        </div>
                    </div>
                </div>
                <!-- List -->

            </div>
        </div>
    </div>
</section>
<!-- End block -->

<!-- Start block -->
<section class="bg-bgContent dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-8 ">
        <div class="mx-auto">
            <div id="accordion-open" data-accordion="open">
                <h2 id="accordion-open-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium text-left text-white bg-bgFooter rounded-t-xl   hover:bg-bgFooterHover hover:text-white "
                        style="background-color: #4d19d2;" data-accordion-target="#accordion-open-body-1"
                        aria-expanded="true" aria-controls="accordion-open-body-1">
                        <div>
                            <span class="flex items-center"><i class="fa-solid fa-cog fa-spin mr-2"></i>Hasil Prediksi
                                Covid-19</span>
                            <span id="hasil_prediksi" class="<?php if(!session()->getFlashData('tminggudalamtahun')){echo "hidden";}else{echo "flex";}?>  items-center text-sm font-normal pl-6">
                                 <?php
                                    if(session()->getFlashData('tminggudalamtahun')){
                                        echo "Hasil Prediksi pada Minggu ke - ".session()->getFlashData('tminggudalamtahun')." Tahun ".session()->getFlashData('ttahun');
                                    }
                                 ?>
                            </span>
                            <script>
                                var minggu_predict_tt = []
                                var minggu_predict_tt_lengkap = []
                                var minggu_hasil = "<?=session()->getFlashData('tminggudalamtahun')?>"
                                minggu_hasil = parseInt(minggu_hasil)
                            </script>
                        </div>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <?php if (session()->getFlashData('prediksiSuccess')) : ?>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                    <div class="justify-center p-5 border  border-bgFooter ">

                        <!-- Model Chart Regresi -->
                        <div class="mb-4">
                            <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model
                                Regresi</div>
                            <div class="flex flex-wrap justify-around">
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgFooter rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-white uppercase font-bold text-sm mb-5">
                                                        Positif
                                                    </h5>
                                                    <p class="text-sm text-white font-semibold">JAWA TENGAH</p>
                                                    <span id="positifreg1" class="font-semibold text-xl text-white">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-orange-500">
                                                        <i class="fas fa-virus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                                                    <p class="text-white text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-white">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span id="positifreg2"
                                                                class="font-semibold text-xl text-white">
                                                                <?php
                                                                    $positifreg2 = session()->getFlashData('nilai')['positif'];
                                                                    echo ($positifreg2[sizeof($positifreg2)-1]);
                                                                    $positifreg2_old = session()->getFlashData('nilai')['positif'];
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-lg text-white">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-white">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['regressionpositif'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['positifreg'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg3 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg3 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg3.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-white mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($positifreg2_old[sizeof($positifreg2_old)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($positifreg2_old[sizeof($positifreg2_old)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                
                                                    <?php 
                                                        $selisih = (float)($positifreg2_old[sizeof($positifreg2_old)-1]) -  (float)$positifreg2 ;

                                                        if((float)($positifreg2_old[sizeof($positifreg2_old)-1])==0 || (float)($positifreg2_old[sizeof($positifreg2_old)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($positifreg2_old[sizeof($positifreg2_old)-1]))*100;
                                                        }

                                                        echo ($selisih == (float)($positifreg2_old[sizeof($positifreg2_old)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                                                <div id="positif_chart_regresi" data-te-toggle="modal"
                                                    data-te-target="#modalpositifregresi" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Sembuh
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="sembuhreg1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-green-500">
                                                        <i class="fas fa-heart-circle-plus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $sembuhreg2 = session()->getFlashData('nilai')['sembuh'];
                                                                    echo ($sembuhreg2[sizeof($sembuhreg2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['regressionsembuh'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['sembuhreg'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg4 = "<?php echo $positifreg2 ?>"

                                                                    let repositifreg4 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg4.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($sembuhreg2[sizeof($sembuhreg2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($sembuhreg2[sizeof($sembuhreg2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                    <?php 
                                                        $selisih = (float)($sembuhreg2[sizeof($sembuhreg2)-1]) -  (float)$positifreg2 ;

                                                        if((float)($sembuhreg2[sizeof($sembuhreg2)-1])==0 || (float)($sembuhreg2[sizeof($sembuhreg2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($sembuhreg2[sizeof($sembuhreg2)-1]))*100;
                                                        }


                                                        echo ($selisih == (float)($sembuhreg2[sizeof($sembuhreg2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="sembuh_chart_regresi" data-te-toggle="modal"
                                                    data-te-target="#modalsembuhregresi" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Meninggal
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="meninggalreg1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-red-500">
                                                        <i class="fas fa-skull fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $meninggalreg1 = session()->getFlashData('nilai')['meninggal'];
                                                                    echo ($meninggalreg1[sizeof($meninggalreg1)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['regressionmeninggal'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['meninggalreg'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg5 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg5 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg5.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($meninggalreg1[sizeof($meninggalreg1)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($meninggalreg1[sizeof($meninggalreg1)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                        
                                                    <?php 
                                                        $selisih = (float)($meninggalreg1[sizeof($meninggalreg1)-1]) -  (float)$positifreg2 ;

                                                        if((float)($meninggalreg1[sizeof($meninggalreg1)-1])==0 || (float)($meninggalreg1[sizeof($meninggalreg1)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($meninggalreg1[sizeof($meninggalreg1)-1]))*100;
                                                        }


                                                        echo ($selisih == (float)($meninggalreg1[sizeof($meninggalreg1)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="meninggal_chart_regresi" data-te-toggle="modal"
                                                    data-te-target="#modalmeninggalregresi" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model Chart Ann -->
                        <div class="mb-4">
                            <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model
                                Ann</div>
                            <div class="flex flex-wrap justify-around">
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgFooter rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-white uppercase font-bold text-sm mb-5">
                                                        Positif
                                                    </h5>
                                                    <p class="text-sm text-white font-semibold">JAWA TENGAH</p>
                                                    <span id="positifann1" class="font-semibold text-xl text-white">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-orange-500">
                                                        <i class="fas fa-virus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-white text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-white">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-white">
                                                                <?php
                                                                    $positifann2 = session()->getFlashData('nilai')['positif'];
                                                                    echo ($positifann2[sizeof($positifann2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-lg text-white">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-white">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['annpositif'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['positifann'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));

                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg6 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg6 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg6.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-white mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($positifann2[sizeof($positifann2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($positifann2[sizeof($positifann2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                    
                                                     <?php 
                                                        $selisih = (float)($positifann2[sizeof($positifann2)-1]) -  (float)$positifreg2 ;
                                                        
                                                        if((float)($positifann2[sizeof($positifann2)-1])==0 || (float)($positifann2[sizeof($positifann2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($positifann2[sizeof($positifann2)-1]))*100;
                                                        }

                                                        
                                                        echo ($selisih == (float)($positifann2[sizeof($positifann2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                            
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                                                <div id="positif_chart_ann" data-te-toggle="modal"
                                                    data-te-target="#modalpositifann" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Sembuh
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="sembuhann1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-green-500">
                                                        <i class="fas fa-heart-circle-plus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $sembuhann2 = session()->getFlashData('nilai')['sembuh'];
                                                                    echo ($sembuhann2[sizeof($sembuhann2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['annsembuh'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['sembuhann'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));
                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg7 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg7 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg7.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($sembuhann2[sizeof($sembuhann2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($sembuhann2[sizeof($sembuhann2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                    
                                                    <?php 
                                                        $selisih = (float)($sembuhann2[sizeof($sembuhann2)-1]) -  (float)$positifreg2 ;
                                                        
                                                        if((float)($sembuhann2[sizeof($sembuhann2)-1])==0 || (float)($sembuhann2[sizeof($sembuhann2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($sembuhann2[sizeof($sembuhann2)-1]))*100;
                                                        }

                                                        
                                                        echo ($selisih == (float)($sembuhann2[sizeof($sembuhann2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="sembuh_chart_ann" data-te-toggle="modal"
                                                    data-te-target="#modalsembuhann" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Meninggal
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="meninggalann1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-red-500">
                                                        <i class="fas fa-skull fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $meninggalann2 = session()->getFlashData('nilai')['meninggal'];
                                                                    echo ($meninggalann2[sizeof($meninggalann2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['annmeninggal'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['meninggalann'];
                                                                    // $positifreg3 = explode('.', abs($positifreg2));
                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg8 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg8 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg8.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($meninggalann2[sizeof($meninggalann2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($meninggalann2[sizeof($meninggalann2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                    <?php 
                                                        $selisih = (float)($meninggalann2[sizeof($meninggalann2)-1]) -  (float)$positifreg2 ;
                                                        
                                                        if((float)($meninggalann2[sizeof($meninggalann2)-1])==0 || (float)($meninggalann2[sizeof($meninggalann2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($meninggalann2[sizeof($meninggalann2)-1]))*100;
                                                        }
                                                        
                                                        echo ($selisih == (float)($meninggalann2[sizeof($meninggalann2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="meninggal_chart_ann" data-te-toggle="modal"
                                                    data-te-target="#modalmeninggalann" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model Chart Sier -->
                        <div>
                            <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model
                                SEIR</div>
                            <div class="flex flex-wrap justify-around">
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgFooter rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-white uppercase font-bold text-sm mb-5">
                                                        Positif
                                                    </h5>
                                                    <p class="text-sm text-white font-semibold">JAWA TENGAH</p>
                                                    <span id="positifseir1" class="font-semibold text-xl text-white">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-orange-500">
                                                        <i class="fas fa-virus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-white text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-lg text-white">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-white">
                                                                <?php
                                                                    $positifseir2 = session()->getFlashData('nilai')['positif'];
                                                                    echo ($positifseir2[sizeof($positifseir2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-lg text-white">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-white">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['bayesianpositif'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['positifbay'];
                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg9 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg9 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg9.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-white mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($positifseir2[sizeof($positifseir2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($positifseir2[sizeof($positifseir2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                   
                                                    <?php 
                                                        $selisih = (float)($positifseir2[sizeof($positifseir2)-1]) -  (float)$positifreg2 ;
                                                       
                                                        if((float)($positifseir2[sizeof($positifseir2)-1])==0 || (float)($positifseir2[sizeof($positifseir2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($positifseir2[sizeof($positifseir2)-1]))*100;
                                                        }
                                                        
                                                        echo ($selisih == (float)($positifseir2[sizeof($positifseir2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                                                <div id="positif_chart_sier" data-te-toggle="modal"
                                                    data-te-target="#modalpositifsier" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Sembuh
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="sembuhseir1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-green-500">
                                                        <i class="fas fa-heart-circle-plus fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $sembuhseir2 = session()->getFlashData('nilai')['sembuh'];
                                                                    echo ($sembuhseir2[sizeof($sembuhseir2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['bayesiansembuh'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['sembuhbay'];
                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg10 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg10 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg10.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($sembuhseir2[sizeof($sembuhseir2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($sembuhseir2[sizeof($sembuhseir2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                   
                                                    <?php 
                                                        $selisih = (float)($sembuhseir2[sizeof($sembuhseir2)-1]) -  (float)$positifreg2 ;
                                                        
                                                        if((float)($sembuhseir2[sizeof($sembuhseir2)-1])==0 || (float)($sembuhseir2[sizeof($sembuhseir2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($sembuhseir2[sizeof($sembuhseir2)-1]))*100;
                                                        }
                                                        
                                                        
                                                        echo ($selisih == (float)($sembuhseir2[sizeof($sembuhseir2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="sembuh_chart_sier" data-te-toggle="modal"
                                                    data-te-target="#modalsembuhsier" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-bgHeader rounded-lg mb-6 xl:mb-0 shadow-md">
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <h5 class="text-black uppercase font-bold text-sm mb-5">
                                                        Meninggal
                                                    </h5>
                                                    <p class="text-sm text-black font-semibold">JAWA TENGAH</p>
                                                    <span id="meninggalseir1" class="font-semibold text-xl text-black">

                                                    </span>
                                                </div>
                                                <div class="relative w-auto pl-4 flex-initial">
                                                    <div
                                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-md rounded-full bg-red-500">
                                                        <i class="fas fa-skull fa-beat-fade"
                                                            style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="flex-auto px-4 ">
                                            <hr>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap">
                                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                    <p class="text-black text-sm font-semibold">
                                                        <?php print_r(session()->getFlashData('kabupaten')) ?>
                                                    </p>
                                                    <div class="flex">
                                                        <div class="pr-4">
                                                            <span class="font-base text-md text-black">Minggu
                                                                Lalu</span>
                                                            <br>
                                                            <span class="font-semibold text-xl text-black">
                                                                <?php
                                                                    $meninggalseir2 = session()->getFlashData('nilai')['meninggal'];
                                                                    echo ($meninggalseir2[sizeof($meninggalseir2)-1]);
                                                                    ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="font-base text-md text-black">Prediksi</span>
                                                            <br>
                                                            <span id="positifreg2" class="font-semibold text-xl text-black">
                                                                    <?php
                                                                    $positifreg2 = session()->getFlashData('prediksi')['bayesianmeninggal'];
                                                                    $repositifreg2 = session()->getFlashData('reprediksi')['meninggalbay'];
                                                                    // if ($positifreg2 >= 1) {
                                                                    //     $num = explode('+', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = number_format((float)$float, 0);
                                                                    // } else {
                                                                    //     $num = explode('-', $positifreg2);
                                                                    //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
                                                                    //     $float = number_format($positifreg2, $precision);
                                                                    //     $positifreg3 = round($float);
                                                                    // }
                                                                    echo $positifreg2;
                                                                    ?>
                                                                </span>
                                                                <script type="text/javascript">
                                                                    let positifreg11 = "<?php echo $positifreg2 ?>"
                                                                    let repositifreg11 = []
                                                                    <?php
                                                                    foreach ($repositifreg2 as $test) {
                                                                        echo 'repositifreg11.push(' . $test . ');';
                                                                    }
                                                                    ?>
                                                                </script>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <p class="text-sm text-black mt-4">
                                                <span class="<?php echo ((float)$positifreg2 < (float)($meninggalseir2[sizeof($meninggalseir2)-1]))? 'text-red-500': 'text-emerald-500'; ?> mr-2">
                                                    <i class="fas  <?php echo ((float)$positifreg2 < (float)($meninggalseir2[sizeof($meninggalseir2)-1]))? 'fa-arrow-down': 'fa-arrow-up'; ?>"></i> 
                                                   
                                                     <?php 
                                                        $selisih = (float)($meninggalseir2[sizeof($meninggalseir2)-1]) -  (float)$positifreg2 ;
                                                        if((float)($meninggalseir2[sizeof($meninggalseir2)-1])==0 || (float)($meninggalseir2[sizeof($meninggalseir2)-1])==0.0){
                                                            $kenaikan = ($selisih/1)*100;
                                                        }else{
                                                            $kenaikan = ($selisih/(float)($meninggalseir2[sizeof($meninggalseir2)-1]))*100;
                                                        }
                                                        
                                                        
                                                        echo ($selisih == (float)($meninggalseir2[sizeof($meninggalseir2)-1]) )?'100%':abs(round($kenaikan,2)).'%';
                                                    ?> 
                                                </span>
                                                <span class="whitespace-nowrap text-xs">
                                                    Dari Minggu Lalu
                                                </span>
                                            </p>
                                        </div>
                                        <div class="flex-auto p-4">
                                            <div class="flex flex-wrap pt-4 pr-4 pl-4 pb-0 bg-bgCard  rounded-lg">
                                                <div id="meninggal_chart_sier" data-te-toggle="modal"
                                                    data-te-target="#modalmeninggalsier" data-te-ripple-init
                                                    data-te-ripple-color="light"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                    <div class="justify-center p-5 border  border-bgFooter ">
                        <div class="text-center bg-red-200 rounded-lg px-3 py-2">
                            <p class="mb-2 text-red-500 dark:text-gray-400"> <i
                                    class="fa-solid fa-triangle-exclamation fa-beat-fade mr-2"></i>Data Kosong.</p>
                            <p class="text-red-500 dark:text-gray-400 mb-4">Harap lakukan prediksi terlebih dahulu.</p>
                            <button onClick="document.getElementById('predict_section').scrollIntoView();"
                                class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bgFobg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFbg-bgFooter">Lakukan
                                Prediksi</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End block -->
<!-- Start block -->
<section class="bg-bgHeader dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
        <?php if (session()->getFlashData('prediksiSuccess')) : ?>
        <div class="">
            <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                Ringkasan Laporan Mingguan Covid-19 Indonesia</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Ringkasan laporan terbaru mengenai
                COVID-19 di
                Indonesia menggunakan teknologi Machine Learning. Laporan ini menyajikan data kasus COVID-19 mingguan di
                Indonesia
                dan memberikan analisis tren, prediksi, dan perbandingan dengan minggu sebelumnya. Kami mengupdate
                informasi ini
                setiap minggu, sehingga Anda dapat yakin bahwa Anda mendapatkan data terkini dan akurat.</p>
            <div class="flex-auto p-4">
                <div class="pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                    <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model Regresi
                    </div>

                    <?php if (session()->getFlashData('prediksi')['performance']) : ?>
                    <?php
                            $performance = session()->getFlashData('prediksi')['performance'];
                        ?>
                    <table id="exampleRegg" class="stripe hover text-sm "
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Variabel</th>
                                <th data-priority="3">MSE</th>
                                <th data-priority="4">RMSE</th>
                                <th data-priority="5">R2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; $variable=['Meninggal','Sembuh','Positif'] ?>
                            <?php foreach($variable as $key=>$data) :?>
                            <tr>
                                <td class="text-center">
                                    <?= $no++  ?>
                                </td>
                                <td class="text-center">
                                    <?= $data  ?>
                                </td>
                                <?php foreach($performance[$key] as $idx=>$pfm) :?>
                                <td class="text-center">
                                    <?= $pfm  ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif;?>
                    <div id="grafik_report_regresi" class="mt-3"></div>
                </div>
            </div>
            <div class="flex-auto p-4">
                <div class="pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                    <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model SEIR
                    </div>
                    <?php if (session()->getFlashData('prediksi')['performance']) : ?>
                    <?php
                            $performance = session()->getFlashData('prediksi')['performance'];
                        ?>
                    <table id="exampleSIER" class="stripe hover text-sm"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Variabel</th>
                                <th data-priority="3">MSE</th>
                                <th data-priority="4">RMSE</th>
                                <th data-priority="5">R2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; $variable=['Meninggal','Sembuh','Positif'] ?>
                            <?php foreach($variable as $key=>$data) :?>
                            <tr>
                                <td class="text-center">
                                    <?= $no++  ?>
                                </td>
                                <td class="text-center">
                                    <?= $data  ?>
                                </td>
                                <?php foreach($performance[$key+3] as $idx=>$pfm) :?>
                                <td class="text-center">
                                    <?= $pfm  ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif;?>
                    <div id="grafik_report_sier" class="mt-3"></div>
                </div>
            </div>
            <div class="flex-auto p-4">
                <div class="pt-4 pr-4 pl-4 pb-0 bg-bgCard rounded-lg">
                    <div class="bg-bgFooter rounded-lg text-sm px-4 py-2 mb-4 ml-6 text-white inline-flex">Model Ann
                    </div>
                    <div id="grafik_report_ann"></div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="max-w-screen-sm mx-auto text-center">
            <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                Data Prediksi Belum Terproses</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Lakukan prediksi terlebih dahulu
                untuk mendapatkan report grafik.</p>
            <button onClick="document.getElementById('predict_section').scrollIntoView();"
                class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bgFobg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFbg-bgFooter">Lakukan
                Prediksi</button>
        </div>
        <?php endif; ?>

    </div>
</section>


<!-- End block -->
<!-- ModalDataPrediksi -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataPrediksi" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataPrediksi" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">

                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Prediksi
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>.
                    </div>
                </div>
            </div>
            <form action="/lending/prediksi" method="POST" class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-kabupaten3">
                                Kabupaten/Kota
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-kabupaten3" name="grid-kabupaten3">
                                    <option value="" selected disabled>Pilih Kabupaten</option>
                                    <?php foreach ($meta['data_kabupaten'] as $data) : ?>
                                    <option value="<?= $data->id_kab_kota ?>">
                                        <?= $data->nama_kab_kota ?>
                                    </option>
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
                        <!-- <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-puskesmas3">
                                Nama Puskesmas
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-puskesmas3" name="grid-puskesmas3">
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
                        </div> -->
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun-prediksi">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun-prediksi" name="grid-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-prediksi">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-prediksi" name="grid-minggu-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$"  required max="<?php 
                                    $batas = (int)($meta['data_minggu_tahun'][0]->minggudalamtahun);
                                    echo $batas + 5;

                                ?>"  oninvalid="this.setCustomValidity('<?='Data Aktual Minggu ke-'.($batas+1).' belum terinput, batas toleransi prediksi kedepan adalah 5 minggu setelah data aktual terakhir (Minggu ke-'.($batas + 5).') untuk menjaga performa'?>')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya-prediksi">
                                Masukkan Minggu Dalam Tahun 
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya-prediksi"
                                name="grid-minggu-tahun-selanjutnya-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif-prediksi">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif-prediksi" name="grid-positif-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh-prediksi">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh-prediksi" name="grid-sembuh-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal-prediksi">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal-prediksi" name="grid-meninggal-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
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
<!-- ModalDataPrediksiPuskesmas -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataPrediksiPuskesmas" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataPrediksiPuskesmas" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Prediksi
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>.
                    </div>
                </div>
            </div>
            <form action="/lending/prediksi" method="POST" class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <input type="hidden" id="grid-kabupaten3" name="grid-kabupaten3"
                        value="<?= user() != null ? user()->id_kabupaten : null ?>">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun-prediksi">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun-prediksi" name="grid-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-prediksi">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-prediksi" name="grid-minggu-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required max="<?php 
                                    $batas = (int)($meta['data_minggu_tahun'][0]->minggudalamtahun);
                                    echo $batas + 5;

                                ?>"  oninvalid="this.setCustomValidity('<?='Data Aktual Minggu ke-'.($batas+1).' belum terinput, batas toleransi prediksi kedepan adalah 5 minggu setelah data aktual terakhir (Minggu ke-'.($batas + 5).')  untuk menjaga performa'?>')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya-prediksi">
                                Masukkan Minggu Dalam Tahun 
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya-prediksi"
                                name="grid-minggu-tahun-selanjutnya-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif-prediksi">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif-prediksi" name="grid-positif-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh-prediksi">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh-prediksi" name="grid-sembuh-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal-prediksi">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal-prediksi" name="grid-meninggal-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
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
<!-- ModalDataPrediksiKabupaten -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataPrediksiKabupaten" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataPrediksiKabupaten" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Prediksi
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>.
                    </div>
                </div>
            </div>
            <form action="/lending/prediksi" method="POST" class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <input type="hidden" id="grid-kabupaten3" name="grid-kabupaten3"
                        value="<?= user() != null ? user()->id_kabupaten : null ?>">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun-prediksi">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun-prediksi" name="grid-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-prediksi">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-prediksi" name="grid-minggu-tahun-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required max="<?php 
                                    $batas = (int)($meta['data_minggu_tahun'][0]->minggudalamtahun);
                                    echo $batas + 5;

                                ?>"  oninvalid="this.setCustomValidity('<?='Data Aktual Minggu ke-'.($batas+1).' belum terinput, batas toleransi prediksi kedepan adalah 5 minggu setelah data aktual terakhir (Minggu ke-'.($batas + 5).')  untuk menjaga performa'?>')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya-prediksi">
                                Masukkan Minggu Dalam Tahun 
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya-prediksi"
                                name="grid-minggu-tahun-selanjutnya-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif-prediksi">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif-prediksi" name="grid-positif-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh-prediksi">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh-prediksi" name="grid-sembuh-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal-prediksi">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal-prediksi" name="grid-meninggal-prediksi" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
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
<!-- ModalDataAktual -->

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataAktual" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataAktual" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">

        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Aktual
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>. Pastikan isi
                        dengan nilai diatas itu.
                    </div>
                </div>
            </div>
            <div id="wait-container">
                <div wire:loading
                    class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-1056 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
                    <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4">
                    </div>
                    <h2 class="text-center text-black text-xl font-semibold">Loading...</h2>
                    <p class="w-1/3 text-center text-black">Sedang memasukkan data, jangan tutup halaman ini</p>
                </div>
            </div>
            <form id='formdataktual' action="/lending/dataaktual" method="POST" class="w-full max-w-lg"
                autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4" id='formdataktualform'>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-kabupaten2">
                                Kabupaten/Kota
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-kabupaten2" name="grid-kabupaten2">
                                    <option value="" selected disabled>Pilih Kabupaten</option>
                                    <?php foreach ($meta['data_kabupaten'] as $data) : ?>
                                    <option value="<?= $data->id_kab_kota ?>">
                                        <?= $data->nama_kab_kota ?>
                                    </option>
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
                                for="grid-puskesmas2">
                                Nama Puskesmas
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-puskesmas2" name="grid-puskesmas2">
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
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun" name="grid-tahun" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" placeholder="<?= date("Y")?>"  pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun" name="grid-minggu-tahun" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" min="<?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="hidden flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya">
                                Masukkan Minggu Dalam Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya" name="grid-minggu-tahun-selanjutnya" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" value="0">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif" name="grid-positif" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh" name="grid-sembuh" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal" name="grid-meninggal" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button id="submitdataakutalsa" type="submit"
                        class="inline-block rounded bg-green-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                        <i class="fas fa-save mr-1"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ModalDataAktualKabupaten -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataAktualKabupaten" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataAktualKabupaten" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Aktual
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>. Pastikan isi
                        dengan nilai diatas itu.
                    </div>
                </div>
            </div>
            <div id="wait-containerkabupaten">
                <div wire:loading
                    class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-1056 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
                    <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4">
                    </div>
                    <h2 class="text-center text-black text-xl font-semibold">Loading...</h2>
                    <p class="w-1/3 text-center text-black">Sedang memasukkan data, jangan tutup halaman ini</p>
                </div>
            </div>
            <form id='formdataktualkabupaten' action="/lending/dataaktualkabupaten" method="POST"
                class="w-full max-w-lg" autocomplete="off" autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4" id='formdataktualformkabupaten'>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-puskesmas4">
                                Nama Puskesmas
                            </label>
                            <div class="relative">
                                <input type="hidden" id="grid-kabupaten4" name="grid-kabupaten4"
                                    value="<?= user() != null ? user()->id_kabupaten : null ?>">
                                <select
                                    class="block appearance-none w-full bg-bgFormSoft border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-puskesmas4" name="grid-puskesmas4">
                                    <option value="" selected disabled>Pilih Puskesmas</option>

                                    <?php
                                    if (user() == null  || in_groups('superAdmin') || in_groups('puskesmas')) {
                                        null;
                                    } else {
                                        foreach ($meta['data_puskesmas'] as $data) : ?>
                                    <option value="<?= $data->id_puskesmas ?>">
                                        <?= $data->nama_puskesmas ?>
                                    </option>
                                    <?php endforeach;
                                    } ?>
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
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun" name="grid-tahun" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off"  placeholder="<?= date("Y")?>"  pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun" name="grid-minggu-tahun" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" min="<?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="hidden flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya">
                                Masukkan Minggu Dalam Tahun 
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya" name="grid-minggu-tahun-selanjutnya" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" value="0">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif" name="grid-positif" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh" name="grid-sembuh" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal" name="grid-meninggal" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button id="submitdataakutalkabupaten" type="submit"
                        class="inline-block rounded bg-green-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                        <i class="fas fa-save mr-1"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ModalDataAktualPuskesmas -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalAddDataAktualPuskesmas" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddDataAktualPuskesmas" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Tambah Data Aktual
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
            <div class="items-center justify-between rounded-t-md  p-4 dark:border-opacity-50">
                <div class="flex items-center p-4  text-sm text-yellow-800 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Perhatikan!</span> Minggu Dalam Tahun Aktual Selanjutnya terakhir adalah <?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>. Pastikan isi
                        dengan nilai diatas itu.
                    </div>
                </div>
            </div>
            <form action="/lending/dataaktualpuskesmas" method="POST" class="w-full max-w-lg" autocomplete="off"
                autofill="off">
                <?= csrf_field() ?>
                <div data-te-modal-body-ref class=" p-4">
                    <div class=" flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-tahun">
                                Masukkan Tahun
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-tahun" name="grid-tahun" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" placeholder="<?= date("Y")?>" pattern="^[0-9]*$" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun">
                                Masukkan Minggu Dalam Tahun Selanjutnya
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun" name="grid-minggu-tahun" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" min="<?= $meta['data_minggu_tahun'][0]->minggudalamtahun ?>" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="hidden flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-minggu-tahun-selanjutnya">
                                Masukkan Minggu Dalam Tahun 
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-minggu-tahun-selanjutnya" name="grid-minggu-tahun-selanjutnya" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" value="0">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-positif">
                                Masukkan Jumlah Kasus Positif
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-positif" name="grid-positif" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-sembuh">
                                Masukkan Jumlah Kasus Sembuh
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-sembuh" name="grid-sembuh" type="number" placeholder="Silahkan Masukkan Angka"
                                autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-meninggal">
                                Masukkan Jumlah Kasus Meninggal
                            </label>
                            <input
                                class="appearance-none block w-full bg-bgFormSoft text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-meninggal" name="grid-meninggal" type="number"
                                placeholder="Silahkan Masukkan Angka" autocomplete="off" autofill="off" pattern="^[0-9]*$" required>
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
<!-- ModalLogin -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modallogin" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">

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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <h5 class="text-lg font-medium leading-normal text-neutral-800 dark:text-neutral-200 text-center"
                    id="exampleModalLabel">
                    Untuk mengisi prediksi silahkan login terlebih dahulu
                </h5>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <a href="/login"
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"><i
                        class="fas fa-user-nurse mr-2"></i>Login</a>
            </div>
        </div>
    </div>
</div>


<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modaldataaktual" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Data Aktual
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="chartDataAktual2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- reg -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalpositifregresi" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modallogin" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Positif Regresi Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="positif_chart_regresi2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- regsembuh -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalsembuhregresi" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modallogin" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Sembuh Regresi Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="sembuh_chart_regresi2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- regmeninggal -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalmeninggalregresi" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modallogin" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Meninggal Regresi Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="meninggal_chart_regresi2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- annpocitif -->
<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalpositifann" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Positif ANN Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="positif_chart_ann2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalsembuhann" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Sembuh ANN Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="sembuh_chart_ann2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalmeninggalann" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Meninggal ANN Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="meninggal_chart_ann2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalpositifsier" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Positif SEIR Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="positif_chart_sier2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalsembuhsier" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="modallogin"
    aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Sembuh SEIR Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="sembuh_chart_sier2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>

<div data-te-modal-init
    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="modalmeninggalsier" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
    aria-labelledby="modallogin" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Meninggal SEIR Chart
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
            <?= csrf_field() ?>

            <div data-te-modal-body-ref class=" p-4">
                <div id="meninggal_chart_sier2"></div>
            </div>
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    class="text-white bg-bgFooter hover:bg-bgFooterHover focus:ring-4 focus:ring-bgFooter font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-bgFooter dark:hover:bg-bgFooterHover focus:outline-none dark:focus:ring-bgFooter"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script>
    function callAPIDropdown(parent, child) {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>puskesmas/dropdownPuskesmas",
            data: {
                id_kabupaten: $(`#${parent}`).val()
            },
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
                // console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
    $(document).ready(function () {
        $("#grid-kabupaten").change(function () {
            callAPIDropdown(this.id, 'grid-puskesmas')
        });
        $("#grid-kabupaten2").change(function () {
            callAPIDropdown(this.id, 'grid-puskesmas2')
        });
        // $("#grid-kabupaten3").change(function () {
        //     callAPIDropdown(this.id, 'grid-puskesmas3')
        // });
        var table = $('#example').DataTable({
            responsive: true
        })
            .columns.adjust()
            .responsive.recalc();
        var table = $('#exampleRegg').DataTable({
            responsive: true,
            // dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            dom: "<'flex flex-row justify-between'<'sm:w-1/3'l><'sm:w-1/3 flex justify-center text-center'B><'sm:w-1/3'f>>rtip",
            buttons: [{
                extend: 'excel',
                text: '<i class="fa-solid fa-file-export fa-bounce mr-2"></i>Export to Excel',
                className: 'px-4 py-2 text-sm bg-orange-500 hover:bg-orange-400 rounded-lg text-white font-semibold',
            }
                // 'excel',
            ],
        })
            .columns.adjust()
            .responsive.recalc();
        var table = $('#exampleSIER').DataTable({
            responsive: true,
            // dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            dom: "<'flex flex-row justify-between'<'sm:w-1/3'l><'sm:w-1/3 flex justify-center text-center'B><'sm:w-1/3'f>>rtip",
            buttons: [{
                extend: 'excel',
                text: '<i class="fa-solid fa-file-export fa-bounce mr-2"></i>Export to Excel',
                className: 'px-4 py-2 text-sm bg-orange-500 hover:bg-orange-400 rounded-lg text-white font-semibold',
            }
                // 'excel',
            ],
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
<script async>

    var optionsDataAktual = {
        title: {
            text: "Grafik Data Aktual Covid",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
            },
        },
        colors: ["#FF3232", "#00E000", "#1F1F1F"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        chart: {
            height: 470,
            type: 'area',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },

    };

    var chartDataAktual = new ApexCharts(document.querySelector("#chartDataAktual"), optionsDataAktual);
    chartDataAktual.render();
    var chartDataAktual2 = new ApexCharts(document.querySelector("#chartDataAktual2"), optionsDataAktual);
    chartDataAktual2.render();
    // apexjs regresi


    var optionPositifRegresi = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal2.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#7d1111"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartPositifRegresi = new ApexCharts(document.querySelector("#positif_chart_regresi"), optionPositifRegresi);
    chartPositifRegresi.render();
    var chartPositifRegresi2 = new ApexCharts(document.querySelector("#positif_chart_regresi2"), optionPositifRegresi);
    chartPositifRegresi2.render();

    var optionSembuhRegresi = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal3.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#00E000", "#088008"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }

    }
    var chartSembuhRegresi = new ApexCharts(document.querySelector("#sembuh_chart_regresi"), optionSembuhRegresi);
    chartSembuhRegresi.render();
    var chartSembuhRegresi2 = new ApexCharts(document.querySelector("#sembuh_chart_regresi2"), optionSembuhRegresi);
    chartSembuhRegresi2.render();

    var optionMeninggalRegresi = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal4.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#1F1F1F", "#8a8888"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartMeninggalRegresi = new ApexCharts(document.querySelector("#meninggal_chart_regresi"), optionMeninggalRegresi);
    chartMeninggalRegresi.render();
    var chartMeninggalRegresi2 = new ApexCharts(document.querySelector("#meninggal_chart_regresi2"), optionMeninggalRegresi);
    chartMeninggalRegresi2.render();

    // apexjs ann


    var optionPositifAnn = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal5.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#7d1111"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartPositifAnn = new ApexCharts(document.querySelector("#positif_chart_ann"), optionPositifAnn);
    chartPositifAnn.render();
    var chartPositifAnn2 = new ApexCharts(document.querySelector("#positif_chart_ann2"), optionPositifAnn);
    chartPositifAnn2.render();

    var optionSembuhAnn = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal6.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#00E000", "#088008"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartSembuhAnn = new ApexCharts(document.querySelector("#sembuh_chart_ann"), optionSembuhAnn);
    chartSembuhAnn.render();
    var chartSembuhAnn2 = new ApexCharts(document.querySelector("#sembuh_chart_ann2"), optionSembuhAnn);
    chartSembuhAnn2.render();

    var optionMeninggalAnn = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal7.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#1F1F1F", "#8a8888"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartMeninggalAnn = new ApexCharts(document.querySelector("#meninggal_chart_ann"), optionMeninggalAnn);
    chartMeninggalAnn.render();
    var chartMeninggalAnn2 = new ApexCharts(document.querySelector("#meninggal_chart_ann2"), optionMeninggalAnn);
    chartMeninggalAnn2.render();


    // apexjs sier


    var optionPositifSier = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal8.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#7d1111"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartPositifSier = new ApexCharts(document.querySelector("#positif_chart_sier"), optionPositifSier);
    chartPositifSier.render();
    var chartPositifSier2 = new ApexCharts(document.querySelector("#positif_chart_sier2"), optionPositifSier);
    chartPositifSier2.render();

    var optionSembuhSier = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal9.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#00E000", "#088008"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }
    }
    var chartSembuhSier = new ApexCharts(document.querySelector("#sembuh_chart_sier"), optionSembuhSier);
    chartSembuhSier.render();
    var chartSembuhSier2 = new ApexCharts(document.querySelector("#sembuh_chart_sier2"), optionSembuhSier);
    chartSembuhSier2.render();

    var optionMeninggalSier = {
        chart: {
            height: '200px',
            type: "area",
            events: {
                click: function() {
                    modal10.style.display = "block";
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#1F1F1F", "#8a8888"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt
        }

    }
    var chartMeninggalSier = new ApexCharts(document.querySelector("#meninggal_chart_sier"), optionMeninggalSier);
    chartMeninggalSier.render();
    var chartMeninggalSier2 = new ApexCharts(document.querySelector("#meninggal_chart_sier2"), optionMeninggalSier);
    chartMeninggalSier2.render();



    var optiongrafikreportregresi = {
        chart: {
            height: '386px',
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#00E000", "#1F1F1F"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt_lengkap
        }
    }
    var chartgrafikreportregresi = new ApexCharts(document.querySelector("#grafik_report_regresi"), optiongrafikreportregresi);
    chartgrafikreportregresi.render();

    var optiongrafikreportann = {
        chart: {
            height: '386px',
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#00E000", "#1F1F1F"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories:minggu_predict_tt_lengkap
        }
    }
    var chartgrafikreportann = new ApexCharts(document.querySelector("#grafik_report_ann"), optiongrafikreportann);
    chartgrafikreportann.render();

    var optiongrafikreportsier = {
        chart: {
            height: '386px',
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF3232", "#00E000", "#1F1F1F"],
        series: [],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        yaxis: {
            show: false
        },
        xaxis: {
            categories: minggu_predict_tt_lengkap
        }
    }
    var chartgrafikreportsier = new ApexCharts(document.querySelector("#grafik_report_sier"), optiongrafikreportsier);
    chartgrafikreportsier.render();
</script>

<script>
    $('#submitdataakutalsa').on('click', function (e) {
        e.preventDefault();
        $("#wait-container").show();

        $("#formdataktualform").css("opacity", "0.1");
        //Add a code to show your loader.
        $('#formdataktual').submit();
    });
    $('#submitdataakutalkabupaten').on('click', function (e) {
        e.preventDefault();
        $("#wait-containerkabupaten").show();

        $("#formdataktualformkabupaten").css("opacity", "0.1");
        //Add a code to show your loader.
        $('#formdataktualkabupaten').submit();
    });
    $(document).ready(function () {
        $("#wait-container").hide();
        $("#wait-containerkabupaten").hide();

        // PAGE IS FULLY LOADED  
        //hide your loader
    });
</script>

<script defer>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: '<?php echo base_url(); ?>lending/dataaktual',
            data:{
                'id_kab': "<?php echo user()->id_kabupaten?>",
                'role':"<?=(get_role(user()->id)[0]->name) ?>",
                'minggudalamtahun': "<?=session()->getFlashData('tminggudalamtahun')?>"
            },
            dataType: "json",
            async: true,
            cache: false,
            success: function (res) {
                minggu_ajax = res.minggudalamtahun_predict
                minggu_ajax.forEach((val,idx)=>{
                    minggu_predict_tt.push(parseInt(val))
                    minggu_predict_tt_lengkap.push('Minggu Ke - '+(parseInt(val)))
                })
                minggu_predict_tt.push(minggu_hasil)
                minggu_predict_tt_lengkap.push('Minggu Ke - '+minggu_hasil)

                let sumpositif = res.positif_jateng[res.positif_jateng.length - 1];
                let sumsembuh = res.sembuh_jateng[res.sembuh_jateng.length - 1];
                let summeninggal = res.meninggal_jateng[res.meninggal_jateng.length - 1];
                let minggu = res.minggudalamtahun
                let minggudalamtahun = []
                minggu.forEach((arr, idx) => {
                    minggudalamtahun.push("Minggu ke-" + arr)
                })
                // let sumpositif = 0;
                // let sumsembuh = 0;
                // let summeninggal = 0;
                // for (let i = 0;i<res.positif.length; i++){
                //     sumpositif += parseInt(res.positif[i],10)||0
                //     sumsembuh += parseInt(res.sembuh[i],10)||0
                //     summeninggal += parseInt(res.meninggal[i],10)||0
                // }
                $('#positifreg1').replaceWith(`<span id="positifreg1" class="font-semibold text-xl text-white">${sumpositif}</span>`);
                $('#sembuhreg1').replaceWith(`<span id="sembuhreg1" class="font-semibold text-xl text-black">${sumsembuh}</span>`);
                $('#meninggalreg1').replaceWith(`<span id="meninggalreg1" class="font-semibold text-xl text-black">${summeninggal}</span>`);

                $('#positifann1').replaceWith(`<span id="positifann1" class="font-semibold text-xl text-white">${sumpositif}</span>`);
                $('#sembuhann1').replaceWith(`<span id="sembuhann1" class="font-semibold text-xl text-black">${sumsembuh}</span>`);
                $('#meninggalann1').replaceWith(`<span id="meninggalann1" class="font-semibold text-xl text-black">${summeninggal}</span>`);

                $('#positifseir1').replaceWith(`<span id="positifseir1" class="font-semibold text-xl text-white">${sumpositif}</span>`);
                $('#sembuhseir1').replaceWith(`<span id="sembuhseir1" class="font-semibold text-xl text-black">${sumsembuh}</span>`);
                $('#meninggalseir1').replaceWith(`<span id="meninggalseir1" class="font-semibold text-xl text-black">${summeninggal}</span>`);
                chartDataAktual.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggudalamtahun,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartDataAktual.updateSeries([{
                    name: "Positif",
                    data: (res.positif)
                },
                {
                    name: "Sembuh",
                    data: (res.sembuh)
                },
                {
                    name: "Meninggal",
                    data: (res.meninggal)
                }
                ])
                chartDataAktual2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggudalamtahun,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartDataAktual2.updateSeries([{
                    name: "Positif",
                    data: (res.positif)
                },
                {
                    name: "Sembuh",
                    data: (res.sembuh)
                },
                {
                    name: "Meninggal",
                    data: (res.meninggal)
                }
                ])
                chartgrafikreportregresi.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg3))
                },
                {
                    name: "Sembuh",
                    data: (res.sembuh_predict.concat(positifreg4))
                },
                {
                    name: "Meninggal",
                    data: (res.meninggal_predict.concat(positifreg5))
                }
                ])
                chartgrafikreportregresi.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartgrafikreportann.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg6))
                },
                {
                    name: "Sembuh",
                    data: (res.sembuh_predict.concat(positifreg7))
                },
                {
                    name: "Meninggal",
                    data: (res.meninggal_predict.concat(positifreg8))
                }
                ])
                chartgrafikreportann.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartgrafikreportsier.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg9))
                },
                {
                    name: "Sembuh",
                    data: (res.sembuh_predict.concat(positifreg10))
                },
                {
                    name: "Meninggal",
                    data: (res.meninggal_predict.concat(positifreg11))
                }
                ])
                chartgrafikreportsier.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })

                const arraypositifregresi = res.positif
                const arraysembuhregresi = res.sembuh
                const arraymeninggalregresi = res.meninggal
                const arraypositifann = res.positif

                // console.log(arraypositifregresi.concat(positifreg3))
                // console.log(arraypositifann)
                chartPositifRegresi.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg3))
                }, {
                    name: "Reprediksi",
                    data: (repositifreg3)
                }, ])
                chartPositifRegresi.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartPositifRegresi2.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg3))
                }, {
                    name: "Reprediksi",
                    data: (repositifreg3)
                }, ])
                chartPositifRegresi2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                // chartgrafikreportregresi.updateSeries([{
                //     name: "Positif",
                //     data: (res.positif.concat(positifreg3))
                // }])

                // arraysembuhregresi.push("20")
                chartSembuhRegresi.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg4))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg4)
                    },

                ])
                chartSembuhRegresi.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartSembuhRegresi2.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg4))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg4)
                    },

                ])
                chartSembuhRegresi2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                // arraymeninggalregresi.push("20")
                chartMeninggalRegresi.updateSeries([{
                        name: "Meninggal",
                        data: (res.meninggal_predict.concat(positifreg5))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg5)
                    },

                ])
                chartMeninggalRegresi.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartMeninggalRegresi2.updateSeries([{
                    name: "Meninggal",
                    data: (res.meninggal_predict.concat(positifreg5))
                }, {
                    name: "Reprediksi",
                    data: (repositifreg5)
                }, ])
                chartMeninggalRegresi2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })

                // arraypositifann.push("20")
                // arraypositifann.push("20")
                chartPositifAnn.updateSeries([{
                    name: "Positif",
                    data: (res.positif_predict.concat(positifreg6))
                }, {
                    name: "Reprediksi",
                    data: (repositifreg6)
                }, ])
                chartPositifAnn.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartPositifAnn2.updateSeries([{
                        name: "Positif",
                        data: (res.positif_predict.concat(positifreg6))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg6)
                    },

                ])
                chartPositifAnn2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartSembuhAnn.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg7))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg7)
                    },

                ])
                chartSembuhAnn.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartSembuhAnn2.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg7))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg7)
                    },

                ])
                chartSembuhAnn2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartMeninggalAnn.updateSeries([{
                        name: "Meninggal",
                        data: (res.meninggal_predict.concat(positifreg8))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg8)
                    },

                ])
                chartMeninggalAnn.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartMeninggalAnn2.updateSeries([{
                        name: "Meninggal",
                        data: (res.meninggal_predict.concat(positifreg8))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg8)
                    },

                ])
                chartMeninggalAnn2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartPositifSier.updateSeries([{
                        name: "Positif",
                        data: (res.positif_predict.concat(positifreg9))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg9)
                    },

                ])
                chartPositifSier.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartPositifSier2.updateSeries([{
                        name: "Positif",
                        data: (res.positif_predict.concat(positifreg9))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg9)
                    },

                ])
                chartPositifSier2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartSembuhSier.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg10))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg10)
                    },

                ])
                chartSembuhSier.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartSembuhSier2.updateSeries([{
                        name: "Sembuh",
                        data: (res.sembuh_predict.concat(positifreg10))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg10)
                    },

                ])
                chartSembuhSier2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                chartMeninggalSier.updateSeries([{
                        name: "Meninggal",
                        data: (res.meninggal_predict.concat(positifreg11))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg11)
                    },

                ])
                chartMeninggalSier.updateOptions({
                    xaxis: {
                        categories: minggu_predict_tt,
                    },
                    fill: {
                        opacity: 1
                    },
                    
                })
                chartMeninggalSier2.updateSeries([{
                        name: "Meninggal",
                        data: (res.meninggal_predict.concat(positifreg11))
                    }, {
                        name: "Reprediksi",
                        data: (repositifreg11)
                    },

                ])
                    chartMeninggalSier2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        // formatter: function (val) {
                        //     return val + " Individu";
                        // },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: minggu_predict_tt_lengkap,
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: " Individu",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Individu"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
                if(positifreg4 && positifreg4!=''){
                                    if(document.querySelector('#hasil_prediksi').classList.contains('hidden')){
                                        document.querySelector('#hasil_prediksi').classList.remove('hidden')
                                        console.log('yyy');
                                    }
                                }else{
                                    if(!document.querySelector('#hasil_prediksi').classList.contains('hidden')){
                                        document.querySelector('#hasil_prediksi').classList.add('hidden')
                                        console.log('ttt');
                                    }

                                }
            }
        })
    })
</script>
<script>
    function callDropdownTahun(parent, child) {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>lending/dropdowntahun",
            data: {
                minggu: $(`#${parent}`).val()
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (res) {
                $(`#${child}`).html(res.list_tahun);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
    $(document).ready(function () {
        $("#dariminggu").change(function () {
            callDropdownTahun(this.id, 'tahun')
        });

    });
    $(function () {
        $("form#tanggal").on("submit", function (e) {
            e.preventDefault();
            var dataString = $(this).serialize();
            let setminggu = $(`#dariminggu`).val()
            let settahun = $(`#tahun`).val()
            // alert(dataString)
            // console.log(setminggu)
            // console.log(settahun)
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>lending/mingguaktual',
                data: {
                    minggu: setminggu,
                    tahun: settahun
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (res) {
                    let pilpositif = res.positif;
                    let pilsembuh = res.sembuh;
                    let pilmeninggal = res.meninggal;
                    let minggu = res.minggudalamtahun
                    let minggudalamtahun = []
                    minggu.forEach((arr, idx) => {
                        minggudalamtahun.push("Minggu ke-" + arr)
                    })
                    chartDataAktual.updateOptions({
                        dataLabels: {
                            enabled: true,
                            // formatter: function (val) {
                            //     return val + " Individu";
                            // },
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 5,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        xaxis: {
                            categories: minggudalamtahun,
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                        },
                        yaxis: [
                            {
                                axisTicks: {
                                    show: true,
                                },
                                axisBorder: {
                                    show: true,
                                    color: '#008FFB'
                                },
                                labels: {
                                    style: {
                                        colors: '#008FFB',
                                    }
                                },
                                title: {
                                    text: " Individu",
                                    style: {
                                        color: '#008FFB',
                                    }
                                },
                                tooltip: {
                                    enabled: true
                                }
                            }
                        ],
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + " Individu"
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                dataLabels: {
                                    enabled: false,
                                },
                            }
                        }],
                    })

                    chartDataAktual.updateSeries([{
                        name: "Positif",
                        data: (pilpositif)
                    },
                    {
                        name: "Sembuh",
                        data: (pilsembuh)
                    },
                    {
                        name: "Meninggal",
                        data: (pilmeninggal)
                    }
                    ])
                    chartDataAktual2.updateOptions({
                        dataLabels: {
                            enabled: true,
                            // formatter: function (val) {
                            //     return val + " Individu";
                            // },
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 5,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        xaxis: {
                            categories: minggudalamtahun,
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                        },
                        yaxis: [
                            {
                                axisTicks: {
                                    show: true,
                                },
                                axisBorder: {
                                    show: true,
                                    color: '#008FFB'
                                },
                                labels: {
                                    style: {
                                        colors: '#008FFB',
                                    }
                                },
                                title: {
                                    text: " Individu",
                                    style: {
                                        color: '#008FFB',
                                    }
                                },
                                tooltip: {
                                    enabled: true
                                }
                            }
                        ],
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + " Individu"
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                dataLabels: {
                                    enabled: false,
                                },
                            }
                        }],
                    })

                    chartDataAktual2.updateSeries([{
                        name: "Positif",
                        data: (res.positif)
                    },
                    {
                        name: "Sembuh",
                        data: (res.sembuh)
                    },
                    {
                        name: "Meninggal",
                        data: (res.meninggal)
                    }
                    ])
                }
            })
        });
        $("#rezet").on("click", function (e) {
            e.preventDefault()
            $('#dariminggu').prop('selectedIndex', 0);
            $("#tahun ").empty().append($('<option selected disabled></option>').text("Pilih Tahun"));
            // $('#').prop('selectedIndex', 0);
            $.ajax({
                type: "GET",
                url: '<?php echo base_url(); ?>lending/dataaktual',
                data:{
                    'id_kab': "<?php echo user()->id_kabupaten?>",
                    'role':"<?=(get_role(user()->id)[0]->name) ?>",
                    'minggudalamtahun': "<?=session()->getFlashData('tminggudalamtahun')?>"
                },
                dataType: "json",
                async: true,
                cache: false,
                success: function (res) {
                    let minggu = res.minggudalamtahun
                    let minggudalamtahun = []
                    minggu.forEach((arr, idx) => {
                        minggudalamtahun.push("Minggu ke-" + arr)
                    })

                    chartDataAktual.updateOptions({
                        dataLabels: {
                            enabled: true,
                            // formatter: function (val) {
                            //     return val + " Individu";
                            // },
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 5,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        xaxis: {
                            categories: minggudalamtahun,
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                        },
                        yaxis: [
                            {
                                axisTicks: {
                                    show: true,
                                },
                                axisBorder: {
                                    show: true,
                                    color: '#008FFB'
                                },
                                labels: {
                                    style: {
                                        colors: '#008FFB',
                                    }
                                },
                                title: {
                                    text: " Individu",
                                    style: {
                                        color: '#008FFB',
                                    }
                                },
                                tooltip: {
                                    enabled: true
                                }
                            }
                        ],
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + " Individu"
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                dataLabels: {
                                    enabled: false,
                                },
                            }
                        }],
                    })
                    chartDataAktual.updateSeries([{
                        name: "Positif",
                        data: (res.positif)
                    },
                    {
                        name: "Sembuh",
                        data: (res.sembuh)
                    },
                    {
                        name: "Meninggal",
                        data: (res.meninggal)
                    }
                    ])
                    chartDataAktual2.updateOptions({
                        dataLabels: {
                            enabled: true,
                            // formatter: function (val) {
                            //     return val + " Individu";
                            // },
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 5,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        xaxis: {
                            categories: minggudalamtahun,
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                        },
                        yaxis: [
                            {
                                axisTicks: {
                                    show: true,
                                },
                                axisBorder: {
                                    show: true,
                                    color: '#008FFB'
                                },
                                labels: {
                                    style: {
                                        colors: '#008FFB',
                                    }
                                },
                                title: {
                                    text: " Individu",
                                    style: {
                                        color: '#008FFB',
                                    }
                                },
                                tooltip: {
                                    enabled: true
                                }
                            }
                        ],
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + " Individu"
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                dataLabels: {
                                    enabled: false,
                                },
                            }
                        }],
                    })
                    chartDataAktual2.updateSeries([{
                        name: "Positif",
                        data: (res.positif)
                    },
                    {
                        name: "Sembuh",
                        data: (res.sembuh)
                    },
                    {
                        name: "Meninggal",
                        data: (res.meninggal)
                    }
                    ])
                    
                }
            })

        })
    });
</script>
<?= $this->endSection(); ?>