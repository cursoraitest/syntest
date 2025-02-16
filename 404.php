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
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="shortcut icon" href="assets/media/favicon.png"/>
      <!--begin::Fonts(mandatory for all pages)-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
      <!--end::Fonts-->
      <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
      <link href="assets/css/plugins.bundle.css" rel="stylesheet" type="text/css"/>
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
      <!--end::Global Stylesheets Bundle-->
      <!--begin::Google tag-->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
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
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body  id="kt_body"  class="app-blank" >
      <!--begin::Theme mode setup on page load-->
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
      <!--begin::Root-->
      <style>
    .autovidtelmode {
        width: 200px; 
        margin-top: 25px; 
        margin-bottom: -100px; 
    }

    @media only screen and (max-width: 600px) {
      .autovidtelmode {
            width: 200px;
            margin-top: 25px;
            margin-bottom: -100px;
        }
    }
</style>
<div class="d-flex flex-center">
    <video controls autoplay class="lozad rounded mw-100 autovidtelmode">
  <source src="assets/media/ih.mp4" type="video/mp4">
</video>
</div>
      <div class="d-flex flex-column flex-root" id="kt_app_root">
         <!--begin::Authentication - 404 Page-->
         <div class="d-flex flex-column flex-center flex-column-fluid p-10">
            <!--begin::Illustration-->
            <img src="assets/media/404.png" alt="" class="mw-100 mb-10 h-lg-450px"/>    
            <!--end::Illustration-->
            <!--begin::Message-->
            <h1 class="fw-semibold mb-10" style="color: #A3A3C7">Nereye girdin mal :D</h1>
            <!--end::Message-->
            <!--begin::Link-->
            <a href="dashboard" class="btn btn-primary">Ana Sayfa</a>    
            <!--end::Link-->
         </div>
         <!--end::Authentication - 404 Page-->
      </div>
      <!--end::Root-->
      <!--begin::Javascript-->
      <script>
         var hostUrl = "/blaze-html-pro/assets/";        
      </script>
      <!--begin::Global Javascript Bundle(mandatory for all pages)-->
      <script src="assets/js/plugins.bundle.js"></script>
      <script src="assets/js/scripts.bundle.js"></script>
      <!--end::Global Javascript Bundle-->
      <!--end::Javascript-->
   </body>
   <!--end::Body-->
</html>