<?php
$con = mysqli_connect('localhost','root',"",'win');
mysqli_set_charset($con,"utf8");

$errors = [];

if(isset($_POST['sub'])) {
    $firstName  = $_POST['firstName'];
    $lastName  = $_POST['lastName'];
    $email  = $_POST['email'];

    if(empty($firstName)){
        $errors['firstNameError'] = ' يرجى ادخال الاسم الاول ';
    }

    if(empty($lastName)){
        $errors['lastNameError'] = ' يرجى ادخال الاسم الاخير ';
    }

    if(empty($email)){
        $errors['emailError'] = ' يرجى ادخال الايميل ';
    }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){ 
        $errors['emailError'] = ' يرجى ادخال ايميل الصحيح ';
    }

    if(empty($errors)){
        $firstName = mysqli_real_escape_string($con , $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con , $_POST['lastName']);
        $email = mysqli_real_escape_string($con , $_POST['email']);

        $sql = "INSERT INTO users (fristName , lastName , email ) VALUES ('$firstName' ,'$lastName' , '$email') ";

        if(mysqli_query($con , $sql)){
            header('Location: /');
        }   
    }
}

if (isset($_POST['win'])) {
    $sql = "select * from users order by RAND() limit 1;";
    $result = mysqli_query($con , $sql);


    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $firstName = $row['firstName'];
    $lastName  = $row['lastName'];

   // echo "<script>alert('الفايز: $firstName $lastName')</script>";
}

?>

<!DOCTYPE html>
    <html lang="ar" dir='rtl'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>مسابقة</title>
        <style>
        
                #div1{
                    font-size: 60px;
                    
                }
                img{
                display: block;
                margin: 0 auto;
                }
                #div3{
                    font-size: 30px;
                }
                #div4{
                    margin-top: 5px;
                    color: green;
                    font-size: 20px;
                }
                #div5{
                    margin-top: 5px;
                    font-size: 20px;
                    margin-bottom: 10px;
                }
                #div6{
                    margin-bottom: 3px;
                    background-color: rgb(214, 214, 214) ;
                    color: black;
                    width: 30%;
                    margin: 0 auto;
                }
                #but{
                    margin-top: 10px;
                }
                form{
                display: flex;
                justify-content: center;
                flex-direction: column;
                }
                #formating{
                    width: 13%;
                    margin: 0 auto;
                }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
            
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto ">
                <img id="tvtc" src="pngtree-user-vector-avatar-png-image_4830521.jpg" width="100" height="100" alt="">
                <h1 class="display-4 fw-normal mb-3">اربح مع بسام</h1>

                <p class="lead fw-normal">باقي على فتح التسجيل</p>
                <h3 id="countdown" style="color:green"></h3>
                
                <p class="lead fw-normal">للسحب على ربح نسخة مجانية من برنامج</p>
            </div>

            <div class="container w-50">
                <h3>للدخول في السحب اتبع ما يلي:</h3>
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item">تابع البث المباشر على صفحتي على الفيسبووك بالتاريخ المذكور اعلاه</li>
                    <li class="list-group-item">سأقوم ببث مباشر لمدة ساعة عبارة عن أسئلة وأجوبة حرة للجميع</li>
                    <li class="list-group-item">خلال فترة الساعة سيتم فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك وايميلك</li>
                    <li class="list-group-item">بنهاية البث سيتم اختيار اسم واحد من قاعدة البيانات بشكل عشوائي</li>
                    <li class="list-group-item">الرابح سيحصل على نسخة مجانية من برنامج كامتازيا</li>
                </ul>
            </div>

            <button type="button" class="btn btn-outline-secondary mt-4 mb-1">صفحتي على الفيسبوك</button>
        </div>


        <div class="position-relative text-center ">
            <div class="col-md-5 p-lg-5 mx-auto mt-1">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="fname" class="form-label" style="display:block;text-align:right">الاسم الاول</label>
                        <input type="text" name="fname" class="form-control" id="fname">
                    </div>

                    <div class="mb-3">
                        <label for="lname" class="form-label" style="display:block;text-align:right">الاسم الاخير</label>
                        <input type="text" name="lname" class="form-control" id="lname">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="display:block;text-align:right">البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="mb-3" style="display:block;text-align:right">
                        <input type="checkbox" name="" id="">
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                        تم الضغط والموافقة على شروط واحكام الموقع
                    </div>

                    <div class="d-grid gap-2 col-6 mb-5">
                        <input type="submit" name="sub"  class="btn btn-primary px-2 fw-bold" style="width: fit-content" value="إرسال المعلومات">
                    </div>

                </form>
            </div>
        </div>


        <form action="" method="POST">
            <div id="formating" class="d-grid gap-2 col-6 mx-auto mb-5">
                <input type="submit" name='win' class="btn btn-primary py-3 px-5 fw-bold fs-2" value=" أختيار الرابح">
            </div>
        </form>



        <script>
            var countDownDate = new Date("oct 28, 2024 23:59:00").getTime();

            var x = setInterval(function() {

            var counter = document.querySelector("#countdown") ;

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            counter.innerHTML = days + " يوم " + hours + " ساعة "

            + minutes + " دقيقة " + seconds + " ثانية ";

            if (distance < 0) {
                clearInterval(x);
                counter.innerHTML = "لقد وصلت متأخراً";
            }
            }, 1000);
        </script>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>