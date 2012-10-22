define('views/login_view', [
    'text!templates/login_form.html',
    'handlebars',
    'helpers/forms',
    'ember',

],
    function (login_markup) {
        return    Ember.View.extend({
            template:Ember.Handlebars.compile(login_markup),
            tagName:'form',
            classNames:'form-horizontal span4 offset3 well',
            didInsertElement:function () {
                this.$().hide().show("slow");
            },
            submit:function (event) {
                event.preventDefault();

                var username = this.$('#username').val();
                var password = this.$('#pwd').val();

                this.get('controller').sendCredentials(username, password);
            }
        });
    }
);