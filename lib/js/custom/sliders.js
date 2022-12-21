function swipr() {
	var nSlider = document.querySelectorAll(".swiper-new");

	[].forEach.call(nSlider, function (slider, index, arr) {
		var data = slider.getAttribute("data-swiper") || {};

		if (data) {
			var dataOptions = JSON.parse(data);
		}

		slider.options = Object.assign({}, dataOptions);

		var swiper = new Swiper(slider, slider.options);
	});
}

document.addEventListener("DOMContentLoaded", () => {
	swipr();
});
