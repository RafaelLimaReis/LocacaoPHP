const Flatpicker = require('flatpickr');
const moment = require('moment');

const Portuguese = require('flatpickr/dist/l10n/pt.js').pt;
Flatpicker.localize(Portuguese);

function MakeDatePickerOnEach() {
  new Flatpicker('[data-input=datetimepicker]', {
    dateFormat: 'd/m/Y H:i',
    enableTime: true,
    time_24hr: true,
    parseDate: function (str) {
      return moment.utc(str, 'd/m/Y H:i').toDate();
    }
  });

  new Flatpicker('[data-input=datepicker]', {
    dateFormat: 'd/m/Y'
  });

  new Flatpicker('[data-input=timepicker]', {
    dateFormat: 'H:i',
    enableTime: true,
    noCalendar: true
  });
}

module.exports = MakeDatePickerOnEach;
