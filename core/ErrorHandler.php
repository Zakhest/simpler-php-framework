<?php

class ErrorHandler
{
    // Default controller (ubah sesuai kebutuhan)
    private static $defaultController = 'Home';

    public static function handle($message)
    {
        // Ambil URL dasar (root folder aplikasi)
        $baseURL = self::getBaseURL();

        // Template HTML untuk error page
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .error-container {
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }
        .error-container h1 {
            font-size: 2.5rem;
            color: #e63946;
            margin-bottom: 10px;
        }
        .error-container p {
            font-size: 1.2rem;
            margin: 0;
            color: #555;
        }
        .error-container a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #1d3557;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid #1d3557;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }
        .error-container a:hover {
            background-color: #1d3557;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class='error-container'>
        <h1>Error</h1>
        <p>{$message}</p>
        <a href='{$baseURL}/" . self::$defaultController . "'>Go to Default</a>
    </div>
</body>
</html>";
        exit;
    }

    // Fungsi untuk mendapatkan base URL aplikasi
    private static function getBaseURL()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $baseDir = str_replace(basename($scriptName), '', $scriptName);
        return $protocol . "://" . $host . $baseDir;
    }
}
