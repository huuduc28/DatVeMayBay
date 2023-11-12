<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="../assests/imgs/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/signup.css">
  <title>Đăng ký</title>
  <script src="../js/signup.js"></script>
</head>

<body>
  <div id='status'></div>
  <div id='loader'></div>
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    Xác nhận mã OTP thành công.
  </div>
  <div class="Form mt-5">
    <div class="container">
      <div class="row no-gutters" style="box-shadow: 0px 12px 18px rgb(0 0 0 / 6%);">
        <div id="content" class="col-lg-6 px-5 pt-5">
          <a href="../index.php" style="margin-left: auto; margin-right: auto;"><img src="../assests/imgs/logo.png" class="img-logo mb-3"></a>

          <form id="formSignup">
            <div class="form-row">
              <div class="col-lg-10 col-md-9 col-sm-9">
                <input id="name" type="text" class="form-control my-2 p-2" placeholder="Họ tên"
                  onkeypress="revNameMessErr()" onclick="revNameMessErr()">
                <p id="error-name" class="error-mess"> *Vui lòng nhập họ tên</p>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-10 col-md-9 col-sm-9">
                <input id="email" type="email" class="form-control my-2 p-2" placeholder="Email"
                  onkeypress="revEmailMessErr()" onclick="revEmailMessErr()">
                <p id="error-email" class="error-mess"> *Vui lòng nhập email</p>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-10 col-md-9 col-sm-9">
                <input id="phone" type="text" onkeypress="return checkNumber(event)" class="form-control my-2 p-2"
                  placeholder="Số điện thoại">
                <p id="duplPhone" class="error-mess"> *Số điện thoại bị trùng. Vui lòng thử lại</p>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-10 col-md-9 col-sm-9">
                <button id="btnSignUp" type="button" class="btn btn-block mt-2" onclick="checkValid ()">Đăng ký</button>
              </div>
            </div>
            <p class="text-center mt-3">Bạn đã có tài khoản? <a href="../view/signin.php">Đăng nhập ngay</a></p>
          </form>

          <div id="progress" class="progress mb-3 mt-2" style="width: 70%; margin:auto">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="33.3"
              aria-valuemin="0" aria-valuemax="100" style="width:33.3%">
              Bước 1/3
            </div>
          </div>

        </div>
        <div class="col-lg-6">
          <img src="../assests/imgs/posterlogin.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>

  <div id='modalError' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title' style='font-weight: bold; color: rgb(233, 81, 81);'>Error</h4>
        </div>
        <div class='modal-body'>
          <p>Đã xảy ra lỗi. Vui lòng thử lại hoặc liên hệ với quản trị viên</p>
        </div>
        <div class='modal-footer'>
          <button id='close' type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>