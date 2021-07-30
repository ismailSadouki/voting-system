<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet"> 

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        @yield('styles')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @isset($d)
            <style>
                body, html {
                    font-family: 'El Messiri', sans-serif;
                    font-size: 15px;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #212529;
                    text-align: left;
                    background: linear-gradient(to right, #b92b27, #1565c0);
                    justify-content: center;
                    display: flex;
                    margin-top: 153px;
                }
                .create {
                    position: relative;
                    background-color: #003438;
                    text-decoration: none;
                    color: #fff;
                    padding: 14px 25px;
                    text-align: center;
                    direction: rtl;
                    border: 1px solid #777;
                    border-radius: 8px;
                    display: flex;
                    justify-content: center;
                    flex-wrap: wrap;
                    width: 270px;
                }
            </style>
        @endisset
            
       
    </head>
    <body class="antialiased" style="background: linear-gradient(to right, #b92b27, #1565c0);">

       
       
       
        <div class="model" id="modelCreate" style="    padding: 30px 50px 20px;">
            
                <div class="content content-create">
                    <form action="" method="POST" id="competition_form" class="create_competition content">
                        @csrf
                                <div class="col-11 text-left rules positio-relative">
                                    <h6 class="text-right text-muted px-2 mx-3">انشاء مسابقة جديدة</h6>
                                    <hr>
                                </div>
                                <div class="inputBox">
                                    <input  placeholder="اكتب اسم المسابقة" name="name" value="" required="">
                                </div>
                                <h4  style="color: #a88d8d;margin-bottom: 0 ;font-size: 18px !important;direction: rtl;"><sup style="color:rgb(190, 107, 107)">*اختياري</sup>وقت و تاريخ انتهاء المسابقة</h4>
                                
                          <div class="inputBox" style="margin-top: 20px;">
                            <input type="date" id="date" name="date" ><input type="time" id="time" name="time"  value="00:00:00">
                          </div>

                                <div class="inputBox">
                                    <input type="text" placeholder="اكتب قوانين المسابقة" name="roles"  required>
                                </div>
                                <h4 style="color: #a88d8d;">اسماء المتسابقين</h4>
                                <div class="inputBox" style="margin-top: 0;">
                                    <textarea placeholder="احمد
                                    محمد
                                    ياسين" rows="2" name="contestants" required></textarea>
                                </div>
                                <h6 style="color: #c82e2e;
                                             visibility: hidden;
                                             text-align: center;
                                             direction: rtl;
                                            margin-top: 10px;" id="create-error">تأكد من ملأ كل الحقول!</h6>
                                
                                <div class="inputBox" style="margin-top:20px">
                                    <input type="submit" value="انشاء" class="btn btn-primary" id="create_competition" style="text-align: center">
                                </div>
                     </form>
                    
                  
                     <div id="created_competition" class=" inputBox">
                        <div class="inputBox" >
                            <h6 >اسم المسابقة:
                                <span style="color: #21aa30" id="lcompetition_name"></span>
                            </h6>
                        </div>
                        <div class="inputBox" >
                            <h6>قوانين المسابقة:
                                <span style="color: #21aa30" id="lroles_competition"></span>
                            </h6>
                        </div>
                        <div class="inputBox" >
                            <h6>المتسابقين:
                                <span style="color: #21aa30" id="lcontestants"></span>
                            </h6>
                        </div>
                        <div class="inputBox" >
                            <h6>رابط المسابقة :
                                <a href="" id="lurl" style="color: #21aa30"></a>
                            </h6>
                        </div>
                        <div class="inputBox" style="margin-top:40px">
                            <input type="submit" value="نسخ الرابط" class="btn btn-primary" id="copy" style="text-align: center">
                        </div>
                    </div>

            </div> 
        
            <a class="close" onclick="modelToggleCreate();"><svg width="28" height="28" viewBox="0 0 36 36" data-testid="close-icon"><path d="M28.5 9.62L26.38 7.5 18 15.88 9.62 7.5 7.5 9.62 15.88 18 7.5 26.38l2.12 2.12L18 20.12l8.38 8.38 2.12-2.12L20.12 18z"></path></svg></a>
     
        </div>
     



        @yield('content')
 

            
       
        <div class="create" onclick="modelToggleCreate();" style="cursor: pointer">
            إنشاء مسابقة جديدة مجاناً
        </div>
    </body>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dc9e78ad18.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script>

        function modelToggleCreate() {
            document.getElementById('created_competition').style.display = 'none';
            document.getElementById('competition_form').style.display = 'block';
            const model = document.getElementById('modelCreate');
            model.classList.toggle('active');
        }
  

      
        function successCreateCompetition(data, url)
        {
            document.getElementById('competition_form').style.display = 'none';
            document.getElementById('created_competition').style.display = 'grid';
            document.getElementById("lurl").innerHTML = url;
            $("#lurl").attr("href", url );
            document.getElementById("lcompetition_name").innerHTML = data['name'];
            document.getElementById("lroles_competition").innerHTML = data['roles'];
            document.getElementById("lcontestants").innerHTML = data['contestants'];
            
        }

// copy url after create compotetion
        $(document).on('click', '#copy', function(e) {
            e.preventDefault();
            var $temp = $("<input>");
            var $url = $('#lurl').attr('href');

            $("body").append($temp);
            $temp.val($url).select();
            document.execCommand("copy");
            $temp.remove();
        })

// create competition
        let timoutCreate = true; 
        $(document).on('click', '#create_competition', function(e) {
            e.preventDefault();
            if(timoutCreate == false) {
                  return timoutCreate;
              }
              timoutCreate = false;

            let name = $("input[name='name']").val();
            let roles = $("input[name='roles']").val();
            let contestants = $("textarea[name='contestants']").val().split('\n');

            let date = document.getElementById('date').value;
            let time = document.getElementById('time').value;
            var dateTime;
            if (date) {
                if (time) {
                    var dateTime = date + ' ' + time;
                } else {
                    var dateTime = date + ' ' + '00:00:00';
                }
            } else {
                var dateTime = "{{Carbon\Carbon::now()->addHour(24)}}";
            }
           
           const getNewUrl = (url, newPathName) => {
            let hostName = url.substr(0, url.lastIndexOf('/') + 1)
                if(hostName == 'http://' || hostName == 'https://') {
                    return url + '/' + newPathName;
                } else {
                    return hostName + newPathName;
                }
           }
            $.ajax({
                type: 'post',
                url: "{{ route('store.competition') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': name,
                    'roles': roles,
                    'contestants': contestants,
                    'dateTime': dateTime
                },
                success: function (data) {
                    let url = '{{url()->current()}}';
                    successCreateCompetition(data, getNewUrl(url, data['unique_url']));
                    timoutCreate = true;
                    
                }, error: function(reject) {
                    
                    document.getElementById('create-error').style.visibility = 'visible';
                    timoutCreate = true;

                }
            })

        })
       


    </script>


    @yield('scripts')
</html>
