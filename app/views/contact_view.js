define('views/contact_view', [
  'text!templates/contact.html',
		'ember'
	],
	function( contact) {
    return    Ember.View.extend({
   template: Ember.Handlebars.compile( contact),
        tagName: 'div',
        classNames: 'alert alert-info',
        didInsertElement: function(){
            this.$().hide().show("slow");
            }
       });
	}
);