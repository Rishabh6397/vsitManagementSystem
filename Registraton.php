<?php 
  // connection 
  include('connection.php');
  //Query for getting all the course 
  $query = mysqli_query($conn,"SELECT * FROM course") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/java.js"> </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="js/jquery.js"></script>
</head>

<body>
    <div class="container-fluid p-4 cont-1 animate__animated animate__fadeInDown">

        <div class="row">
            <div class="col-lg-6 animate__animated animate__fadeInUp" id="imgs"><img src="./image/banner-1.png" width="100%" height="100%"></div>
            <div class="col-lg-4 offset-sm-1 mt-3 p-4   bg-white ">
                <h1 class="text-center cnt  ">Addmission panel</h1>
                <form>
                    <div class="mb-3">
                        <label class="form-label"> Student Name</label>
                        <input type="text" class="form-control " required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Roll no</label>
                        <input type="text" class="form-control " required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control  " required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control " required>

                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-4"><label class="form-label">Course</label>
                                <select class="form-select "  id="courseSelect" aria-label="Default select exampl">
                                <option selected>select Course</option>
                                    <?php foreach($query as $value){?>
                                    <option value="<?php echo $value['course_name'];?>"><?php echo $value['course_name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-3"> <label class="form-label ">Fee</label>
                                <input type="text" id="totalFee" class="form-control">
                            </div>
                            <div class="col-lg-5">

                                <label class="form-label ">Upload photo</label>
                                <input type="file" class="form-control" required>

                            </div>
                        </div>
                    </div>


                    <div class="mb-3">

                        <label class="form-label">Address</label>
                        <textarea type="text" class="form-control "></textarea>



                    </div>

                    <div class="btn mt-4 bg-info  w-50">Submit</div>

                </form>


            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script type="text/javascript">
       $(document).on("change","#courseSelect",function(){
            var value = this.value;
   
            $.ajax({
                 url:"assignfee.php?courseName="+value,
                 method:"post",
                 success:function(result){
                      // here we passing the data //
                      $("#totalFee").val(result);

                 } 
            })
       })

    </script>
  


</html>