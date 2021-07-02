var ListIcon = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layout-text-window-reverse" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
<path fill-rule="evenodd" d="M5 15V4H4v11h1zM.5 4h15V3H.5v1zM13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
</svg>`;

var GripIcon = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-ui-radios-grid" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M3.5 15a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm9-9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zM16 3.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zm-9 9a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zm5.5 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zm-9-11a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 2a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>`;

// function myFunction(x) {}

// var x = window.matchMedia("(max-width: 575.98px)");
// myFunction(x); // Call listener function at run time
// x.addListener(myFunction); // Attach listener function on state changes

$(function() {
    const posisiSidebarMenu = localStorage.getItem("posisiSidebarMenu");
    $(".sidebar")
        .slimScroll()
        .scrollTop(posisiSidebarMenu);

    var adjustSidebar = function() {
        $(".sidebar").slimScroll(
            {
                height:
                    document.documentElement.clientHeight -
                    $(".navbar-nav").outerHeight()
            },
            0
        );
    };

    adjustSidebar();

    // const MenuPosition = localStorage.getItem("collapser");
    // if (MenuPosition === "hideMenu") {
    //     $("#wrapper")
    //         .removeClass("showMenu")
    //         .addClass("hideMenu");
    // } else {
    //     $("#wrapper")
    //         .removeClass("hideMenu")
    //         .addClass("showMenu");
    // }

    $(".sideMenuToggler").on("click", function() {
        $("#wrapper").toggleClass(["hideMenu", "showMenu"]);
        if (!$("#wrapper").hasClass("showMenu")) {
            $(this).html(ListIcon);
            // localStorage.setItem("collapser", "hideMenu");
        } else {
            $(this).html(GripIcon);
            // localStorage.setItem("collapser", "showMenu");
        }
    });

    // if (!x.matches)
    // $(document).on('mouseover', '.selector', function() {
    $(".sideMenu").hover(
        function() {
            if (!$("#wrapper").hasClass("showMenu")) {
                $(".wrapper").removeClass("hideMenu");
            }
            // $(".text").css('color','#fff');
            adjustSidebar();
        },
        function() {
            if (!$("#wrapper").hasClass("showMenu")) {
                $(".wrapper").addClass("hideMenu");
            }
            // $(".text").css('color','#fff');
        }
    );
    
    $("#filterOpen").on("click", function() {
        $(".form-filter").toggleClass("form-filter-hide form-filter-show");
        $(".arrow").toggleClass("circle-up");
    });

    $("#filterOpen2").on("click", function() {
        $(".form-filter2").toggleClass("form-filter-hide2 form-filter-show2");
        $(".arrow2").toggleClass("circle-up2");
    });

    $(window).on("resize", function() {
        adjustSidebar();
    });

    $(".sideMenu .nav-item").on("click", function() {
        adjustSidebar();
    });

    $('[data-toggle="tooltip"]').tooltip();

    $(".modal").on("shown.bs.modal", function() {
        $(this)
            .find("[autofocus]")
            .focus();
    });

    // semua input profile di home readonly
    $("#homeProfile :input").attr("readonly", true);
    // remove semua tanda bintang merah di home form
    $("#homeProfile sup").remove();

    $("#showPelanggan :input").attr("readonly", true);
    $("#showPelanggan :input").attr("disabled", true);
    $("#showPelanggan :input").addClass("bgInputShow");
    $("#showPelanggan select").attr("disabled", true);
    $("#showPelanggan sup").remove();
    $("#showPelanggan #image").removeClass("bgInputShow");
    $("#showPelanggan button")
        .attr("disabled", false)
        .attr("readonly", false)
        .removeClass("bgInputShow");

    $(".sidebar")
        .slimScroll()
        .on("scroll", function() {
            var currentPosisiSidebarMenu = $(".sidebar")
                .slimScroll()
                .scrollTop();
            // console.log(posisiSidebarMenu);
            localStorage.setItem("posisiSidebarMenu", currentPosisiSidebarMenu);
        });

    // number hanya angka 0 sampai 9
    $('input.number').on('keypress', function(){
      return event.charCode >= 48 && event.charCode <= 57;
    });

    // money: 0 sampai 9, dan comma titik juga
    $('input.money').on('keypress', function(){
      return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46 || event.charCode == 44;
    });

    // Mengubah field money jadi pake koma dan titik
    $('.numeral_field').val(numeral($('.numeral_field').val()).format("0,00"));

    // Reset field money jadi hanya angka saja
    $("#saveProduct").on('click', function() {
      $('.numeral_field').val(numeral($('.numeral_field').val()).format("0"));
    })

    $.each($('input[type=text]'),function(){
      var str = $(this).val().replace('&amp;', '&');
      $(this).val(str);
    });
    
    // For password input, make it visible and not
    $("#seePassword").on('click', function(){
      $("#password").attr('type',  $("#password").attr('type') === 'password' ? 'text' : 'password');
      let open = "/bootstrap-icons.svg#eye-fill"
      let close = "/bootstrap-icons.svg#eye-slash-fill"
      $(this).children().attr('href',  
      $(this).children().attr('href') === close ? open : close);
    });

    // For password confirmation input, make it visible and not
    $("#seePasswordConfirmation").on('click', function(){
      $("#password_confirmation").attr('type',  $("#password_confirmation").attr('type') === 'password' ? 'text' : 'password');
      let open = "/bootstrap-icons.svg#eye-fill"
      let close = "/bootstrap-icons.svg#eye-slash-fill"
      $(this).children().attr('href',  
      $(this).children().attr('href') === close ? open : close);
    });

    $(function(){    
      $("#submitNewData, #submitEditData").on('click', function(){
        // jika masih ada input yang error/invalid
        if ($('input.is-invalid').length > 0) {
          alert('Masih ada input yang tidak valid, mohon untuk diperbaiki sebelum menyimpan data!');
          return false;
        } else {
          $("#ModalsLoading").modal("toggle");
        }
      });
    }); 
   
});
// <!-- End of $(function) -->

    // Date formatter
    function dateFormat(tanggal) {
      let date = new Date(tanggal);
      let year = date.getFullYear();
    
      let month = (1 + date.getMonth()).toString();
      month = month.length > 1 ? month : '0' + month;
    
      let day = date.getDate().toString();
      day = day.length > 1 ? day : '0' + day;
      
      return day + '/' + month + '/' + year;
    }

    // Centering POP UP
    const popupCenter = ({url, title, w, h}) => {
      // Fixes dual-screen position                             Most browsers      Firefox
      const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
      const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
  
      const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
  
      const systemZoom = width / window.screen.availWidth;
      const left = (width - w) / 2 / systemZoom + dualScreenLeft
      const top = (height - h) / 2 / systemZoom + dualScreenTop
      const newWindow = window.open(url, title, 
        `
        scrollbars=yes,
        width=${w / systemZoom}, 
        height=${h / systemZoom}, 
        top=${top}, 
        left=${left}
        `
      )
  
      if (window.focus) newWindow.focus();
  }