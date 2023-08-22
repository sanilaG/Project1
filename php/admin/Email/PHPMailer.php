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
 * PHPMailer class.
 * PHP Version 5.5.
 *
 * @package PHPMailer
 */
class PHPMailer
{
    const VERSION = '6.5.1';
    const STOP_MESSAGE = 'X-PHPMailer-STOP';

    // Properties, constructor, and other methods would be here...

    /**
     * Set the message type.
     * @param string $type The type to set ('plain' or 'html')
     * @throws Exception
     */
    public function setMessageType($type)
    {
        if (!in_array($type, ['plain', 'html'])) {
            throw new Exception('Invalid message type');
        }
        $this->message_type = $type;
        return $this;
    }

    // ...
    // The rest of the class code would be here.
    // ...
}
