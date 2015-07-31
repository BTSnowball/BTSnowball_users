<?php
function isEmail($email) {
if ((strpos($email, '..') !== false) or (!preg_match('/^(.+)@([^@]+)$/', $email, $matches))){
    return false;
}
$ejg=strstr($email, '.');
if(!$ejg || trim($ejg)=='.'){
	return false;
}
$localPart = $matches[1];
$hostname = $matches[2];
if ((strlen($localPart) > 64) || (strlen($hostname) > 255))
return false;

$atext = 'a-zA-Z0-9\x21\x23\x24\x25\x26\x27\x2a\x2b\x2d\x2f\x3d\x3f\x5e\x5f\x60\x7b\x7c\x7d\x7e';
if (preg_match('/^[' . $atext . ']+(\x2e+[' . $atext . ']+)*$/', $localPart)) {
return true;
}
$noWsCtl    = '\x01-\x08\x0b\x0c\x0e-\x1f\x7f';
$qtext      = $noWsCtl . '\x21\x23-\x5b\x5d-\x7e';
$ws         = '\x20\x09';
if (preg_match('/^\x22([' . $ws . $qtext . '])*[$ws]?\x22$/', $localPart)) {
return true;
}
return false;
}