@extends('layouts.app')
@section('content')
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Brief Formu</h4>
        </div>
        <div class="modal-body">
            <form action="" class="form-horizontal breifForm">
                <input type="hidden" name="token" value="briefEkle"/>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Müşteri </label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width:100%"
                                    name="musteriId" id="musterId"
                                    oninvalid="this.setCustomValidity('Lütfen Müşteri Girin')"
                                    oninput="setCustomValidity('')">
                                <option>Müşteri Seçiniz</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->ad }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Referans </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="city" id="city">
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#musteriId').change(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var musteriId = $(this).val();
                if (musteriId) {
                    $.ajax({
                        type: "get",
                        url: " url('/brief-ajax') /" + musteriId,
                        success: function (res) {
                            if (res) {

                                $("#city").empty();
                                $("#state").append('<option>Select State</option>');
                                $.each(res, function (key, value) {
                                    $("#state").append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        }

                    });
                }
            });
            $('#state').change(function () {
                var sid = $(this).val();
                if (sid) {
                    $.ajax({
                        type: "get",
                        url: "url('/city')/" + sid,
                        success: function (res) {
                            if (res) {
                                $("#city").empty();
                                $("#city").append('<option>Select City</option>');
                                $.each(res, function (key, value) {
                                    $("#city").append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        }

                    });
                }
            });
        });
    </script>
@endsection