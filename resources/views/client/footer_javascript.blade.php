<script>
        
        AOS.init({
            duration: 1500,
            once: true
        });
        $('.owl-carousel').owlCarousel({
            items: 2,
            loop:true,
            margin:10,
            autoplay: true,
            dots:false,
            slideTransition: 'linear',
            autoplayHoverPause: true,
            animateIn: true,
            slideBy: 1,
            rewind: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    
    <!-- required -->
    <script type="text/javascript" src="{{url('libraries/navbar/js/stellarnav.js')}}"></script>
    <script src="{{ asset('libraries/dropdown.js') }}"></script>
    <script type="text/javascript">
    
    $(document).ready(function() {
        $(".btn-success").click(function(){ 
            var html = $(".clone").html();
            $(".increment").before(html);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });

    });

    $('body').scrollspy({ target: '#navbar-example' })
    $("#myNavbars a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
        // Prevent default anchor click behavior

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function(){
    
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
        }  // End if
    });
        jQuery(document).ready(function($) {
            jQuery('.stellarnav').stellarNav({
                theme: 'light',
                breakpoint: 1200,
                position: 'right',
                phoneBtn: '18009997788',
                locationBtn: 'https://www.google.com/maps'
            });
        });
        
    const add_to_cart = document.getElementById('add_to_cart');
    if($("#add_to_cart").length !== 0){
        add_to_cart.addEventListener('click', addToCart);
    }
    const qtys = document.querySelectorAll('.qty');
    console.log(qtys);
    const remove = document.querySelectorAll('#remove');


    const product_id = $("#product_id").val();
    const price = $("#price").val();
    const product_name = $("#product_name").val();
    const img_path = $("#img_path").val();
    
    const modal = '<div class="box">'+
            '<div class="modal fade" id="qty-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
             '<div class="modal-dialog" role="document">'+
              '   <div class="modal-content">'+
               '     <div class="modal-body">'+
                '      Please select Quantity. '+
                 '   </div>'+
                  ' <div class="modal-footer">'+
                   ' <a class="btn btn-secondary text-white" data-dismiss="modal">Ok</a>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>';
    
    // add_to_cart.addEventListener('click', addToCart);

    for(const qty of qtys){
        qty.addEventListener('change', changeTheQuantity);
    }
    
    for(const rem of remove){
        rem.addEventListener('click', removeProduct);
    }

    function removeProduct(e){
        e.preventDefault();
        var remove_id = $(this).data('product-id');
        console.log(remove_id);
        var link = $('#rem-id[data-product="' + remove_id + '"]');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = { remove_id, _token: '{!! csrf_token() !!}'};
        $.ajax({
            type:'GET',
            url:'/products/cart/remove-product',
            data:data,
            success:function(data){
                 
            var no_of_items = document.getElementById('no_of_items'); 
            no_of_items.innerHTML = data.no_of_item;
             $('#total').html(data.total);                    
             $('#sub_total').html(data.total);
            link.remove();                
            }

        });
    }
    
    function changeTheQuantity(e){
        var qty_val = $(this).val();
        var product_id = $(this).data('product-id');

        e.preventDefault();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var data = {qty_val, product_id, _token: '{!! csrf_token() !!}'};
        $.ajax({
            type:'GET',
            url:'/products/cart/update-cart',
            data:data,
            success:function(data){
                
                var no_of_items = document.getElementById('no_of_items'); 
                no_of_items.innerHTML = data.no_of_item;
                $('#total').html(data.total);
                $('#sub_total').html(data.total);

            }

        });
        
    }
     function addToCart(e){
        e.preventDefault();
        const qty = $("#no_of_item").val();
        
        if(qty === ""){
            $('#add-product-modal').append(modal);
                $('#qty-modal').modal({
                    keyboard: false,
                    show: true
                });
        }else{
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                type:'POST',
                url:'/products/cart',
                data:{
                    qty,
                    product_id, 
                    action: 'ADD', 
                    price,
                    product_name,
                    img_path,
                    _token: '{!! csrf_token() !!}'
                    },
                success:function(data){
                    e.preventDefault();
                    
                    var no_of_items = document.getElementById('no_of_items'); 
                    no_of_items.innerHTML = data.no_of_item;
                    $('#add-product-modal').append(data.success);
                    $('#product-modal').modal({
                        keyboard: false,
                        show: true
                        });
                        var checkout = document.getElementById('continue-to-checkout'); 
                        checkout.addEventListener('click', function checkout(e){
                        window.location = "/products/cart/show-cart"
                     });
                    
                }

            });
        }
    }
    </script>