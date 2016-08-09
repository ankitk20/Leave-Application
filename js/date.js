// From-Date Picker
var fromDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('fromDate'),
  orientation: 'PORTRAIT',
  past: moment(),
  future: moment().add(30, 'days')
});

// To-Date Picker
var toDate = new mdDateTimePicker.default({
  type: 'date',
  trigger: document.getElementById('toDate'),
  orientation: 'PORTRAIT',
  past: moment(),
  future: moment().add(30, 'days')
});

// Open from-date picker on click
var fromDateToggle = document.getElementById('fromDate');
fromDateToggle.addEventListener('click', function() {
  fromDate.toggle();
});

// Open to-date picker on click
var toDateToggle = document.getElementById('toDate');
toDateToggle.addEventListener('click', function() {
  toDate.toggle();
});

// Do this when from-date is selected
document.getElementById('fromDate').addEventListener('onOk', function() {
	document.getElementById('fromDiv').className += ' is-dirty';
	this.value = fromDate.time.format("ddd, MMM D YYYY").toString();
	document.getElementById('toDate').value = fromDate.time.format("ddd, MMM D YYYY").toString();
	document.getElementById('toDiv').className += ' is-dirty';
	toDate._init = fromDate.time;
	toDate._past = fromDate.time;
});

// Do this when to-date is selected
document.getElementById('toDate').addEventListener('onOk', function() {
	document.getElementById('toDiv').className += ' is-dirty';
	this.value = toDate.time.format("ddd, MMM D YYYY").toString();
});