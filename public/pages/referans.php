<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Referans Listesi</h3>
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
                                        <button type="button" data-id="<?=$ref['id']?>" onclick="referansEdit(<?=$ref['id']?>)" class="btn btn-block btn-primary">Düzenle</button>
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
                    <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-success">Referans Aç</button>
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
                <h4 class="modal-title">Referans Aç</h4>
            </div>
            <div class="modal-body">
                <form action="pages/islemci.php" id="referansForm" class="form-horizontal">
                    <input type="hidden" id="token" name="token" value="referansEkle" />
                    <input type="hidden" id="id" name="id" value="" />
                    <input type="hidden" name="referansNo" value="<?=uniqId()?>" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Müşteri: </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="musteriId" name="musteriId" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')">
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
                            <label class="col-sm-2 control-label">Referans Ad: </label>
                            <div class="col-sm-10">
                                <input name="referansAd" id="referansAd" type="text" oninvalid="this.setCustomValidity('Lütfen Bilgi Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
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