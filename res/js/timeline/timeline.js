(function() {
	$(document)
			.ready(
					function() {
						document.getElementById("timeline_id").innerHTML = ""
								+ "<div class='timeline-row'>"
								+ "<div class='timeline-time'>"
								+ "<small>Oct 16</small>9:00 AM</div>"
								+ "<div class='timeline-icon'>"
								+ "<div class='bg-info'><i class='fa fa-camera'></i>"
								+ "</div></div><div class='panel timeline-content'>"
								+ "<div class='panel-body'><h2>This is an image posted on my timeline</h2>"
								+ "<img class='img-responsive' src='http://www.17sucai.com/upload/258094/"
								+ "2014-12-24/b9e8f2eb5de0546c6897c59568ed2565_big.png' />"
								+ "<p>Sed pretium, ligula sollicitudin laoreet"
								+ " viverra, tortor libero sodales leo, eget"
								+ " blandit nunc tortor eu nibh. Nullam mollis. "
								+ "Ut justo. Suspendisse potenti.</p></div></div>";
						var timelineAnimate;
						timelineAnimate = function(elem) {
							return $(".timeline.animated .timeline-row")
									.each(
											function(i) {
												var bottom_of_object, bottom_of_window;
												bottom_of_object = $(this)
														.position().top
														+ $(this).outerHeight();
												bottom_of_window = $(window)
														.scrollTop()
														+ $(window).height();
												if (bottom_of_window > bottom_of_object) {
													return $(this).addClass(
															"active");
												}
											});
						};
						timelineAnimate();
						return $(window).scroll(function() {
							return timelineAnimate();
						});
					});

}).call(this);
