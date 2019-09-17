<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Kontak Listesi</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table kontak no-margin">
                            <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Pozisyon</th>
                                    <th>Şirket</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $db->query("SELECT k.id,k.adsoyad,k.telefon,k.email,k.telefon,k.pozisyon,k.sirketId,mus.ad FROM kontak k LEFT JOIN musteri mus ON k.sirketId = mus.id")->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($query as $kontak){
                                ?>
                                <tr class="s_<?=$kontak['id']?>">
                                    <td ><?=$kontak['adsoyad']?></td>
                                    <td ><?=$kontak['email']?></td>
                                    <td ><?=$kontak['telefon']?></td>
                                    <td ><?=$kontak['pozisyon']?></td>
                                    <td ><?=$kontak['ad']?></td>
                                    <td width="100px">
                                        <button type="button" onclick="kontakEdit(<?=$kontak['id']?>)" class="btn btn-block btn-primary">Düzenle</button>
                                    </td>
                                    <td width="100px">
                                        <button type="button" onclick="sil(<?=$kontak['id']?>,'kontak')" class="btn btn-block btn-danger">Sil</button>
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
                    <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-success">Kontak Tanımla</button>
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
                <h4 class="modal-title">Kontak Tanımla</h4>
            </div>
            <div class="modal-body">
                <form action="pages/islemci.php" id="kontakForm" class="form-horizontal">
                    <input type="hidden" id="token" name="token" value="kontakEkle" />
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ad Soyad: </label>
                            <div class="col-sm-10">
                                <input id="adsoyad" name="adsoyad" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email: </label>
                            <div class="col-sm-10">
                                <input id="email" name="email" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telefon: </label>
                            <div class="col-sm-10">
                                <input id="telefon" name="telefon" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pozisyon: </label>
                            <div class="col-sm-10">
                                <input id="pozisyon" name="pozisyon" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Şirket: </label>
                            <div class="col-sm-10">
                                <select id="sirketId" name="sirketId" style="width:100%" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control select2" required >
                                    <option>Şirket Seçiniz</option>
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