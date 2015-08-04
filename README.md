### Vanillaforums plugin for Craft CMS

A simple plugin for integrating [VanillaForums](http://vanillaforums.org/) into [Craft CMS](http://buildwithcraft.com) websites, including Single Sign On (SSO) for site-wide SSO, as well as embedded SSO.

**Installation**

1. Unzip file 
2. Place `vanillaforums` directory into your `craft/plugins` directory or do a `git pull https://github.com/khalwat/Vanillaforums.git` directly into your `craft/plugins` folder
3. Install plugin in the Craft Control Panel under Settings > Plugins

###Configuring Vanillaforums###

1. Install jsConnect.  Make sure you have installed the [jsConnect plugin](http://vanillaforums.org/addon/jsconnect-plugin), and follow the documentation for [Vanilla SSO](http://docs.vanillaforums.com/features/sso/) setup.

2. jsConnect Auto SignIn.  You might also consider installing and using the [Vanilla jsConnect Auto SignIn](http://vanillaforums.org/addon/jsconnectautosignin-plugin) to make the SSO process smoother for the end user.

3. Go to your Vanillaforums AdminCP, under Users click on **jsConnect**, then click on **Add Connection**.  Click on **Generate Client ID and Secret** to generate random Client ID and Secret fields, and then fill in the rest of the fields as appropriate

4. Next in the Craft Admin CP, go to Settings->Plugins->Vanillaforums and enter the same Client ID and Secret from step 3

#### Site-Wide Single Sign On (SSO) ####

Assuming you've set up everything properly, all you have to do for [Site-Wide SSO](https://blog.vanillaforums.com/jsconnect-technical-documentation/) is create a template in your CraftCMS that has only the following in it:

	{{ vanillaforumsSSO() }}

This will generate a properly configured `jsonp` response for the jsConnect SSO.

The fill in the **Authenticate Url** field in your jsConnect connection with the URL to this template.  You can test that it's working by clicking on the **Test URL** link under Users->jsConnect, it should look something like this:

    test({"uniqueid":"1","name":"Admin","email":"admin@testsite.com","photourl":"http:\/\/testsite.com\/cpresources\/userphotos\/admin\/100\/profilepic.jpg?x=abF7BLdua","client_id":"12345678","signature":"b1670c794d13a5214b3d0ddd3d9a2293"})


#### Embedded Single Sign On (SSO) ####

Assuming you've set up everything properly, all you have to do for [Embedded SSO](https://blog.vanillaforums.com/jsconnect-technical-documentation-for-embedded-sso/) (for things like blog comments, etc.) is to go to your VanillaForums AdminCP, click on Forum->Blog Comments->Universial Code and follow the instructions there.

You'll need to add a line after the `var vanilla_identifier` that looks like this to enable SSO for embedded comments:

    var vanilla_sso = '{{ vanillaforumsSSOEmbed() }}'; // Your SSO string.

That will output an encoded string of characters that should look something like this:

    eyJ1bmlxdWVpZCI6IjEiLCJuYW1lIjoiQWRtaW4iLCJlbWFpbCI6ImFuZHJld0BtZWdhbG9tYW5pYWMuY29tIiwicGhvdG91cmwiOiJodHRwOlwvXC9UYXN0eVN0YWtlcy5jb21cL2NwcmVzb3VyY2VzXC91c2VycGhvdG9zXC9hbmRyZXdAbWVnYWxvbWFuaWFjLmNvbVwvMTAwXC9mcmFua19sZy5qcGc/eD1LTVFrMWl0aDciLCJjbGllbnRfaWQiOiIxODY0MjUyMjMwIn0= da4d6c328a730a9c7096bdbd53d2a408f5a5958c 1438711686 hmacsha1


## Changelog

### 1.0.0 -- 2015-08-04

* Initial release
