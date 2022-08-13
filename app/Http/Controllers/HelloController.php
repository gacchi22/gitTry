<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;

use Illuminate\Support\Facades\DB;

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
    $items = DB::select('select * from people');
    return view('hello.index', ['items' => $items]);
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

public function post(Request $request)
{
    $items = DB::select('select * from people');
    return view('hello.index', ['items' => $items]);
}

public function validateForm(Request $request){
    return view('hello.validate', ['msg'=>'フォームを入力:']);
}

public function validatePost(HelloRequest $request){
    return view('hello.validate', ['msg' => '正しく入力されました！']);
}

public function add(Request $request)
{
   // ページ表示時は処理を行わないため、ここではinsert処理は記載しない。
   return view('hello.add');
}

public function create(Request $request)
{
    $param = [
        'name' => $request->name,   // 入力：名前
        'mail' => $request->mail,   // 入力：メール
        'age' => $request->age,     // 入力：年齢
    ];
    // 入力された値を元に、insertを実施。idは自動採番のため不要
    DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
    // helloページに遷移する (redirect：リダイレクト処理)
    return redirect('/hello');
}

public function edit(Request $request)
{
    // クエリ文字列にidというパラメータがあるか確認し、配列を作成する
    $param = ['id' => $request->id]; 

    // 入力されたidパラメータをもとに、selectを実施
    $item = DB::select('select * from people where id = :id', $param);
    return view('hello.edit', ['form' => $item[0]]);
}

public function update(Request $request)
{
    $param = [
        'id' => $request->id,
        'name' => $request->name,
        'mail' => $request->mail,
        'age' => $request->age,
    ];
    DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
    return redirect('/hello');
}

public function del(Request $request)
{
    // クエリ文字列にidというパラメータがあるか確認し、配列を作成する
    $param = ['id' => $request->id];

    // 入力されたidパラメータをもとに、selectを実施
    $item = DB::select('select * from people where id = :id', $param);
    return view('hello.del', ['form' => $item[0]]);
}

public function remove(Request $request)
{
    $param = ['id' => $request->id];
    DB::delete('delete from people where id = :id', $param);
    return redirect('/hello');
}

}