<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    {!! Html::style('login/css/style.css') !!} 
  </head>

  <body>
    <div class="wrapper">
	<div class="container">
		<h1>Admin Login</h1>
		
		<form method="POST" action="/auth/login">
    		{!! csrf_field() !!}
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
			<input type="password" placeholder="Password" name="password" id="password">
			<button type="submit" >Login</button>
		</form>
	</div>
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    {!! Html::script('login/js/index.js') !!} 
  </body>
</html>
