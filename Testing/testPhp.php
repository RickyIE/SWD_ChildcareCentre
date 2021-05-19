<?php
if (isset($_GET['BAD'])) {
    $total = $_GET['numA'];
    print_r($_POST);
    echo "if"."alert($total);";
} else {
    $total = $_GET['numA'];
    print_r($total);
    print_r("Post is ".$_POST);
    print_r($_POST);
    echo "else";

}
