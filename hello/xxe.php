<?php
    echo "<title>XXE漏洞</title>";
    $xmlfile=file_get_contents("php://input");
    $dom=new DOMDocument();
    $dom->loadXML($xmlfile);
    $xml=simplexml_import_dom($dom);
    $xxe=$xml->xxe;
    $str="$xxe \n";
    echo $str;
?>