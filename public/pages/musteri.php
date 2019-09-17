<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Müşteri Listesi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Müşteri No</th>
                                <th>Müşteri Ad</th>
                                <th>Düzene</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $db->query("SELECT * FROM musteri")->fetchAll(PDO::FETCH_ASSOC);
                                foreach($query as $musteri){
                            ?>
                            <tr class="s_<?=$musteri['id']?>">
                                <td><?=$musteri['uniqId']?></td>
                                <td><?=$musteri['ad']?></td>
                                <td>
                                    <button type="button" data-id="<?=$musteri['id']?>" onclick="musteriEdit(<?=$musteri['id']?>)" class="btn btn-block btn-primary">Düzenle</button>
                                </td>
                                <td><button type="button" onclick="sil(<?=$musteri['id']?>,'musteri')" class="btn btn-block btn-danger btn-sm">Sil</button></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="button" onclick="musteriEkle()" class="btn btn-block btn-success">Müşteri Tanımla</button>
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
                <h4 class="modal-title">Müşteri Tanımla</h4>
            </div>
            <div class="modal-body">
                <form action="pages/islemci.php" class="form-horizontal musteriForm">
                    <input type="hidden" name="token" id="token" value="musteriEkle" />
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="uniqId" value="<?=uniqId()?>" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Müşteri No: </label>
                            <div class="col-sm-10">
                                <input name="musteriNo" id="musteriNo" type="text" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Müşteri Ad: </label>
                            <div class="col-sm-10">
                                <input name="musteriAd" id="musteriAd" type="text" oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
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
