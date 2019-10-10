<style>
    .owl-carousel img{
        /* width:100px;
        height:100px;
        margin: 0px; */

        /*Scale down will take the necessary specified space that is 100px x 100px without stretching the image*/
        /* object-fit:scale-down; */

             position: relative;
            float: left;
            width:  120%;
            height: 150px;
            background-position: 50% 50%;
            background-repeat:   no-repeat;
            background-size:     cover;
            object-fit: contain;
    }
</style>
<div class="container">
<div class="interior-for-home  mt-5">
    <h5>Interior for your house hold</h5>
    <div class="card pt-2 pb-2 pl-4 pr-4">
        <div class="glider-contain multiple">
            <div class="owl-carousel owl-theme">
                @foreach ($products as $item)                    
                    <div class="item">
                        <a href="{{url('products/'.$item->sub_cat_id.'?slog='. \App\SubCategories::where('id', $item->sub_cat_id)->value('name'))}}">
                            <img class="card-img-top" src="{{ asset($item->thumbnail_path)}}" alt="Card image cap" style="">  
                            <h6>{{\App\SubCategories::where('id', $item->sub_cat_id)->value('name')}}</h6>
                        </a>
                    </div>         
                @endforeach                         
            </div>
        </div>
    </div>
</div>