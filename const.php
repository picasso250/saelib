<?php

define('SAE_ACCESSKEY', 'sae');
define('SAE_SECRETKEY', 'sae');

// font style
define("SAE_Italic",2);
define("SAE_Oblique",3);


// font name
define("SAE_SimSun",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_SimKai",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_SimHei",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_Arial",__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define("SAE_MicroHei",__DIR__.DIRECTORY_SEPARATOR.'wqy-microhei.ttc');

// anchor postion
define("SAE_TOP_LEFT","tl");
define("SAE_TOP_CENTER","tc");
define("SAE_TOP_RIGHT","tr");
define("SAE_CENTER_LEFT","cl");
define("SAE_CENTER_CENTER","cc");
define("SAE_CENTER_RIGHT","cr");
define("SAE_BOTTOM_LEFT","bl");
define("SAE_BOTTOM_CENTER","bc");
define("SAE_BOTTOM_RIGHT","br");

// errno define
define("SAE_Success", 0); // OK
define("SAE_ErrKey", 1); // invalid accesskey or secretkey
define("SAE_ErrForbidden", 2); // access fibidden for quota limit
define("SAE_ErrParameter", 3); // parameter not exist or invalid
define("SAE_ErrInternal", 500); // internal Error
define("SAE_ErrUnknown", 999); // unknown error

//redis app number
define("APP_NUMBER",10) ;

define('SAE_Font_Sun',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_Kai',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_Hei', __DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');
define('SAE_Font_MicroHei',__DIR__.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'wqy-zenhei.ttc');

