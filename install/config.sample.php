<?php
use MBDev\Config\PGPMailerConfig;

$publicKeyFilepath = PATH_PUBLIC . ''; // path to the public key file (relative from /public)
$encryptionKeyID = ''; // id of the key used for encryption
$messageReceiverAddress = ''; // email address of the receiver of the contact form

$config = new PGPMailerConfig($publicKeyFilepath, $encryptionKeyID, $messageReceiverAddress);

$config->setDebugging(true);
$config->setCaching(false);
?>
