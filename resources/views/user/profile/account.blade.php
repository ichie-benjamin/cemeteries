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
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column nav-left">
                        <!-- general -->
                        @foreach($links as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $item == 'General Info' ? 'active' : '' }}" id="account-pill-{{ str_replace(' ','_',$item) }}" data-bs-toggle="pill" href="#account-vertical-{{ str_replace(' ','_',$item) }}" aria-expanded="true">
                                 <span class="fw-bold">{{ $item }}</span>
                            </a>
                        </li>
                    @endforeach

                    </ul>
                </div>
                <!--/ left menu section -->

                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane active show" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">General Account Settings</h4></div>
                                        <div class="card-body">
                                            <dl class="row">
                                                <dt class="col-12 col-md-3 text-md-right">Public Name</dt>
                                                <dd class="col-12 col-md-9">
                                                    {{ auth()->user()->name }}
                                                </dd>

                                                <dt class="col-12 col-md-3 text-md-right">Site ID</dt>
                                                <dd class="col-12 col-md-9">{{ auth()->user()->site_id }}
                                                </dd>
                                                <dt class="col-12 col-md-3 text-md-right">Member Since</dt>
                                                <dd class="col-12 col-md-9">{{ auth()->user()->created_at->format('M Y') }}
                                                </dd>

                                                <dt class="col-12 col-md-3 text-md-right">Email Contact</dt>
                                                <dd class="col-12 col-md-9">{{ auth()->user()->email }}·

                                                </dd>
                                                <dt class="col-12 col-md-3 text-md-right">Preferred Language</dt>
                                                <dd class="col-12 col-md-9">English







                                                </dd>


                                            </dl>

                                        </div>
                                        <div class="card-footer bg-light"><a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Edit</a>   </div>
                                    </div>
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
