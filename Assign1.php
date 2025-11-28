<?php
// store info
$store = "Purrnoy Pet Shop";
$tag = "Alagang swak sa bulsa, approved ni Ming & Bantay!";

// list of products with price, desc, image
$prodList = [
    ["name"=>"Pink Princess Pet Bed", 
     "price"=>899.00, 
     "desc"=>"A soft, plush bed that keeps your pet cozy and relaxed all day.", 
     "img"=>"https://i.pinimg.com/1200x/a8/0b/3a/a80b3a7138e7ae5d45ece13213684002.jpg"],
  
    ["name"=>"Pink Pet Pajamas", 
     "price"=>149.00, 
     "desc"=>"Lightweight, comfortable pajamas perfect for bedtime or lazy days.", 
     "img"=>"https://i.pinimg.com/1200x/1a/d0/7f/1ad07f592fe1301ab39ef54c3cdd7da7.jpg"],
  
    ["name"=>"Winged Cat Harness & Leash", 
     "price"=>199.00, 
     "desc"=>"A secure, stylish harness set that makes walks safer and more fun.", 
     "img"=>"https://i.pinimg.com/736x/cf/ed/39/cfed39139b56d6470704e81e5e1f913a.jpg"],
  
    ["name"=>"Cat Shampoo", 
     "price"=>159.00, 
     "desc"=>"A mild and soothing shampoo specially formulated for cats.", 
     "img"=>"https://i.pinimg.com/1200x/6c/f0/cb/6cf0cb064adcadf9700049203c9ae138.jpg"],
  
    ["name"=>"Feather and Ball Decor Teaser Toy", 
     "price"=>299.00, 
     "desc"=>"Interactive feather and ball toy to keep your cat active and playful.", 
     "img"=>"https://i.pinimg.com/1200x/0c/32/aa/0c32aa3aed4efd60ca5dbe6418dca5a5.jpg"]
];

// calc total price
$total = 0;
foreach($prodList as $p) {
    $total += $p["price"];
}

// calc avg price
$avg = $total / count($prodList);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $store; ?> • pet stuff</title>
    <style>
        /* general body styling */
        body {
            margin:0;
            font-family: "Trebuchet MS", sans-serif;
            background: linear-gradient(to bottom right, #fff8b0, #b3d8ff, #89c4ff);
            color:#2b2b2b;
            padding:30px;
        }

        /* header area */
        header {
            text-align:center;
            margin-bottom: 30px;
        }
        header h1 {
            font-size:48px;
            color:#1d3b73;
            letter-spacing:2px;
            text-shadow:2px 2px #ffef8a;
            margin:0;
        }
        header h2 {
            font-size:20px;
            color:#26457a;
            margin-top:8px;
            font-weight:normal;
        }

        /* table styles */
        table {
            margin:0 auto 40px auto;
            border-collapse:collapse;
            width:90%;
            background:#ffffffee;
            box-shadow:0 0 12px rgba(0,0,0,0.1);
            border-radius:8px;
            overflow:hidden;
        }
        th {
            background:#ffd646;
            color:#1d3b73;
            padding:12px;
            font-size:18px;
        }
        td {
            border:1px solid #cfe4ff;
            padding:10px;
            color:#1f1f1f;
            vertical-align:top;
        }
        tr:nth-child(even) {background:#e9f3ff;}
        td img {width:100px; height:80px; object-fit:cover; border-radius:5px;}

        /* footer styles */
        .footer-note {
            text-align:center;
            font-style:italic;
            font-size:16px;
            color:#26457a;
            margin-bottom:12px;
        }
        footer {
            text-align:center;
            padding:18px 0;
            background:#1d3b73;
            color:#fff;
            font-size:16px;
            border-radius:10px 10px 0 0;
            max-width:1200px;
            margin:0 auto;
        }
    </style>
</head>
<body>

<header>
    <h1><?php echo strtoupper($store); ?></h1>
    <h2><?php echo $tag; ?></h2>
</header>

<!-- product table -->
<table>
    <tr>
        <th>Image</th>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php foreach($prodList as $item): ?>
        <tr>
            <td><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>"></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['desc']; ?></td>
            <td>
                <?php if($item['price'] > $avg): ?>
                    ₱<?php echo number_format($item['price'],2); ?> 
                <?php else: ?>
                    ₱<?php echo number_format($item['price'],2); ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p class="footer-note">
    <?php echo "Average Price: ₱".number_format($avg,2); ?>
</p>

<footer>
    &copy; 2025 Fiona Mercado
</footer>

</body>
</html>
