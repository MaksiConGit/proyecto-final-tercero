<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../template_files/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Materias</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../template_files/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../template_files/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../template_files/assets/css/demo.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="../../template_files/assets/vendor/js/helpers.js"></script>
    <script src="../../template_files/assets/js/config.js"></script>
  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">

      <div class="layout-container">

        <x-aside></x-aside>

        <div class="layout-page">

        <x-navbar></x-navbar>

        <x-breadcrumb></x-breadcrumb>

        {{ $slot }}

      <x-footer></x-footer>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../template_files/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../template_files/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../template_files/assets/vendor/js/bootstrap.js"></script>
    <script src="../../template_files/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../template_files/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../template_files/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../template_files/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../template_files/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
