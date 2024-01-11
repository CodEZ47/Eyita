<?php include "../Header/adminheader.php"; ?>

<br><br><br><br><br><br><br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="text" id="name" name="search" placeholder="Search....">
        <!-- <button type="submit" name="submit">Search</button> -->
    </form>
<div class="wrapper">
</div>

<script>
    function getQuery(query)
        {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            return urlParams.get(query)
        }

        let q = getQuery('search');
        if(q != null)
            var urlLink = "MovieScroll.php?search="+q;
        else
            var urlLink = "MovieScroll.php";

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