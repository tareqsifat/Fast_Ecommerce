$(document).ready(function () {
    $('.add_to_cart_ajax').click(function (e) {
        e.preventDefault(); 
        var product_id = $(this).parents('.ajax_cart_parent').find('.product_id').val();
        var title = $(this).parents('.ajax_cart_parent').find('.title').val();
        var price = $(this).parents('.ajax_cart_parent').find('.price').val();
        var price = $(this).parents('.ajax_cart_parent').find('.isshipping').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        var data = {
            'product_id': product_id,
            'title': title,
            'price': price,
        }
        // alert('data');
        $.ajax({
            url: '/ajax-add-to-cart',
            type: 'POST',
            data: data,
            success: function (res) {
                $('.totalCart').html(res.total);
                $('.ajax_totalqtty').html(res.totalqtty);
                $.toast({
                    heading: 'Success',
                    text: 'Cart added successfully',
                    showHideTransition: 'plain',
                    icon: 'success',
                    // loader: false,
                    loaderBg: '#369038',
                    // position: 'bottom-left',
                    // hideAfter: 50000, // in milli seconds
                    position: {
                        bottom: 50,
                        left: 0
                    },
                })
            }
        });
    });

});
    // function getData() {
    //     $.ajax({
    //         url: '/my-cart-item',
    //         type: 'GET',
    //         success: function (res) {
    //             var html_option = '';
    //             $.each(res.data, function (key, val) { html_option += '<li class="myChartItems key' + key + '"><div class="row d-flex"><div class="col-sm-2 col-xsm-2"><div class="product-image"></div></div><div class="col-sm-10 col-xsm-10"><div class="row"><div class="col-sm-12 col-xsm-12 px-0"><div class="product-name"><a class="link-to-product" href="">' + val.model.title + '</a></div></div></div><div class="row mt-2"><div class="col-sm-12 col-xsm-12 col-md-12 col-lg-12 mr-2"><table class="w-100"><tr class="rowparent"><td width="48%"><div class="produtc-price"><p class="price">৳ ' + val.price + '</p></div></td><td width="48%"><div class="cart_quantity mx-2"><div class="cart-quantity-input ml-4 d-flex"><input type="hidden" name="row_id" class="row_id" value="' + val.rowId + '" ><button class="decriment"><i class="fa fa-minus"></i></button><button desabled class="btn-desabled"><input type="text" desabled name="mQuantity" class="mycart_quantity" value="' + val.qty + '"></button><button class="incriment"><i class="fa fa-plus"></i></button></div></div></td><td width="4%" class="del_cart_item"><div class="pl-4 ml-5"><input type="hidden" name="key" class="key" value="key' + key + '"><input type="hidden" name="row_id" class="row_id" value="' + val.rowId + '"><button class="delete_cart_Item"><i class="fa fa-trash text-dark" aria-hidden="true"></i></button></div></td></tr></table></div></div></div></div></li>' });
    //             $('.mycart_scroll_section_ajax_callr').html(html_option);
    //         }
    //     });
    // }
//     getData();
//     $('.add_to_cart_ajax').click(function (e) {
//         e.preventDefault();F
//         var product_id = $(this).parents('.ajax_cart_parent').find('.product_id').val();
//         var title = $(this).parents('.ajax_cart_parent').find('.title').val();
//         var price = $(this).parents('.ajax_cart_parent').find('.price').val();
//         var price = $(this).parents('.ajax_cart_parent').find('.isshipping').val();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             }
//         });
//         var data = {
//             'product_id': product_id,
//             'title': title,
//             'price': price,
//         }
//         // alert('data');
//         $.ajax({
//             url: '/ajax-add-to-cart',
//             type: 'POST',
//             data: data,
//             success: function (res) {
//                 $('.totalCart').html(res.total);
//                 $('.ajax_totalqtty').html(res.totalqtty);
//                 getData();
//                 $.toast({
//                     heading: 'Success',
//                     text: 'Cart added successfully',
//                     showHideTransition: 'plain',
//                     icon: 'success',
//                     // loader: false,
//                     loaderBg: '#369038',
//                     // position: 'bottom-left',
//                     // hideAfter: 50000, // in milli seconds
//                     position: {
//                         bottom: 50,
//                         left: 0
//                     },
//                 })
//             }
//         });
//     });

//     $('.incriment').click(function (e) {
//         e.preventDefault();
//         alert('working');
//         var row_id = $(this).parents('.cart_quantity').find('.row_id').val();
//         var inc_qtty = $(this).parents('.cart_quantity').find('.mycart_quantity').val();
//         var value = parseInt(inc_qtty, 10);
//         value = isNaN(value) ? 0 : value;
//         if (value < 50) {
//             value++;
//             $(this).parents('.cart_quantity').find('.mycart_quantity').val(value);
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 }
//             });
//             var data = {
//                 'row_id': row_id,
//                 'totalquantity': value,
//             }
//             $.ajax({
//                 url: '/incriment-qty',
//                 type: 'POST',
//                 data: data,
//                 success: function (res) {
//                     // alert(res.total);
//                     $('.totalCart').html(res.total);
//                     $('.ajax_totalqtty').html(res.totalqtty);
//                 }
//             });
//         }

//     });
//     $('.decriment').click(function (e) {
//         e.preventDefault();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             }
//         });
//         var row_id = $(this).parents('.cart_quantity').find('.row_id').val();
//         var inc_qtty = $(this).parents('.cart_quantity').find('.mycart_quantity').val();
//         var value = parseInt(inc_qtty, 10);
//         value = isNaN(value) ? 0 : value;
//         if (value > 1) {
//             value--;
//             $(this).parents('.cart_quantity').find('.mycart_quantity').val(value);
//             var data = {
//                 'row_id': row_id,
//                 'totalquantity': value,
//             }
//             $.ajax({
//                 url: '/incriment-qty',
//                 type: 'POST',
//                 data: data,
//                 success: function (res) {
//                     // alert(res.total);
//                     $('.totalCart').html(res.total);
//                     $('.ajax_totalqtty').html(res.totalqtty);
//                 }
//             });
//         }
//     });
//     $('.delete_cart_Item').click(function (e) {
//         e.preventDefault();
//         alert('del working');
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             }
//         });
//         var row_id = $(this).parents('.del_cart_item').find('.row_id').val();
//         var key = $(this).parents('.del_cart_item').find('.key').val();
//         var data = {
//             'row_id': row_id,
//         }
//         $.ajax({
//             url: '/cart-item/delete',
//             type: 'POST',
//             data: data,
//             success: function (res) {
//                 $("." + key).hide();
//                 $('.totalCart').html(res.total);
//                 $('.ajax_totalqtty').html(res.totalqtty);
//                 if (res.totalqtty == 0) {
//                     $('.ajax_del_cal').addClass('visibility-hidden');
//                     $('.ajax_del_cal').removeClass('visibility-hidden');
//                 }
//             }
//         });
//     });
// });
