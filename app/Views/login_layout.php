<!DOCTYPE html>

<!-- =========================================================
* public/assets/sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/public/assets/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/sneat/assets/')?>"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

  
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.bundle.min.css')?>">
    <script src="https://kit.fontawesome.com/6bb2b4ffa6.js" crossorigin="anonymous"></script>

  
    <style>
        .invalido:invalid{
            animation: shake .3s linear;
            

        }

        a{
          text-decoration: none;
        }


        @keyframes shake{
            25%{
                transform: translateX(4px);
                border: 1px solid red;
                box-shadow: 0 0 0.5em red;
            }
            50%{
                transform: translateX(-4px);
                border: 1px solid red;
                box-shadow: 0 0 0.5em red;
            }
            75%{
                transform: translateX(4px);
                border: 1px solid red;
                box-shadow: 0 0 0.5em red;
            }
        }


.titulo {
    font-family: 'Poppins';

  }
  
    </style>

    <meta name="description" content="" />

    <!-- Favicon -->
   

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/fonts/boxicons.css')?>" />

    <!-- Core CSS -->
    
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/css/core.css" class="template-customizer-core-css')?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css')?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/css/demo.css')?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/css/pages/page-auth.css')?>" />
   
  </head>

  <body>


  <!-- criação da render -->
  <?= $this->renderSection('conteudo') ?>
  <!-- /criação da render -->


  <script src="<?= base_url('assets/sneat/assets/vendor/js/helpers.js')?>"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="<?= base_url('assets/sneat/assets/js/config.js')?>"></script>

    <!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('assets/sneat/assets/vendor/libs/jquery/jquery.js')?>"></script>
<script src="<?= base_url('assets/sneat/assets/vendor/libs/popper/popper.js')?>"></script>
<script src="<?= base_url('assets/sneat/assets/vendor/js/bootstrap.js')?>"></script>
<script src="<?= base_url('assets/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

<script src="<?= base_url('assets/sneat/assets/vendor/js/menu.js')?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="<?= base_url('assets/sneat/assets/js/main.js')?>"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>



  </body>
</html>