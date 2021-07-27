@extends('welcome')

@section('styles')
    <style>
       section {
           direction: rtl;
           text-align: center;
           background-image: linear-gradient(#9b59b6, #fff,#9b59b6);
       }
        .grid-container {
            display: grid;
            align-items: center; /* تتحكم عموديا في العناصر */
        }
        .item {
            color: rgb(20, 17, 17);
            text-align: center;
            padding: 30px
        }
        .c1 {
            margin: 3px;
            padding: 1px;
            border: 3px solid #8f3d66;
            border-radius: 14px;
            box-shadow: 0 0 5px rgb(112, 70, 70);
            background-image: radial-gradient(rgb(212, 187, 187),rgb(211, 181, 181) );
            text-align: center;
        }

        .child-items .item {
            position: relative;
            margin: 3px;
            padding: 10px;
            border: 3px solid #FFBF00;
            border-radius: 14px;
            box-shadow: 0 0 5px #000;
            background-image: radial-gradient(#F3E2A9,#fff );
            text-align: center;
            color: #DF7401;
        }
        .child-items .item  .order{
            position: absolute;
            top: 1px;
            right: 1px;
            bottom: 1px;
            margin: 3px;
            padding: 5px;
            border: 3px solid #8C8366;
            border-radius: 14px;
            background-color: #FFBF00;
            text-align: center;
            width: 50px;
            color: #fff;
        }
        .child-items .item .votes-style 
        {
            position: absolute;
            top: 1px;
            left: 1px;
            bottom: 1px;
            width: 50px;
            margin: 3px;
            padding: 5px;
            border: 3px solid #FFBF00;
            border-radius: 14px;
            background-color: #FFBF00;
            text-align: center;
            width: 50px;
            color: #fff;
        }

        .modelVote > div > div
        {
            position: absolute;
            top: 100px;
            right: 400px;
        }
        .modelVote .create_vote
        {
            margin: 90px 90px 40px 0px;
            padding: 5px;
            border: 3px solid green;
            border-radius: 14px;
            background-color: green;
            text-align: center;
            width: 200px;
            color: #fff;
        }
        .cl2 
        {
            margin: 3px;
            padding: 1px;
            border: 3px solid #9b59b6;
            border-radius: 14px;
            box-shadow: 0 0 5px #000;
            background-image: radial-gradient(#ccc,#fff );
            text-align: center;
        }
        .modelVote .buy
        {
            height: 50px;
            width: 190px;
            padding: 10px 0px 0px 0;
            font-size: 16px;
            margin: 0px 90px 10px 0px;
          
        }
    </style>
@endsection

@section('content')

    <section>
        <div class="grid-container">
            <div class="item">
                <h2>{{$data['competition_name']}}</h2>
            </div>

            <div class="item c1">
                <h2>قوانين المسابقة</h2>
                <p>{{$data['competition_roles']}}</p>
            </div>

            <div class="item item-four c1">
                <h2>قائمة المتسابقين</h2>
                <div class="child-items " id="">
                   
                    @widget('contestantsWidget', ['unique_url' => $data['unique_url']])

                </div>
            </div>

            <div class="item c1">
                <h3>الوقت المتبقي لانتهاء التصويت</h3>
            </div>
            <div class="item">6              
            </div>
      
          </div>
    </section>



    <div id="modelVote" class="modelVote"  >
        <div>
              <div class="vote">
                <h3 id="ltitle"></h3>
                <p style="color: red; visibility: hidden" class="error" id="error" >لا يمكنك التصويت أكثر من مرة</p>
                <p style="color: green; visibility: hidden" class="success" id="success" >تم التصويت بنجاح</p>
                <input type="hidden" name="lid" id="lid" value="">
                <hr>
                <div class="create_vote" id="create_vote" onclick="createVote()">نعم</div>
                <a href="" class="payment cl2" id="payment">طلب فزعة 100 صوت</a>
                 <button id="modelVoteClose" onclick="modelVoteClose()">اغلاق</button>
    
              </div>
            
        </div>
       
    </div>


@endsection

@section('scripts')
    <script>
  
        function modelVoteShow(id, name) {
            $('#ltitle').text('هل انت متأكد من رغبتك في التصويت ل' +  name + '؟');
            $("input[name='lid']").val(id);
            $("#payment").attr("href", "{{ url('payment/') }}" + '/' + id );
            document.getElementById('modelVote').style.display = 'block';
        }

        function modelVoteClose() {
            document.getElementById('modelVote').style.display = 'none';
            document.getElementById('success').style.visibility = 'hidden';
            document.getElementById('error').style.visibility = 'hidden';

        }

        function createVote() {
            let id = $("input[name='lid']").val();
            let unique_url = "{{$data['unique_url']}}"
            let voted = localStorage.getItem('vo' + unique_url + 'ted');

            $.ajax({
                type: 'post',
                url: "{{ route('vote') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id,
                    'voted': voted,
                    'unique_url': unique_url
                },
                success: function (data) {
                    if(data.status == true) {
                        document.getElementById('success').style.visibility = 'visible';
                        if(data['vo_uniqueUrl_ted']){
                            localStorage.setItem(data['vo_uniqueUrl_ted'], data.vo_uniqueUrl_ted);
                        }
                    } else {
                        document.getElementById('success').style.visibility = 'hidden';
                        document.getElementById('error').style.visibility = 'visible';
                    }
                    
                }, error: function(reject) {
                    
                }
            })

        }

       
    </script>
@endsection