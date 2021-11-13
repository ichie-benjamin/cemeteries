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
                            <a class="nav-link {{ $item == 'general info' ? 'active' : '' }}" id="account-pill-{{ str_replace(' ','_',$item) }}" data-bs-toggle="pill" href="#account-vertical-{{ str_replace(' ','_',$item) }}" aria-expanded="true">
                                 <span class="fw-bold text-capitalize">{{ $item }}</span>
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
                                <div role="tabpanel" class="tab-pane active show" id="account-vertical-general_info" aria-labelledby="account-pill-general_info" aria-expanded="true">
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">General Account Settings</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <dl class="row">
                                                <dt class="col-12 col-md-3 text-md-right">Public Name</dt>
                                                <dd class="col-12 col-md-9 text-capitalize">
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
    <!-- general tab -->

                                <div role="tabpanel" class="tab-pane" id="account-vertical-passwords" aria-labelledby="account-pill-passwords" aria-expanded="true">
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Password</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <dl class="row">
                                                <dt class="col-12 col-md-3 text-md-right">Public Name</dt>
                                                <dd class="col-12 col-md-9 text-capitalize">
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
                                                <dd class="col-12 col-md-9">English</dd>

                                            </dl>

                                        </div>
                                        <div class="card-footer bg-light"><a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Edit</a>   </div>
                                    </div>
                                </div>
                                <!--/ general tab -->

                                <!-- change password -->
                                <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                    <!-- form -->
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Password</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <form class="validate-form" novalidate="novalidate">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-new-password">Old Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="account-new-password" name="old-password" class="form-control" placeholder="Old Password">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-retype-new-password"> New Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control" id="account-retype-new-password" name="new-password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/ form -->
                                </div>

                                <div class="tab-pane fade" id="account-vertical-email" role="tabpanel" aria-labelledby="account-pill-email" aria-expanded="false">
                                    <!-- form -->
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Email</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <form class="validate-form" novalidate="novalidate">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-new-password">Current Email : {{ auth()->user()->email }} </label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-new-password">New Email : </label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="text" id="account-new-password" name="email" class="form-control" placeholder="New Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-retype-new-password"> Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control" id="account-retype-new-password" name="password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Save Changes </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/ form -->
                                </div>

                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                    <!-- form -->
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Notification Settings</h4></div>
                                        <hr/>
                                        <div class="card-body noty">
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Memorial Updates</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="memorialUpdateEmails" id="memorialUpdateEmails" value="Y">
                                                        <label for="memorialUpdateEmails"> Email me about memorial transfers, suggested edits, suggested merges, etc.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row volunteer-email-check  hidden">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Photo Requests</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="sendVolunteerEmails" id="sendVolunteerEmails" value="Y" checked="true">
                                                        <label for="sendVolunteerEmails"> Email me with new photo requests in my area.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">New Messages</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="allowMessages" checked="true" id="allowMessages" value="Y">
                                                        <label for="allowMessages">Enable messages on my member page.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="emailWithNewMessages" id="emailWithNewMessages" value="Y" checked="true">  <label for="emailWithNewMessages">Send me an email when I get a new message.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Site updates and newsletters</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="siteUpdateEmails" id="siteUpdateEmails" value="Y">
                                                        <label for="siteUpdateEmails"> Email me tips for using the site, what's new, upcoming events, etc.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Offers</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="sendPromoEmails" id="sendPromoEmails" value="Y">
                                                        <label for="sendPromoEmails">Email me offers and updates from Ancestry and partners.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
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
