<div class="modal fade" id="cekimmodal" tabindex="-1" aria-hidden="true">
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <!--begin::Modal content-->
    <div class="modal-content rounded">
      <!--begin::Modal header-->
      <div class="modal-header pb-0 border-0 justify-content-end">
        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
        </div>
        <!--end::Close-->
      </div>
      <!--begin::Modal header-->
      <!--begin::Modal body-->
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="text-center">
          <!--begin::Title-->
          <!--begin::Underline-->
          <span class="d-inline-block position-relative ms-2">
            <!--begin::Label-->
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Çekim Talebi </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-primary translate rounded"></span>
            <!--end::Line-->
          </span>
          <br>
          <!--end::Underline-->
          <!--end::Description-->
          <?php
                         $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kul_id");
                         $query->execute(array(":kul_id" => $kul_id));

                         if ($query->rowCount()) {
                             foreach ($query as $sonuc) {
                     ?>
                           <!--begin::Stat-->
                           <div class="button button-custom rounded min-w-100px w-100s mt-3">
                              <!--begin::Date-->                                     
                              <span class="fs-6 fw-bold text-success">Mevcut Bakiyeniz</span>                                
                              <!--end::Date-->
                              <!--begin::Label-->
                              <div class="fs-2 fw-bold text-success"><?php echo $sonuc['bakiye']; ?> ₺</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->       
                  
                        <!--end::Stats-->
                        <?php
                             }
                         }
                     ?>
        </div>
        <div class="pt-2">
          <!--begin::Tabs-->
          <div class="tab-content px-3">
            <div class="card-body py-3" bis_skin_checked="1">
                <form id="kt_cekim_form">
                <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-danger">Dikkat</h4>
                        <span>Lütfen çekim talebi vermeden önce trx adresinizi son kez kontrol ediniz. Yanlış adrese gönderilen ödemelerde Bella Ciao ekibi sorumlu değildir.</span>
                    </div>
                </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Random işlem ID oluştur
        var islemidInput = document.getElementById('islemid');
        islemidInput.value = generateRandomCode(8);

        function generateRandomCode(length) {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var randomCode = '';
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                randomCode += characters.charAt(randomIndex);
            }
            return randomCode;
        }
    });
</script>
                <input type="hidden" name="islemid" id="islemid" value="">
                <?php
                    $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kul_id");
                    $query->execute(array(":kul_id" => $kul_id));

                    if ($query->rowCount()) {
                        foreach ($query as $sonuc) {
                            $trxAdresi = $sonuc['trxadresi'];
                ?>
                <input hidden type="text" placeholder="" name="tgadresi" value="<?php echo $sonuc['tgadresi']; ?>" autocomplete="off">
                <input hidden type="text" placeholder="" name="ekleyen" value="<?php echo $sonuc['kullaniciadi']; ?>" autocomplete="off">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">TRX Adresi</span>&nbsp;
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                      <input id="hedefInput" class="form-control form-control-solid" type="text" placeholder="" name="trxadresi" autocomplete="off">
                        <?php if (empty($trxAdresi)) { ?>
                        <a type="button" data-id="<?php echo $sonuc['id']; ?>" id="editProfil" data-bs-toggle="modal" data-bs-target="#modal-profil-edit" class="input-group-text text-success fw-bold" style="border: none;">TRX Tanımla</a>
                        <?php } else { ?>
                            <input type="hidden" id="gizliInput" value="<?php echo $sonuc['trxadresi']; ?>">
                            <a type="button" class="input-group-text text-success fw-bold" style="border: none;" onclick="yapistir()">Kayıtlı TRX Yapıştır</a>
                            <?php
                            }
                        ?>
                      </div>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Çekim Miktarı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                      <input id="hedefInput2" class="form-control form-control-solid sayisalinput" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="miktar" autocomplete="off">
                      <input type="hidden" id="gizliInput2" name="bakiye" value="<?php echo $sonuc['bakiye']; ?>">
                      <a type="button" class="input-group-text text-success fw-bold" style="border: none;" onclick="yapistir2()">Tüm Bakiye</a>
                      </div>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <?php 
                    } 
                 }
                ?>

                <div class="text-center">
                  <input type="hidden" name="cekimtalebi" value="cekimtalebi">
                  <button type="submit" id="kt_cekim_submit" name="cekimtalebi" class="btn btn-primary">
                    <span class="indicator-label"> Çekim Talebi Ver </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
            </div>
            <!--end::Tab pane-->
          </div>
          <!--end::Tab content-->
        </div>
        <!--end:Form-->
      </div>
      <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
  </div>
  <!--end::Modal dialog-->
</div>

<script>
  var e11, r11;
    document.addEventListener('DOMContentLoaded', function () {
        e11 = document.querySelector("#kt_cekim_form"),
        r11 = FormValidation.formValidation(e11, {
            fields: {
                "trxadresi": {
                    validators: {
                        notEmpty: {
                            message: "TRX adresi boş olamaz"
                        }
                    }
                },
                "miktar": {
                    validators: {
                        notEmpty: {
                            message: "Miktar boş olamaz"
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

        document.querySelector("#kt_cekim_submit").addEventListener("click", function (i11) {
            i11.preventDefault();
            r11.validate().then(function (r11) {
                if ("Valid" == r11) {
                    document.querySelector("#kt_cekim_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_cekim_submit").disabled = !0;
                    var formData = new FormData(e11);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Çekim talebi verildi!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Tamam",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                timer: 2000, // Otomatik kapatma süresi (ms)
                                showConfirmButton: false // "Tamam" butonunu gizle
                            }).then(function () {
                                window.location.href = 'dashboard';
                            });
                        } else if (data.sonuc === 'yanlis') {
                            Swal.fire({
                                text: "Bir yerde yanlışlık var!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                           } else if (data.sonuc === 'bakiye_yetersiz') {
                            Swal.fire({
                                text: "Bakiyeniz yeterli değil!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                          } else if (data.sonuc === 'miktar_dusuk') {
                            Swal.fire({
                                text: "En az 500 ₺ çekebilirsiniz!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'bos') {
                            Swal.fire({
                                text: "Lütfen seçilmeyen alanları seçiniz!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    })
                    .finally(() => {
                        document.querySelector("#kt_cekim_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_cekim_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
        function yapistir() {
            // Gizli input alanındaki değeri al
            var gizliInputDegeri = document.getElementById("gizliInput").value;

            // Hedef input alanına değeri yapıştır
            document.getElementById("hedefInput").value = gizliInputDegeri;
        }

        function yapistir2() {
            // Gizli input alanındaki değeri al
            var gizliInputDegeri = document.getElementById("gizliInput2").value;

            // Hedef input alanına değeri yapıştır
            document.getElementById("hedefInput2").value = gizliInputDegeri;
        }
    </script>