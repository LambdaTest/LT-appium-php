<?php
    require 'vendor/autoload.php';
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\Remote;
    use Facebook\WebDriver\Chrome\ChromeOptions;
    use Facebook\WebDriver\WebDriverExpectedCondition;
    use Facebook\WebDriver\Remote\RemoteWebDriver;

    $caps = array(
        "app"=> "APP_URL", //Enter app_url here
        "deviceName" => "Galaxy S20",
        "platformName" => "Android",
        "platformVersion" => "10",
        "isRealMobile" => TRUE,
        "visual" => TRUE,
        "video" => TRUE,
        "name" => "Php - Android test",
        "build" => "Php Vanilla - Android"
    );

    $username = getenv("LT_USERNAME") ? getenv("LT_USERNAME") : "USERNAME"; //Enter username here
    $accesskey = getenv("LT_ACCESS_KEY") ? getenv("LT_ACCESS_KEY") : "ACCESS_KEY"; //Enter accesskey here

    $driver = RemoteWebDriver::create("http://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps);

 try{
    $color_element = $driver->findElement(WebDriverBy::id('color'));
    $color_element->click();

    $text_element = $driver->findElement(WebDriverBy::id('Text'));
    $text_element->click();

    $toast_element = $driver->findElement(WebDriverBy::id('toast'));
    $toast_element->click();

    $notification_element = $driver->findElement(WebDriverBy::id('notification'));
    $notification_element->click();

    $geoLocation_element = $driver->findElement(WebDriverBy::id('geoLocation'));
    $geoLocation_element->click();
    sleep(5);
    
    $url_element = $driver->findElement(WebDriverBy::id('url'));
    $url_element->sendkeys("https://www.lambdatest.com");

    $find_element = $driver->findElement(WebDriverBy::id('find'));
    $find_element->click();
    sleep(2);

    $driver->quit();
 } finally {
    $driver->quit();
 }

?>