
// Start the main app logic.
requirejs(['handlebars'],
function   () {

    Handlebars.registerHelper('submitButton', function(text) {
      return new Handlebars.SafeString('<button  id="login" type="submit" class="btn btn-primary">' + text + '</button>');
    });

    Handlebars.registerHelper('plainButton', function(text) {
      return new Handlebars.SafeString('<button   type="submit" class="btn btn-primary">' + text + '</button>');
    });

    Handlebars.registerHelper('mailto', function(field) {
      var address = this.get(field);
      if (address) {
        return new Handlebars.SafeString('<a href="mailto: ' + address + '" />' + address + '</a>');
      }
    });


});

