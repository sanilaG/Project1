<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5.
 * https://github.com/PHPMailer/PHPMailer
 *
 * @package PHPMailer
 * @author PHPMailer
 */

namespace PHPMailer\PHPMailer;

/**
 * Simple email sending class with no dependencies.
 * PHP Version 5.5.
 *
 * @package PHPMailer
 */
class SMTP
{
    const VERSION = '6.5.1';
    const CRLF = "\r\n";
    const DEFAULT_SMTP_PORT = 25;
    const DEFAULT_TIMEOUT = 300;

    /**
     * The PHPMailer Version number.
     * @var string
     */
    public $Version = self::VERSION;

    /**
     * SMTP server port number.
     * @var int
     */
    public $smtp_port = self::DEFAULT_SMTP_PORT;

    /**
     * SMTP timeout in seconds.
     * @var int
     */
    public $Timeout = self::DEFAULT_TIMEOUT;

    /**
     * Indicates whether the SMTP connection should use TLS.
     * @var bool
     */
    public $SMTPSecure = '';

    /**
     * The last response received from an SMTP server.
     * @var string
     */
    public $last_reply = '';

    // ...
    // The rest of the class code would be here.
    // ...

    /**
     * Get a list of supported authentication methods.
     * @return array
     */
    public function getAuthMethods()
    {
        return $this->auth_methods;
    }
}
