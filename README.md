# LT-appium-php
Lt appium php

## Pre-requisites

---

Before you can start performing App automation testing with Appium, you would need to follow these steps:

- Install the latest Python build from the [official website](https://www.python.org/downloads/). We recommend using the latest version.
- Make sure that you have the latest PHP installed on your system. You can download and install PHP using following commands in the terminal:
  
  - MacOS: Previous versions of MacOS have PHP installed by default. But for the latest MacOS versions starting with Monterey, PHP has to be downloaded and installed manually by using below commands:
    ```bash
    /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
    brew install php
    ```

  - Windows:
    ```bash
    sudo apt-get install curl libcurl3 libcurl3-dev php
    ```
  > **Note:**
  > For Windows, you can download PHP from here. Also, refer to this documentation for ensuring the accessibility of PHP through Command Prompt(cmd).

### Clone The Sample Project

**Step-1:** Clone the LambdaTest's [LT-appium-php](https://github.com/LambdaTest/LT-appium-php) and navigate to the code directory as shown below:

```bash
git clone https://github.com/LambdaTest/LT-appium-php
cd LT-appium-php
```


### Setting Up Your Authentication

Make sure you have your LambdaTest credentials with you to run test automation scripts on LambdaTest. To obtain your access credentials, [purchase a plan](https://billing.lambdatest.com/billing/plans) or access the [Automation Dashboard](https://appautomation.lambdatest.com/).

**Step-2:** Set LambdaTest `Username` and `Access Key` in environment variables.

```bash
export LT_USERNAME="YOUR_LAMBDATEST_USERNAME"
export LT_ACCESS_KEY="YOUR_LAMBDATEST_ACCESS_KEY"
```

### Upload Your Application

**Step-3:** Upload your **_iOS_** application (.ipa file) or **_android_** application (.apk file) to the LambdaTest servers using our **REST API**. You need to provide your **Username** and **AccessKey** in the format `Username:AccessKey` in the **cURL** command for authentication. Make sure to add the path of the **appFile** in the cURL request. Here is an example cURL request to upload your app using our REST API:

```bash
curl -u "YOUR_LAMBDATEST_USERNAME":"YOUR_LAMBDATEST_ACCESS_KEY" \
--location --request POST 'https://manual-api.lambdatest.com/app/upload/realDevice' \
--form 'name="Android_App"' \
--form 'appFile=@"/Users/macuser/Downloads/proverbial_android.apk"' 
```

> **Note:**
>
> - If you do not have any **.apk** or **.ipa** file, you can run your sample tests on LambdaTest by using our sample [Android app](https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_android.apk) or sample [iOS app](https://prod-mobile-artefacts.lambdatest.com/assets/docs/proverbial_ios.ipa).
> - Response of above cURL will be a **JSON** object containing the `App URL` of the format - <lt://APP123456789123456789> and will be used in the next step.

### Executing The Tests

**Step-4:**
Run the following command in the directory where your project has been saved to execute your build.
- Android
```bash
php AndroidApp.php
```
- iOS
```bash
php IOSApp.php
```

Your test results would be displayed on the test console (or command-line interface if you are using terminal/cmd) and on the [LambdaTest App Automation Dashboard](https://appautomation.lambdatest.com/build).