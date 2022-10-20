<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sjstore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$password = 'test';
//$password_hashed = md5($password);
/* comment necessary code below if you have run this cript before */

$sql = "INSERT INTO Account (username, password)
 VALUES ('test', '$password');";


$sql .= "INSERT INTO CustomerDetails (accountId, fullName, email, phoneNumber, dateOfBirth, address)
VALUES ( (SELECT accountId from Account where username = 'test'), 'test', 'test@gmail.com', '83066382', '2000-08-01', '');";

// insert Footwear
$sql .= "INSERT INTO `Product` (name, price, category, stock, description, image)
VALUES ( 'NYC Marathon Fuel Cell SC Elite V3', 329, 'footwear', 100, 
'You push yourself to go the distance get the gear that helps you get the job done. the TCS New York City Marathon® FuelCell SC Elite V3 womens running shoes are built for marathon runners who never let up.',
'res/product/ezgif-2-0a14c890e9.jpg');";

// insert Footwear
$sql .= "INSERT INTO `Product` (name, price, category, stock, description, image)
VALUES ( '2002R', 209, 'footwear', 100, 
'Our 2002R sneakers for men prove that slick kicks can still be comfortable.',
'res/product/product2.jpg');";

// insert Footwear
$sql .= "INSERT INTO `Product` (name, price, category, stock, description, image)
VALUES ( '2002R', 329, 'footwear', 100, 
'This throwback silhouette is crafted with premium suede and mesh material for a look that sets you apart.',
'res/product/product3.jpg');";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'HP OMEN Laptop 15-dc1010 ', 1699, 'laptop', 4.5, 60, 
// '2.6 GHz Intel Core i7-9750H Six-Core\n
// 8GB DDR4 RAM | 256GB PCIe M.2 SSD\n
// 15.6\" 1920 x 1080 Anti-Glare IPS Display\n
// NVIDIA GeForce GTX 1650 (4GB GDDR5)\n\n
// Disclaimer: All product names, logos, and brands are property of their respective owners. All company, product and service names used are for identification purposes only. Use of these names, logos, and brands does not imply ownership / endorsement.',
// '{\"brand\": \"HP\", \"ships from\": \"1 ROCHOR CANAL ROAD, SIM LIM SQUARE\", \"screen size\": \"15.6\", \"warranty period\": \"12 months\"}', 
// 'php/insert_data.php', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'DYNACORE - Lenovo 81Y4001VSB Gaming 3 Onyx BLACK Gaming Laptop / Notebook', 1840, 'laptop', 4.3, 40, 
// 'Processor Model:Intel Core i7-10750H\n
// Main Memory:16GB DDR4\n
// Internal Storage:512GB PCIE SSD\n
// Operating System:Window 10 Home\n\n
// * For Compatibly of the product, please visit  the respective product web site.\n
// * Compatibility issues are not covered under warranty or return.',
// '{\"brand\": \"lenovo\", \"ships from\": \"SIM LIM SQUARE, 1 ROCHOR CANAL ROAD\", \"screen size\": \"15.6\", \"warranty period\": \"36 months\"}', 
// 'https://cf.shopee.sg/file/8cd62b9cdea99fd57512681ca3b36698', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'ASUS ROG STRIX G512LI-GTX1650TB', 1898, 'laptop', 4.9, 50, 
// 'Intel® Core™ i7-10750H Processor 2.6 GHz (12M Cache, up to 5.0 GHz)\n
// Memory: DDR4 2666 8GB\n
// Memory Slot: 2x\n
// 1TB M.2 NVMe™ PCIe® SSD\n\n
// FREE: Mcafee AntiVirus (Pre-installed), IMPACT Gaming Mouse, ROG Backpack.\n',
// '{\"brand\": \"Asus\", \"ships from\": \"1 Rochor Canal Rd, Sim Lim Square, Singapore 188504, SG\", \"screen size\": \"15.6\", \"warranty period\": \"24 months\"}', 
// 'https://cf.shopee.sg/file/5cd5fc19dcdabf030e3c1245d8e64d57', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Acer Predator Triton Q2KAA Gaming Laptop', 1798, 'laptop', 4.8, 80, 
// 'Acer Predator Triton 700 PT715-51-761M Gaming Laptop comes with these high level specs: 7th Generation Intel Core i7-7700HQ Processor 2.8GHz with Turbo Boost Technology up to 3.8GHz, 15.6\" Full HD (1920 x 1080) widescreen LED-backlit IPS display, NVIDIA GeForce GTX 1060 with 6GB of dedicated GDDR5 VRAM, 16GB DDR4 2400MHz Memory, 512GB PCIe SSD in RAID 0 configuration (2 x 256GB), Optimized Dolby Atmos sound enhancement, Acer True Harmony Technology, Two Built-in Stereo Speakers, Secure Digital (SD) card reader, Killer Double Shot Pro Wireless-AC 1535 802.11ac. Wi-Fi featuring 2x2 MU-MIMO technology (Dual-Band 2.4GHz and 5GHz), Killer Ethernet E2500 10/100/1000 Gigabit Ethernet LAN (RJ-45 port), HD Webcam (1280 x 720) supporting High Dynamic Range (HDR), 1 - Thunderbolt 3 (Full USB 3.1 Type C) Port, 3 - USB 3.0 Port One with Power-off Charging), 1 - USB 2.0 Port, 1 - HDMI 2.0 Port with HDCP Support, 1 - Display Port, 3-cell Li-ion Battery (4670 mAh), Up to 5-hours Battery Life, 5.4 lbs. | 2.45 kg (system unit only) (NH.Q2KAA.001)',
// '{\"brand\": \"acer\", \"ships from\": \"SIM LIM SQUARE, 1 ROCHOR CANAL ROAD, SG\", \"screen size\": \"15.6\", \"warranty period\": \"12 months\"}', 
// 'https://cf.shopee.sg/file/58ef4197cbac51e3e5a104375e5659f0', 0);";


