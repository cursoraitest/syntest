<?php include("database/connect.php");
		
	if(isset($_COOKIE['2tUgyO@H9E!4CuQ'])){
		header("location:signin");
	}
?>

<!DOCTYPE html>
<!-- saved from url=(0080)https://preview.keenthemes.com/blaze-html-pro/authentication/sign-up/basic.html# -->
<html lang="en" data-bs-theme="dark">
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
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="assets/media/favicon.png"/>
      <!--begin::Fonts(mandatory for all pages)-->
      <!--end::Fonts-->
      <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
      <link href="assets/css/plugins.bundle.css" rel="stylesheet" type="text/css">
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <!--end::Global Stylesheets Bundle-->
      <!--begin::Google tag-->
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'UA-37564768-1');
      </script>
      <style type="text/css" id="operaUserStyle"></style>
      <script src="assets/js/jquery.flurry.js"></script>
      <script src="assets/js/jquery.snowfall.js"></script>
   </head>
   <style>
    .headertelmode {
        width: 350px; 
        border-radius: 15px; 
        margin:auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.23);
    }

    @media only screen and (max-width: 600px) {
      .headertelmode {
            width: 150px; 
            border-radius: 15px; 
            margin:auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.23);
        }
    }
    </style>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_body" class="app-blank" bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJkaXNhYmxlZCIsIkZBQ0VCT09LIjoiZGlzYWJsZWQiLCJUV0lUVEVSIjoiZGlzYWJsZWQiLCJSRURESVQiOiJkaXNhYmxlZCIsIlBJTlRFUkVTVCI6ImRpc2FibGVkIiwiSU5TVEFHUkFNIjoiZGlzYWJsZWQiLCJDT05GSUciOiJkaXNhYmxlZCJ9LCJ2ZXJzaW9uIjoiMi4wLjEwIiwic2NvcmUiOjIwMDEwfV0=">
      <!--begin::Theme mode setup on page load-->
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
      <!--begin::Root-->
      <div class="d-flex flex-column flex-root" id="kt_app_root">
         <!--begin::Authentication - Sign-up -->
         <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div
          class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-repeat:no-repeat; background-image: url('assets/media/image.png');"
        >
          <!--begin::Wrapper-->
          <div
            class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y"
          >
            <!--begin::Header-->
            <div
              class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20"
            >
              <!--begin::Logo-->
              <img src="assets/media/standard.gif" class="headertelmode">
              <!--end::Logo-->
            </div>
            <!--end::Header-->
          </div>
          <!--end::Wrapper-->
        </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
               <!--begin::Content-->
               <div class="d-flex flex-center flex-column flex-column-fluid">
                  <!--begin::Wrapper-->
                  <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                     <!--begin::Form-->
                     <form id="kt_sign_up_form">        
                        <div class="mb-10 text-center">
                           <!--begin::Title-->
                           <h1 class="text-gray-900 mb-3">
                              BELLA CIAO KAYIT
                           </h1>
                           <!--end::Title-->      
                           <!--begin::Link-->
                           <div class="text-gray-500 fw-semibold fs-4">
                              Zaten hesabın var mı?
                              <a href="signin" class="link-primary fw-bold">
                              Giriş Yap
                              </a>
                           </div>
                           <!--end::Link-->
                        </div>
        
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                           <label class="form-label fw-bold text-gray-900 fs-6">Kullanıcı Adı</label>
                           <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="kul_id" autocomplete="off">
                           <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                           <!--begin::Wrapper-->
                           <div class="mb-1">
                              <!--begin::Label-->
                              <label class="form-label fw-bold text-gray-900 fs-6">
                              Şifre
                              </label> 
                              <!--end::Label-->
                              <!--begin::Input wrapper-->
                              <div class="position-relative mb-3">    
                              <div class="input-group">
                                 <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="kul_sifre" id="sifre" autocomplete="off">
                                 <button type="button" id="showPassword" class="btn btn-sm btn-secondary" style="border-radius: 0rem 1.5rem 1.5rem 0rem;">
                                <i class="fa fa-eye" style="padding-right: 0rem;"></i>
                            </button>
                            </div>
                                 <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                 <i class="ki-duotone ki-eye-slash fs-2"></i>                    <i class="ki-duotone ki-eye fs-2 d-none"></i>                </span>
                              </div>
                              <!--end::Input wrapper-->
                              <!--begin::Meter-->
                              <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                              </div>
                              <!--end::Meter-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Hint-->
                           <div class="text-muted">
                              Büyük harf, rakam, sembol ve sayı karışımından oluşan en az 6 haneli şifre belirleyiniz.
                           </div>
                           <!--end::Hint-->
                           <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <!--end::Input group--->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5 fv-plugins-icon-container">
                           <label class="form-label fw-bold text-gray-900 fs-6">Şifreni Doğrula</label>
                           <div class="input-group">
                           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" id="sifre2" autocomplete="off">
                           <button type="button" id="showPassword2" class="btn btn-sm btn-secondary" style="border-radius: 0rem 1.5rem 1.5rem 0rem;">
                                <i class="fa fa-eye" style="padding-right: 0rem;"></i>
                            </button>
                        </div>
                           <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                           <label class="form-label fw-bold text-gray-900 fs-6">Referans Kodu</label>
                           <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="ref_kod" autocomplete="off">
                           <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                           <input type="hidden" name="kayitol" value="kayitol">
                           <button type="button" id="kt_sign_up_submit" name="kayitol" class="btn btn-lg btn-primary w-100">
                           <span class="indicator-label">
                           Kayıt Ol
                           </span>
                           <span class="indicator-progress">
                           Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                           </span>    
                           </button>
                        </div>
                        <!--end::Actions-->
                     </form>
                     <!--end::Form-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Footer-->
            </div>
            <!--end::Body-->
         </div>
         <!--end::Authentication - Sign-up-->
      </div>
      <!--end::Root-->
      <!--begin::Javascript-->

      <script>
    var passwordInput = document.getElementById("sifre");
    var showPasswordButton = document.getElementById("showPassword");

    showPasswordButton.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });

    var passwordInput2 = document.getElementById("sifre2");
    var showPasswordButton2 = document.getElementById("showPassword2");

    showPasswordButton2.addEventListener("click", function () {
        if (passwordInput2.type === "password") {
            passwordInput2.type = "text";
        } else {
            passwordInput2.type = "password";
        }
    });
