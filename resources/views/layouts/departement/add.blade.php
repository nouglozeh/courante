@extends('layouts.index')

@section('contentheader')
                <h1>Add New User</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Add New User</li>
                </ol>
@endsection



@section('contenu')
<aside class="">
            
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Add New User
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <!-- errors -->
                                <!--main content-->
                                <form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" />
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="#tab1" data-toggle="tab">User Profile</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab">Bio</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Address</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">User Group</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="tab1">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                                    <div class="col-sm-10">
                                                        <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name" class="col-sm-2 control-label">Last Name *</label>
                                                    <div class="col-sm-10">
                                                        <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email *</label>
                                                    <div class="col-sm-10">
                                                        <input id="email" name="email" placeholder="E-mail" type="text" class="form-control required email" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="col-sm-2 control-label">Password *</label>
                                                    <div class="col-sm-10">
                                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirm" class="col-sm-2 control-label">Confirm Password *</label>
                                                    <div class="col-sm-10">
                                                        <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password " class="form-control required" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group required">
                                                    <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                                    <div class="col-sm-10">
                                                        <input id="dob" name="dob" type="text" class="form-control" data-date-format="YYYY-MM-DD" placeholder="yyyy-mm-dd" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                                    <div class="col-sm-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                                <img src="http://placehold.it/200x200" alt="profile pic">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                            <div>
                                                                <span class="btn btn-default btn-file">
                                                                 <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input id="pic" name="pic_file" type="file" class="form-control" />
                                                                </span>
                                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="bio" class="col-sm-2 control-label">Bio <small>(brief intro) *</small></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="bio" id="bio" class="form-control resize_vertical" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <div class="form-group">
                                                    <label for="gender" class="col-sm-2 control-label">Gender *</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control select21" id="gender" title="Select Gender..." name="gender">
                                                            <option disabled selected>Select Gender</option>
                                                            <option value="male">MALE</option>
                                                            <option value="female">FEMALE </option>
                                                            <option value="other">OTHER </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-2 control-label">Country</label>
                                                    <div class="col-md-10">
                                                        <select class="select21 form-control" name="country" id="country">
                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                <option>Select Country</option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific Time Zone">
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                            </optgroup>
                                                            <optgroup label="Mountain Time Zone">
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                            </optgroup>
                                                            <optgroup label="Central Time Zone">
                                                                <option value="AL">Alabama</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="WI">Wisconsin</option>
                                                            </optgroup>
                                                            <optgroup label="Eastern Time Zone">
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WV">West Virginia</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="state" class="col-sm-2 control-label">State </label>
                                                    <div class="col-sm-10">
                                                        <input id="state" name="state" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="city" class="col-sm-2 control-label">City </label>
                                                    <div class="col-sm-10">
                                                        <input id="city" name="city" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="address" class="col-sm-2 control-label">Address </label>
                                                    <div class="col-sm-10">
                                                        <input id="address" name="address" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                                    <div class="col-sm-10">
                                                        <input id="postal" name="postal" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab4">
                                                <p class="text-danger"><strong>Be careful with group selection, if you give admin access.. they can access admin section</strong></p>
                                                <div class="form-group required">
                                                    <label for="group" class="col-sm-2 control-label">Group *</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control required select21" title="Select group..." name="group" id="group">
                                                            <option value="">Select</option>
                                                            <option value="admin" selected="selected">admin</option>
                                                            <option value="user">user</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="activate" class="col-sm-2 control-label"> Activate User</label>
                                                    <div class="col-sm-10">
                                                        <input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30 custom-checkbox" value="1" >
                                                        <span>If user is not activated, mail will be sent to user with activation link</span></div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous">
                                                    <a href="#">Previous</a>
                                                </li>
                                                <li class="next">
                                                    <a href="#">Next</a>
                                                </li>
                                                <li class="next finish" style="display:none;">
                                                    <a href="javascript:;">Finish</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">User Register</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Account Registered Successfully.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            </section>
        </aside>
@endsection

