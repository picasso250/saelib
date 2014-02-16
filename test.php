<?php

require __DIR__.'/autoload.php';

sae_xhprof_start();

$c = new SaeCounter();
$c->create('c1',20);

$name = 'xxx';
$key = 'yyy';
$value = 42;
// 用户在代码中创建排行榜：
$sr=new SaeRank();
$ret=$sr->create($name,100);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());

// 在代码中插入排名数据：

$ret=$sr->set($name,$key,$value);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());

// 在代码中获取数据排名：

$ret=$sr->getRank($name,$key);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());

// 在代码中获取排行榜详细信息：

$ret=$sr->getInfo($name);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());
else
    print_r($ret);

// 在代码中删除排行榜：

$ret=$sr->clear($name);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());



// 在代码中创建周排行榜,实现一周后榜单自动重排：

$sr=new SaeRank();
$ret=$sr->create($name,100,60*24*7);
if($ret===false)
    var_dump($sr->errno(),$sr->errmsg());

echo "do something<br>";
get_appname();
sae_xhprof_end();
