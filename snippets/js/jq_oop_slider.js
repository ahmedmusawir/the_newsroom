function Slider (container, nav) {
	this.container = container;
	this.nav = nav;

	this.images = this.container.find('figure');
	this.imgWidth = this.images.first().width();
	this.imgTotalNumber = this.images.length;

	this.current = 0; 

}

Slider.prototype.display = function () {
	// console.log(this.container);
	// console.log(this.nav);
	// console.log(this.images);
	// console.log(this.imgWidth);
	// console.log(this.imgTotalNumber);
}

Slider.prototype.makeSlide = function (coor) {
	
	this.container.animate({
		'margin-left': coor || -(this.current * (this.imgWidth + 4))
	});
}

Slider.prototype.setCurrent = function (dir) {
	
	// console.log(dir);
	this.current += ( ~~(dir === 'next') || -1 );

	this.current = ( this.current < 0 ) ? (this.imgTotalNumber - 1) : (this.current % this.imgTotalNumber); 
	// console.log(this.current);


}
