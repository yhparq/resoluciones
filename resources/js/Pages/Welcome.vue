<script>

// import { link } from 'vue';

</script>

<template>

    <div class="container-main">
        <div class="text-container">
            <h1 class="text-4xl text-white righteous-regular">Universidad Nacional del Altiplano</h1>
            <h1 class="text-9xl font-yellow-1 righteous-regular py-3">Vicerretorado <br> Academico</h1>
            <h1 class="text-4xl text-white righteous-regular pt-10">Resoluciones Rectorales...</h1>
        </div>
        <div class="img-container">
            <div><img src="/assets/imgs/img.png" alt=""></div>
            <div><a href="">Continuar</a></div>
        </div>
    </div>


</template>

<style>

@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');

*{
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
}

.font-yellow-1{
    color: #BA8D32;
}
.container-main{
    height: 100vh;
    width: 100%;
    display: flex;
}

.righteous-regular {
  font-family: "Righteous", sans-serif;
  font-weight: 400;
  font-style: normal;
}


.text-container{
    width: 65%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding: 0 0 0 8rem;
    background-color: #2D4253;
}

.img-container{
    width: 35%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.img-container img{
    clip-path: ellipse(50% 40%);
}


.img-container a{
    border: 1px solid black;
    padding: 1rem 3rem;
    border-radius: 3rem;
    background: #2D4253;
    color: white;
    font-weight: bold;
}

</style>
