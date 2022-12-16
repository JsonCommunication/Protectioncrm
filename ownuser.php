<?php

// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Check if the IP address is on the list of blocked IPs
$blocked_ips = array('123.456.789.0', '987.654.321.0');
if (in_array($ip, $blocked_ips)) {
  // If the IP is on the list, block the user's access
  die('Your IP address has been blocked due to suspicious activity.');
}

// Continue with the rest of the script
// ...

?>
