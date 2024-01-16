
<?php
include_once "config.php";

session_start();

// Check if the unique_id is set in the session
if (isset($_SESSION['unique_id'])) {
    // Retrieve the unique_id value
    $unique_id = $_SESSION['unique_id'];

    // Now you can use $unique_id in your code
    // echo "Unique ID: $unique_id";

    $sqlState=$conn->prepare('SELECT * FROM  users WHERE unique_id=?');
		$sqlState->execute([$unique_id]);
		$result = $sqlState->get_result();
    $row = mysqli_fetch_array($result);
		// Check if email exists
		if ($result->num_rows > 0) {
		$name=$row['fname'];
		$last=$row['lname'];

		$email=$row['email'];
		$img=$row['img'];

		}
}



?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Material Messaging App Concept</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="container" style="width: 100%; background-image:url('R.jpeg'); height: 60%;">
    <div class="row">
      <nav class="menu" >
        <ul class="items">
          <!-- <li class="item">
            <i class="fa fa-home"   aria-hidden="true" > </i>
          </li> -->
 
          <li class="item" style="backgroundColor=' red" >
            <a class="fa fa-user" aria-hidden="true"onclick="test()"></a>
          </li>

          <!-- <li href="#" style="background-color:rgba(255, 255, 255, 0.2);" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
            class="fas fa-power-off me-2" ></i></li>
            <li> -->
            <li class="item">
                   <a href="logout.php?logout_id=<?php echo $row['unique_id']; ?>" ><ion-icon name="exit-outline"  ></ion-icon></a>   
                   </li>
         
        </ul>
      </nav>
      <style>
        #discussions {
            display: block;
            /* Additional styling for the hidden content if needed */

         
        }
        .row{
      
        }
        .menu {
      /* position: fixed;
      */
      /* background-color: #d8d8ea; */
      
    }
    .container{
      overflow: hidden;
    }
    #test1 {
      display: none;
      /* Additional styling for the hidden content if needed */
  }
   
  .circular-image {
                  width: 200px;
                  height: 200px;
                  border-radius: 50%;
                  overflow: hidden;
              }
      
              .circular-image img {
                  width: 100%;
                  height: auto;
                  display: block;
              }

              .img {
    margin-left:10px;
    display: block;
    width: 50px;
    height: 50px;
    background: #E6E7ED;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}
.active {
    /* background-color: #f0f0f0; Replace with your desired background color */
}
.discussion.search{
  position: fixed;
margin-left: 70px;

/* width: 920px; */


}
.searchbar{
  /* position: fixed; */
margin-left: -900px;

padding: 100px;
width: 20px;


}
.discussion:hover  {
  background-color: #e5eded; 
  cursor: pointer; /* Show a pointer cursor on hover to indicate interactivity */
}
.discussions {
    overflow: auto; /* Add this line to enable vertical scrolling */
   height: 650px;
        background-color: #d8d8ea;
 


  }     
  
  .im {
  display: block;
    width: 45px;
    height: 45px;
    background: #E6E7ED;
    -moz-border-radius: 40px;
    -webkit-border-radius: 50px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
   
    margin-left: 20px; 
    margin-right: -10px;
    
} 
.header-chat {
     
      text-align: center;
      position: fixed;
      width: 100%;
      box-sizing: border-box;
      display: flex;
      align-items: center;
     
    }
 .chat{
  overflow: auto;
  height: 600px;


 
   
 }
 .discussions {
  overflow-y: auto;
 /* margin-left:-50px; */
}
.chat::-webkit-scrollbar {
  width: 0;  /* Set the width to zero */
  background: transparent;  /* Make the background transparent */
}

/* For WebKit browsers (Chrome, Safari) */
.discussions::-webkit-scrollbar {
  width: 0;  /* Set the width to zero */
  background: transparent;  /* Make the background transparent */
}

 .youssef{
  margin-top:90px ;
  margin-left: -100px;
 }
 body{
  margin-right:-120px;
  overflow: hidden;
 }
 .footer-chat {
   position: fixed;
   /* bottom: 0; */
   width: 52%;
   background-color: #f1f1f1;
   padding: 5px;
   box-sizing: border-box;
   display: flex;
   align-items: center;
 
  
 }
 
    </style>



  
<section class="discussions" id="test1" style="margin-left: 70px;  ">
  <div class="container d-flex justify-content-center"style="width: 100%;">
    <div class="card p-3 py-4" style="width: 100%; background-image:url('R.jpeg');">
        <div class="text-center" style=""> 
		<img  src="../../<?php echo  $img?>" class="circular-image" >
            
         
          <h5 style="padding-right: 300px; margin-top: 40px;  color: #f6f6f6;"> your  name:</h5>
			<h4  style="padding-left: 120px; margin-bottom: 30px; color: #f6f6f6;"> <?php echo  $name.' '. $last ?></h4>
      <h5 style="padding-right: 300px; margin-top: 40px;  color: #f6f6f6;"> your  email:</h5>
			<h4  style="padding-left: 90px; margin-bottom: 30px; color: #f6f6f6;"><?php echo  $email ?></h4>
			
		
			   
        </div>
    </div>
</div>


</section>


  
  
      <section class="discussions" id="discussions"   >

        <!-- <div class="discussion search">
          <div class="searchbar">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="search" placeholder="Search..." id="search"></input>
          </div>
        </div> -->



        <!-- <div class="discussion message-active">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Megan Leib</p>
            <p class="message">9 pm at the bar if possible 😳</p>
          </div>
          <div class="timer">12 sec</div>
        </div> -->
       
        <!-- Add the search form with the search bar -->
<div class="discussion search" style="margin-left: 0px; margin-right: -90px;  "  >
    <div class="searchbar" style="width: 320px;">
        <i class="fa fa-search" aria-hidden="true" ></i>
        <input type="search" placeholder="Search..." style="width: 220px;" id="search">
    </div>
</div>
<!-- style=" margin-top:100px ;" -->
<div style="margin-top: 90px;margin-left: 0px;  ">
<?php 
$st = 'Online';
$id = $_SESSION['unique_id'];
$query = "SELECT * FROM users  WHERE  unique_id!='$id' ORDER BY  user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {  
    while ($row = mysqli_fetch_array($result)) {  
   
      
        if ($row['status'] == $st) {
            $class = 'online';
        } else {
            $class = ''; 
        }
?>
        <!-- <div class="discussion user-item"  > -->
          
        <div class="discussion user-item clickable"  id="dis" data-url="message.php?user_id=<?php echo $row['unique_id'];  ?>">
            <div >
                <img src="../../<?php echo $row['img']; ?>" class="img">
            </div>
            <div class="desc-contact">
                <p class="name"><?php echo $row['fname'] . '  ' . $row['lname']; ?></p>
                <p class="message"></p>
            </div>
            <div class="timer"><?php echo $row['status'] ; ?><div class="<?php echo $class; ?>"></div></div>
        </div>
      
<?php  
    }  
} else {
    echo "No results found.";
}
?>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    var clickableDivs = document.querySelectorAll('.clickable');

    clickableDivs.forEach(function(div) {
        div.addEventListener('click', function() {
            var url = div.getAttribute('data-url');
            
            // Remove the 'active' class from all clickableDivs
            clickableDivs.forEach(function(item) {
                item.classList.remove('active');
            });

            // Toggle the 'active' class on the clicked div
            div.classList.toggle('active');

            if (url) {
                window.location.href = url;
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search');

    searchInput.addEventListener('input', function () {
        var searchTerm = searchInput.value.trim().toLowerCase();
        var userItems = document.querySelectorAll('.user-item');

        userItems.forEach(function (item) {
            var userName = item.querySelector('.name').textContent.toLowerCase();
            var isVisible = userName.includes(searchTerm);

            item.style.display = isVisible ? '' : 'none';
        });
    });
});
</script>
<!-- 
        <div class="discussion">
          <div class="photo" style="background-image: url(http://thomasdaubenton.xyz/portfolio/images/photo.jpg);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Thomas Dbtn</p>
            <p class="message">See you tomorrow ! 🙂</p>
          </div>
          <div class="timer">2 hour</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1553514029-1318c9127859?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80);">
          </div>
          <div class="desc-contact">
            <p class="name">Elsie Amador</p>
            <p class="message">What the f**k is going on ?</p>
          </div>
          <div class="timer">1 day</div>
        </div> -->

    


        <script>
    
    document.addEventListener('DOMContentLoaded', function () {
      var messages = document.querySelectorAll('.discussion');

      messages.forEach(function (message) {
        message.addEventListener('click', function () {
        
          message.classList.add('message-active');
      
        });
        
      });
    });
    
  </script>

<style>
  .discussion.message-active {
    background-color: #e5eded; /* Set the background color for the active state */
  }

  /* ... Other existing styles ... */
</style>
        


      
        
      </section>
  

<?php

$id=$conn->prepare('SELECT  id FROM  id');
		$id->execute();
    $re = $id->get_result();
    $row1 = mysqli_fetch_array($re);

    $sqlState1=$conn->prepare('SELECT * FROM  users WHERE unique_id=?');
		$sqlState1->execute([$row1['id']]);
		$result1 = $sqlState1->get_result();
    $row2 = mysqli_fetch_array($result1);
		// Check if email exists
		if ($result1->num_rows > 0) {
		// $name=$row2['fname'];
		// $last=$row2['lname'];

		// $email=$row2['email'];
		// $img=$row2['img'];
		}
    if (isset($_POST['send'])) {
      if(!empty($_POST['mesg'])  ){
      $mesg=$_POST['mesg'];
      $how_id=$_SESSION['unique_id'];
      $to_id=$row1['id'];
      $send=$conn->prepare('INSERT INTO mesg (how_id,to_id,	mesg) VALUES (?,?,?)');
      $send->execute([$how_id,$to_id,$mesg]);
      $ms = $send->get_result();

      }
     
    }    



?>
 
     
<section class="chat">
       
       <div class="header-chat" style="    background: linear-gradient(#b6b6c1, #9c9ca6);" >
         
        <img class="im" src="../../<?php  echo $row2['img'];?>" alt="">
      
           <p class="name" style="padding-left: -210px;color:#FAFAFA;"> <?php  echo $row2['fname'].' '.$row2['lname'];?></p>
           <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
       </div>
         <div class="youssef">
         <div class="messages-chat">
           <div class="message">
 
             <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
               <!-- <div class="online"></div> -->
             </div>
             <!-- <p class="text"> Hi, how are you ? </p> -->
           </div>
           
 
 
 
 
 
 
 
 
 
 
 
 
           <?php 
           $id=$conn->prepare('SELECT  id FROM  id');
           $id->execute();
           $re = $id->get_result();
           $row1 = mysqli_fetch_array($re);
       
 $st = $row1['id'];
 $i = $_SESSION['unique_id'];
 $query = "SELECT * FROM mesg  WHERE  (how_id='$i'AND to_id=$st) or  (how_id='$st'AND to_id=$i ) ORDER BY  id";
 $result = mysqli_query($conn, $query);
 
 // $query1 = "SELECT * FROM mesg  WHERE  how_id='$st'AND to_id=$i    ORDER BY  id";
 // $result1 = mysqli_query($conn, $query1);
 
 
 
 
 for ($c = 0; (($row = mysqli_fetch_array($result))!==null ); $c++) { 
 if($row['how_id']==$i ){
   echo '<div class="message text-only">
   <div class="response">
     <p class="text"> '. ( $row['mesg'] ).'</p>
   </div>
  </div>';
 }
 else{
             echo ' <div class="message text-only">
        <p class="text"> '.$row['mesg'].'</p>
        </div> '; 
        
 
    
 }
 }
 
 
 
 
 
 
 
 ?>
 
 
 
 
      
          <!--  <div class="message text-only">
             <div class="response">
               <p class="text"> When can we meet ?</p>
             </div>
           </div>
           <p class="response-time time"> 15h04</p>
           <div class="message">
             <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
               <div class="online"></div>
             </div>
             <p class="text"> 9 pm at the bar if possible 😳</p>
           </div>
           <p class="time"> 15h09</p> -->
         </div>
         </div>
         <form action="" method="post">
           
         <!-- <div class="footer-chat">
           <i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i>
           <input type="text" class="write-message" placeholder="Type your message here" name="mesg"></input>
           <button class="icon send fa fa-paper-plane-o clickable" aria-hidden="true" name="send"></button>
         </div> -->
 
 
        
       
     
     <div class="footer-chat" style="">
       <i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i>
       <input type="text" class="write-message" placeholder="Type your message here" name="mesg">
       <button class="icon send fa fa-paper-plane-o clickable" aria-hidden="true" style=" margin-left: -390px;" name="send"></button>
     </div>
 
 
 
         </form>
       </section>
    </div>
    
  </div>
  
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
