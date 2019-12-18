@extends('layouts.master')

@section('content')

	<!--==================================
=            User Profile            =
===================================-->

	<section class="user-profile section">

		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
					<div class="sidebar">
						<!-- User Widget -->
						<div class="widget user-dashboard-profile">
							<!-- User Image -->
							<div class="profile-thumb">
								<img src="images/user/user-thumb.jpg" alt="" class="rounded-circle">
							</div>
							<!-- User Name -->
							<h5 class="text-center">Samanta Doe</h5>
							<p>Joined February 06, 2017</p>
						</div>
						<!-- Dashboard Links -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li>
									<a href="{{route('user.basic-information')}}" id="basic-information"><i class="fa fa-user"></i> Basic Information</a></li>
								<li>
									<a href="dashboard-favourite-ads.html"><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a>
								</li>
								<li>
									<a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archeved Ads <span>12</span></a>
								</li>
								<li>
									<a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
								</li>
								<li>
									<a href="logout.html"><i class="fa fa-cog"></i> Logout</a>
								</li>
								<li>
									<a href="delete-account.html"><i class="fa fa-power-off"></i>Delete Account</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Edit Personal Info -->
					<div class="widget personal-info">
						<h3 class="widget-header user">Edit Personal Information</h3>

						<form action="#">
							<!-- First Name -->

                            <div class="form-group row">
								<label for="name" class="col-sm-6 col-form-label">Name</label>
                                <div class="col-sm-6">
								<input type="text" class="form-control" id="name" value="{{$user->name}}">
                                </div>
							</div>

							<!-- Nationality -->
							<div class="form-group row">
								<label for="nationality_id" class="col-sm-6 col-form-label">{{ trans('profile.basic-information.nationality') }}</label>
                                <div class="col-sm-6">
								<select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id">
									@foreach($nationalities as $id => $nationality)
										<option value="{{ $id }}" {{ ($user->nationality ? $user->nationality->id : old('nationality_id')) == $id ? 'selected' : '' }}>{{ $nationality }}</option>
									@endforeach
								</select>

								@if($errors->has('country_id'))
									<div class="invalid-feedback">
										{{ $errors->first('country_id') }}
									</div>
								@endif
								<span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                                </div>
							</div>


                            <!-- Country -->
                            <div class="form-group row">
                                <label for="country_id" class="col-sm-6 col-form-label">{{ trans('profile.basic-information.country') }}</label>
                                <div class="col-sm-6">
                                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                                        @foreach($countries as $id => $country)
                                            <option value="{{ $id }}" {{ ($user->country ? $user->country->id : old('country_id')) == $id ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('country_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country_id') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                                </div>
                            </div>

                            <!-- Current City/Area -->

                            <div class="form-group row">
                                <label for="city" class="col-sm-6 col-form-label">{{ trans('profile.basic-information.city') }}</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" value="{{$user->city}}">
                                </div>
                            </div>

                            <!-- Date of Birth -->

                            <div class="form-group row">
                                <label for="city" class="col-sm-6 col-form-label">{{ trans('profile.basic-information.date_of_birth') }}</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control date" id="name" value="{{$user->date_of_birth}}">
                                </div>
                            </div>



							<!-- File chooser -->
							<div class="form-group choose-file">
								<i class="fa fa-user text-center"></i>
								<input type="file" class="form-control-file d-inline" id="input-file">
							</div>
							<!-- Comunity Name -->
							<div class="form-group">
								<label for="comunity-name">Comunity Name</label>
								<input type="text" class="form-control" id="comunity-name">
							</div>
							<!-- Checkbox -->
							<div class="form-check">
								<label class="form-check-label" for="hide-profile">
									<input class="form-check-input" type="checkbox" value="" id="hide-profile">
									Hide Profile from Public/Comunity
								</label>
							</div>
							<!-- Zip Code -->
							<div class="form-group">
								<label for="zip-code">Zip Code</label>
								<input type="text" class="form-control" id="zip-code">
							</div>
							<!-- Submit button -->
							<button class="btn btn-transparent">Save My Changes</button>
						</form>
					</div>
					<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form action="#">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" class="form-control" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" id="new-password">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" id="confirm-password">
							</div>
							<!-- Submit Button -->
							<button class="btn btn-transparent">Change Password</button>
						</form>
					</div>
					<!-- Change Email Address -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Edit Email Address</h3>
						<form action="#">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-email">Current Email</label>
								<input type="email" class="form-control" id="current-email">
							</div>
							<!-- New email -->
							<div class="form-group">
								<label for="new-email">New email</label>
								<input type="email" class="form-control" id="new-email">
							</div>
							<!-- Submit Button -->
							<button class="btn btn-transparent">Change email</button>
						</form>
					</div>
					@php
					echo "<pre>";
					var_dump($user);
					echo "</pre>";
					@endphp
				</div>
			</div>
		</div>
	</section>

@stop
