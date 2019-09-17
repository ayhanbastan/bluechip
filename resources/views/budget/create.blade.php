@extends('layouts.app')
@section('content')
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

                        <br><br>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Müşteri Seçiniz </label>
                                <div>
                                    <select class="form-control select2" style="width:100%"
                                            name="musteriId" id="musterId">
                                        <option>Müşteri Seçiniz</option>


                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->ad }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Referans </label>
                                <div>
                                    <select class="form-control select2 referans" style="width:100%" name="referansId"
                                            id="referansId">
                                        <option>Referans Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                        <label for="">Bütçe Başlığı Giriniz</label>
                        <h3 style="width:100%" class="box-title">
                            <input type="text" name="butceBaslik" placeholder="Bütçe Başlığı Giriniz" style="width:100%" class="form-control" />
                        </h3>
                        </div>
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
@endsection
