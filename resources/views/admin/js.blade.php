<script type="text/javascript">

        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect); 


            swal({

                title:"Are your sure you want to delete this?",
                text: "This delete will be permanent", 
                icon: "warning",
                buttons: true,
                dangerMode:true,

            })
.then((willCancel)=>{
    if(willCancel){
        window.location.href=urlToRedirect;
    }

     


});
}
    </script>