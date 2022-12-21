function animateFrom(elem, direction) {
	direction = direction | 1;

	var x = 0,
		y = direction * 100;

	if (elem.classList.contains("gs_reveal_fromLeft")) {
		x = -100;
		y = 0;
	} else if (elem.classList.contains("gs_reveal_fromRight")) {
		x = 100;
		y = 0;
	} else if (elem.classList.contains("gs_reveal_fromTop")) {
		x = 0;
		y = 100;
	}

	gsap.fromTo(
		elem,
		{ x: x, y: y, autoAlpha: 0 },
		{
			duration: 1.25,
			x: 0,
			y: 0,
			autoAlpha: 1,
			ease: "expo",
			overwrite: "auto",
		}
	);
}

function maskFrom(elem) {
	var x = 0,
		y = 0,
		rx = 0,
		ry = 0;

	if (elem.classList.contains("slide-mask-left")) {
		x = 200;
		rx = -200;
		y = 0;
		ry = 0;
	} else if (elem.classList.contains("slide-mask-right")) {
		x = -200;
		rx = 200;
		y = 0;
		ry = 0;
	} else if (elem.classList.contains("slide-mask-top")) {
		x = 0;
		rx = 0;
		y = -200;
		ry = 200;
	} else if (elem.classList.contains("slide-mask-bottom")) {
		x = 0;
		rx = 0;
		y = 200;
		ry = -200;
	}

	gsap.to(elem, {
		duration: 1,
		"clip-path": "polygon(-10% -10%, 110% -10%, 110% 110%, -10% 110%)",
		ease: "sine.out",
	});
}

function hide(elem) {
	gsap.set(elem, { autoAlpha: 0 });
}

/**
 *
 */
document.addEventListener("DOMContentLoaded", function () {
	gsap.registerPlugin(ScrollTrigger);

	/**
	 * Basic Reveal
	 */
	gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
		hide(elem);

		ScrollTrigger.create({
			trigger: elem,
			once: true,
			onEnter: function () {
				animateFrom(elem);
			},
		});
	});

	/**
	 * Mask Reveal
	 */
	gsap.utils.toArray(".gs_img_reveal").forEach(function (elem) {
		ScrollTrigger.create({
			trigger: elem,
			once: true,
			onEnter: function () {
				maskFrom(elem);
			},
		});
	});
});
