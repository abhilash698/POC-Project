@extends('superadmin.layout.main')

@section('content')


                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Stores</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                                  
                                <a href="/superadmin/addstore"><button type="button" class="btn btn-primary">Add Store</button></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="">

                        @foreach ($stores as $store)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-shopping-cart"></i> {{ $store['store_name'] }} <small>ID : {{ $store['id'] }}</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="/superadmin/editstore/{{ $store['id'] }}">Edit</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                         
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="display: none;">

                                    <!-- start accordion -->
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                                        @foreach ($store['FeedBackForms'] as $form)
                                        <div class="panel">
                                            <ul class="nav nav-pills" role="tablist" style='float:right;'>
                                                <li role="presentation" class="dropdown">
                                                    <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                        Action
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                                                     
                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/superadmin/addelements/{{ $form['id'] }}">Add Elements</a>
                                                        </li>
                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/superadmin/editform/{{ $form['id'] }}">Edit</a>
                                                        </li>
                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/superadmin/deleteform/{{ $form['id'] }}">Delete</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <a class="panel-heading collapsed" role="tab" id="heading{{ $form['id'] }}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $form['id'] }}" aria-expanded="true" aria-controls="collapseOne">
                                                <h4 class="panel-title">{{ $form['form_name'] }}</h4>

                                            </a>

                                            <div id="collapse{{ $form['id'] }}"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                @foreach ($formelements[$form['id']]['elements'] as $element)
                                                                <th>{{$element['type']}}<small> title : {{$element['title']}}</small></th>
                                                                @endforeach

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            @foreach ($formelements[$form['id']]['values'] as $value)
                                                            <tr>
                                                                <th scope="row">{{$value['id']}}</th>
                                                                @foreach ($value['feedbackValues'] as $elamentvalue)
                                                                <td>{{$elamentvalue['value']}}</td>
                                                                @endforeach                                                                 
                                                            </tr>
                                                            @endforeach 
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </br>

                                        <a href="/superadmin/addform/{{ $store['id'] }}" style='float:right;'><button type="button" class="btn btn-primary">Add Form</button></a>
                                         
                                    </div>
                                    <!-- end of accordion -->
                                    


                                </div>
                            </div>


                        </div>
                        @endforeach


                    </div>
                </div>

 @endsection