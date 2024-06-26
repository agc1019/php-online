<!-- MODAL FOR TOOLS POPUP -->
<div class="modal fade" id="multiTabModal" tabindex="-1" aria-labelledby="multiTabModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-width">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tools</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <div class="tab-container">
                        <div class="d-flex justify-content-between align-items-center mt-3 ms-2 me-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="simplify-tab" data-bs-toggle="tab" data-bs-target="#simplify" type="button" role="tab" aria-controls="simplify" aria-selected="true"><i class="fas fa-magic"></i> Simplify</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="paraphrase-tab" data-bs-toggle="tab" data-bs-target="#paraphrase" type="button" role="tab" aria-controls="paraphrase" aria-selected="false"><i class="fas fa-retweet"> </i> Paraphrase</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="translate-tab" data-bs-toggle="tab" data-bs-target="#translate" type="button" role="tab" aria-controls="translate" aria-selected="false"><i class="fas fa-language"></i> Translate</button>
                                </li>
                                
                            </ul>
                            
                        </div>
                    
                        <!-- Tab panes -->
                        <div class="tab-content  ms-2 me-2 mb-3">

                            <!-- FOR SIMPLIFY -->
                            <div class="tab-pane fade show active" id="simplify" role="tabpanel" aria-labelledby="simplify-tab">
                                <div class="clearfix">
                                    <div class="left-col">
                                        <!-- Title Header Container -->
                                        <div class="title-row">
                                            <div class="row align-items-center">
                                                <h1>Your text</h1>
                                            </div>
                                        </div>                                        
                                        <!-- Textarea -->
                                        <div class="textarea-container position-relative">
                                            <textarea id="ytext"class="form-control" placeholder="Enter or paste text to simplify"></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>

                                            <!-- File Upload Container -->
                                            <div class="file-upload-container mt-3">
                                                <div>
                                                    <input type="file" id="uploadBtnSimplify" accept=".jpeg,.jpg,.png,.pdf,.doc,.docx">
                                                    <label for="uploadBtnSimplify"><i class="fa-solid fa-upload"></i> <br>Upload File</label>
                                                </div>
                                                
                                                <!-- Progress bar for file upload -->
                                                <div class="progress mt-3" style="display: none;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Generate button -->
                                        <div class="generate-container" style="justify-content: space-between; align-items: center; border-radius: 0 0 10px 10px;">
                                            <p style="margin: 20px 0 10px 20px; font-weight: 600; color: #005CD6;"><span id="counter_ytext">0</span>/1000</p>
                                            
                                            <div class="button-group">
                                                <button id="simplifyGenerating" class="btn btn-primary btn-generating" type="button" disabled style="display: none; font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                    <span role="status">Generating...</span>
                                                </button>

                                                <button id="Simplify" class="btn btn-primary btn-generate" style="font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    Generate
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="right-col">
                                        <h1>Simplified Text</h1>
                                        <div class="textarea-container position-relative">
                                            <textarea id="stext"class="form-control" readonly></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- FOR PARAPHRASE -->
                            <div class="tab-pane fade" id="paraphrase" role="tabpanel" aria-labelledby="paraphrase-tab">
                                <div class="clearfix">
                                    <div class="left-col">
                                        <!-- Title Header Container -->
                                        <div class="title-row">
                                            <div class="row align-items-center">
                                                <h1>Your text</h1>
                                            </div>
                                        </div>                                        
                                        <!-- Textarea -->
                                        <div class="textarea-container position-relative">
                                            <textarea id="ytext1"class="form-control" placeholder="Enter or paste text to paraphrase"></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>

                                            <!-- File Upload Container -->
                                            <div class="file-upload-container mt-3">
                                                <div>
                                                    <input type="file" id="uploadBtnParaphrase" accept=".jpeg,.jpg,.png,.pdf,.doc,.docx">
                                                    <label for="uploadBtnParaphrase"><i class="fa-solid fa-upload"></i> <br>Upload File</label>
                                                </div>

                                                <!-- Progress bar for file upload -->
                                                <div class="progress mt-3" style="display: none;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>                                          
                                            </div>
                                        </div>

                                        <!-- Generate button -->
                                        <div class="generate-container" style="justify-content: space-between; align-items: center; border-radius: 0 0 10px 10px;">
                                            <p style="margin: 20px 0 10px 20px; font-weight: 600; color: #005CD6;"><span id="counter_ytext1">0</span>/1000</p>
                                            
                                            <div class="button-group">
                                                <button id="paraphraseGenerating" class="btn btn-primary btn-generating" type="button" disabled style="display: none; font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                    <span role="status">Generating...</span>
                                                </button>

                                                <button id="Paraphrase" class="btn btn-primary btn-generate" style="font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    Generate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="right-col">
                                        <h1>Paraphrased Text</h1>
                                        <div class="textarea-container position-relative">
                                            <textarea id="ptext"class="form-control" readonly></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FOR TRANSLATE -->
                            <div class="tab-pane fade" id="translate" role="tabpanel" aria-labelledby="translate-tab">
                                <div class="clearfix">
                                    <div class="left-col">
                                        <div class="dropdown-lang">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="detectLanguageDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">Detect Language</button>
                                            <ul class="dropdown-menu" id="detectLanguageDropdown" aria-labelledby="detectLanguageDropdownButton">
                                                <input type="text" class="form-control" id="detectLanguageInput" placeholder="Search languages...">
                                                <li><a class="dropdown-item" href="#" value="Tagalog">Filipino</a></li>
                                                <li><a class="dropdown-item" href="#" value="en">English</a></li>
                                                <li><a class="dropdown-item" href="#" value="fr">French</a></li>
                                                <li><a class="dropdown-item" href="#" value="es">Spanish</a></li>
                                                <li><a class="dropdown-item" href="#" value="de">German</a></li>
                                                <li><a class="dropdown-item" href="#" value="it">Italian</a></li>
                                                <li><a class="dropdown-item" href="#" value="pt">Portuguese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ru">Russian</a></li>
                                                <li><a class="dropdown-item" href="#" value="ja">Japanese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ko">Korean</a></li>
                                                <li><a class="dropdown-item" href="#" value="zh">Chinese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ar">Arabic</a></li>
                                                <li><a class="dropdown-item" href="#" value="hi">Hindi</a></li>
                                                <li><a class="dropdown-item" href="#" value="bn">Bengali</a></li>
                                                <li><a class="dropdown-item" href="#" value="tr">Turkish</a></li>
                                                <li><a class="dropdown-item" href="#" value="pl">Polish</a></li>
                                                <li><a class="dropdown-item" href="#" value="nl">Dutch</a></li>
                                                <li><a class="dropdown-item" href="#" value="sv">Swedish</a></li>
                                                <li><a class="dropdown-item" href="#" value="fi">Finnish</a></li>
                                                <li><a class="dropdown-item" href="#" value="cs">Czech</a></li>
                                                <li><a class="dropdown-item" href="#" value="el">Greek</a></li>
                                            </ul>
                                        </div>

                                        <!-- Textarea -->
                                        <div class="textarea-container position-relative">
                                            <textarea id="ytext2" class="form-control" placeholder="Enter or paste text to translate"></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>

                                            <!-- File Upload Container -->
                                            <div class="file-upload-container mt-3">
                                                <div>
                                                    <input type="file" id="uploadBtnTranslate" accept=".jpeg,.jpg,.png,.pdf,.doc,.docx">
                                                    <label for="uploadBtnTranslate"><i class="fa-solid fa-upload"></i> <br>Upload File</label>
                                                </div>

                                                <!-- Progress bar for file upload -->
                                                <div class="progress mt-3" style="display: none;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Generate button -->
                                        <div class="generate-container" style="justify-content: space-between; align-items: center; border-radius: 0 0 10px 10px;">
                                            <p style="margin: 20px 0 10px 20px; font-weight: 600; color: #005CD6;"><span id="counter_ytext2">0</span>/1000</p>
                                            
                                            <div class="button-group">
                                                <button id="translateGenerating" class="btn btn-primary btn-generating" type="button" disabled style="display: none; font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                    <span role="status">Generating...</span>
                                                </button>

                                                <button id="Translate" class="btn btn-primary btn-generate" style="font-weight: 600; border-radius: 14px; margin-left: 10px;">
                                                    Generate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="right-col">
                                        <div class="dropdown-lang">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="chooseLanguageDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">Choose Language</button>
                                            <ul class="dropdown-menu" id="chooseLanguageDropdown" aria-labelledby="chooseLanguageDropdownButton">
                                                <input type="text" class="form-control" id="chooseLanguageInput" placeholder="Search languages...">
                                                <li><a class="dropdown-item" href="#" value="Tagalog">Filipino</a></li>
                                                <li><a class="dropdown-item" href="#" value="en">English</a></li>
                                                <li><a class="dropdown-item" href="#" value="fr">French</a></li>
                                                <li><a class="dropdown-item" href="#" value="es">Spanish</a></li>
                                                <li><a class="dropdown-item" href="#" value="de">German</a></li>
                                                <li><a class="dropdown-item" href="#" value="it">Italian</a></li>
                                                <li><a class="dropdown-item" href="#" value="pt">Portuguese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ru">Russian</a></li>
                                                <li><a class="dropdown-item" href="#" value="ja">Japanese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ko">Korean</a></li>
                                                <li><a class="dropdown-item" href="#" value="zh">Chinese</a></li>
                                                <li><a class="dropdown-item" href="#" value="ar">Arabic</a></li>
                                                <li><a class="dropdown-item" href="#" value="hi">Hindi</a></li>
                                                <li><a class="dropdown-item" href="#" value="bn">Bengali</a></li>
                                                <li><a class="dropdown-item" href="#" value="tr">Turkish</a></li>
                                                <li><a class="dropdown-item" href="#" value="pl">Polish</a></li>
                                                <li><a class="dropdown-item" href="#" value="nl">Dutch</a></li>
                                                <li><a class="dropdown-item" href="#" value="sv">Swedish</a></li>
                                                <li><a class="dropdown-item" href="#" value="fi">Finnish</a></li>
                                                <li><a class="dropdown-item" href="#" value="cs">Czech</a></li>
                                                <li><a class="dropdown-item" href="#" value="el">Greek</a></li>
                                            </ul>
                                        </div>
                                        <div class="textarea-container position-relative">
                                            <textarea id="ttext"class="form-control" readonly></textarea>
                                            <!-- Absolute positioned copy button -->
                                            <button class="btn btn-sm btn-icon position-absolute top-0 end-0 mt-2 me-3">
                                                <i class="fa-solid fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer-buttons mb-4 me-4">
                    <button type="button" class="btn btn-danger" id="resetBtn">Reset</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveEntry">Save Entry</button>
                </div>
            </div>
        </div>

        <div class="toast-empty-textarea">
            <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="./logo/symbol_blue.png" class="rounded me-2 logo-img-toast" alt="...">
                        <strong class="me-auto">Insightify</strong>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Enter text before generating.
                    </div>
                </div>
            </div>
        </div>
        
    </div>


        <!-- MODAL POPUP FOR SAVE ENTRY --> 
        <div class="modal fade" id="saveEntry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
        
                    <div class="modal-header bg-primary text-light  ">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Save Entry</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
        
                    <div class="modal-body pt-5 ps-5 pe-5 pb-3">
                            <h1>Provide entry details</h1>
                            <hr>

                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-12">
                                    <label for="validationEntryName" class="form-label"><b>entry name</b></label>
                                    <input type="text" class="form-control" id="validationEntryName" required>
                                    <div class="invalid-feedback">
                                                Please enter a name.
                                                </div>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="validationSelectTitle" class="form-label"><b>select title</b></label>
                                        <div class="row">
                                            <div class="col-11">
                                                <select id="titles"class="form-select" id="validationSelectTitle" required>
                                                <option selected disabled value="">Choose from existing titles</option>
                                                <?php include('./save_entry_title.php'); ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                Please choose from your existing titles.
                                                </div>
                                            </div>

                                            <div class="col-1">
                                                <button class="add_title">
                                                    <i class="fa-solid fa-notes-medical fa-xl " style="color: white;" onclick="window.location.href='collection.php'"></i>
                                                </button>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="col-12">
                                    <label for="validationPage" class="form-label"><b>page</b></label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="validationPage" aria-describedby="inputGroupPrepend" placeholder="optional">
                                    </div>
                                </div>

                                <div class="modal-footer-button mt-4">
                                    <button class="btn btn-primary" type="submit">Finish</button>
                                </div>
                            </form>

                            
                        </div>

                    
                </div>
            </div>
        </div>



        <!-- ENTRY SAVED POPUP -->
        <div class="modal fade" id="entry-saved-popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content entry-saved">
                    <div class="modal-body">
                        <i class="fas fa-check-circle fa-2x checkmark-animation mt-3"></i>
                        <h1>Entry successfully <br> saved!</h1>
                        <button type="button" id="exit-saved" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Exit" onclick=" window.location.href = './entries.php'">Okay</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- CITE POPUP -->
        <div class="modal fade modal-xl" id="cite-popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cite source</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body pt-4 pb-4 ps-5 pe-5">

                    <div class="source-style">
                        <div class="row align-items-start">
                            <div class="col">
                                <label for="source-type" class="form-label"><b>select source</b></label>
                                <select class="form-select" required aria-label="select example">
                                    <option selected>Website</option>
                                    <option value="1">Thesis</option>
                                    <option value="2">Journal</option>
                                    <option value="3">Book</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="source-type" class="form-label"><b>select style</b></label>
                                <select class="form-select" required aria-label="select example">
                                    <option selected>APA 7</option>
                                    <option value="1">IEEE</option>
                                    <option value="2">MLA</option>
                                    <option value="3">APA 6</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="preview-container mt-3 position-relative">
                        <label for="preview" class="form-label"><b>preview</b></label>
                        <input class="form-control" type="text" value="Citation preview here" aria-label="readonly input example" readonly id="previewInput">
                        <button class="copy-button" onclick="copyText()">
                            <i class="fas fa-copy"></i> 
                        </button>
                    </div>

                    <div class="header-divider mt-5">
                        <div class="row align-items-center">  
                            <div class="col-auto">   
                                <h2>Contributor</h2>
                            </div>
                            <div class="col d-flex align-items-center">
                                <hr style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="author mt-5">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <p>Author</p>
                            </div>

                            <div class="col-4">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                            </div>

                            <div class="col-4">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                            </div>

                            <div class="col-1">
                                <button>+</button>
                            </div>
                        </div>
                    </div>


                    <div class="header-divider mt-5">
                        <div class="row align-items-center">  
                            <div class="col-auto">   
                                <h2>Title / Page</h2>
                            </div>
                            <div class="col d-flex align-items-center">
                                <hr style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="title-details mt-5">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <p>Date Published</p>
                            </div>

                            <div class="col-4">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
                            </div>

                            <div class="col-2">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="MM">
                            </div>

                            <div class="col-2">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="DD">
                            </div>

                            <div class="col-1">
                                <button>Today</button>
                            </div>
                        </div>

                        <div class="row align-items-center mt-2">
                            <div class="col-3">
                                <p>Title of Article/Page</p>
                            </div>

                            <div class="col-9">
                                <input type="name" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                    </div>

                    <div class="header-divider mt-5">
                        <div class="row align-items-center">  
                            <div class="col-auto">   
                                <h2>Website</h2>
                            </div>
                            <div class="col d-flex align-items-center">
                                <hr style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="website-details mt-5">
                        <div class="row align-items-center mt-2">
                            <div class="col-3">
                                <p>Website Name</p>
                            </div>

                            <div class="col-9">
                                <input type="name" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>

                        <div class="row align-items-center mt-2">
                            <div class="col-3">
                                <p>Publisher</p>
                            </div>

                            <div class="col-9">
                                <input type="name" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>

                        <div class="row align-items-center mt-2">
                            <div class="col-3">
                                <p>URL</p>
                            </div>

                            <div class="col-9">
                                <input type="name" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>

                        <div class="row align-items-center mt-2">
                            <div class="col-3">
                                <p>Date Accessed</p>
                            </div>

                            <div class="col-4">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="YYYY">
                            </div>

                            <div class="col-2">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="MM">
                            </div>

                            <div class="col-2">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="DD">
                            </div>

                            <div class="col-1">
                                <button>Today</button>
                            </div>
                        </div>

                        <div class="save-btn-container">
                            <button type="button" class="cite-save mt-3 mb-3" data-bs-dismiss="modal" aria-label="Close">Save</button>
                        </div>
                        
                    </div>

                </div>
                
            </div>
            </div>
        </div>
        <!-- END OF CITE POPUP -->

<script src="https://cdn.jsdelivr.net/npm/tesseract.js@4.1.1/dist/tesseract.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const saveEntryModal = new bootstrap.Modal(document.getElementById('saveEntry'));
    const entrySavedModal = new bootstrap.Modal(document.getElementById('entry-saved-popup'));

    const saveEntryForm = document.querySelector('#saveEntry form');


    let isSubmitting = false;

    saveEntryForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
 
        // Prevent multiple submissions
        if (isSubmitting) {
            return;
        }
        isSubmitting = true;

        // Get the submit button
        const submitButton = saveEntryForm.querySelector('button[type="submit"]');

        if (saveEntryForm.checkValidity()) {
            // Disable the submit button to prevent multiple submissions
            submitButton.disabled = true;

            // Hide the modal and save the entry
            saveEntryModal.hide();
            SaveEntry(entrySavedModal).finally(() => {
                // Re-enable the submit button and reset the flag after saving is complete
                submitButton.disabled = false;
                isSubmitting = false;
            });
        } else {
            saveEntryForm.classList.add('was-validated');
            isSubmitting = false;
        }
    });

    document.getElementById('exit-saved').addEventListener('click', function() {
        entrySavedModal.hide();
    });

    entrySavedModal._element.addEventListener('hidden.bs.modal', function () {
        document.querySelector('.modal-backdrop').remove();
    });

    document.getElementById('resetBtn').addEventListener('click', function () {
        const tabPane = document.querySelector('.tab-pane.active');
        if (tabPane) {
            // Reset the left column textarea
            const leftTextarea = tabPane.querySelector('.textarea-container textarea');
            if (leftTextarea) {
                leftTextarea.value = '';
                const fileUploadContainer = leftTextarea.closest('.tab-pane').querySelector('.file-upload-container');
                if (fileUploadContainer) {
                    fileUploadContainer.style.display = 'block';
                    const fileUploadInput = fileUploadContainer.querySelector('input[type="file"]');
                    if (fileUploadInput) {
                        fileUploadInput.value = '';
                    }
                }
                const generateButton = tabPane.querySelector('.btn-generate');
                updateTextArea(leftTextarea, generateButton);
            }

            // Reset the right column textarea
            const rightTextarea = tabPane.querySelector('.right-col textarea');
            if (rightTextarea) {
                rightTextarea.value = '';
                updateTextArea(rightTextarea);
            }

            // Reset progress bar if present
            const progressBar = tabPane.querySelector('.progress .progress-bar');
            if (progressBar) {
                progressBar.style.width = '0%';
                progressBar.setAttribute('aria-valuenow', '0');
            }

            // Reset UI elements
            const generateButton = tabPane.querySelector('.btn-generate');
            const generatingButton = tabPane.querySelector('.btn-generating');
            if (generateButton) {
                generateButton.style.display = 'block';
                generateButton.disabled = false; // Enable generate button
            }
            if (generatingButton) {
                generatingButton.style.display = 'none';
            }
        }
    });

    document.querySelectorAll('input[type="file"]').forEach(input => {
        const parentDiv = input.closest('.tab-pane');
        const outputTextarea = parentDiv.querySelector('textarea.form-control');
        const progressBar = parentDiv.querySelector('.progress');

        input.addEventListener('change', () => {
            handleFileUpload(input, outputTextarea, progressBar);
            handleTextareaChange(outputTextarea); // Handle textarea change after file upload
        });
    });

    function handleFileUpload(input, outputTextarea, progressBar) {
        const file = input.files[0];
        if (!file) return;

        const generateButton = input.closest('.tab-pane').querySelector('.btn-generate');
        progressBar.style.display = 'block';

        const reader = new FileReader();

        reader.onload = function (e) {
            const progressDiv = progressBar.querySelector('.progress-bar');

            if (file.type.startsWith("image/")) {
                Tesseract.recognize(
                    e.target.result,
                    'eng', 
                    {
                        logger: (m) => {
                            progressDiv.style.width = m.progress * 100 + "%";
                        }
                    }
                ).then(({ data: { text } }) => {
                    outputTextarea.value = text;
                    updateTextArea(outputTextarea, generateButton); // Update counter
                }).catch(err => {
                    outputTextarea.value = "Error in processing image.";
                    console.error(err);
                }).finally(() => {
                    progressBar.style.display = 'none';
                });
            } else if (file.type === "application/pdf") {
                const loadingTask = pdfjsLib.getDocument({ data: e.target.result });
                loadingTask.promise.then(pdf => {
                    let textContent = '';
                    const totalPages = pdf.numPages;

                    const renderPage = pageNum => {
                        pdf.getPage(pageNum).then(page => {
                            page.getTextContent().then(textContentObj => {
                                textContentObj.items.forEach(item => {
                                    textContent += item.str + ' ';
                                });
                                if (pageNum < totalPages) {
                                    renderPage(pageNum + 1);
                                } else {
                                    outputTextarea.value = textContent;
                                    updateTextArea(outputTextarea, generateButton); // Update counter
                                    progressBar.style.display = 'none';
                                }
                            });
                        });
                    };

                    renderPage(1);
                }).catch(err => {
                    outputTextarea.value = "Error in processing PDF.";
                    console.error(err);
                    progressBar.style.display = 'none';
                });
            } else if (file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ||
                    file.type === "application/msword") {
                mammoth.extractRawText({ arrayBuffer: e.target.result })
                    .then(result => {
                        outputTextarea.value = result.value;
                        updateTextArea(outputTextarea, generateButton); // Update counter
                    })
                    .catch(err => {
                        outputTextarea.value = "Error in processing Word document.";
                        console.error(err);
                    })
                    .finally(() => {
                        progressBar.style.display = 'none';
                    });
            } else {
                outputTextarea.value = "Unsupported file type.";
                progressBar.style.display = 'none';
            }
        };

        reader.onerror = function (error) {
            console.error('Error reading file:', error);
            outputTextarea.value = "Error reading the file.";
            progressBar.style.display = 'none';
        };

        if (file.type.startsWith("image/")) {
            reader.readAsDataURL(file);
        } else if (file.type === "application/pdf" || 
                file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || 
                file.type === "application/msword") {
            reader.readAsArrayBuffer(file);
        } else {
            outputTextarea.value = "Unsupported file type.";
            progressBar.style.display = 'none';
        }
    }


    function filterDropdownItems(inputId, dropdownId) {
        const input = document.getElementById(inputId);
        const filter = input.value.toLowerCase();
        const dropdown = document.getElementById(dropdownId);
        const items = dropdown.getElementsByClassName('dropdown-item');

        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const textValue = item.textContent || item.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        }
    }

    document.getElementById('detectLanguageInput').addEventListener('keyup', function() {
        filterDropdownItems('detectLanguageInput', 'detectLanguageDropdown');
    });

    document.getElementById('chooseLanguageInput').addEventListener('keyup', function() {
        filterDropdownItems('chooseLanguageInput', 'chooseLanguageDropdown');
    });

    document.querySelectorAll('#detectLanguageDropdown .dropdown-item').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            let selectedText = this.textContent.trim();
            document.getElementById('detectLanguageDropdownButton').textContent = selectedText;
        });
    });

    document.querySelectorAll('#chooseLanguageDropdown .dropdown-item').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            let selectedText = this.textContent.trim();
            document.getElementById('chooseLanguageDropdownButton').textContent = selectedText;
        });
    });


    // Function to handle changes in textarea content
    function handleTextareaChange(textarea, fileUploadContainer) {
        if (textarea.value.trim().length > 0) {
            fileUploadContainer.style.display = 'none'; // Hide file upload container
        } else {
            fileUploadContainer.style.display = 'block'; // Show file upload container
        }
    }

    // Iterate over each tab-pane (each file upload section)
    document.querySelectorAll('.tab-pane').forEach(tabPane => {
        const textarea = tabPane.querySelector('textarea'); // Find the textarea in this tab-pane
        if (textarea) {
            const fileUploadContainer = tabPane.querySelector('.file-upload-container'); // Find the file upload container in this tab-pane
            const fileUploadInput = tabPane.querySelector('input[type="file"]'); // Find the file upload input in this tab-pane

            // Initial check on page load
            handleTextareaChange(textarea, fileUploadContainer);

            // Add input event listener to textarea
            textarea.addEventListener('input', function () {
                handleTextareaChange(textarea, fileUploadContainer);
            });

            // If there is already initial text in textarea on page load
            if (textarea.value.trim().length > 0) {
                fileUploadContainer.style.display = 'none'; // Hide file upload container
            } else {
                fileUploadContainer.style.display = 'block'; // Show file upload container
            }

            // Also handle the scenario when file is uploaded, and textarea content is changed due to that
            fileUploadInput.addEventListener('change', function () {
                handleTextareaChange(textarea, fileUploadContainer);
                fileUploadContainer.style.display = 'none';
            });
        }
    });

    const textAreas = [
        { textarea: 'ytext', counter: 'counter_ytext' },
        { textarea: 'ytext1', counter: 'counter_ytext1' },
        { textarea: 'ytext2', counter: 'counter_ytext2' }
    ];

    textAreas.forEach(({ textarea, counter }) => {
        const textAreaElement = document.getElementById(textarea);
        const counterElement = document.getElementById(counter);

        textAreaElement.addEventListener('input', () => {
            updateTextArea(textAreaElement);
        });
    });

    // Get all copy buttons
    const copyButtons = document.querySelectorAll('.btn-icon');

    copyButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Get the related textarea
            const textarea = button.closest('.textarea-container').querySelector('textarea');

            if (textarea) {
                // Copy the text to clipboard
                copyTextToClipboard(textarea.value, button);
            }
        });
    });
    const addTitleModal = new bootstrap.Modal(document.getElementById('addTitle'));
    const titleSavedModal = new bootstrap.Modal(document.getElementById('title-saved-popup'));
  
    // Form submission handling for addTitleModal
    const addTitleForm = document.querySelector('#addTitle form');
  
    addTitleForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
  
        if (addTitleForm.checkValidity()) {
            // Form is valid, proceed to hide addTitle modal
            addTitleModal.hide();
            titleSavedModal.show();
              AddTitle(titleSavedModal);
            // Simulate saving process with timeout (adjust as needed)
        } else {
            // Form is invalid, show validation feedback
            addTitleForm.classList.add('was-validated');
        }
    });
  
    // Close button for titleSavedModal
    document.getElementById('exit-saved').addEventListener('click', function() {
        titleSavedModal.hide();
    });
  
    // Remove modal backdrop on hide
    titleSavedModal._element.addEventListener('hidden.bs.modal', function () {
        document.querySelector('.modal-backdrop').remove();
    });
});

const generateButtons = document.querySelectorAll('.btn-generate');

generateButtons.forEach(button => {
    // Remove any existing event listeners
    button.removeEventListener('click', handleGenerateClick);
    // Add event listener with handleGenerateClick function
    button.addEventListener('click', handleGenerateClick);
});

function handleGenerateClick(event) {
const button = event.currentTarget;
const tabPane = button.closest('.tab-pane');
const textarea = tabPane.querySelector('textarea');

if (!textarea.value.trim()) {
    const toast = new bootstrap.Toast(document.getElementById('liveToast'));
    showToast('Enter text to process', 'error');
} else {
    // Add your generate logic here
    const generatingButton = tabPane.querySelector('.btn-generating');
    button.style.display = 'none';
    generatingButton.style.display = 'block';

    GenerateResponse(button.id, button, generatingButton);
}
}
    function GenerateResponse(Choice, generateButton, generatingButton) {
        let prompt_text = '';
        let language = '';
        let language2 = '';

        if (Choice == "Simplify") {
            prompt_text = document.getElementById("ytext").value;
        } else if (Choice == "Paraphrase") {
            prompt_text = document.getElementById("ytext1").value;
        } else if (Choice == "Translate") {
            language = document.getElementById("detectLanguageDropdownButton").textContent;
            prompt_text = document.getElementById("ytext2").value;
            language2 = document.getElementById("chooseLanguageDropdownButton").textContent;
        }

        // Hide generate button and show generating button
        generateButton.style.display = "none";
        generatingButton.style.display = "block";

        $.ajax({
            type: 'POST',
            url: 'generate.php',
            data: {
                option: Choice,
                text: prompt_text,
                language: language,
                language2: language2,
            },
            success: function (response) {
                if (response.status === 'success') {
                    if (Choice == "Simplify") {
                        document.getElementById("stext").value = response.data;
                    } else if (Choice == "Paraphrase") {
                        document.getElementById("ptext").value = response.data;
                    } else if (Choice == "Translate") {
                        document.getElementById("ttext").value = response.data;
                    }
                } else if (response.status === 'error') {
                    if (Choice == "Simplify") {
                        document.getElementById("stext").value = response.message || "Error Simplifying. Try again.";
                    } else if (Choice == "Paraphrase") {
                        document.getElementById("ptext").value = response.message || "Error Paraphrasing. Try again.";
                    } else if (Choice == "Translate") {
                        document.getElementById("ttext").value = response.message || "Error Translating. Try again.";
                    }
                }

                // Show generate button and hide generating button
                generateButton.style.display = "block";
                generatingButton.style.display = "none";
            },
            error: function () {
                // Handle error (optional)

                // Show generate button and hide generating button
                generateButton.style.display = "block";
                generatingButton.style.display = "none";
            }
        });
    }


    added = false;
    function SaveEntry(entrySavedModal){
        const activeTab = document.querySelector('.nav-link.active');
        if (activeTab) {
            const tabId = activeTab.getAttribute('data-bs-target');
            const title_id =document.getElementById('titles').value;
            const page = document.getElementById('validationPage').value;
            const entry_name =document.getElementById('validationEntryName').value;
            var option = `${tabId}`;
            if(option == "#simplify"){
                var entry_text = document.getElementById("ytext").value;
                var generated_text = document.getElementById("stext").value;
            }
            else if (option == "#paraphrase"){
                var entry_text = document.getElementById("ytext1").value;
                var generated_text = document.getElementById("ptext").value;
            }
            else if (option == "#translate"){
                var entry_text = document.getElementById("ytext2").value;
                var generated_text = document.getElementById("ttext").value;
            } 
        if(added == false){
            added = true;
            $.ajax({
                    type: 'POST',
                    url: './add_entry.php',
                    dataType:'json',
                    data: {
                        feature_chosen: option,
                    text_scanned: entry_text,
                        text_generated: generated_text,
                        page: page,
                        title_id: title_id,
                        entry_name: entry_name,
                    },
                    success: function (response) {
                        alert(response);
                    }

                })
        }
        if(added == true){
            entrySavedModal.show();
        }
        } else {
            console.log('No active tab found.');
        }

    }

    function updateTextArea(textAreaElement) {
        let text = textAreaElement.value;

        // Limit the text length to 1000 characters
        if (text.length > 1000) {
            text = text.substring(0, 1000);
            textAreaElement.value = text;
        }

        // Update the character count
        const counterElement = document.getElementById('counter_' + textAreaElement.id);
        if (counterElement) {
            counterElement.innerText = text.length;
        }
    }

    function copyTextToClipboard(text, button) {
        if (!navigator.clipboard) {
            // Fallback for browsers without clipboard API
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(() => {
            // Successful copy
            showToast('Text copied to clipboard', 'success');
            // Change button icon or display feedback
            button.innerHTML = '<i class="fa-solid fa-check"></i>';
            setTimeout(() => {
                button.innerHTML = '<i class="fa-solid fa-copy"></i>';
            }, 2000); // Reset the icon after 2 seconds
        }, (err) => {
            // Error during copy
            console.error('Could not copy text: ', err);
            showToast('Failed to copy text', 'error');
        });
    }

    function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        // Avoid scrolling to bottom
        textArea.style.position = "fixed";
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.width = "2em";
        textArea.style.height = "2em";
        textArea.style.padding = "0";
        textArea.style.border = "none";
        textArea.style.outline = "none";
        textArea.style.boxShadow = "none";
        textArea.style.background = "transparent";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
            showToast('Text copied to clipboard', 'success');
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
            showToast('Failed to copy text', 'error');
        }
        document.body.removeChild(textArea);
    }

    function showToast(message, type) {
        const toastEl = document.getElementById('liveToast');
        const toastBody = toastEl.querySelector('.toast-body');
        toastBody.textContent = message;

        // Set toast type for styling (you can customize this as needed)
        if (type === 'success') {
            toastEl.classList.remove('toast-error');
            toastEl.classList.add('toast-success');
        } else {
            toastEl.classList.remove('toast-success');
            toastEl.classList.add('toast-error');
        }

        // Show the toast
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
