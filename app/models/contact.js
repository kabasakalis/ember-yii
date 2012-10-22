define('models/contact',
    ['ember', 'ember_data', 'lib/md5'],

    function () {

        var Contact = DS.Model.extend({
            first_name:DS.attr('string'),
            last_name:DS.attr('string'),
            email:DS.attr('string'),
            notes:DS.attr('string'),

            didLoad:function () {
                //  console.log('model loaded', this.toJSON());
                //   console.log ('id: '+this.id+' '+this.get('last_name'),this);
            },
            full_name:function () {
                var firstName = this.get('first_name'),
                    lastName = this.get('last_name');

                if (!firstName && !lastName) {
                    if (this.get('id') === undefined) {
                        return '(New Contact)';
                    } else {
                        return '(No Name)';
                    }
                }
                if (firstName === undefined) firstName = '';
                if (lastName === undefined) lastName = '';
                return firstName + ' ' + lastName;
            }.property('first_name', 'last_name'),

            gravatar:function () {
                var email = this.get('email');
                if (!email) email = '';
                return 'http://www.gravatar.com/avatar/' + MD5(email);
            }.property('email')

        });
        Contact.reopenClass({
            url:'contact',//this must match JSON_RESPONSE_ROOT_SINGLE constant in modules/api/controllers/ContactController.php
            pk:"id"
        });
        return Contact;
    }
);







