//گرفتن موزیک پس زمینه
var mus= document.getElementById('bmusic');
//گرفتن صفحه اصلی مختصات
let box=document.getElementsByClassName('B')[0];
//آرایه برای بررسی رادیوباتن ها
var ch=["" , "" , ""];
// برای حلقه
let n=64;
//آرایه برای ذخیره اهداف
let targets=["img/1.jpg","img/2.jpg" ,"img/3.jpg" ,"img/4.jpg" ,"img/5.jpg" ,"img/6.jpg" ,"img/7.jpg" ,
"img/8.jpg" ,"img/9.jpg" ,"img/10.jpg" ,"img/11.jpg" ,"img/12.jpg" ,"img/13.jpg" ,"img/14.jpg" ,"img/15.jpg" , 
"img/16.jpg" ,"img/17.jpg" ,"img/18.jpg" ,"img/19.jpg" ,"img/20.jpg" ,"img/21.jpg","img/22.jpg","img/23.jpg","img/24.jpg"];
//صدای بمب 
var snd=new Audio("music/big_explosion_sfx_2 (mp3cut.net).mp3");
//توضیحاتی به کاربر
alert("سلام به بازی فاتحان خیبر خوش آمدید\n اگر قبلا وارد بازی ما نشده اید لطفا ابتدا به صفحه اصلی برگشته و راهنما را با دقت مطالعه کنید و سپس وارد بازی شوید");
//صفر کردن بخش امتیاز
setTimeout(point,5000);
function point(){
    document.getElementById('point_a').innerHTML=0;
};

// قطع موزیک پس زمینه توسط کاربر
document.getElementsByClassName("b_music")[0].addEventListener("click" , function(){
    mus.pause();
 });

     //ساخت خانه های جدول مختصات
    for(let i=64; i>0; i--){
        //تنظیم ایدی و کلاس
        let elem=document.createElement("div");
        elem.setAttribute("id" , "div"+n);
        elem.setAttribute("data-number" ,n );
        elem.setAttribute("class" , "math");
        box.appendChild(elem);
        n--;
    }

    // انتخاب رندوم 24 خانه
    var arr=[];
    while(arr.length<24){
        var r=Math.floor(Math.random() * 64) +1;
        if(arr.indexOf(r)===-1)arr.push(r);
    }

    //ریختن خانه های رندوم در متغیر
    let d1=arr[0];      let d7=arr[6];      let d13=arr[12];       let d19=arr[18];
    let d2=arr[1];      let d8=arr[7];      let d14=arr[13];       let d20=arr[19];
    let d3=arr[2];      let d9=arr[8];      let d15=arr[14];       let d21=arr[20];
    let d4=arr[3];      let d10=arr[9];     let d16=arr[15];       let d22=arr[21];
    let d5=arr[4];      let d11=arr[10];    let d17=arr[16];       let d23=arr[22];
    let d6=arr[5];      let d12=arr[11];    let d18=arr[17];       let d24=arr[23];

    //قرار دادن اهداف در خانه های انتخاب شده 
    let cc=0;
    arr.forEach(element => {
    let img=document.createElement("img");
    img.setAttribute("class" , "target");
    img.setAttribute("id" , "img"+element);
    img.setAttribute("src" , targets[cc]);
    img.style.display="none";
    document.getElementById('div'+element).appendChild(img);
    cc++;
    });
    
//اجرای بازی هنگام کلیک دکمه شلیک
let btn=document.getElementById('fire');
let x=document.getElementById('X');
let y=document.getElementById('Y');
let check=document.getElementsByName('check');
///استارت بازی
btn.addEventListener("click" , fire);

