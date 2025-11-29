<?php
//store info
$storeName = "Purrnoy Pet Shop";
$tagline = "Alagang swak sa bulsa, approved ni Ming & Bantay!";

//products
$products = [
    [
        "name" => "Pink Princess Pet Bed",
        "price" => 895.50,
        "desc" => "Soft and comfy bed for your beloved pet.",
        "img" => "https://i.pinimg.com/1200x/a8/0b/3a/a80b3a7138e7ae5d45ece13213684002.jpg",
        "cat" => "Comfort"
    ],
    [
        "name" => "Pet Pajamas",
        "price" => 149.99,
        "desc" => "Cute pajamas to keep your pet cozy.",
        "img" => "https://i.pinimg.com/1200x/1a/d0/7f/1ad07f592fe1301ab39ef54c3cdd7da7.jpg",
        "cat" => "Clothing"
    ],
    [
        "name" => "Winged Cat Harness & Leash",
        "price" => 210.00,
        "desc" => "Safe and stylish harness for daily walks.",
        "img" => "https://i.pinimg.com/736x/cf/ed/39/cfed39139b56d6470704e81e5e1f913a.jpg",
        "cat" => "Accessories"
    ],
    [
        "name" => "Cat Shampoo",
        "price" => 155.75,
        "desc" => "Gentle shampoo to keep your cat's fur soft.",
        "img" => "https://i.pinimg.com/1200x/6c/f0/cb/6cf0cb064adcadf9700049203c9ae138.jpg",
        "cat" => "Care"
    ],
    [
        "name" => "Feather Ball Teaser Toy",
        "price" => 305.00,
        "desc" => "Interactive toy for playful cats.",
        "img" => "https://i.pinimg.com/1200x/0c/32/aa/0c32aa3aed4efd60ca5dbe6418dca5a5.jpg",
        "cat" => "Toys"
    ],
];

//functions
function calcTotal($items) {
    $sum = 0;
    foreach ($items as $i) {
        $sum += $i['price'];
    }
    return $sum;
}

function calcAvg($items) {
    return count($items) ? calcTotal($items) / count($items) : 0;
}

function displayPrice($price, $avg) {
    return $price > $avg 
        ? "<span class='price-high'>₱" . number_format($price, 2) . "</span>" 
        : "<span class='price-low'>₱" . number_format($price, 2) . "</span>";
}

function catLabel($cat) {
    $icons = [
        "Comfort"     => "fa-bed",
        "Clothing"    => "fa-shirt",
        "Accessories" => "fa-tag",
        "Care"        => "fa-soap",
        "Toys"        => "fa-paw"
    ];
    $icon = $icons[$cat] ?? "fa-box";
    return "<i class='fa-solid $icon'></i> $cat";
}

function petTip() {
    $tips = [
        "Brush your pet regularly.",
        "Always provide fresh water.",
        "Playtime keeps pets happy.",
        "Trim nails to prevent injuries.",
        "Reward good behavior."
    ];
    return $tips[array_rand($tips)];
}

