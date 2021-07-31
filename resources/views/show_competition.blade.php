@extends('welcome')

@section('content')

<main>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-11 text-center leaderboard-pl-filter-margin">
                 <h1 class="mt-5" style="font-size: 47px;">
                     <span style="color: rgb(25, 183, 193);">{{$data['competition_name']}}</span>
                 </h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-10 mt-3" style="border: 1px solid #1c1e21;padding: 20px 10px 20px 10px;">
                        <div class="row justify-content-center leaderboard-section">
                            <div class="col-12 text-center leaderboard-title-card">
                                <nav>
                                     <div class="col-12 leaderboard-update-text mt-0">
                                         <h3 class="mt-6" >
                                             <span style="color: rgb(134, 133, 151);">** قوانين المسابقة **</span>
                                         </h3>
                                         <span class="text-muted">** {{$data['competition_roles']}} **</span>

                                     </div>

                                     <div class="col-12 leaderboard-update-text mt-4">
                                         <h3 class="mt-6" >
                                             <span style="color: rgb(135, 133, 204);"> قائمة المتسابقين</span>
                                         </h3>

                                     </div>
                                     
                                </nav>
                                <div class="row mt-3" style="justify-content: space-between;">
                                     <div class="col-3 leaderboard-title-head">الأصوات</div>
                                     <div class="col-4 leaderboard-title-head">الاسم</div>
                                     <div class="col-2 leaderboard-title-head">المركز</div>
                                 </div>
                            </div>

                            

                            @widget('contestantsWidget', ['unique_url' => $data['unique_url']])
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-12 " style="margin-bottom: 140px;">
             <div class="container">
           
  
                    @widget('counting', ['unique_url' => $data['unique_url']])
                     


                 <div class="solved">
                     
                     <span class="mr-1" id="challenge-solved-count-text"> الوقت المتبقي لانتهاء التصويت</span>
                     <code id="code">
                         <span class="mr-1 text-right" id="count_down" >()</span>
                     </code>
                    
                 </div>
             </div>
        </div>
    </div>
</main>
    


    <div class="model" id="modelVote">
 
         <div class="content content-error" id="content-error">
                 <img src="error.svg" alt="medal vector" class="medal-image">
                 <h4 style="color: #dd3939;">
                    لا يمكنك التصويت اكثر من مرة!
                 </h4>
         </div> 
 
        <div class="content content-success" id="content-success">
             <img src="success.svg" alt="medal vector" class="medal-image">
             <h4 style="color: #78a80f">
                 !تمت التصويت بنجاح
             </h4>
        </div> 
 
         <div class="content content-vote" id="content-vote">
             <h4 style="color: #fff" id="ltitle">
                 
             </h4>
             
             <input type="hidden" name="lid" id="lid">
             <div class="inputBox">
                 <input type="submit" value="تصويت" class="btn btn-primary" id="create_vote" onclick="createVote()">
             </div>

             <div class="inputBox">
                 <a href="" id="payment" class="btn btn-outline-light" > طلب شراء اصوات</a>
             </div>
        </div> 
        <a class="close" onclick="modelToggleVote();"><svg width="28" height="28" viewBox="0 0 36 36" data-testid="close-icon"><path d="M28.5 9.62L26.38 7.5 18 15.88 9.62 7.5 7.5 9.62 15.88 18 7.5 26.38l2.12 2.12L18 20.12l8.38 8.38 2.12-2.12L20.12 18z"></path></svg></a>
       
    </div>
  
    <div class="model " id="modelFinished">
 
      
       <div class="content content-success" id="content-success">
            <img src="success.svg" alt="medal vector" class="medal-image"  id="img-element">
            <h4 style="color: #0fa89b" id="h4-element">
                !  عفوا...انتهت المسابقة
            </h4>
       </div> 


       <a class="close" onclick="modelToggleVote();" id="close"><svg width="28" height="28" viewBox="0 0 36 36" data-testid="close-icon"><path d="M28.5 9.62L26.38 7.5 18 15.88 9.62 7.5 7.5 9.62 15.88 18 7.5 26.38l2.12 2.12L18 20.12l8.38 8.38 2.12-2.12L20.12 18z"></path></svg></a>
      
   </div>
 
