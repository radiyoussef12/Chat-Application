/* design : https://www.uplabs.com/posts/messaging-app-2db4a257-7f1d-4d1c-970d-4cf6527247ff by Anastasia Marinicheva */

function test(){
    var discussionsElement = document.getElementById('discussions');

    // Toggle visibility
    if (discussionsElement.style.display === 'block') {
       
        // document.getElementById('discussions').innerHTML='dddddddd';
    
        discussionsElement.style.display = 'none';

      document.getElementById('test1').style.display='block';
      

    } else {
        // document.getElementById('discussions').innerHTML='<div> <h5> ddd</h5></div> ';
        discussionsElement.style.display = 'block';
      document.getElementById('test1').style.display='none';

        
    }
    
}


function redirectToLink() {
  window.location.href = '../../login.php';
}