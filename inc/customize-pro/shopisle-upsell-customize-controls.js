( function( api ) {

	// Extends our custom "shopisle-upsell" section.
	api.sectionConstructor['shopisle-upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
