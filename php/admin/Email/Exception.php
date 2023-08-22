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
 * The PHPMailer exception class.
 * PHP Version 5.5.
 *
 * @package PHPMailer
 */
class Exception extends \Exception
{
    /**
     * Prettify error message output.
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = '<strong>' . htmlspecialchars($this->getMessage(), ENT_COMPAT | ENT_HTML401, 'UTF-8') . "</strong><br />\n";
        return $errorMsg;
    }
}
