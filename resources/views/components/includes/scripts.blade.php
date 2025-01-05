<!-- AlpineJs -->
{{-- <script defer src="https://unpkg.com/alpinejs-scroll-to@latest/dist/scroll-to.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>


<!-- TinyMce text editor -->
<script src="https://cdn.tiny.cloud/1/sf3v8brui9qeos4y6ecrhrnppajr5cszu1v1fee179mgim23/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#tinyMCETextArea', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists link image',
        toolbar: 'undo redo | link | image | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        // formats: {
        //     // bold : {inline : 'b' },  
        //     italic : {inline : 'i' },
        //     //underline : {inline : 'u'}
        // },
    });
</script>