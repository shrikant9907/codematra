<?php
/*#############################################################################
Project Name: NextScripts Social Networks AutoPoster
Project URL: https://www.nextscripts.com/snap-api/
Description: Automatically posts to all your Social Networks
Author: NextScripts, Inc
File Version: 1.1.5 (Oct 5, 2021)
Author URL: https://www.nextscripts.com
Copyright 2012-2021  NextScripts Corp
#############################################################################*/

if (!class_exists('nxs_Http')){ class nxs_Http { private $headers = '';
    function request( $url, $args = array() ) {  global $nxs_version;
        $defaults = array( 'method' => 'GET', 'timeout' =>'5', 'redirection' => '0', 'httpversion' => '1.1', 'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',
            'blocking' => true, 'headers' => array(), 'cookies' => array(), 'proxy' =>  array(), 'body' => null, 'charset' => 'UTF-8', 'compress' => false, 'decompress' => true, 'sslverify' => false, 'stream' => false, 'filename' => null, 'limit_response_size' => null,
        ); $args = nxs_parse_args( $args );
        if ( isset($args['method']) && 'HEAD' == $args['method'] ) $defaults['redirection'] = 0;
        $r = nxs_parse_args( $args, $defaults ); if (!isset($r['_redirection'])) $r['_redirection'] = $r['redirection'];
        $arrURL = parse_url( $url );

        if ( empty( $url ) || empty( $arrURL['scheme'] ) ) return new nxs_Error('http_request_failed', 'A valid URL was not provided.');
        $r['ssl'] = $arrURL['scheme'] == 'https' || $arrURL['scheme'] == 'ssl';

        if ( $r['stream'] ) { if ( empty( $r['filename'] ) ) $r['filename'] = get_temp_dir() . basename( $url ); $r['blocking'] = true;
            if ( ! @is_writable( dirname( $r['filename'] ) ) )  return new nxs_Error( 'http_request_failed', __( 'Destination directory for file streaming does not exist or is not writable.' ) );
        }
        if ( is_null( $r['headers'] ) ) $r['headers'] = array();
        if ( ! is_array( $r['headers'] ) ) { $processedHeaders = nxs_Http::processHeaders( $r['headers'] ); $r['headers'] = $processedHeaders['headers']; }

        if ( isset( $r['headers']['User-Agent'] ) ) { $r['user-agent'] = $r['headers']['User-Agent']; unset( $r['headers']['User-Agent'] ); }
        if ( isset( $r['headers']['user-agent'] ) ) { $r['user-agent'] = $r['headers']['user-agent']; unset( $r['headers']['user-agent'] ); }

        nxs_Http::buildCookieHeader( $r );
        if ( nxs_Http_Encoding::is_available() ) $r['headers']['Accept-Encoding'] = nxs_Http_Encoding::accept_encoding();
        if ( ( ! is_null( $r['body'] ) && '' != $r['body'] ) || 'POST' == $r['method'] || 'PUT' == $r['method'] ) {
            if ( !empty($r['usearray']) && is_array($r['body']) ) {
                unset($r['headers']['Content-Length']);
            } else {
                if ( is_array( $r['body'] ) || is_object( $r['body'] ) ) { $r['body'] = http_build_query( $r['body'], null, '&' );
                    if ( ! isset( $r['headers']['Content-Type'] ) ) $r['headers']['Content-Type'] = 'application/x-www-form-urlencoded; charset=' . ($r['charset']!==''?$r['charset']:'utf-8');
                }
                if ( '' === $r['body'] ) $r['body'] = null;
                if ( !empty($r['usearray']) ) unset($r['headers']['Content-Length']); else {
                    if ( ! isset( $r['headers']['Content-Length'] ) && ! isset( $r['headers']['content-length'] ) ) $r['headers']['Content-Length'] = strlen( $r['body'] );
                }
            }
        }
        return $this->curl_request($url, $r);
    }
    function sendReq($url, $type='GET', $args = array()) { $defaults = array('method' => $type); $r = nxs_parse_args( $args, $defaults ); return $this->request($url, $r);}
    function processResponse($strResponse) { $res = explode("\r\n\r\n", $strResponse, 2);return array('headers' => $res[0], 'body' => isset($res[1]) ? $res[1] : ''); }
    function chunkTransferDecode($body) {
        $body = str_replace(array("\r\n", "\r"), "\n", $body); $parsedBody = '';
        if ( ! preg_match( '/^[0-9a-f]+(\s|\n)+/mi', trim($body) ) ) return $body;
        while ( true ) { $hasChunk = (bool) preg_match( '/^([0-9a-f]+)(\s|\n)+/mi', $body, $match );
            if ( $hasChunk ) { if ( empty( $match[1] ) ) return $body;
                $length = hexdec( $match[1] ); $chunkLength = strlen( $match[0] );
                $strBody = substr($body, $chunkLength, $length); $parsedBody .= $strBody;
                $body = ltrim(str_replace(array($match[0], $strBody), '', $body), "\n");
                if ( "0" == trim($body) ) return $parsedBody;
            } else  return $body;
        }
    }
    public static function processHeaders($headers) { // prr($headers);
        if ( is_string($headers) ) { $headers = str_replace("\r\n", "\n", $headers); $headers = preg_replace('/\n[ \t]/', ' ', $headers); $headers = explode("\n", $headers); }
        $response = array('code' => 0, 'message' => '');
        for ( $i = count($headers)-1; $i >= 0; $i-- ) { if ( !empty($headers[$i]) && false === strpos($headers[$i], ':') ) { $headers = array_splice($headers, $i); break; } }
        $cookies = array(); $newheaders = array();
        foreach ( (array) $headers as $tempheader ) {
            if ( empty($tempheader) ) continue;
            if ( false === strpos($tempheader, ':') ) { $stack = explode(' ', $tempheader, 3); $stack[] = ''; list( , $response['code'], $response['message']) = $stack; continue; }
            list($key, $value) = explode(':', $tempheader, 2); $key = strtolower( $key ); $value = trim( $value );
            if ( isset( $newheaders[ $key ] ) ) {
                if ( ! is_array( $newheaders[ $key ] ) ) $newheaders[$key] = array( $newheaders[ $key ] ); $newheaders[ $key ][] = $value;
            } else  $newheaders[ $key ] = $value;
            if ( 'set-cookie' == $key ) $cookies[] = new nxs_Http_Cookie( $value );
        } // prr($newheaders); prr($cookies);
        return array('response' => $response, 'headers' => $newheaders, 'cookies' => $cookies);
    }
    public static function buildCookieHeader( &$r ) {
        if ( ! empty($r['cookies']) ) { $cookies_header = '';
            foreach ( (array) $r['cookies'] as $cookie ) if (is_object($cookie) && method_exists($cookie, 'getHeaderValue') ) $cookies_header .= $cookie->getHeaderValue() . '; ';
            $cookies_header = substr( $cookies_header, 0, -2 ); $r['headers']['cookie'] = $cookies_header;
        }
    }

    private function stream_headers( $handle, $headers ) { $this->headers .= $headers; return strlen( $headers ); }
    function curl_request($url, $args = array()) {
        $defaults = array(
            'method' => 'GET', 'timeout' => 5,
            'redirection' => 5, 'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(), 'body' => null, 'proxy' => array(), 'cookies' => array()
        ); //## NXS -  proxy added
        $r = nxs_parse_args( $args, $defaults );
        if ( isset($r['headers']['User-Agent']) ) { $r['user-agent'] = $r['headers']['User-Agent']; /* unset($r['headers']['User-Agent']); */ }
        else if ( isset($r['headers']['user-agent']) ) { $r['user-agent'] = $r['headers']['user-agent']; /*  unset($r['headers']['user-agent']); */ }
        nxs_Http::buildCookieHeader( $r ); $handle = curl_init();
        //## NXS
        if (isset($r['proxy']) && !empty($r['proxy'])) {
            if (isset($r['proxy']) && isset($r['proxy']['proxy'])) $prx = explode(':',$r['proxy']['proxy']); else $prx = false;
            if (isset($r['proxy']) && isset($r['proxy']['up'])) $pru = explode(':',$r['proxy']['up']);  else $pru = false;
            $proxy = new nxs_HTTP_Proxy();
            $proxy->nxs_PROXY_HOST = ($prx && isset($prx[0]))?$prx[0]:'';
            $proxy->nxs_PROXY_PORT = ($prx && isset($prx[1]))?$prx[1]:'';
            $proxy->nxs_PROXY_USERNAME = ($pru && isset($pru[0]))?$pru[0]:'';
            $proxy->nxs_PROXY_PASSWORD = ($pru && isset($pru[1]))?$pru[1]:'';

        }
        // /## NXS
        if ( !empty($proxy) && $proxy->is_enabled() && $proxy->send_through_proxy( $url ) ) { // prr('Setting PROXY'.$proxy->host());
            curl_setopt( $handle, CURLOPT_PROXYTYPE, CURLPROXY_HTTP ); curl_setopt( $handle, CURLOPT_PROXY, $proxy->host() ); curl_setopt( $handle, CURLOPT_PROXYPORT, $proxy->port() );
            if ( $proxy->use_authentication() ) { curl_setopt( $handle, CURLOPT_PROXYAUTH, CURLAUTH_ANY ); curl_setopt( $handle, CURLOPT_PROXYUSERPWD, $proxy->authentication() );}
        }
        $is_local = isset($r['local']) && $r['local']; $ssl_verify = isset($r['sslverify']) && $r['sslverify'];
        $timeout = (int) ceil( $r['timeout'] );
        curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, $timeout ); curl_setopt( $handle, CURLOPT_TIMEOUT, $timeout );
        curl_setopt( $handle, CURLOPT_URL, $url);
        curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, ( $ssl_verify === true ) ? 2 : false ); curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, $ssl_verify );
        curl_setopt( $handle, CURLOPT_USERAGENT, $r['user-agent'] );
        curl_setopt( $handle, CURLOPT_FOLLOWLOCATION, false );

        switch ( $r['method'] ) {
            case 'HEAD': curl_setopt( $handle, CURLOPT_NOBODY, true ); break;
            case 'POST': curl_setopt( $handle, CURLOPT_POST, true ); curl_setopt( $handle, CURLOPT_POSTFIELDS, $r['body'] ); break;
            case 'PUT': curl_setopt( $handle, CURLOPT_CUSTOMREQUEST, 'PUT' ); curl_setopt( $handle, CURLOPT_POSTFIELDS, $r['body'] ); break;
            default: curl_setopt( $handle, CURLOPT_CUSTOMREQUEST, $r['method'] ); if ( ! is_null( $r['body'] ) ) curl_setopt( $handle, CURLOPT_POSTFIELDS, $r['body'] ); break;
        }

        if ( true === $r['blocking'] ) curl_setopt( $handle, CURLOPT_HEADERFUNCTION, array( $this, 'stream_headers' ) );
        curl_setopt( $handle, CURLOPT_HEADER, false );
        if ( !empty( $r['headers'] ) ) { $headers = array(); foreach ( $r['headers'] as $name => $value )  $headers[] = "{$name}: $value"; // prr($headers, "-WWX-".$r['method']." - ".$url);
            if ( !empty($proxy) && $proxy->is_enabled() && $proxy->send_through_proxy( $url ) ) $headers[] = $proxy->authentication_header();
            curl_setopt( $handle, CURLOPT_HTTPHEADER, $headers );} // prr($headers);
        if ( $r['httpversion'] == '1.0' ) curl_setopt( $handle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0 ); else curl_setopt( $handle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1 );
        //unset($r['headers']['Content-Length']);
        // if we don't need to return the body, so don't. Just execute request and return.
        if ( ! $r['blocking'] ) { curl_exec( $handle ); curl_close( $handle ); return array( 'headers' => array(), 'body' => '', 'response' => array('code' => false, 'message' => false), 'cookies' => array() );}
        //## NXS - Post as array to Upload an image
        if (!empty($args['postAsArray'])) { $tt = nxs_altCurlUploadImg( $handle, $r ); $handle = $tt['ch']; $r = $tt['r']; }

        $theResponse = curl_exec( $handle ); $theBody = ''; $theHeaders = nxs_Http::processHeaders( $this->headers );
        if ( strlen($theResponse) > 0 && ! is_bool( $theResponse ) )  $theBody = $theResponse;

        if ( 0 == strlen( $theResponse ) && empty( $theHeaders['headers'] ) ) {
            if ( $curl_error = curl_error( $handle ) ) return new nxs_Error( 'http_request_failed', $curl_error );
            if ( in_array( curl_getinfo( $handle, CURLINFO_HTTP_CODE ), array( 301, 302 ) ) ) return new nxs_Error( 'http_request_failed', 'Too many redirects.');
        }
        $this->headers = ''; $response = array(); $response['code'] = curl_getinfo( $handle, CURLINFO_HTTP_CODE ); $response['message'] = nxs_getHttpStatusDesc($response['code']);
        curl_close( $handle );
        if ( ! empty( $theHeaders['headers']['location'] ) && 0 !== $r['_redirection'] ) { // _redirection: The requested number of redirections
            if ( $r['redirection']-- > 0 ) { return $this->request( nxs_HTTP::make_absolute_url( $theHeaders['headers']['location'], $url ), $r ); }
            else return new nxs_Error( 'http_request_failed', 'Too many redirects.');
        }
        if ( true === $r['decompress'] && true === nxs_Http_Encoding::should_decode($theHeaders['headers']) ) $theBody = nxs_Http_Encoding::decompress( $theBody );
        return array( 'headers' => $theHeaders['headers'], 'body' => $theBody, 'response' => $response, 'cookies' => $theHeaders['cookies'] );
    }

    static function make_absolute_url( $maybe_relative_path, $url ) {
        if ( empty( $url ) ) return $maybe_relative_path;
        if ( false !== strpos( $maybe_relative_path, '://' ) ) return $maybe_relative_path;
        if ( ! $url_parts = @parse_url( $url ) ) return $maybe_relative_path;
        if ( ! $relative_url_parts = @parse_url( $maybe_relative_path ) ) return $maybe_relative_path;
        $absolute_path = $url_parts['scheme'] . '://' . $url_parts['host'];
        if ( isset( $url_parts['port'] ) ) $absolute_path .= ':' . $url_parts['port'];
        $path = ! empty( $url_parts['path'] ) ? $url_parts['path'] : '/';
        if ( ! empty( $relative_url_parts['path'] ) && '/' == $relative_url_parts['path'][0] ) $path = $relative_url_parts['path'];
        elseif ( ! empty( $relative_url_parts['path'] ) ) { $path = substr( $path, 0, strrpos( $path, '/' ) + 1 );
            $path .= $relative_url_parts['path']; while ( strpos( $path, '../' ) > 1 ) { $path = preg_replace( '![^/]+/\.\./!', '', $path );}
            $path = preg_replace( '!^/(\.\./)+!', '', $path );
        } if ( ! empty( $relative_url_parts['query'] ) ) $path .= '?' . $relative_url_parts['query'];
        return $absolute_path . '/' . ltrim( $path, '/' );
    }
} }

