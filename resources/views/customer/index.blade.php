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
                                <th>Müşteri No</th>
                                <th>Müşteri Ad</th>
                                <th>Düzene</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customerDefinitions as $customerDefinition)
                                <tr class="{{ $customerDefinition->id }}">
                                    <td>{{ $customerDefinition->uniqId }}</td>
                                    <td>{{ $customerDefinition->ad }}</td>
                                    <td>
                                        <a href="{{ url('musteri-tanımlama-edit/'.$customerDefinition->id) }}"
                                           class="btn btn-block btn-primary">Düzenle</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/musteri-tanımlama/'.$customerDefinition->id) }}"
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
                            <a href="{{url('/yeni-musteri-tanımlama')}}" class="btn btn-block btn-success">Müşteri
                                Tanımla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection