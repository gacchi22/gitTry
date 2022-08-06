@extends('layouts.helloapp')
@section('title', 'validateForm')
@section('menubar')
    @parent
    バリデーション検証用フォーム
@endsection

@section('content')

    @if(count($errors) > 0)
        <P>入力に問題があります。再入力して下さい。</P>
        <div>
            <p>エラー一覧</p>
            <ul>
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <p>{{$msg}}</p>
    <form aciton="/hello/validate" method="post">
    <table>
        @csrf
        <tr><th>名前: </th><td>
        <input type="text" name="name" value="{{old('name')}}"> </td></tr>
        
        <tr><th>メールアドレス: </th><td>
        <input type="text" name="mail" value="{{old('mail')}}"></td></tr>
        
        <tr><th>問い合わせ内容: </th><td>
        <input type="text" name="inquiry" value="{{old('inquiry')}}"></td></tr>
    
        <tr><th></th><td><input type="submit" value="送信"></td></tr>
    </table>
    </form>
    
@endsection
