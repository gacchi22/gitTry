<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
// public function hello(){
    // return <<<EOF
    //   <html>
            // <head>
                // <title>Hello</title>
            // </head>
            // <body>
                // <h1>Hello</h1>
                // <p>Hello page.</p>
            // </body>
        // </html>
// EOF;
    // }
public function index($id='noname', $pass='unknown') {
    return <<<EOF
        <html>
            <head>
                <title>Hello/Index</title>
                <style>
                    body {font-size:16pt; color:#999; }
                    h1 { font-size:100pt; text-align:right; color:#999; margin:-40px 0px -50px 0px; }
                </style>
            </head>
            <body>
                <h1>Index</h1> 
                <p>this is indexAction in HelloController</p>
                <ul>
                    <li>ID: {$id}</li>
                    <li>PASS: {$pass}</li>                       
                </ul>
            </body>
        </html>
EOF;
    }
public function access(Request $request, Response $response) {
     $html = <<<EOF
        <html>
            <head>
            <title>Access</title>
            </head>
            <body>
            <h3>Request</h3>
            <pre>
EOF
.$request.
<<<EOF
            </pre>
            <h3>Response</h3>
            <pre>
EOF
.$response.
<<<EOF
            </pre>
            </body>
        </html>
EOF;
    $response->setContent($html);
    return $response;
}
}
