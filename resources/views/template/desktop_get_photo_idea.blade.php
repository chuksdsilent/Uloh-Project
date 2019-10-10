<a class="nav-link  mr-3" href="#"><i class="fas fa-camera"></i>  PHOTO GET INSPIRED <span class="sr-only">(current)</span></a>
<ul class="sub-menu"  style="left: -300px;">
    <li class="row">
        <ul>
            <li class="sub-menu-link">
                
                <ul>
                    <h6>BATH </h6>
                    @foreach ($service_bath as $item)
                        <li>
                            <a href="{{ url('photo/bath/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>BEDROOM</h6>
                    @foreach ($service_bedroom as $item)
                        <li>
                            <a href="{{url('photo/bedroom/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIVING ROOM</h6>
                    @foreach ($service_living_room as $item)
                        <li>
                            <a href="{{url('photo/living-room/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIGHTING</h6>
                    @foreach ($service_lightening as $item)
                        <li>
                            <a href="{{url('photo/lightening/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
</ul>