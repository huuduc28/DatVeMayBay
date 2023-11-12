<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/loading.css">
  <title>Đăng nhập</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      opacity: 0.9;
      background-image: url(../assests/imgs/background-signup.jfif);
      background-size: cover;
    }

    .row {
      background-color: #CFF3FF;
      ;
      border-radius: 30px;
      box-shadow: 10px 10px 20px #193c42;
    }

    .img-fluid {
      border-top-right-radius: 30px;
      border-bottom-right-radius: 30px;
    }

    .img-logo {
      width: 10rem;
      height: auto;
    }

    .btn {
      background: #0492A8;
      color: white;
      font-weight: bold;
      font-family: Roboto, sans-serif;
    }

    .form-control {
      padding: 0.7rem 0.75rem;
      border: 1px solid #0492A8;
    }

    .form-control::placeholder {
      color: #036a79;
    }

    .eye i {
      cursor: pointer;
      color: #036a79;
      position: absolute;
      margin-top: -2rem;
      right: 1rem;
    }
  </style>
  <script>

    $(window).bind("load", function () {
      jQuery("#status").fadeOut();
      jQuery("#loader").fadeOut();
    });

    $(document).ready(function () {
      $('.eye').click(function () {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
          $(this).prev().attr('type', 'text');
        } else {
          $(this).prev().attr('type', 'password');
        }
      });
    });

    function checkSignin() {
      var phone = $('#phone').val();
      var password = $('#password').val();
      var temp = "phone=" + phone + "&password=" + password;
      // window.alert(temp);
      $.ajax({
        type: 'POST',
        url: '../controller/AccountController.php',
        dataType: 'text',
        data: temp,
        success: function (data, status) {
          if (data == 'true') {
            $('#submit').click();
          } else if (data == '0') {
            $('#submit2').click();
          } else {
            document.querySelector('.error').style.display = 'block';
          }
          // e.preventDefault(); 
        },
        error: function (data) {
          $('#modalError').modal('show');
        }
      });
    }
  </script>
</head>

<body>
<div id='status'></div>
  <div id='loader'></div>
  <form action="home.php" style="display: none">
    <input type="submit" id="submit">
  </form>
  <form action="flightManager.php" style="display: none">
    <input type="submit" id="submit2">
  </form>
  <div class="Form mt-5">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-6 px-5 pt-5">
          <img src="../assests/imgs/logo.png" class="img-logo mb-5" style="margin-left: auto; margin-right: auto;">
          <form method="post">
            <div class="form-row">
              <div class="col-lg-10 mx-auto">
                <input id="phone" type="text" name="phone" class="form-control" placeholder="Số điện thoại">
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-10 mx-auto mt-3">
                <input id="password" type="password" name="password" class="form-control" placeholder="Mật khẩu">
                <div class="eye text-right">
                  <i class="far fa-eye"></i>
                </div>
              </div>
            </div>
            <div class="form-row mt-2 ml-5 text-danger error" style="display: none;">
              <p>Tên đăng nhập hoặc mật khẩu không đúng.</p>
            </div>
            <div class="form-row ">
              <div class="col-lg-10 mx-auto mt-3">
                <button onclick="checkSignin()" name="submit" class="button btn btn-block" value="submit"
                  type="button">Đăng nhập</button>
              </div>
            </div>
            <p class="text-right mr-5 mt-2"><a href="#">Quên mật khẩu?</a></p>
            <p class="text-center">Bạn chưa có tài khoản? <a href="signup.php">Đăng ký ngay</a></p>
          </form>
        </div>
        <div class="col-lg-6">
          <img src="../assests/imgs/posterlogin.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- <div id='modalError' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title' style='font-weight: bold; color: rgb(233, 81, 81);'>Error</h4>
        </div>
        <div class='modal-body'>
          <p>Tên đăng nhập hoặc mật khẩu không đúng.</p>
        </div>
        <div class='modal-footer'>
          <button id='close' type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div> -->
</body>

</html>