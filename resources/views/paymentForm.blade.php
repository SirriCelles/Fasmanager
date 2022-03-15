@extends('layouts.ndesign')

@section('main_content')
<form action="{{route('momoPayment.process')}}" method="post">
        <input name="phone" type="number" />
        <input name="amount" type="number" value="10"/>
        <input type="submit" value="pay" />
        {{csrf_field()}}
    </form>
    
@endsection