//sort products and calculate average price
usort($products, fn($a, $b) => $a['price'] <=> $b['price']);
$avgPrice = calcAvg($products);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $storeName ?> • Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin:0;
            font-family:"Trebuchet MS",sans-serif;
            background: linear-gradient(to bottom right,#fff8b0,#b3d8ff,#89c4ff);
            padding:30px;
            color:#2b2b2b;
        }
        header {
            background:#1d3b73;
            padding:20px 30px;
            margin-bottom:30px;
            border-radius:12px;
            color:#ffef8a;
        }
        header .header-inner {
            display:flex;
            align-items:center;
            justify-content:center;
            gap:20px;
        }
        header .header-inner img {
            width:70px;
            height:70px;
            border-radius:15px;
            object-fit:cover;
            box-shadow:0 0 10px #ffd646cc;
        }
        header h1 {
            font-size:48px;
            margin:0;
            letter-spacing:3px;
            font-weight:900;
            text-transform:uppercase;
            color:#ffd646;
            text-shadow:2px 2px 5px #26457a;
        }
        header h2 {
            text-align:center;
            margin-top:10px;
            font-size:20px;
            font-weight:600;
            color:#ffef8a;
            text-shadow:1px 1px 2px #26457a;
        }
        table {
            width:95%;
            margin:auto 0 40px auto;
            border-collapse:collapse;
            background:white;
            box-shadow:0 0 10px #0003;
            border-radius:4px;
            overflow:hidden;
        }
        th {
            background:#ffd646;
            padding:12px;
            font-size:18px;
            color:#1d3b73;
        }
        td {
            padding:10px;
            border:1px solid #cfe4ff;
            vertical-align:top;
        }
        tr:nth-child(even){ background:#eef7ff; }
        img { width:100px; height:80px; object-fit:cover; border-radius:4px; }
        footer {
            margin-top:30px;
            text-align:center;
            padding:20px;
            background:#1d3b73;
            color:white;
            border-radius:4px;
        }
        .pet-tip {
            text-align:center;
            font-style:italic;
            margin-top:20px;
            color:#1d3b73;
            font-size:18px;
        }
        .price-high { color:#c0392b; font-weight:bold; }
        .price-low { color:#27ae60; }
    </style>
</head>
<body>

<header>
    <div class="header-inner">
        <img src="https://png.pngtree.com/png-clipart/20230917/original/pngtree-dog-dog-cat-and-cat-icon-in-pink-and-blue-shades-png-image_12291333.png" alt="Logo">
        <h1><?= strtoupper($storeName) ?></h1>
    </div>
    <h2><?= $tagline ?></h2>
</header>

<h2 style="text-align:center;color:#1d3b73;">Products (Sorted by Price)</h2>

<table>
    <tr>
        <th>Image</th>
        <th>Product</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
    </tr>
    <?php foreach($products as $p): ?>
        <tr>
            <td><img src="<?= $p['img'] ?>" alt="<?= htmlspecialchars($p['name']) ?>"></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['desc']) ?></td>
            <td><?= catLabel($p['cat']) ?></td>
            <td><?= displayPrice($p['price'], $avgPrice) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p style="text-align:center;margin-top:15px;font-size:18px;">
    <strong>Average Price:</strong> ₱<?= number_format($avgPrice,2) ?>
</p>

<div class="pet-tip">
    <i class="fa-solid fa-cat"></i> Pet Tip: <?= petTip() ?>
</div>

<!--order form-->
<form action="" method="post" style="max-width:500px;margin:40px auto;padding:20px;background:#ffffffcc;border-radius:10px;box-shadow:0 0 10px #0002;">
    <h3 style="text-align:center;color:#1d3b73;">Place Order</h3>
    <label for="product">Select Product:</label>
    <select id="product" name="product" style="width:100%;padding:8px;margin-bottom:15px;">
        <?php foreach($products as $p): ?>
            <option value="<?= htmlspecialchars($p['name']) ?>"><?= htmlspecialchars($p['name']) ?> (₱<?= number_format($p['price'],2) ?>)</option>
        <?php endforeach; ?>
    </select>

    <label for="qty">Quantity:</label>
    <input type="number" id="qty" name="qty" min="1" max="99" value="1" style="width:100%;padding:8px;margin-bottom:15px;">

    <button type="submit" style="background:#1d3b73;color:#ffd646;font-weight:bold;padding:10px 20px;border:none;border-radius:6px;cursor:pointer;width:100%;">Submit</button>
</form>

<?php
//process order
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $prod = $_POST['product'] ?? '';
    $qty = intval($_POST['qty'] ?? 0);
    $price = 0;

    foreach($products as $p){
        if($p['name'] === $prod){
            $price = $p['price'];
            break;
        }
    }

    if($qty > 0 && $price > 0){
        $total = $price * $qty;
        echo "<p style='text-align:center;color:#1d3b73;font-weight:bold;margin-top:20px;'>
                Order: <em>".htmlspecialchars($prod)."</em> x $qty<br>Total: ₱".number_format($total,2)."
              </p>";
    } else {
        echo "<p style='text-align:center;color:#c0392b;margin-top:20px;'>Invalid order.</p>";
    }
}
?>

<footer>
    <p style="margin:0; font-style:italic;">Thank you for visiting <?= $storeName ?>!</p>
    <p>&copy; 2025 Fiona Mercado</p>
</footer>

</body>
</html>
