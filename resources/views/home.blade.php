@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header text-center"><strong>Welcome to Visitors Registration System</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                  Register Visitor
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                  Search Visitor
                                </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-date-tab" data-toggle="pill" href="#pills-date" role="tab" aria-controls="pills-date" aria-selected="false">
                                  List by Date
                                </a>
                            </li>
                           
                               
                        
                            
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    @include('partials.form._form')
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    @include('partials.form._searchform')
                            </div>
                            <div class="tab-pane fade" id="pills-date" role="tabpanel" aria-labelledby="pills-date-tab">
                                    @include('partials.form._listbydate')
                            </div>
                            
                          </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
