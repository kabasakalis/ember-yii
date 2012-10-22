define('views/contact_in_list_view', [
    'text!templates/contact_in_list.html',
    'ember'
],
    function (Contact_In_List) {
        return    Ember.View.extend({
            template:Ember.Handlebars.compile(Contact_In_List),
            classNameBindings: 'isActive:active',
            isActive: function() {
               var id = this.get('content.id'),
                   currentPath = App.router.get('currentState.path');
               if (id) {
                 return App.get('router.contactController.content.id') === id &&
                        currentPath.indexOf('contacts.contact') > -1;
               } else {
                 return currentPath.indexOf('contacts.newContact') > -1;
               }
             }.property('App.router.currentState', 'App.router.contactController.content')
        });

    }
);

