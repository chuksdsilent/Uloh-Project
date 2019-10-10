@extends('client.logged_page_layout')
@section('content')
        <div class="container">
            <div class="uuloh-blog mt-5">
                <div class="car">
                    <div class="row first-content">
                        <div class="col-md-12 ">
                            @foreach ($outdoor_blog as $item)
                                <img class="card-img-top" src="{{ asset($item->img_path)}}" alt="Card image cap" />
                                <div class="content color-white">
                                    <h5>{{$item->title}}</h5>
                                    <p>
                                        {{$item->content}}
                                    </p>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="second-comment space-top">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="">
                                        <img class="card-img-top" src="{{ asset('backgrounds/647452-PORI4S-496.png')}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">Our New Site</h5>
                                        <p class="card-text">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque sapiente quisquam, id dignissimos quas deleniti unde fuga amet voluptatum rem distinctio placeat asperiores laboriosam ipsa incidunt, maiores eveniet illo hic!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="">
                                        <img class="card-img-top" src="{{ asset('backgrounds/647452-PORI4S-496.png')}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, eveniet explicabo molestias blanditiis saepe praesentium quo non odit adipisci doloribus laboriosam vitae voluptatibus sint architecto iusto! Et fugiat eveniet placeat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="">
                                        <img class="card-img-top" src="{{ asset('backgrounds/647452-PORI4S-496.png')}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">Launching our new Blog</h5>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores veniam nam vitae quaerat. Hic, dolor iste? Eveniet, quia saepe unde necessitatibus dolor, at, exercitationem minima ipsa recusandae possimus cumque et?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uuloh-blog mt-5">
                    <div class="row first-content">
                        <div class="col-md-12 ">
                            @foreach ($decor_blog as $item)
                                <img class="card-img-top" src="{{ asset($item->img_path)}}" alt="Card image cap" />
                                <div class="content color-white">
                                    <h5>{{$item->title}}</h5>
                                    <p>
                                        {{$item->content}}
                                    </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection