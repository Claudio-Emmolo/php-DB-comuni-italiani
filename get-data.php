<?php
// GET API BY: https://github.com/matteocontrini/comuni-json
$getComuni = file_get_contents('https://raw.githubusercontent.com/matteocontrini/comuni-json/master/comuni.json');
$comuniList = json_decode($getComuni, true);
