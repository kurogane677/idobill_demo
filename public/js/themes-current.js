$(function() {
  var mainBGColor = $('body').attr("data-color");
  var mainTextColor = $('.blockquote-footer').attr("data-color");
  var navbarBGColor = $('.navbar').attr("data-color");
  var navbarTextColor = $('.navbar button').attr("data-color");
  var sidebarBGColor = $('.sideMenu').attr("data-color");
  var sidebarTextColor = $('.sideMenu .sidebar').attr("data-color");
  var menuBGColor = $('.card').attr("data-color");
  var menuTextColor = $('.card').attr("data-text");

  // var navbarTextColor_label = $('.navbar #DarkModeLabel').attr("data-color");
  // var navbarTextColor_title = $('.navbar .navbarTitle').attr("data-color");
  // var navbarTextColor_username = $('.navbar .navbarUserName').attr("data-color");
  // var navbarTextColor_usergroup = $('.navbar .navbarUserGroup').attr("data-color");
  // var sidebarTextColor_a = $('.sideMenu a').attr("data-color");
  // var sidebarTextColor_span = $('.sideMenu span').attr("data-color");

  localStorage.setItem("mainBGColor",mainBGColor);
  localStorage.setItem("mainTextColor",mainTextColor);
  localStorage.setItem("navbarBGColor",navbarBGColor);
  localStorage.setItem("navbarTextColor",navbarTextColor);
  localStorage.setItem("sidebarBGColor",sidebarBGColor);
  localStorage.setItem("sidebarTextColor",sidebarTextColor);
  localStorage.setItem("menuBGColor",menuBGColor);
  localStorage.setItem("menuTextColor",menuTextColor);

});

