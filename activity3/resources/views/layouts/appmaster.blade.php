<html lang="en">
<head>
<title>@yield('title')</title>
<style>
body{
    font-family: Helvetica;
}
.button {
	background-color: #007cc7; /* Green */
	border: none;
	color: white;
	padding: 5px 17px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 13px;
	border-radius: 4px;
}

input[type=text] {
	width: 20%;
	padding: 12px 20px;
	margin: 8px 0;
	box-sizing: border-box;
	border: none;
	border-bottom: 2px solid black;
	text-align: center;
}
</style>
</head>
<body>
	@include('layouts.header')
	<div align="center">@yield('content')</div>
	@include('layouts.footer')
</body>
</html>