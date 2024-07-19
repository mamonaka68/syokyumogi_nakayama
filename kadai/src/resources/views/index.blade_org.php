@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="header__wrap">
    <p class="header__text"> {{ \Auth::user()->name }} さん お疲れ様です!  </p>
</div>

<form class="form__wrap" action="/work" method="post">
    @csrf 
  <div class="form__item">
      <button class="form__item-button" type="submit" name="work_start">勤務開始</button>
  </div>
  <div class="form__item">
      <button class="form__item-button" type="submit" name="work_end">勤務終了</button>
  </div>
  <div class="form__item">
      <button class="form__item-button" type="submit" name="break_start">休憩開始</button>
  </div>
  <div class="form__item">
      <button class="form__item-button" type="submit" name="break_end">休憩終了</button>
  </div>
</form>
@endsection