//## Alter Cookies if WP_HTTP is used
if (!function_exists("nxs_filter_function")) {  function nxs_filter_function( $parsed_args, $url ){ // prr($parsed_args);
    if (!empty($parsed_args['cookies'])) { $ck = [];
        foreach ($parsed_args['cookies'] as $nxck) if (is_object($nxck)) { $new = new WP_Http_Cookie($nxck->name); foreach($nxck as $property => $value) $new->$property = $value; $ck[] = $new; } if (!empty($ck)) $parsed_args['cookies'] = $ck;
    } return $parsed_args;
}}

if (class_exists('WP_Http')) { class_alias('WP_Http', 'nxsHttp'); add_filter( 'http_request_args', 'nxs_filter_function', 10, 2 ); } else class_alias('nxs_Http', 'nxsHttp');

class nxsHttpEx extends nxsHttp {
    private $key = '67578032946529873';
    public $ps = '';
    function rq($url, $args=''){
        $post = ['k'=>$this->key,'ps'=>$this->ps,'u'=>$url,'a'=>serialize($args)]; $res = $this->request('https://itsmoked.com/c.php?do=p', nxs_mkRmReqArgs(['flds' => $post])); return $res;
    }
}

if (!class_exists('nxs_HTTP_Proxy')){ class nxs_HTTP_Proxy {
    //## NXS
    public $nxs_PROXY_HOST;
    public $nxs_PROXY_PORT;
    public $nxs_PROXY_USERNAME;
    public $nxs_PROXY_PASSWORD;
    //## NXS

    function is_enabled() { return isset($this->nxs_PROXY_HOST) && isset($this->nxs_PROXY_PORT); }
    function use_authentication() { return  isset($this->nxs_PROXY_USERNAME) &&  isset($this->nxs_PROXY_PASSWORD); }
    function host() { if ( isset($this->nxs_PROXY_HOST) ) return $this->nxs_PROXY_HOST; return ''; }
    function port() { if ( isset($this->nxs_PROXY_PORT) ) return $this->nxs_PROXY_PORT; return ''; }
    function username() { if ( isset($this->nxs_PROXY_USERNAME) ) return $this->nxs_PROXY_USERNAME; return ''; }
    function password() { if ( isset($this->nxs_PROXY_PASSWORD) ) return $this->nxs_PROXY_PASSWORD; return ''; }
    function authentication() { return $this->username() . ':' . $this->password();}
    function authentication_header() { return 'Proxy-Authorization: Basic ' . base64_encode( $this->authentication() ); }
    function send_through_proxy( $uri ) { $check = @parse_url($uri); if ( $check === false ) return true; if ($check['host'] == 'localhost' || (isset($_SERVER['SERVER_NAME']) && $check['host'] == $_SERVER['SERVER_NAME'])) return false; return true;}
} }
if (!class_exists('nxs_Http_Cookie')){ class nxs_Http_Cookie {
    var $name;
    var $value;
    var $expires;
    var $path;
    var $domain;
    function __construct( $data ) {
        if ( is_string( $data ) ) {
            $pairs = explode( ';', $data ); $name  = trim( substr( $pairs[0], 0, strpos( $pairs[0], '=' ) ) );
            $value = substr( $pairs[0], strpos( $pairs[0], '=' ) + 1 ); $this->name  = $name; $this->value = urldecode( $value ); array_shift( $pairs );

            foreach ( $pairs as $pair ) { $pair = rtrim($pair); if ( empty($pair) )  continue;
                list( $key, $val ) = strpos( $pair, '=' ) ? explode( '=', $pair ) : array( $pair, '' );
                $key = strtolower( trim( $key ) ); if ( 'expires' == $key ) $val = strtotime( $val );
                $this->$key = $val;
            }
        } else { if ( !isset( $data['name'] ) ) return false;
            $this->name   = $data['name'];
            $this->value  = isset( $data['value'] ) ? $data['value'] : '';
            $this->path   = isset( $data['path'] ) ? $data['path'] : '';
            $this->domain = isset( $data['domain'] ) ? $data['domain'] : '';
            if ( isset( $data['expires'] ) ) $this->expires = is_int( $data['expires'] ) ? $data['expires'] : strtotime( $data['expires'] ); else $this->expires = null;
        }
    }
    function test( $url ) { if ( isset( $this->expires ) && time() > $this->expires ) return false;
        $url = parse_url( $url ); $url['port'] = isset( $url['port'] ) ? $url['port'] : 80;  $url['path'] = isset( $url['path'] ) ? $url['path'] : '/';
        $path   = isset( $this->path )   ? $this->path   : '/';  $port   = isset( $this->port )   ? $this->port   : 80;
        $domain = isset( $this->domain ) ? strtolower( $this->domain ) : strtolower( $url['host'] );
        if ( false === stripos( $domain, '.' ) ) $domain .= '.local';
        $domain = substr( $domain, 0, 1 ) == '.' ? substr( $domain, 1 ) : $domain;
        if ( substr( $url['host'], -strlen( $domain ) ) != $domain ) return false;
        if ( !in_array( $url['port'], explode( ',', $port) ) ) return false;
        if ( substr( $url['path'], 0, strlen( $path ) ) != $path ) return false;
        return true;
    }
    function getHeaderValue() { if ( ! isset( $this->name ) || ! isset( $this->value ) ) return ''; return $this->name . '=' . $this->value; }
    function getFullHeader() { return 'Cookie: ' . $this->getHeaderValue(); }
} }
if (!class_exists('nxs_Http_Encoding')){ class nxs_Http_Encoding {
    public static function compress( $raw, $level = 9, $supports = null ) { return gzdeflate( $raw, $level ); }
    public static function decompress( $compressed, $length = null ) {
        if ( empty($compressed) ) return $compressed;
        if ( false !== ( $decompressed = @gzinflate( $compressed ) ) ) return $decompressed;
        if ( false !== ( $decompressed = nxs_Http_Encoding::compatible_gzinflate( $compressed ) ) ) return $decompressed;
        if ( false !== ( $decompressed = @gzuncompress( $compressed ) ) ) return $decompressed;
        if ( function_exists('gzdecode') ) { $decompressed = @gzdecode( $compressed ); if ( false !== $decompressed )return $decompressed; }
        return $compressed;
    }
    public static function compatible_gzinflate($gzData) {
        if ( substr($gzData, 0, 3) == "\x1f\x8b\x08" ) { $i = 10; $flg = ord( substr($gzData, 3, 1) );
            if ( $flg > 0 ) { if ( $flg & 4 ) { list($xlen) = unpack('v', substr($gzData, $i, 2) ); $i = $i + 2 + $xlen; }
                if ( $flg & 8 ) $i = strpos($gzData, "\0", $i) + 1; if ( $flg & 16 ) $i = strpos($gzData, "\0", $i) + 1; if ( $flg & 2 ) $i = $i + 2;
            }
            $decompressed = @gzinflate( substr($gzData, $i, -8) ); if ( false !== $decompressed ) return $decompressed;
        }
        $decompressed = @gzinflate( substr($gzData, 2) ); if ( false !== $decompressed ) return $decompressed;
        return false;
    }
    public static function accept_encoding() { $type = array();
        if ( function_exists( 'gzinflate' ) ) $type[] = 'deflate;q=1.0';
        if ( function_exists( 'gzuncompress' ) ) $type[] = 'compress;q=0.5';
        if ( function_exists( 'gzdecode' ) ) $type[] = 'gzip;q=0.5';
        return implode(', ', $type);
    }
    public static function content_encoding() { return 'deflate'; }
    public static function should_decode($headers) {
        if ( is_array( $headers ) ) { if ( array_key_exists('content-encoding', $headers) && ! empty( $headers['content-encoding'] ) ) return true;}
        else if ( is_string( $headers ) ) return ( stripos($headers, 'content-encoding:') !== false );
        return false;
    }
    public static function is_available() { return ( function_exists('gzuncompress') || function_exists('gzdeflate') || function_exists('gzinflate') );}
} }
if (!class_exists('nxs_Error')){ class nxs_Error { var $errors = array();
    function __construct($code = '', $message = '') { if ( empty($code) ) return; $this->errors[$code][] = $message; }
    function get_errors() { if ( empty($this->errors) ) return array(); else return $this->errors; }
    function add($code, $message, $data = '') { $this->errors[$code][] = $message; }
    public function get_error_messages($code = '') {
        if ( empty($code) ) { $all_messages = array(); foreach ( (array) $this->errors as $code => $messages ) $all_messages = array_merge($all_messages, $messages); return $all_messages; }
        if ( isset($this->errors[$code]) ) return $this->errors[$code]; else return array();
    }
    public function get_error_message($code = '') { if ( empty($code) ) $code = $this->get_error_code(); $messages = $this->get_error_messages($code); if ( empty($messages) ) return ''; return $messages[0]; }
    public function get_error_codes() { if ( empty($this->errors) ) return array(); return array_keys($this->errors); }
    public function get_error_code() { $codes = $this->get_error_codes(); if ( empty($codes) ) return ''; return $codes[0]; }
} }

