define('routes/app_router',
    ['ember' ],
    function () {
        return  Em.Router.extend({
            enableLogging:true, //useful for development
            /*  location property:  'hash': Uses URL fragment identifiers (like #/blog/1) for routing.
             'history': Uses the browser's history.pushstate API for routing. Only works in modern browsers with pushstate support.
             'none': Does not read or set the browser URL, but still allows for routing to happen. Useful for testing.*/
            location:'hash',
            /*   location: 'history',
             rootURL:'/app',*/
            root:Ember.Route.extend({
                index:Ember.Route.extend({
                    route:'/',

                    connectOutlets:function (router) {
                        //Render application View ,sign in.
                        v = router.get('applicationController').get('view');
                        if (v) v.remove();
                        App.router.get('applicationController').set('loggedin', false);

                        router.get('applicationController').connectOutlet({name:'login', outletName:'loginform'});
                        router.get('loginController').enterLogin();

                    }
                }),
                contacts:Em.Route.extend({
                    route:'/contacts',

                    showContact:function (router, event) {
                        router.transitionTo('contacts.contact.index', event.context);
                    },

                    showNewContact:function (router) {
                        router.transitionTo('contacts.newContact', {});
                    },
                    logout:function (router) {

                        jQuery.ajax({
                            url:'/site/logout',
                            type:'POST',
                            success:function (response) {
                                if (!response.authenticated) {
                                    router.get('applicationController').set('loggedin', false).get('view').remove();
                                    router.transitionTo('root.index', {});
                                }
                            }
                        })
                    },


                    index:Em.Route.extend({
                        route:'/',
                        connectOutlets:function (router) {
                            if (router.get('applicationController').get('loggedin'))
                                router.get('applicationController').connectOutlet('contacts', App.store.findAll(App.Contact));
                            else   router.transitionTo('root.index');
                        }
                    }),

                    contact:Em.Route.extend({
                        route:'/contact',
                        index:Em.Route.extend({
                            route:'/:contact_id',
                            deserialize:function (router, urlParams) {
                                return App.store.find(App.Contact, urlParams.contact_id);
                                debugger;
                            },

                            showEdit:function (router) {
                                router.transitionTo('contacts.contact.edit');
                            },

                            connectOutlets:function (router, context) {
                                if (router.get('applicationController').get('loggedin'))
                                    router.get('contactsController').connectOutlet('contact', context);
                                else   router.transitionTo('root.index');
                            }
                        }),

                        edit:Em.Route.extend({
                            route:'edit',

                            cancelEdit:function (router) {
                                router.transitionTo('contacts.contact.index');
                            },

                            connectOutlets:function (router) {
                                if (router.get('applicationController').get('loggedin')) {
                                    var contactsController = router.get('contactsController');
                                    contactsController.connectOutlet('editContact', router.get('contactController').get('content'));
                                    router.get('editContactController').enterEditing();
                                } else     router.transitionTo('root.index');
                            },

                            exit:function (router) {
                                router.get('editContactController').exitEditing();
                            }
                        })
                    }),
                    newContact:Em.Route.extend({
                        route:'/contacts/new',

                        cancelEdit:function (router) {
                            router.transitionTo('contacts.index');
                        },

                        connectOutlets:function (router) {
                            if (router.get('applicationController').get('loggedin')) {
                                router.get('contactsController').connectOutlet('editContact', {});
                                router.get('editContactController').enterEditing();
                            } else     router.transitionTo('root.index');
                        },

                        exit:function (router) {
                            router.get('editContactController').exitEditing();
                        }
                    })
                })
            })
        });
    }
);





