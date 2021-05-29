// ON LOAD
$(document).ready(function () {
  $('.emailadd').on('blur', function(){
    if($(this).val() == '') {
      $(this).removeClass('text-lowercase');
      $(this).addClass('text-capitalize');
    }
    else {
      $(this).removeClass('text-capitalize');
      $(this).addClass('text-lowercase');
    }
  });
  var loadpageid = Cookies.get('pageid');
  var loadadminpageid = Cookies.get('adminpageid');
  $('#bodyid').val(loadpageid);
  if  (loadpageid == 2) { loadpageid = 1; }
  else if(!loadpageid) { loadpageid = 1; }
  if (window.location.href.indexOf("admin") != -1) {
    $('#sidebar').load('../../content/parts/sidenav.php');
    adminpage(loadadminpageid);
    //alert(loadadminpageid);
  }
  else { loadcontent(loadpageid); }
  if (window.location.href.indexOf("livechat.php?r=") > -1) { 
    //window.onbeforeunload = function () { return false; }
    var r = $('#r').val();
    var user = $('#user').val();
    $("#livechatcontent").load("../action/formlivechat.php?r=" + r + "&user=" + user, function() {
      $("#livechatcontent").animate({ scrollTop: $('#livechatcontent').prop("scrollHeight")}, 1000);
    });
    setInterval(function() {
      $("#livechatcontent").load("../action/formlivechat.php?r=" + r + "&user=" + user);
    }, 1000);
  }
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
$('.numberonly').keyup(function(event) { this.value = this.value.replace(/[^0-9.\.]/g,''); });
$('.letteronly').keyup(function(event) { this.value = this.value.replace(/[^A-Za-zÑñ \.]/g,''); });
$('.code').keyup(function(event) { this.value = this.value.replace(/[^A-Za-z0-9/\ \.]/g,''); });
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
          if(data == 'Logging In.') { location.reload(); }
          else {
            $('#btnLogin').prop("disabled", false);
            $("#btnLogin").html('Login');
          }
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
// LIVE CHAT
$('#formLivechat').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url: '../../content/action/formlivechat.php?lc',
      data: $('#formLivechat').serialize(),
      success: function(data) {
        $('#response').val('');
        $("#livechatcontent").animate({ scrollTop: $('#livechatcontent').prop("scrollHeight") }, 1000);
      }
  });
});