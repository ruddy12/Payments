Actually, you are good to go. Just handle the data in a db or something. This is what I see when I cURL your callback:
curl -v -X POST -H "Content-Type: application/json" -d '{                                                                    
>   "category":"test-mobile-checkout-data",
>   "status":"success",
>   "phoneNumber": "+254722000000",
>   "amount":"KES 200.00"
> }' "http://41.139.138.45/web/blog/notification.php"
Note: Unnecessary use of -X or --request, POST is already inferred.
*   Trying 41.139.138.45...
* Connected to 41.139.138.45 (41.139.138.45) port 80 (#0)
> POST /web/blog/notification.php HTTP/1.1
> Host: 41.139.138.45
> User-Agent: curl/7.47.0
> Accept: */*
> Content-Type: application/json
> Content-Length: 193
> 
* upload completely sent off: 193 out of 193 bytes
< HTTP/1.1 200 OK
< Date: Thu, 06 Apr 2017 14:56:22 GMT
< Server: Apache/2.2.15 (CentOS)
< X-Powered-By: PHP/5.6.27
< Content-Length: 2300
< Connection: close
< Content-Type: text/html; charset=UTF-8
< 
<!DOCTYPE html>
<html>
<head>
  <title>POST JOB</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet">
<link href="css/site.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5.css">

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="css/updateprofile.css">
     <!--link href="css/editors.css" rel="stylesheet"-->
          <style type="text/css">
          .post_jobs{
   height: auto;
  width: 100%;
  padding: 40px 0;
  overflow: hidden;
  color: black;
 /*background-image: url("https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRWX6JKymovdy82Lsj0loepdN_dYNayblulZNvC5BCgH3AO3pRK");*/
}
     </style>
</head>
  <body data-spy="scroll" data-target="#uxt" data-offset="70" class="jumbotron">
<div class="table-scrol">
  <div class="table-responsive">
    <table class="table  table-hover table-striped" style="table-layout:fixed">
      <thead>
        <tr class="success">
         <th>phoneNumber</th>
         <th>value</th>
         <th> Account </th>
         <th>provider </th>
         <th>ProductName </th>
         <th>TransactionID</th>

      </thead>
Array
(
    [category] => test-mobile-checkout-data
    [status] => success
    [phoneNumber] => +254722000000
    [amount] => KES 200.00
)
<center><h2 class='text-danger'>No Response and notifications from Africa Talking's end </h2></center> 
      
         </div>
    </div><!--post-->
  </div><!--panel-->
</body>
Closing connection 0