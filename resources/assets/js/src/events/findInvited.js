const laroute = require('../../laroute.js');

exports.init = function(){
  const $name = $('[data-selectize = findName]');
  const $cpf = $('[data-selectize = findCpf]');

  if($name.length){
    $name.selectize({
      valueField: 'id',
      labelField: 'name',
      //maxItems: 1,
      searchField: ['name'],
      optgroupValueField: 'cpf',
      //options: [],
      create: false,
      load: function(query, callback){
        if (query.length > 2) {
          const url = laroute.route('app.findInvited',{query: query});
          $.get(url, function(data){
            callback(data);
          });
        }
      }
    });
  }
}
