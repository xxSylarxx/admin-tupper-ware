<?php

// sistema
define("PATH_WEB", "http://admin-web-tupper.com");
define("PATH_ROOT", dirname(__DIR__));
define("PATH_PUBLIC", PATH_WEB . "/public");

// publicaciones
define("PUB_MAX_WEB", 9);
define("PUB_MAX_ADMIN", 12);
define("PUB_SUB_CATEG", false);

// idioma
define("LANG_ACTIVE", false);
define("LANG_DEFAULT", "es");
define("LANG_CONVERT", "en");

// api facebook
define("FB_APP_ID", "");
define("FB_APP_SECRET", "");
define("FB_POST_LIMIT", 10);
define("FB_REDIRECT_URL", PATH_WEB . '/callback.php');

// base de datos
define("BD_HOST", "localhost");
define("BD_NAME", "web_tupperware");
define("BD_USER", "root");
define("BD_PASS", "");
define("BD_PORT", "3307");

// zona horaria
date_default_timezone_set("America/Lima");
setlocale(LC_TIME, "spanish");
