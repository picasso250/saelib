saelib
======

sae sdk on linux/window/mac

usage
------

```php
require 'saelib/autoload.php';
```

if no redis or xhprof, please run

```bash
composer update
apt-get install redis-server
```

if xhprof has not been installed, please install it first.

difference
-----------

there is no `$_SERVER['HTTP_APPNAME']`, so this could be used to tell which env are you in.
if you want to know the app's name, use constant `SAE_APPNAME`;

FAQ
------

Q: when use xhprof, fopen permssion denied.

A: 
```bash
mkdir /tmp/xhprof
chmod 777 /tmp/xhprof
```
