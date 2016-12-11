jQuery(window).load(function () {
    jQuery("body").animate({scrollTop: 0}, 500);

    //load gif
    var images = document.getElementsByClassName("video-js gif");

    for (i = 0; i < images.length; i++) {

        var image = images[i];

        if (jQuery(window).width() <= 1024) {

            var downloadingImage = new Image();

            downloadingImage.onload = function () {
                image.src = this.src;
                setTimeout(
                    function () {
                        jQuery(window).trigger(
                            'videojs_'+image.getAttribute("data-id")+'__video__onended'
                        );
                    }, parseInt(image.getAttribute("data-frame-count")) * 0.1 * 1000
                );
            };

            downloadingImage.src = image.getAttribute("data-src");
        }
    }
});