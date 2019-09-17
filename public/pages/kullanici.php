<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Kullanıcı Listesi</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table kullanici no-margin">
                            <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Pozisyon</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $db->query("SELECT * FROM kullanici")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($query as $kullanici){
                                ?>
                                <tr class="s_<?=$kullanici['id']?>">
                                    <td ><?=$kullanici['adsoyad']?></td>
                                    <td ><?=$kullanici['email']?></td>
                                    <td ><?=$kullanici['telefon']?></td>
                                    <td>
                                        <?php
                                            if($kullanici['pozisyon'] == 1){
                                                echo "Yönetici";
                                            }else if($kullanici['pozisyon'] == 2){
                                                echo "Departman Lideri";
                                            }else{
                                                echo "Kullanıcı";
                                            }
                                        ?>
                                    </td>
                                    <td width="100px">
                                        <button type="button" onclick="kullaniciEdit(<?=$kullanici['id']?>)" class="btn btn-block btn-primary">Düzenle</button>
                                    </td>
                                    <td width="100px">
                                        <button type="button" onclick="sil(<?=$kullanici['id']?>,'kullanici')" class="btn btn-block btn-danger">Sil</button>
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
                    <button type="button" onclick="kullaniciEkle()" class="btn btn-block btn-success">Kullanıcı Tanımla</button>
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
                <h4 class="modal-title">Kullanıcı Tanımla</h4>
            </div>
            <div class="modal-body">
                <form action="pages/islemci.php" id="kullaniciForm" class="form-horizontal">
                    <input type="hidden" id="token" name="token" value="kullaniciEkle" />
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ad Soyad: </label>
                            <div class="col-sm-10">
                                <input id="adsoyad" name="adsoyad" type="text" oninvalid="this.setCustomValidity('Lütfen Ad Soyad Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email: </label>
                            <div class="col-sm-10">
                                <input id="email" name="email" type="text" oninvalid="this.setCustomValidity('Lütfen Email Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telefon: </label>
                            <div class="col-sm-10">
                                <input id="telefon" name="telefon" type="text" oninvalid="this.setCustomValidity('Lütfen Telefon Girin')" oninput="setCustomValidity('')" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pozisyon: </label>
                            <div class="col-sm-10">
                                <select id="pozisyon" name="pozisyon" class="form-control">
                                    <option value="1">Yönetici</option>
                                    <option value="2">Departman Lideri</option>
                                    <option value="3">Kullanıcı</option>
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