<?php
// GET JSON BY: https://github.com/matteocontrini/comuni-json
$getComuni = file_get_contents('./db/db.json');
$comuniList = json_decode($getComuni, true);
