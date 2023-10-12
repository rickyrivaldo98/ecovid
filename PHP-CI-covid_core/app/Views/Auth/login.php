<?= $this->extend('layouts/auth_layout'); ?>

<?= $this->section('content'); ?>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0 ">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class=" mr-2" src="<?= base_url() ?>img/covid-head.svg" alt="logo-header" width="300" height="80">
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    <?=lang('Auth.loginTitle')?>
                </h1>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form class="space-y-4 md:space-y-6" action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <?php if ($config->validFields === ['email']): ?>
                    <div>
                        <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <?=lang('Auth.email')?>
                        </label>
                        <input type="email" name="login" id="email"
                            class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?> bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="<?=lang('Auth.email')?>" required="">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div>
                        <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <?=lang('Auth.emailOrUsername')?>
                        </label>
                        <input type="text" name="login" id="email"
                            class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?> bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="<?=lang('Auth.emailOrUsername')?>" required="">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <?=lang('Auth.password')?>
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?> bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                            <i id="eye" class="bx bxs-low-vision absolute top-10 right-3 cursor-pointer" onclick="showPassword()"></i>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <?php if ($config->allowRemembering): ?>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" name="remember"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" <?php if
									(old('remember')) : ?> checked
								<?php endif ?>> 
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300"><?=lang('Auth.rememberMe')?></label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($config->activeResetter): ?>
                        <a href="<?= url_to('forgot') ?>"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa
                            password?</a>
                        <?php endif; ?>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><?=lang('Auth.loginAction')?></button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Belum memiliki akun? <a href="#"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Hubungi
                            Admin</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script>
        const password_field = document.querySelector('#password')
        const eye_icon = document.querySelector('#eye')
        function showPassword(){
            password_field.type = password_field.type!='password'?'password':'text'
            if(eye_icon.classList.contains('bxs-show')){
                eye_icon.classList.remove('bxs-show')
                eye_icon.classList.add('bxs-low-vision')
            }else{
                eye_icon.classList.remove('bxs-low-vision')
                eye_icon.classList.add('bxs-show')
            }
        }
    </script>
<?= $this->endSection(); ?>