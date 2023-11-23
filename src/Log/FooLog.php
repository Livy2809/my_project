<?php

namespace App\Log;

class FooLog {
    private static $translations = [
        'en' => [
            'title' => 'Title',
            'message' => 'Message'
        ],
        'th' => [
            'title' => 'หัวข้อ',
            'message' => 'ข้อความ'
        ],
        'ch' => [
            'title' => '标题',
            'message' => '信息'
        ],
    ];

    public static function logTitle($title, $lang = 'en') {
        self::validateLanguage($lang);
        return self::$translations[$lang]['title'] . ": " . strtoupper($title);
    }

    public static function logMessage($message, $lang = 'en') {
        self::validateLanguage($lang);
        return self::$translations[$lang]['message'] . ": " . $message;
    }

    public static function writeLog($title, $message, $lang = 'en') {
        $logEntry = self::logTitle($title, $lang) . " - " . self::logMessage($message, $lang) . "\n";
    $logFilePath = 'C:\Users\olivi\Documents\B2\Composer-Maker\my_project\var\log\log.log';
    file_put_contents($logFilePath, $logEntry, FILE_APPEND);
    }

    private static function validateLanguage($lang) {
        if (!isset(self::$translations[$lang])) {
            throw new \Exception("Error: Invalid language code. Possible values are [th, en, ch].");
        }
    }
}