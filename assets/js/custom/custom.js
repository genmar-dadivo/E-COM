// ON LOAD
$(document).ready(function () {
  var loadpageid = Cookies.get('pageid');
  var loadadminpageid = Cookies.get('adminpageid');
  $('#sidebar').load('../../content/parts/sidenav.php');
  $('#bodyid').val(loadpageid);
  if  (loadpageid == 2) { loadpageid = 1; }
  else if(!loadpageid) { loadpageid = 1; }
  if (window.location.href.indexOf("admin") != -1) {
    adminpage(loadadminpageid);
    //alert(loadadminpageid);
  }
  else { loadcontent(loadpageid); }
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
  else if(pageid == 6) { $("#page-content").load("content/parts/profile.php"); }
  else if(pageid == 7) { window.location.replace("content/parts/admin.php"); }
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
      events: {
        url: '../../content/action/getEvent.php',
        failure: function() {
        }
      },
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
// LOGIN
function login() {
  $('#login').appendTo("body");
  $('#login').modal('show');
  $("#login").on("shown.bs.modal", function(){
    $('.modal-backdrop').css('opacity', '0.7');
  });
}
$('.message a').click(function(){
  $('.intlogin').animate({height: "toggle", opacity: "toggle"}, "slow");
});
$('#formLogin').on('submit', function(e) {
  $('#btnLogin').prop("disabled", true);
  $("#btnLogin").html('Loading ...');
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url: 'content/action/formlogin.php',
      data: $('#formLogin').serialize(),
      success: function(data) {
        $.notify({
          message: data,
        },
        {
          type: "minimalist",
          allow_dismiss: false,
          z_index: 9999,
          placement: {
            from: "bottom",
            align: "center"
          },
          animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
          },
          onClosed: setTimeout(function() {
            location.reload();
          }, 3000),
          template: 
          '<div data-notify="container" class="col-xs-6 col-sm-3 alert alert-{0}" role="alert">' +
            '<span data-notify="message">{2}</span>' +
          '</div>'
        });
      }
  });
});
// REGISTER
$('#formRegister').on('submit', function(e) {
  $('#btnCreate').prop("disabled", true);
  $("#btnCreate").html('Loading ...');
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url: 'content/action/formregister.php',
      data: $('#formRegister').serialize(),
      success: function(data) {
          Push.create("E-COM", {
              body: data,
              onClick: function() {
                  window.focus();
                  this.close();
              },
              onClose: function() {
                window.location.href = '';
                $('#btnCreate').prop("disabled", true);
                $("#btnCreate").html('Create');
            },
          });
      }
  });
});
// LOGOUT
function logout(){
  $.ajax({
    type: 'POST',
    url: 'content/action/formlogout.php',
    success: function(data) {
      $.notify({
        message: data,
      },
      {
        type: "minimalist",
        allow_dismiss: false,
        z_index: 9999,
        placement: {
          from: "bottom",
          align: "center"
        },
        onClosed: setTimeout(function() {
          location.reload();
        }, 3000),
        animate: {
          enter: 'animated fadeInDown',
          exit: 'animated fadeOutUp'
        },
        template: 
          '<div data-notify="container" class="col-xs-6 col-sm-3 alert alert-{0}" role="alert">' +
            '<span data-notify="message">{2}</span>' +
          '</div>'
      });
    }
  });
}
// SIDENAV
$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if ($(this).parent().hasClass("active")) {
     $(".sidebar-dropdown").removeClass("active");
     $(this).parent().removeClass("active");
  }
  else {
     $(".sidebar-dropdown").removeClass("active");
     $(this).next(".sidebar-submenu").slideDown(200);
     $(this).parent().addClass("active");
  }
});
$("#close-sidebar").click(function() { $(".page-wrapper").removeClass("toggled");});
$("#show-sidebar").click(function() { $(".page-wrapper").addClass("toggled"); });
$("#page-content").click(function(e) {
  if (e.ctrlKey) {
     if ($(".page-wrapper").hasClass("toggled")) { $(".page-wrapper").removeClass("toggled"); }
     else { $(".page-wrapper").addClass("toggled"); }
  }
});
// ADMIN PAGE
function adminpage(pageid) {
  $('#adminbodyid').val(pageid);
  Cookies.set('adminpageid', pageid);
  if (pageid == 1) { $('#page-content').load('../../content/parts/home-admin.php'); }
  else if (pageid == 2) { $('#page-content').load('../../content/parts/events-admin.php'); }
  else if (pageid == 3) { $('#page-content').load('../../content/parts/announcement-admin.php'); }
  else if (pageid == 4) { $('#page-content').load('../../content/parts/surveys-admin.php'); }
}