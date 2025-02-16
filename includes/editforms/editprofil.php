<?php
		 
	require_once '../../database/connect.php';
	include '../../database/fonk.php';
    session_start();
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$id_sfrli = sifreleWadanz($id);
        $id_sfrsz = sifrecozWadanz($id_sfrli);
		$name = $_SESSION['kul_id'];
		
		$query = "SELECT * FROM kullanicilar WHERE kullaniciadi = :kullaniciadi";
		$selectquery = $db->query("SELECT * FROM kullanicilar WHERE kullaniciadi = '{$name}'")->fetch(PDO::FETCH_ASSOC);
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':kullaniciadi'=>$name));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		
		?>
               <div class="modal-header pb-0 border-0 justify-content-end">
                  <!--begin::Close-->
                  <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                     <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                
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
    <span class="d-inline-block mb-2 fw-bold" style="font-size: 1.75rem">
        Profili Düzenle
    </span>
    <!--end::Label-->

    <!--begin::Line-->
    <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-primary translate rounded"></span>
    <!--end::Line-->
</span>

<style>
	.feedbacktelmode {
        text-align: left;
        margin-top: 14px;
    }
</style>
			<div class="modal-body">
			<form id="myFormProfil">
            <input hidden class="form-control form-control-solid" type="text" placeholder="" name="kullaniciadi" id="kullaniciadi" value="<?php echo $kullaniciadi; ?>" autocomplete="off">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span>TRX Tanımla</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                            </span>
                        </label>
                        <div class="input-group">
                        <input id="hedefInput" class="form-control form-control-solid" type="text" placeholder="" name="trxadresi" id="trxadresi" value="<?php echo $trxadresi; ?>" autocomplete="off">
                        <a type="button" class="input-group-text text-primary fw-bold" style="border: none;" onclick="yapistir()">Yapıştır</a>
                        </div>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="trxadresi-error"></div>
                    </div>
                </div>
                
                    <script>
                        function yapistir() {
                            // navigator.clipboard API'sini kullanarak panodaki içeriği al
                            navigator.clipboard.readText()
                                .then(clipboardData => {
                                    // Alınan içeriği hedef input alanına yapıştır
                                    document.getElementById("hedefInput").value = clipboardData;
                                })
                                .catch(err => {
                                    console.error('Panodan yapıştırma başarısız:', err);
                                });
                        }
                    </script>

                <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span>Telegram Adresi</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                            </span>
                        </label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="tgadresi" id="tgadresi" value="<?php echo $tgadresi; ?>" autocomplete="off" readonly>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="tgadresi-error"></div>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Profil Fotoğrafını Güncelle</span>
                  </label>
            </button>
        </h4>
        <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="text-center">

<div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('assets/media/user.png')" bis_skin_checked="1">
    <?php if(!empty($userimage)): ?>
    <div class="image-input-wrapper image-input-wrapper-1 w-90px h-90px" style="background-image: url(images/<?php echo $userimage; ?>)" bis_skin_checked="1"></div>
    <?php else: ?>
    <div class="image-input-wrapper image-input-wrapper-1 w-90px h-90px" style="background-image: url(assets/media/user.png)" bis_skin_checked="1"></div>                  
    <?php endif; ?> 

    <!--begin::Label-->
    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
        <!--begin::Inputs-->
        <input type="file" name="userimage" accept=".png, .jpg, .jpeg" onchange="updateImagePreview(this)">
        <input type="hidden" name="avatar_remove">
        <!--end::Inputs-->
    </label>
    <!--end::Label-->

    <!--begin::Cancel-->
    <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Cancel-->

    <!--begin::Remove-->
    <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-1" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage(this)" style="display: none;">
        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Remove-->
</div>

</div>
                </div>
            </div>
        </div>
    </div>
    </div>

                     <div class="text-center mt-5">
					 	<input type="hidden" name="profilduzenle" value="<?php echo $id_sfrli; ?>">
                        <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">
                        Profili Düzenle
                        </span>
                        <span class="indicator-progress">
                        Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                     <!--end::Actions-->
                  </form>              
                </div>
			</div>
				<?php				
					}
				?>
                                 <!--begin::Link-->

<script>
    var originalImageUrl;

function updateImagePreview(input) {
	originalImageUrl = $(".image-input-wrapper-1").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-1").css("background-image", "url(" + fileUrl + ")");

	// Yeni resim seçildiğinde silme butonunu göster
	$(".btn-remove-1").show();
}

function removeImage(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	
	// Geri alma işlemi
	$(".image-input-wrapper-1").css("background-image", originalImageUrl);

	// Resim dosyasını temizle
	fileInput.replaceWith(fileInput.val('').clone(true));

	// Silme butonunu gizle
	$(".btn-remove-1").hide();
}
</script>

<script>
    document.getElementById('myFormProfil').addEventListener('submit', function (event) {
        event.preventDefault(); // Formun normal submit işlemini engelle

        // Formu validate et
        var isValid = validateForm();

        if (isValid) {
            // ID'yi al
            var id = this.getAttribute('data-id'); // Form üzerinden ID'yi al

            // Form verilerini FormData nesnesiyle al
            var formData = new FormData(this);

            // ID'yi form verilerine ekle
            formData.append('id', id);

            // Fetch ile POST request gönder
            fetch('database/post.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Cevap işlemleri
                if (data.sonuc === 'tamam') {
                    // Başarılı işlem
                    Swal.fire({
                        text: 'Profil düzenlendi!',
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Tamam',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href = 'dashboard';
                    });
                } else if (data.sonuc === 'yanlis') {
                    // Hata işlemi
                    Swal.fire({
                        text: 'Bir yerde yanlışlık var!',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Anladım',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                } else if (data.sonuc === 'gecersiz_uzanti') {
                            Swal.fire({
                                text: "Geçersiz fotoğraf uzantısı! (jpg, jpeg, png) olmalıdır.",
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
                // Diğer durumlar için benzer şekilde işlemleri ekleyebilirsiniz
            })
            .catch(error => {
                // Hata durumu
                console.error('Error during POST request:', error);
                Swal.fire({
                    text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                    icon: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Anladım',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            });
        }
    });

    function validateForm() {
        // Gerekli validasyonları burada yapabilirsiniz
        var fieldsToValidate = [
            // Şifre alanı için validasyonu kaldırdık
        ];

        var isValid = true;

        fieldsToValidate.forEach(function (field) {
            var value = document.getElementById(field.id).value;
            var errorElement = document.getElementById(field.messageElementId);

            if (value.trim() === '') {
                // Hata mesajını göster
                errorElement.textContent = field.errorMessage;
                errorElement.style.display = 'block';
                isValid = false;
            } else {
                // Hata mesajını temizle
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        });

        return isValid; // Form geçerli ise true döndür
    }

    // Input alanına yazı yazıldığında ve değer boşsa uyarıyı göster
    function setInputValidation(inputId, errorElementId, errorMessage) {
        // Şifre alanı için validasyonu kaldırdık
    }

    // İlgili input alanları ve hata mesajları için setInputValidation fonksiyonunu çağır
    // Şifre alanı için validasyonu kaldırdık
</script>