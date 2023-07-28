<?= $this->extend('usuario_layout') ?>

<?= $this->section('usuarios_layout') ?>


<style>

  :root{
    --color1:	#4169E1;
  }



  .what .sec1{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: 3;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2E8B57,#40E0D0, #7FFFD4);
 
    clip-path: circle(20% at 90% 15%);
    
   
  }


 

  .what::after{
    content: '';
    position: relative;
    top: 0;
    z-index: 3;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3, #00FFFF);

   
    clip-path: circle(21% at 10% 85%);
    
  }




  

  .principalHome{
    margin-top: 30vh;
  align-content: center;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  font-family: 'Poppins';
}


.principalHome h1{
  position: fixed;
  color: black;
  font-size: 45px;
  z-index: 2;
  text-shadow: 1px 1px 2px #7DE5ED, 0 0 0em #5837D0, 0 0 0.2em #5837D0;
}

.principalHome h1:hover{
  cursor: default;
}


.principalHome h3{
  margin-top: 85px;
  position: fixed;
  cursor: default;
}

@keyframes rotate {
  0%{
    transform: rotate(0deg);
  }

  100%{
    transform: rotate(360deg);
  }
}

.config:hover .gear{
  animation: rotate 3s linear infinite;
}

/*
.usuario{
  position: relative;
}

.usuario h3{
  position: absolute;
  transform: translate(-50%,-50%);
  font-size: 3em;
  
}

.usuario:hover h3:nth-child(1){
  color: transparent;
  -webkit-text-stroke:1px var(--color1) ;
}




.usuario:hover h3:nth-child(2){
  color: var(--color1);
  animation: wave 3s ease-in-out infinite;
  transition: color 0.5s ease-in-out;
}


@keyframes wave{
  0%,100%
  {
    clip-path: polygon(0% 45%,15% 44%, 32% 50%,54% 60%, 70% 61%, 84% 59%, 100% 52%,100% 100%, 0% 100%);
  }

  50%
  {
    clip-path: polygon(0% 60%,16% 65%, 34% 66%,51% 62%, 67% 50%, 84% 45%, 100% 46%,100% 100%, 0% 100%);
  }
}
*/


@media(orientation: portrait){
  .what::after{
    content: '';
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3, #00FFFF);
    clip-path: circle(30% at 10% 85%);
    
  }


  .what::before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2E8B57,#40E0D0, #7FFFD4);
    clip-path: circle(25% at 90% 10%);
    
   
  }

  
}


</style>

<title>Inicio</title>

<!-- Content wrapper -->
<div class="content-wrapper what">


<div class="sec1"></div>
<div class="sec2"></div>

  <!-- Content -->

  <!--<div class="centro">

  </div>-->


  <section class="principalHome">
        
       <h1>Bem Vindo</h1>

  
       
       <h3> <?= $usuario?></h3>
 
</div>     
       



       
   </section>

</div>





<script>
  const home = document.getElementById("home");


  document.getElementById('infoMobile').style.display = "none";
  home.classList = "menu-item active open";




  
</script>
<?= $this->endSection() ?>