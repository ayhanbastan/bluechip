@extends('layouts.app')
@section('content')
    <div class="box-body">
        <form id="form" action="{{ url('/musteri-tanımlama') }}" method="post">

            <div class="panel mb25 mt5">
                <div class="panel-body pn">
                    <div class="tab-content pn br-n allcp-form theme-primary">
                        <div class="section row mbn">
                            {{ csrf_field() }}

                            <div class="col-md-12 mb15 ph10">
                                <label for="name" class="field prepend-icon mb5"> Müşteri No </label>
                                <input name="musteriNo" type="text"
                                       class="gui-input form-control{{ $errors->has('musteriNo') ? ' is-invalid' : '' }}"
                                       value="{{ old('musteriNo') }}">
                                @if ($errors->has('musteriNo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('musteriNo') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 mb15 ph10">
                                <label for="name" class="field prepend-icon mb5"> Müşteri Adı </label>
                                <input name="musteriName" type="text"
                                       class="gui-input form-control{{ $errors->has('musteriName') ? ' is-invalid' : '' }}"
                                       value="{{ old('musteriName') }}">
                                @if ($errors->has('musteriName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('musteriName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br/>

                            <div class="col-md-9 mt15">

                            </div>

                            <div class="col-md-3 mt15" style="margin-top: 15px">
                                <button type="submit" class="btn btn-primary btn-block">EKLE</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection