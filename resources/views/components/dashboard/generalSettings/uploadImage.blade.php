@php use App\Models\GeneralSetting; @endphp
<div class="col-6 mt-4">
    <div id="{{'uploadArea'.$i}}" class="upload-area ">
        <div class="upload-area__header">
            <p class="upload-area__paragraph">
                <strong class="text-primary">{{strtoupper($name)}}-{{$i}}</strong> should be an image
            </p>
        </div>
        <div id="{{'dropZoon'.$i}}" onclick="openFileInput('#fileInput{{$i}}')" class="upload-area__drop-zoon drop-zoon">
            <span class="drop-zoon__icon">
              <i class='bx bxs-file-image'></i>
            </span>
            <p class="drop-zoon__paragraph">Click to browse</p>
            <span id="loadingText{{$i}}" class="drop-zoon__loading-text">Please Wait</span>
            <img src="{{asset('frontAssets/images/'.$folder.GeneralSetting::getValueForKey($name.$i))}}" alt="Preview Image" id="previewImage{{$i}}" class="drop-zoon__preview-image" draggable="false" style="display:{{GeneralSetting::getValueForKey($name.$i)?' block':'none'}}">
            <input type="file" id="fileInput{{$i}}" name="{{$name.$i}}" onchange="changeFileInput('dropZoon{{$i}}','loadingText{{$i}}','previewImage{{$i}}','uploaded-file__counter{{$i}}','uploadedFile{{$i}}','uploadedFileInfo{{$i}}','uploadArea{{$i}}','fileDetails{{$i}}','uploaded-file__name{{$i}}','uploaded-file__icon-text{{$i}}',event)" class="drop-zoon__file-input" accept="image/*">
        </div>
        <!-- End Drop Zoon -->

        <!-- File Details -->
        <div id="fileDetails{{$i}}" class="upload-area__file-details file-details">
            <h3 class="file-details__title">Uploaded File</h3>

            <div id="uploadedFile{{$i}}" class="uploaded-file">
                <div class="uploaded-file__icon-container">
                    <i class='bx bxs-file-blank uploaded-file__icon'></i>
                    <span class="uploaded-file__icon-text{{$i}}"></span> <!-- Data Will be Comes From Js -->
                </div>

                <div id="uploadedFileInfo{{$i}}" class="uploaded-file__info">
                    <span class="uploaded-file__name{{$i}}">Slider-{{$i}}</span>
                    <span class="uploaded-file__counter{{$i}}">0%</span>
                </div>
            </div>
        </div>
        <!-- End File Details -->
    </div>
    @error($name.$i)
    <span class="text-danger">{{$message}}</span>
    @enderror
    <!-- End Upload Area -->
</div>
@section('script')
    <script>

        function fillTextarea(){
            var content = document.querySelector(".ql-editor").innerHTML;
            $('#copyright').empty();
            $('#copyright').val(content);
        }

        // Images Types
        const imagesTypes = ["jpeg", "png", "svg", "gif"];
        function openFileInput (id) {
            // Click The (fileInput)
            const fileInput = document.querySelector(id);
            fileInput.click();
        }

        // When (fileInput) has (change) Event
        function changeFileInput (dz,lt,pi,ufc,uf,ufi,ua,fd,ufn,ufit,event) {
            // Select The Chosen File
            const file = event.target.files[0];
            const dropZoon = document.querySelector('#'+dz);
            const loadingText = document.querySelector('#'+lt);
            const previewImage = document.querySelector('#'+pi);
            const uploadedFileCounter = document.querySelector('.'+ufc);
            const uploadedFile = document.querySelector('#'+uf);
            const uploadedFileInfo = document.querySelector('#'+ufi);
            const uploadArea = document.querySelector('#'+ua);
            const fileDetails = document.querySelector('#'+fd);
            const uploadedFileName = document.querySelector('.'+ufn);
            const uploadedFileIconText = document.querySelector('.'+ufit);

            // Call Function uploadFile(), And Send To Her The Chosen File :)
            uploadFile(file,dropZoon,loadingText,previewImage,uploadedFile,uploadedFileInfo,uploadArea,fileDetails,uploadedFileName,uploadedFileCounter,uploadedFileIconText);
        }

        // Upload File Function
        function uploadFile(file,dropZoon,loadingText,previewImage,uploadedFile,uploadedFileInfo,uploadArea,fileDetails,uploadedFileName,uploadedFileCounter,uploadedFileIconText) {
            // FileReader()
            const fileReader = new FileReader();
            // File Type
            const fileType = file.type;
            // File Size
            const fileSize = file.size;

            // If File Is Passed from the (File Validation) Function
            if (fileValidate(fileType, fileSize,uploadedFileIconText)) {
                // Add Class (drop-zoon--Uploaded) on (drop-zoon)

                dropZoon.classList.add('drop-zoon--Uploaded');

                // Show Loading-text
                loadingText.style.display = "block";
                // Hide Preview Image
                previewImage.style.display = 'none';

                // Remove Class (uploaded-file--open) From (uploadedFile)
                uploadedFile.classList.remove('uploaded-file--open');
                // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
                uploadedFileInfo.classList.remove('uploaded-file__info--active');

                // After File Reader Loaded
                fileReader.addEventListener('load', function () {
                    // After Half Second
                    setTimeout(function () {
                        // Add Class (upload-area--open) On (uploadArea)
                        uploadArea.classList.add('upload-area--open');

                        // Hide Loading-text (please-wait) Element
                        loadingText.style.display = "none";
                        // Show Preview Image
                        previewImage.style.display = 'block';

                        // Add Class (file-details--open) On (fileDetails)
                        fileDetails.classList.add('file-details--open');
                        // Add Class (uploaded-file--open) On (uploadedFile)
                        uploadedFile.classList.add('uploaded-file--open');
                        // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
                        uploadedFileInfo.classList.add('uploaded-file__info--active');
                    }, 500); // 0.5s

                    // Add The (fileReader) Result Inside (previewImage) Source
                    previewImage.setAttribute('src', fileReader.result);

                    // Add File Name Inside Uploaded File Name
                    uploadedFileName.innerHTML = file.name;

                    // Call Function progressMove();
                    progressMove(uploadedFileCounter);
                });

                // Read (file) As Data Url
                fileReader.readAsDataURL(file);
            } else { // Else

                this; // (this) Represent The fileValidate(fileType, fileSize) Function

            };
        };

        // Progress Counter Increase Function
        function progressMove(uploadedFileCounter) {
            // Counter Start
            let counter = 0;

            // After 600ms
            setTimeout(() => {
                // Every 100ms
                let counterIncrease = setInterval(() => {
                    // If (counter) is equle 100
                    if (counter === 100) {
                        // Stop (Counter Increase)
                        clearInterval(counterIncrease);
                    } else { // Else
                        // plus 10 on counter
                        counter = counter + 10;
                        // add (counter) vlaue inisde (uploadedFileCounter)
                        uploadedFileCounter.innerHTML = `${counter}%`
                    }
                }, 100);
            }, 600);
        };


        // Simple File Validate Function
        function fileValidate(fileType, fileSize,uploadedFileIconText) {
            // File Type Validation
            let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

            // If The Uploaded File Type Is 'jpeg'
            if (isImage[0] === 'jpeg') {
                // Add Inisde (uploadedFileIconText) The (jpg) Value
                uploadedFileIconText.innerHTML = 'jpg';
            } else { // else
                // Add Inisde (uploadedFileIconText) The Uploaded File Type
                uploadedFileIconText.innerHTML = isImage[0];
            };

            // If The Uploaded File Is An Image
            if (isImage.length !== 0) {
                // Check, If File Size Is 2MB or Less
                if (fileSize <= 2000000) { // 2MB :)
                    return true;
                } else { // Else File Size
                    return alert('Please Your File Should be 2 Megabytes or Less');
                };
            } else { // Else File Type
                return alert('Please make sure to upload An Image File Type');
            };
        };

        // :)
    </script>
@endsection
