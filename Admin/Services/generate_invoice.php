<?php
require('../../Utilities/_LoginAccess.php');
require('../../Utilities/_AdminLoginAccess.php');
require('../../Utilities/_ConnectDatabase.php');
require('../dompdf/autoload.inc.php');

$OrderId = $_GET['id'];
$query = "SELECT * FROM salesorder WHERE OrderId = $OrderId";
$query = mysqli_query($user,$query);
$assoc = mysqli_fetch_assoc($query);

$DateTime = date_format(date_create($assoc['DateTime']),"M dS Y");
$TotalAmount=$assoc['Amount'];
$NetAmount = intval($TotalAmount)+150;

$UserId = $assoc['UserId'];            
$subquery = mysqli_query($user,"SELECT * FROM userdetails WHERE UserId = $UserId");
$subassoc = mysqli_fetch_assoc($subquery);
$UserName= $subassoc['Name'];
$UserCno= $subassoc['ContactNumber'];
$UserAdd= $subassoc['Address'];

$OrderId = $assoc['OrderId'];
$subquery = mysqli_query($user,"SELECT * FROM salesorderdetails WHERE OrderId = $OrderId");
$products="";
while($subassoc = mysqli_fetch_assoc($subquery))
{
    $ProductId = $subassoc['ProductId'];
    $Productquery = mysqli_query($user,"SELECT cat.SubCategory, pr.Name as pname FROM productdetails pr join categorydetails cat on pr.CategoryId = cat.CategoryId WHERE pr.ProductId = $ProductId");
    $productassoc = mysqli_fetch_assoc($Productquery);

    $pname= $productassoc['pname'];
    $SubCategory= $productassoc['SubCategory'];
    $quantity= $subassoc['Quantity'];
    $Amount= $subassoc['Amount'];

    
    $products .="
    <tr>
        <td style='color: #56887D; line-height: 18px; vertical-align: top; padding:10px 0;' class='article'>$pname</td>
        <td style='color: #646a6e; line-height: 18px; vertical-align: top; padding:10px 0;'><small>$SubCategory</small></td>
        <td align='center' style='color: #646a6e; line-height: 18px; vertical-align: top; padding:10px 0;'>$quantity</td>
        <td align='right' style='color: #1e2b33; line-height: 18px; vertical-align: top; padding:10px 0;'>$Amount.00</td>
    </tr>
    <tr>
        <td height='1' colspan='4' style='border-bottom:1px solid #e4e4e4'></td>
    </tr>";
}


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);


$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Invoice Details</title>
</head>
<body style="margin:0;padding:0;-webkit-font-smoothing: antialiased;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                <tr>
                                    <td width="50%">
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tr>
                                                <td align="left"><img src="http://localhost/Shopify%20eCommerce/Admin/Images/Logo.png" width="150" height="auto" alt="logo" border="0"/></td>
                                            </tr>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td style="color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                    Hello, $UserName.<br> 
                                                    Thank you for shopping from our site<br>and for your order.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right">
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td height="5"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 28px; color: #56887D; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                                    Invoice
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td style="color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                    <small>ORDER</small> #000$OrderId<br/>
                                                    <small>$DateTime</small>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td height="60"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                <tr>
                                    <td>
                                        <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                            <tr>
                                                <th width="52%" align="left" style="color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;">
                                                    Item
                                                </th>
                                                <th align="left" style="color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;">
                                                    <small>Category</small>
                                                </th>
                                                <th align="center" style="color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;">
                                                    Quantity
                                                </th>
                                                <th align="right" style="color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;">
                                                    Subtotal
                                                </th>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="background: #bebebe;"></td>
                                            </tr>
                                            <tr>
                                                <td height="10" colspan="4"></td>
                                            </tr>
                                            $products
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <!-- Table Total -->
                            <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                <tr>
                                    <td style="color: #646a6e; line-height: 22px; vertical-align: top; text-align:right;">
                                        Subtotal
                                    </td>
                                    <td width="80" style="color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;">
                                        $TotalAmount.00
                                    </td>
                                </tr>

                                <tr>
                                    <td height="5" colspan="2"></td>
                                </tr>

                                <tr>
                                    <td style="color: #646a6e; line-height: 22px; vertical-align: top; text-align:right;">
                                        Shipping &amp; Handling
                                    </td>
                                    <td style="color: #646a6e; line-height: 22px; vertical-align: top; text-align:right;">
                                        150.00
                                    </td>
                                </tr>

                                <tr>
                                    <td height="5" colspan="2"></td>
                                </tr>

                                <tr>
                                    <td style="color: #000; line-height: 22px; vertical-align: top; text-align:right;">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td style="color: #000; line-height: 22px; vertical-align: top; text-align:right;">
                                        <strong>$NetAmount.00</strong>
                                    </td>
                                </tr>

                            </table>
                            <!-- /Table Total -->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td height="60"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                <tr>
                                    <td width="50%">
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left">
                                            <tr>
                                                <td style="color: #5b5b5b; line-height: 1; vertical-align: top;">
                                                    <strong>BILLING INFORMATION</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td style="color: #5b5b5b; line-height: 20px; vertical-align: top;">
                                                $UserName<br> 
                                                $UserAdd<br> 
                                                Phone: $UserCno
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right">
                                            <!-- <tr>
                                                <td height="20"></td>
                                            </tr> -->
                                            <tr>
                                                <td style="color: #5b5b5b; line-height: 1; vertical-align: top;">
                                                    <strong>PAYMENT METHODs</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td style="color: #5b5b5b; line-height: 20px; vertical-align: top;">
                                                    Credit Card<br> 
                                                    Debit Card Type: Visa<br> 
                                                    Cash On Delivery<br> 
                                                    UPI Payment<br> 
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="60"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td>
                            <table width="530" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; padding: 0;">
                                <tr>
                                    <td style="color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                        Have a nice day.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="spacer">
                        <td height="50"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
    </table>
</body>
</html>
HTML;

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dir = "../../Invoices/".$DateTime;
if (!is_dir( $dir )) {
    mkdir($dir);
}

$output = $dompdf->output();
file_put_contents($dir.'/'.$OrderId.'.pdf', $output);

$query = "UPDATE salesorder SET BillStatus='Generated' WHERE OrderId = $OrderId";
mysqli_query($user,$query);
header ("location: ../order display.php?q=".$_GET['q']);
exit();