// //insert Phone Product
// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Xiaomi Redmi 8A 32GB', 149, 'phone', 4.5, 50, 
// 'Singapore Seller\n
// Ready Stock\n
// Fast Shipping\n
// CPU: Snapdragon 439 Octa Core',
// '{\"brand\": \"xiaomi\", \"ships from\": \"REDHILL FORUM, 16 JALAN KILANG TIMOR, SG\", \"screen size\": \"6.22\", \"warranty period\": \"12 months\"}', 
// 'https://cf.shopee.sg/file/eb41f82e915c1fee3e61afbee160c7c4', 1);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Samsung Galaxy S8+ 4+64GB Smart Phone', 286, 'phone', 4.2, 10, 
// 'WHY BUY FROM US?\n
// - OUR PRODUCT ALL WILL QC BEFORE SELLING AND SHIP TO CUSTOMER.\n
// - OUR PRODUCT ALL 100% ORIGINAL PRODUCT, 100% NO ANY LOCK.\n
// - OUR PRODUCT MAY NOT MOST CHEAPEST IN THE MARKET , BUT WE MAKE UP FOR THAT BY PROVIDING OUR BEST SERVICES WITH ONCE LIFETIME EXPERIENCES.\n
// - FOR OUR EXPERIENCE AT ONLINE , DON\'T BUY BECAUSE OF CHEAPER, MUST BUY BECAUSE OF TRUSTED.\n
// - WE PROVIDE AFTER SALES SERVICES.',
// '{\"brand\": \"samsung\", \"ships from\": \"Ampang, 68000 Selangor\", \"Model\": \"Galaxy Note20\"}', 
// 'https://cf.shopee.sg/file/1b5d209c0fb4425a8241d117f9fb36e8', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Vivo Y20 (2020) Smart Phone', 216, 'phone', 4.8, 50, 
// '- Snapdragon 460\n
// - 4 GB RAM | 64GB ROM | Expandable up to 256 GB \n
// - Android 10, Funtouch 10.5\n
// - 6.51 inch IPS LCD\n
// - Front 8MP / Rear 13MP+2MP+2MP\n
// - 5000mAh Battery \n
// - Fast charging 18W\n
// - Side Mounted Fingerprint Sensor',
// '{\"brand\": \"vivo\", \"ships from\": \"Ampang, 68000 Selangor\"}', 
// 'https://cf.shopee.sg/file/053c9bbe527220500a1c7eb8c3ef332c', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'OPPO 5G Reno 3 / Reno 3 Pro Snapdragon 765G Smart Phone', 659, 'phone', 4.9, 40, 
// 'For Oppo Reno 3\n\n
// 1. CPU:	MTK6873 Octa-core\n
// 2. Screen: 6.4 inches AMOLED 2400x1080 multi touch screen \n
// 3. RAM: 8GB RAM/12GB RAM\n
// 4. ROM: 128GB',
// '{\"brand\": \"oppo\", \"ships from\": \"10G KOVAN ROAD, SG 548043\"}', 
// 'https://cf.shopee.sg/file/03f9e1136f56e5fad384541b3b9eaa66', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Apple Iphone 11 128GB ', 959, 'phone', 4.8, 80, 
// 'IPHONE 11 128GB Singapore Telco set with 1 year Apple Warranty from activation date\n
// Strictly no return or refund. \n
// Any issue encountered after purchase, please visit the Apple store for warranty claim.\n
// We provide buyback for new and preowned phones',
// '{\"brand\": \"apple\", \"ships from\": \"3 GAMBAS CRES, NORDCOM 1, SG\"}', 
// 'https://cf.shopee.sg/file/7bd040af9dec244429370e12b5464110', 0);";


