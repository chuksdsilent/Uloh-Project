<a class="nav-link" href="#"><i class="fas fa-th-list"></i> SERVICE PROVIDERS</a>
<ul class="sub-menu">
    <li class="row">
        <ul>
                {{-- <h6 class="secondary-color" style="font-weight: bolder; font-size: 18px; margin-left: 300px;"> PROFESSIONALS </h6> --}}
            <li class="sub-menu-link">
                <ul>
                    <h6>BATH </h6>
                    @foreach ($service_bath as $item)
                        <li>
                            <a href="{{ url('professionals/bath/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>BEDROOM</h6>
                    @foreach ($service_bedroom as $item)
                        <li>
                            <a href="{{url('professionals/bedroom/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIVING ROOM</h6>
                    @foreach ($service_living_room as $item)
                        <li>
                            <a href="{{url('professionals/living-room/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
            <li class="sub-menu-link">
                <ul>
                    <h6>LIGHTING</h6>
                    @foreach ($service_lightening as $item)
                        <li>
                            <a href="{{url('professionals/lightening/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
</ul>