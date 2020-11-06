
    <div class="site-section bg-image overlay" style="background-image: url('storage/images/hero_6.jpg');" id="donate-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-5 text-center">
            <h2 class="text-white mb-4">Make A Donation Now To Change Lives Forever!</h2>
            <p><button type="button" class="btn btn-primaryB font-weight-bold px-4 py-3 btn-block" data-toggle="modal" data-target="#donateModal">
                Donate Now 
                </button>
          </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Donate Now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Thank You For Your Interest In Donating to YOUTAF's Causes.
         <p>
           Please contact the number listed below for details on how you can donate.<br/>
         </p>
         <p class="text-center font-weight-bold">
          <span><a id="donatenum" href='tel:{{$setting->phone_num}}'>{{ phoneNum($setting->phone_num) }}</a></span>
          <input type="hidden" value="{{$setting->phone_num}}" id="donatenumI">
         
            <a onclick="copy('donatenumI')" onmouseout="outFunc()" class="pl-3 pr-3">
              <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
              <span class="icon-clipboard"></span> 
            </a>
  
  
         </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="call()" class="btn btn-primary">Call Us Now</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function call(){
          document.getElementById('donatenum').click();
    }
  
    function copy(element){
  
      let text = document.getElementById(element).value;
     
      var txt3 = document.createElement("input");
      txt3.id = "texthold";
      document.body.appendChild(txt3);
      txt3.value = text;
  
      var copyText = document.getElementById("texthold");
    
      
      var selection = document.getSelection();
      var range = document.createRange();
    //  range.selectNodeContents(textarea);
      range.selectNode(copyText);
      selection.removeAllRanges();
      selection.addRange(range);
  
      console.log('copy success', document.execCommand('copy'));
      selection.removeAllRanges();
  
          /* Alert the copied text */
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copied: " + copyText.value;
      copyText.remove();
    }
  
    function outFunc() {
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copy to clipboard";
    }
  </script>