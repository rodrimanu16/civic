<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

// Create a log channel
$log = new Logger('app');

// Create a stream handler to output to console
$stream = new StreamHandler('php://stdout', Logger::DEBUG);

// Set the handler to use JsonFormatter
$formatter = new JsonFormatter();
$stream->setFormatter($formatter);

// Add the handler to the logger
$log->pushHandler($stream);

// Log messages
$log->info('Welcome to the Best App in the world', ['user' => 'admin', 'action' => 'login']);
$log->warning('WARNING: Be careful not to Rock too hard!!', ['type' => 'security']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rockkk</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        button {
            margin-top: 20px;
            width: 300px; /* Adjust the width as needed */
            height: 300px; /* Adjust the height as needed */
            background: url('button_image.jpg') no-repeat center center;
            background-size: cover;
            border: none;
            cursor: pointer;
        }
        button:focus {
            outline: none;
        }
        button:active {
            transform: scale(0.95); /* Add a slight scaling effect when clicked */
        }
    </style>
    <script>
        let clickCount = 0;

        function handleClick() {
            clickCount++;
            const button = document.getElementById('rockButton');
            button.style.transform = `scale(${1 + clickCount * 0.3})`;

            if (clickCount > 5) {
                // Redirect to the custom error page
                window.location.href = 'error.php';
            } 
        }
    </script>
</head>
<body>
    <img src="rock_image.jpg" alt="Rock Image">
    <button id="rockButton" onclick="handleClick()"></button>
</body>
</html>
