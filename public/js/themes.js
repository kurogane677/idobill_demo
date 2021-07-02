
$(function() {
  // var color = '';
  function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
      parts[i] = parseInt(parts[i]).toString(16);
      if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join('');
  }

    $('#mainBGColorInput').on('click', function () {
      var bool = $('#mainBGColorColorboard').prop('hidden');
      $('#mainBGColorColorboard').prop('hidden', ! bool);
    });

    $('#mainTextColorInput').on('click', function () {
      var bool = $('#mainTextColorColorboard').prop('hidden');
      $('#mainTextColorColorboard').prop('hidden', ! bool);
    });

    $('#navbarBGColorInput').on('click', function () {
      var bool = $('#navbarBGColorColorboard').prop('hidden');
      $('#navbarBGColorColorboard').prop('hidden', ! bool);
    });

    $('#navbarTextColorInput').on('click', function () {
      var bool = $('#navbarTextColorColorboard').prop('hidden');
      $('#navbarTextColorColorboard').prop('hidden', ! bool);
    });

    $('#sidebarBGColorInput').on('click', function () {
      var bool = $('#sidebarBGColorColorboard').prop('hidden');
      $('#sidebarBGColorColorboard').prop('hidden', ! bool);
    });

    $('#sidebarTextColorInput').on('click', function () {
      var bool = $('#sidebarTextColorColorboard').prop('hidden');
      $('#sidebarTextColorColorboard').prop('hidden', ! bool);
    });
    
    $('#menuBGColorInput').on('click', function () {
      var bool = $('#menuBGColorColorboard').prop('hidden');
      $('#menuBGColorColorboard').prop('hidden', ! bool);
    });

    $('#menuTextColorInput').on('click', function () {
      var bool = $('#menuTextColorColorboard').prop('hidden');
      $('#menuTextColorColorboard').prop('hidden', ! bool);
    });
    
    $('.colors').on('click', function () {
      var x = $(this).css( "background-color" );
      hexc(x);
      
      var colBoard = $(this).parent().prop('id');
      var colInput = $(this).parent().parent().parent().next().children().eq(1).children().eq(0).prop('id');
      var colChosen = $(this).parent().parent().parent().next().children().eq(1).children().eq(1).prop('id');

      $('#'+colInput).val(color);
      $('#'+colChosen).css("background-color",color);
      var bool = $('#'+colBoard).prop('hidden');
      $('#'+colBoard).prop('hidden', ! bool);

      switch(colInput) {
        case 'mainBGColorInput':
          $('body, footer').css("background-color",color);
          break;
        case 'mainTextColorInput':
          $('.blockquote-footer').css("color",color);
          break;
        case 'navbarBGColorInput':
          $('.navbar').css("background-color",color);
          break;
        case 'navbarTextColorInput':
          $('.navbar')
          .find('button, label, .navbarTitle, .navbarUserName, .navbarUserGroup')
          .css("color",color);
          break;
        case 'sidebarBGColorInput':
          $('.sideMenu').css("background-color",color);
          break;
        case 'sidebarTextColorInput':
          $('.sideMenu').find('.sidebar, a, span').css("color",color);
          break;
        case 'menuBGColorInput':
          $('.card').css("background-color",color);
          break;
        case 'menuTextColorInput':
          $('.card').css("color",color);
          break;
        default:
          // code block
      }
    })

    const darkMode = localStorage.getItem("DarkMode");
    if (darkMode === "on") {
      $("#dark_mode").attr('checked', true)
      let dark = '#343a40'
      let white = '#ffffff'
      
      $('body, footer').css("background-color",dark);
      $('.blockquote-footer').css("color",white);
      $('.navbar').css("background-color",dark);
      $('.navbar')
      .find('button, label, .navbarTitle, .navbarUserName, .navbarUserGroup')
      .css("color",white);
      $('.sideMenu').css("background-color",dark);
      $('.sideMenu').find('.sidebar, a, span').css("color",white);
      $('.card').css("background-color",dark);
      $('.card').css("color",white);
      $('#userNavbarDetail').css("background-color",dark);
      $('#userNavbarDetail').css("color",white);
      $('table').css("color",white);
      
      // $("#dark_mode").attr('checked', true)
      // $('body, footer').css("background-color",'#343a40');
      // $('.blockquote-footer').css("color",'#ffffff');
      // $('.navbar').css("background-color",'#343a40');
      // $('.navbar')
      // .find('button, label, .navbarTitle, .navbarUserName, .navbarUserGroup')
      // .css("color",'#ffffff');
      // $('.sideMenu').css("background-color",'#343a40');
      // $('.sideMenu').find('.sidebar, a, span').css("color",'#ffffff');
      // $('.card').css("background-color",'#343a40');
      // $('.card').css("color",'#ffffff');
    };

    // $(".sideMenu .nav-item").on({
    //     mouseenter: function () {
    //       $(this).find('span').css('color','#fff');
    //     },
    //     mouseleave: function () {
    //     var curColor = $(this).find('span').attr("data-color");
    //     $(this).find('span').css('color',curColor);
    //   }
    // });

    // if ($(".sideMenu .nav-item a").hasClass('activeMenu'))

});

