# PGP Mailer
This is a script for a contact form which is able to sent PGP encrypted emails. The script has currently an alpha status.

## Requirements
- PHP 5
- GnuPG

## Installation
1. Copy your public key file for example to 'public/assets/youremail.asc'.
2. Modify the config file in 'install/config.sample.php' and copy the file to 'src/config.php'.

## Important Notes
The encryption of the email is done on the server side. So you have to make sure that the connection between the client and server is secure. For example by using SSL.

## Used Projects
- Composer
- Silex
- Twig
- Twitter Boostrap
- GnuPG

## Demo
A demo is coming soon.
