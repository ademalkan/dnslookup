<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="get">
        <h1>DNS</h1>
        <input type="text" placeholder="DNS" name="dns">
        <input type="submit" value="Ara" name="">
    </form>
    <br>
</body>
</html>

<?php
if (isset($_GET['dns'])) {
        $dns = $_GET['dns'];
    $dnsRecord = dns_get_record($dns, DNS_A + DNS_NS);
    foreach ($dnsRecord as $dnsArray) {
        $dnsArray = json_decode(json_encode($dnsArray));
        echo "<div>";
        echo "Host : ",$dnsArray->host;
        echo "<br>";   
        echo "Class : ",$dnsArray->class;
        echo "<br>";   
        echo "TTL : ",$dnsArray->ttl;
        echo "<br>";   
        echo "Type : ",$dnsArray->type;
        echo "<br>";
        if (isset($dnsArray->ip)) {
            echo "IP : ",$dnsArray->ip;
            echo "<br>";
        }   
        echo "<br>";
        echo "</div>";
}}
?>

<style type="text/css">

    body {
        background-color: black;

    }
    h1 {
        color: red;
    }
    form {
        margin: 2vh auto;
        width: 20%;
        text-align: center;
    }
    div{
        color: red;
        width: 12%;
        margin: 0 auto;
        border-top: 1px solid red;
    }
</style>