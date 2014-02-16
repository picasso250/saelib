saelib
======

sae sdk on linux/window/mac

usage
------

1. copy `config.sample.php` to `config.php`

2. install dependencies
```bash
composer update
```

3. use it!
```php
require 'saelib/autoload.php';
```

dependencis
-----------

if no **redis** installed, please install it.

```bash
apt-get install redis-server
```

if **xhprof** has not been installed, please install it.

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
