var $ = jQuery;
jQuery(document).ready(function () {

    jQuery('.waha_file', this).click(function () {

        var e = jQuery(this);
        tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');

        window.send_to_editor = function (html) { // when insert into post is clicked                    
            var a = jQuery(html); // we get path to file                
            fileurl = a.attr('href'); // if you are using type=image then use 'src' instead of 'href'
            var fileName = jQuery(a[0]).text();

            e.parent().find('.file-name').text(fileName).attr('value', fileName);
            e.parent().find('.file_name').attr('value', fileName);
            e.next('.file_url').val(fileurl);

            tb_remove();
            // do you other AJAX magic here

        }
        return false;

    });


    // show and hide button url event
    $('#event-link').on('change', function () {
        $('#event-link-url').show('slow');
    });

    $('#event-popup').on('change', function () {
        $('#event-link-url').hide('slow');
    });

    $('#show-ticker-pages').on('change',function(){
        $('#ticker-pages').show('slow');
    });

    $('.ticker-pages-option > input').not('#show-ticker-pages').on('change',function(){
        $('#ticker-pages').hide('slow');
    })

});