jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About Shop Isle page -> Actions required tab */
    var shop_isle_nr_actions_required = shopIsleWelcomeScreenObject.nr_actions_required;

    if ( (typeof shop_isle_nr_actions_required !== 'undefined') && (shop_isle_nr_actions_required != '0') ) {
        jQuery('li.shop-isle-w-red-tab a').append('<span class="shop-isle-actions-count">' + shop_isle_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".shop-isle-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');

        jQuery.ajax({
            type       : "GET",
            data       : { action: 'shop_isle_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : shopIsleWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.shop-isle-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + shopIsleWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var shop_isle_actions_count = jQuery('.shop-isle-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof shop_isle_actions_count !== 'undefined' ) {
                    if( shop_isle_actions_count == '1' ) {
                        jQuery('.shop-isle-actions-count').remove();
                        jQuery('.shop-isle-tab-pane#actions_required').append('<p>' + shopIsleWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.shop-isle-actions-count').text(parseInt(shop_isle_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function Shop_Isle_Welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".shop-isle-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var shop_isle_actions_anchor = location.hash;

	if( (typeof shop_isle_actions_anchor !== 'undefined') && (shop_isle_actions_anchor != '') ) {
		Shop_Isle_Welcome_page_tabs('a[href="'+ shop_isle_actions_anchor +'"]');
	}

    jQuery(".shop-isle-nav-tabs a").click(function(event) {
        event.preventDefault();
		Shop_Isle_Welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.shop-isle-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
