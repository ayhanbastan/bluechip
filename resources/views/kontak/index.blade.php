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
                                <th>Ad Soyad</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Pozisyon</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kontaks as $kontak)
                                <tr class="{{ $kontak->id }}">
                                    <td>{{ $kontak->adsoyad }}</td>
                                    <td>{{ $kontak->telefon }}</td>
                                    <td>{{ $kontak->email }}</td>
                                    <td>{{ $kontak->pozisyon }}</td>
                                    <td>{{ $kontak->sirketId }}</td>
                                    <td>
                                        <a href="{{ url('kontak-edit/'.$kontak->id) }}"
                                           class="btn btn-block btn-primary">Düzenle</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/kontak/'.$kontak->id) }}"
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
                            <a href="{{url('/yeni-kontak')}}" class="btn btn-block btn-success">Müşteri
                                Tanımla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection