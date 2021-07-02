<!-- Image Input -->
<input type="text" name="{{$tempImg}}" value="{{$value}}" hidden>
<div class="form-group d-flex justify-content-between">
  <div class="input-group input-group-sm d-flex align-items-center">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">{{$title}}</span>
    </div>

    <input type="file" class="my-file-input transparent" name="{{$dbField}}" id="{{$dbField}}" data-field="{{$dbField}}" accept=".png,.jpg,.jpeg" value="{{$value}}" onchange="previewFile(this); fileChanged(event);" onclick="fileClicked(event)">
  </div>
  <button class="imgInput" type="button" data-toggle="modal" data-target="#imgModal{{$dbField}}" class="d-flex justify-content-center align-items-center">
    <img src="{{$src}}" id="previewImg{{$dbField}}" onerror="this.onerror=null; this.src='{{$noImage}}'">
  </button>
</div>

<div class="modal fade" id="imgModal{{$dbField}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
    <img loading="lazy" src="{{$src}}" id="previewImgModal{{$dbField}}" onerror="this.onerror=null; this.src='{{$noImage}}'" class="w300px">
  </div>
</div>

<!-- Image Script -->
<script type="text/javascript">
  function previewFile(e) {
    let dbfield = e.name;
    let fileName = document.getElementById(dbfield).value;
    let idxDot = fileName.lastIndexOf(".") + 1;
    let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
      let fileSize = e.files[0].size;
      if (fileSize/1024 > 2000){
        alert("File tidak boleh lebih besar dari 2MB!");
      } else {
        let file = $("#"+dbfield).get(0).files[0];
          if (file) {
            let reader = new FileReader();
            reader.onload = function(){
              $('#previewImg'+dbfield).attr("src",reader.result);
              $('#previewImgModal'+dbfield).attr("src",reader.result);
            }
            reader.readAsDataURL(file);
          }
      }
      }else if (fileName == ''){
      }else {
        alert("Format file harus jpg/jpeg atau png!");
      }    
    }

    //This is All Just For Logging:
    var debug = true;//true: add debug logs when cloning
    var evenMoreListeners = true;//demonstrat re-attaching javascript Event Listeners (Inline Event Listeners don't need to be re-attached)
    if (evenMoreListeners) {
        var allFleChoosers = $("input[type='file']");
        addEventListenersTo(allFleChoosers);
        function addEventListenersTo(fileChooser) {
            // fileChooser.change(function (event) { console.log("file( #" + event.target.id + " ) : " + event.target.value.split("\\").pop()) });
            // fileChooser.click(function (event) { console.log("open( #" + event.target.id + " )") });
        }
    }
    (function () {
        var old = console.log;
        var logger = document.getElementsByClassName('my-file-input');
        console.log = function () {
            for (var i = 0; i < arguments.length; i++) {
                if (typeof arguments[i] == 'object') {
                    logger.innerHTML += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />';
                } else {
                    logger.innerHTML += arguments[i] + '<br />';
                }
            }
            old.apply(console, arguments);
        }
    })();

    var clone = {};

    // FileClicked()
    function fileClicked(event) {
        var fileElement = event.target;
        if (fileElement.value != "") {
            // if (debug) { console.log("Clone( #" + fileElement.id + " ) : " + fileElement.value.split("\\").pop()) }
            clone[fileElement.id] = $(fileElement).clone(); //'Saving Clone'
        }
        //What ever else you want to do when File Chooser Clicked
    }

    // FileChanged()
    function fileChanged(event) {
        var fileElement = event.target;
        if (fileElement.value == "") {
            // if (debug) { console.log("Restore( #" + fileElement.id + " ) : " + clone[fileElement.id].val().split("\\").pop()) }
            clone[fileElement.id].insertBefore(fileElement); //'Restoring Clone'
            $(fileElement).remove(); //'Removing Original'
            if (evenMoreListeners) { addEventListenersTo(clone[fileElement.id]) }//If Needed Re-attach additional Event Listeners
        }
        //What ever else you want to do when File Chooser Changed
    }

</script>