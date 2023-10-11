
        $(function() {
            // create the image rotator
            setInterval("slideshow()", 2000);
        });

        function slideshow() {
            var onCurPhoto = $('#photoShow div.current');
            var onNxtPhoto = onCurPhoto.next();
            if (onNxtPhoto.length == 0){
                onNxtPhoto = $('#photoShow div:first');
			}
            onCurPhoto.removeClass('current').addClass('previous');
            onNxtPhoto.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, 1000,
                function() {
                    onCurPhoto.removeClass('previous');
                });
        }
