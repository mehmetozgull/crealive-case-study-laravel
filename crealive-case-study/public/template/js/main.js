$(function () {
    $("#blog-thumb").change(function() {
        $(".thumbnail-preview").css("display","block")
        readURL(this)
    })
})
function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#thumbnailImagePreview').css('background-image', 'url('+e.target.result +')')
            $('#thumbnailImagePreview').hide()
            $('#thumbnailImagePreview').fadeIn(650)
        }
        reader.readAsDataURL(input.files[0])
    }
}
