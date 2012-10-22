define('views/contacts_view', [
    'text!templates/contacts.html',
    'ember'
],
    function (contacts_html) {
        return    Ember.View.extend({
            template:Ember.Handlebars.compile(contacts_html),
            didInsertElement:function () {
                this.$().hide().show("slow");
            }
        });
    }
);