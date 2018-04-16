<?php
 $pid= $_GET ['pid']; 
 
?>
<!--
Codding Standerd 
-->
<html>
    <head>
        <title>Local Storage cache: Save Offline </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            //localStorage.clear();
            <?php
            echo "var pid= '$pid';"; 

            ?>
                var i=1; 
                var j=0; 
                var saveTime = 30; //second'
              
                
                function POST_localData(data){// JS Object
                    var post_data= JSON.stringify(data);
                  $.ajax({
                            type: "POST",
                            url: "api.php",
                            // The key needs to match your method's input parameter (case-sensitive).
                            data:  post_data,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function(res_data){
                                console.log(res_data);
                                 var i = res_data.length;

                                while ( i-- ) {
                                    localStorage.removeItem(res_data[i]);
                                }
                            },
                            failure: function(errMsg) {
                                console.log(errMsg);
                            }
                        });  
                }
                
                
                $(document).bind('keydown', function(e) {
                        if(e.ctrlKey && (e.which == 83)) {
                          e.preventDefault();
                          var posted_data= allStorage();
                          POST_localData( posted_data);
                          return false;
                        }
                      });
                
                function saveLocal(i){
                    // Store
                                
                    var data= new Object();
                    data.pid= pid;
                    var key= "field_"+i ;
                    data.field_name= key;
                    data.text= document.getElementById(key).value;
                    data.time= new Date();
                    var JsonData= JSON.stringify(data);
                    
                     
                    var  m_sec = saveTime*1000;
                    localStorage.setItem( key+"_"+pid, JsonData ); 
                    setTimeout( function(){   
                                            var posted_data= allStorage();
                                            POST_localData( posted_data);
                    
                                        },
                                m_sec);
                }
        function allStorage() {

            var archive = {}, // Notice change here
                keys = Object.keys(localStorage),
                i = keys.length;

            while ( i-- ) {
                archive[ keys[i] ] =JSON.parse( localStorage.getItem( keys[i] ));
            }

            return archive;
        } 
            $(document).ready(function () {
              // Check browser support
            if (typeof(Storage) !== "undefined") {
                
            $("#SaveInServer").click(function () { 
                console.log(allStorage());
                var posted_data= allStorage();
                POST_localData( posted_data);
            });  
            
       
            // Store
            
                
                
                
                
                } else {
                    document.getElementById("history_list").innerHTML = "Sorry, your browser does not support Web Storage...";
                }

                 // Retrieve
                     
                $("#showButton").click(function () {
                         
                        if(i<=localStorage.length){
                        $("#history_list").append(localStorage.getItem("pid.field_name.text"+ i)+"<br>");
                                            
                        i++;
                    }
                });
            });
        </script>
    </head>
    <body>
        <table border="1" width="200" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Field 1</th>
                    <th>Field 2</th>
                    <th>Field 3</th>
                    <th>Field 4</th>
                    <th>Field 5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><textarea id="field_1" onkeyup="saveLocal(1)" width="300px" height="300px"></textarea></td>
         
                    <td><textarea id="field_2" onkeyup="saveLocal(2)" width="300px" height="300px"></textarea></td>
         
                    <td><textarea id="field_3" onkeyup="saveLocal(3)" width="300px" height="300px"></textarea></td>
         
                    <td><textarea id="field_4" onkeyup="saveLocal(4)" width="300px" height="300px"></textarea></td>
         
                    <td><textarea id="field_5" onkeyup="saveLocal(5)" width="300px" height="300px"></textarea></td>
         
                </tr>
                
            </tbody>
        </table>

         
         <p id="SaveButton">Save local</p><br />
         <button id="SaveInServer">Connect To Internet</button>
         <br>
         <br>
         <p id="showButton">Show Local</p>
         <div id="history_list"> History: <br />
         </div>
         
         
         
    </body>
</html>
