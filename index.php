<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=words;charset=utf8", "root", "");

$rows = $pdo->query("
  SELECT  * 
  FROM `construct`
  ");
$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

if( !isset($_SESSION['id']) ){
  $_SESSION['id'] = 1;
}


// else if($_SESSION['id'] < $total){
//    $_SESSION['id'] += 1; 
// }else{
//     $_SESSION['id'] = 1; 
// }

//print_r("სესიის id :".$_SESSION['id']. "<br>");

//ბაზიდან მმწკრივის გამოძახება სესიის აიდის მიხედვით
$row = $pdo->prepare("
  SELECT * 
  FROM `construct` 
  WHERE id=:id
  ");
$row->bindParam(":id", $_SESSION['id']);
$row->execute();
$myrow = $row->fetchAll(PDO::FETCH_ASSOC);


//ბაზაში მწკრივების ჯამი
  var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>sity</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
@font-face {
	font-family: 'Conv_bpg-arial-webfont';
	src: url('fonts/bpg-arial-webfont.eot');
	src: local('â˜º'), url('fonts/bpg-arial-webfont.woff') format('woff'), url('fonts/bpg-arial-webfont.ttf') format('truetype'), url('fonts/bpg-arial-webfont.svg') format('svg');
	font-weight: normal;
	font-style: normal;
}
body{
 background: linear-gradient(#FFBBBB, #B4F0F9);
 background-repeat: no-repeat;
 height: 100vh;
 font-family: 'Conv_bpg-arial-webfont';
}
.barbarizm{
 position: absolute;
 left: 50%;
 top: 10%;
 transform: translate(-50%, -50%);
 color: #8E00AF;
 font-size: 35px;
 font-weight: bold;

}
.asoebi span{
 width: 4vw;
 height: 4.5vw;
 display: inline-block;
 background: linear-gradient(#96D2E5, #FFBBBB);
 border: 1px solid #fff;
 border-radius: 4px;
 margin: 5px;
 font-size: 3vw;
 text-align: center;
 color: #fff;
 font-weight: bold;
 cursor: pointer;
 line-height: 4vw;
 text-shadow: 0 6px 8px #00000078;
}
.asoebi{
 position: absolute;
 transform: translate(-50%, -50%);
 bottom: 10%;
 left: 50%;
 display: flex;
}
.arabarbarizm{
 position: absolute;
 left: 50%;
 top: 43%;
 display: flex;
 transform: translate(-50%, -50%);
}
.arabarbarizm > span{
 display: inline-block;
 width: 7vw;
 height: 10vw;
 background: url(aoebissadgami.png);
 background-position: center;
 background-size: cover;
 position: relative;

}

.arabarbarizm > span:nth-child(odd){
 transform: translateY(-20%);
 /*background: red;*/
}
.arabarbarizm > span >span{
 position: absolute;
 left: 50%;
 transform: translate(-50%);
 top: -28%;
 color: #fff;
 font-size: 3vw;
}
.opaaa{
 opacity: 0;
 position: relative;
 cursor: context-menu  !important;
}
/*  .opaaa:before{
  	position: absolute;
  	left: 0px;
  	top: 0px;
  	width: 100%;
  	height: 100%;
  	background: red;
  	content: ''
  }
  */
  .incorect{
   position: absolute;
   left: 50%;
   top: 50%;
   transform: translate(-50%,-50%);
   width: 0%;
   z-index: 2;
   transition: 1s;
   animation-duration: 2s;
   /*animation-name: incorectl;*/
 }


 @keyframes incorectl{
  0%{
   width: 0%;
 }
 50%{
   width: 50%;
 }
 100%{
   width: 0%;
 }
}
</style>

<body>
	<img class="incorect" src="incorect.png">


 <div class="barbarizm">

 </div>


 <div class="arabarbarizm">

 </div>






 <div class="asoebi"></div>




 <script type="text/javascript">
  $.ajax({
    url:'functions.php',
    method:'POST',
    data:{
      be:'bb',
      bu:'bla'
    },
    complete:function(response){
      console.log(response)
    }
  })

  var barbarsityva="<?= $myrow[0]['barbarism'];?>";


  function barbarsityva1(){
   $('.barbarizm').text(barbarsityva);

 }


 barbarsityva1()


 var sityva ="<?= $myrow[0]['word'];?>";


 function sityissadgambi(){
  for (i = 0; i <sityva.length ; i++) {
   $('.arabarbarizm').append("<span> </span>")
 }
}

sityissadgambi();


         // სიტყვის მასივში ჩწრა
         var sityvaarr=[];
         for (i = 0; i < sityva.length; i++) {
          sityvaarr[sityvaarr.length]=sityva[i]
        }

        var anban='აბგდევზთიკლმნოპჟრსტუფქღყშჩცძწჭხჰ';


// რანდომ ასოების აღება ნბანიდან
var arasworiasoebi = [];

while(arasworiasoebi.length < 4){
  var randomnumber1 = Math.floor(Math.random()*anban.length) + 0;
  if(arasworiasoebi.indexOf(randomnumber1) > -1) continue;
  arasworiasoebi[arasworiasoebi.length] =anban[randomnumber1];
}

// document.write(arasworiasoebi)


// რანდომ რიცხვები სიტყვას + 4
var arr = []
while(arr.length < (sityva.length+4)){
  var randomnumber = Math.floor(Math.random()*(sityva.length+4)) + 0;
  if(arr.indexOf(randomnumber) > -1) continue;
  arr[arr.length] =randomnumber;
}

// ახალი მასივი სადაც არის სიტყვა და რანდომ ასოები
var axalisityva= arasworiasoebi.concat(sityvaarr);



  // ხლი სიტყვის და რნდომ მასივის რანდომ რიცხვების მიდვით დლაგება
  for (i = 0; i < axalisityva.length; i++) {

   $('.asoebi').append("<span  data-aso=["+ i+"]>"+axalisityva[arr[i]] + " </span>")
 }
		// 	for (i = 0; i < arasworiasoebi.length; i++) {

		//      $('.asoebi').append("<span  data-aso=["+ i+"]>"+arasworiasoebi[arr[i]] + " </span>")
		// }



		 // arasworiasoebi.concat(arr);




     document.write(arr);
     document.write('სიტყვები');
     document.write("<br>"+axalisityva);



     var aoebismtvleli=0;
     var storipasuxi='';

     $('.asoebi span').each(function(){
      $(this).click(function(){
      	 // console.log('aoebismtvleli')
      	   // console.log(sityva[0].length)
      	   // console.log($(this).text().trim().length)
      	   var asooo=$(this).text()
      	   if($(this).text().trim() == sityva[aoebismtvleli] && !($(this).hasClass('opaaa')) ){
      	   	storipasuxi+=$(this).text();
           $(this).addClass('opaaa')
      	   	     // document.getElementsByID
                $('.arabarbarizm span:nth-child('+(aoebismtvleli+1)+')').append("<span> "+ $(this).text().trim()+" </span>")
                 // console.log('true');
                 aoebismtvleli++;


                 if(aoebismtvleli==sityva.length){
                  $(function(){
                    $.ajax({
                      type: "POST",
                      url: 'functions.php',
                      dataType: "json",
                      data: ({
                        id: "<?=$_SESSION['id']?>",
                        total: "<?=$total?>"
                      }),
                      success: function(data) {
                        //კოდი
                      }
                    });
                  });
                  setTimeout(function(){
                    // var  bb='hifombarbar'
                    alert(barbarsityva)
                    location.reload();

                  },1000)


                }

              }
              else if($(this).hasClass('opaaa')){

              }
              else{
                $('.incorect').css('animation-name','incorectl');

                setTimeout(function(){
                  $('.incorect').css('animation-name','unset');
                }, 1000)

              }

            })
    })
  </script>



</body>
</html>