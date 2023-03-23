$(document).ready(function(){
	// Mobile Menu
	$('.menu_icon').click(function(){
		$('.home_page_main_left_site').slideToggle(300);
		$('.header_mobile_menu').toggleClass('menu_icon_fixed');

		return false
	});

	// Banner Carousel
	$('.rswi_items_all').owlCarousel({
		loop: true,
		nav: false,
		autoplay: false,
		margin: 10,
		responsive:{
	        0:{
	            items: 1.3,
	        },
	        768:{
	            items: 2.4,
	            dots: true,
	        },
	        992:{
	            items: 3,
				dots: false,
	        }
	    }
	});





	// Time Countdown
	// Set the date we're counting down to
	var countDownDate = new Date("Mar 23, 2023 00:00:00").getTime();

	// Update the countdown every 1 second
	var x = setInterval(function () {
	  // Get today's date and time
	  var now = new Date().getTime();

	  // Find the distance between now and the countdown date
	  var distance = countDownDate - now;

	  // Calculate the days, hours, minutes and seconds left
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	  // Display the result in the HTML elements
	  document.getElementById("days").innerHTML = days.toString().padStart(2, "0");
	  document.getElementById("hours").innerHTML = hours
	    .toString()
	    .padStart(2, "0");
	  document.getElementById("minutes").innerHTML = minutes
	    .toString()
	    .padStart(2, "0");
	  document.getElementById("seconds").innerHTML = seconds
	    .toString()
	    .padStart(2, "0");

	  // If the countdown is over, show a message
	  if (distance < 0) {
	    clearInterval(x);
	    document.getElementById("countdown").innerHTML = "EXPIRED";
	  }
	}, 1000);




	// Mobile Menu Icon
	$(document).ready(function(){
		$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
			$(this).toggleClass('open');
		});
	});




	// Choose Gender
	$('.qp_gender_male').click(function(){
		$('.qpg_gc_male').addClass('qp_gender_male_borderm');
		$('.qpg_gc_female').removeClass('qp_gender_male_borderfe');

		return false
	});
	$('.qp_gender_female').click(function(){
		$('.qpg_gc_female').addClass('qp_gender_male_borderfe');
		$('.qpg_gc_male').removeClass('qp_gender_male_borderm');

		return false
	});


	//Choose Gender Progress bar
	$('.bar-percentage[data-percentage]').each(function () {
		  var progress = $(this);
		  var percentage = Math.ceil($(this).attr('data-percentage'));
		  $({countNum: 0}).animate({countNum: percentage}, {
		    duration: 200,
		    easing:'linear',
		    step: function() {
		      // What todo on every count
		      var pct = Math.floor(this.countNum) + '%';
		      progress.text(pct) && progress.siblings().children().css('width',pct);
		    }
		  });
		});


	//Left Site Meter Progress
	const bar = document.getElementById("bar");
	function setProgress(percent) {
	  const p = 180 - (percent / 100) * 180;
	  bar.style.transform = `rotate(-${p}deg)`;
	}
	let progress = 0;
	const interval = setInterval(() => {
	  progress += 15;
	  setProgress(progress);
	  if (progress > 55) {
	    clearInterval(interval);
	  }
	}, 200)



});