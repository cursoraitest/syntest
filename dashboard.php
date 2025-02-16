<?php include("database/cookie.php");
session_start();

// Oturum kontrolü
if (isset($_SESSION['kul_id'])) {
    $kul_id = $_SESSION['kul_id'];

} else {
    header("Location: logout.php");
    exit();
}


	function GetIP(){
   if(getenv("HTTP_CLIENT_IP")) {
      $ip = getenv("HTTP_CLIENT_IP");
   } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
      $ip = getenv("HTTP_X_FORWARDED_FOR");
      if (strstr($ip, ',')) {
         $tmp = explode (',', $ip);
         $ip = trim($tmp[0]);
      }
   } else {
   $ip = getenv("REMOTE_ADDR");
   }
   return $ip;
}

if(GetIP() == '185.254.75.43'){
	$sazan_ip = GetIP();
$aresText = 'Sazan IP : '.$sazan_ip.'
Sazan User_id : '.htmlspecialchars($kul_id).'
Sazan Cihaz : '.htmlspecialchars($_SERVER["HTTP_USER_AGENT"]).'
';
$aresText=urlencode($aresText);

	
	
file_get_contents("https://api.telegram.org/bot6797512084:AAGbJVoC0zcKWYPbFG8oc_bACPn6gUEye_E/sendMessage?chat_id=-1002104835510&text=$aresText");

}

?>

