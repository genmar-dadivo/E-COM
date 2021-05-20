// ON LOAD
$(document).ready(function () {
  var loadpageid = Cookies.get('pageid');
  $('#bodyid').val(loadpageid);
  if  (loadpageid == 2) { loadpageid = 1; }
  loadcontent(loadpageid);
});
function loadcontent(pageid) {
  if(pageid == 1) { $("#page-content").load("content/parts/home.php"); }
  else if(pageid == 2) {
    if (window.location.href.indexOf("events")) {
      window.location.replace('content/parts/events.php');
    }
  }
  else if(pageid == 3) { $("#page-content").load("content/parts/announcements.php"); }
  else if(pageid == 4) { $("#page-content").load("content/parts/surveys.php"); }
  else if(pageid == 5) { $("#page-content").load("content/parts/contact.php"); }
  $('#bodyid').val(pageid);
  Cookies.set('pageid', pageid);
}
function eloadcontent(pageid) {
  if(pageid == 2) { location.reload(); }
  else { window.location.replace('../../'); }
  $('#bodyid').val(pageid);
  Cookies.set('pageid', pageid);
}
// CALENDAR
if (window.location.href.indexOf("events") > -1) {
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      themeSystem: 'standard',
      dayMaxEventRows: 3,
      events: [
        {
          id: 'a',
          title: 'my event A',
          start: '2021-05-05'
        },
        {
          id: 'b',
          title: 'my event B',
          start: '2021-05-05'
        },
        {
          id: 'c',
          title: 'my event C',
          start: '2021-05-05'
        },
        {
          id: 'd',
          title: 'my event D',
          start: '2021-05-05'
        },
      ]
    });
    calendar.render();
  });
}
// SCROLL
$(function() {
  $('body').overlayScrollbars({ });
});
// ACTIVE NAV
$('.nav-link.pointer').on('click', function() {
  $("li .navbar-nav").removeClass("rounded-top custom-bg-1 text-light");
});