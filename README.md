saelib
======

SAE SDK on Linux/Windows/Mac

新浪官方一直都没提供 Linux 版本的。

[新浪官方Windows版](http://sae.sina.com.cn/?m=devcenter&catId=231)

usage
------

1. copy `config.sample.php` to `config.php`

2. install dependencies
```bash
composer update
```

3. use it!
```php
if (!isset($_SERVER['HTTP_APPNAME'])) {
    require 'saelib/autoload.php';
}
```

dependencies
------------

if no **redis** installed, please install it.

```bash
apt-get install redis-server
```

if **xhprof** has not been installed, please install it.

difference
-----------

there is no `$_SERVER['HTTP_APPNAME']`, so this could be used to tell which env are you in.
if you want to know the app's name, use constant `SAE_APPNAME`;

for example
```php
$mem_root = isset($_SERVER['HTTP_APPNAME']) ? 'saemc://' : __DIR__.'/memcache_dir';
```

和官方版本不同，对官方所有实现了wrapper的功能，都不提供本地版本。如

- Memcache -- saemc://
- KVDB -- saekv://
- Storage -- saestor://

请使用wrapper，这也是兼容性比较好的方式。判断本地和服务器环境的方法请参考上面。

FAQ
------

Q: when use xhprof, fopen permssion denied.

A: 
```bash
mkdir /tmp/xhprof
chmod 777 /tmp/xhprof
```