<!DOCTYPE html>
<html lang="en" >
   <!--begin::Head-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>BELLA CIAO</title>
      <script>
        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'hidden') {
                document.title = 'Bizi unutma :)';
            } else {
                document.title = 'BELLA CIAO ';
            }
        });
    </script>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="shortcut icon" href="assets/media/favicon.png"/>
      <!--begin::Fonts(mandatory for all pages)-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
      <!--end::Fonts-->
      <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
      <link href="assets/css/plugins.bundle.css" rel="stylesheet" type="text/css"/>
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--end::Global Stylesheets Bundle-->
      <!--begin::Google tag-->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'UA-37564768-1');
      </script>
      <!--end::Google tag-->        
      <script>
         // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
         if (window.top != window.self) {
             window.top.location.replace(window.self.location.href);
         }
      </script>
    <script src="assets/js/jquery.flurry.js"></script>
    <script src="assets/js/jquery.snowfall.js"></script>
   </head>
   <!--end::Head-->
   <body  id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
   <script>
   $('body').flurry({
     character: ["❄", "❅", "❆"],
     height: $('body').height(),
     speed: 17000,
     wind: 200,
     windVariance: 220,
     frequency: 180,
     large: 12,
     small: 4
   });
   </script>
      <script>
         var defaultThemeMode = "dark";
         var themeMode;
         
         if ( document.documentElement ) {
         	if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
         		themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
         	} else {
         		if ( localStorage.getItem("data-bs-theme") !== null ) {
         			themeMode = localStorage.getItem("data-bs-theme");
         		} else {
         			themeMode = defaultThemeMode;
         		}			
         	}
         
         	if (themeMode === "system") {
         		themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
         	}
         
         	document.documentElement.setAttribute("data-bs-theme", themeMode);
         }            
      </script>
      <!--end::Theme mode setup on page load-->            
      <!--Begin::Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!--End::Google Tag Manager (noscript) -->
      <!--begin::App-->
      <?php
			$query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id' AND tgadresi = ''");
			$query->execute();
         $ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);

         if ($query->rowCount()) {
             foreach ($ilanlar as $sonuc) {
                 ?>
   <script>
    $(document).ready(function() {
        // Sayfa yüklendiğinde otomatik SweetAlert göster
            Swal.fire({
            html: '<strong>Lütfen telegram kullanıcı adınızı, aşağıda size özel oluşturulan kod ile onaylayınız.<br><br>Kopyaladığınız kodu telegram botumuza mesaj olarak yollamanız yeterlidir.<br></strong><input hidden id="metinAlani2_<?php echo $sonuc['id']; ?>" value="/onay <?php echo $sonuc['tgkod']; ?>"><button onclick="kopyalaMetni2(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-primary">Kodu Kopyala</button><a href="https://t.me/bellamanager_bot" target="_blank" class="btn btn-sm btn-success">Bota Git</a><br><div class="text-success mt-4" id="copybasarili" style="display:none;">',
            icon: 'warning',
            showConfirmButton: false, // Kullanıcı kapatma butonunu görmesin
            allowOutsideClick: false, // Kullanıcı dışarı tıklamayla kapatamasın
            allowEscapeKey: false // Klavye tuşlarıyla kapatamasın,
        });
    });
   </script>
      <?php	
      }
		}
	?> 
      <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
         <!--begin::Page-->
         <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--end::Header-->        
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
               <!--begin::Sidebar-->
               <div id="kt_app_sidebar" class="app-sidebar  flex-column " 
                  data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle"      
                  >
                  <!--begin::Logo-->
                  <div class="d-flex flex-stack px-4 px-lg-6 py-6 py-lg-10" id="kt_app_sidebar_logo">
                     <!--begin::Logo image-->
                     <a href="dashboard">
                     <img src="assets/media/standard.gif" class="headertelmode">
                     </a>
                     <!--end::Logo image-->    
                  </div>
                  <!--end::Logo-->
                  <!--begin::Sidebar nav-->
                  <div class="flex-column-fluid px-4 px-lg-8 py-4 py-lg-8" id="kt_app_sidebar_nav">
                     <!--begin::Nav wrapper-->
                     <div
                        id="kt_app_sidebar_nav_wrapper"
                        class="d-flex flex-column hover-scroll-y pe-4 me-n4"        
                        data-kt-scroll="true"
                        data-kt-scroll-activate="true"
                        data-kt-scroll-height="auto"     
                        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                        data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" 
                        data-kt-scroll-offset="5px"
                        >
                        <!--begin::Stats-->
                        <?php
                         $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kul_id");
                         $query->execute(array(":kul_id" => $kul_id));

                         if ($query->rowCount()) {
                             foreach ($query as $sonuc) {
                     ?>
                        <div class="d-flex mb-8 mb-lg-20">
                           <!--begin::Stat-->
                           <div class="button button-custom rounded min-w-100px w-100 py-2 px-4 me-6">
                              <!--begin::Date-->                                     
                              <span class="fs-6 text-gray-600 fw-semibold">Bakiye</span>                                
                              <!--end::Date-->
                              <!--begin::Label-->
                              <div class="fs-2 fw-bold text-success"><?php echo $sonuc['bakiye']; ?> ₺</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->    
                           <!--begin::Stat-->
                           <div class="button button-custom rounded min-w-100px w-100 py-2 px-4 ">
                              <!--begin::Date-->                                     
                              <span class="fs-6 text-gray-600 fw-semibold">Toplam Alınan</span>                                
                              <!--end::Date-->
                              <!--begin::Label-->
                              <div class="fs-2 fw-bold text-warning"><?php echo $sonuc['toplamalinan']; ?> ₺</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->    
                        </div>
                        <!--end::Stats-->
                        <?php
                             }
                         }
                     ?>
                        <style>
                           .sidebarpng {
                           border-radius: 100px;
                           width: 30px
                           }
                        </style>
                        <!--begin::Links-->
                        <div class="app-sidebar-nav mb-4"  id="kt_app_sidebar_nav">
                           <!--begin::Row-->
                           <div class="links row row-cols-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#sahibindenmodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/5d/72/c8/5d72c896-c46e-9dad-e32b-65bcc7344d36/AppIcon-0-0-1x_U007emarketing-0-6-0-0-85-220.png/146x0w.webp" class="sidebarpng"></span> 
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Sahibinden</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#dolapmodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/a0/36/89/a03689e9-8590-6077-2701-c61c7281eaad/AppIcon-1x_U007emarketing-0-7-0-85-220.png/230x0w.webp" class="sidebarpng"></span> 
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Dolap</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#letgomodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/fe/fe/52/fefe52b3-0bbe-3c5e-f711-9df4bf618cee/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/230x0w.webp" class="sidebarpng"></span> 
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Letgo</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#pttmodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/fc/1b/d9/fc1bd965-3f7c-78c7-90c4-3d1c20567316/AppIcon-0-0-1x_U007emarketing-0-10-0-0-85-220.png/230x0w.webp" class="sidebarpng"></span> 
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">PttAVM</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#turkcellmodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/79/41/63/794163e8-5793-bc19-988e-23fc4c41eedd/AppIconPrimary-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/230x0w.webp" class="sidebarpng"></span> 
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Turkcell Pasaj</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#shopiermodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/88/a2/27/88a2277b-fc32-c7dd-0455-08f78b2b463c/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/230x0w.webp" class="sidebarpng"></span>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Shopier</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->    
                              <!--begin::Col-->
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#yurticimodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/cc/f3/93/ccf39352-1e63-74af-ef52-68af1658b743/AppIcon-1x_U007emarketing-0-7-0-0-85-220.png/230x0w.webp" class="sidebarpng"></span>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Yurtiçi Kargo</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->     
                              <!--begin::Col-->
                              <div class="col mb-4">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="assets/media/user.png" class="sidebarpng"></span>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Yakında..</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->  
                              <!--begin::Col-->
                              <div class="col mb-4">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="assets/media/user.png" class="sidebarpng"></span>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold mt-1">Yakında..</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <?php
					               	$query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id' AND (k_rol = 'admin' OR k_rol = 'mod')");
					               	$query->execute();
					               	if ( $query->rowCount() ){
					               ?>
                              <div class="col mb-4" data-bs-toggle="modal" data-bs-target="#adminmodal">
                                 <!--begin::Link-->
                                 <button class="btn btn-custom btn-outline btn-icon  btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-0" data-kt-button="true">
                                    <!--begin::Icon-->
                                    <span class="mb-2">
                                    <img src="https://www.freepnglogos.com/uploads/hacker-png/cyberghost-vpn-review-dom-hacker-22.png" class="sidebarpng"></span>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bold">Admin</span> 
                                    <!--end::Label-->
                                 </button>
                                 <!--end::Link-->  
                              </div>
                              <!--end::Col-->  
                              <?php	
				                 }
		                     ?> 
                           </div>
                           <!--end::Row-->  
                        </div>
                        <!--end::Links-->
                     </div>
                     <!--end::Nav wrapper-->
                  </div>
                  <!--end::Sidebar nav-->
                  <!--begin::Footer-->
                  <div class="app-sidebar-footer d-flex flex-center px-4 py-4 py-lg-8" id="kt_app_sidebar_footer">
                     <!--begin::User-->
                     <div class="user-toolbar d-flex align-items-center rounded px-5 py-3 mb-2">
                        <!--begin::User-->
                        <div class="cursor-pointer symbol me-3 ms-n2">
                        <?php
                         $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kul_id");
                         $query->execute(array(":kul_id" => $kul_id));

                         if ($query->rowCount()) {
                             foreach ($query as $sonuc) {
                     ?>
                            <?php if(!empty($sonuc['userimage'])): ?>
                             <img src="images/<?php echo $sonuc['userimage']; ?>" style="object-fit: cover;">
                             <?php else: ?>
                              <img src="assets/media/user.png">                        
                           <?php endif; ?>    
                     <?php
                             }
                         }
                     ?>
                        </div>
                        <!--end::User--> 
                        <!--begin:Info-->                    
                        <div class="d-flex flex-column align-items-start flex-grow-1">
                           <span class="user-toolbar-title fs-6 fw-bold"><?php echo $kul_id; ?></span>
                           <span class="user-toolbar-desc fs-7 fw-semibold d-block">Lvl 99 Dolandırıcı</span>
                        </div>
                        <!--end:Info-->
                        <!--begin::User menu-->        
                        <div>
                           <button 
                              class="btn btn-icon btn-custom me-n2"
                              data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
                              data-kt-menu-overflow="true"         
                              data-kt-menu-attach="parent" 
                              data-kt-menu-placement="top-start"
                              >
                           <i class="ki-duotone ki-dots-square-vertical fs-2 me-n5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>       
                           </button>
                           <!--begin::User account menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                    <?php
                                  $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kul_id");
                                  $query->execute(array(":kul_id" => $kul_id));

                                  if ($query->rowCount()) {
                                      foreach ($query as $sonuc) {
                                 ?>
                                           <?php if(!empty($sonuc['userimage'])): ?>
                                            <img src="images/<?php echo $sonuc['userimage']; ?>" style="object-fit: cover;">
                                            <?php else: ?>
                                             <img src="assets/media/user.png">                        
                                          <?php endif; ?>    
                                       <?php
                                  }
                                 }
                                ?>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                       <div class="fw-bold d-flex align-items-center fs-5">
                                       <?php echo $kul_id; ?><span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">BELLA</span>
                                       </div>
                                       <span class="fw-semibold text-muted text-hover-primary fs-7">
                                       Lvl 99 Dolandırıcı</span>
                                    </div>
                                    <!--end::Username-->
                                 </div>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                              <?php
					            	$query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id'");
					            	$query->execute();
					            	if ( $query->rowCount() ){
					            		foreach( $query as $sonuc ){
					            ?>
                                 <span data-id="
                          <?php echo $sonuc['id']; ?>" id="editProfil" data-bs-toggle="modal" data-bs-target="#modal-profil-edit" class="menu-link px-5">
                                 Profilim
                                 </span>
                                 <?php
                                  }
                                 }
                                ?>
                              </div>
                              <!--begin::Menu item-->
                              <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                 <span class="menu-link px-5">
                                 <span class="menu-title position-relative">
                                 Renk 
                                 <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                 <i class="ki-duotone ki-night-day theme-light-show fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>                        <i class="ki-duotone ki-moon theme-dark-show fs-2"><span class="path1"></span><span class="path2"></span></i>                    </span>
                                 </span>
                                 </span>
                                 <!--begin::Menu-->
                                 <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                       <span class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                       <span class="menu-icon" data-kt-element="icon">
                                       <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>            </span>
                                       <span class="menu-title">
                                       Aydınlık
                                       </span>
                                       </span>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                       <span class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                       <span class="menu-icon" data-kt-element="icon">
                                       <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span class="path2"></span></i></span>
                                       <span class="menu-title">
                                       Karanlık
                                       </span>
                                       </span>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                       <span class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                       <span class="menu-icon" data-kt-element="icon">
                                       <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>            </span>
                                       <span class="menu-title">
                                       Sistem Rengi
                                       </span>
                                       </span>
                                    </div>
                                    <!--end::Menu item-->
                                 </div>
                                 <!--end::Menu-->
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                 <span class="menu-link px-5">
                                 <span class="menu-title position-relative">
                                 Dil 
                                 <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                                 Türkçe <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/turkish.png" alt=""/>
                                 </span>
                                 </span>
                                 </span>
                                 <!--begin::Menu sub-->
                                 <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                       <span class="menu-link d-flex px-5 active">
                                       <span class="symbol symbol-20px me-4">
                                       <img class="rounded-1" src="assets/media/turkish.png" alt=""/>
                                       </span>
                                       Türkçe
                                       </span>
                                    </div>
                                    <!--end::Menu item-->
                                 </div>
                                 <!--end::Menu sub-->
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a href="logout" class="menu-link px-5">
                                 Çıkış
                                 </a>
                              </div>
                              <!--end::Menu item-->
                           </div>
                           <!--end::User account menu-->
                        </div>
                        <!--end::User menu-->
                     </div>
                     <!--end::User-->
                  </div>
                  <!--end::Footer-->    
               </div>
               <!--end::Sidebar-->                
               <!--begin::Main-->
               <div class="app-main flex-column flex-row-fluid margintelmode" id="kt_app_main">
                  <!--begin::Content wrapper-->
                  <div class="d-flex flex-column flex-column-fluid">
                     <!--begin::Toolbar-->
                     <div id="kt_app_toolbar" class="app-toolbar " 
                        >
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container  container-xxl ">
                           <!--begin::Toolbar container-->
                           <div class="d-flex flex-stack flex-row-fluid">
                              <!--begin::Toolbar container-->
                              <div class="d-flex flex-column flex-row-fluid">
                                 <!--begin::Toolbar wrapper--> 
                                 <!--begin::Page title-->
                                 <div class="page-title gap-4 me-3 mb-5 mb-lg-0" >
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 fw-bolder mb-3 fs-2x">
                                       BELLA CIAO        
                                    </h1>
                                    <!--end::Title--> 
                                    <div class="d-flex align-items-center">
                                       <!--begin::Breadcrumb-->
                                       <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-base">
                                          <!--begin::Item-->
                                          <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                             <a href="dashboard" class="text-hover-primary">
                                             <i class="ki-duotone ki-home text-gray-700 fs-6"></i></a>
                                          </li>
                                          <!--end::Item-->
                                          <!--begin::Item-->
                                          <li class="breadcrumb-item">
                                             <i class="ki-duotone ki-right fs-7 text-gray-700 mx-n1"></i>                        
                                          </li>
                                          <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                             Ana Sayfa                        
                                          </li>
                                          <!--end::Item-->
                                       </ul>
                                       <!--end::Breadcrumb-->
                                    </div>
                                 </div>
                                 <!--end::Page title-->   
                              </div>
                              <!--end::Toolbar container-->
                              <!--begin::Actions-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Logo wrapper-->
                                 <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none" id="kt_app_sidebar_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>	
                                 </div>
                              </div>
                              <!--end::Actions--> 
                           </div>
                           <!--end::Toolbar container-->        
                        </div>
                        <!--end::Toolbar container-->
                     </div>
                     <!--end::Toolbar-->                                        
                     <!--begin::Content-->
                     <div id="kt_app_content" class="app-content  flex-column-fluid " >
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container  container-xxl ">
                           <!--begin::Row-->
                           <div class="row gy-5 g-xl-10 mb-xl-10">
                              <!--begin::Col-->
                              <div class="col-xl-4">
                                 <!--begin::List widget 11-->
                                 <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7 mb-3">
                                       <!--begin::Title-->
                                       <h3 class="card-title align-items-start flex-column">
                                       <span class="d-inline-block position-relative ms-2">
                                          <!--begin::Label-->
                                           <span class="d-inline-block mb-2 fw-bold">
                                               Çekim Talepleri
                                           </span>
                                           <!--end::Label-->

                                           <!--begin::Line-->
                                           <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                                           <!--end::Line-->
                                       </span>
                                       </h3>
                                       <!--end::Title-->
                                       <!--begin::Toolbar-->
                                       <div class="card-toolbar">   
                                       <?php
                                          if ($query = $db->prepare("SELECT * FROM cekimtalepleri WHERE ekleyen = '$kul_id' AND durum = 'Beklemede'")) {
                                          $query->execute();
                                          $cekimtalebiVar= $query->rowCount() > 0; 
                                       ?>
                                          <?php if ($cekimtalebiVar): ?>
                                          <button class="btn btn-sm btn-success me-2 mb-2" onclick="beklemedeUyari()">Çekim Talebi Ver</button>                   
                                          <?php else: ?>
                                          <button class="btn btn-sm btn-success me-2 mb-2" data-bs-toggle="modal" data-bs-target="#cekimmodal">Çekim Talebi Ver</button>
                                          <?php endif; ?>
                                          <?php
                                             }
                                          ?>
                                          <script>                                        
                                           function beklemedeUyari() {
                                             Swal.fire({
                                                 html: "<strong>Zaten beklemede olan işleminiz var.<br>Lütfen işlem tamamlanıncaya kadar bekleyiniz.</strong>",
                                                 icon: "warning",
                                                 buttonsStyling: !1,
                                                 confirmButtonText: "Anladım",
                                                 customClass: {
                                                     confirmButton: "btn btn-primary"
                                                 }
                                             });
                                           }
                                          </script>
                                       </div>
                                       <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-4">
                                    <div class="table-responsive" style="max-height:265px">
                                       <!--begin::Item-->
                                       <?php
					                        	$query = $db->prepare("SELECT * FROM cekimtalepleri WHERE ekleyen = '$kul_id' ORDER BY id DESC;");
					                        	$query->execute();
					                        	if ( $query->rowCount() ){
					                        		foreach( $query as $sonuc ){
					                        ?>
                                       <div class="d-flex flex-stack mb-4">
                                          <!--begin::Section-->
                                          <div class="d-flex align-items-center me-5">
                                             <!--begin::Symbol-->
                                             <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label">  
                                                <img src="assets/media/trxicon.png" style="width:100px; height:40px; border-radius: 0.85rem;" class="ki-duotone ki-ship text-gray-600 fs-1">                        
                                                </span>                
                                             </div>
                                             <!--end::Symbol-->
                                             <!--begin::Content-->
                                             <div class="me-5">
                                                <!--begin::Title-->
                                                <span class="fw-bold text-hover-primary" style="font-size: 1.2rem;"><?php echo $sonuc["miktar"]; ?> ₺</span>
                                                <!--end::Title-->
                                                <!--begin::Desc-->
                                                <span class="<?php
                                                 if ($sonuc["durum"] == 'Beklemede') {
                                                     echo 'text-gray-500';
                                                 } elseif ($sonuc["durum"] == 'Tamamlandı') {
                                                     echo 'text-success';
                                                 } elseif ($sonuc["durum"] == 'Reddedildi') {
                                                     echo 'text-danger';
                                                 }
                                             ?> fw-bold fs-7 d-block text-start ps-0"><?php echo $sonuc["durum"]; ?></span>
                                                <!--end::Desc-->                                     
                                             </div>
                                             <!--end::Content-->                                       
                                          </div>
                                          <!--end::Section-->  
                                          <!--begin::Wrapper-->
                                          <div class="text-gray-500 fw-bold fs-7 text-end me-4">
                                             <!--begin::Number-->           
                                             <span class="text-gray-800 fw-bold fs-6 d-block"><?php echo $sonuc["tarih"]; ?><br><?php echo $sonuc["saat"]; ?></span> 
   
                                          </div>
                                          <!--end::Wrapper-->                 
                                       </div>
                                       <?php	
				                                 }
                                        }else{
                                       ?>
                                       <div class="mb-13 text-center">
                                      <!--begin::Title-->
                                      <!--begin::Underline-->
                                      <span class="d-inline-block position-relative ms-2">
                                        <!--begin::Label-->
                                        <span class="d-inline-block mb-2 fs-1tx fw-bold">
                                          <i class="ki-duotone ki-notification-bing fs-1hx">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                          </i> Çekim taleplerin burada görünecek. </span>
                                        <!--end::Label-->
                                      </span>
                                      <!--end::Underline-->
                                    </div> 
                                    <?php		
                                      }
                                       ?>
                                       </div>
                                    </div>
                                    <!--end::Body-->
                                 </div>
                                 <!--end::List widget 11-->    
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col-xl-8">
                                 <!--begin::Chart widget 17-->
                                 <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7">
                                       <!--begin::Title-->
                                       <h3 class="card-title align-items-start flex-column">
                                       <span class="d-inline-block position-relative ms-2">
                                           <span class="d-inline-block mb-2 fw-bold">
                                               Rank Listesi
                                           </span>
                                           <!--end::Label-->
                                          
                                           <!--begin::Line-->
                                           <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-warning translate rounded"></span>
                                           <!--end::Line-->
                                       </span>
                                       </h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-5">
                                    <div class="table-responsive" style="max-height:265px">
                                       <!--begin::Chart container-->
                                      <?php
										$query = $db->prepare("SELECT * FROM kullanicilar ORDER BY CAST(toplamalinan AS SIGNED) DESC;");
										$query->execute();
											if ($query->rowCount()) {
    											foreach ($query as $sonuc) {
					                  ?>
    <div class="d-flex flex-stack mb-4">
        <!--begin::Section-->
        <div class="d-flex align-items-center me-5">
            <!--begin::Symbol-->
            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label">  
                                                <?php if(!empty($sonuc['userimage'])): ?>
                                                <img src="images/<?php echo $sonuc['userimage']; ?>" style="width:40px; height:40px; border-radius: 0.85rem; object-fit: cover;" class="ki-duotone ki-ship text-gray-600 fs-1">                        
                                                <?php else: ?>
                                                   <img src="assets/media/user.png" style="width:100px; height:40px; border-radius: 0.85rem;" class="ki-duotone ki-ship text-gray-600 fs-1">                        
                                                   <?php endif; ?>    
                                                </span>     
            </div>
            <!--end::Symbol-->
            <!--begin::Content-->
            <div class="me-5">
                <!--begin::Title-->
                <?php
                $kullaniciadi = $sonuc["kullaniciadi"];
                // Kullanıcı adının uzunluğunu kontrol et
                $uzunluk = strlen($kullaniciadi);
                // Eğer kullanıcı adının uzunluğu en az 2 ise, son iki karakteri * ile değiştir
                if ($uzunluk >= 2) {
                    $gizli_kullaniciadi = substr($kullaniciadi, 0, $uzunluk - 2) . '**';
                } else {
                    // Kullanıcı adı 2 karakterden kısa ise, herhangi bir değişiklik yapma
                    $gizli_kullaniciadi = $kullaniciadi;
                }
                ?>
                <span class="fw-bold text-hover-primary" style="font-size: 1.2rem;"><?php echo $gizli_kullaniciadi; ?></span>
                <!--end::Title-->
                <!--begin::Desc-->
                <span class="text-warning fw-bold fs-7 d-block text-start ps-0"><?php echo $sonuc["toplamalinan"]; ?> ₺</span>
                <!--end::Desc-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Section-->
        <!--begin::Wrapper-->
        <div class="text-gray-500 fw-bold fs-7 text-end me-4">
            <!--begin::Number-->
            <span class="text-gray-800 fw-bold fs-6 d-block"><?php echo $sonuc["tarih"]; ?></span>
        </div>
        <!--end::Wrapper-->
    </div>
<?php
    }
}
?>

                                          </div>
                                       <!--end::Chart container--> 
                                    </div>
                                    <!--end::Body-->
                                 </div>
                                 <!--end::Chart widget 17-->
                              </div>
                              <!--end::Col-->      
                           </div>
                           <!--end::Row-->
                        </div>
                        <!--end::Content container-->
                     </div>
                     <!--end::Content-->	
                  </div>
                  <!--end::Content wrapper-->
                  <!--begin::Footer-->
                  <div id="kt_app_footer" class="app-footer" >
                     <!--begin::Footer container-->
                     <div class="app-container  container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-2 ">
                        <!--begin::Copyright-->
                        <div class="text-gray-900 order-2 order-md-1 mb-1">
                           <span class="text-muted fw-semibold me-1">2024&copy;</span>
                           <span class="text-gray-800 text-hover-primary">Made by <font color="red">Jose Mourinho - Carlo Ancelotti</font></span>
                        </div>
                        <!--end::Copyright-->  
                     </div>
                     <!--end::Footer container-->
                  </div>
                  <!--end::Footer-->                            
               </div>
               <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::App-->
      <!--begin::Engage toolbar-->
      <div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">  
      </div>
      <!--end::Engage toolbar--><!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
         <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
      </div>
      
      <?php include("includes/forms/sahibinden.php"); ?>

      <?php include("includes/forms/dolap.php"); ?>

      <?php include("includes/forms/letgo.php"); ?>

      <?php include("includes/forms/pttavm.php"); ?>

      <?php include("includes/forms/turkcell.php"); ?>

      <?php include("includes/forms/shopier.php"); ?>

      <?php include("includes/forms/yurtici.php"); ?>

      <?php include("includes/forms/profil.php"); ?>

      <?php include("includes/forms/admin.php"); ?>

      <?php include("includes/forms/cekimtalebi.php"); ?>

      <!--begin::Javascript-->
      <script>
         var hostUrl = "assets/";        
      </script>


