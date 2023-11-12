<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé</title>
    <link rel="icon" href="../assests/imgs/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    .bottom {
        position: fixed;
        bottom: 0;
       
    }
</style>

<script>
    $( document ).ready(function() {
        loadData ();    
    });


    function loadData () {
        // $.ajax({
        // type: 'GET',
        // url: '../controller/BookingTicketController.php?action=searchFlight',
        // dataType: 'json',
        // success: function (data, status) {
            
        // },
        // error: function (data) {
        
        // }
        // });

        // location.href = "../controller/BookingTicketController.php?action=searchFlight";
    }
</script>
<body>  
    <div class="container">
        <nav style="background-color: #99E0F8;">Thanh Header</nav>  

        <div>Thông tin chuyến bay</div>


        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <th></th>
                    <th>Thương gia</th>
                    <th>Thường</th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <ul>
                                <li>12g00 -> 13g00</li>
                                <li>19/12/2022</li>
                                <li>Airbug320</li>
                            </ul>
                        </td>
                        <td class="eco">3.690.000</td>
                        <td class="skyboss">1.469.000</td>
                    </tr>

                    <tr>
                        <td>
                            <ul>
                                <li>12g00 -> 13g00</li>
                                <li>19/12/2022</li>
                                <li>Airbug320</li>
                            </ul>
                        </td>
                        <td class="eco">3.690.000</td>
                        <td class="skyboss">1.469.000</td>
                    </tr>

                    <tr>
                        <td>
                            <ul>
                                <li>12g00 -> 13g00</li>
                                <li>19/12/2022</li>
                                <li>Airbug320</li>
                            </ul>
                        </td>
                        <td class="eco">3.690.000</td>
                        <td class="skyboss">1.469.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bottom">
            <button type = "button" class="btn btn-default btn-md">Quay lại</button>
            <button type = "button" class="btn btn-info btn-md">Tiếp tục</button>
        </div>

    </div>
</body>

</html>