@extends('storeadmin.layout.main')

@section('content')

<!-- page content -->
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Store</h3>
                        </div>
                         
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Store <small>Store is added to specific User</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                         
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method='POST' action="/storeadmin/addstore" data-parsley-validate class="form-horizontal form-label-left">

                                        {!! csrf_field() !!}

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name">UserName <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name='name' id="user-name" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" id="password" class="form-control" required="required" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Store Name <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="store_name" class="form-control col-md-7 col-xs-12" required="required" type="text" name="store_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="store_name" class="form-control col-md-7 col-xs-12" type="text" name="city">
                                            </div>
                                        </div>
                                         
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="/storeadmin/stores" class="btn btn-primary">Cancel</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
 @endsection