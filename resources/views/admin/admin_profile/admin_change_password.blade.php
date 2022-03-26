@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<div class="container-full">
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Change Password</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.password.update')}}" >
						@csrf
					  <div class="row">
						<div class="col-12">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Current Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" id="oldpassword" value="" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
										
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5>New Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" value="" name="password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5>Confirm Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" value="" name="confirmation_password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									</div>
								</div>		
							
						</div>	
						</div>
							
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-primary">Update</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	</div>;
	
@endsection