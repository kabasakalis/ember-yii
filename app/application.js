// Define libraries
require.config({
    paths:{
        jquery:'lib/jquery-1.8.0.min',
        handlebars:'lib/handlebars',
        ember:'lib/ember_1.0pre',
        ember_data:'lib/ember-data5',
        text:'lib/require/text',
        md5:'lib/md5',
        //domready:'lib/require/domReady',
        spin:'lib/spin'
    },

    shim:{
        'ember':{
            deps:[ 'jquery', 'handlebars'],
            exports:'Ember'
        },
        'ember_data':{
            deps:[ 'ember'],
            exports:'DS'
        }
    },

      waitSeconds:15,
        urlArgs:"bust=" + (new Date()).getTime()  //cancel caching for network requests,for development.
});

// Define application
define('application', [
    'routes/app_router',
    'controllers/application_controller',
    'controllers/contacts_controller',
    'controllers/contact_controller',
    'controllers/edit_contact_controller',
    'controllers/login_controller',
    'views/application_view',
    'views/contact_in_list_view',
    'views/contacts_view',
    'views/contact_view',
    'views/edit_contact_view',
    'views/login_view',
    'models/contact',
    'jquery',
    'handlebars',
    'ember',
    'ember_data',
   // 'domready',
    'spin'

], function (Router,
                       ApplicationController,
                       ContactsController,
                        ContactController,
                        EditContactController,
                        LoginController,
                        ApplicationView,
                        Contact_In_List_View,
                        ContactsView,
                        ContactView,
                        EditContactView,
                        LoginView,
                        Contact       )
    {
        return  Ember.Application.create({
            VERSION: '1.0.0',
            rootElement:'#main',
            // Load router
            Router:Router,
            //Load Controllers
            ApplicationController:ApplicationController,
            ContactsController:ContactsController,
            ContactController:ContactController,
            EditContactController:EditContactController,
            LoginController:LoginController,
            //Load associated Views
            ApplicationView:ApplicationView,
            Contact_In_List_View:Contact_In_List_View,
            ContactsView:ContactsView,
            ContactView:ContactView,
            EditContactView:EditContactView,
            LoginView:LoginView,
            //Load Contact Model
            Contact:Contact,
            //Persistence Layer,using default RESTAdapter in ember-data.js.
            store:DS.Store.create({
                revision:5,
                adapter:DS.RESTAdapter.create({
                    bulkCommit:false,
                    serializer:DS.Serializer.create({
                        primaryKey:function (type) {
                        return type.pk;
                        }
                    }),
                    mappings:{
                        contacts:Contact
                    },
                    namespace:'api'    //you should change the first segment according to the  application's  folder path on the server.
                })
            }),
            ready:function () {
            }
        });
    }
);

