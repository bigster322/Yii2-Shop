/*price range*/
 $('#sl2').slider();

 $('.catalog').dcAccordion({
	 speed: 300,
 });

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

function showCart(cart) {
	$('#cart .modal-body').html(cart);
	$('#cart').modal();
}


$('.add-to-cart').on('click', function (e) {
	e.preventDefault();
	var id = $(this).data('id');
	var qty = $('#qty').val();

	$.ajax({
		url: 'http://localhost/study/php/yii2/shop/basic/web/cart/add',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function (res) {
			console.log(res);
			showCart(res);
			if (res == 'error') alert('Error');
        },
		error: function (e) {
			console.log(e);
        }
	})
});

$('#cart .modal-body').on('click', '.del-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/study/php/yii2/shop/basic/web/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            console.log(res);
            showCart(res);
            if (res == 'error') alert('Error');
        },
        error: function (e) {
            console.log(e);
        }
    })
});

$('#cartBtn').on('click', function (e) {
	e.preventDefault();

    $.ajax({
        url: 'http://localhost/study/php/yii2/shop/basic/web/cart/view',
        data: {layout: 0},
        type: 'GET',
        success: function (res) {
            console.log(res);
            showCart(res);
            if (res == 'error') alert('Error');
        },
        error: function (e) {
            console.log(e);
        }
    })
});

function clearCart() {
    $.ajax({
        url: 'http://localhost/study/php/yii2/shop/basic/web/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
            if (res == 'error') alert('Error');
        },
        error: function () {
            alert('Error');
        }
    });
}