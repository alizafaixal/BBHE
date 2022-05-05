<?php
require_once('dbConn.php');
$booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);
$checkin =  '';
$checkout =  '';
$nights =  '';
$payment_status =  '';
$total =  '';
 $booking_status =  '';
 $user_fullname = '';
 $user_email = '';
 $user_mobile = '';
 $timeTocall = '';
 $house_name = '';
 $house_HeroImg = '';
 $rack_rate = '';
 $toPayOnCall ='';
 $remainAmount =''; 
 $createdAt = '';
$sql = "SELECT DISTINCT(bookings_details.rack_rate) , bookings.* , houses.house_name, houses.house_id, houses.house_HeroImg FROM `bookings` INNER JOIN houses INNER JOIN bookings_details ON bookings_details.booking_id = bookings.booking_id AND houses.house_id = bookings.house_id WHERE bookings.booking_id = '$booking_id'";
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row= mysqli_fetch_array($res)){
    $checkin =  $row['checkin'];
    $checkout =  $row['checkout'];
    $nights =  $row['no_of_nights'];
    $payment_status =  $row['payment_status'];
    $total =  $row['total_price'];
     $booking_status =  $row['booking_status'];
     $user_fullname = $row['user_fullname'];
     $user_email = $row['user_email'];
     $user_mobile = $row['user_mobile'];
     $timeTocall = $row['timeTocall'];
     $house_name = $row['house_name'];
     $house_HeroImg = $row['house_HeroImg'];
     $rack_rate = $row['rack_rate'];
     $toPayOnCall = $total/100*15;
     $remainAmount = $total - $toPayOnCall; 
     $createdAt = date("yy-m-d");
}
$to       = $user_email;
 $subject  = 'Your Booking Invoice';
$message  = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sending booking invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .invoice-box table h1{
            font-size: 17px;
            width: 60%;
            margin-top: 0;
            height: 37px;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .house_Details {
            border: 1px solid rgba(0, 0, 0, .15);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                              <h1>Barlings Beach</h1>
                              <h1>Holiday Escapes</h1>
                            </td>

                            <td>
                                Invoice #:  '.$booking_id .'<br>
                                Created:   9/03/2022 <br>
                                Due:  15 days before 12/03/2022
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Owner: John and Barbara <br>
                                Barlings Beach, New South Wales<br>
                                +612 435 123 456<br>
                                johnandbarbara@bbhe.com.au
                            </td>

                            <td>
                                User:
                               Aliza Faisal <br>
                                0444546090 <br>
                                alizafaixal@gmail.com
                               
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Details
                </td>

                <td>
                    &nbsp;
                </td>
            </tr>
            <tr class="item">
                <td>
                    House Name:
                </td>

                <td>
                Barlings Beach Luxury Townhouse
                </td>
            </tr>
          

            <tr class="item">
                <td>
                    Check-In Date:
                </td>

                <td>
                12/03/2022
                </td>
            </tr>

            <tr class="item">
                <td>
                    Check-Out Date:
                </td>

                <td>
                17/03/2022
                </td>
            </tr>
            <tr class="item">
                <td>
                    Rent per night:
                </td>

                <td>
                   $195
                </td>
            </tr>
            <tr class="item">
                <td>
                    Total nights to stay
                </td>

                <td>
                5
                </td>
            </tr>
            <tr class="item">
                <td>
                    Total rent
                </td>

                <td>
                    $975
                </td>
            </tr>
            <tr class="item">
                <td>
                    Booking status
                </td>

                <td>
                Confirmed
                </td>
            </tr>
            <tr class="item">
                <td>
                    Payment status
                </td>

                <td>
                Pay at Counter
                </td>
            </tr>
            <tr class="item">
            <td>
               Convenient time to call:
            </td>

            <td>
            2:00pm
            </td>
        </tr>
            <tr class="item">
                <td>
                    Amount to pay on call (15% of total)
                </td>

                <td>
                 $150
                </td>
            </tr>
            <tr class="item">
                <td>
                    Remaining about to pay on due date
                </td>

                <td>
                   $825
                </td>
            </tr>
            <tr class="item">
            <td>
                Comment:
            </td>

            <td>
                We will call you at 2:00pm to process the payment
            </td>
        </tr>
        </table>
    </div>
</body>

</html>';
echo $message;
// ini_set();

// $headers  = 'From: alizafaisal.mq1199@gmail.com' . "\r\n" .
//             'MIME-Version: 1.0' . "\r\n" .
//             'Content-type: text/html; charset=utf-8';
// if(mail($to, $subject, $message, $headers)){
   
//     echo 'email sent';
//  ?>
//     <script>
//         window.location.href = 'thankyou.html';
//     </script>
//  <?php
// }else{
//     echo "Email sending failed";
  
// }
?>

