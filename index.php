<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>सःप्रबंधन</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8"/>
        <meta name="author" content="Ravi Bhushan"/>
        <meta name="keywords" content="Process Optimization, Development, NGO, NPO, Producer Company"/>
        <link rel="stylesheet" href="StyleSheets/cssIndex.css" type="text/css"/>
        <script>
            var footerTimeout;
            function toggleElementDisplay(elementID)
            {
                var temp = document.getElementById(elementID);
                temp.style.display='block';
                if(footerTimeout!==null)
                    clearTimeout(footerTimeout);
                footerTimeout=setTimeout(function(){temp.style.display="none";},5000);
            }
            function commonStyleProperties(node)
            {
                node.style.position="relative";
                node.style.margin="5px auto";
                node.style.boxShadow="0 8px 16px 0 rgba(228,108,10,0.2),0 16px 40px 0 rgba(228,108,10,0.19)";
                node.style.alignItems="center";
                node.style.display="none";
//                node.style.borderStyle="solid";
//                node.style.borderRadius="10px";
//                node.style.borderColor="#e46c0a";
            }
            function setElemColor(evt)
            {
                evt.target.style.backgroundColor="whitesmoke";
                evt.target.style.cursor="pointer";
                document.getElementById("ContactValue").style.backgroundColor="whitesmoke";
                fetchInfoIn(evt.target.id,"ContactValue");
            }
            function resetElemColor(evt)
            {
                evt.target.style.backgroundColor="inherit";
                document.getElementById("ContactValue").style.backgroundColor="inherit";
                document.getElementById("ContactValue").innerHTML="";
            }
            function fetchInfoIn(infoElement,targetElement)
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() 
                {
                    if (xmlhttp.readyState===4 && xmlhttp.status===200) 
                        document.getElementById(targetElement).innerHTML = xmlhttp.responseText;
                };
                xmlhttp.open("GET","Resources/Script/getInfo.php?infoID="+infoElement,true);
                xmlhttp.send();
            }
            function fetchInfo(infoElement)
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() 
                {
                    if (xmlhttp.readyState===4 && xmlhttp.status===200) 
                        document.getElementById(infoElement).innerHTML = xmlhttp.responseText;
                };
                xmlhttp.open("GET","Resources/Script/getInfo.php?infoID="+infoElement,true);
                xmlhttp.send();
            }

            function navigate(elementID)
            {
                var nodes = document.getElementById("DisplaySection"); //get the content display section
                if(document.getElementById(elementID)===null)
                {
                    var temp = document.getElementById("NavBar").getBoundingClientRect().bottom;
                    
                    nodes.style.top=(temp+10).toString()+"px";
                    
                    var node;
                    
                    switch(elementID)
                    {
                        case "HomeImage"://Homepage
                            node = document.createElement("img");
                            node.id=elementID;
                            node.src="ImageResources/BrandImage.png";
                            node.alt="Brand Image";
                            node.style.top=(
                                //get available space in screen height after subtracting end of previous element
                                (screen.height-
                                document.getElementById("NavBar").getBoundingClientRect().bottom)/7//divide space in 7 parts
                                ).toString()+"px";//start the top from end of 1st partition of height
                            node.style.width=(screen.width/2).toString()+"px";
                            commonStyleProperties(node); //set common styles
                            nodes.appendChild(node); //add node to DisplaySection
                            break;
                        case "IntroNote"://Introduction
                            node = document.createElement("div");
                            node.id=elementID;             
                            node.style.top="0px";
                            node.style.width=document.getElementById("NavBar").width+"px";
                            node.style.wordWrap="break-word";
                            node.style.padding="10px";
                            commonStyleProperties(node);
                            fetchInfo("IntroNote");
                            nodes.appendChild(node);
                            break;
                        case "TeamIntro"://The Team
                            node = document.createElement("div");
                            node.id=elementID;
                            node.style.top="0px"; //(document.getElementById("NavBar").getBoundingClientRect().bottom).toString()+"px";//start the top from end of 1st partition of height
                            node.style.margin="0px auto";
                            node.style.width=document.getElementById("NavBar").width+"px";
                            node.style.wordWrap="break-word";
                            node.style.padding="10px";
                            commonStyleProperties(node);
                            fetchInfo("TeamIntro");
                            nodes.appendChild(node);
                            break;
                    }
                }
                //Search child modes whether child element to be displayed exists.              
                for(var i=0;i<nodes.childElementCount;i++)
                    if(nodes.childNodes[i].nodeType===1)
                        if(nodes.childNodes[i].id !== elementID)
                            nodes.childNodes[i].style.display="none"; //If child is not the element then do not display it. 
                        else
                            nodes.childNodes[i].style.display="block";//If child is the element requested, then display it.
            }
        </script>
    </head>
    <body>
        <nav id="NavBar" class="cssNavigation cssBoxShadow" onload="">
            <ul class="cssNavigationUl">
                <li class="cssNavigationUlLi">
                    <img id="Home" class="cssNavigationUlLia" src="ImageResources/Home.png" alt="Home" onload="navigate('HomeImage');" onclick="navigate('HomeImage')"/>
                </li>
                <li class="cssNavigationUlLi">
                    <pre id="Intro" class="cssNavigationUlLia" onclick="navigate('IntroNote')">An Introduction</pre>
                </li>
                <li class="cssNavigationUlLi">
                    <pre class="cssNavigationUlLia" onclick="navigate('TeamIntro')">The Team</pre>
                </li>
                <li class="cssNavigationUlLiRt">
                    <pre id="Contact" class="cssNavigationUlLiaRt" onmouseover="toggleElementDisplay('CommChannels')">Communications</pre>
                </li>
            </ul>
        </nav>
        <section id="DisplaySection" style="position:relative;"></section>
        
        <footer id="CommChannels" class="cssFooter cssBoxShadow" onmouseover="toggleElementDisplay(this.id);">
            <pre id="Email" class="cssFooterPre">
                <script>fetchInfo("Email");</script>
            </pre>
            <img src="ImageResources/MailIcon.png" class="cssFooterImg"/>
            <pre id="SMS" class="cssFooterPre">
                <script>fetchInfo("SMS");</script>
            </pre>
            <img src="ImageResources/Text.png" class="cssFooterImg"/>
            <pre id="Call" class="cssFooterPre">
                <script>fetchInfo("Call");</script>
            </pre>
            <img src="ImageResources/Phone.png" class="cssFooterImg"/>
        </footer>
    </body>
</html>
