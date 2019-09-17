@extends('layouts.app')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Müşteri Listesi</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Müşteri</th>
                                <th>Referans</th>
                                <th>Başlama Tarihi</th>
                                <th>Bitiş Tarihi</th>
                                <th>Detay Göster</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($briefs as $brief)
                                <tr class="{{ $brief->id }}">
                                    <td>{{ $brief->customers->ad }}</td>
                                    <td>{{ $brief->referance->referansAd }}</td>
                                    <td>{{ $brief->eventBaslangicTarihi}}</td>
                                    <td>{{ $brief->eventBitisTarihi }}</td>
                                    <td>
                                        <a href="{{ url('brief-detay/'.$brief->id) }}"
                                           class="btn btn-block btn-success">Detay Göster</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('brief-edit/'.$brief->id) }}"
                                           class="btn btn-block btn-primary">Düzenle</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/brief-delete/'.$brief->id) }}"
                                              method="post">
                                            @method("DELETE")
                                            {{ csrf_field() }}
                                            <input class="btn btn-danger" type="submit" value="SİL">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="box-footer">
                            <a href="{{url('/brief-create')}}" class="btn btn-block btn-success">Yeni Brief
                                Tanımla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection