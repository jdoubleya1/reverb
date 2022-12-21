/**
 * Custom JavaScript
 *
 * @since 1.0.0
 */

;(function ($, window, document, undefined) {
  var REVERB = {
    init: function () {
      this.utils.init()
    },
    utils: {
      init: function () {
        this.adminLoader()
        this.acfLabelPosition()
        this.themeSkinFields()
      },
      adminLoader: function () {
        // $(window).on('load', function () {
        // 	$('[data-name="new_font_family"]').each(function () {});
        // 	// 	$('#wpcontent').css('opacity', '1');
        // });
        // $.getJSON(
        // 	'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBhRBjz93LAyZQVgVI_aiUqiJGVMJZlmkI',
        // 	function (fonts) {
        // 		for (var i = 0; i < fonts.items.length; i++) {
        // 			$(this)
        // 				.find('select')
        // 				.append(
        // 					$('<option></option>')
        // 						.attr('value', fonts.items[i].family)
        // 						.text(fonts.items[i].family)
        // 				);
        // 		}
        // 	}
        // );
      },
      acfLabelPosition: function () {
        // $(window).on('load', function () {
        // 	$('.acf-fields').removeClass('-top -border').addClass('-left');
        // });
      },
      themeSkinFields: function () {
        $(window).on('load', function () {
          $('.theme-skin')
            .find('input')
            .each(function () {
              var input = $(this)

              if (input.attr('value') == 'navbar-light bg-light text-dark') {
                input.parent().addClass('bg-light')
              }
              if (input.attr('value') == 'navbar-dark bg-dark text-light') {
                input.parent().addClass('bg-dark')
              }
            })
        })
      },
    },
  }

  REVERB.init()
})(jQuery, window, document)
