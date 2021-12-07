var map = L.map('map').setView([-0.3998,36.97453],15);

var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar'}).addTo(map);
// L.Control.geocoder().addTo(map);
 	var scp = L.geoJson(scps,{style:
     function style(feature,layer)
      {
          return{
             fillColor:"red",
             colour:"yellow",
             opacity:"0.6"
                };
 }

 
      }).addTo(map);

      var cof = L.geoJson(coff,{style:
          function coffee(feature,layer)
          {
           return{
             fillColor:"orange",
             colour:"green",
             opacity:"10"
           };
          }
    }).addTo(map);
      var bdr = L.geoJson(bdry,{style:
         function boundary(feature,layer)
         {
           return{
             fillColor:"red",
             colour:"black",
             opacity:"70"
           };
         }
      }).addTo(map);
      //  var frsts = L.geoJson(frst,{style:
      //    function styles(feature,layer)
      //    {
      //      return{
      //        fillColor: "green",
      //        colour: "black",
      //        opacity: "0.2"
      //      };
      //    }
      // }).addTo(map);
      var blds = L.geoJson(bld,{style:
        function building(feature,layer)
          {
           return{
             fillColor: "black",
             colour: "black",
             opacity: "-79"
           };        }      }).addTo(map);
      var footpaths = L.geoJson(footpath,{style:
        function footpathes(feature,layer)
        {
        return{
          fillColor:"green",
         colour:"yellow",
         opacity:"60"
         };
        }
    }).addTo(map);
     var football = L.geoJson(ball,{style:
        function footballs(feature,layer)
        {
          return{
           fillColor:"red",
           colour:"black",
           opacity:"-50"
          };
       }
     }).addTo(map);
     var maizes = L.geoJson(maize,{style:
        function maizeplantation(feature,layer)
        {
          return{
            fillColor:"deepyellow",
            colour:"lightgreen",
            opscity:"70"
          };
        }
     }).addTo(map);
     var forests = L.geoJson(forest,{style:
         function forestcover(feature,layer)
         {
          return{
            fillColor:"darkgreen",
            colour:"green",
            opacity:"70"
          };
         }
     }).addTo(map);



    

  	var mar = L.marker([-0.3998,36.97453],{}).bindPopup('Dedan Kimathi University <br> Science park').addTo(map);
   

    map.on('locationfound', geoLocate);
    map.on('locationerror',returnLocation);
    map.locate({setView:true});

    function geoLocate(e){
      L.marker(e.latlng,{}).bindPopup("=========").addTo(map);
    }

    function returnLocation(){
      alert("Activate Location on your device/Location Denied");
    }
    var p1 = [-0.3998,36.97453];
    var p2 = [-1.7998,22.34567];
    var p3 = [3.4567,10.56783];
    var p4 = [-4.4675,6.759968];
    var p5 = [2.4786,8.546238];
    var p6 = [-1.6748,5.546599];

    var tour = [p1,p2,p3,p4,p5,p6];

    console.log(map.getCenter());

      function takeTOUR(){
            for(var i = 0; i<6; i++){
              // var zm = i+8;
              map.panTo(tour[i]);
              L.marker(tour[i]).addTo(map);
              // console.log(tour[i]);
              
            }
      }

