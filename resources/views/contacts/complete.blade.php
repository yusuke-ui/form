@php
$title = 'お問い合わせ - 確認';
@endphp

@extends('layout')

@section
  <div class="text-center">
    <h1 class="text-center mt-2 mb-5">お問い合わせありがとうございました。</h1>
    <a href="{{ route('contact') }}" class="btn btn-primary">お問い合わせ入力画面に戻る</a>
  </div>
@endsection