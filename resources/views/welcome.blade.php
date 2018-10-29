<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

     
            
            
            * {
box-sizing: border-box;
}

*:focus {
	outline: none;
}
body {
font-family: Arial;
background-color: rgba(0,0,0,0.15);
padding: 50px;
}
.login {
margin: 20px auto;
width: 300px;
}
.login-screen {
background-color: #FFF;
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
color: #777;
}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ECF0F1;
border: 2px solid transparent;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
	margin-top: 12px;
}
            
            
            
            
            
            
            
            
            
        </style>
    </head>
    <body>

                     
            <div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
                    
			<div class="login-form">
                            <form action="{{ url('user/login') }}" method="POST">
                                {{ csrf_field() }} <input type="hidden" name="redirurl"
                                    value="{{ $_SERVER['REQUEST_URI'] }}"> <label><b>Username</b></label>
                               
                            
                                <div class="control-group">
				<input type="text" class="login-field" value="" placeholder="E mail"  name="email" id="login-name" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label> 
				</div>

				<input type="submit" class="btn btn-primary btn-large btn-block" value="Login"/>
				<a class="login-link" href="#">Lost your password?</a>
                                
                                  @if (Session::has('message'))
                                    <div class="alert alert-info">
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif
                            </form>
			</div>
		</div>
            </div>

                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    
    </body>
</html>
