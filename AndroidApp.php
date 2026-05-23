<?php
    require 'vendor/autoload.php';
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\Remote;
    use Facebook\WebDriver\WebDriverExpectedCondition;
    use Facebook\WebDriver\WebDriverWait;

    $caps = array(
        "deviceName" => "Galaxy .*",
        "platformName" => "Android",
        "platformVersion" => "10",
        "isRealMobile" => TRUE,
        "visual" => TRUE,
        "video" => TRUE,
        "app" => getenv("ANDROID_APP_ID"),
        "name" => "Php - Android test",
        "build" => "Php Vanilla - Android"
    );

    $username = getenv("LT_USERNAME");
    $accesskey = getenv("LT_ACCESS_KEY");

    if (!$username || !$accesskey) {
        throw new Exception("Please set LT_USERNAME and LT_ACCESS_KEY environment variables");
    }

    if (!getenv("ANDROID_APP_ID")) {
        throw new Exception("Please set ANDROID_APP_ID environment variable");
    }

    echo "Creating session with LambdaTest...\n";
    @$driver = RemoteWebDriver::create("https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps);
    echo "Session created successfully!\n";

try {
    echo "Initializing WebDriverWait...\n";
    $wait = new WebDriverWait($driver, 60);
    
    // Wait for app to load
    echo "Waiting for app to load (30 seconds)...\n";
    sleep(30);
    
    // Find and click color button
    echo "Looking for color button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('color')));
    echo "Color button found!\n";
    $color_element = $driver->findElement(WebDriverBy::id('color'));
    echo "Clicking color button...\n";
    $color_element->click();
    echo "Color button clicked!\n";
    sleep(5);

    // Find and click text button
    echo "Looking for text button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('Text')));
    echo "Text button found!\n";
    $text_element = $driver->findElement(WebDriverBy::id('Text'));
    echo "Clicking text button...\n";
    $text_element->click();
    echo "Text button clicked!\n";
    sleep(5);

    // Find and click toast button
    echo "Looking for toast button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('toast')));
    echo "Toast button found!\n";
    $toast_element = $driver->findElement(WebDriverBy::id('toast'));
    echo "Clicking toast button...\n";
    $toast_element->click();
    echo "Toast button clicked!\n";
    sleep(5);

    // Find and click notification button
    echo "Looking for notification button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('notification')));
    echo "Notification button found!\n";
    $notification_element = $driver->findElement(WebDriverBy::id('notification'));
    echo "Clicking notification button...\n";
    $notification_element->click();
    echo "Notification button clicked!\n";
    sleep(5);

    // Find and click geolocation button
    echo "Looking for geolocation button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('geoLocation')));
    echo "Geolocation button found!\n";
    $geolocation_element = $driver->findElement(WebDriverBy::id('geoLocation'));
    echo "Clicking geolocation button...\n";
    $geolocation_element->click();
    echo "Geolocation button clicked!\n";
    sleep(10);

    // Perform Android back action using Appium mobile command
    echo "Performing Android back action using Appium mobile command...\n";
    $driver->executeScript('mobile: pressKey', [['keycode' => 4]]);
    echo "Android back action performed!\n";
    sleep(5);

    // Find and click speedtest button
    echo "Looking for speedtest button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('speedTest')));
    echo "Speedtest button found!\n";
    $speedtest_element = $driver->findElement(WebDriverBy::id('speedTest'));
    echo "Clicking speedtest button...\n";
    $speedtest_element->click();
    echo "Speedtest button clicked!\n";
    sleep(5);

    // Perform Android back action using Appium mobile command
    echo "Performing Android back action using Appium mobile command...\n";
    $driver->executeScript('mobile: pressKey', [['keycode' => 4]]);
    echo "Android back action performed!\n";
    sleep(5);

    // Find and click browser button
    echo "Looking for browser button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('com.lambdatest.proverbial:id/webview')));
    echo "Browser button found!\n";
    $browser_element = $driver->findElement(WebDriverBy::id('com.lambdatest.proverbial:id/webview'));
    echo "Clicking browser button...\n";
    $browser_element->click();
    echo "Browser button clicked!\n";
    sleep(5);

    // Find and enter URL
    echo "Looking for URL input field...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('url')));
    echo "URL input field found!\n";
    $url_element = $driver->findElement(WebDriverBy::id('url'));
    echo "Entering URL...\n";
    $url_element->sendKeys("https://www.lambdatest.com");
    echo "URL entered!\n";
    sleep(5);

    // Find and click find button
    echo "Looking for find button...\n";
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('find')));
    echo "Find button found!\n";
    $find_element = $driver->findElement(WebDriverBy::id('find'));
    echo "Clicking find button...\n";
    $find_element->click();
    echo "Find button clicked!\n";
    sleep(5);

} catch (Exception $e) {
    echo "Test failed with error: " . $e->getMessage() . "\n";
    echo "Error occurred at line: " . $e->getLine() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
} finally {
    echo "Quitting driver...\n";
    $driver->quit();
    echo "Driver quit successfully!\n";
}

?>