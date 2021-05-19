// ON LOAD
$(document).ready(function () {
  var loadpageid = Cookies.get('pageid');
  $('#bodyid').val(loadpageid);
  if(!loadpageid) { $("#page-content").load("content/parts/home.php"); }
  else { loadcontent(loadpageid); }
});
function loadcontent(pageid) {
  if(pageid == 1) { $("#page-content").load("content/parts/home.php"); }
  else if(pageid == 2) { $("#page-content").load("content/parts/events.php"); }
  else if(pageid == 3) { $("#page-content").load("content/parts/announcements.php"); }
  else if(pageid == 4) { $("#page-content").load("content/parts/surveys.php"); }
  else if(pageid == 5) { $("#page-content").load("content/parts/contact.php"); }
  $('#bodyid').val(pageid);
  Cookies.set('pageid', pageid);
} 