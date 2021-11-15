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
                            <a class="nav-link {{ $item == 'general info' &  !request()->get('t')  ? 'active' : '' }} {{ request()->get('t') == str_replace(' ','_',$item)  ? 'active' : '' }}" id="account-pill-{{ str_replace(' ','_',$item) }}" data-bs-toggle="pill" href="#account-vertical-{{ str_replace(' ','_',$item) }}" aria-expanded="true">
                                 <span class="fw-bold text-capitalize">{{ $item }}</span>
                            </a>
                        </li>
                    @endforeach

                    </ul>
                </div>
                <!--/ left menu section -->

                <!-- right content section -->
                <div class="col-md-9">
                   @include('partials.msg')
                   @include('partials.errors')
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane  {{ !request()->get('t')  ? 'active show' : '' }}" id="account-vertical-general_info" aria-labelledby="account-pill-general_info" aria-expanded="true">
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
                                <div class="tab-pane fade {{ request()->get('t') == 'password' ? 'active show' : '' }}" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                    <!-- form -->
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Password</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <form class="validate-form"  method="post" action="{{ route('user.profile.update.password') }}" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-new-password">Current Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="account-new-password" name="current_password" class="form-control" placeholder="Current Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="account-retype-new-password"> New Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control" id="account-retype-new-password" name="new_password" placeholder="New Password">
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

                                <div class="tab-pane fade  {{ request()->get('t') == 'email' ? 'active show' : '' }}" id="account-vertical-email" role="tabpanel" aria-labelledby="account-pill-email" aria-expanded="false">
                                    <!-- form -->
                                    <div class="card">
                                        <div class="card-header"><h4 class="text-primary mb-0">Email</h4></div>
                                        <hr/>
                                        <div class="card-body">
                                            <form class="validate-form" method="post" action="{{ route('user.profile.update.email') }}" novalidate="novalidate">
                                                {{ csrf_field() }}
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
                                        <form class="validate-form" method="post" action="{{ route('user.profile.update.notifications') }}">
                                            {{ csrf_field() }}
                                            <div class="card-header"><h4 class="text-primary mb-0">Notification Settings</h4></div>
                                        <hr/>
                                        <div class="card-body noty">
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Memorial Updates</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="memorial_update" id="memorialUpdateEmails" value="1">
                                                        <label for="memorialUpdateEmails"> Email me about memorial transfers, suggested edits, suggested merges, etc.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row volunteer-email-check  hidden">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Photo Requests</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="photo_request" id="sendVolunteerEmails" value="1" checked>
                                                        <label for="sendVolunteerEmails"> Email me with new photo requests in my area.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">New Messages</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="allow_messages" checked id="allowMessages" value="1">
                                                        <label for="allowMessages">Enable messages on my member page.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="message_email_noty" id="emailWithNewMessages" value="1" checked />
                                                        <label for="emailWithNewMessages">Send me an email when I get a new message.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Site updates and newsletters</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="site_update" id="siteUpdateEmails" value="1">
                                                        <label for="siteUpdateEmails"> Email me tips for using the site, what's new, upcoming events, etc.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-12 col-lg-4 font-weight-bold text-lg-right">Offers</div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="offers" id="sendPromoEmails" value="1">
                                                        <label for="sendPromoEmails">Email me offers and updates from Ancestry and partners.</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!--/ form -->
                                </div>
                                <div class="tab-pane fade  {{ request()->get('t') == 'site_preferences' ? 'active show' : '' }}" id="account-vertical-site_preferences" role="tabpanel" aria-labelledby="account-pill-site_preferences" aria-expanded="false">
                                    <div class="card form-horizontal">
                                        <div class="card-header"><h4 class="text-primary mb-0">Dashboard Preferences</h4></div>
                                        <form class="validate-form" method="post" action="{{ route('user.profile.update.theme') }}">
                                            {{ csrf_field() }}
                                        <div class="card-body">
                                            <p>Change the appearance of the your dashboard pages.
                                            </p>
                                            <fieldset>
                                                <label class="p-2 font-weight-bold theme-dk"><input type="radio" name="theme" checked value="light">
                                                    Light Theme <em class="font-weight-normal">(default)</em>
                                                    <div style="height: 200px; background: gray"></div>
                                                </label>
                                                <label class="p-2 font-weight-bold theme-lt"><input type="radio" name="theme" value="dark">
                                                    Dark Theme
                                                    <div style="height: 200px; background: black"></div>
                                                </label>

                                            </fieldset>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-data_and_privacy" role="tabpanel" aria-labelledby="account-pill-data_and_privacy" aria-expanded="false">
                                    <div class="card form-horizontal">
                                        <div class="card-header"><h4 class="text-primary mb-0">Data and Privacy</h4></div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-12 mb-3 col-lg-4 text-lg-right">
                                                    <b>Data Download</b>
                                                </div>
                                                <div class="col-lg-8">
                                                    <strong>Your Contributions Data</strong>
                                                    <p>You can download your records for a favorite cemetery or virtual cemetery by choosing it from the list below. The data will download as a tab-delimited txt file. This format can be imported into a variety of programs. Add or remove cemeteries from your list by clicking the <b>Add Favorite</b> or <b>Favorited</b> button on the cemetery page. You can also manage them on your <a href="/my-cemetery/search">Favorite Cemeteries</a> page.</p>
                                                    <fieldset class="form-group form-row">
                                                        <label for="download-data" class="col-form-label col-12 col-sm-auto">Download from</label>
                                                        <div class="col-12 col-sm-8">
                                                            <div class="select-style" id="download-data-wrapper">
                                                                <select class="form-control" id="download-data" name="download-data">
                                                                    <option value="">Choose a cemetery</option>



                                                                    <optgroup label="Virtual Cemeteries">

                                                                        <option value="vc1427601">new cementary</option>


                                                                    </optgroup></select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <hr>
                                                    <strong>Account Data Download</strong>
                                                    <p>Download a copy of your data from our site. </p>
                                                    <a href="" class="btn btn-primary">Request a copy</a>


                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-12 mb-3 col-lg-4 text-lg-right">
                                                    <b>Manage Account Data</b>
                                                </div>
                                                <div class="col-lg-8">

                                                    <p>Close or permanently delete your account from all our services.</p>
                                                    <a href="{{ route('user.request','delete_account') }}" class="btn btn-primary">Make a request</a>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

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
