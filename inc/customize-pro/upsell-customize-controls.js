( function( api ) {

    // Extends our custom "shop-isle-upsell" section.
    api.sectionConstructor['shop-isle-upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );