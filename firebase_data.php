<?php

$data = array("name"=> "john", "age"=> "20");
$json_data = json_encode($data);

?>
<script src="https://www.gstatic.com/firebasejs/5.3.0/firebase.js"></script>

<script>
    // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDNTSoKs9s09Rk8a6KGwNzev_m-dcuZ6Nk",
    authDomain: "newproject-ea30a.firebaseapp.com",
    databaseURL: "https://newproject-ea30a.firebaseio.com",
    projectId: "newproject-ea30a",
    storageBucket: "",
    messagingSenderId: "312734823479"
  };
  firebase.initializeApp(config);
  
</script>

<script>

  
//function send_data()
//{
//   var param = {lastName: "Doe", firstName: "John"};
//
//   $.ajax({
//     url: 'https://newproject-ea30a.firebaseio.com/',
//     type: "POST",
//     data: JSON.stringify(param),
//     success: function () {
//       alert("success");
//     },
//     error: function(error) {
//       alert("error: "+error);
//     }
//   }); 
//}

function showHint() {
    var param = {lastName: "Doe", firstName: "John"};
//
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("POST", "url: 'https://newproject-ea30a.firebaseio.com/",true );
        xmlhttp.send(<?php echo $json_data; ?>);
    
}



   

 </script>
 
 <input type="button" value="Send data" onclick="showHint()"/>