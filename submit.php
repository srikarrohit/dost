<?php
/**
 * Short description for submit.php
 *
 * @package submit
 * @author root <root@students>
 * @version 0.1
 * @copyright (C) 2014 root <root@students>
 * @license MIT
 */

@session_start();
print_r($_SESSION);
print_r($_POST);
print_r($_GET);
print_r($_FILES);

?>