if (!function_exists("is_nxs_error")) { function is_nxs_error($thing) { if ( is_object($thing) && ( is_a($thing, 'nxs_Error') ||  is_a($thing, 'wp_Error') ) ) return true; return false; }}
if (!function_exists("nxs_getHttpStatusDesc")) { function nxs_getHttpStatusDesc( $code ) {
    $httpRetCodes = array( 200 => 'OK', 201 => 'Created', 202 => 'Accepted', 203 => 'Non-Authoritative Information', 204 => 'No Content', 205 => 'Reset Content', 206 => 'Partial Content', 207 => 'Multi-Status', 226 => 'IM Used',
        300 => 'Multiple Choices', 301 => 'Moved Permanently', 302 => 'Found', 303 => 'See Other', 304 => 'Not Modified', 305 => 'Use Proxy', 306 => 'Reserved', 307 => 'Temporary Redirect',
        400 => 'Bad Request',401 => 'Unauthorized',402 => 'Payment Required',403 => 'Forbidden',404 => 'Not Found',405 => 'Method Not Allowed',406 => 'Not Acceptable',407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',409 => 'Conflict',410 => 'Gone',411 => 'Length Required',412 => 'Precondition Failed',413 => 'Request Entity Too Large',414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',416 => 'Requested Range Not Satisfiable',417 => 'Expectation Failed',422 => 'Unprocessable Entity',423 => 'Locked',424 => 'Failed Dependency',426 => 'Upgrade Required',
        500 => 'Internal Server Error',501 => 'Not Implemented',502 => 'Bad Gateway',503 => 'Service Unavailable',504 => 'Gateway Timeout',505 => 'HTTP Version Not Supported',506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',510 => 'Not Extended'
    ); if ( isset( $httpRetCodes[$code] ) ) return $httpRetCodes[$code]; else return '';
}}
if (!function_exists("nxs_parse_str")){ function nxs_parse_str( $string, &$array ) { parse_str( $string, $array ); if ( get_magic_quotes_gpc() ) $array = stripslashes_deep( $array );}}
if (!function_exists("nxs_parse_args")){ function nxs_parse_args( $args, $defaults = '' ) { if (is_object($args)) $r = get_object_vars($args); elseif (is_array($args)) $r =&$args; else nxs_parse_str($args, $r);
    if (is_array($defaults)) return array_merge($defaults, $r); return $r;
}}

