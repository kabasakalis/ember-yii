# Ember with Yii  REST backend,demo application.
## A one page web application built with Ember.js and Ember-Data.Uses the default  REST Adapter of ember-data as a Persistence Layer and a Yii REST API  as a backend.
 Copyright 2012 Spiros Kabasakalis
 Licensed under the Apache License v2.0  
 http://www.apache.org/licenses/LICENSE-2.0  
 Author   [Spiros Kabasakalis](http://www.reverbnation.com/spiroskabasakalis).See credits below.
 
## Notice
This demo app uses  old ember.js(1.0 pre) and ember-data(CURRENT_API_REVISION: 5) versions.I currently have no plans to update it with latest versions.
Also,this demo uses  AMD with require js but I have not optimized (minified-combined) the scripts.Instructions on  how to do so can be found at [require.js](http://requirejs.org/).

## Demo.
 [See Live Demo]( http://ember-yii.sk.hj.cx/site/app)

## Overview.
 This is a very simple Contacts application.You can list,view,edit,create and delete contacts.
 I have based my demo application on [Dan Gebhardt's demo application](https://github.com/dgeb/ember_data_example)  for Rails.
 I have added a login screen, [AMD](http://requirejs.org/docs/whyamd.html#amd) with  [require.js](http://requirejs.org/),
 and connected to a Yii  backend REST API  written by Antonio Ramirez (slightly modified) for his
  [YiiBackBoneBoilerplate application](https://github.com/clevertech/YiiBackboneBoilerplate).
 The process of putting all this together helped me understand and appreciate [Ember.js](http://emberjs.com/)  as  a very useful tool for building
 heavy client side web applications.All the logic is laid out in javascript,with [Ember.js](http://emberjs.com/)
 framework wiring it all up.The persistence layer is provided by  [ember-data.js](https://github.com/emberjs/data) which provides a default
REST adapter out of the box.Of course it's possible to override the defaults and code the persistence layer of your choice.
With ember.js you can utilize [separation of concerns (SoC)](http://en.wikipedia.org/wiki/Separation_of_concerns) in your project,
divide the logic into models,views,controllers, use  a folder structure that reflects [MVC](http://en.wikipedia.org/wiki/Model-view-controller)
and therefore acquire  huge benefit in terms of scaling and maintaining your application  in an organized structure.

## Setting It Up.

Clone the git repo - `git clone git://github.com/drumaddict/ember-yii.git` - or [download it](https://github.com/drumaddict/ember-yii/zipball/master)
To install,follow these steps.
- Hook up your Yii framework path in index.php.(Tested with version 1.1.12.)
- In config/main  and config/console.php fill in your database info.
- Run the migration in migrations folder.(In console,navigate to protected folder and type yiic migrate and respond to dialog).Or just use the sql dump in data folder.
- You may need to change the store.adapter.namespace property on app/application.js,the logout url in  app/routes/app_router.js,
   and  login url in  app/controllers/login_controller.js (sendCredentials function),according to your application root folder  path.
- Use one of the two .htaccess files found in root folder.
- Navigate to   /site/app.The actionApp action in SiteController  will render the site/contacts_app.php  view without a layout.
 From there require.js will load the app/main.js file which functions as a bootstrap file for the contacts application.

## Best Ember.js Tutorial.

[Advice on & Instruction in the Use Of Ember.js](http://trek.github.com/).
This is an extended ember tutorial that I suggest in order to understand ember thoroughly.
It also  mentions backbone and how it  compares with ember,very useful if you are still overwhelmed
and stuck with the choice of a js framework.

## Personal View on js framework choice.

 I have not investigated every possible js framework out there.I did look into backbone though.
 I liked the simplicity and good documentation,but it lacks a well defined  structure.Ofcourse it is possible
 to overcome this with additional backbone libraries /dependencies like [Backbone Marionette](https://github.com/marionettejs/backbone.marionette),
 but to me this is not an attractive idea,as you have to keep all these additions in  sync with backbone,as the codebases evolve.
 Also I am not too keen on having to think about event binding cleanup,and this is something  to consider when coding with backbone.
 Ember on the other hand,features  a clear MVC separation of concerns.Binding data to views is automatic,just declare controllers and their associate views,
 and every time data changes,views update automatically without explicitly writing any code.I have a background in
 [Flex Actionscript Framework](http://incubator.apache.org/flex/) and coding js with ember sometimes felt  a lot like flex.
 For your research on js frameworks ,I suggest [TODO MVC.Helping You Select an MV* Framework.](http://addyosmani.github.com/todomvc/).

## RESOURCES.

- [Ember.js](http://emberjs.com/)
- [Ember-Data.js](https://github.com/emberjs/data)
- [Yii]( http://www.yiiframework.com/)
- [Require.js](http://requirejs.org/)
- [Dan Gebhardt's Contacts Demo Application for Rails](https://github.com/dgeb/ember_data_example)
- [YiiBackboneBoilerplate by Antonio Ramirez ](https://github.com/clevertech/YiiBackboneBoilerplate)
- [TODO MVC.Helping You Select an MV* Framework.](http://addyosmani.github.com/todomvc/)

