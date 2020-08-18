$(document).ready(function(){
    //add item
    $('.add-item-btn').on('click',function(e){
        e.preventDefault();
        var title=$(this).data('title');
        var id=$(this).data('id');
        var price=$(this).data('price');
        
        $(this).removeClass('btn-success').addClass('btn-default disabled');
        
        var html=
       `<tr>

        <td><input type="text" class="form-control input-sm" value="${id}" name="items[]" style="border-radius: 10px;"></td>
        <td><input type="number" data-price="${price}"  class="form-control item-quantity input-sm" value=1 name="quantity[]" style="border-radius: 10px;"></td>
        <td class="item-price">${price}</td>
        <td><a class="btn btn-danger btn-sm remove-item-btn"  data-id="${id}"><span class="fa fa-trash"></span></a></td>
        </tr>`;
        
        $('.order-list').append(html);
        calculate_total();
    });//end add item 
    

    
    //remove item
    $('body').on('click','.remove-item-btn',function(e){
        
        e.preventDefault();
        
        var id=$(this).data('id');
        $(this).closest('tr').remove();
         $('#item-'+id).removeClass('btn-default disabled').addClass('btn-success');
        calculate_total();
   
        
    });//end remove item
    
   //when change quantity
    $('body').on('change','.item-quantity',function(e){
       var quantity=$(this).val();
        var itemprice=$(this).data('price');
        $(this).closest('tr').find('.item-price').html(quantity*itemprice);
         calculate_total();
//       var itemprice=parseInt();
//       var total_price=quantity*itemprice;
//        $('.total-price').html(total_price);
    });
    
    
    $('body').on('click','.disabled',function(e){
        e.preventDefault();
    });
    
    
    
});//end document ready
function calculate_total(){
    var price=0;
    $('.order-list .item-price').each(function(index){
        price+=parseInt($(this).html());
    });
   $('.total_price').val(price);
}


//read More
$(document).ready(function(){
    $(".more-btn").click(function(){
        $(".hide-more").toggle();
    });
                  
    });