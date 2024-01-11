<?php include "../header/header.php"; ?>

<br><br><br><br><br><br><br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <input type="text" id="name" name="search" placeholder="Search....">
    <select id="list" name="sort">
        <option value="name">Name</option>
        <option value="upload_date_newest">Upload Date (Newest)</option>
        <option value="upload_date_oldest">Upload Date (Oldest)</option>
        <option value="release_date_newest">Release Date (Newest)</option>
        <option value="release_date_oldest">Release Date (Oldest)</option>
    </select>
    <button type="submit">Go</button>
</form>
<div class="wrapper">
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function getQuery(query) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.get(query)
    }

    let q = getQuery('search');
    let sort = getQuery('sort');

    if (q != null)
        var urlLink = "moviesListBody.php?search=" + q + "&sort=" + sort;
    else
        var urlLink = "moviesListBody.php?sort=" + sort;

    var flag = 0;
    $(document).ready(function() {
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

    $(window).scroll(function() {

        if ($(window).scrollTop() + 1 >= $(document).height() - $(window).height()) {
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

<?php include "../header/footer.php"; ?>