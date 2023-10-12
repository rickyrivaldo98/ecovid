<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
        <?=$meta['title']?>
    </title>
    <meta content="JATENG COVID-19 Dashboard 2023" name="title">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="JATENG COVID-19 Dashboard by PT Mirai Development Solutions" name="keywords">
    <meta content="JATENG COVID-19 Dashboard 2023." name="description">
    <meta content="index, follow" name="robots">
    <meta content="English" name="language">
    <meta content="PT Mirai Development Solutions" name="author">
    <!-- cannonical -->
    <link rel="canonical" hreflang="id" href="https://covid.ekesehatan.com/">
    <link rel="alternate" hreflang="en" href="https://covid.ekesehatan.com/">
    <link rel="alternate" hreflang="x-default" href="https://covid.ekesehatan.com/">
    <!-- cannonical ends -->
    <!-- open graph -->
    <meta property="og:title" content="JATENG COVID-19 Dashboard">
    <meta property="og:site_name" content="JATENG COVID-19 Dashboard">
    <meta property="og:url" content="https://covid.ekesehatan.com/">
    <meta property="og:description"
        content="Media informasi dan prediksi kasus Covid-19 di Jawa Tengah. Hadirkan data dan visualisasi perkembangan kasus terkini Covid-19.">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="<?= base_url(); ?>img/og_image.png">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@miraidevs" />
    <meta name="twitter:creator" content="@miraidevs" />
    <!-- open graph ends-->
    <!-- Favicons -->
    <link href="<?= base_url(); ?>img/icon.svg" type="image/png" sizes="32x32" rel="icon">
    <link href="<?= base_url(); ?>img/icon.svg" type="image/png" sizes="16x16" rel="icon">
    <link href="<?= base_url(); ?>img/icon.svg" sizes="180x180" rel="apple-touch-icon">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#FBFDFF">
    <!-- vendors -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Custom styles-->
    <link rel="stylesheet" href="<?=base_url()?>css/app.css" />
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery.event.special.touchstart = {
            setup: function (_, ns, handle) {
                this.addEventListener("touchstart", handle, {
                    passive: true
                });
            }
        };
    </script>
</head>

<body class="bg-bgContent">
    <?= $this->include('templates/header_lending') ?>
    <!-- content -->
    <?= $this->renderSection('lending-content') ?>
    <!-- end content -->
    <?= $this->include('templates/footer_lending') ?>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script>
        var myNav = document.getElementById('navbar');
        window.onscroll = function () {
            if (document.body.scrollTop >= 200 || document.documentElement.scrollTop >= 200) {
                if (myNav.classList.contains('bg-white')) {
                    myNav.classList.remove("bg-white");
                }
                myNav.classList.add("bg-bgHeader");
            }
            else {
                if (myNav.classList.contains('bg-bgHeader')) {
                    myNav.classList.remove("bg-bgHeader");
                }
                myNav.classList.add("bg-white");
            }
        };
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-end"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            // document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>

</html>