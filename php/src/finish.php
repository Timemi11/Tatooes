
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserBookSuccessful</title>
    <style>
    :root{
    --bg0:#7a7878;
    --bg1 : #FFFBE9;
    --bg2 : #E3CAA5;
    --bg3 : #CEAB93;
    --bg4 : #AD8B73;
    --btn-submit:#4CAF50;
    --btn-sbhover:#60dd64;
    --btn-delete:#f44336;
    --btn-dlhover:#f07870;
    }
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .container{
            width: 50%;
            height:20rem;
            text-align:center;
            background-color :var(--bg2);
        }
        .container h3{
            font-size:22px;
            padding:0rem 2rem;
        }
        .container .btnback{
            margin:7rem;
            font-size:30px;
            
        }
        .container .btnback a{
            color:white;
            text-decoration:none;
            padding:1.5rem;
        border-bottom:2px solid grey;
            background-color: var(--btn-delete);
        }
        .container .btnback a:hover{
            background-color: var(--btn-dlhover);
        }
    </style>



</head>
<body>
    <div class="container">
    <h3 >เพิ่มข้อมูลเรียบร้อยแล้วกรุณาไปตามวันและเวลาเพื่อไม่ให้เสียสิทธ์แก่ตนเองและผู้อื่น ขอบคุณที่ใช้บริการครับ/ค่ะ
    </h3>
    <div class="btnback">
    <a href="userdata.php">กลับหน้าแรก</a>
    </div>
    </div>

    
</body>
</html>