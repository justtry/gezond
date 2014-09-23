(function ($) {

    if (typeof Drupal != 'undefined') {
        Drupal.behaviors.PaintProTheme = {
            attach: function (context, settings) {
                $('.form-file.error').parent('.uploader').addClass('custom-error');
                $('.form-checkbox.error').parent('span').addClass('custom-error');
            },

            completedCallback: function () {
                // Do nothing. But it's here in case other modules/themes want to override it.
            }
        }

      Drupal.behaviors.autoUpload = {
        attach: function (context, settings) {
          $('input.form-file', context).once(function() {
            $(this).change(function() {
              $(this).parent().parent().find('input[type="submit"]').mousedown();
            });
          });
        }
      };
    }

    $(function () {

    });
    Drupal.behaviors.yourModuleName = {
        attach: function (context, settings) {
            init_filestyle_registration();
            // Weare going to do a ajax call, using a
            //  menuu call back.

        }
    }

    function init_filestyle_registration ($context, settings) {
        $('.form-file, .form-checkbox').uniform({
            fileButtonHtml: 'Upload Logo'
        });

        var $uploader = $('.uploader');

        $('.form-file').on('mouseout', function() {
            if($uploader.find('.filename').text() !== 'No file selected') {
                $uploader.addClass('uploader-processed');
            } else {
                $uploader.removeClass('uploader-processed');
            }
        });
    };
    // Our function name is prototyped as part of the Drupal.ajax namespace, adding to the commands:

})(jQuery);