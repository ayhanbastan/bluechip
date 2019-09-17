@extends('layouts.app')
@section('content')
    <div class="box-body">
        <form id="form" action="{{ url('/kullanici/'.$user->id) }}" method="post">

            <div class="panel mb25 mt5">
                <div class="panel-body pn">
                    <div class="tab-content pn br-n allcp-form theme-primary">
                        <div class="section row mbn">
                            {{ csrf_field() }}

                            <div class="col-md-12 mb15 ph10">
                                <label for="adsoyad" class="field prepend-icon mb5"> Ad Soyad </label>
                                <input name="adsoyad" type="text"
                                       class="gui-input form-control{{ $errors->has('adsoyad') ? ' is-invalid' : '' }}"
                                       value="{{ $user->adsoyad }}">
                                @if ($errors->has('adsoyad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adsoyad') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12 mb15 ph10">
                                <label for="telefon" class="field prepend-icon mb5"> Telefon </label>
                                <input name="telefon" type="text"
                                       class="gui-input form-control{{ $errors->has('telefon') ? ' is-invalid' : '' }}"
                                       value="{{ $user->telefon }}">
                                @if ($errors->has('telefon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb15 ph10">
                                <label for="email" class="field prepend-icon mb5"> Email </label>
                                <input name="email" type="text"
                                       class="gui-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-12" style="margin-top: 15px">
                                <label for="pozisyon" class="field prepend-icon mb5"> Şirket </label>
                                <select id="pozisyon" name="pozisyon" style="width:100%; margin-top: 15px"
                                        class="form-control select2" required>
                                    <option value="{{ $userPozisyon }}">{{ $yetkiBul }}</option>
                                    @foreach($yetki as $yet)
                                        <option value="{{ $yet["id"] }}">{{ $yet["pozisyon"] }}</option>
                                    @endforeach
                                    @if ($errors->has('pozisyon'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pozisyon') }}</strong>
                                    </span>
                                    @endif
                                </select>
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