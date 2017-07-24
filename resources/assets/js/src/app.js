//events
const makeHours = require('./events/makeHours');
const findInvited = require('./events/findInvited');

//functions
const MakeDatePickerOnEach = require('./functions/MakeDatePickerOnEach'); //data e tempo

MakeDatePickerOnEach();
makeHours.init();
findInvited.init();