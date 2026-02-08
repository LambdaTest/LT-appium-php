<?php

require_once __DIR__ . '/vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;

// LambdaTest credentials
$username  = getenv("LT_USERNAME") ?: "USERNAME";
$accesskey = getenv("LT_ACCESS_KEY") ?: "ACCESS_KEY";

$hub = "https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub";

// iOS Web (Safari) – Appium 2 compliant
$caps = [
    'platformName' => 'iOS',
    'browserName'  => 'Safari',

    // Appium specific
    'appium:deviceName' => 'iPhone 16 Pro Max',
    'appium:platformVersion' => '18',
    'appium:automationName' => 'XCUITest',
    'appium:safariAllowPopups' => true,
    'appium:autoAcceptAlerts' => true,

    'LT:Options' => [
        'isRealMobile' => true,
        'build' => 'PHP 8.5 iOS Web',
        'name'  => 'PHP iOS Web Test',
        'video' => true,
        'visual'=> true,
        'appiumVersion' => '2.0',
        'newCommandTimeout' => 300,
        'wdaStartupTimeout' => 120000
    ]
];

// ⏳ Increase session creation timeout for iOS
$driver = RemoteWebDriver::create(
    $hub,
    $caps,
    90000,   // connection timeout
    90000    // request timeout
);

try {
    $wait = new WebDriverWait($driver, 60, 500);

    $driver->get("https://mfml.in/api/getInfo");

    // iOS Safari is slow — always wait
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
