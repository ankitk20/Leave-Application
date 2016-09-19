// From-Date Picker
var fromDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('startDate'),
  orientation: 'PORTRAIT',
  past: moment(),
  future: moment().add(30, 'days')
});

// To-Date Picker
var toDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('endDate'),
  orientation: 'PORTRAIT',
  past: moment(),
  future: moment().add(30, 'days')
});

// Open from-date picker on click
var fromDateToggle = document.getElementById('startDate');
fromDateToggle.addEventListener('click', function() {
  fromDate.toggle();
});

// Open to-date picker on click
var toDateToggle = document.getElementById('endDate');
toDateToggle.addEventListener('click', function() {
  toDate.toggle();
});

// Do this when from-date is selected
document.getElementById('startDate').addEventListener('onOk', function() {
	document.getElementById('fromDiv').className += ' is-dirty';
	this.value = fromDate.time.format("ddd, MMM D YYYY").toString();
	toDate._init = moment(fromDate.time).add(5, 'months');
	toDate._past = moment(fromDate.time).add(5, 'months');
	toDate._future = moment(fromDate.time).add(7, 'months');
});

// Do this when to-date is selected
document.getElementById('endDate').addEventListener('onOk', function() {
	document.getElementById('toDiv').className += ' is-dirty';
	this.value = toDate.time.format("ddd, MMM D YYYY").toString();
});