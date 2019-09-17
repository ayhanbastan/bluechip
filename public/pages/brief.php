<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Brief Listesi</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table musteri no-margin">
                            <thead>
                                <tr>
                                    <th>Referans Ad</th>
                                    <th>Müşteri</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $referans = $db->query("SELECT ref.id,ref.musteriId,ref.referansNo,ref.referansAd,mus.ad FROM referans ref LEFT JOIN musteri mus ON ref.musteriId = mus.id")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($referans as $ref){
                                ?>
                                <tr class="s_<?=$ref['id']?>">
                                    <td><?=$ref['referansAd']?></td>
                                    <td ><?=$ref['ad']?></td>
                                    <td width="100px">
                                        <button type="button" data-id="<?=$musteri['id']?>" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-primary">Düzenle</button>
                                    </td>
                                    <td width="100px" >
                                        <button type="button" onclick="sil(<?=$ref['id']?>,'referans')" class="btn btn-block btn-danger btn-sm">Sil</button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                     </div>
              <!-- /.table-responsive -->
                </div>
                <div class="box-footer clearfix">
                    <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-success">Brief Oluştur</button>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade in" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Brief Formu</h4>
            </div>
            <div class="modal-body">
                <form action="pages/islemci.php" class="form-horizontal breifForm">
                    <input type="hidden" name="token" value="briefEkle" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Müşteri </label>
                            <div class="col-sm-10">
                                <select onchange="referansCek(this.value)" class="form-control select2" style="width:100%" name="musteriId" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')">
                                    <option>Müşteri Seçiniz</option>
                                    <?php
                                    $query = $db->query("SELECT * FROM musteri")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($query as $musteri){
                                    ?>
                                    <option value="<?=$musteri['id']?>"><?=$musteri['ad']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Referans </label>
                            <div class="col-sm-10">
                                <select class="form-control select2 referans" style="width:100%" name="referansId" oninvalid="this.setCustomValidity('Lütfen Referans Seçiniz')" oninput="setCustomValidity('')">
                                    <option>Referans Seçiniz</option>
                                    <?php
                                    $query = $db->query("SELECT * FROM musteri")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($query as $musteri){
                                    ?>
                                    <option value="<?=$musteri['id']?>"><?=$musteri['ad']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Event Tarihi </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation">
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Proje Teslim Şekli </label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option value="1">Sunum yapılacak, tercih edilen alternatiflerin bütçesi hazırlanacak ?</option>
                                    <option value="1">Sunum ve bütçe beraberinde sunuma gidilecek ?</option>
                                    <option value="1">Sunum ve Bütçe mail atılacak ?</option>
                                    <option value="1">Sunum Mail atılacak ?</option>
                                    <option value="1">Taslak proje bütçesi mail atılacak ? </option>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İlgili Departman </label>
                            <div class="col-sm-10">
                                <select style="width:100%" class="form-control select2" multiple="multiple" placeholder="Departman Seçiniz" data-placeholder="Departman Seçiniz">
                                    <?php
                                    $departmanlar = $db->query("SELECT * FROM departmanlar")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($departmanlar as $departman){
                                    ?>
                                    <option value="<?=$departman['departmanId']?>"><?=$departman['departmanAd']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kişi Sayısı </label>
                            <div class="col-sm-10">
                                <input name="kisiSayisi" id="musteriNo" type="text" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gün Sayısı </label>
                            <div class="col-sm-10">
                                <input name="gunSayisi" id="gunSayisi" type="text" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Başlangıç Saati </label>
                            <div class="col-sm-10">
                                <input name="baslangicSaat" id="saat" type="time" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bitiş Saati </label>
                            <div class="col-sm-10">
                                <input name="bitisSaat" id="saat" type="time" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Proje Ev Sahibi Profili ( Karar Verici ) </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Etkinliğin karar vericisi konumundaki müşterinizin kişisel özelliklerini ve tercih edebileceği yön ve yönleri içeriklere katmadeğer sağlayacak şekilde varsa kısaca açıklayınız.  " class="form-control" name="kararverici"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Katılımcı Profili </label>
                            <div class="col-sm-10">
                                <input name="katilimciProfil" id="katilimciProfil" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kadın Erkek Dağılımı </label>
                            <div class="col-sm-10">
                                <input name="kadinErkek" id="kadinErkek" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Proje Mekanı </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Tercih edilen proje mekanı ve olan proje mekanı alternatiflerinin çıkartılmasında etkileyebilecek olan kritik başarı faktörlerini, tercih edilen mekan özelliklerini belirtiniz." class="form-control" name="projeMekan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İş Tanımı</label>
                            <div class="col-sm-10">
                                <input name="isTanimi" id="isTanimi" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Amaç </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Markanın gerçekleştirmek istediği etkinliğin amacı ve ölçümlenebilir kritik başarı faktörleri ip uçlarını belirtiniz.Örneğin; Aidiyet duygusu arttırmak Motivasyon Rakamsal, ve hedef odaklı eğitim vb" class="form-control" name="kararverici"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Konsept </label>
                            <div class="col-sm-10">
                                <input name="konsept" id="konsept" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İçerik, Gün Akışı Detayları </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Markanın etkinlik süresi içerisinde akılı belirleyecek olan beklenti ve içerik detaylarını belirtiniz." class="form-control" name="gunAkisi"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Marka Arketipi / Karakteri </label>
                            <div class="col-sm-10">
                                <textarea placeholder="İletişim diline yön vermek için ana marka ve oluşturulacak olan etkinlik markası için marka karakterlerini belirtiniz." class="form-control" name="markaKarakteri"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Detaylar </label>
                            <div class="col-sm-10">
                                <input name="detaylar" id="detaylar" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bütçe Aralığı </label>
                            <div class="col-sm-10">
                                <input name="butceAraligi" id="butceAraligi" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Marka Arketipi / Karakteri </label>
                            <div class="col-sm-10">
                                <textarea style="height:100px" placeholder="Markanın beklentileri ile doğru orantılı olarak harcanacak olan bütçenin, etkinliğin hangi bacağında ağırlıklı olarak kullanılması planlanıyor belirtiniz. 
Örneğin; Gala önemli sanatçıya para harcamak toplantıyı daha basit kurguda gerçekleştirmek isteniyor. Yada Toplantı içeriği ve teknolojik yaklaşım daha önemli Galada daha ekonomik bir alternatif olabilir vb. " class="form-control" name="butceDagilimi"></textarea>
                            </div>
                        </div>
                    </div>
                             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            </form>   
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>