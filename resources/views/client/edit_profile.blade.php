@extends(Auth::check() ? 'client.logged_page_layout' : 'client.page_layout')
@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <!------ Include the above in your HEAD tag ---------->
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  <!------ Include the above in your HEAD tag ---------->
                      @if(Session::has('msg'))
                          <div class="alert alert-success"> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }} </div> 
                      @endif

                  <!-- Tabs -->
                  <section id="tabs">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12"  style="width: 100%;" >
                          <ul class="nav nav-tabs nav-justified" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#nav-home" role="tab">Home</a>
                              </li>
                              {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nav-profile" role="tab">Services</a>
                              </li> --}}
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nav-contact" role="tab">Your Business</a>
                              </li>
                          </ul>
                          <div class="tab-content px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active px-5 py-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              @include('client.include_basic_info')
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              @include('client.include_services')
                            </div> --}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                              @include('client.include_business')
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
@endsection