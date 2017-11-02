function sHeader($header) {
    let defaultStickyModificator = 'main-header--sticky-default';
    let headerHeight = $header[0].clientHeight;

    // For prevent page jumping
    $('body').css({ 'margin-top': headerHeight });

    if (!$header.hasClass(defaultStickyModificator)) {
        $(window).on('scroll', () => {
            let pageScroll = $(window).scrollTop();
            let stickyModificator = 'main-header--sticky';
            let middleSelector = '.main-header__middle';

            if (pageScroll >= headerHeight) {
                $header.addClass(stickyModificator);
                $(middleSelector).hide();
            } else if ($header.hasClass(stickyModificator)) {
                $header.removeClass(stickyModificator);
                $(middleSelector).show();
            }
        });
    }

}


sHeader($('.main-header'));
