<?php
require_once 'config.php';
require_once $config['libpath'] . '/D2LAppContextFactory.php';

$host = $config['host'];                 
$port=443;
$scheme = 'https';
$appId = $config['appId'];           
$appKey = $config['appKey'];          
$userId = $config['userId'];         
$userKey = $config['userKey'];        
$apiRequest = '/d2l/api/lp/1.0/organization/info';
$apiMethod = 'GET';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Rock Eagle 2017 Demo 02</title>
    <style type = "text/css">
        table.plain
        {
          border-color: transparent;
          border-collapse: collapse;
        }

        table td.plain
        {
          padding: 5px;
          border-color: transparent;
        }

        table th.plain
        {
          padding: 6px 5px;
          text-align: left;
          border-color: transparent;
        }

        tr:hover
        {
            background-color: transparent !important;
        }

        .error
        {
            color: #FF0000;
        }
        pre
        {
          font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
          margin-bottom: 10px;
          overflow: auto;
          width: auto;
          padding: 5px;
          background-color: #eee;
          width: 650px!ie7;
          padding-bottom: 20px!ie7;
          max-height: 600px;
        }
    </style>
    <script src="sample.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type = "text/javascript"></script>
</head>
<body>


<h3>Demo 2: Retrieve Org Information:</h3>
<!--
    <table>
        <tr><td width=100px><b>App ID:</b></td><td>**************</td><tr>
        <tr><td width=100px><b>App Key:</b></td><td>**************</td><tr>
        <tr><td width=100px><b>User ID:</b></td><td></td><tr>
        <tr><td width=100px><b>User Key:</b></td><td>*********************</td><tr>
        <tr><td width=100px><b>Host:</b></td><td>goqa.view.usg.edu</td><tr>
        <tr><td width=100px><b>Port:</b></td><td>443</td><tr>
        <tr><td width=100px><b>Scheme:</b></td><td>https</td><tr>
        <tr><td width=100px><b>URL:</b></td><td>/d2l/api/versions/</td><tr>
        <tr><td width=100px><b>Method:</b></td><td>GET</td><tr>
    </table>
-->
    <h3>PHP Code to make Webservices request</h3>
<pre>
// include php library files
require_once 'config.php';
require_once $config['libpath'] . '/D2LAppContextFactory.php';

// Define required variables
$host       =   'goqa.view.usg.edu';
$port       =   '443';
$scheme     =   'https';
$appId      =   '*****************';
$appKey     =   '*****************';
$userId     =   '';
$userKey    =   '*********************';
<font color='red'>$apiRequest =   '/d2l/api/lp/1.0/organization/info';
$apiMethod  =   'GET';
$data       =   '';</font>

// Create a new auth object
$authContextFactory = new D2LAppContextFactory();
$authContext        = $authContextFactory->createSecurityContext($appId, $appKey);
$hostSpec           = new D2LHostSpec($host, $port, $scheme);
$opContext          = $authContext->createUserContextFromHostSpec($hostSpec, $userId, $userKey);

//initiliaze CURL
$ch = curl_init();
$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CAINFO => getcwd().'/cacert.pem',
    );

curl_setopt_array($ch, $options);

$tryAgain = true;
$numAttempts = 1;
while ($tryAgain && $numAttempts < 5) {
    $uri = $opContext->createAuthenticatedUri($apiRequest, $apiMethod);

    curl_setopt($ch, CURLOPT_URL, $uri);
    switch($apiMethod) {
        case 'POST':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
        case 'GET':
            break;
    }
    $response = curl_exec($ch);
    $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    $responseCode = $opContext->handleResult($response, $httpCode, $contentType);

    if ($responseCode == D2LUserContext::RESULT_OKAY) {
        $ret = "$response";
        $tryAgain = false;
    } elseif ($responseCode == D2LUserContext::RESULT_INVALID_TIMESTAMP) {
        // Try again since time skew should now be fixed.
        $tryAgain = true;
    } else {
        if($httpCode == 302) {
            // This usually happens when a call is made non-anonymously prior to logging in.
            // The D2L server will send a redirect to the log in page.
            $ret = "Redirect encountered (need to log in for this API call?) (HTTP status 302)";
        } else {
            $ret = "{$errorArray[$responseCode]} (HTTP status $httpCode)";
        }
        $tryAgain = false;
        $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
        header($protocol . ' ' . '400 Bad Request');
        $GLOBALS['http_response_code'] = $httpCode;
    }
    $numAttempts++;
}

curl_close($ch);
echo $ret;

</pre>
    
    <h3>Response from D2L</h3>

</body>
</html>

<?php

$authContextFactory = new D2LAppContextFactory();
$authContext = $authContextFactory->createSecurityContext($appId, $appKey);
$hostSpec = new D2LHostSpec($host, $port, $scheme);

$opContext = $authContext->createUserContextFromHostSpec($hostSpec, $userId, $userKey);

$ch = curl_init();
$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CAINFO => getcwd().'/cacert.pem',
//    CURLOPT_SSL_VERIFYPEER => false,
    );

curl_setopt_array($ch, $options);

$tryAgain = true;
$numAttempts = 1;
while ($tryAgain && $numAttempts < 5) {
    $uri = $opContext->createAuthenticatedUri($apiRequest, $apiMethod);

    curl_setopt($ch, CURLOPT_URL, $uri);
    switch($apiMethod) {
        case 'POST':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
        case 'GET':
            break;
    }
    $response = curl_exec($ch);
    $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    $responseCode = $opContext->handleResult($response, $httpCode, $contentType);

    if ($responseCode == D2LUserContext::RESULT_OKAY) {
        $ret = "$response";
        $tryAgain = false;
    } elseif ($responseCode == D2LUserContext::RESULT_INVALID_TIMESTAMP) {
        // Try again since time skew should now be fixed.
        $tryAgain = true;
    } else {
        if($httpCode == 302) {
            // This usually happens when a call is made non-anonymously prior to logging in.
            // The D2L server will send a redirect to the log in page.
            $ret = "Redirect encountered (need to log in for this API call?) (HTTP status 302)";
        } else {
            $ret = "{$errorArray[$responseCode]} (HTTP status $httpCode)";
        }
        $tryAgain = false;
        $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
        header($protocol . ' ' . '400 Bad Request');
        $GLOBALS['http_response_code'] = $httpCode;
    }
    $numAttempts++;
}

curl_close($ch);
echo $ret;

?>                
                            