// // insert TABLET product
// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'MICOX- ICE PRO 10.1inch Tablet', 199, 'tablet', 4.8, 50, 
// '    Micox Ice Pro\n
//     10.1 inch\n
//     3G TABLET\n
//     2GB RAM\n
//     16GB ROM\n
//     DUAL CAM 2MP+5MP\n
// (FREE GIFT  CAPACITIVE PEN + STAND + SCREEN PROTECTOR + HEADPHONES)',
// '{\"brand\": \"micox\", \"ships from\": \"1 Rochor Canal rd sim lim square\", \"warranty period\": \"1 month\"}', 
// 'https://cf.shopee.sg/file/357e12fc9e9c7a429372442a409a1e77', 1);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Superbro Galaxy S, 10\'\' Android Tablet', 117, 'tablet', 4.2, 40, 
// 'features:\n
// 1: meWatch keeps you informed of what is happening around you,\n
// 2: The large screen 2.5D glass screen allows you to enjoy a comfortable browsing process, no longer limited to the small screen of the phone, you can share its content with your family,\n
// 3: Super large-capacity 6000 mAh battery allows you to use the device for a long time, no longer worry about the power shortage, anytime, anywhere, just want to play,\n
// 4:8D high-quality speakers, composed of imported accessories from the United States. After countless tests, it has reached the perfect level, allowing you to hear wonderful musicals and concerts at any time~',
// '{\"brand\": \"no brand\", \"ships from\": \"1 Rochor Canal rd sim lim square\"}', 
// 'https://cf.shopee.sg/file/a4f252474de7242c55fc56c2a5a68ce3', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Samsung Galaxy Tab S', 189, 'tablet', 4.5, 30, 
// '// Product details\n
// // Refurbished & Export Set\n
// // Warranty:1 month seller warranty\n
// // Warranty does not cover LCD,Dropped & Water damaged \n\n
// // Please note : SIM Card 4G only for DATA,can not make phone call.',
// '{\"brand\": \"samsung\", \"RAM\": \"32GB\", \"ships from\": \"164 Race Course Road, SG\"}', 
// 'https://cf.shopee.sg/file/109ee6defd08bb75fe27c76272f3ad9e', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Lenovo Thinkpad Tablet', 235, 'tablet', 4.3, 40, 
// 'Latest Intel® quad-core processing power\n
// Full PC experience without compromise\n\n
// DESCRIPTION	\n
// LENOVOTM THINKPAD® 10\n\n
// Processor	\n
// Intel® AtomTM Z8700 SoC Quad-Core Processor\n\n
// Operating System	\n
// Windows 10 Pro - Lenovo recommends Windows 10 Pro.\n\n
// Graphics	\n
// 8th Generation Intel® HD Graphics',
// '{\"brand\": \"lenovo\", \"ships from\": \"Seri Kembangan, 43300 Selangor\"}', 
// 'https://cf.shopee.sg/file/6faab05ffe43146d83d0f0c29cf82b1e', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Apple iPad Air / 9.7 inch / WIFI+Cellular', 260, 'tablet', 4.8, 50, 
// 'Warranty does not cover LCD\n
//   Apple iPad Air\n
// - Refurbished & Export set\n
// - 9.7 inches display\n
// - Resolution:1536 x 2048 pixels, 4:3 ratio (~264 ppi density)\n
// - OS:iOS , upgradable to iOS 12.2\n
// - Chipset:Apple A7',
// '{\"brand\": \"apple\", \"colour\": \"white\", \"warranty period\": \"1 month\", \"ships from\": \"164 RACE COURSE ROAD\"}', 
// 'https://cf.shopee.sg/file/14e031a827317abbd5121df9bfa0d15a', 0);";


