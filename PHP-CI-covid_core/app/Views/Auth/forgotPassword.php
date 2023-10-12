<?= $this->extend('layouts/auth_layout'); ?>

<?= $this->section('content'); ?>
<div class="flex flex-col items-center justify-center px-6 py-11 mx-auto h-screen lg:py-0 ">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class=" mr-2" src="<?= base_url() ?>img/covid-head.svg" alt="logo-header" width="300" height="80">
    </a>
    <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 sm:p-8">
            <a href="/"class="font-xs text-primary-600 hover:underline dark:text-primary-500"><i class='bx bxs-chevron-left'></i> Kembali</a>
            <div class="space-y-4 md:space-y-6">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                <?=lang('Auth.forgotPassword')?>
            </h1>
            <p class="text-sm mt-2 mb-1">
                <?=lang('Auth.enterEmailForInstructions')?>
            </p>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form class="space-y-4 md:space-y-6" action="<?= url_to('forgot') ?>" method="post">
                <?= csrf_field() ?>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <?=lang('Auth.emailAddress')?>
                    </label>
                    <input type="email" name="email" id="email"
                        class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?> bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="<?=lang('Auth.email')?>" required="">
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>
                <button type="submit"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <span><i class="bx bxs-key mr-2"></i>
                        <?=lang('Auth.sendInstructions')?>
                    </span>
                </button>
            </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>