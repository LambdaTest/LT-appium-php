<?php

require_once __DIR__ . '/vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;

// LambdaTest credentials
$username  = getenv("LT_USERNAME") ?: "USERNAME";
$accesskey = getenv("LT_ACCESS_KEY") ?: "ACCESS_KEY";

$hub = "https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub";

// W3C-compliant capabilities for Android Web
$caps = [
    'platformName' => 'Android',
    'appium:deviceName' => 'Galaxy S25',
    'appium:platformVersion' => '15',
    'browserName' => 'Chrome',

    'LT:Options' => [
        'isRealMobile' => true,
        'build' => 'PHP 8.5 Android Web',
        'name'  => 'PHP Android Web Test',
        'video' => true,
        'visual'=> true,
        'appiumVersion' => '2.0',
        'newCommandTimeout' => 300
    ]
];

// Create driver
$driver = RemoteWebDriver::create(
    $hub,
    $caps,
    30000,
    30000
);

try {
    $wait = new WebDriverWait($driver, 30, 500);

    // Open website
    $driver->get("https://mfml.in/api/getInfo");

    // Wait until page loads
    $wait->until(function () use ($driver) {
        return count($driver->findElements(WebDriverBy::id('resolution'))) > 0;
    });

    $driver->findElement(WebDriverBy::id('resolution'))->click();
    $driver->findElement(WebDriverBy::id('location'))->click();
    $driver->findElement(WebDriverBy::id('details'))->click();
    $driver->findElement(WebDriverBy::id('timezone'))->click();

    sleep(5);

} finally {
    if ($driver) {
        $driver->quit();
    }
}
