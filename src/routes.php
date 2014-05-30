<?php
use Symfony\Component\HttpFoundation\Request;
use MBSecurity\Form\ContactForm;

$form = $app['form.factory']->create(new ContactForm());

$app->get('/', function () use ($app, $form) {
	return $app['twig']->render('homepage.html', array(
		'form' => $form->createView()
	));
});

$app->post('/', function (Request $request) use ($app, $form, $config) {

	$form->handleRequest($request);

	if ($form->isValid()) {

		$data = $form->getData();

		$gpg = new Crypt_GPG(array('homedir' => PATH_GPG));
		$gpg->importKeyFile($config->publicKeyFilepath);
		$gpg->addEncryptKey('62EA8B00');

		$message = 'Content-Type: multipart/mixed; boundary="37ATkjK6nO8wWoV1MT91OAQPlh4P6le0q"' . "\r\n" .
			"\r\n" .
			'--37ATkjK6nO8wWoV1MT91OAQPlh4P6le0q' . "\r\n" . // TODO chose random boundaries
			'Content-Type: text/plain; charset=UTF-8' . "\r\n" .
			'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
			"\r\n" .
			$data['message'] . "\r\n" .
			"\r\n" .
			'--37ATkjK6nO8wWoV1MT91OAQPlh4P6le0q--' . "\r\n";

		$encryptedMessage = $gpg->encrypt($message);

		$fullEncryptedMessage = 
			'This is an OpenPGP/MIME encrypted message (RFC 2440 and 3156)' . "\r\n" .
			'--24i8m5cu37hapwm904t8v' . "\r\n" .
			'Content-Type: application/pgp-encrypted' . "\r\n" .
			'Content-Description: PGP/MIME version identification' . "\r\n" .
			"\r\n" .
			'Version: 1' . "\r\n" .
			"\r\n" .
			'--24i8m5cu37hapwm904t8v' . "\r\n" .
			'Content-Type: application/octet-stream; name="encrypted.asc"' . "\r\n" .
			'Content-Description: OpenPGP encrypted message' . "\r\n" .
			'Content-Disposition: inline; filename="encrypted.asc"' . "\r\n" .
			"\r\n" .
			$encryptedMessage .
			"\r\n" .
			'--24i8m5cu37hapwm904t8v--';
					 
		$headers = 'From: ' . $data['name'] . ' <' . $data['email'] . '>' . "\r\n" .
			'Content-Type: multipart/encrypted;' . "\r\n" .
			' protocol="application/pgp-encrypted";' . "\r\n" .
			' boundary="24i8m5cu37hapwm904t8v"' . "\r\n"; // TODO randomize boundary

		if (mail($config->messageReceiverAddress, $data['subject'], $fullEncryptedMessage, $headers)) {
			return $app['twig']->render('confirm.html');
		}
	}

	return $app['twig']->render('error.html');
});

?>
