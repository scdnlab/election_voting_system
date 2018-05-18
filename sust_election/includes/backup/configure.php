<?php
    session_start();
    /*===========================================================================
    BASIC CONSTANTS & REQUIRES
    ============================================================================*/

    define('ROOT_DIR', '/home/webcraft/public_html');
    define('BASE_DIR', ROOT_DIR);
    define('SITE_HOST', 'http://webcraftbd.com');
    define('BASE_URL', SITE_HOST);
    define('IMAGES_DIR', BASE_DIR.'/images');
    define('IMAGES_URL', BASE_URL.'/images');
    define('INCLUDES_DIR', BASE_DIR.'/includes');
    define('CLASSES_DIR', INCLUDES_DIR.'/classes');
    define('FUNCTIONS_DIR', INCLUDES_DIR.'/functions');
    define('PAGE_NAME', basename($_SERVER['PHP_SELF']));

    define('DB_TYPE', 'mysql');
    define('DB_SERVER', 'localhost');
    define('DB_SERVER_USERNAME', 'webcraft');
    define('DB_SERVER_PASSWORD', 'z213311c');
    define('DB_DATABASE', 'webcraft_webcraft');

    require_once(ROOT_DIR.'/smarty/libs/Smarty.class.php');
    require_once(CLASSES_DIR.'/mysmarty.class.php');
    require_once(ROOT_DIR.'/adodb/adodb.inc.php');

    /*========================================================================
    INITILIZAE SOME SMARTY VARIABLES
    ==========================================================================*/
    STemplate::assign('SITE_HOST', SITE_HOST);
    STemplate::assign('BASE_DIR', BASE_DIR);
    STemplate::assign('BASE_URL', BASE_URL);
    STemplate::assign('IMAGES_DIR', IMAGES_DIR);
    STemplate::assign('IMAGES_URL', IMAGES_URL);
    STemplate::assign('PAGE_NAME', PAGE_NAME);

    STemplate::setCompileDir(BASE_DIR.'/templates_c');
    STemplate::setTplDir(BASE_DIR.'/templates');
    
    
    /*==========================================================================
    DATABASE CONNECTION
    ============================================================================*/

    $conn = &ADONewConnection(DB_TYPE);
    $conn->PConnect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);


    /*=========================================================================
    CONSTANTS FROM DATABASE
    ===========================================================================*/
    $R=$_REQUEST;
    STemplate::assign("request",$_REQUEST);
    STemplate::assign("session",$_SESSION);
    $sql = 'select * from configuration';
    $rsc = $conn->Execute($sql);

    while(!$rsc->EOF)
    {
        define($rsc->fields['key'], $rsc->fields['value']);

        STemplate::assign($rsc->fields['key'], $rsc->fields['value']);
        $rsc->MoveNext();
    }
    
    include(INCLUDES_DIR."/include_files.php");
?>