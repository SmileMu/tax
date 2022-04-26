<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدفع الالكتروني</title>
</head>
<body>
    

<form class="form"
                          action="{{route('accounts.show')}}"
                          method="POST"
                          enctype="multipart/form-data">


                            
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> رقم الحساب </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="   " required type="text">
                           

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 

</body>
</html>