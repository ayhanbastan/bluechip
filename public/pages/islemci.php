<?php
require_once( "db.php" );
extract($_POST);

switch ($token) {
    case "musteriEkle":
        $query  = $db->prepare("INSERT INTO musteri SET
        ad = ?,
        uniqId = ?
        ");
        $insert = $query->execute(array (
            $musteriAd, $musteriNo
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "musteriGuncelle":
        $query  = $db->prepare("UPDATE musteri SET
        ad = :ad,uniqId = :uniqId
        WHERE id = :id");
        $update = $query->execute(array (
            "ad"     => $musteriAd,
            "uniqId" => $musteriNo,
            "id"     => $id
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "musteriCek":
        $query = $db->query("SELECT * FROM musteri WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;
    case "kullaniciEkle":
        $query  = $db->prepare("INSERT INTO kullanici SET
        adsoyad = ?,
        email = ?,
        telefon = ?,
        pozisyon = ?
        ");
        $insert = $query->execute(array (
            $adsoyad, $email, $telefon, $pozisyon
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "kontakEkle":
        $query  = $db->prepare("INSERT INTO kontak SET
        adsoyad = ?,
        email = ?,
        telefon = ?,
        pozisyon = ?,
        sirketId = ?
        ");
        $insert = $query->execute(array (
            $adsoyad, $email, $telefon, $pozisyon, $sirketId
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "referansEkle":
        $musteriId   = $_POST[ 'musteriId' ];
        $referansAd  = $_POST[ 'referansAd' ];
        $referansNo  = $_POST[ 'referansNo' ];

        $query  = $db->prepare("INSERT INTO referans SET
        musteriId = ?,
        referansAd = ?,
        referansNo = ?,
        ");
        $insert = $query->execute(array (
            $musteriId,
            $referansAd,
            $referansNo,
        ));
        if ($insert) {
            echo "referans";
        } else {
            echo 2;
        }
        break;
    case "cek":
        if ($table == "kontak") {
            $query = $db->query("SELECT * FROM kontak INNER JOIN musteri ON kontak.sirketId = musteri.id")->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $query = $db->query("SELECT * FROM {$table}")->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode($query);

        break;
    case "sil":
        $query  = $db->prepare("DELETE FROM {$table} WHERE id = :id");
        $delete = $query->execute(array (
            'id' => $id
        ));

        break;
    case "uyeGuncelle":
        $query  = $db->prepare("UPDATE uye SET
        adsoyad = :adsoyad,email = :email,sifre = :sifre,takimId = :takimId
        WHERE uyeId = :uyeId");
        $update = $query->execute(array (
            "adsoyad" => $adsoyad,
            "email"   => $email,
            "sifre"   => $sifre,
            "takimId" => $takimId
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "uyeSil":
        $query  = $db->prepare("DELETE FROM uye WHERE uyeId = :uyeId");
        $delete = $query->execute(array (
            'uyeId' => $uyeId
        ));
        if ($delete) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "takimEkle":
        $query  = $db->prepare("INSERT INTO takim SET
        takimAd = ?,
        logo = ?");
        $insert = $query->execute(array (
            $takimAd, $logo
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "takimGuncelle":
        $query  = $db->prepare("UPDATE takim SET
        takimAd = :takimAd,logo = :logo
        WHERE takimId = :takimId");
        $update = $query->execute(array (
            "takimAd" => $takimAd,
            "logo"    => $logo,
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "takimSil":
        $query  = $db->prepare("DELETE FROM takim WHERE takimId = :takimId");
        $delete = $query->execute(array (
            'takimId' => $takimId
        ));
        if ($delete) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "segmentEkle":
        $query  = $db->prepare("INSERT INTO takim SET
        segmentAd = ?");
        $insert = $query->execute(array (
            $segmentAd
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "marketEkle":
        $query  = $db->prepare("INSERT INTO market SET
            marketAd = ?");
        $insert = $query->execute(array (
            $marketAd
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "urunEkle":
        $query  = $db->prepare("INSERT INTO urun SET
            urunAd = ?,urunAciklama = ?");
        $insert = $query->execute(array (
            $urunAd, $urunAciklama
        ));
        if ($insert) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "referansCekJ":
        $query = $db->query("SELECT * FROM referans WHERE musteriId = '{$id}'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;
    case "referansCek":
        $query = $db->query("SELECT * FROM referans WHERE id = '{$id}'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;
    case "referansGuncelle":
        $query  = $db->prepare("UPDATE referans SET
        referansAd = :referansAd,musteriId = :musteriId
        WHERE id = :id");
        $update = $query->execute(array (
            "referansAd" => $referansAd,
            "musteriId"  => $musteriId,
            "id"         => $id
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "kullaniciCek":
        $query = $db->query("SELECT * FROM kullanici WHERE id = '{$id}'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;
    case "kontakCek":
        //$query = $db->query("SELECT * FROM kontak WHERE id = '{$id}'")->fetchAll(PDO::FETCH_ASSOC);
        $query = $db->query("SELECT k.id,k.adsoyad,k.telefon,k.email,k.telefon,k.pozisyon,k.sirketId,mus.ad FROM kontak k LEFT JOIN musteri mus ON k.sirketId = mus.id where k.id={$id}")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;
    case "kullaniciG":
        $query  = $db->prepare("UPDATE kullanici SET
        adsoyad = :adsoyad,
        telefon = :telefon,
        email = :email,
        pozisyon = :pozisyon
        WHERE id = :id");
        $update = $query->execute(array (
            "adsoyad"  => $adsoyad,
            "telefon"  => $telefon,
            "email"    => $email,
            "pozisyon" => $pozisyon,
            "id"       => $id
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
    case "kontakGuncelle":
        $query  = $db->prepare("UPDATE kontak SET
        adsoyad = :adsoyad,
        telefon = :telefon,
        email = :email,
        pozisyon = :pozisyon,
        sirketId = :sirketId
        WHERE id = :id");
        $update = $query->execute(array (
            "adsoyad"  => $adsoyad,
            "telefon"  => $telefon,
            "email"    => $email,
            "sirketId" => $sirketId,
            "pozisyon" => $pozisyon,
            "id"       => $id
        ));
        if ($update) {
            echo 1;
        } else {
            echo 2;
        }
        break;
}

?>