jQuery(document).ready(function(){
	(function() {
		ymaps.ready(function() {
			var coder = ymaps.geocode("Москва, Большой Гнездниковский переулок, дом 10");
			coder.then(function(res) {
				var coords = res.geoObjects.get(0).geometry.getCoordinates();
				if (coords) {
					var map = new ymaps.Map("map_2", {
						center: coords,
						zoom: 15
					});
					var point = new ymaps.Placemark(coords, {
						iconContent: '',
						balloonContent: 'Большой Гнездниковский переулок, дом 10'
                        }, {
						preset: 'twirl#violetIcon'
					});
					
					map.geoObjects.add(point);
				}
			})
		});
	})();
	
	(function() {
		ymaps.ready(function() {
			var coder = ymaps.geocode("Москва, Украинский бульвар, дом 7");
			coder.then(function(res) {
				var coords = res.geoObjects.get(0).geometry.getCoordinates();
				if (coords) {
					var map = new ymaps.Map("map_3", {
						center: coords,
						zoom: 15
					});
					var point = new ymaps.Placemark(coords, {
						iconContent: '',
						balloonContent: 'Украинский бульвар, дом 7'
                        }, {
						preset: 'twirl#violetIcon'
					});
					
					map.geoObjects.add(point);
				}
			})
		});
	})();
	
	
	(function() {
		ymaps.ready(function() {
			var coder = ymaps.geocode("Москва, Кривоколенный переулок, д. 10, стр. 5");
			coder.then(function(res) {
				var coords = res.geoObjects.get(0).geometry.getCoordinates();
				if (coords) {
					var map = new ymaps.Map("map_4", {
						center: coords,
						zoom: 15
					});
					var point = new ymaps.Placemark(coords, {
						iconContent: '',
						balloonContent: 'Кривоколенный переулок, д. 10, стр. 5'
                        }, {
						preset: 'twirl#violetIcon'
					});
					
					map.geoObjects.add(point);
				}
			})
		});
	})();
	
	(function() {
		ymaps.ready(function() {
			var coder = ymaps.geocode("Москва, Ярцевская улица, дом 19 (вход с Оршанской улицы)");
			coder.then(function(res) {
				var coords = res.geoObjects.get(0).geometry.getCoordinates();
				if (coords) {
					var map = new ymaps.Map("map_5", {
						center: coords,
						zoom: 15
					});
					var point = new ymaps.Placemark(coords, {
						iconContent: '',
						balloonContent: 'Ярцевская улица, дом 19 (вход с Оршанской улицы)'
                        }, {
						preset: 'twirl#violetIcon'
					});
					
					map.geoObjects.add(point);
				}
			})
		});
	})();
	
	(function() {
		ymaps.ready(function() {
			var coder = ymaps.geocode("Москва, Проспект Мира 26, стр.1");
			coder.then(function(res) {
				var coords = res.geoObjects.get(0).geometry.getCoordinates();
				if (coords) {
					var map = new ymaps.Map("map_1", {
						center: coords,
						zoom: 15
					});
					var point = new ymaps.Placemark(coords, {
						iconContent: '',
						balloonContent: 'Проспект Мира 26, стр.1'
                        }, {
						preset: 'twirl#violetIcon'
					});
					
					map.geoObjects.add(point);
				}
			})
		});
	})();
	
	
	jQuery('.address .maps').matchHeight({byRow: true, property: 'height'});
	
	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}
	
	var n = 0;
	jQuery('.b-moreContent.news .button').click(function(e){
		n++;
		
		var limit = n*4-1+', 4';
		var tag = getParameterByName('tag');
		
		if(tag != null){
			form = 'limit='+limit+'&tag='+tag;
		}else{
			form = 'limit='+limit;
		}
		jQuery(this).addClass('process');
		
		jQuery.ajax({
			type: "POST",
			url: '/',
			data: form, // serializes the form's elements.
			success: function(data)
			{
				jQuery('.b-moreContent.news .button').removeClass('process');
				var ftl = jQuery('.all_news');
				jQuery(data).find('.more_news').appendTo(ftl).hide().fadeIn('1000'); // show response from the php script.
				
				jQuery('.more_news .normal_news').matchHeight({byRow: true, property: 'height'});
			}
		});
		
		
		e.preventDefault();
	});
	
	jQuery('.slider-switcher .option').click(function(){
		jQuery('.slider-switcher .option').removeClass('active');
		jQuery(this).addClass('active');
		
		if(jQuery(this).hasClass('option-left')){
			jQuery('.gallery_grid').hide();
			jQuery('#slider1_container').fadeIn('500');
		}
		if(jQuery(this).hasClass('option-right')){
			
			jQuery('#slider1_container').hide();
			jQuery('.gallery_grid').fadeIn('500');
		}
	});
	
	jQuery('.header .menu-btn').click(function(){
		jQuery('#top_menu,.mod-languages').slideToggle();
	});
	
	
	//url menu switcher//
	
	if (window.location.href.indexOf("en/menu/category/") > -1) {
		var pathname = window.location.pathname;
		
		var new_url = pathname.replace('ru','en');
		jQuery('.mod-languages a').attr('href',new_url);
		console.log(new_url);
	}
	
	if (window.location.href.indexOf("en/menu/category/") > -1) {
		var pathname = window.location.pathname;
		
		var new_url = pathname.replace('en','ru');
		jQuery('.mod-languages a').attr('href',new_url);
		console.log(new_url);
	}
});
