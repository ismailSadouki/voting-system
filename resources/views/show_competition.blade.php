@extends('welcome')

@section('styles')

@endsection

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
           
                 <div class="solved">
                     <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 mx-1 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="challenge-solved-count-check-image"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                     </svg>
                     <span class="mr-1" id="challenge-solved-count-text">مجموع الأصوات</span>
                     <code>
                         <span class="mr-1" id="challenge-solved-count-value">({{$data['number_of_votes']}})</span>
                     </code>
                     <br>
                         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 mx-1 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="challenge-solved-count-check-image"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                         </svg>
                         <span class="mr-1" id="challenge-solved-count-text">المتواجدون اﻵن</span>
                         <code>
                             <span class="mr-1" id="challenge-solved-count-value">(516)</span>
                         </code>
                     <br>
                         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 mx-1 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="challenge-solved-count-check-image"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                         </svg>
                         <span class="mr-1" id="challenge-solved-count-text">اكثر تواجد كان</span>
                         <code>
                             <span class="mr-1" id="challenge-solved-count-value">(516)</span>
                         </code>
                 </div>

                 <div class="solved">
                     
                     <span class="mr-1" id="challenge-solved-count-text"> الوقت المتبقي لانتهاء التصويت</span>
                     <code>
                         <span class="mr-1" id="challenge-solved-count-value">(516)</span>
                     </code>
                    
                 </div>
             </div>
        </div>
    </div>
</main>
    


    {{-- <div id="modelVote" class="modelVote"  >
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
       
    </div> --}}
{{-- -------------------------------------------------------------------------------------------- --}}
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
 
@endsection

@section('scripts')
    <script>
  
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
                    console.log(data)
                    if(data.status == true) {
                        document.getElementById('content-success').style.display = 'flex';
                        document.getElementById('content-error').style.display = 'none';
                        document.getElementById('content-vote').style.display = 'none';
                        if(data['vo_uniqueUrl_ted']){
                            localStorage.setItem(data['vo_uniqueUrl_ted'], data.vo_uniqueUrl_ted);
                        }
                    } else {
                        document.getElementById('content-success').style.display = 'none';
                        document.getElementById('content-error').style.display = 'flex';
                        document.getElementById('content-vote').style.display = 'none';
                    }
                    
                }, error: function(reject) {
                    
                }
            })

        }

       
    </script>
@endsection