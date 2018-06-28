$('#modal1').modal();

$('.bottom_btn2').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens,

    }
  );
  $('.bottom_btn1').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens,

      }
    );

  function chat(){
  	var popUrl = "app/view/content/chat.php";
  	var popOption = "width=700, height=410, resizable=no, scrollbars=no, status=no menubar=no, toolbar = no, location = no;";
  		window.open(popUrl,"",popOption);
  	}



  출처: http://h5bak.tistory.com/130 [이준빈은 호박머리]
$(".comment p").click(function(){
    $("~ .comment_box",this.parentNode.parentNode).toggle();
})

$(".online").click(function(){
    console.log("dsad");

    Materialize.toast('I am a toast!', 4000);
})
