@extends('welcome')

@section('styles')
<style>
.create
        {
          visibility: hidden;
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
