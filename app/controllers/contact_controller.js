define('controllers/contact_controller',
    ['ember' ],
    function () {
        return Ember.Controller.extend({
            destroyRecord:function () {
                this.get('content').deleteRecord();
                App.store.commit();
                App.router.transitionTo('contacts.index');
            }
        });
    }
);


