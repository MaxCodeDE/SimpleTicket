import Ember from 'ember';

export default Ember.Controller.extend({
    
    thema: null,
    autor: null,
    beschreibung: null,
    
    
    
    actions: {
        
        createTicket: function() {   
            
            var thema = this.get('thema');
            var autor = this.get('autor');            
            var beschreibung = this.get('beschreibung');
            
            var store = this.get('store');
            var ticket = store.createRecord('ticket', {
                autor: autor,
                thema: thema,
                beschreibung: beschreibung
            });
            
            Ember.$.ajax({
                type: "POST",
                // Sollte noch Optimiert werden :D
                url: "/Backend/createTicket.php",
				// Daten in HTTP Body mitsenden
				data: {
					autor: autor,
					thema: thema,
					beschreibung: beschreibung
				},
                success: function(data){
                    console.log("Kein Fehler" + data);
                },
                failure: function(errMsg) {
                    console.log("Fehler: " + errMsg);
                }
            });
			
			
			swal("Ticket erstellt!", "Ticket erfolgreich erstellt!", "success");
            
        }
        
    }
    
    
});
