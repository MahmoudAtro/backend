@extends('main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container">
    <h1 style="color: blue;">Currency Converter</h1>
    <br>
    <br>
    <div class="row">
      <div class="col">
        <select name="currency" class="currency"> 
        	<option>select</option>
        </select>
        <input type="text" name="" id="input_currency">
      </div>
      <div class="col">
        <select name="currency" class="currency">
        	<option>select</option>
        </select>
        <input type="text" name="" id="output_currency" disabled>
      </div>
    </div>
    <button onClick="convert()">Convert</button>

    <a href="/dashboard"
    style="width: 200px; display:inline-block; padding: 10px; margin-bottom: 80px;
    font-size: 22px; border-radius: 15px;" class="btn btn-primary">Cancel</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>

@endsection

@section('title' , 'Convert Money')