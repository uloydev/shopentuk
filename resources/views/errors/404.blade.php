<style>
    @import url('https://fonts.googleapis.com/css?family=Merriweather');
body{
  margin:0;
  padding:0;
  display:flex;
  height:100vh;
  justify-content:start;
  align-items:center;
  overflow:hidden;
  flex-direction:column;
  background-image: linear-gradient(to right top, #0f1011, #031120, #00112e, #000e39, #120541);
  font-family: 'Merriweather', serif;
}

.supper-man img{
  width:150px;
  transform:rotate(45deg);
  position:absolute;
  top:55%;
  animation:animationSupperman 6s infinite linear;
}
.star{
  position:absolute;
  width:3px;
  height:3px;
  right:0;
  animation: animationStar 2s infinite linear;
  z-index:-1;
}
.title{
  color:#Fff;
  font-size:130px;
  margin-top:100px;
}
p{
  font-size:22px;
  color:#fff;
}
.button {
    text-decoration: none;
  padding:10px 30px;
  border:0px;
  background:#880000;
  color:#fff;
  font-size:18px;
  letter-spacing:2px;
  outline:none;
  cursor:pointer;
  border-radius:10px;
  transition:.3s all;
  font-family: 'Merriweather', serif;
}
button:hover{
  background:#660000;
}
button:active{
  transform:translate(-5px,5px);
}
@keyframes animationSupperman{
  0%{
    left:-150px;
    top:55%;
  }
  10%{
    top:53%;
  }
  20%{
    top:58%;
  }
  30%{
    top:53%;
  }
  40%{
    top:58%;
  }
  50%{
    top:53%;
  }
  60%{
    top:58%;
  }
  70%{
    top:53%;
  }
  80%{
    top:58%;
  }
  90%{
    top:53%;
  }
  100%{
    left:110%;
    top:55%;
  }
}
@keyframes animationStar{
    0%{
      box-shadow:0px 0px 5px #fff;
    }
    20%{
   box-shadow:0px 0px 35px  #fff;
    }
    40%{
   box-shadow:0px 0px 5px #fff;
    }
    60%{
   box-shadow:0px 0px 35px  #fff;
    }
    80%{
   box-shadow:0px 0px 5px #fff;
    }
    100%{
   box-shadow:0px 0px 35px  #fff;
    }
}
</style>

<div class="supper-man">
    <img src="http://pngimg.com/uploads/superman/superman_PNG9.png" alt="">
</div>
<div class="title">404!</div>
<P>The Page You're Looking For Was Not Found.</P>
<a class="button" href="{{ url()->previous() }}">Go back!</a>

<script>
    document.addEventListener("DOMContentLoaded",function(){
  var arrayColor = ["#FF6600","#FF0000","#880000","#FF9933","#FF3300","#FF3366"];
  var body = document.body;
  
  setInterval(createStar,50);
  
  function createStar(){
    var right = Math.floor(Math.random() * 500);
    var top = Math.floor(Math.random() * screen.height);
    var star = document.createElement("div");
    star.classList.add("star");
    body.appendChild(star);

    setInterval(runStar,10);
    star.style.top = top + "px";
    star.style.background = arrayColor[Math.floor(Math.random() * 6)];
    function runStar(){
      if(right >= screen.width)
        star.remove();
      right += 3;
      star.style.right = right + "px";
    }
    setTimeout(function(){
      star.remove();
    },10000)
  }
});
</script>