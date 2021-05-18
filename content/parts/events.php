<link href="../../assets/js/fc/main.min.css" rel="stylesheet">
<script src="../../assets/js/fc/main.min.js"></script>
<div id='calendar'></div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
  });
  calendar.render();
});
</script>