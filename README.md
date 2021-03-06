saelib
======

SAE SDK on Linux/Windows/Mac

鉴于新浪官方一直都没提供 **Linux** 版本。所以我做了个 Linux 版。

不过，如果想要更多的功能，请去下载 [SAE SDK 官方Windows版](http://sae.sina.com.cn/?m=devcenter&catId=231)

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

简介
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

但是，如果你有pr，我也接受。

已经实现的功能如下：

- Counter
- Rank

这两者都是源自 sae win 的代码。

FAQ
------

Q: when use xhprof, fopen permssion denied.

A: 
```bash
mkdir /tmp/xhprof
chmod 777 /tmp/xhprof
```

todo
-----

- Channel
