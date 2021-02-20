@extends('layouts.appmaster')
@section('title', 'Add Customer')
@section('content')
			<form action="addcustomer" method="post">
				{{ csrf_field() }}
				<!-- Begin Demo Table -->
				<div class="demo-table">
					<div class="form-head">Add Customer</div>
					<!-- Begin Username -->
					<div class="field-column">
						<div>
							<input name="firstName" id="firstName" type="text" class="demo-input-box" placeholder="First Name">
						</div>
					</div>
					<!-- End Username -->
					<!-- Begin Password -->
					<div class="field-column">
						<div>
							<input name="lastName" id="lastName" type="text" class="demo-input-box" placeholder="Last Name">
						</div>
					</div>
					<!-- End Password -->
				</div>
				<!-- End Demo Table -->
				<div class="field-column">
					<input type="submit" class="button">
				</div>
			</form>
@endsection
