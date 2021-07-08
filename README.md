# WinboxZabbix
A repository that will guide you on how to open Winbox via Zabbix (Windows Only)

# Instalation
First you will need to edit the file `usr/share/zabbix/js/menupopup.js`. And put the Winbox Trigger at the end of the go to section.

```php
function getMenuPopupHost(options, trigger_elmnt) {
        var sections = [];

        // go to section
        if (options.hasGoTo) {
                var     host_inventory = {
                                label: t('Inventory')
                        },
                        latest_data = {
                                label: t('Latest data')
                        },
                        problems = {
                                label: t('Problems')
                        },
                        graphs = {
                                label: t('Graphs')
                        },
                        dashboards = {
                                label: t('Dashboards')
                        },
                        web = {
                                label: t('Web')
                        },
                        winbox = {
                                label: t('Winbox'),
                                url: new Curl('portal.php?app=winbox&hostid=' + options.hostid).getUrl()
                        };
```

Then you will need to put the `portal.php` file inside the `usr/share/zabbix/` folder.

Then put the `winbox.bat` and your `winbox.exe`on your `C:\` directory.
Then edit the `winbox.reg` file to set your winbox username and password:
```text
Windows Registry Editor Version 5.00

[HKEY_CLASSES_ROOT\Winbox]
@="URL:Winbox_Protocol"
"URL Protocol"=""

[HKEY_CLASSES_ROOT\Winbox\DefaultIcon]
@="C:\\winbox.exe"

[HKEY_CLASSES_ROOT\Winbox\shell]

[HKEY_CLASSES_ROOT\Winbox\shell\open]

[HKEY_CLASSES_ROOT\Winbox\shell\open\command]
@="C:\\winbox.bat \"%1\" youruser yourpassword"
```

Then just run the `winbox.reg` file to add the `winbox:` URI to the OS and you're done. Enjoy the new function!
