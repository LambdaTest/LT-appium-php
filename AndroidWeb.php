<?php
    require 'vendor/autoload.php';
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\Remote;
    use Facebook\WebDriver\WebDriverExpectedCondition;

    $caps = array(
        "deviceName" => "Galaxy .*",
        "platformName" => "Android",
        "platformVersion" => "10",
        "isRealMobile" => TRUE,
        "visual" => TRUE,
        "video" => TRUE,
        "name" => "Php - Android test",
        "build" => "Php Vanilla - Android"
    );

    $username = getenv("LT_USERNAME");
    $accesskey = getenv("LT_ACCESS_KEY");

    if (!$username || !$accesskey) {
        throw new Exception("Please set LT_USERNAME and LT_ACCESS_KEY environment variables");
    }

   @$driver = RemoteWebDriver::create("https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps);

 try{
    $driver->get("https://mfml.in/api/getInfo");
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