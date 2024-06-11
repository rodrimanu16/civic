<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;


// Create a log channel
$log = new Logger('app');

// Create a stream handler to output to console (stdout)
$stream = new StreamHandler('php://stdout', Logger::DEBUG);

// Set the handler to use JsonFormatter
$formatter = new JsonFormatter();
//$formatter = new LineFormatter(null, null, true, true);

$stream->setFormatter($formatter);

// Add the handler to the logger
$log->pushHandler($stream);

// Log the error message
$log->error('You Rocked too hard!!!', ['error_code' => 500]);
// Set HTTP response code to 500

http_response_code(500);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #ffcccc;
            font-family: Arial, sans-serif;
            color: #ff0000;
        }
        h1 {
            font-size: 48px;
        }
        p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h1>Sorry, you rocked too hard!!!</h1>
    <img src="rock_hard.jpg" alt="Rock Image">
</body>
</html>
