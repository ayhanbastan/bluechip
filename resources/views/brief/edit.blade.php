@extends('layouts.app')
@section('content')
    <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
            <form action="{{ url("/brief-update/".$brief->id) }}" class="form-horizontal breifForm" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Müşteri </label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width:100%"
                                    name="musteriId" id="musterId">
                                <option value="{{ $brief->customers->id }}">{{ $brief->customers->ad }}</option>

                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->ad }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Referans </label>
                        <div class="col-sm-10">
                            <select class="form-control select2 referans" style="width:100%" name="referansId"
                                    id="referansId">
                                <option value="{{ $referans->id }}">{{ $referans->referansAd }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="eventBaslangicTarihi">Event Başlangıç Tarihi
                        Detayları </label>
                    <div class="col-sm-10">
                        <input name="eventBaslangicTarihi" type="text"
                               placeholder="Yıl-Ay-Gün şeklinde giriniz."
                               class="gui-input form-control{{ $errors->has('eventBaslangicTarihi') ? ' is-invalid' : '' }}"
                               value="{{ $brief->eventBaslangicTarihi }}">
                        @if ($errors->has('eventBaslangicTarihi'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('eventBaslangicTarihi') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="eventBitisTarihi">Event Bitiş Tarihi
                        Detayları </label>
                    <div class="col-sm-10">
                        <input name="eventBitisTarihi" type="text"
                               placeholder="Yıl-Ay-Gün şeklinde giriniz."
                               class="gui-input form-control{{ $errors->has('eventBitisTarihi') ? ' is-invalid' : '' }}"
                               value="{{ $brief->eventBitisTarihi }}">
                        @if ($errors->has('eventBitisTarihi'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('eventBitisTarihi') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="projeTeslimSekli">Proje Teslim Şekli </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="projeTeslimSekli">
                            <option value="1">Sunum yapılacak, tercih edilen alternatiflerin bütçesi hazırlanacak ?
                            </option>
                            <option value="2">Sunum ve bütçe beraberinde sunuma gidilecek ?</option>
                            <option value="3">Sunum ve Bütçe mail atılacak ?</option>
                            <option value="4">Sunum Mail atılacak ?</option>
                            <option value="4">Taslak proje bütçesi mail atılacak ?</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">İlgili Departman </label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width:100%"
                                    name="ilgiliDepartman" id="musterId">
                                <option value="{{ $brief->departmans->departmanId }}">{{ $brief->departmans->departmanAd }}</option>

                                @foreach($departmans as $departman)
                                    <option value="{{ $departman->departmanId }}">{{ $departman->departmanAd }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="kisiSayisi">Kişi Sayısı </label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Etkinlik katılımcı sayısı ve varsa katılımcı sayısının gün/Akış bazlı dağılım sayılarını belirtiniz.Örneğin ;1.Gün 200 Kişi, Ertesi Gün 300 Ek katılımcı daha vb "
                                class="form-control" name="kisiSayisi"> {{ $brief->kisiSayisi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="baslangicSaati">Başlangıç Saati </label>
                    <div class="col-sm-10">
                        <input name="baslangicSaati" id="saat" type="time" class="form-control" placeholder=""
                               value="{{ $brief->baslangicSaati    }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="bitisSaati">Bitiş Saati </label>
                    <div class="col-sm-10">
                        <input name="bitisSaati" id="saat" type="time" class="form-control" placeholder=""
                               value="{{ $brief->bitisSaati    }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="projeEvSahibiProfili">Proje Ev Sahibi Profili ( Karar
                        Verici )</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Etkinliğin karar vericisi konumundaki müşterinizin kişisel özelliklerini ve tercih edebileceği yön ve yönleri içeriklere katmadeğer sağlayacak şekilde varsa kısaca açıklayınız.  "
                                class="form-control"
                                name="projeEvSahibiProfili">{{ $brief->projeEvSahibiProfili }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="katlımcıProfiliHedefKitle">Katılımcı Profili Kitle (
                        Karar Verici )</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Lütfen % şeklinde giriniz" class="form-control"
                                name="katlımcıProfiliHedefKitle">{{ $brief->katlımcıProfiliHedefKitle }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="kadınErkekDağılımıYüzde">Kadın Erkek Dağılımı ( Karar
                        Verici )</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Kadın Erkek dağılımını % şeklinde giriniz. Örn: %40 erkek %60 kadın"
                                class="form-control"
                                name="kadınErkekDağılımıYüzde">{{ $brief->kadınErkekDağılımıYüzde }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="projeMekan">Proje Mekan</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Tercih edilen proje mekanı ve olan proje mekanı alternatiflerinin çıkartılmasında etkileyebilecek olan kritik başarı faktörlerini, tercih edilen mekan özelliklerini belirtiniz"
                                class="form-control" name="projeMekan">{{ $brief->projeMekan }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="isTanimi">İş Tanımı</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Markanın gerçekleştirmek istediği etkinliğin tanımını belirtiniz"
                                class="form-control" name="isTanimi">{{ $brief->isTanimi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="amac">Amaç</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Markanın gerçekleştirmek istediği etkinliğin amacı ve ölçümlenebilir kritik başarı faktörleri ip uçlarını belirtiniz.Örneğin;Aidiyet duygusu arttırmak Motivasyon Rakamsal, ve hedef odaklı eğitim vb  "
                                class="form-control" name="amac">{{ $brief->amac }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="konsept">Konsept</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Konsepti giriniz" class="form-control"
                                name="konsept">{{ $brief->konsept }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="icerikGunAkısDetay">İcerik Gun Akıs Detay</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Markanın etkinlik süresi içerisinde akılı belirleyecek olan beklenti ve içerik detaylarını belirtiniz. "
                                class="form-control"
                                name="icerikGunAkısDetay">{{ $brief->icerikGunAkısDetay }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="markaAkreTipi">Marka Akre Tipi</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="İletişim diline yön vermek için ana marka ve oluşturulacak olan etkinlik markası için marka karakterlerini belirtiniz."
                                class="form-control" name="markaAkreTipi">{{ $brief->markaAkreTipi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="karakteri">Karakteri</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control" name="karakteri">{{ $brief->karakteri }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="detaylar">Detaylar</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control" name="detaylar">{{ $brief->detaylar }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="butceAraligi">Butce Araligi</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="butceAraligi">{{ $brief->butceAraligi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="butceDagilimi">Butce Dagilimi</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="butceDagilimi">{{ $brief->butceDagilimi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="oncekiDonemlerTaihAralıgı">Önceki Dönemler Trarih
                        Aralığı</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Markanın beklentileri ile doğru orantılı olarak harcanacak olan bütçenin, etkinliğin hangi bacağında ağırlıklı olarak kullanılması planlanıyor belirtiniz.
Örneğin; Gala önemli sanatçıya para harcamak toplantıyı daha basit kurguda gerçekleştirmek isteniyor. Yada Toplantı içeriği ve teknolojik yaklaşım daha önemli Galada daha ekonomik bir alternatif olabilir vb. "
                                class="form-control"
                                name="oncekiDonemlerTaihAralıgı">{{ $brief->oncekiDonemlerTaihAralıgı }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ozelGeceler">Özel Geceler</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Markanın özel etkinlik gecesi beklentisini ve akış içerisinde yer vermek istediği zaman dilimini belirtiniz.
Örneğin; Welcome Event, İlk Gün dj Party, Açık Hava, Ana salon, Fuaye vb" class="form-control"
                                name="ozelGeceler">{{ $brief->ozelGeceler }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sanatciGala">Sanatçı Gala</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="sanatciGala">{{ $brief->sanatciGala }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="konusmaci">Konusmaci</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control" name="konusmaci">{{ $brief->konusmaci }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sunucuModerator">Sunucu Moderator</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="sunucuModerator">{{ $brief->sunucuModerator }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sovTeatral">Sov / Teatral</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="sovTeatral">{{ $brief->sovTeatral }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="acivite">Acivite</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control" name="acivite">{{ $brief->acivite }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="serbestZamanİcerikleri">Serbest Zaman İcerikleri</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="serbestZamanİcerikleri">{{ $brief->serbestZamanİcerikleri }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="markaRenkKodlari">Marka Renk Kodlari</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="markaRenkKodlari">{{ $brief->markaRenkKodlari }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="markaLogosuFontlariVector">Marka Logosu Fontlari
                        Vector</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="markaLogosuFontlariVector">{{ $brief->markaLogosuFontlariVector }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="markaKurumsakKimlikDokumani">Marka Kurumsal Kimlik
                        Dokumani</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="markaKurumsakKimlikDokumani">{{ $brief->markaKurumsakKimlikDokumani }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="tasarimsalNetBeklenti">Tasarimsal Net Beklenti</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="tasarimsalNetBeklenti">{{ $brief->tasarimsalNetBeklenti }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="2DTasarimKalemleri">2D Tasarim Kalemleri</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Tasarım Yapılacak olan iş kalemlerini belirtiniz. Tasarıma yön verecek ve konsept ile örtüşecek olan tasarım içeriklerini tasarım brief formu üzerinden belirtilmesini rica ederiz. "
                                class="form-control"
                                name="2DTasarimKalemleri">{{ $brief->twoDTasarimKalemleri }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="3DTasarimKalemleri">3D Tasarim Kalemleri</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Tasarım Yapılacak olan iş kalemlerini belirtiniz. Tasarıma yön verecek ve konsept ile örtüşecek olan tasarım içeriklerini tasarım brief formu üzerinden belirtilmesini rica ederiz."
                                class="form-control" name="3DTasarimKalemleri"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="DekorasyonSusleme">Dekorasyon Susleme</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Marka beklentisi, konsept ve etkinlik alan içerik detaylarına göre dekoratif yaklaşıma yön verecek beklentilerinizi belirtiniz. Varsa Örnek MoodBoard ekleyiniz. "
                                class="form-control" name="DekorasyonSusleme">{{ $brief->DekorasyonSusleme }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="MultiMediaTasarımKalemleri">MultiMedia Tasarım
                        Kalemleri</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Etkinlik Sunum ve prpje özelinde varsa marka beklentisini belitriniz.Örneğin; Logo Animasyon ,İsim Animasyon, Geçiş Animasyonları "
                                class="form-control"
                                name="MultiMediaTasarımKalemleri">{{ $brief->MultiMediaTasarımKalemleri }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="webSitesi">Web Sitesi</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="webSitesi">{{ $brief->webSitesi }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sosyalMedya">Sosyal Medya</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="sosyalMedya">{{ $brief->sosyalMedya }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="etkinlikFilmi">Etkinlik Filmi</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="" class="form-control"
                                name="etkinlikFilmi">{{ $brief->etkinlikFilmi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="diger">Diger</label>
                    <div class="col-sm-10">
                        <textarea
                                placeholder="Etkinlik hazırlık aşamaları ve projenin kritik başarı faktörü olabilecek tüm diğer detayları belirtiniz. "
                                class="form-control"
                                name="diger">{{ $brief->diger }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#referansId").hide();

            $("#musterId").change(function () {

                var musteriId = $(this).val();
                $.get("{{ url("/referanslar/") }}/" + musteriId, function (data, status) {

                    $('#referansId').html("");

                    var gelenVeri = (JSON.parse(data));

                    for (var i = 0; i < gelenVeri.length; i++) {

                        $('#referansId').append('<option value="' + gelenVeri[i].id + '" selected="selected">' + gelenVeri[i].referansAd + '</option>');

                    }
                });

            })
        });
    </script>
@endsection