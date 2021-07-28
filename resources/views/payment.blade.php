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






           /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
            .StripeElement {
                box-sizing: border-box;

                height: 40px;
                width: 30%;

                padding: 10px 12px;

                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;

                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
                }

                .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
                }

                .StripeElement--invalid {
                border-color: #fa755a;
                }

                .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
                }



      .packages
      {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
      }
      .packages div
      {
        margin: 10px;
      }
      .packages div label
      {
        cursor: pointer;
      }
      .packages div label input[type="radio"]
      {
        display: none; 
      }
      .packages div label span 
      {
        position: relative;
        display: inline-block;
        background: #424242;
        padding: 15px 30px;
        color: #555;
        text-shadow: 0 1px 4px rgba(0, 0, 0, .5);
        border-radius: 30px;
        font-size: 20px;
        transition: .5s;
        user-select: none;
        overflow: hidden;
        direction: rtl;
      }
      .packages div label span::before
      {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: rgba(255, 255, 255, .1);
      }
      .packages div:nth-child(6n + 1) label input[type="radio"]:checked ~ span
      {
        background: #0f0;
        color: #fff;
        box-shadow: 0 2px 20px #0f0;
      }
      .packages div:nth-child(6n + 2) label input[type="radio"]:checked ~ span
      {
        background: #e91e63;
        color: #fff;
        box-shadow: 0 2px 20px #e91e63;
      }
      .packages div:nth-child(6n + 3) label input[type="radio"]:checked ~ span
      {
        background: #ffeb3b;
        color: #fff;
        box-shadow: 0 2px 20px #ffeb3b;
      }

      .packages .inputBox 
      {
        margin-top:40px;
        position: relative;
        width: 100%;
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;

      }
      .packages .inputBox input 
      {
        max-width: 150px;
        color: #fff;
        background-color: #00adbb;
        width: 100%;
        border: 1px solid rgba(0, 0,0 ,0.2);
        padding: 15px;outline: none;font-size: 18px;
        padding-bottom: 15px !important;
      }
      .packages .inputBox input:hover
      {
        color: #fff;
        background-color: #008a95;
        border-color: #007e88;
      }
    </style>
@endsection

@section('content')
<main>
  <div class="container">
    
      <div class="row justify-content-center">
          <div class="col-11 text-center leaderboard-pl-filter-margin">
               <h1 class="mt-5" style="font-size: 47px;">
                   <span style="color: rgb(25, 183, 193);">
                                    <h2> هل ترغب في شراء اصوات ل<span style="color: #e83e8c;">{{ $contestant->name }}</span> في مسابقة: <span style="color: #e83e8c;">{{$competition->name}}</span></h2>
                   </span>
               </h1>
          </div>
          <div class="container">
            <form action="{{ route('payment') }}" method="POST" id="payment-form">
              @csrf
              <div class="row justify-content-center">
                  <div class="col-11 col-md-10 mt-3" style="border: 1px solid #1c1e21;padding: 20px 10px 20px 10px;">
                      <div class="row justify-content-center leaderboard-section">
                          <div class="col-12 text-center leaderboard-title-card" style="margin: 40px 0 !important;">
                              <nav>
                                   <div class="col-12 leaderboard-update-text mt-0">
                                       <h3 class="mt-6" >
                                           <span style="color: rgb(134, 133, 151);">
                                              <h2> اختر الباقة</h2>
                                          </span>
                                       </h3>
                                     
                                      
                                   </div>

                                   <div class="col-12 leaderboard-update-text mt-4 packages justify-content-center">
                                      <div>
                                        <label>
                                          <input type="radio" name="radio" value="1">
                                          <span>
                                            10 اصوات ب 2$
                                          </span>
                                        </label>
                                      </div>
                                      <div>
                                        <label>
                                          <input type="radio" name="radio" value="2">
                                          <span>
                                            50 صوت ب 10$
                                          </span>
                                        </label>
                                      </div>
                                      <div>
                                        <label>
                                          <input type="radio" name="radio" value="3">
                                          <span>
                                            100 صوت ب 20$
                                          </span>
                                        </label>
                                      </div>
                                   </div>
                                   
                              </nav>
                            
                          </div>

                          

                          
                           
                      </div>

                      <div class="row justify-content-center leaderboard-section">
                        <div class="col-12 text-center leaderboard-title-card" >
                            <nav>
                                 <div class="col-12 leaderboard-update-text mb-0 mt-0">
                                     <h3 class="mt-6 card-element mb-0" >
                                         <span style="color: rgb(134, 133, 151); margin: 10px;">
                                            <h2> بطاقة الائتمان أو الخصم</h2>
                                        </span>
                                     </h3>
                                   
                                    
                                 </div>

                                 <div class="col-12 leaderboard-update-text mt-4 packages justify-content-center">
                                    <div>
                                      
                    
                                        <input type="hidden" value="{{$contestant->id}}" name="id">
                                        <div class="form-row">
                                           
                                            <div id="card-element" style="width: 300px">
                                    
                                            </div>
                                         
                                              <div id="card-errors" role="alert" style="color: rgb(216, 83, 83)">
                                    
                                              </div>
                                           
                                            
                                        </div>
                                        <div class="inputBox" >
                                          <input type="submit" value="ادفع" class="btn btn-primary" >
                                        </div>
                              
                                    </div>
                                 </div>
                                 
                            </nav>
                          
                        </div>

                        

                        
                         
                    </div>
                  </div>
              </div>
        </form>

          </div>
      </div>

      <div class="row col-12 " style="margin-bottom: 140px;">
           <div class="container">
         

                  
                   

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
  
  

   


@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>


<script type="text/javascript">

   
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51JHbojDkfUAfHzI5bk7IzNhMkLkJ5CxPNTLwC7yFhXyNTw9OMRRpOjAFAaIAiqFsEJMMQFTGIc41OH1vuomg3Ns900MYiyJWEC');
    
    // Create an instance of Elements.
    var elements = stripe.elements();
    
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };
    
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
    
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
    
      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });
    
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
    
      // Submit the form
      form.submit();
    }
    
</script>
    
    
    
@endsection