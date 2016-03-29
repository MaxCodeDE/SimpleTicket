import DS from 'ember-data';
var attr = DS.attr;

export default DS.Model.extend({

    autor: attr('string'),
    thema: attr('string'),
    beschreibung: attr('string')

    
    
    
});