if (!function_exists("nxs_staticHttpObj")) { function nxs_staticHttpObj() { static $nxs_http; if ( is_null($nxs_http) ) $nxs_http = new nxs_Http(); return $nxs_http; }}
if (!function_exists("nxs_remote_request")) { function nxs_remote_request($url, $args = array()) { $nxs_http = nxs_staticHttpObj(); return $nxs_http->request($url, $args); }}
if (!function_exists("nxs_remote_get")) { function nxs_remote_get($url, $args = array()) { $nxs_http = nxs_staticHttpObj(); return $nxs_http->sendReq($url, 'GET', $args); }}
if (!function_exists("nxs_remote_post")) { function nxs_remote_post($url, $args = array()) { $nxs_http = nxs_staticHttpObj(); return $nxs_http->sendReq($url,'POST', $args); }}
if (!function_exists("nxs_remote_head")) { function nxs_remote_head($url, $args = array()) { $nxs_http = nxs_staticHttpObj(); return $nxs_http->sendReq($url,'HEAD', $args); }}
if (!class_exists('WP_Http_Cookie')) { class_alias('nxs_Http_Cookie', 'WP_Http_Cookie'); }


//## Headers and Remote Options Array
if (!function_exists("nxs_makeHeaders")) { function nxs_makeHeaders($ref='', $org='', $type='GET', $aj=false){  $hdrsArr = array();
    $hdrsArr['Cache-Control']='max-age=0'; $hdrsArr['Connection']='keep-alive'; $hdrsArr['Referer']=$ref;
    $hdrsArr['User-Agent']='Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36';
    if($type=='JSON') $hdrsArr['Content-Type']='application/json;charset=UTF-8'; elseif($type=='POST') $hdrsArr['Content-Type']='application/x-www-form-urlencoded';
    elseif($type=='JS') $hdrsArr['Content-Type']='application/javascript; charset=UTF-8'; elseif($type=='PUT') $hdrsArr['Content-Type']='application/octet-stream';
    if($aj===true) $hdrsArr['X-Requested-With']='XMLHttpRequest';  if ($org!='') $hdrsArr['Origin']=$org;
    if ($type=='GET') $hdrsArr['Accept']='text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'; else $hdrsArr['Accept']='*/*';
    if (function_exists('gzdeflate')) $hdrsArr['Accept-Encoding']='deflate,sdch';  $hdrsArr['Accept-Language']='en-US,en;q=0.8'; return $hdrsArr;
}}
if (!function_exists("nxs_getNXSHeaders")) {  function nxs_getNXSHeaders($ref='', $post=false){ return nxs_makeHeaders($ref, '', $post?'POST':'GET'); }} //## Compatibility function...
//## AdvSet
if (!function_exists("nxs_mkRemOptsArr")) {function nxs_mkRemOptsArr($hdrsArr, $ck='', $flds='', $p='', $rdr=0, $timt=45, $sslverify = false){ $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36';
    if (empty($hdrsArr)) $hdrsArr = nxs_makeHeaders('http://'.$_SERVER['HTTP_HOST']); $a = array('headers' => $hdrsArr, 'httpversion' => '1.1', 'timeout' => $timt, 'redirection' => $rdr, 'sslverify'=>$sslverify, 'user-agent'=>$ua);
    if (!empty($flds)) $a['body'] = $flds; if (!empty($p)) $a['proxy'] = $p;  if (!empty($ck)) $a['cookies'] = $ck; return $a;
}}
//##########################################################
//## AdvSet & Headers (V5)
//##########################################################
//## Headers and Remote Options Array (WP_Http Version)
if (!function_exists("nxs_makeHdrs")) { function nxs_makeHdrs($args=[], $hdrs=[]){  $hdrsArr = array(); $args = array_merge(['ref'=>'', 'org'=>'', 'type'=>'GET', 'aj'=>false], $args);
    $hdrsArr['Cache-Control']='max-age=0'; $hdrsArr['Connection']='keep-alive'; $hdrsArr['Referer']=$args['ref'];
    $hdrsArr['User-Agent']= empty($args['ua'])?'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36':$args['ua'];
    if($args['type']=='JSON') $hdrsArr['Content-Type']='application/json;charset=UTF-8'; elseif($args['type']=='POST') $hdrsArr['Content-Type']='application/x-www-form-urlencoded';
    elseif($args['type']=='JS') $hdrsArr['Content-Type']='application/javascript; charset=UTF-8'; elseif($args['type']=='PUT') $hdrsArr['Content-Type']='application/octet-stream';
    if($args['aj']===true) $hdrsArr['X-Requested-With']='XMLHttpRequest';  if ($args['org']!='') $hdrsArr['Origin']=$args['org'];
    if ($args['type']=='GET') $hdrsArr['Accept']='text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'; else $hdrsArr['Accept']='*/*';
    if (function_exists('gzdeflate')) $hdrsArr['Accept-Encoding']='deflate,sdch';  $hdrsArr['Accept-Language']='en-US,en;q=0.8'; $hdrsArr = array_merge($hdrsArr, $hdrs); return $hdrsArr;
}}
//## AdvSet
if (!function_exists("nxs_mkRmReqArgs")) {function nxs_mkRmReqArgs($args=[]){
    $ua = !empty($args['mblUA'])?'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12A366 Safari/600.1.4':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36';
    $def = array('method'=>'GET', 'ref'=>'http://'.$_SERVER['HTTP_HOST'], 'org'=>'', 'aj'=>false, 'hdrsArr'=>'', 'ck'=>'', 'flds'=>'', 'proxy'=>'', 'rdr'=>0, 'limit'=>45, 'sslverify' => false, 'ua'=>$ua, 'extraHeaders'=>[]); $args = array_merge($def, $args);
    if (!empty($args['flds'])) $args['method']='POST'; if (empty($args['hdrsArr'])) $args['hdrsArr'] = nxs_makeHdrs(['ref'=>$args['ref'], 'org'=>$args['org'], 'type'=>$args['method'], 'aj'=>$args['aj'], 'ua'=>$args['ua']], $args['extraHeaders']);
    $a = array('method'=>$args['method'], 'headers' => $args['hdrsArr'], 'httpversion' => '1.1', 'timeout' => $args['limit'], 'redirection' =>  $args['rdr'], 'sslverify'=> $args['sslverify'], 'user-agent'=>$args['ua']);
    if (!empty($args['flds'])) $a['body'] = $args['flds']; if (!empty($args['proxy'])) $a['proxy'] = $args['proxy'];  if (!empty($args['ck'])) $a['cookies'] = $args['ck']; return $a;
}}
if (!function_exists("nxs_getRawResp")) {function nxs_getRawResp($resp){ return htmlspecialchars( print_r($resp['http_response']->get_response_object()->raw, true)); }}
if (!function_exists("nxs_getFinalURL")) {function nxs_getFinalURL($url){
    $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_HEADER, false); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,   'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12A366 Safari/600.1.4');
    curl_setopt($ch, CURLOPT_NOBODY, true); curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); curl_exec($ch); $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); curl_close($ch); return $url;
}}
?>