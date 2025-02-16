<?php 
   	$query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id' AND (k_rol = 'admin' OR k_rol = 'mod')");
					               	$query->execute();
					               	if ( $query->rowCount() ){
?>
<div class="modal fade" id="adminmodal" tabindex="-1" aria-hidden="true">
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
        <div class="mb-13 text-center">
          <!--begin::Title-->
          <!--begin::Underline-->
          <span class="d-inline-block position-relative ms-2">
            <!--begin::Label-->
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Bella Admin </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
            <!--end::Line-->
          </span>
          <!--end::Underline-->
          <!--end::Description-->
        </div>
        <div class="pt-2">
          <!--begin::Tabs-->
          <div class="d-flex align-items-center pb-6">
            <!--begin::Nav pills-->
            <ul class="nav nav-pills nav-line-pills border rounded p-1" style="margin:auto; margin-top: -30px; padding-left:50px" role="tablist">
              <li class="nav-item me-2" role="presentation">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_updatepanel" href="#kt_tab_updatepanel" aria-selected="true" role="tab"> Panel </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_userlist" href="#kt_tab_userlist" aria-selected="false" tabindex="-1" role="tab"> Kullanıcılar </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_reflist" href="#kt_tab_reflist" aria-selected="false" tabindex="-2" role="tab"> Referans </a>
              </li>
            </ul>
            <!--end::Nav pills-->
          </div>
          <!--end::Tabs-->
          <!--begin::Tab content-->
          <div class="tab-content px-3">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_tab_updatepanel" role="tabpanel" aria-labelledby="kt_updatepanel">
            <form id="kt_admin_form">
<?php
$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
?>
        <div class="accordion" id="accordionIBAN">
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingIBAN">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseIBAN" aria-expanded="false" aria-controls="collapseIBAN">
                        <label class="d-flex align-items-center fs-6 fw-semibold">
                            <span>IBAN Güncelle</span>
                        </label>
                    </button>
                </h4>
                <div id="collapseIBAN" class="accordion-collapse collapse" aria-labelledby="headingIBAN"
                     data-bs-parent="#accordionIBAN">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>Ad Soyad</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="ibanad" value="<?php echo $sonuc['ibanad']; ?>" autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>IBAN</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="iban" value="<?php echo $sonuc['iban']; ?>" autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>Banka</span>
                                    </label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                            data-hide-search="true" name="banka">
                                        <?php
                                        if ($sonuc['banka']) {
                                            $banka = $sonuc['banka'];
                                            echo "<option value='$banka' selected>$banka</option>";
                                        } else {
                                            echo '<option value="" disabled selected>Seçim Yapınız</option>';
                                        }
                                        ?>
                                        <option disabled class="text-danger">～～～～～</option>
                                        <option value="Akbank">Akbank</option>
                                        <option value="Ziraat Bankası">Ziraat Bankası</option>
                                        <option value="QNB Finansbank">QNB Finansbank</option>
                                        <option value="Garanti BBVA">Garanti BBVA</option>
                                        <option value="Türk Ekonomi Bankası (TEB)">Türk Ekonomi Bankası (TEB)</option>
                                        <option value="Türkiye İş Bankası">Türkiye İş Bankası</option>
                                        <option value="Yapı ve Kredi Bankası">Yapı ve Kredi Bankası</option>
                                        <option value="DenizBank A.Ş.">DenizBank A.Ş.</option>
                                        <option value="Fibabanka">Fibabanka</option>
                                        <option value="Kuveyt Türk">Kuveyt Türk</option>
                                        <option value="Halkbank">Halkbank</option>
                                        <option value="VakıfBank">VakıfBank</option>
                                        <option value="ING">ING</option>
                                        <option value="Aktifbank">Aktifbank</option>
                                        <option value="Şekerbank">Şekerbank</option>
                                        <option value="Burganbank">Burganbank</option>
                                        <option value="Albaraka Türk Katılım Bankası">Albaraka</option>
										<option value="Türkiye Finans Bankası">Türkiye Finans Bankası</option>
                                    </select>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion mt-5" id="accordionDomain">
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingDomain">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseDomain" aria-expanded="false" aria-controls="collapseDomain">
                        <label class="d-flex align-items-center fs-6 fw-semibold">
                            <span>Domain Güncelle</span>
                        </label>
                    </button>
                </h4>
                <div id="collapseDomain" class="accordion-collapse collapse" aria-labelledby="headingDomain"
                     data-bs-parent="#accordionDomain">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>Toplu Domain Değiştir</span>
                                    </label>
                                    <div class="input-group">
                                    <input class="form-control form-control-solid" type="text" placeholder="" id="input1" autocomplete="off">
                                    <button type="button" style="border-radius:0px 0.8rem 0.8rem 0px" class="btn btn-primary btn-sm" onclick="degeriDegistir()">Değiştir</button>
                                    </div>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Panel Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_panel" value="<?php echo $_SERVER['HTTP_HOST']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Sahibinden Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_sahibinden" id="input2" value="<?php echo $sonuc['dom_sahibinden']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Dolap Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_dolap" id="input3" value="<?php echo $sonuc['dom_dolap']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Letgo Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_letgo" id="input4" value="<?php echo $sonuc['dom_letgo']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">PttAVM Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_pttavm" id="input5" value="<?php echo $sonuc['dom_pttavm']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Turkcell Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_turkcell" id="input6" value="<?php echo $sonuc['dom_turkcell']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Shopier Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_shopier" id="input7" value="<?php echo $sonuc['dom_shopier']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Yurtiçi Domain</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dom_yurtici" id="input8" value="<?php echo $sonuc['dom_yurtici']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- Diğer form elemanları burada devam eder -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
			$query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id' AND k_rol = 'admin'");
			$query->execute();
			if ( $query->rowCount() ){
		?>
        <div class="accordion mt-5" id="accordionBot">
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingBot">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseBot" aria-expanded="false" aria-controls="collapseBot">
                        <label class="d-flex align-items-center fs-6 fw-semibold">
                            <span>Bot Güncelle</span>
                        </label>
                    </button>
                </h4>
                <div id="collapseBot" class="accordion-collapse collapse" aria-labelledby="headingBot"
                     data-bs-parent="#accordionBot">
                    <div class="accordion-body">
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Admin Bot Token</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="adminbot_token" value="<?php echo $sonuc['adminbot_token']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Admin Bot ChatID</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="adminbot_chatid" value="<?php echo $sonuc['adminbot_chatid']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Çekim Bot Token</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="cekimbot_token" value="<?php echo $sonuc['cekimbot_token']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Çekim Bot ChatID</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="cekimbot_chatid" value="<?php echo $sonuc['cekimbot_chatid']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Dekont Bot Token</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dekontbot_token" value="<?php echo $sonuc['dekontbot_token']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Dekont Bot ChatID</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="dekontbot_chatid" value="<?php echo $sonuc['dekontbot_chatid']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vergi Bot Token</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="vergibot_token" value="<?php echo $sonuc['vergibot_token']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Vergi Bot ChatID</span>
                                    </label>
                                    <input class="form-control form-control-solid" type="text" placeholder=""
                                           name="vergibot_chatid" value="<?php echo $sonuc['vergibot_chatid']; ?>"
                                           autocomplete="off">
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php	
			}
		?> 
<?php
    }
}
?>
        <div class="text-center mt-5">
					 	<input type="hidden" name="panelduzenle" value="<?php echo $id_sfrli; ?>">
                        <button type="submit" id="kt_admin_submit" class="btn btn-primary">
                        <span class="indicator-label">
                        Güncelle
                        </span>
                        <span class="indicator-progress">
                        Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                </form>
            </div>
            <!--end::Tab pane-->
            <div class="tab-pane fade" id="kt_tab_userlist" role="tabpanel" aria-labelledby="kt_userlist">

            <div class="card-body py-3" bis_skin_checked="1">
    <!--begin::Table container-->
    <div class="table-responsive" style="max-height:270px">
        <!--begin::Table-->
        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
            <!--begin::Table head-->
            <thead>
                <tr class="border-bottom-0">
                    <th class="p-0 w-50px"></th>
                    <!-- Diğer başlık sütunları buraya eklenebilir -->
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
                <?php
                $query = $db->prepare("SELECT * FROM kullanicilar WHERE id != '1'");
                $query->execute();
                if ($query->rowCount()) {
                    foreach ($query as $sonuc) {
                ?>
                        <tr>
                            <td>
                                <div class="symbol symbol-40px" bis_skin_checked="1">
                                    <span class="symbol-label bg-light-info">
                                        <?php if (!empty($sonuc['userimage'])) : ?>
                                            <img src="images/<?php echo $sonuc['userimage']; ?>" style="width:40px; height:40px; border-radius:0.85rem; object-fit: cover;">
                                        <?php else : ?>
                                            <img src="assets/media/user.png" style="width:40px; height:40px; border-radius:0.85rem; object-fit: cover;">
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </td>
                            <td class="ps-0">
                                <a href="javascript:void(0);" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"> <?php echo $sonuc["kullaniciadi"]; ?> </a>
                                <span class="text-muted fw-semibold d-block fs-7"> Bakiye: ₺<?php echo $sonuc["bakiye"]; ?> </span>
                            </td>
                            <td class="text-end">
                                <?php
                                $query = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = '$kul_id' AND k_rol = 'admin'");
                                $query->execute();
                                if ($query->rowCount()) {
                                ?>
                                    <div class="me-0 btn-group">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-edit" data-id="<?php echo $sonuc['id']; ?>" id="editUser" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-solid ki-gear fs-2x"></i>
                                        </a>
                                        <span style="margin-right: 5px;"></span>
                                        <a href="#" data-id="<?php echo $sonuc['id']; ?>" data-action="deluser" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                                            <i class="fa fa-trash fs-2x"></i>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>


            </div>

            <div class="tab-pane fade" id="kt_tab_reflist" role="tabpanel" aria-labelledby="kt_reflist">
            
            <form id="kt_admin_form2">
            <div class="row">
            <div class="col-lg-12">
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Referans Kodu</span>
                                    </label>

                                    <div class="input-group">
                                    <input class="form-control form-control-solid randomref" type="text" placeholder=""
                                           name="ref_id"
                                           autocomplete="off" readonly>
                                    <button type="button" style="border-radius:0px 0.8rem 0.8rem 0px" class="btn btn-primary btn-sm generateref">Üret</button>
                                    <script>
                                        function generateRandomCode(length) {
                                            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                            let result = '';
                                        
                                            for (let i = 0; i < length; i++) {
                                                const randomIndex = Math.floor(Math.random() * characters.length);
                                                result += characters.charAt(randomIndex);
                                            }
                                        
                                            return result;
                                        }
                                    
                                        document.querySelector('.generateref').addEventListener('click', () => {
                                            const randomCode = generateRandomCode(8);
                                            document.querySelector('.randomref').value = randomCode;
                                            document.querySelector('.randomref').setAttribute('value', randomCode);
                                        });
                                    </script>
                                    </div>
                                           
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                <div class="text-center">
                  <input type="hidden" name="refekle" value="refekle">
                  <button type="submit" id="kt_admin_submit2" name="refekle" class="btn btn-primary">
                    <span class="indicator-label"> Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
            </form>

            <div class="table-responsive" style="max-height:150px">
        <!--begin::Table-->
        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
            <!--begin::Table head-->
            <thead>
                <tr class="border-bottom-0">
                    <th class="p-0 w-50px"></th>
                    <!-- Diğer başlık sütunları buraya eklenebilir -->
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
                <?php
                $query = $db->prepare("SELECT * FROM refkodlari ORDER BY id DESC;");
                $query->execute();
                if ($query->rowCount()) {
                    foreach ($query as $sonuc) {
                ?>
                        <tr>
                            <td class="ps-0">
                                <a href="javascript:void(0);" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"> <?php echo $sonuc["ref_code"]; ?> </a>
                            </td>
                            <td class="text-end">
                                    <div class="me-0 btn-group">

                                        <input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo ($sonuc["ref_code"]); ?>">
                                        <button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa fa-copy fs-2x"></i>
                                        </button>

                                        <span style="margin-right: 5px;"></span>
                                        <a href="#" data-id="<?php echo $sonuc['id']; ?>" data-action="delref" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                                            <i class="fa fa-trash fs-2x"></i>
                                        </a>
                                    </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>

            </div>

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

<div class="modal fade" tabindex="-1" id="modal-user-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashuser"></div>
        </div>
    </div>
</div>

<script>
    function degeriDegistir() {
        // İlk input değerini al
        var input1Value = document.getElementById("input1").value;

        // Diğer inputların mevcut değerlerini al ve kontrol et
        var inputs = ["input2", "input3", "input4", "input5", "input6", "input7", "input8"];
        for (var i = 0; i < inputs.length; i++) {
            var inputId = inputs[i];
            var inputValue = document.getElementById(inputId).value;

            // Eğer "." işareti varsa, "." işaretinden sonrasını değiştir
            if (inputValue.includes(".")) {
                var index = inputValue.indexOf(".");
                inputValue = inputValue.substring(0, index + 1) + input1Value;
            } else {
                inputValue = input1Value;
            }

            // Inputu güncelle
            document.getElementById(inputId).value = inputValue;
        }
    }
</script>

<script>
  var e9, r9;
    document.addEventListener('DOMContentLoaded', function () {
        e9 = document.querySelector("#kt_admin_form"),
        r9 = FormValidation.formValidation(e9, {
            fields: {
                "dom_panel": {
                    validators: {
                        notEmpty: {
                            message: "Panel domaini boş olamaz"
                        }
                    }
                },
                "dom_sahibinden": {
                    validators: {
                        notEmpty: {
                            message: "Sahibinden domaini boş olamaz"
                        }
                    }
                },
                "dom_dolap": {
                    validators: {
                        notEmpty: {
                            message: "Dolap domaini boş olamaz"
                        }
                    }
                },
                "dom_letgo": {
                    validators: {
                        notEmpty: {
                            message: "Letgo domaini boş olamaz"
                        }
                    }
                },
                "dom_pttavm": {
                    validators: {
                        notEmpty: {
                            message: "PttAVM domaini boş olamaz"
                        }
                    }
                },
                "dom_turkcell": {
                    validators: {
                        notEmpty: {
                            message: "Turkcell domaini boş olamaz"
                        }
                    }
                },
                "dom_shopier": {
                    validators: {
                        notEmpty: {
                            message: "Shopier domaini boş olamaz"
                        }
                    }
                },
                "dom_yurtici": {
                    validators: {
                        notEmpty: {
                            message: "Yurtiçi domaini boş olamaz"
                        }
                    }
                },
                "adminbot_token": {
                    validators: {
                        notEmpty: {
                            message: "Admin token boş olamaz"
                        }
                    }
                },
                "adminbot_chatid": {
                    validators: {
                        notEmpty: {
                            message: "Admin chat id boş olamaz"
                        }
                    }
                },
                "cekimbot_token": {
                    validators: {
                        notEmpty: {
                            message: "Çekim token boş olamaz"
                        }
                    }
                },
                "cekimbot_chatid": {
                    validators: {
                        notEmpty: {
                            message: "Çekim chat id boş olamaz"
                        }
                    }
                },
                "dekontbot_token": {
                    validators: {
                        notEmpty: {
                            message: "Dekont token boş olamaz"
                        }
                    }
                },
                "dekontbot_chatid": {
                    validators: {
                        notEmpty: {
                            message: "Dekont chat id boş olamaz"
                        }
                    }
                },
                "vergibot_token": {
                    validators: {
                        notEmpty: {
                            message: "Vergi token boş olamaz"
                        }
                    }
                },
                "vergibot_chatid": {
                    validators: {
                        notEmpty: {
                            message: "Vergi chat id boş olamaz"
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

        document.querySelector("#kt_admin_submit").addEventListener("click", function (i9) {
            i9.preventDefault();
            r9.validate().then(function (r9) {
                if ("Valid" == r9) {
                    document.querySelector("#kt_admin_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_admin_submit").disabled = !0;
                    var formData = new FormData(e9);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Panel güncellendi!",
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
                        } else if (data.sonuc === 'resim_limiti') {
                            Swal.fire({
                                text: "Resim limitine ulaştınız! (Max: 5 fotoğraf)",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'resim_secilmedi') {
                            Swal.fire({
                                text: "Lütfen resim seçiniz!",
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
                        document.querySelector("#kt_admin_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_admin_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
  var e10, r10;
    document.addEventListener('DOMContentLoaded', function () {
        e10 = document.querySelector("#kt_admin_form2"),
        r10 = FormValidation.formValidation(e10, {
            fields: {
                "ref_id": {
                    validators: {
                        notEmpty: {
                            message: "Referans kodu boş olamaz"
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

        document.querySelector("#kt_admin_submit2").addEventListener("click", function (i10) {
            i10.preventDefault();
            r10.validate().then(function (r10) {
                if ("Valid" == r10) {
                    document.querySelector("#kt_admin_submit2").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_admin_submit2").disabled = !0;
                    var formData = new FormData(e10);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Referans kodu oluşturuldu!",
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
                        } else if (data.sonuc === 'resim_limiti') {
                            Swal.fire({
                                text: "Resim limitine ulaştınız! (Max: 5 fotoğraf)",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'resim_secilmedi') {
                            Swal.fire({
                                text: "Lütfen resim seçiniz!",
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
                        document.querySelector("#kt_admin_submit2").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_admin_submit2").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editUser', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashuser').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/edituser.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashuser').html('');    
      $('#dashuser').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashuser').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>
<?php  } ?>