</script>

      <script>
    var e, r;
    document.addEventListener('DOMContentLoaded', function () {
        e = document.querySelector("#kt_sign_up_form"),
        r = FormValidation.formValidation(e, {
            fields: {
                "kul_id": {
                    validators: {
                        notEmpty: {
                            message: "Kullanıcı adı boş olamaz"
                        }
                    }
                },
                "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "Şifre doğrulaması boş olamaz"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="kul_sifre"]').value
                                },
                                message: "Şifreler eşleşmiyor"
                            }
                        }
                    },
                    "ref_kod": {
                     validators: {
                        notEmpty: {
                            message: "Referans kodu boş olamaz"
                        }
                    }
                },
                kul_sifre: {
                    validators: {
                        notEmpty: {
                            message: "Şifre boş olamaz"
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger,
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: ""
                })
            }
        });
        
        document.querySelector("#kt_sign_up_submit").addEventListener("click", function (i) {
            i.preventDefault();
            r.validate().then(function (r) {
                if ("Valid" == r) {
                    document.querySelector("#kt_sign_up_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_sign_up_submit").disabled = !0;
                    var formData = new FormData(e);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Kayıt başarılı!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Tamam",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                timer: 2000, // Otomatik kapatma süresi (ms)
                                showConfirmButton: false // "Tamam" butonunu gizle
                            }).then(function () {
                                window.location.href = 'signin';
                            });
                        } else if (data.sonuc === 'yanlis') {
                            Swal.fire({
                                text: "Kullanıcı adı veya şifre yanlış!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                           } else if (data.sonuc === 'refhata') {
                            Swal.fire({
                                text: "Referans kodunuz yanlış!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                           } else if (data.sonuc === 'var') {
                            Swal.fire({
                                text: "Böyle bir kullanıcı var!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'bos') {
                            Swal.fire({
                                text: "Kullanıcı adı veya şifre boş olamaz!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            text: "Sorry, an error occurred. Please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    })
                    .finally(() => {
                        document.querySelector("#kt_sign_up_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_sign_up_submit").disabled = !1;
                    });
                }
            })
        });
    });
</script>

      <script>
         var hostUrl = "/blaze-html-pro/assets/";        
      </script>
      <!--begin::Global Javascript Bundle(mandatory for all pages)-->
      <script src="assets/js/plugins.bundle.js"></script>
      <script src="assets/js/scripts.bundle.js"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Custom Javascript(used for this page only)-->
      <!--end::Custom Javascript-->
      <!--end::Javascript-->
      <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
         <defs id="SvgjsDefs1002"></defs>
         <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
         <path id="SvgjsPath1004" d="M0 0 "></path>
      </svg>
   </body>
   <!--end::Body-->
</html>