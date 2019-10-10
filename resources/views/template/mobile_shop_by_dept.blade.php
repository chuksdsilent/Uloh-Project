
    <li><a href="">SHOP DEPARTMENT</a>
        <ul>
            <li><a href="#">DECOR</a>
                <ul>
                    <li>
                        @foreach ($decor as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">OUTDOOR</a>
                <ul>
                    <li>
                        @foreach ($outdoor as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">SMART HOME</a>
                <ul>
                    <li>
                        @foreach ($smart_home as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">LIGHTING</a>
                <ul>
                    <li>
                        @foreach ($lightening as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">BATH</a>
                <ul>
                    <li>
                        @foreach ($bath as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">BEDROOM</a>
                <ul>
                    <li>
                        @foreach ($bedroom as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">LIVING</a>
                <ul>
                    <li>
                        @foreach ($living as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
            <li><a href="#">HOME IMPROVEMENT</a>
                <ul>
                    <li>
                        @foreach ($home_imp as $item)
                            <li>
                                <a href="{{$item->id}}">{{$item->name}}</a>
                            </li>                                                
                        @endforeach
                    </li>
                </ul>
            </li>
        </ul>
    </li>
