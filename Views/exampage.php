<?php
include "header.php";
?>



<div class="row" style="">

    <div class="col-lg-6 offset-lg-3" style="float:right;">
                <div id="current_que" style="float:left;"></div>
                <div style="float:left;">/</div>
                <div id="total_que" style="float:left;"></div>

    </div>
    <div class="row" style="margin-top:30px;">
            <div class="row">
                    <div class="col-lg-12" style="min-height:30px; background-color:white" id="load_questions" ></div>
            </div>
    </div>
    <div class="row" style="margin-top:10px">
            <div class="col-lg-6 offset-lg-3" style="min-height:50px;">
                <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                        <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                </div>
            
            </div>
    </div>
</div>
<script type="text/javascript">
        function load_total_que()
        {
            var xmlhttp=new XMLHttpRequest();
           
           xmlhttp.onreadystatechange=function(){
               if(xmlhttp.readyState==4 && xmlhttp.status==200)
               {
                 
                  document.getElementById("total_que").innerHTML=xmlhttp.responseText;
               }
           };
           xmlhttp.open("GET","../forajax/load_total_que.php",true);
           xmlhttp.send(null);

        }
        var questionno="1";
        load_questions(questionno);
        function load_questions(questionno)
        {
            document.getElementById("current_que").innerHTML=questionno;
            var xmlhttp=new XMLHttpRequest();
           
           xmlhttp.onreadystatechange=function(){
               if(xmlhttp.readyState==4 && xmlhttp.status==200)
               {
               
                   if(xmlhttp.responseText=="over")
                   {
                      
                       window.location="result.php";
                   }
                   else{
                    document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_que();
                   }
                 
                  
               }
           };
          
           xmlhttp.open("GET","../forajax/load_questions.php?questionno="+questionno,true);
           xmlhttp.send(null);
        }


        function radioclick(radiovalue,questionno){
            var xmlhttp=new XMLHttpRequest();
           
           xmlhttp.onreadystatechange=function(){
               if(xmlhttp.readyState==4 && xmlhttp.status==200)
               {
                 
                 
               }
           };
           xmlhttp.open("GET","../forajax/save_answer.php?questionno="+questionno+"&value1="+radiovalue,true);
           xmlhttp.send(null);
        }



        function load_previous()
        {
            if(questionno=="1")
            {
                load_questions(questionno);
            }
            else{
                questionno=eval(questionno)-1;
                load_questions(questionno);
            }
        }
        function load_next()
        {
            questionno=eval(questionno)+1;
                load_questions(questionno);
        }

</script>