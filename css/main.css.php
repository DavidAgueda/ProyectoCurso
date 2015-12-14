<?php
header('Content-Type: text/css');
?>

/* ==========================================================================
   Author's custom styles
   ========================================================================== */



/* ======================================================
My stylo
*/
body{
    padding-top: 0;
}
/*Modificar bootstrap*/

/*  Titulo*/
.jumbotron{
    padding: 2%;
    padding-left: 5%;
    padding-right: 5%;
}
.item{
    padding: 2%;
}

.carousel-indicators{
    /*    background-color: #ccc;*/
    bottom: 0!important;
    margin-bottom: 0;
}
.carousel-indicators li{
    border-color: #ccc;
}
.carousel-indicators .active{
    background-color: #ccc;
}
.ofertaMedia{
    box-shadow: 0px 0px 10px 5px #ccc;	 
    font-size: 1.2em;
}
.ofertaMedia h2{
    font-size: 2.2em;
}
.precios h3{
    font-size: 3em;
    background-color: rgba(153, 204, 255,0.4);
    padding: 0.5em;
}
.navbar .nav,
.navbar .nav > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
    *zoom:1; /* hasLayout ie7 trigger */
    vertical-align: top;
}
/* centrar menu */
.navbar .navbar-nav {
    display: inline-block;
    float: none;
}

.navbar .navbar-collapse {
    text-align: center;
}

.jumbotron {
    background-color: #36424a;
    margin-bottom: 0;
}
.nav {
    background-color: #36424a;
    padding: 2px;
    padding-bottom: 10px;
    /*        border: initial !important;*/
}
.navbar,.navbar-inverse{
    border-radius: initial;
    border:none;
    background-color: #36424a;
    background-image: initial;
    font-weight: bold;
}
nav li{
    box-shadow: 2px 2px 2px black;
    margin: 6px;
}

<!--body{
background-color: <?php echo '#f00';?>;
}-->