// // insert Accessories product
// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Apple Airpods Pro', 279, 'accessories', 4.9, 60, 
// '1 Year Apple Warranty from Manufacturer Date\n\n
// For most cases by showing apple support our receipt, apple is able to update the purchase date accordance to our receipt date but that\'s solely based on apple discretion (updated on 16 Oct 2020)\n\n
// Strictly no return and refund\n
// If there is any issue after purchase, please bring to the Apple service center',
// '{\"brand\": \"apple\",  \"warranty period\": \"12 month\", \"ships from\": \"3 GAMBAS CRES, NORDCOM 1, SG\"}', 
// 'https://cf.shopee.sg/file/909260c8b2e8c77847c82c695b912be0', 1);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'BOOMBOX PORTABLE WIRELESS BLUETOOTH ', 79, 'accessories', 4.8, 40, 
// 'Epic sound. All day long. Made to be the most powerful, portable Bluetooth speaker,  Boombox delivers monstrous sound along with the hardest hitting bass. Enjoy music for 4 hours without missing a beat. Imagine playing with your favorite beats from sunrise to sunrise on a single charge. Use the solid 2000mAh battery and dual charge out to charge your external devices anytime and keep music rocking. Rugged enough to handle your wildest tailgate party, the  Boombox is IPX7 splashproof, which withstand any weather and even the most epic pool parties. Switch between indoor and outdoor modes to optimize sound wherever the party is. ',
// '{\"brand\": \"JBL\", \"ships from\": \"Others, 30100 Perak\"}', 
// 'https://cf.shopee.sg/file/7fc6eaa7bf8bc593f58353773d16c225', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'Waterproof Laptop bag laptop case', 59, 'accessories', 4.8, 50, 
// 'NOTE: Please contact us in advance if you are not sure about the size\n
// Size Information:\n
//  Inch      External Size(mm)      Internal Size(mm)\n              
// 11/12     330 x 230 x 30           310 x 210 x 20\n
// 13.3       360 x 260 x 30           330 x 225 x 20\n
// 14/15     390 x 280 x 30           360 x 250 x 20\n 
// 15.6       420 x 310 x 35           400 x 290 x 20\n',
// '{\"brand\": \"no brand\", \"material\": \"Nylon\"}', 
// 'https://cf.shopee.sg/file/d22852046e7424248f1be4dc6a3253b3', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( '2019 Edition Gaming Headset DT SXV2.0 RGB Headphones', 119, 'accessories', 5, 30, 
// 'Here is a SteelSeries Arctis 5 Gaming Headset, 100% Original\n
// Arctis 5 is a USB-enabled PC gaming headset with DTS Headphone:X v2.0 surround sound, Prism RGB illumination, and Clearcast, the best mic in gaming\n', 
// '{\"brand\": \"Steel Series\", \"warranty period\": \"36 months\"}', 
// 'https://cf.shopee.sg/file/61a103b353c28c2788d1dbf128e95f74', 0);";

// $sql .= "INSERT INTO `Product` (name, price, category, rating, stock, description, specification, image, bestSellingProduct)
// VALUES ( 'bluetooth earphone case Apple AirPods Pro', 22, 'accessories', 4.3, 50, 
// 'Thank you for your interest in our shop\'s products. All parcels in this shop would be uniformly disinfected by the airlines and delivered to your hands aftercustoms inspection and quarantine. There will be no potential danger. Please rest assured that the goods will be safe.\n
// After receiving the order, we will deliver the goods for you within 48 hours.\n
// If you need wholesale, please ask customer service first.\n
// There may be chromatic aberration due to light problems.', 
// '{\"brand\": \"no brand\", \"stock \": \"50\"}', 
// 'https://cf.shopee.sg/file/56b2e9f6630f8974eab162a465d613ec', 0);";





if (mysqli_multi_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
