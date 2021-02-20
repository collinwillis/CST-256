@extends('layouts.appmaster') @section('title', 'Add Customer')
@section('content')
<form action="addorder" method="post">
	{{ csrf_field() }}
	<!-- Begin Demo Table -->
	<div class="demo-table">
		<div class="form-head">Add Order</div>
		<!-- Begin Product -->
		<div class="field-column">
			<div>
				<input name="product" id="product" type="text"
					class="demo-input-box" placeholder="Product Name">
			</div>
		</div>
		<!-- End Product -->
		<!-- Begin Id -->
		<div class="field-column">
			<div>
				<input name="customerID" id="customerID" type="text"
					class="demo-input-box" value="{{Session::get('nextID')}}" placeholder="ID">
			</div>
		</div>
		<div class="field-column">
			<div>
				<input name="firstName" id="firstName" type="text"
					class="demo-input-box" value="{{Session::get('firstName')}}" placeholder="First Name">
			</div>
		</div>
		<div class="field-column">
			<div>
				<input name="lastName" id="lastName" type="text"
					class="demo-input-box" value="{{Session::get('lastName')}}" placeholder="Last Name">
			</div>
		</div>
		<!-- End Id -->
	</div>
	<!-- End Demo Table -->
	<div class="field-column">
		<input type="submit" class="button">
	</div>
</form>
@endsection
