@extends('storeadmin.layout.main')

@section('content')

<!-- page content -->
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add Elements to Form</h3>
                        </div>
                         
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> {{ $form[0]["form_name"] }}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                         
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />

                                    <table  class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Options(RAD & CHK)</th>
                                            </tr>
                                        </thead>
                                        <tbody id='elementTable1'>
                                            <tr>                                                              
                                            </tr> 
                                            
                                        </tbody>
                                    </table>

                                </br>

                                    <form id="elementform1" data-parsley-validate class="form-horizontal form-label-left">

                                        <input type='hidden' name='form_id' value='{{ $form[0]["id"] }}' >
                                        {!! csrf_field() !!}

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id='formtype' name='type'>
                                                    <option selected='selected' disabled>Choose option</option>
                                                    <option value='TXT'>Text Box</option>
                                                    <option value='TXTA'>Text Area</option>
                                                    <option value='RAD'>Radio Button</option>
                                                    <option value='CHK'>Check Box</option>
                                                </select>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name='title' id="title" value='' required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group" id='options' style='display:none;'>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Options</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input id="tags_1" type="text" name='options' class="tags form-control" value="" />
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                        </div>
                                         
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="/storeadmin/stores" class="btn btn-primary">Done</a>
                                                <button id='saveoption1' type="submit" class="btn btn-success">add</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
 @endsection