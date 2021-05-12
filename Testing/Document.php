<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../lib/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <link rel="stylesheet" href="../Testing/style.css">
</head>
<body>
<!-- (A) HIDDEN HTML FORM -->
<form id="ninja" method="post" style="display:none;">
    <input type="hidden" id="numA" name="numA" required/>
    <input type="hidden" id="numB" name="numB" required/>
</form>

<!-- (B) JAVASCRIPT -->
<input type="button" value="Go!" onclick="go()"/>
<script>
    function go () {
        document.getElementById("numA").value = 123;
        document.getElementById("numB").value = 456;
        document.getElementById("ninja").submit();
    }
</script>

<!-- (C) RESULTS -->
<?php
if (isset($_POST['numA'])) { require "testPhp.php"; }
?>
</body>

</html>


<?php
//
//        $doc = new DOMDocument();
//
//        $doc->loadHTMLFile("Document.php");
//
//        $getName = $doc->getElementById('testDiv')->textContent;
//        $names = explode(",", $getName);
//        $fName = $names[0];
//        $lName = $names[1];
//
//        echo "PHP echo".$fName."-".$lName;
//
//
//
//
//
//
//
//?><!--;-->