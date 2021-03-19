<?php


class Logger
{

    #(TRACE, DEBUG, INFO, WARN, ERROR, FATAL)
    public const TRACE = 100;
    public const DEBUG = 200;
    public const INFO = 300;
    public const ERROR = 400;
    public const WARNING = 500;
    public const FATAL = 600;

    private static $levels = [
        self::TRACE => 'TRACE',
        self::DEBUG => 'DEBUG',
        self::INFO => 'INFO',
        self::WARNING => 'WARNING',
        self::ERROR => 'ERROR',
        self::FATAL => 'FATAL'
    ];

    private static $logger;

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$logger === null) {
            self::$logger = new self();
        }

        return self::$logger;
    }

    /**
     * @param string $message The Message to write.
     * @param int $level [optional] <p>
     * One of Logger::TRACE,
     * Logger::DEBUG,
     * Logger::INFO,
     * Logger::ERROR,
     * Logger::WARNING, or
     * Logger::FATAL.
     * </p>
     * @param array $messageInfo [optional] <p>
     * Array of information to wbe written.
     * </p>
     */
    public function log(string $message, $level = self::ERROR, $messageInfo = [])
    {
        $logName = date('Y-m-d H:i:s') . " ; " . Logger::$levels[$level] . " ; " . $message . ob_get_clean() . PHP_EOL;
        $messageToWrite = $logName . $this->contextStringify($messageInfo);
        file_put_contents(__DIR__ . "/logs/" . "$logName.txt", $messageToWrite, FILE_APPEND);
    }

    public function contextStringify($messageInfo = [])
    {
        return !empty($messageInfo) ? json_encode($messageInfo) : null;
    }

    private function __sleep()
    {

    }

    private function __wakeup()
    {

    }
}
