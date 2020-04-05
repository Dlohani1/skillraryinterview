<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'email-smtp.eu-west-1.amazonaws.com',//'smtp.example.com', 
    'smtp_port' => 587,
    'smtp_user' => 'AKIAYIW6QO6GBPOUMZF7',
    'smtp_pass' => 'BBVGIp1TFl/W1B6RwWTHJUQSFbYsaE2XnTxnRMz37F16',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);