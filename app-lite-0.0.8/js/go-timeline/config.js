if(typeof JS_CONFIG == "undefined"){
	var JS_CONFIG = {};
}
JS_CONFIG.DEV = 1;
JS_CONFIG.ROOT_DIR = "/gomedia40/KIOSKS/kio-lite-0.0.1/";
JS_CONFIG.PATH_ARRAY = window.location.pathname.split('/');
JS_CONFIG.BASE_URL = window.location.origin+"/"+JS_CONFIG.PATH_ARRAY[1] + JS_CONFIG.ROOT_DIR;
JS_CONFIG.HOST = window.location.host+"/"+JS_CONFIG.PATH_ARRAY[1] ;
 