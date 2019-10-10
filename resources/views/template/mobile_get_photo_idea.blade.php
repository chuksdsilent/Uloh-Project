
<li><a href="">GET PHOTO IDEA</a>
    <ul>
        <li><a href="#">BATH</a>
            <ul>
                <li>
                    @foreach ($service_bath as $item)
                        <li>
                            <a href="{{'photo/bath/'. $item->prof_service_id}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </li>
            </ul>
        </li>
        <li><a href="#">BEDROOM</a>
            <ul>
                <li>
                    @foreach ($service_bedroom as $item)
                        <li>
                            <a href="{{url('photo/bedroom/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </li>
            </ul>
        </li>
        <li><a href="#">LIVING ROOM</a>
            <ul>
                <li>
                    @foreach ($service_living_room as $item)
                        <li>
                            <a href="{{url('photo/living-room/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </li>
            </ul>
        </li>
        <li><a href="#">LIGHTING</a>
            <ul>
                <li>
                    @foreach ($service_lightening as $item)
                        <li>
                            <a href="{{url('photo/lightening/'. $item->prof_service_id)}}">{{$item->name}}</a>
                        </li>                                                
                    @endforeach
                </li>
            </ul>
        </li>
    </ul>
</li>
