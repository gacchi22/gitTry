@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>本文のコンテンツです。</p>
    <!--<p>必要なだけ記載できます。</p>-->
    <table>
        @foreach($data as $item)
        <tr>
            <th>{{$item['name']}}</th>
            <td>{{$item['mail']}}</td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footbar')
copyright 2020 funtech.
@endsection