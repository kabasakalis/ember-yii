define('views/edit_contact_view', [
    'text!templates/edit_contact.html',
    'helpers/forms',
    'ember'
],
    function (editcontact_markup) {
        return    Ember.View.extend({
            template:Ember.Handlebars.compile(editcontact_markup),
            tagName:'form',
            classNames:'form-horizontal',
            didInsertElement:function () {
                this._super();
                this.$('input:first').focus();
                this.$().hide().show("slow");
            },
            submit:function (event) {
                event.preventDefault();
                this.get('controller').updateRecord();
            }
        });
    }
);

