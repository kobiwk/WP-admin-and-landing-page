//jquery importing resolved

jQuery.noConflict();
jQuery(document).foundation();

jQuery(document).on('ready', function() {
  jQuery(".center").slick({
  	arrows: true,
  	autoplay: true,
    dots: false,
    infinite: true,
    centerMode: true,
    centerPadding: '20px',
    focusOnSelect: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    variableWidth: true
  });

  
    });

		

