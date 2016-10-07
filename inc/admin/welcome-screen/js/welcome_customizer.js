jQuery(document).ready(function() {
    var shop_isle_aboutpage = shopIsleWelcomeScreenCustomizerObject.aboutpage;
    var shop_isle_nr_actions_required = shopIsleWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof shop_isle_aboutpage !== 'undefined') && (typeof shop_isle_nr_actions_required !== 'undefined') && (shop_isle_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + shop_isle_aboutpage + '"><span class="shop-isle-actions-count">' + shop_isle_nr_actions_required + '</span></a>');
    }

});