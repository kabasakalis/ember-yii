               //Store.RESTAdapter Oprations.Examples.For More Info see ember-data.js

               //FIND ALL
                  contacts=App.store.findAll(App.Contact);

                //FIND  ONE
                 contact=App.store.find(App.Contact,id);

                //QUERY
                me = App.store.find(App.Contact, { last_name: 'MyLastName' });
                someJohn=App.Contact.find({ 'notes':'mynote','first_name':'John'});

                //FINDMANY
                 manypeople=App.store.findMany(App.Contact,[ID1,ID2,ID3]);

                //FILTER LOCAL STORE
               someJohns=App.store.filter(App.Contact,function(rec){return (rec.get('first_name')=='John')?true:false});

               //CHANGE AND UPDATE
                var   someone=App.Contact.find(ID);
                someone.set('last_name','Doe');
                App.store.get('adapter').updateRecord(App.store,App.Contact, someone);

                //CREATE
               var johndoe = App.store.createRecord(App.Contact,  {
                 first_name: "John",
                 last_name: "Doe",
                 email:'doe@whatever.com',
                 notes:'Rockstar'
                 });
                 App.store.commit();

                //DELETE
                 person=App.Contact.find(ID)
                 person.deleteRecord();
                App.store.commit();

                //MASS DELETE
                personOne=App.Contact.find(ID1);
               personTwo=App.Contact.find(ID2);
                App.store.get('adapter').deleteRecords(App.store,App.Contact,[ personOne, personTwo]);
