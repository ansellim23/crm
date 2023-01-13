<html>
<head>
    <style type='text/css'>
        body {font-family: Verdana, Geneva, sans-serif}
    </style>
</head>
<body>
<div style="border: 5px double #ada2a2; padding:10px; 10px">
    <?php echo " <p>Hi ".$employee_name.",</p></br></br>". $this->session->userdata['userlogin']['usertype'] == 'Manager' ? $travel_remarks : $hr_remarks."</br><p>Kindly, Please click this link to view of your requested form: ".$link."";?>;
    <div style="margin: 30px 0px 0px 0px">
    <p style="color:#6d5d5d;">Sincerely,</p>
    <h2 style="line-height:30px; color: #f73e3e; font-weight: 200;" ><?php echo $this->session->userdata['userlogin']['real_name'];?></h2>
    <p style="line-height:10px;"><b><?php echo $this->session->userdata['userlogin']['usertype'];?></b></p>   
    </div>
     <img src="https://hlmcrm.site/images/logodashboard7.png" alt="Better Bound Image" title="Better Bound House" width="150" height="150">
    <p><b>Better Bound House</b></p>   
    <p style="font-size:13px;">Email: <a href="mailto:<?php echo $this->session->userdata['userlogin']['emailaddress'];?>"><?php echo $this->session->userdata['userlogin']['emailaddress'];?></a></p>
    <p style="font-size:13px;">Website: <a href="https://betterboundhouse.com/">Better Bound House</a></p>
</div>
</body>
</html>