@endsection

@section('scripts')



<script>






    // 
  var countDownDate = new Date("{{$data['contest_end']}}").getTime();
  // Update the count down every 1 second
  var x = setInterval(function() {
  
    
    var now = new Date().getTime();
    
  
    
    var distance = countDownDate - now;
    
    
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("count_down").innerHTML = "("+  " ةيناث" + seconds   + " ةقيقد" + minutes
     + " ةعاس" + hours  + " موي"  + days + ")";
  
    
    if (distance < 0) {
      clearInterval(x);
      document.getElementById('code').style.direction = 'rtl';
      document.getElementById("count_down").innerHTML = "(" + 'انتهت المسابقة' +")";
    }
  }, 1000);


if(navigator.cookieEnabled == false) {
    document.getElementById('close').style.visibility = 'hidden'
    $("#img-element").attr("src", "error.svg");
    document.getElementById('h4-element').innerHTML = 'من فضلك فعل ال cookie و أعد تحميل الصفحة';
    document.getElementById('h4-element').style.direction = 'rtl';
    document.getElementById('h4-element').style.color = 'red';
    const model = document.getElementById('modelFinished');
    model.classList.add('active');
} else {

    let dateNow = "{{Carbon\Carbon::now()}}"
    let contestEndDate = new Date().getTime();
    let distance = contestEndDate - dateNow;
    // "{{Carbon\Carbon::now()}}" >= "{{$data['contest_end']}}"
    if (distance < 0) {
   
    function modelToggleVote() {
        const model = document.getElementById('modelFinished');
            model.classList.toggle('active');
    }
    function createVote() {
        const model = document.getElementById('modelVote');
            model.classList.toggle('active');
    }
}else {


  function modelToggleVote(id, name) {
            document.getElementById('content-success').style.display = 'none';
            document.getElementById('content-error').style.display = 'none';
            document.getElementById('content-vote').style.display = 'flex';
            $('#ltitle').text('هل ترغب في التصويت ل' +  name + '؟');
            $("input[name='lid']").val(id);
            $("#payment").attr("href", "{{ url('payment/') }}" + '/' + id );
            const model = document.getElementById('modelVote');
            model.classList.toggle('active');

        }
  
        var timout = true; 
        function createVote() {

            if(timout == false) {
                   return timout;
              }
             
              $.ajaxSetup({
  headers: {
    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
  }
});
            let id = $("input[name='lid']").val();
            let unique_url = "{{$data['unique_url']}}"
            let voted = localStorage.getItem('vo' + unique_url + 'ted');
            $.ajax({
    

                type: 'post',
                url: "{{ route('vote') }}",
                data: {
                    // '_token': "{{ csrf_token() }}",
                    'id': id,
                    'voted': voted,
                    'unique_url': unique_url
                },
                success: function (data) {
                  
                    if(data.status == true) {
                        document.getElementById('content-success').style.display = 'flex';
                        document.getElementById('content-error').style.display = 'none';
                        document.getElementById('content-vote').style.display = 'none';
                        if(data['vo_uniqueUrl_ted']){
                            localStorage.setItem(data['vo_uniqueUrl_ted'], data.vo_uniqueUrl_ted);
                        }
                        timout = true;
                    } else {
                      
                        document.getElementById('content-success').style.display = 'none';
                        document.getElementById('content-error').style.display = 'flex';
                        document.getElementById('content-vote').style.display = 'none';
                        timout = true;
                    }
                    
                }, error: function(reject) {
                    
                }
            })

        }

}
}

    </script>
@endsection