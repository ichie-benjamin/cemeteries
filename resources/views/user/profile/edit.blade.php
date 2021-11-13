@extends('layouts.user')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-5 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"> Account Settings </h2>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">

        <!-- Account settings starts here-->

        <section id="page-account-settings">
            <div class="row">

                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane active show" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                    <!-- form -->
                                    <form method="post" action="{{ route('user.profile.update') }}" class="validate-form mt-2" novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3 col-12">
                                            <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">User Name</label>
                                                    <input value="{{ $user->username }}" disabled type="text" class="form-control" id="username-name" name="username">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">Account ID </label>
                                                    <input value="{{ $user->site_id }}" disabled type="text" class="form-control" />
                                                </div>
                                            </div>
                                                <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">First Name</label>
                                                    <input value="{{ $user->first_name }}" type="text" class="form-control" id="username-name" name="first_name">
                                                </div>
                                            </div>
                                                <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">Last Name</label>
                                                    <input value="{{ $user->last_name }}" type="text" class="form-control" id="username-name" name="last_name">
                                                </div>
                                            </div>

                                                <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">Member Since</label>
                                                    <input disabled value="{{ $user->created_at->format('M Y') }}" type="text" class="form-control" id="username-name">
                                                </div>
                                            </div>

                                                <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">Email Contact</label>
                                                    <input disabled value="{{ $user->email }}" type="text" class="form-control" />
                                                </div>
                                            </div>

                                                <div class="col-12 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-username">Profile Photo</label>
                                                    <br/>
                                                    <img src="{{ $user->avatar }}" />
                                                </div>
                                            </div>

                                                <div class="col-12">
                                                    <div class="mb-1">
                                                    <label class="form-label" for="description">Update Profile Photo </label>
                                                    @include('inc.image-upload',['field' => 'avatar','id' => 'avatar'])
                                                    </div>
                                                </div>


                                                <div class="col-12 col-sm-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="account-username">Bio Information</label>
                                                        <textarea class="form-control" name="bio">{{ $user->bio }}</textarea>

                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                <button type="submit" class="btn btn-primary mt-2 me-1 waves-effect waves-float waves-light">Update Profile</button>
                                                <button type="reset" class="btn btn-outline-secondary mt-2 waves-effect">Cancel</button>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ general tab -->

                                <!-- change password -->
                                <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                    <!-- form -->
                                    <form class="validate-form" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-new-password">New Password</label>
                                                    <div class="input-group form-password-toggle input-group-merge">
                                                        <input type="password" id="account-new-password" name="new-password" class="form-control" placeholder="New Password">
                                                        <div class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="account-retype-new-password">Confirm New Password</label>
                                                    <div class="input-group form-password-toggle input-group-merge">
                                                        <input type="password" class="form-control" id="account-retype-new-password" name="confirm-new-password" placeholder="New Password">
                                                        <div class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ change password -->

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ right content section -->
            </div>
        </section>

        <!-- Acount settings starts here-->




    </div>
</div>
@endsection
