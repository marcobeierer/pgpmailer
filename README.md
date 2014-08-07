# pgpmailer

This is a script for a contact form which is able to sent PGP encrypted emails. The content of the submission is encrypted to a public key and is done on the server. It is strongly recommended that you only use pgpmailer with a secure connection such as SSL. If you use pgpmailer on an unsecure connection there is a possibility your private data can be intercepted and modified before it is encrypted.

## Requirements
- PHP 5
- GnuPG
- composer

## Install

Via Composer

``` json
{
    "require": {
        "league/pgpmailer": "~1.0"
    }
}
```

## Usage

pgpmailer requires having a PGP key and exporting an ASCII-armored public key.

1. Copy an ASCII-armored public key to 'public/assets/' For example: 'public/assets/0xBADB0B1337.asc'.
2. Modify the config file in 'install/config.sample.php' where it says $publicKeyFilepath. For example: $publicKeyFilepath = PATH_PUBLIC . '/assets/0xBADB0B1337.asc'
4. Move the file 'install/config.sample.php' to 'src/config.php'.
3. Run ./composer.phar update

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/webguerilla/pgpmailer/blob/master/CONTRIBUTING.md) for details.

## Credits

- [Marco Beierer](https://github.com/webguerilla)
- [All Contributors](https://github.com/thephpleague/pgpmailer/contributors)

## License

GNU GENERAL PUBLIC LICENSE Version 3. Please see [License File](https://github.com/webguerilla/pgpmailer/blob/master/LICENSE) for more information.
