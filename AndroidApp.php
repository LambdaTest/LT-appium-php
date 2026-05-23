<?php

require_once __DIR__ . '/vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;

// LambdaTest credentials
$username  = getenv("LT_USERNAME") ?: "USERNAME";
$accesskey = getenv("LT_ACCESS_KEY") ?: "ACCESS_KEY";

$hub = "https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub";

// W3C-compliant capabilities (Appium 2)
$caps = [
    'platformName' => 'Android',
    'appium:deviceName' => 'Galaxy S25',
    'appium:platformVersion' => '15',
    'appium:app' => 'lt://proverbial-android',

    'LT:Options' => [
        'isRealMobile' => true,
        'build' => 'PHP 8.5 Android Appium',
        'name'  => 'PHP Android Test',
        'video' => true,
        'visual'=> true,
        'appiumVersion' => '2.0',
      //   'autoAcceptAlerts'=>true,
        'autoDismissAlerts'=>true,
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

    // Wait for app to load
    $wait->until(function () use ($driver) {
        return count($driver->findElements(WebDriverBy::id('color'))) > 0;
    });

    $driver->findElement(WebDriverBy::id('color'))->click();
    $driver->findElement(WebDriverBy::id('Text'))->click();
    $driver->findElement(WebDriverBy::id('toast'))->click();
    $driver->findElement(WebDriverBy::id('geoLocation'))->click();
    sleep(5);

} finally {
    if ($driver) {
        $driver->quit();
    }
}
