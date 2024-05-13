<?php
function readJsonFile($filename)
{
    if (file_exists($filename)) {
        $data = file_get_contents($filename);
        return json_decode($data);
    } else {
        return null;
    }
}
