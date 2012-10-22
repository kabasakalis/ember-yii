
define('views/application_view', [
  'text!templates/application.html',
    'ember'
	],
	function( Application_markup) {
    return    Ember.View.extend({
   template: Ember.Handlebars.compile( Application_markup ),
     elementId:'container',
        didInsertElement: function(){
                   this.$().hide().show("slow");
                   }
       });
	}
);
