const laroute = require('../../laroute.js');

exports.init = function(){
  $('.hours').hide();
  $('#dateFilter').change(function(){
    const _date = $('#dateFilter').val();
    const URL = laroute.route('app.reserves.find',{date:_date});
    console.log(_date);
    $.get(URL,function(data){
      console.log(data);
      $.each(data, function(index,hoursObj){
        $('#startHours').append('<option value="' + index + '">'+ hoursObj + '</option');
        $('#endHours').append('<option value="' + index + '">'+ hoursObj + '</option');
      });
      $('.hours').show();
    })
  });
}