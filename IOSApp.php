<?php
 require __dir__.'/vendor/autoload.php';
 use Facebook\WebDriver\Remote\DesiredCapabilities;
 use Facebook\WebDriver\Remote\RemoteWebDriver;
 use Facebook\WebDriver\WebDriverBy;

 $caps = array(
    "app"=>"{app_url}",
    "deviceName"=>"iPhone 12",
    "platformVersion"=>"14",
    "platformName"=>"ios",
    "isRealMobile"=>true,
    "video"=>true,
    "visual"=>true,
    "name"=>"IOS app automation php test"
 );

 $username= getenv("LT_USERNAME") ? getenv("LT_USERNAME") : "{username}"
 $accesskey= getenv("LT_ACCESS_KEY") ? getenv("LT_ACCESS_KEY") : "{accesskey}"

 $driver = RemoteWebDriver::create("https"+$username+:+$accesskey+"@beta-hub.lambdatest.com/wd/hub",$caps);

try{
     $color_element = $driver->findElement(WebDriverBy::id('color'));
     $color_element->click();

     $text_element = $driver->findElement(WebDriverBy::id('Text'));
     $text_element->click();

     $toast_element = $driver->findElement(WebDriverBy::id('toast'));
     $toast_element->click();

     $notification_element = $driver->findElement(WebDriverBy::id('notification'));
     $notification_element->click();

     $geolocation_element = $driver->findElement(WebDriverBy::id('geoLocation'));
     $geolocation_element->click();

     $browser_element = $driver->findElement(WebDriverBy::id('Browser'));
     $browser_element->click();

     $url_element = $driver->findElement(WebDriverBy::id('url'))
     $url_element->sendKeys("https://www.lambdatest.com");

     $find_element = $driver->findElement(WebDriverBy::id('find'));
     $find_element->click();

     $driver->quit();
 }  finally {
     $driver->quit()
 }

?>