function Slider (container, nav) {
	
	this.container = container;
	this.nav = nav;

	this.images = this.container.find('img');
	this.imgWidth = this.images.first().width();
	this.imgLen = this.images.length;

	this.current = 0;

}

Slider.prototype.display = function  () {
	// console.log(this.container);
	// console.log(this.nav);
	// console.log(this.images);
	// console.log(this.imgWidth);
	// console.log(this.imgLen);
}

Slider.prototype.makeMove = function  ( coor ) {
	
	// console.log(coor);
	// console.log(this.current);

	this.container.animate({

		'margin-left': coor || -(this.current * this.imgWidth)
	});

}

Slider.prototype.setCurrent = function  (dir) {
	
	// console.log('from prototype: ' + dir);
	// console.log(~~(dir === 'next'));
	 this.current +=  ~~( dir === 'next' ) || -1  ;

	this.current = ( this.current < 0 ) ? this.imgLen -1 : this.current % this.imgLen ;

	// console.log(this.current);

	return this.current; 

}