<script>
  function oneDot(input) {
    var value = input.value,
        value = value.split('.').join('');

    if (value.length > 3) {
      value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
    }

    input.value = value;
  }

   function sadeceSayi(event) {
       var charCode = event.which || event.keyCode;
       
       // 0-9 arasındaki sayıları kontrol et
       if (charCode < 48 || charCode > 57) {
           event.preventDefault();
       }
   }

   $(".sayisalinput").keyup(function (){
      if (this.value.match(/[^0-9.]/g)){
          this.value = this.value.replace(/[^0-9.]/g,'');
      }
   });
</script>

<script>
<?php
function replace_tr($text) {
    $text = trim($text);
    $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
    $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-');
    $new_text = str_replace($search, $replace, $text);
    return $new_text;
}
?>
function kopyalaMetni(id) {
    var metinAlani = document.querySelector('#metinAlani_' + id);
    var metin = metinAlani.getAttribute('value');

    // Yeni yöntem: Clipboard API kullanarak kopyalama
    navigator.clipboard.writeText(metin).then(function() {
        // Kopyalama sonrası bildirim
        Swal.fire({
            html: 'Kopyalandı<br><br><strong>' + metin + '</strong>',
            icon: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Tamam',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
        });
    }).catch(function(err) {
        console.error('Kopyalama işlemi başarısız:', err);
    });
}

