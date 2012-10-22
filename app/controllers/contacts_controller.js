define('controllers/contacts_controller',
    ['ember' ],
    function () {
      return Ember.ArrayController.extend({
       sortProperties: ['last_name', 'first_name']
      });
    }
);

