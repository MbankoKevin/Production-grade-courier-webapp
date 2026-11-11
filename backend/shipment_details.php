<div class="container">
    <div class="row">


    
    <?php include 'conn.php'; ?>

<?php
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $name = $_POST['term'];

    if (empty($name)) {
        echo '<div class="alert alert-danger">
                <strong>Failed!</strong> Tracking Id Cannot Be Empty.
              </div>';
    } else {
        $sql = "SELECT * FROM track WHERE ship_id LIKE '%$name%'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Tracking ID: " . htmlspecialchars($row['ship_id']) . "</p>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
}
?>
<h3 align="center">Tracking information for tracking number <?php echo $row["ship_id"] ?? '' ?></h3>
                    <div class="col-md-6">
                        <h3 align="center">RECEIVERS DETAILS</h3><br>
                        <div class="table-responsive">
                            <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">
                                <tbody>
                                    <tr>
                                        <td>
                                           <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> NAME:</b></a> </div>
                                       </td> 
                                       <td style="color: #fff; text-transform: uppercase;"><?php echo isset($row["jname"]) ?? '' ?></td>
                                   </tr>
                                   <tr>
                                    <tr>
                                        <td>
                                           <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> ADDRESS:</b></a> </div>
                                       </td>
                                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jadd"] ?? '' ?></td>
                                   </tr>
                                   <tr>
                                    <td>
                                       <div class="contact-container"><a href="#" style="color: #000;"><b>RECEIVERS <br> COUNTRY:</b></a> </div>
                                   </td>
                                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jcountry"] ?? '' ?></td>

                               </tr>
                               <tr>
                                <td>
                                   <div class="contact-container"><a href="#" style="color:#000;"><b>RECEIVERS <br> Number:</b></a> </div>
                               </td>
                               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jnumber"] ?? '' ?></td>

                           </tr>
                           <tr>
                            <td>
                               <div class="contact-container"><a href="#" style="color:#000;"><b>RECEIVERS <br> Email:</b></a> </div>
                           </td>
                           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["jemail"] ?? '' ?></td>

                       </tr>

                   </tbody>
               </table>
           </div><br>
       </div>

       <div class="col-md-6">
        <h3 align="center">SENDER's DETAILS</h3><br>
        <div class="table-responsive">
            <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

                <tbody>
                    <tr>
                        <td>
                           <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> NAME:</b></a> </div>
                       </td> 
                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["sname"] ?? '' ?></td>

                   </tr>
                   <tr>

                    <tr>
                        <td>
                           <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> ADDRESS:</b></a> </div>
                       </td>
                       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["sadd"] ?? '' ?></td>

                   </tr>
                   <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> COUNTRY:</b></a> </div>
                   </td>
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["scountry"] ?? '' ?></td>

               </tr>
               <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> Number:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["snumber"] ?? '' ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>SENDER'S <br> Email:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["semail"] ?? '' ?></td>

       </tr>

   </tbody>
</table>
</div><br>
</div>

<div class="col-md-6">
  <h3 align="center">SHIPMENT DETAILS</h3><br>
  <div class="table-responsive">
    <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

        <tbody>
            <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>TRANSPORTATION <br> MODE:</b></a> </div>
               </td> 
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["mode"] ?? '' ?></td>

           </tr>
           <tbody>
            <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>Shipment Carrier: <br></b></a> </div>
               </td> 
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["carrier"] ?? '' ?></td>

           </tr>
           <tr>

            <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>PRODUCT <br> NAME:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["prod"] ?? '' ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>TRACKING<br> NUMBER:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["ship_id"] ?? '' ?></td>

       </tr>
       <tr>
        <td>
           <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY <br> STATUS:</b></a> </div>
       </td>
       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["deliverys"] ?? '' ?></td>

   </tr>
   <tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> DESCRIPTION:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["descrip"] ?? '' ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>DEPARTURE TIME:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["Ship_time"] ?? '' ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY TIME:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["dtime"] ?? '' ?></td>

</tr>
</tbody>
</table>
</div><br>
</div>
<div class="col-md-6">
    <h3 align="center">PACKAGE DETAILS</h3><br>
    <div class="table-responsive">
        <table class="table table-clean-paddings margin-bottom-0" style="background-color: #7c7c7c">

            <tbody>
                <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE CURRENT  <br> LOCATION:</b></a> </div>
                   </td> 
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["currentl"] ?? '' ?></td>

               </tr>
               <tr>

                <tr>
                    <td>
                       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE PICKUP <br> LOCATION:</b></a> </div>
                   </td>
                   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["pickupl"] ?? '' ?></td>

               </tr>
               <tr>
                <td>
                   <div class="contact-container"><a href="#" style="color: #000;"><b>DEPARTURE<br> DATE:</b></a> </div>
               </td>
               <td style="color: #fff; text-transform: uppercase;"><?php echo $row["Ship_date"] ?? '' ?></td>

           </tr>
           <tr>
            <td>
               <div class="contact-container"><a href="#" style="color: #000;"><b>DELIVERY <br> DATE:</b></a> </div>
           </td>
           <td style="color: #fff; text-transform: uppercase;"><?php echo $row["ddate"] ?? '' ?></td>

       </tr>
       <tr>
        <td>
           <div class="contact-container"><a href="#" style="color: #000;"><b>QUANTITY <br> SHIPPED:</b></a> </div>
       </td>
       <td style="color: #fff; text-transform: uppercase;"><?php echo $row["items"] ?? '' ?></td>

   </tr>
   <tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>PACKAGE <br> WEIGHT:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["weight"] ?? '' ?></td>

</tr>

<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> CATRGORY:</b></a> </div>
   </td>
   <td style="color: #fff; text-transform: uppercase;"><?php echo $row["cat"] ?? '' ?></td>

</tr>
<tr>
    <td>
       <div class="contact-container"><a href="#" style="color: #000;"><b>SHIPMENT <br> STATUS:</b></a> </div>
   </td>
   <td class="blink_me" style="color: red; text-transform: uppercase; font-weight: bolder;"><?php echo $row["status"] ?? '' ?></td>

</tr>
</tbody>
</table>
</div><br>
</div>
<br><br>
<h1 align="center"><a href="map.php?id=<?php echo $row["track_id"]; ?>">View Map Here</a></h1>
<!-- <h1 align="center"><a href="#">View Map Here</a></h1> -->