function kopyalaMetni2(id) {
    var metinAlani = document.querySelector('#metinAlani2_' + id);
    var metin = metinAlani.getAttribute('value');

    // Yeni yöntem: Clipboard API kullanarak kopyalama
    navigator.clipboard.writeText(metin).then(function() {
        // Kopyalama sonrası bildirim
        var copybasariliDiv = document.getElementById('copybasarili');
        copybasariliDiv.innerHTML = '<strong>Kopyalama Başarılı</strong><br>Onay yaptıktan sonra sayfayı yenileyiniz.';
        copybasariliDiv.style.display = 'block';
    }).catch(function(err) {
        console.error('Kopyalama işlemi başarısız:', err);
    });

    // Eski SweetAlert kapatma işlemi buradan kaldırıldı
}

</script>

<script>
    $(document).ready(function () {
        $('.delete-button').click(function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            var action = $(this).data('action');
            var row = $(this).closest('tr');

            // SweetAlert ile onaylama penceresi göster
            Swal.fire({
              text: "Bu veriyi silmek istediğinize emin misiniz?",
              icon: "warning",
              buttonsStyling: !1,
              showCancelButton: true,
              confirmButtonText: "Evet, sil",
              cancelButtonText: "İptal",
              customClass: {
                  confirmButton: "btn btn-primary",
                  cancelButton: "btn btn-danger"
                  }
               }).then((result) => {
                // Kullanıcı evet derse silme işlemi gerçekleştir
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'includes/deletes.php',
                        data: { action: action, id: id },
                        success: function (response) {
                            // İşlem başarılıysa, ilgili ilanı arayüzden kaldırın
                            // ve liste güncellemesi yapabilirsiniz
                            row.remove(); // Satırı kaldır

                            // Ayrıca, liste güncellemesi yapabilirsiniz
                            // Örneğin: window.location.reload();
                        },
                        error: function (error) {
                            console.error('Silme işlemi sırasında bir hata oluştu:', error);
                        }
                    });
                }
            });
        });
    });
</script>
      <!--begin::Global Javascript Bundle(mandatory for all pages)-->
      <script src="assets/js/iller.js"></script>
      <script src="assets/js/plugins.bundle.js"></script>
      <script src="assets/js/scripts.bundle.js"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Vendors Javascript(used for this page only)-->
      <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
      <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
      <!--end::Custom Javascript-->
      <!--end::Javascript-->
   </body>
   <!--end::Body-->
</html>