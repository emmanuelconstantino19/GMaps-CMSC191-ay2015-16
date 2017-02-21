<!DOCTYPE html>
<html>
    <head>
        <script src="http://maps.googleapis.com/maps/api/API_KEY"></script>
        <script>
        var place = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                place = (xhttp.responseText).split('_');           
            }            
        };
        xhttp.open("GET", "connect.php", true);
        xhttp.send(); 
                
        var myCenter;
        var myCoord=[];
        var dest=[];
        var mapProp;
        
        function initialize(){
           
            place.forEach(function(p){
               var temp = p.replace("array", "").split('-');
               if(temp[0] == "SM City Calamba"){
                   myCenter = new google.maps.LatLng(parseFloat(temp[1]), parseFloat(temp[2]));
                   mapProp = {
                      center:myCenter,
                      zoom:30,
                      mapTypeId:google.maps.MapTypeId.ROADMAP
                   };
               }
               dest.push(temp);
            });

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
              position:myCenter,
            });    

            marker.setMap(map);
            
            for(var i = 0; i < dest.length; i++){
                myCoord[i] = new google.maps.LatLng(parseFloat(dest[i][1]), parseFloat(dest[i][2]));
                var mark = new google.maps.Marker({
                    position:myCoord[i],
                });
                
                mark.setMap(map);
            }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
    <div id="googleMap" style="width:500px;height:380px;"></div>
    </body>
</html>

