window.addEventListener("scroll",reveal);
function reveal(){
    var reveals = document.querySelectorAll(".reveal");
    for(var i =0;i<reveals.length;i++ ){
        var windowheight = window.innerHeight; //ความสูงของขนาดหน้าจอ
        var revealtop = reveals[i].getBoundingClientRect().top; //ความห่างจากด้านบนถึงตัว element
        var revealpoint = 150;//จุดแสดง element คำนวณจาก css ที่ตั้งเอาไว้ translateY(150px);
        if(revealtop < windowheight-revealpoint){ //windowheight - revealpoint = 576px
            reveals[i].classList.add("activereveal");
            
        }else{
            reveals[i].classList.remove("activereveal");
        }
    }
}