function fire(){

    function win(){
        alert("تبریک!!!!! هدف با موفقیت منهدم شد ");
        document.getElementById('img'+coor).removeAttribute("style");
        var point=Number(document.getElementById('point_a').innerHTML)+1;
        document.getElementById('point_a').innerHTML=point;
        snd.pause();
        mus.play();
        if(Number(document.getElementById('point_a').innerHTML)==24){
            alert("تبریک میگم شما برنده شدید!!!");
            setTimeout(redirect , 5000);
            function redirect(){
            window.location="index.html";
            }
        }
    }

    function lose(){
        document.getElementById('div'+coor).style.backgroundColor="gray";
        alert("نگران نباش !!! یبار دیگه شانست رو امتحان کن");
        snd.pause();
        mus.play();
    }

    //اعتبار سنجی اعداد وارد شده و چک باکس
    if(y.value=="" || x.value==""){
        alert("لطفا مختصات را وارد کنید");
    }
    else{
        
           //گرفتن مقدار رادیو باتن مورد نظر از طریق بررسی انتخاب شدن یا نشدن
           for(var i=0; i<3; i++){
            
              ch[i] =check[i].checked;
           }
            //چک مقدار مختصات وارد شده
           if(y.value>8 || x.value>8){alert("مقدار وارد شده نمیتواند بیشتر از 8 باشد")}
           
           else{
          
             //حرکت سلاح ها در عرض بیشتر از 890
           if(screen.availWidth>=890){

            var coor=((Number(y.value-1))*8)+Number(x.value);

            //حرکت جنگنده
           var q=0;
           var v=0;
           if(ch[0]==true){
               let jet=document.getElementById('Jet');
               let move=setInterval(move_jet , 100);
               function move_jet(){
                mus.pause();
                snd.play();
                   jet.style.marginTop=q+"px";
                   jet.style.marginRight=v+"px";
                   v+=10;
                  q=q+5;
                  if(q==440 || v==440){
                    clearInterval(move);
                     if(arr.includes(coor)==true){
                         win();
                         jet.style.marginTop="0px";
                         jet.style.marginRight="0px";
                     }
                     else{
                         lose();
                         jet.style.marginTop="0px";
                         jet.style.marginRight="0px"; 
                     }      
                }
               }
           }
           //حرکت تانک 
           var c=0;
           if(ch[1]==true){
            let tank=document.getElementById('Tank');
            let move=setInterval(move_tank , 100);
            function move_tank(){
                mus.pause();
                snd.play();
                tank.style.marginRight=c+"px";
                c+=10;
               if(c==600){
                 clearInterval(move);
                 if(arr.includes(coor)==true){
                    win();
                    tank.style.marginRight="0px";
                }
                else{
                    lose();
                    tank.style.marginRight="0px";

                } 
           }
        }
    }

    //حرکت موشک 
           var a=0;
           var b=0;
           if(ch[2]==true){
            let rocket=document.getElementById('Rocket');
            let move=setInterval(move_roc , 100);
            function move_roc(){
                mus.pause();
                snd.play();
                rocket.style.marginTop=a+"px";
                rocket.style.marginRight=b+"px";
                a-=20;
                b+=30;
                if(a==200 || b==840){
                 clearInterval(move);
                 if(arr.includes(coor)==true){
                    win();
                    rocket.style.marginTop="0px";
                    rocket.style.marginRight="0px";
                }
                else{
                    lose();
                    rocket.style.marginTop="0px";
                    rocket.style.marginRight="0px";
                } 
             }
            }
        }
    }

     // حرکت سلاح ها در عرض کمتر از 890
    if(screen.availWidth<890){
        var coor=((Number(y.value-1))*8)+Number(x.value);

        var q=0;
           if(ch[0]==true){
               let jet=document.getElementById('Jet');
               let move=setInterval(move_jet , 100);
               function move_jet(){
                mus.pause();
                snd.play();
                   jet.style.marginBottom=q+"px";
                   q+=50;
                  if(q==2200 ){
                    clearInterval(move);
                    if(arr.includes(coor)==true){
                        win();
                        jet.style.marginBottom="0px";
                    }
                    else{
                        lose();
                        jet.style.marginBottom="0px";
                    }
                }
               }
           }
           var c=0;
           if(ch[1]==true){
            let tank=document.getElementById('Tank');
            let move=setInterval(move_tank , 100);
            function move_tank(){
                mus.pause();
                snd.play();
                tank.style.marginTop=c+"px";
                c-=50;
               if(c==-1600){
                 clearInterval(move);
                 if(arr.includes(coor)==true){
                    win();
                    tank.style.marginTop="0px";
                }
                else{
                    lose();
                    tank.style.marginTop="0px";
                }
             }
            }
           }

           var a=0;
           if(ch[2]==true){
            let rocket=document.getElementById('Rocket');
            let move=setInterval(move_roc , 100);
            function move_roc(){
                mus.pause();
                snd.play();
                rocket.style.marginTop=a+"px";
                a-=100;
                if(a==-1700){
                 clearInterval(move);
                 if(arr.includes(coor)==true){
                    win();
                    rocket.style.marginTop="0px";
                }
                else{
                    lose();
                    rocket.style.marginTop="0px";
                }
             }
            }
        }
    }
}
    }
}

//اتمام زمان بازی
setTimeout(end , 360000);
function end(){
    window.location="index.html";
}

//نمایش اهداف به کاربر
document.getElementsByClassName('target_d')[0].addEventListener("click" , function(){
    document.getElementById('dialog').show();
});
//بستن اهداف
document.getElementById('exit').onclick=function(){
    document.getElementById('dialog').close();
};
//نمایش اهداف در دیالوگ 
var tar=document.getElementById('tar');
arr.forEach(element => {
    tar.innerHTML+=element+"-";
});