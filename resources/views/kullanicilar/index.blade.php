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
                            @foreach($users as $user)
                                <tr class="{{ $user->id }}">
                                    <td>{{ $user->adsoyad }}</td>
                                    <td>{{ $user->telefon }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->pozisyon }}</td>
                                    <td>
                                        <a href="{{ url('/kullanici-edit/'.$user->id) }}"
                                           class="btn btn-block btn-primary">Düzenle</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/kullanici/'.$user->id) }}"
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
                            <a href="{{url('/yeni-kullanici')}}" class="btn btn-block btn-success">Müşteri
                                Tanımla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection