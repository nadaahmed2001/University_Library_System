<!DOCTYPE html>
<html>
<head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 25px/1.8 "OilBats", sans-serif;
  color: #777;
}
@font-face{
    font-family: "Brush StrokeFast";
  src: url("./fonts/Brush StrokeFast.otf");
  }

@font-face{
    font-family: "OilBats";
  src: url("./fonts/OilBats.ttf");
  }

@font-face{
    font-family: "POLYA Regular";
  src: url("./fonts/POLYA Regular.otf");
  }

@font-face{
    font-family: "Urban Jungle";
  src: url("./fonts/Urban Jungle.otf");
  }

.big{
  margin-top: 50px;
  font-family:  POLYA Regular;
  font-size:  130px;
  color:  red;
}

.bgimg-1 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("./img/2.jpg");
  height: 100%;
}


.skills{
  left: 100px;
}



.caption0 {
  position: absolute;
  left: 0;
  top: 10px;
  width: 100%;
  text-align: center;
  color: #000;
}


.caption0 span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 50px "Brush StrokeFast", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}


</style>
</head>
<body>


<div class="bgimg-1">
  <div class="caption0">
  <h1 class="big"> University Library System</h1>
  
 
  </div>
</div>



</body>
</html>