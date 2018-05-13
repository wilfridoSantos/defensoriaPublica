$("#fileToUpload").change(function(){
    $("butonUpdate").prop("disabled", this.files.length == 0);
});