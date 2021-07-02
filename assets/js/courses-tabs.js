(function($) {
    function nzCoursesTabs() {
        $( document ).on('click', '#tabs-course > .nz-tabs-head > ul > li', function (e) {
            e.preventDefault();

            $(this).addClass( 'active' );
            $(this).siblings().removeClass( 'active' );
            index = $(this).index();

            $( '#tabs-course > .nz-tabs-content > div' ).removeClass( 'active' );
            $( "#tabs-course > .nz-tabs-content > div:nth-child( " + (index + 1) + " )" ).addClass( "active" );
        });
    }

    nzCoursesTabs();
})( jQuery );