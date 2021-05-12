<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test1</title>
    <script type="text/javascript" src="../lib/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <link rel="stylesheet" href="../Testing/style.css">
</head>
<body>

<!-- (A) HTML FORM -->

<button type="post" onclick=" ajaxcall();" value="Button">Button</button>

<!-- (B) JAVASCRIPT -->
<script>
    function ajaxcall() {
        // (B1) GET FORM DATA
        var data = new FormData();
        data.append('name', "Custom name");
        data.append('email', "Custom email");

        // (B2) AJAX CALL
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "test1Php.php");
        xhr.onload = function () {
            console.log(this.response);
        };
        xhr.send(data);
        return false;
    }
</script>


</body>

</html>
