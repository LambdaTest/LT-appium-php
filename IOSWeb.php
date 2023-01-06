<?php
    require 'vendor/autoload.php';
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\Remote;
    use Facebook\WebDriver\WebDriverExpectedCondition;

    $caps = array(
        "deviceName" => "iPhone .*",
        "platformName" => "ios",
        "platformVersion" => "14",
        "isRealMobile" => TRUE,
        "visual" => TRUE,
        "video" => TRUE,
        "name" => "Php - IOS test",
        "build" => "Php Vanilla - IOS"
    );

    $username = getenv("LT_USERNAME") ? getenv("LT_USERNAME") : "USERNAME"; //Enter username here
    $accesskey = getenv("LT_ACCESS_KEY") ? getenv("LT_ACCESS_KEY") : "ACCESS_KEY"; //Enter accesskey here

   @$driver = RemoteWebDriver::create("https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps);

 try{
    $driver->get("https://mfml.in/api/getInfo");
    sleep(10);
    $color_element = $driver->findElement(WebDriverBy::id('resolution'));
    $color_element->click();

    $text_element = $driver->findElement(WebDriverBy::id('location'));
    $text_element->click();

    $toast_element = $driver->findElement(WebDriverBy::id('details'));
    $toast_element->click();

    $notification_element = $driver->findElement(WebDriverBy::id('timezone'));
    $notification_element->click();
    
    sleep(5);

    $driver->quit();
 } finally {
    $driver->quit();
 }

?>