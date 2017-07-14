const laroute = require('../../laroute.js');

exports.init = function(){
  $('.hours').hide();
  $('#dateFilter').change(function(){
    const _date = $('#dateFilter').val();
    const _area = $('#reserve_area').val();
    const URL = laroute.route('app.reserves.find',{date:_date,id_area:_area});

    $.get(URL,function(data){
      console.log(data);
      $('#startHours').empty();
      $('#endHours').empty();
      $('#startHours').append('<option value="">Selecione a hora inicial</option>');
      $('#endHours').append('<option value="">Selecione a hora final</option>');
      $.each(data, function(index,hoursObj){
        if(hoursObj.color == 'black'){
          $('#startHours').append('<option value="' + hoursObj.hour + '">'+ hoursObj.hour + '</option>');
          $('#endHours').append('<option value="' + hoursObj.hour + '">'+ hoursObj.hour + '</option>');
        }else{
          $('#startHours').append('<option value="' + hoursObj.hour + '" disabled style="color:'+hoursObj.color+'">'+ hoursObj.hour + '</option>');
          $('#endHours').append('<option value="' + hoursObj.hour + '"disabled style="color:'+hoursObj.color+'">'+ hoursObj.hour + '</option>');
        }
      });
      $('.hours').show();
    })
  });
}