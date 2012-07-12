//Declaraciones iniciales: creado un constructor interno al prototype que permite ""Generar Clases"" (Generar: javascript no es orientado a objetos)
//Esto genera la estructura basica de clases dentro del motor javascript

(function(){
    var initializing = false, fnTest = /xyz/.test(function(){
        xyz;
    }) ? /\b_super\b/ : /.*/;

    // The base Class implementation (does nothing)
    this.Class = function(){};
 
    // Create a new Class that inherits from this class
    Class.extend = function(prop) {
        var _super = this.prototype;
   
        // Instantiate a base class (but only create the instance,
        // don't run the init constructor)
        initializing = true;
        var prototype = new this();
        initializing = false;
   
        // Copy the properties over onto the new prototype
        for (var name in prop) {
            // Check if we're overwriting an existing function
            prototype[name] = typeof prop[name] == "function" &&
            typeof _super[name] == "function" && fnTest.test(prop[name]) ?
            (function(name, fn){
                return function() {
                    var tmp = this._super;
           
                    // Add a new ._super() method that is the same method
                    // but on the super-class
                    this._super = _super[name];
           
                    // The method only need to be bound temporarily, so we
                    // remove it when we're done executing
                    var ret = fn.apply(this, arguments);       
                    this._super = tmp;
           
                    return ret;
                };
            })(name, prop[name]) :
            prop[name];
        }
   
        // The dummy class constructor
        function Class() {
            // All construction is actually done in the init method
            if ( !initializing && this.init )
                this.init.apply(this, arguments);
        }
   
        // Populate our constructed prototype object
        Class.prototype = prototype;
   
        // Enforce the constructor to be what we expect
        Class.prototype.constructor = Class;

        // And make this class extendable
        Class.extend = arguments.callee;
   
        return Class;
    };
})();


// Ahora viene mi clase real



var GoogleMapClass = Class.extend({
    
    /*
     * Metodo Constructor. Hace las veces del __construct de cualquier otro lenguaje
     * Configura los parametros basicos del mapa; como los estilos y opciones
     *
     */
    
    init: function(){
        this.estilos = [
        {
            featureType: "all",
            elementType: "labels",
            stylers: [
            {
                visibility: "off"
            }
            ]
        }
        ];
        this.opciones= {
            zoom: 12,
            disableDefaultUI: true,
            center: new google.maps.LatLng(10.24462, -67.59374199999999),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: this.estilos
        }
        this.markerSucursal = new Array();
        this.infoWindow = new Array();
    },
    
    /*
     * Este metodo levanta el mapa
     * Permite pintar el mapa en el elemento div establecido
     * @param divElemento elemento del DOM donde se va a dibujar el mapa
     * @usage variable.inicio(document.getElementById('mielemento'))
     */
    
    inicio: function(divElemento){
        this.objMapa = new google.maps.Map(divElemento,this.opciones);
        
    },
    
    /*
     * Metodo para precargar ubicaciones
     * Se utiliza para cargar ubicaciones al mismo tiempo que se carga el mapa.
     * @param jsonArray arreglo json con las coordenadas de las ubicaciones
     * @param verIW booleano muestra o no los infowindows
     *
     */
    
    precargarUbicaciones: function(jsonArray,verIW){
        var contenidoDialog
        var objMapa = this.objMapa
        for(var k in jsonArray) {
            var localizacion= new google.maps.LatLng(jsonArray[k].coordenada_x,jsonArray[k].coordenada_y);
            eval('var marker'+k+'= new google.maps.Marker({position: localizacion,map: objMapa})');
            if(verIW){
                if(jsonArray[k].principal==1){
                    contenidoDialog = "<div><p><strong>Esta es tu sede principal</strong></p></div>"+
                    "<div>Direccion: "+jsonArray[k].detalle_direccion+"</div>"+
                    "<div>Telefono de contacto: "+jsonArray[k].telefono+"</div>"
                }else{
                    contenidoDialog = "<div><p>Esta es una de tus sedes</p></div>"+
                    "<div>Direccion: "+jsonArray[k].detalle_direccion+"</div>"+
                    "<div>Telefono de contacto: "+jsonArray[k].telefono+"</div>"
                }
                eval('var infowindow'+k+' = new google.maps.InfoWindow({content: contenidoDialog })');
                eval('google.maps.event.addListener(marker'+k+', "click", function() {infowindow'+k+'.open(objMapa,marker'+k+')})')
            }
            
            
        }
    },
    
    mapActividad: function(){
        var objMapa = this.objMapa
        google.maps.event.addListener(objMapa, 'click', function(event){
            markerActivdad = new google.maps.Marker({
                position: event.latLng, 
                animation: google.maps.Animation.DROP,
                map: objMapa
            });    
            markerActivdad = 0;
        });
    }
});