<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;

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
public function index(Request $request)
{
    return view('hello.index', ['data'=>$request->data]);
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

public function post(Request $request){
    $msg = $request->msg;
    $data = ['msg' => 'こんにちは、'.$msg.'さん！',];
    return view('hello.index', $data);
}

public function validateForm(Request $request){
    return view('hello.validate', ['msg'=>'フォームを入力:']);
}

public function validatePost(HelloRequest $request){
    return view('hello.validate', ['msg' => '正しく入力されました！']);
}

}
