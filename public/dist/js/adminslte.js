$(function(){
    $('#projeler').fullCalendar({});
    $('.select2').select2();
    $('#reservation').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Uygula",
            "cancelLabel": "Vazgeç",
            "fromLabel": "Dan",
            "toLabel": "a",
            "customRangeLabel": "Seç",
            "daysOfWeek": [
                "Pt",
                "Sl",
                "Çr",
                "Pr",
                "Cm",
                "Ct",
                "Pz"
            ],
            "monthNames": [
                "Ocak",
                "Şubat",
                "Mart",
                "Nisan",
                "Mayıs",
                "Haziran",
                "Temmuz",
                "Ağustos",
                "Eylül",
                "Ekim",
                "Kasım",
                "Aralık"
            ],
            "firstDay": 1
        }
    });
    $(".musteriForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                
                if(data == 1){
                    window.location =  window.location.href+"&durum=1";
                }else{
                    toastr.error('Bilgilerinizi Kontrol Edin!');
                }
                
            },
            error: function(e) 
            {
                toastr.success('Error!');
            }          
          });
       }));
       $("#referansForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                if(data == 1){
                    window.location =  window.location.href+"&durum=1";
                }else{
                    toastr.error('Bilgilerinizi Kontrol Edin!');
                }
                
            },
            error: function(e) 
            {
                toastr.success('Error!');
            }          
          });
       }));
       $("#kontakForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                
                if(data == 1){
                    window.location =  window.location.href+"&durum=1";
                }else{
                    toastr.error('Bilgilerinizi Kontrol Edin!');
                }
                
            },
            error: function(e) 
            {
                toastr.success('Error!');
            }          
          });
       }));
       $("#kullaniciForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                if(data == 1){
                    window.location =  window.location.href+"&durum=1";
                }else{
                    toastr.error('Bilgilerinizi Kontrol Edin!');
                }
            },
            error: function(e) 
            {
                toastr.success('Error!');
            }          
          });
       }));
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'autoWidth'   : false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
        }
      })
    /*.success("Lİsteye eklendiniz");
    $("#usercreateButton").click(function(event) {
      
    })*/
    $(".addForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
    
        var form = $(this);
        var url = form.attr('action');
        var icerik = "";
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                window.location = 'http://localhost:8888/proje/index.php?sayfa='+data;
                  toastr.success('İşleminiz Başarıyla Gerçekleştirildi.');                
               },
               error: function(){
                   toastr.error('İşleminiz Gerçekleştirilememiştir.');
               }
        });    
    
    });
})
function sil(id,table){
    var request =  $.ajax({
        url: "pages/islemci.php",
        type: "POST",
        data: {table : table,token : 'sil',id:id},
        dataType: "html"
    });
    request.done(function(rp) {
        toastr.success('İşleminiz Başarıyla Gerçekleştirildi');
        $('.s_'+id).hide();
    });
      
}

function musteriEdit(id){
    $('#token').val("musteriGuncelle");
    $('#id').val(id);
    var request =  $.ajax({
        url: "pages/islemci.php",
        type: "POST",
        data: {token : 'musteriCek',id:id},
        dataType: "html"
    });
    request.done(function(rp) {
        var coz = JSON.parse(rp);
        $('#musteriNo').val(coz.uniqId);
        $('#musteriAd').val(coz.ad);
    });
    $('.modal').modal('show');
}
function musteriEkle(){
    $('.modal').modal('show');
    $('.modal input').val('');
    $('#token').val('musteriEkle');
}
function kullaniciEkle(){
  $('.modal').modal('show');
  $('.modal input').val('');
  $('#token').val('kullaniciEkle');
}
function kontakEkle(){
  $('.modal').modal('show');
  $('.modal input').val('');
  $('#token').val('kontakEkle');
}
function referansCek(id){
    var request =  $.ajax({
        url: "pages/islemci.php",
        type: "POST",
        data: {token : 'referansCekJ',id:id},
        dataType: "json"
    });
    request.done(function(rp) {
        var optionS;
       rp.forEach(function(element) {
        optionS += "<option value='"+ element.id +"'>"+ element.referansAd +"</option>";
      });
      $('.referans').html(optionS);
        
    });
    
    
}
function referansEdit(id){
  $('#token').val("referansGuncelle");
  $('#id').val(id);
  var request =  $.ajax({
      url: "pages/islemci.php",
      type: "POST",
      data: {token : 'referansCek',id:id},
      dataType: "html"
  });
  request.done(function(rp) {
      var coz = JSON.parse(rp);
      $('#referansAd').val(coz[0].referansAd);
      $('#musteriId').val(coz[0].musteriId)
  });
  $('.modal').modal('show');
}
function kullaniciEdit(id){
  $('#token').val("kullaniciG");
  $('#id').val(id);
  var request =  $.ajax({
      url: "pages/islemci.php",
      type: "POST",
      data: {token : 'kullaniciCek',id:id},
      dataType: "html"
  });
  request.done(function(rp) {
      var coz = JSON.parse(rp);
      $('#adsoyad').val(coz[0].adsoyad);
      $('#email').val(coz[0].email);
      $('#telefon').val(coz[0].telefon);
  });
  $('.modal').modal('show');
}
function kontakEdit(id){
  $('#token').val("kontakGuncelle");
  $('#id').val(id);
  var request =  $.ajax({
      url: "pages/islemci.php",
      type: "POST",
      data: {token : 'kontakCek',id:id},
      dataType: "html"
  });
  request.done(function(rp) {
      var coz = JSON.parse(rp);
      $('#adsoyad').val(coz[0].adsoyad);
      $('#email').val(coz[0].email);
      $('#telefon').val(coz[0].telefon);
      $('#pozisyon').val(coz[0].pozisyon);
      $('#sirketId').val(coz[0].sirketId).trigger('change');
  });
  $('.modal').modal('show');
}
// takvim
$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
function satirSil(item){
  item.parent().parent('tr').remove();
}
var say = 1;
function baslikEkle(){
  var icerik = "";
  icerik += '<div class="box box-warning"><div class="box-header with-border"><h3 style="width:100%" class="box-title"><input type="text" placeholder="Bütçe Başlığı Giriniz" style="width:100%" class="form-control" /></h3></div><div class="box-body"><div class="table-responsive"><table class="table musteri s'+say+' no-margin"><thead><tr><th>Hizmet</th><th>Kez/Gün</th><th>Kişi/Adet</th><th>Birim Ücret</th><th>Toplam Tutar</th><th></th></tr></thead><tbody><tr><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td width="100px" ><button type="button" onclick="satirSil($(this))" class="btn btn-block btn-danger btn-sm">Sil</button></td></tr></tbody></table></div></div><div class="box-footer clearfix"><button type="button" onclick="satirEkle('+say+')" class="btn btn-block btn-success"><i class="fa fa-plus"></i></button></div></div>';
  $('.butceBasliklari').append(icerik);
  say++;
}
satirSay = 1;
function satirEkle(item){
  var satir = '<tr><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td><input type="text" style="width:100%" class="form-control" /></td><td width="100px"><button type="button" onclick="satirSil($(this))" class="btn btn-block btn-danger btn-sm">Sil</button></td></tr>';
  $('.s'+item).children('tbody').append(satir);
  satirSay++;
}