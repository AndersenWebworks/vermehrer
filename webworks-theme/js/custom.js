jQuery(document).ready(function ($) {


    /* KOEKJE */
    koekje({
        google: {
            googleID: "",
        },
        services: {
            YouTube: false,
            Facebook: false,
            Twitter: false,
            Vimeo: false,
            Spotify: false,
            GoogleMaps: false,
            Userlike: false,
            Instagram: false,
            Issuu: false,
            Matomo: false,
            GoogleAnalytics: true
        },
        widget: {
            text: 'de',
            position: 'center',
            logo: '',
            color: {
                background: '#fff',
                text: '#999',
                button: '#999',
                slider: '#999'
            },
            mode: 'light',
            background: 'dots',
            cornerCookie: true,
            cornerCookieColor: '#999',
            curtain: true,
            curtainOpacity: .8,
            layout: 'small',
            fonts: true,
            headline: true,
        },

        placeholder: false
    });

});

/* TO TOP BUTTON 
_______________________________*/
var scrollTrigger;

jQuery(window).scroll(function () {
    if (jQuery(window).width() > 1024) {
        if (jQuery(window).scrollTop() >= 100) {
            jQuery('.totop').fadeIn(250);
        } else {
            jQuery('.totop').fadeOut(250);
        }
    } else {
        if (jQuery(window).scrollTop() >= 100) {
            jQuery('.totop').fadeIn(250);
        } else {
            jQuery('.totop').fadeOut(250);
        }
    }
});