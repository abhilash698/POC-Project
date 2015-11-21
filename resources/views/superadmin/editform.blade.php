@extends('superadmin.layout.main')

@section('content')

<!-- page content -->
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>FORMS</h3>
                        </div>
                         
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Edit Forms</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                         
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method='POST' action="/superadmin/editform" data-parsley-validate class="form-horizontal form-label-left">

                                        {!! csrf_field() !!}

                                        <input type='hidden' name='form_id' value='{{ $form[0]["id"] }}' >

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name">Form Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name='form_name' id="form-name" value='{{ $form[0]["form_name"] }}' required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                         
                                         
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="/superadmin/stores" class="btn btn-primary">Cancel</a>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
 @endsection