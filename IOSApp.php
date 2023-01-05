<?php

namespace Facebook\WebDriver;
require __dir__.'/vendor/autoload.php';
 use Facebook\WebDriver\Remote\DesiredCapabilities;
 use Facebook\WebDriver\Remote\RemoteWebDriver;
 use Facebook\WebDriver\WebDriverBy;
 use Facebook\WebDriver\WebDriverWait;
 use Facebook\WebDriver\WebDriverExpectedCondition;

 $caps = array(
    "app"=>"lt://proverbial-ios", // Enter app_url here
    "deviceName"=>"iPhone 11",
    "platformName"=>"ios",
    "isRealMobile"=>true,
    "video"=>true,
    "visual"=>true,
    "queueTimeout"=>"300",
    "name"=>"Php - iOS test",
    "build" => "Php Vanilla - iOS"
 );

    $username = getenv("LT_USERNAME") ? getenv("LT_USERNAME") : "USERNAME"; //Enter username here
    $accesskey = getenv("LT_ACCESS_KEY") ? getenv("LT_ACCESS_KEY") : "ACCESS_KEY"; //Enter accesskey here

 @$driver = RemoteWebDriver::create("https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps,3600000,3600000);

try{
    $wait = new WebDriverWait($driver, 120);
    $wait->until(WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('color')));
    $color_element = $driver->findElement(WebDriverBy::id('color'));
    $color_element->click();

    $text_element = $driver->findElement(WebDriverBy::id('Text'));
    $text_element->click();

    $toast_element = $driver->findElement(WebDriverBy::id('toast'));
    $toast_element->click();

    $notification_element = $driver->findElement(WebDriverBy::id('notification'));
    $notification_element->click();
    sleep(2);

    $wait->until(WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('geoLocation')));
    $geolocation_element = $driver->findElement(WebDriverBy::id('geoLocation'));
    $geolocation_element->click();
    sleep(5);

    $home_element = $driver->findElement(WebDriverBy::id('Back'));
    $home_element->click();

    $speedtest_element = $driver->findElement(WebDriverBy::id('speedTest'));
    $speedtest_element->click();
    sleep(5);

    $home_element = $driver->findElement(WebDriverBy::id('Back'));
    $home_element->click();

    $browser_element = $driver->findElement(WebDriverBy::id('Browser'));
    $browser_element->click();

    $url_element = $driver->findElement(WebDriverBy::id('url'));
    $url_element->sendKeys("https://www.lambdatest.com");

    $find_element = $driver->findElement(WebDriverBy::id('find'));
    $find_element->click();
    sleep(2);

    $driver->quit();
 }  finally {
     $driver->quit();
 }

?>