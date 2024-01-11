<?php
require_once("connect.php");
    session_start();
    
    if(isset($_SESSION['adminData']))
    {
        $adminProfile = $_SESSION['adminData'];
    } else {
        header("Location: AdminLogin.php");
    }
?>
<?php include "../Header/adminheader.php"; ?>

<div class="wrapper">
</div>
<script src="../jquery.js"></script>
<script>
        var urlLink = "movieEditScroll.php";

        var flag = 0;
        $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: urlLink,
                data: {
                    'offset': 0,
                    'limit': 8
                },
                success: function(data) {
                    $('.wrapper').append(data);
                    flag += 8;
                }
            });
        });
        
        $(window).scroll(function () {

            if($(window).scrollTop()+1 >= $(document).height() - $(window).height())
            {
                $.ajax({
                type: "GET",
                url: urlLink,
                data: {
                    'offset': flag,
                    'limit': 8
                },
                success: function(data) {
                    $('.wrapper').append(data);
                    flag += 8;
                }
            });
            }
        })
    </script>
    
<?php include "../Header/adminfooter.php"; ?>