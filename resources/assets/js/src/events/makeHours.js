const laroute = require('../../laroute.js');

exports.init = function(){
  $('.hours').hide();
  $('#dateFilter').change(function(){
    const _date = $('#dateFilter').val();
    const URL = laroute.route('app.reserves.find',{date:_date});

    $.get(URL,function(data){
      console.log(data);
      $.each(data, function(index,hoursObj){
        console.log(hoursObj);
        $('#startHours').append('<option value="' + hoursObj + '">'+ hoursObj + '</option>');
        $('#endHours').append('<option value="' + hoursObj + '">'+ hoursObj + '</option>');
      });
      $('.hours').show();
    })
  });
}