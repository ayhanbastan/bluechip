<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12 butceBasliklari">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Bütçe Oluştur</h3>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 style="width:100%" class="box-title">
                        <input type="text" placeholder="Bütçe Başlığı Giriniz" style="width:100%" class="form-control" />
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table musteri s0 no-margin">
                            <thead>
                                <tr>
                                    <th>Hizmet</th>
                                    <th>Kez/Gün</th>
                                    <th>Kişi/Adet</th>
                                    <th>Birim Ücret</th>
                                    <th>Toplam Tutar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" style="width:100%" class="form-control" /></td>
                                    <td><input type="text" style="width:100%" class="form-control" /></td>
                                    <td><input type="text" style="width:100%" class="form-control" /></td>
                                    <td><input type="text" style="width:100%" class="form-control" /></td>
                                    <td><input type="text" style="width:100%" class="form-control" /></td>
                                    <td width="100px" >
                                        <button type="button" onclick="satirSil($(this))" class="btn btn-block btn-danger btn-sm">Sil</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                     </div>
              <!-- /.table-responsive -->
                </div>
                <div class="box-footer clearfix">
                    <button onclick="satirEkle(0)" type="button" class="btn btn-block btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            
        </div>
        <div class="col-md-4 col-md-offset-4 text-center">
            <button type="button" onclick="baslikEkle()" class="btn btn-block btn-warning">Başlık Ekle</button>
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