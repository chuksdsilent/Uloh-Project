<a class="nav-link  mr-3" href="#"><i class="fas fa-shopping-bag"></i>  SHOP DEPARTMENT <span class="sr-only">(current)</span></a>
<ul class="sub-menu">
    <li class="row">
        <ul>
            <li class="sub-menu-link">
                <ul>
                    <h6>DÉCOR </h6>
                    @foreach ($decor as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>OUTDOOR</h6>
                    @foreach ($outdoor as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>SMART HOME</h6>
                    @foreach ($smart_home as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIGHTING</h6>
                    @foreach ($lightening as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
    <li class="row">
        <ul>
            <li class="sub-menu-link">
                <ul>
                    <h6>BATH</h6>
                    
                    @foreach ($bath as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>BEDROOM</h6>
                    @foreach ($bedroom as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIVING</h6>
                    @foreach ($living as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>HOME IMPROVEMENT</h6>
                    @foreach ($home_imp as $item)
                        <li>
                            <a href="{{ url('products/'. $item->sub_cat_id)}}   ">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
</ul> 