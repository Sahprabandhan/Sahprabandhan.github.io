<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$fileName = filter_input(INPUT_GET, "infoID");

//chdir("..");
//chdir("Content");
//$filePath = getcwd();
chdir("../Content/");
readfile($fileName);
