@extends('layouts.app')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Brief Detay</h3>
                        <hr>
                        <p><strong>Brief Oluşturma Tarihi
                                :</strong> {{ $brief->created_at ? $brief->created_at : "Girilmemiş" }}
                        </p>
                        <hr>
                    </div>
                    <div class="box-body">
                        <div>
                            <p><strong>Müşteri :</strong> {{ $brief->customers->ad }} </p>
                            <hr>
                            <p><strong>Referans :</strong> {{ $referans->referansAd }} </p>
                            <hr>

                            <p><strong>Event Başlangıç Tarihi Detayları :</strong> {{ $brief->eventBaslangicTarihi }}
                            </p>
                            <hr>

                            <p><strong>Event Başlangıç Tarihi Detayları
                                    :</strong> {{ $brief->eventBitisTarihi ? $brief->eventBitisTarihi : "Girilmemiş" }}
                            </p>
                            <hr>

                            <p><strong>İlgili Departman :</strong> {{ $brief->departmans->departmanAd  }} </p>
                            <hr>

                            <p><strong>Kişi Sayısı
                                    :</strong> {{ $brief->kisiSayisi ? $brief->kisiSayisi : "Girilmemiş" }} </p>
                            <hr>
                            <p><strong>Başlangıç Saati
                                    :</strong> {{ $brief->baslangicSaati ? $brief->baslangicSaati : "Girilmemiş" }} </p>
                            <hr>
                            <p><strong>Bitiş Saati
                                    :</strong> {{ $brief->bitisSaati ? $brief->bitisSaati : "Girilmemiş" }} </p>
                            <hr>
                            <p><strong>Proje Ev Sahibi Profili ( Karar
                                    Verici )
                                    :</strong> {{ $brief->projeEvSahibiProfili ? $brief->projeEvSahibiProfili : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Katılımcı Profili Kitle ( Karar Verici )
                                    :</strong> {{ $brief->katlımcıProfiliHedefKitle ? $brief->katlımcıProfiliHedefKitle : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Kadın Erkek Dağılımı ( Karar Verici )
                                    :</strong> {{ $brief->kadınErkekDağılımıYüzde ? $brief->kadınErkekDağılımıYüzde : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Proje Mekan
                                    :</strong> {{ $brief->projeMekan ? $brief->projeMekan : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>İş Tanımı
                                    :</strong> {{ $brief->isTanimi ? $brief->isTanimi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Amaç
                                    :</strong> {{ $brief->amac ? $brief->amac : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Konsept
                                    :</strong> {{ $brief->konsept ? $brief->konsept : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>İcerik Gun Akıs Detay
                                    :</strong> {{ $brief->icerikGunAkısDetay ? $brief->icerikGunAkısDetay : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Marka Akre Tipi
                                    :</strong> {{ $brief->markaAkreTipi ? $brief->markaAkreTipi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Karakteri
                                    :</strong> {{ $brief->Karakteri ? $brief->Karakteri : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Detaylar
                                    :</strong> {{ $brief->detaylar ? $brief->detaylar : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Butce Araligi
                                    :</strong> {{ $brief->butceAraligi ? $brief->butceAraligi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Butce Dagilimi
                                    :</strong> {{ $brief->butceDagilimi ? $brief->butceDagilimi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Önceki Dönemler Trarih Aralığı
                                    :</strong> {{ $brief->oncekiDonemlerTaihAralıgı ? $brief->oncekiDonemlerTaihAralıgı : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Özel Geceler
                                    :</strong> {{ $brief->ozelGeceler ? $brief->ozelGeceler : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Sanatçı Gala
                                    :</strong> {{ $brief->sanatciGala ? $brief->sanatciGala : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Konusmaci
                                    :</strong> {{ $brief->konusmaci ? $brief->konusmaci : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Sunucu Moderator
                                    :</strong> {{ $brief->sunucuModerator ? $brief->sunucuModerator : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Şov / Teatral
                                    :</strong> {{ $brief->sovTeatral ? $brief->sovTeatral : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Acivite
                                    :</strong> {{ $brief->acivite ? $brief->acivite : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Serbest Zaman İcerikleri
                                    :</strong> {{ $brief->serbestZamanİcerikleri ? $brief->serbestZamanİcerikleri : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Marka Renk Kodlari
                                    :</strong> {{ $brief->markaRenkKodlari ? $brief->markaRenkKodlari : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Marka Logosu Fontlari Vector
                                    :</strong> {{ $brief->markaLogosuFontlariVector ? $brief->markaLogosuFontlariVector : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Marka Kurumsal Kimlik Dokuman
                                    :</strong> {{ $brief->markaKurumsakKimlikDokumani ? $brief->markaKurumsakKimlikDokumani : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Tasarimsal Net Beklenti
                                    :</strong> {{ $brief->tasarimsalNetBeklenti ? $brief->tasarimsalNetBeklenti : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>2D Tasarim Kalemleri
                                    :</strong> {{ $brief->twoDTasarimKalemleri ? $brief->twoDTasarimKalemleri : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>3D Tasarim Kalemleri
                                    :</strong> {{ $brief->threeDTasarimKalemleri ? $brief->threeDTasarimKalemleri : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Dekorasyon Susleme
                                    :</strong> {{ $brief->DekorasyonSusleme ? $brief->DekorasyonSusleme : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>MultiMedia Tasarım Kalemleri
                                    :</strong> {{ $brief->MultiMediaTasarımKalemleri ? $brief->MultiMediaTasarımKalemleri : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Web Sitesi :</strong> {{ $brief->webSitesi ? $brief->webSitesi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Sosyal Medya
                                    :</strong> {{ $brief->sosyalMedya ? $brief->sosyalMedya : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Etkinlik Filmi
                                    :</strong> {{ $brief->etkinlikFilmi ? $brief->etkinlikFilmi : "Girilmemiş" }}
                            </p>
                            <hr>
                            <p><strong>Diger
                                    :</strong> {{ $brief->diger ? $brief->diger : "Girilmemiş" }}
                            </p>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection