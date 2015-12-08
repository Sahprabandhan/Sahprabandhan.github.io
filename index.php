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
                while(nodes.firstElementChild) //remove all currently displayed elements from the section
                    nodes.removeChild(nodes.firstElementChild);
                var temp = document.getElementById("NavBar").getBoundingClientRect().bottom+10;
                nodes.style.top=temp.toString()+"px";
                var node;
                switch(elementID)
                {
                    case "HomeImage": //to add homepage image
                        node = document.createElement("img");
                        node.id=elementID;
                        node.src="ImageResources/BrandImage.png";
                        node.alt="Brand Image";
                        node.style.position="relative";
                        node.style.top=(
                                //get available space in screen height after subtracting end of previous element
                                (screen.height-
                                document.getElementById("NavBar").getBoundingClientRect().bottom)/7//divide space in 7 parts
                                ).toString()+"px";//start the top from end of 1st partition of height
                        node.style.margin="5px auto";
                        node.style.width=(screen.width/2).toString()+"px";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        nodes.appendChild(node);
                        break;
                    case "IntroNote":
                        node = document.createElement("div");
                        node.id=elementID;
                        node.style.display="block";
                        node.style.position="relative";
                        node.style.top="0px";// (document.getElementById("NavBar").getBoundingClientRect().bottom+15).toString()+"px";//start the top from end of 1st partition of height
                        node.style.margin="5px auto";
                        node.style.width=document.getElementById("NavBar").width+"px";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.style.wordWrap="break-word";
                        node.style.padding="10px";
                        fetchInfo(elementID);
                        nodes.appendChild(node);
                        //node.innerHTML=
                        break;
                    case "TeamIntro":
                        node = document.createElement("div");
                        node.id=elementID;
                        node.style.display="block";
                        node.style.position="relative";
                        node.style.top="0px"; //(document.getElementById("NavBar").getBoundingClientRect().bottom).toString()+"px";//start the top from end of 1st partition of height
                        node.style.margin="0px auto";
                        node.style.width=document.getElementById("NavBar").width+"px";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.style.wordWrap="break-word";
                        node.style.padding="10px";
                        fetchInfo(elementID);
                        nodes.appendChild(node);
                        //node.innerHTML=
                        break;    
                    case "Contact":
                        node = document.createElement("img");
                        node.id="SMS";
                        node.src="ImageResources/Text.png";
                        node.alt="Email";
                        node.style.position="relative";
                        node.style.top="0px";
                        node.style.margin="5px auto";
                        node.style.padding="5px";
                        node.style.height="auto";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.addEventListener("mouseover",setElemColor,false);
                        node.addEventListener("mouseout",resetElemColor,false);

                        nodes.appendChild(node);
                        node = document.createElement("img");
                        node.id="Call";
                        node.src="ImageResources/Phone.png";
                        node.alt="Email";
                        node.style.position="relative";
                        node.style.top="0px";
                        node.style.margin="5px auto";
                        node.style.padding="5px";
                        node.style.width="auto";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.addEventListener("mouseover",setElemColor,false);
                        node.addEventListener("mouseout",resetElemColor,false);
                        nodes.appendChild(node);
                        node = document.createElement("img");
                        node.id="Email";
                        node.src="ImageResources/MailIcon.png";
                        node.alt="EMail";
                        node.style.position="relative";
                        node.style.top="0px";
                        node.style.margin="5px auto";
                        node.style.padding="5px";
                        node.style.height="auto";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.style.innerHTML="abc";
                        nodes.appendChild(node);
                        node.addEventListener("mouseover",setElemColor,false);
                        node.addEventListener("mouseout",resetElemColor,false);

                        node = document.createElement("pre");
                        node.id="ContactValue";
                        node.style.position="relative";
                        node.style.top="10px";
                        node.style.margin="5px auto";
                        node.style.padding="5px";
                        node.style.width="500px";
                        node.style.minHeight="0px";
                        node.style.height="auto";
                        node.style.boxShadow="0 4px 8px 0 rgba(0,0,0,0.2),0 8px 20px 0 rgba(0,0,0,0.19)";
                        node.style.alignItems="center";
                        node.style.display="block";
                        node.style.borderStyle="solid";
                        node.style.borderRadius="10px";
                        node.style.borderColor="#e46c0a";
                        node.style.wordWrap="break-word";
                        nodes.appendChild(node);
                        break;
                }
                //nodes.appendChild(node);
            }
        </script>
    </head>
    <body>
        <nav id="NavBar" class="cssNavigation cssBoxShadow" onload="">
            <ul class="cssNavigationUl">
                <li class="cssNavigationUlLi">
                    <img id="Home" class="cssNavigationUlLia" src="ImageResources/Home.png" alt="Home" onload="navigate('HomeImage')" onclick="navigate('HomeImage')"/>
                </li>
                <li class="cssNavigationUlLi">
                    <pre id="Intro" class="cssNavigationUlLia" onclick="navigate('IntroNote')">An Introduction</pre>
                </li>
                <li class="cssNavigationUlLi">
                    <pre class="cssNavigationUlLia" onclick="navigate('TeamIntro')">The Team</pre>
                </li>
                <li class="cssNavigationUlLiRt">
                    <pre id="Contact" class="cssNavigationUlLiaRt" onclick="navigate('Contact')">Communications</pre>
                </li>
            </ul>
        </nav>
        <section id="DisplaySection" style="position:relative"></section> 
    </body>
</html>
