$(function() {
  $("#user_name").on('change', function(){
    let el = $(this);
    el.val() != '' ? valid(el) : invalid(el);      
  });

  $("#cust_name").on('change', function(){
    let el = $(this);
    el.val() != '' ? valid(el) : invalid(el);      
  });

  $("#email").on('change', function(){
    let el = $(this);
    validateEmail(el);
  });

  $("#no_hp").on('change', function(){
    let el = $(this);
    validateNoHP(el);
  });

  $("#cust_identity_no").on('change', function(){
    let el = $(this);
    validateIdentity(el);
  });

  $("#password, #password_confirmation").on('change', function() {
    let pass = $("#password");
    let confirmation = $("#password_confirmation");
    validatePasswords(pass,confirmation);
  })
});

  function errorMsg(el, msg) {    
    el.children("span").html(msg).addClass("text-danger");
  }

  function valid(el) {
    el.addClass('is-valid').removeClass('is-invalid');
  }

  function invalid(el) {
    el.addClass('is-invalid').removeClass('is-valid');
  }

  function hide(el) {
    el.attr('hidden', true);
  }

  function unhide(el) {
    el.attr('hidden', false);
  }

  function password_unmatched(confirmation, msg) {
    unhide($("#password_error"));
    invalid($(confirmation));
    errorMsg($("#password_error"),msg)
    confirmation.focus();
  }

  function password_matched(confirmation) {
    valid(confirmation);
    hide($("#password_error"));    
  }

  function validation_bad(el, error_el ,msg) {
    unhide(error_el);
    invalid(el);
    errorMsg(error_el,msg);
    el.focus();
  }

  function validation_good(el, error_el) {
    valid(el);
    hide(error_el);
  }

  function validatePasswords(pass,confirmation) {

    // Length Check
    if ($(pass).val().length < 8)
    {
      validation_bad(pass,
        $("#password_error"), 
        'Password minimal 8 karakter!.')
      $(confirmation).attr('disabled', true);
    } else {
      validation_good(pass, $("#password_error"));
      $(confirmation).attr('disabled', false);

        // Matching Check
        ($(pass).val() != $(confirmation).val()) 
        ? password_unmatched(confirmation,
            'Konfirmasi password harus sama dengan password Anda.')
        : password_matched(confirmation);
 
    }
    
  }

  function validateEmail(el) {    
    let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if (el.val() == ''){
        validation_bad(el,
          $("#email_error"),
          'Email tidak boleh kosong.');
      }else if(!el.val().match(mailformat))
      {
        validation_bad(el,
          $("#email_error"),
        'Anda memasukkan alamat email yang tidak valid.');
        hide($("#email_progress"));       
      }else if (el.val() == window.email){
        validation_good(el, $("#email_error"));
      }else {
        unhide($("#email_progress"));
        axios.get('/api/email')
        .then((response) => {
          let emails = [];
          for (let i = 0; i < response.data.data.length; i++) {          
            emails.push(response.data.data[i].email);
          }
          if (emails.includes(el.val())) {           
            validation_bad(el,
              $("#email_error"),
              'Email ini sudah diregistrasi, silahkan input email yang lain.');
          } else {
            validation_good(el, $("#email_error"));
          }
          hide($("#email_progress"));
        })
        .catch(function(error) {
          alert(error);
        });
      }
  }

  function validateNoHP(el) {

    let regex = /^[0-9]/;

    if (el.val() == ''){
      validation_bad(el,$("#nohp_error"),
        'Nomor HP tidak boleh kosong.');
    }else if (!regex.test(el.val())){
      validation_bad(el,$("#nohp_error"),
        'Mohon diisi hanya dengan angka/nomor.');
    }else if (el.val() == window.no_hp){
      validation_good(el, $("#nohp_error"));
    }else {
      unhide($("#nohp_progress"));
      axios.get('/api/phone')
      .then((response) => {
        let nohp = [];
        for (let i = 0; i < response.data.data.length; i++) {          
          nohp.push(response.data.data[i].no_hp);
        }
        if (nohp.includes(Number(el.val()))) {
          validation_bad(el,
            $("#nohp_error"),
            'Nomor HP ini sudah diregistrasi, silahkan input nomor yang lain.');
        } else {
          validation_good(el, $("#nohp_error"));    
        }
        hide($("#nohp_progress"));
      })
      .catch(function(error) {
        alert(error);
      });
    }     
  }

  function validateIdentity(el) {
    
    let regex = /^[0-9]/;

    if (el.val() == ''){
      validation_bad(el,$("#identity_error"),
        'Nomor identitas tidak boleh kosong.');
    }else if (!regex.test(el.val())){
      validation_bad(el,$("#identity_error"),
        'Mohon diisi hanya dengan angka/nomor.');
    }else if (el.val() == window.cust_identity_no){
      validation_good(el, $("#identity_error"));
    }else {
      unhide($("#identity_progress"));
      axios.get('/api/identity')
      .then((response) => {
        let nohp = [];
        for (let i = 0; i < response.data.data.length; i++) {          
          nohp.push(response.data.data[i].cust_identity_no);
        }      
        if (nohp.includes(Number(el.val()))) {
          validation_bad(el,
            $("#identity_error"),
            'Nomor identitas ini sudah diregistrasi, silahkan input nomor yang lain.');
        } else {
          validation_good(el, $("#identity_error"));
        }    
        hide($("#identity_progress"));
      })
      .catch(function(error) {
        alert(error);
      });
    }
  }