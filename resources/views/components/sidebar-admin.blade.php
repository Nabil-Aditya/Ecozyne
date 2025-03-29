<style>

.bg-custom {
  background-color: #f8fcf6 !important;
}

.shadow-custom {
  box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); 
}


</style>
 
<script>
    document.addEventListener("DOMContentLoaded", function () {
      // Ambil URL saat ini
      let currentUrl = window.location.pathname;
  
      // Seleksi semua link dalam sidebar
      let menuLinks = document.querySelectorAll(".sidebar-link");
  
      // Loop melalui semua link
      menuLinks.forEach(link => {
        // Hapus semua kelas 'active' terlebih dahulu
        link.classList.remove("active");
  
        // Jika href dari menu cocok dengan URL saat ini, tambahkan 'active'
        if (link.getAttribute("href") === currentUrl) {
          link.classList.add("active");
  
          // Pastikan parent menu terbuka (untuk sub-menu)
          let parentMenu = link.closest(".collapse");
          if (parentMenu) {
            parentMenu.classList.add("show"); // Pastikan sub-menu terbuka
            let parentLink = parentMenu.previousElementSibling;
            if (parentLink) {
              parentLink.classList.add("active");
            }
          }
        }
      });
    });
  </script>
  
 <!--  Body Wrapper -->
 <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
 data-sidebar-position="fixed" data-header-position="fixed">
 <!-- Sidebar Start -->
 <aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div>
     <div class="brand-logo d-flex align-items-center justify-content-between">
       <a href="./index" class="text-nowrap logo-img d-flex align-items-center">
         <img src="../assets/images/logos/ecozyne.png" width="50" alt="" />
         <span class="ms-2 fw-bolder  text-dark fs-6">Ecozyne</span>
       </a>
       <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
         <i class="ti ti-x fs-8"></i>
       </div>
     </div>        
     <!-- Sidebar navigation-->
     <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
       <ul id="sidebarnav">
         <li class="nav-small-cap">
           <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
         </li>
         <li class="sidebar-item">
           <a class="sidebar-link active" href="./index" aria-expanded="false">
             <span>
               <i class="ti ti-layout-dashboard"></i>
             </span>
             <span class="hide-menu">Beranda</span>
           </a>
         </li>
         <li class="nav-small-cap">
           <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
           <span class="hide-menu">Menu Utama</span>
         </li>
         
         <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false" 
            style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px;">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Kelola Komunitas</span>
                <span class="dropdown-icon" style="margin-left: auto;">▾</span> 
              </a>
            <ul class="collapse first-level bg-custom shadow-custom rounded p-2">
                <li class="sidebar-item">
                <a href="./add-komunitas" class="sidebar-link">
                  <span class="hide-menu">Tambah Komunitas</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./view-komunitas" class="sidebar-link">
                  <span class="hide-menu">Data Komunitas</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false" 
            style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px;">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Kelola Bank Sampah</span>
                <span class="dropdown-icon" style="margin-left: auto;">▾</span> 
              </a>
            <ul class="collapse first-level bg-custom shadow-custom rounded p-2">
                <li class="sidebar-item">
                <a href="./tambah-pengguna.html" class="sidebar-link">
                  <span class="hide-menu">Tambah Bank Sampah</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./daftar-pengguna.html" class="sidebar-link">
                  <span class="hide-menu">Data Bank Sampah</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./daftar-pengguna.html" class="sidebar-link">
                  <span class="hide-menu">Persetujuan Bank Sampah</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false" 
            style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px;">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Kelola Artikel</span>
                <span class="dropdown-icon" style="margin-left: auto;">▾</span> 
              </a>
            <ul class="collapse first-level bg-custom shadow-custom rounded p-2">
                <li class="sidebar-item">
                <a href="./add-artikel" class="sidebar-link">
                  <span class="hide-menu">Tambah Artikel</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./view-artikel" class="sidebar-link">
                  <span class="hide-menu">Data Artikel</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false" 
            style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px;">
                <span>
                  <i class="ti ti-pin"></i>
                </span>
                <span class="hide-menu">Kelola Kegiatan</span>
                <span class="dropdown-icon" style="margin-left: auto;">▾</span> 
              </a>
            <ul class="collapse first-level bg-custom shadow-custom rounded p-2">
                <li class="sidebar-item">
                <a href="./tambah-pengguna.html" class="sidebar-link">
                  <span class="hide-menu">Tambah Kegiatan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./daftar-pengguna.html" class="sidebar-link">
                  <span class="hide-menu">Data Kegiatan</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false"
             style="display: flex; justify-content: space-between; align-items: center; padding-right: 10px;">
                <span>
                  <i class="ti ti-gift"></i>
                </span>
                <span class="hide-menu">Kelola Hadiah</span>
                <span class="dropdown-icon" style="margin-left: auto;">▾</span> 
              </a>
            <ul class="collapse first-level bg-custom shadow-custom rounded p-2">
                <li class="sidebar-item">
                <a href="./add-hadiah" class="sidebar-link">
                  <span class="hide-menu">Tambah Hadiah</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="./view-hadiah" class="sidebar-link">
                  <span class="hide-menu">Data Hadiah</span>
                </a>
              </li>
            </ul>
          </li>

         <hr>

         <x-version-info />

     </nav>
     <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->