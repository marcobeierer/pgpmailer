<?php
namespace Webguerilla\Config;

class PGPMailerConfig {

	protected $publicKeyFilepath;
	protected $encryptionKeyID;
	protected $messageReceiverAddress;

	protected $debug;
	protected $cache;

	public function __construct($publicKeyFilepath, $encryptionKeyID, $messageReceiverAddress) {

		$this->publicKeyFilepath = $publicKeyFilepath;
		$this->encryptionKeyID = $encryptionKeyID;
		$this->messageReceiverAddress = $messageReceiverAddress;

		$this->debugging = false;
		$this->caching = false;
	}

	public function getPublicKeyFilepath() {
		return $this->publicKeyFilepath;
	}

	public function getEncryptionKeyID() {
		return $this->encryptionKeyID;
	}

	public function getMessageReceiverAddress() {
		return $this->messageReceiverAddress;
	}

	public function isDebugging() {
		return $this->debugging;
	}

	public function isCaching() {
		return $this->caching;
	}

	public function setDebugging($debugging) {
		$this->debugging = $debugging;
	}

	public function setCaching($caching) {
		$this->caching = $caching;
	}
}
