var contactForm = {

	container: $('#contact_form'),

	config: {
		effect: 'slideToggle',
		speed: 500
	},

	init: function(myConfig) {
		// console.log(this.container);
		$.extend(true, this.config, myConfig);
		
		$('<button></button>', 
		{
			text: 'Contact Us'
		})
		.addClass('btn btn-warning')
		.insertAfter('article:first')
		.on('click', this.show);
	},

	show: function() {

		var cf = contactForm,
			cfg = cf.config;

		if( cf.container.is(':hidden')){	
			cf.close.call(cf.container);
			cf.container[cfg.effect](cfg.speed);
		}
	},

	close: function () {

		var $this = $(this);

		if($this.find('span.close').length) return;

		$('<span></span>', {
			text: 'X'
		})
		.addClass('close')
		.prependTo('article:last')
		.on('click', function () {
			$this[contactForm.config.effect](contactForm.config.speed);
		});

		$('#submit').on('click', function (event) {
			// body...
			event.preventDefault();
			$this[contactForm.config.effect](contactForm.config.speed);

		});
	}
}














