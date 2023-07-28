<!DOCTYPE html>

<!-- =========================================================
* assets/sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/assets/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="pt-br"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/sneat/assets/') ?>"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

   
    
    <!--<link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.bundle.min.css') ?>">
    <script src="https://kit.fontawesome.com/6bb2b4ffa6.js" crossorigin="anonymous"></script>


    <script src="https://kit.fontawesome.com/6bb2b4ffa6.js" crossorigin="anonymous"></script>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/fonts/boxicons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('assets/sneat/assets/vendor/js/helpers.js') ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/sneat/assets/js/config.js') ?>"></script>


    <style>
      thead th {
        cursor: pointer;
      }
    </style>
  </head>

  <body>



  
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
                
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2"
              
              >SURICATE</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item listaHome" id="home">
              <a href="<?= site_url('product/home') ?>" class="menu-link ">
            <i class="fa-solid fa-house"></i>
                <div data-i18n="Analytics" style="transform:translateX(15px);">Início</div>
              </a>
            </li>

            <!-- Layouts -->

               
                  <!--
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">container</div>
                  </a>
                </li>
                
                <li class="menu-item active">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>-->
  
                <li class="">
        <span class="menu-header-text" ></span>
      </li>

      <li class="">
        <span class="menu-header-text" ></span>
      </li>




         <li class="menu-item listaHome" id="justificativas">
               <a href="<?= site_url('Product') ?>" class="menu-link">
               <i class="fa-solid fa-list"></i>
                 <div data-i18n="Without navbar"  style="transform:translateX(10px);">Justificativas</div>
               </a>
             </li>
             <li class="menu-item listaHome" id="alunos">
               <a href="<?= site_url('Product/alunos_cadastrados') ?>" class="menu-link">
               <i class="fa-solid fa-user"></i>
                 <div data-i18n="Without navbar"  style="transform:translateX(10px);"> Alunos cadastrados</div>
               </a>
             </li>
           
      <li class="">
        <span class="menu-header-text" ></span>
      </li>

      <li class="">
        <span class="menu-header-text" ></span>
      </li>



          <li class="menu-item listaHome" id="administradores">
            <a href="<?= site_url('Product/adm') ?>" class="menu-link">
            <i class="fa-solid fa-pen-to-square"></i>
              <div data-i18n="Without navbar"  style="transform:translateX(10px);">Administradores</div>
            </a>
          </li>
          <li class="menu-item listaHome" id="Deslogar">
            <a href="<?= site_url('Product/logout') ?>" class="menu-link">
            <i class="fa-solid fa-door-open"></i>
              <div data-i18n="Without navbar"  style="transform:translateX(10px);">Deslogar</div>
            </a>
          </li>
              

        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


        <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Pesquisar..."
                    aria-label="Search..."
                    onkeyup="searchHome()"
                    id="searchbarHome"
                  />
                </div>
              </div>
              <!-- /Search -->

            </div>
          </nav>

          <!-- / Navbar -->
          <!-- Navbar -->


  <!-- criação da render -->
  <?= $this->renderSection('layout') ?>
  <!-- /criação da render -->


      <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets/sneat/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/sneat/assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/sneat/assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

    <script src="<?= base_url('assets/sneat/assets/vendor/js/menu.js') ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url('assets/sneat/assets/js/main.js') ?>"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>

function searchHome() {
      let input = document.getElementById('searchbarHome').value
      input = input.toLowerCase();
      let x = document.getElementsByClassName('listaHome');

      for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
          x[i].style.display = "none";
        } else {
          x[i].style.display = "";
        }
      }
    }
    </script>
  </body>
</html>