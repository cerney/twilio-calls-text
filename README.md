# Click-to-Call fro Twilio


## Description

This plugin enables your web visitors to interact with your https://twilio.com endpoint numbers directly over the phone, SMS/MMS and FAX using simple shortcodes.

In order to get Click-to-Call for Twilio to work, you need to add your Twilio ACCOUNT SID and AUTH TOKEN. Basically these are the keys that will grant plugin access to your Twilio Cloud Infrastructure and will be able to initiate actions.

If you don’t have a Twilio account don’t worry, setting up an account is very simple and you can get your trial credentials in a matter of seconds. You can find a very comprehensive video tutorial [here](https://twilio.dasweb.ca/general-settings/).

<h3>Obtaining the Twilio SID and AUTH tokens</h3>

After you have your Twilio account set up navigate to your main [Twilio Dashboard](https://www.twilio.com/console) and copy your credentials into the general settings of the plugin.

<h3>Adding a Click-to-Call shortcode</h3>

To add a shortcode of your Click-to-Call button simply add the following to any part of your WordPress page or visual editor:

```
[twtcall label='Click To Call' number='+1501222333']
```
Notice that by default the label for the button is ‘Click to Call’ which you can change to whatever is the best for you. The second part of the shortcode is the default Voice number that you set up in the Settings page. You can overwrite it with another Voice capable number that you have in your Twilio account.



## Installation

<h3>Using the WordPress dashboard</h3>

1. First, download the zip file containing Click-to-Call for Twilio. To do so, simply access the downloads page, log into your account, and click the button labeled TWILIO WP TOOLS. Be sure to save this zip file somewhere easily accessible as you will need it soon.

2. Next, log into your WordPress admin dashboard if you have not already done so.
3. From within your WordPress admin dashboard, hover over Plugins on the left side navigation menu and click on Add New. Within this page, click the Upload Plugin button at the top.
4. Once on the upload page, click the Browse button. Then, navigate to the zip file you previously downloaded and select it. Once the file is selected, click the Install Now button.
5. WordPress will now automatically handle the installation of Click-to-Call for Twilio. Once complete, be sure to click Activate Plugin to activate Click-to-Call for Twilio.

<h3>Using FTP</h3>

1. First, download Click-to-Call for Twilio. To do so, simply access the download page, log into your account, and download the plugin zip file.
2. As you are installing via FTP, you will need to unpack the zip file that you downloaded.
3. Next, access your WordPress site via FTP and navigate to the wp_content/plugins directory. Inside there, upload the entire ‘click-to-call-twilio’ folder that you have obtained as result of unzipping the zip file.
4. Once fully uploaded, access your WordPress admin dashboard and click on Plugins. Inside this page, you should now see an entry for Twilio WP Tools. All you have to do now is activate it by clicking one Activate Plugin.

That’s it! Click-to-Call for Twilio is now installed and running on your WordPress site. To get started, you may now follow our guide on setting up Click-to-Call for Twilio.

## Demo

You can find more in the [Documentation](https://twilio.dasweb.ca/documentation) section on our website and you can also test the [Demo](https://twilio.dasweb.ca/click-to-call-for-wordpress/) of the Click-to-Call functionality.

### PRO version

[The Pro Version](https://twilio.dasweb.ca/shop/twilio-wordpress-tools-pro/) offers you a full integration of the SMS/MMS and Fax options and offers you more options, customization and 6 months of free support.

* Click-to-Call feature – Direct contact with your website visitors
* SMS/MMS functionality – Capture visitors’ phone numbers and send marketing/contact info
* vCards sent to visitors – Send visitors your contact information in a phone-ready format
* Fax outbound feature – Use it internally as a virtual fax machine to send documents
* Custom Voice Message – Write your own welcome message when placing click-to-call actions
* Custom Countries Flags – Select the countries you want to be visible in the input field
* WPMU/Translations – Ability to translate the plugin strings in different languages
* 6 months Free Support – Include installation and technical support


## Authors

* **Dasweb** - *Initial work* - [Dasweb Inc.](https://dasweb.ca)



