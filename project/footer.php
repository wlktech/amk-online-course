    
    
    
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
    <!-- <script>
        $(document).ready(function () {
            $("#all").click(function (e) { 
                e.preventDefault();
                $("#all").addClass("touch");
                $("#total").removeClass("touch");
                $("#avg").removeClass("touch");
                $("#min").removeClass("touch");
                $("#max").removeClass("touch");
            });
            $("#total").click(function (e) { 
                e.preventDefault();
                $("#all").removeClass("touch");
                $("#total").addClass("touch");
                $("#avg").removeClass("touch");
                $("#min").removeClass("touch");
                $("#max").removeClass("touch");
            });
            $("#avg").click(function (e) { 
                e.preventDefault();
                $("#all").removeClass("touch");
                $("#total").removeClass("touch");
                $("#avg").addClass("touch");
                $("#min").removeClass("touch");
                $("#max").removeClass("touch");
            });
            $("#min").click(function (e) { 
                e.preventDefault();
                $("#all").removeClass("touch");
                $("#total").removeClass("touch");
                $("#avg").removeClass("touch");
                $("#min").addClass("touch");
                $("#max").removeClass("touch");
            });
            $("#max").click(function (e) { 
                e.preventDefault();
                $("#all").removeClass("touch");
                $("#total").removeClass("touch");
                $("#avg").removeClass("touch");
                $("#min").removeClass("touch");
                $("#max").addClass("touch");
            });
        });
    </script> -->
    <script>
        $(document).ready(function () {
            $('.updateCategory').click(function(){
                $id = $(this).data('id');
                $name = $(this).data('name');
                $('#category_name').val($name);
                $('#id').val($id)
                $('#update').modal('show');
            
            })
        });
    </script>
    
  </body>
</html>