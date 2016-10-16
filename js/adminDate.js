// From-Date Picker
var fromDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('startDate'),
  orientation: 'PORTRAIT',
  past: moment().subtract(10,'years'),
  future: moment().add(10, 'years')
});

// To-Date Picker
var toDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('endDate'),
  orientation: 'PORTRAIT',
  past: moment().subtract(10,'years'),
  future: moment().add(10, 'years')
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
	toDate._init = moment(fromDate.time);
	toDate._past = moment(fromDate.time);
	toDate._future = moment(fromDate.time).add(10, 'years');
});

// Do this when to-date is selected
document.getElementById('endDate').addEventListener('onOk', function() {
	document.getElementById('toDiv').className += ' is-dirty';
	this.value = toDate.time.format("ddd, MMM D YYYY").toString();
});