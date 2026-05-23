<?php

require __DIR__ . '/vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;

// --------------------
// LambdaTest creds
// --------------------
$username  = getenv("LT_USERNAME") ?: "USERNAME";
$accesskey = getenv("LT_ACCESS_KEY") ?: "ACCESS_KEY";

// --------------------
// Capabilities (iOS native-safe)
// --------------------
$caps = [
    "platformName" => "iOS",
    "appium:deviceName" => "iPhone 16 Pro Max",
    "appium:platformVersion" => "18",
    "appium:automationName" => "XCUITest",
    "appium:app" => "lt://proverbial-ios",

    "LT:Options" => [
        "isRealMobile" => true,
        "build" => "PHP 8.5 iOS Appium",
        "name"  => "PHP iOS Native App Test",
        "video" => true,
        "visual" => true,
        "newCommandTimeout" => 300
    ]
];

// --------------------
// Create driver
// --------------------
$driver = RemoteWebDriver::create(
    "https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",
    $caps,
    60000,
    60000
);

$wait = new WebDriverWait($driver, 30, 500);

try {

    // ---------- COLOR ----------
    $wait->until(function () use ($driver) {
        return count($driver->findElements(WebDriverBy::id("color"))) > 0;
    });
    $driver->findElement(WebDriverBy::id("color"))->click();
    sleep(1);

    // ---------- TEXT ----------
    $driver->findElement(WebDriverBy::id("Text"))->click();
    sleep(1);

    // ---------- TOAST ----------
    $driver->findElement(WebDriverBy::id("toast"))->click();
    sleep(1);

    // ---------- NOTIFICATION ----------
    $driver->findElement(WebDriverBy::id("notification"))->click();
    sleep(2);

    // ---------- GEO LOCATION ----------
    $wait->until(function () use ($driver) {
        return count($driver->findElements(WebDriverBy::id("geoLocation"))) > 0;
    });
    $driver->findElement(WebDriverBy::id("geoLocation"))->click();
    sleep(5);

    // ---------- BACK ----------
    $driver->findElement(WebDriverBy::id("Back"))->click();
    sleep(1);

    // ---------- SPEED TEST ----------
    $driver->findElement(WebDriverBy::id("speedTest"))->click();
    sleep(5);

    // ---------- BACK ----------
    $driver->findElement(WebDriverBy::id("Back"))->click();
    sleep(1);

    // ---------- BROWSER ----------
    $driver->findElement(WebDriverBy::id("Browser"))->click();
    sleep(1);

    // ---------- URL ----------
    $driver->findElement(WebDriverBy::id("url"))
           ->sendKeys("https://www.lambdatest.com");

    $driver->findElement(WebDriverBy::id("find"))->click();
    sleep(3);

} finally {
    $driver->quit();
}
