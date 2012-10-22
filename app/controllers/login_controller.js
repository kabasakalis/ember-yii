define('controllers/login_controller',
    ['ember', 'spin'],
    function () {
        return Ember.Controller.extend({

            content:null,

            enterLogin:function () {
                this.set('content', {username:"admin", password:'admin1111'});
            },

            exitEditing:function () {
                if (this.transaction) {
                    this.transaction.rollback();
                    this.transaction = null;
                }
            },

            sendCredentials:function (username, password) {

                var data = JSON.stringify({username:username, password:password}, null, '\t');

                jQuery.ajax({
                    url:'/site/login',
                    data:data,
                    type:'POST',
                    beforeSend:function () {
                        var target = document.getElementById('container');
                        var spinner = new Spinner().spin(target);
                        $(target).data('spinner', spinner);
                    },
                    complete:function () {
                        $('#container').data('spinner').stop();
                    },
                    error:function (res) {
                        var error_msg = '<div id="error_msg" class="alert alert-error">' + res.status + ' ' + res.statusText + ' ' + res.responseText + '</div>';
                        $('#error_msg').remove();
                        $('#err').append(error_msg);
                    },
                    success:function (response) {
                        if (response.authenticated) {
                            App.router.get('applicationController').get('loginform').remove();
                            App.router.get('applicationController').set('loggedin', true);
                            App.router.transitionTo('contacts.index');
                        }
                    }
                })
            }
        });
    }
);


