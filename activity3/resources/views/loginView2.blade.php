@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')
			<form action="dologin" method="post">
				{{ csrf_field() }}
				<!-- Begin Demo Table -->
				<div class="demo-table">
					<div class="form-head">Login</div>
					<!-- Begin Username -->
					<div class="field-column">
						<div>
							<b><label for="username">Username</label></b><span id="user_info" class="error-info"></span>
						</div>
						<div>
							<input name="user_name" id="user_name" type="text" class="demo-input-box">
							<div style="color: red">
								<?php echo $errors->first('user_name')?>
							</div>
						</div>
					</div>
					<!-- End Username -->
					<!-- Begin Password -->
					<div class="field-column">
						<div>
							<b><label for="password">Password</label><span id="password_info" class="error-info"></span></b>
						</div>
						<div>
							<input name="password" id="password" type="text" class="demo-input-box">
							<div style="color: red">
								<?php echo $errors->first('password')?>
							</div>
						</div>
					</div>
					<!-- End Password -->
				</div>
				<!-- End Demo Table -->
				<div class="field-column">
					<input type="submit" class="btnLogin" style="background-color: #add8e6">
				</div>
			</form>
@endsection
