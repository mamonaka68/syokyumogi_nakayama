@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="header__wrap">
    <p class="header__text"> {{ \Auth::user()->name }} さん お疲れ様です!  </p>
</div>

<form class="form__wrap" action="/work" method="post">
<!-- <form class="form__wrap" action="{{ route('work') }}" method="post"> -->
    @csrf 
  <div class="form__item">
    @if($status == 0)
      <button class="form__item-button" type="submit" name="work_start">勤務開始</button>
    @else
      <button class="form__item-button" type="submit" name="work_start" disabled>勤務開始</button>
    @endif
  </div>
  <div class="form__item">
    @if($status == 1)
      <button class="form__item-button" type="submit" name="work_end">勤務終了</button>
    @else
      <button class="form__item-button" type="submit" name="work_end" disabled>勤務終了</button>
    @endif
  </div>
  <div class="form__item">
    @if($status == 1)
      <button class="form__item-button" type="submit" name="break_start">休憩開始</button>
    @else
      <button class="form__item-button" type="submit" name="break_start" disabled>休憩開始</button>
    @endif
  </div>
  <div class="form__item">
    @if($status == 2)
      <button class="form__item-button" type="submit" name="break_end">休憩終了</button>
    @else
    <button class="form__item-button" type="submit" name="break_end" disabled>休憩終了</button>
    @endif
  </div>
</form>
@endsection