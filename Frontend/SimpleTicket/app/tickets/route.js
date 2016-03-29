import Ember from 'ember';

export default Ember.Route.extend( {
    

    
    model: function() {
        return this.setupItems();  
    },
    
    
    
    setupItems: function() {
        var result;
            var url = '/Backend/getTickets.php';
            var that = this;
            result = Ember.$.getJSON(url).then(function(json) {
                
                var tickets = [];
                
                json.forEach( function (ticket) {
                    var store = that.get('store');
                    var storeItem = store.createRecord('ticket', {
                        autor: ticket['autor'],
                        thema: ticket['thema'],
                        beschreibung: ticket['beschreibung']
                    });
                    tickets.push(storeItem);
                });
                
                
                return tickets;
            });
        return result;
  }
    
    
});
