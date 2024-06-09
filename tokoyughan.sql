-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoyughan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ghanni-admin', 'admin', 'admin'),
(2, 'yudi-admin', 'admin1', 'admin1'),
(3, 'andreas-admin', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'handbag'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif_pengiriman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email`, `password`, `alamat`, `phone`) VALUES
(1, 'arif', 'arif001@gmail.com', 'arif', 'padang panjang', '082284594344'),
(2, 'ghanni', 'ghanni@gmail.com', 'ghanni', 'batam', '082284594344');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `tgl_kirim` int(11) NOT NULL,
  `tgl_terima` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif_pengiriman` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `alamt_pemesan` text NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `status_pesanan` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `stok_produk`, `harga`, `deskripsi`, `foto_produk`, `berat_produk`, `status`) VALUES
(56, 1, 'Arnett Mens Short Sleeve Plain White Polo Shirt', 10, 500000, 'The Arnett Mens Short Sleeve Plain White Polo Shirt is a classic and timeless wardrobe staple for men. Made with high-quality materials, this polo shirt offers both style and comfort for everyday wear.\r\nThe shirt features a clean and minimalistic design, with a plain white color that pairs effortlessly with various bottoms and accessories. The short sleeves provide a casual and relaxed look, making it suitable for both casual and semi-formal occasions.\r\n', '1.jpg', 100, ''),
(57, 1, 'Army Short Button Plain T-Shirt ', 30, 200000, 'Army Short Button Plain T-Shirt 1835J is a versatile and stylish piece of clothing that combines comfort and casual style. This plain t-shirt is designed with a short button placket on the front, adding a touch of uniqueness to the classic t-shirt design,The shirt is made from high-quality materials that offer both softness and durability. It provides a comfortable and breathable fit, making it suitable for everyday wear. The short sleeves allow for ease of movement and provide a relaxed and laid-back look.\r\n', '2.jpg', 100, ''),
(58, 1, 'Regular Fit Jersey Top', 20, 600000, 'Crafted from high-quality jersey fabric, this top offers a soft and stretchy texture that ensures maximum comfort when you wear it. With its regular fit design, this top strikes the perfect balance between comfort and a polished appearance', '3.jpg', 100, ''),
(59, 1, 'Short Sleeves Polo Shirt', 20, 500000, 'Introducing our Short Sleeves Polo Shirt, the perfect combination of style and comfort for any occasion!\r\nMade from high-quality and breathable fabric, this polo shirt is designed to keep you cool and comfortable throughout the day. The short sleeves provide a relaxed and casual look, making it ideal for both casual outings and semi-formal events.\r\n', '4.jpg', 100, ''),
(60, 1, 'Essentials Mens Regular-Fit Polo Shirt', 87, 500000, 'Introducing the Essentials Men&amp;amp;amp;amp;#039;s Regular-Fit Cotton Pique Polo Shirt, a timeless classic that combines style and comfort effortlessly!\r\nCrafted from high-quality cotton pique fabric, this polo shirt offers a soft and breathable feel against your skin. The regular-fit design provides a comfortable and relaxed silhouette, making it suitable for various occasions.\r\n', '5.jpg', 100, ''),
(61, 1, 'Essentials Mens Slim-Fit Golf Polo Shirt', 87, 1000000, 'Introducing the Essentials Men&amp;#039;s Slim-Fit Quick-Dry Golf Polo Shirt, the perfect combination of style, performance, and comfort for your golfing needs!\r\nThis polo shirt is crafted from high-quality, quick-dry fabric that wicks away moisture, keeping you cool and dry even during intense rounds on the golf course. The slim-fit design offers a modern and tailored look, providing a sleek silhouette without compromising on comfort.\r\n', '6.jpg', 100, ''),
(62, 1, 'Mens Casual Shirt Long Sleeve Shirt', 67, 600000, 'Introducing the Coofandy Mens Casual Button Down Shirt, a stylish and versatile addition to your wardrobe that effortlessly blends comfort and fashion!\r\nCrafted from premium linen chambray fabric, this shirt offers a lightweight and breathable feel, making it perfect for both warm and transitional seasons. The long sleeves provide extra coverage, making it suitable for various occasions.\r\n', '7.jpg', 100, ''),
(63, 1, 'Platini Blue Short Sleeve Mens Shirt', 97, 500000, 'Introducing the Platini Blue Oxford Cotton Short Sleeve Men&amp;amp;#039;s Salur Pattern Shirt, a stylish and contemporary choice for the modern man&amp;amp;#039;s wardrobe!\r\nThis shirt is crafted from high-quality Oxford cotton fabric, known for its durability and softness. The breathable and lightweight nature of the fabric ensures all-day comfort, making it suitable for various occasions.\r\n', '8.jpg', 100, ''),
(64, 1, 'shirt Jersey Cartenz Tactical Innerfit', 99, 200000, 'Introducing the Cartenz Tactical Innerfit Shirt Jersey, a high-performance garment designed to meet the needs of tactical and outdoor enthusiasts!\r\nThis shirt jersey is specifically engineered for durability, functionality, and comfort during intense physical activities. Made with high-quality materials, it offers exceptional moisture-wicking properties, keeping you cool and dry even in challenging conditions.\r\n', '9.jpg', 100, ''),
(65, 1, 'Essentials Mens Long-Sleeve Shirt', 20, 400000, 'Introducing the Essentials Men&amp;amp;#039;s Regular-Fit Long-Sleeve Oxford Shirt, a classic wardrobe staple that combines timeless style with exceptional comfort.\r\nCrafted from high-quality Oxford cotton fabric, this shirt offers a soft and durable feel. The long sleeves provide extra coverage and versatility, making it suitable for both formal and casual occasions.\r\n', '10.jpg', 100, ''),
(66, 1, 'Hanes Mens Crewneck Sweatshirt', 20, 60000, 'Introducing the Hanes Mens EcoSmart Crewneck Sweatshirt, a comfortable and eco-friendly option for your casual wardrobe.\r\nThis sweatshirt is made from a blend of cotton and polyester, with a focus on sustainability. The EcoSmart fabric is created using recycled materials, making it an environmentally conscious choice.\r\n', '11.jpg', 100, ''),
(67, 1, 'slim fit polo shirt', 5, 1000000, 'Introducing our Slim Fit Polo Shirt, the perfect choice for a fashionable and up-to-date look!\\r\\nWe use high-quality materials that provide comfort and an elegant appearance. This polo shirt has a slim fit cut that gives it a slimmer silhouette and looks more modern.\\r\\n', '12.jpg', 100, ''),
(68, 1, 'Mens Shirt Short Sleeve Gray Pink', 12, 600000, 'Introducing our Men&#039;s Short Sleeve Shirt in a stylish combination of gray and pink, a modern and versatile addition to your wardrobe!\r\nThis shirt features a short sleeve design, making it perfect for warmer weather or for achieving a casual and relaxed look. The gray and pink color combination adds a subtle touch of style and sophistication to your outfit.\r\n', '14.jpg', 100, ''),
(69, 1, 'inov-8 Thermoshell Pro Insulated Jacket ', 15, 800000, 'The inov-8 Thermoshell Pro Insulated Jacket is a high-performance outerwear piece designed to keep you warm and protected in cold and harsh weather conditions. This jacket is engineered with advanced insulation technology and premium materials to provide exceptional warmth without compromising on weight or mobility.', '15.jpg', 100, ''),
(70, 2, 'buoutique dresses colour black short', 20, 50000, 'Enhance your elegance with this short black boutique dress. Designed for a stylish and versatile look, this dress is perfect for both formal and semi-formal occasions.\\r\\nThe dress features a sleek and flattering silhouette that accentuates your feminine curves. Made from high-quality materials, it ensures all-day comfort. The classic black color adds a touch of luxury and sophistication, making it suitable for various events.\\r\\n', '7.jpg', 100, ''),
(71, 2, 'SEC-dress naomi', 20, 200000, 'Introducing the SEC-Dress Naomi, a stunning and sophisticated addition to your wardrobe. This dress embodies timeless elegance and contemporary style, making it a versatile choice for various occasions.\\r\\nThe SEC-Dress Naomi features a sleek silhouette that flatters your figure and enhances your natural curves. The dress is crafted from high-quality materials that provide a comfortable and luxurious feel, ensuring you look and feel your best throughout the day or night.\\r\\n', 'project_img3.jpg', 100, ''),
(73, 2, 'Women&#039;s party dress paneli', 10, 100000, 'Introducing the Women&#039;s Party Dress Paneli, a captivating party dress for women. This dress offers a perfect blend of elegant style and modern design that will make you look stunning at any party event.\r\nThe Women&#039;s Party Dress Paneli showcases cleverly combined panels, creating a unique and eye-catching look. These panels add dimension to the dress and provide distinct visual appeal, setting it apart from other party dresses.\r\n', 'project_img2.jpg', 100, ''),
(74, 2, 'Boho all-over print ruffle maxi dress', 20, 200000, 'Introducing the Boho All-Over Print Ruffle Maxi Dress, a perfect blend of bohemian style and feminine charm. This dress exudes a free-spirited vibe with its flowing silhouette and intricate print, making it an ideal choice for boho lovers.\r\nThe Boho All-Over Print Ruffle Maxi Dress features a mesmerizing all-over print that showcases vibrant colors, intricate patterns, or nature-inspired motifs. The print adds an artistic touch, creating a visually captivating look that is unique and eye-catching.\r\n', 'project_img6.jpg', 100, ''),
(75, 2, 'forest green lace dress', 20, 200000, 'Introducing the Forest Green Lace Dress, a stunning piece that combines elegance and allure. This dress features a beautiful forest green color and intricate lace detailing, making it a perfect choice for special occasions.\r\nThe Forest Green Lace Dress showcases a flattering silhouette that accentuates your curves. The delicate lace overlay adds a touch of femininity and sophistication to the overall design. The dress may have a fitted bodice that gradually flares out into a flowing skirt, creating a graceful and romantic look.\r\n', 'project_img4.jpg', 100, ''),
(76, 2, 'Sexy Dress Floral', 20, 300000, 'Introducing the Sexy Dress Floral, a seductive and alluring piece that embraces the beauty of femininity. This dress features a captivating floral print and a figure-hugging silhouette, making it perfect for those who want to make a bold and confident statement.\r\nThe Sexy Dress Floral showcases a vibrant floral pattern that adds a touch of romance and charm. The colors and designs of the flowers create a visually stunning effect, making this dress a standout choice for special occasions or date nights.\r\n', '2.jpg', 100, ''),
(78, 2, 'Black Blouse', 10, 1000000, 'Introducing the Black Blouse, a versatile and timeless piece that is a must-have in every woman&#039;s wardrobe. This black blouse exudes sophistication and elegance, making it a perfect choice for various occasions.\r\nThe Black Blouse features a classic and minimalist design with a sleek black color. It is crafted with attention to detail, ensuring a high-quality garment that fits beautifully and flatters your figure.\r\n', '3.jpg', 100, ''),
(79, 2, 'chiffon blouses summer', 10, 300000, 'Introducing the Chiffon Blouses Summer collection, a range of lightweight and breezy blouses perfect for the warm summer months. These chiffon blouses are designed to keep you cool and stylish while embracing the vibrant spirit of the season.\r\nThe Chiffon Blouses Summer collection features a variety of designs, colors, and patterns to suit different tastes and preferences. The blouses are made from soft and flowy chiffon fabric, which drapes beautifully and allows for excellent breathability.\r\n', '6.jpg', 100, ''),
(80, 2, 'Elise Asymmetric Cut Top Black', 10, 3000000, 'Introducing the Elise Asymmetric Cut Top in Black, a modern and stylish piece that adds a contemporary edge to your wardrobe. This top features a unique asymmetric cut, making it a standout choice for those who appreciate unconventional designs.\r\nThe Elise Asymmetric Cut Top is crafted with attention to detail and precision. The black color adds a touch of sophistication, while the asymmetrical hemline adds an element of intrigue and visual interest. The cut is strategically placed to create a flattering and dynamic silhouette.\r\n', '5.jpg', 100, ''),
(81, 2, 'Stripes Knit Sweater', 10, 2000000, 'Introducing the Stripes Knit Sweater, a cozy and stylish addition to your winter wardrobe. This sweater features a timeless striped pattern, combining classic style with contemporary comfort.\r\nThe Stripes Knit Sweater is crafted with high-quality knit fabric, providing warmth and durability. The soft and cozy material ensures a comfortable fit and helps to keep you cozy during colder days. The striped pattern adds visual interest and a touch of sophistication to the sweater.\r\n', '8.jpg', 100, ''),
(82, 2, 'Fancy Qube mini dress Ruffle top back ribbon', 10, 1000000, 'Introducing the Fancy Qube Mini Dress with Ruffle Top and Back Ribbon, a delightful and feminine piece that exudes elegance and charm. This mini dress features a beautiful ruffled top with a delicate back ribbon detail, adding a touch of sophistication to your ensemble.\r\nThe Fancy Qube Mini Dress is designed with attention to detail and craftsmanship. The ruffled top adds volume and texture, creating a playful and romantic look. The back ribbon accentuates the waist and adds an element of visual interest, while also providing a feminine and adjustable fit.\r\n', '1.jpg', 100, ''),
(83, 2, 'Allegra K Cotton Regular Size Tops', 10, 3000000, 'Introducing the Allegra K Cotton Regular Size Tops, a versatile and comfortable addition to your everyday wardrobe. These tops are crafted from high-quality cotton fabric, offering a soft and breathable feel against the skin.\r\nThe Allegra K Cotton Regular Size Tops are designed for a regular fit, providing a flattering and comfortable silhouette for a wide range of body types. The classic design and solid colors make them easy to pair with various bottoms, such as jeans, skirts, or trousers, allowing for effortless styling.\r\n', '9.jpg', 100, ''),
(84, 3, 'Women&#039;s Bag 2022 Embroidered Thread Plaid Handbag Middle-Aged Mother Bag', 10, 10000000, 'The Women&#039;s Bag 2022 is a stylish and functional handbag designed for middle-aged mothers. It features an embroidered thread plaid pattern, adding a touch of elegance to the bag. With a large-capacity design, this bag offers ample space to carry all your essentials.\r\nThe bag can be worn as a one-shoulder messenger bag, providing convenience and comfort while on the go. It is crafted with high-quality materials, ensuring durability and longevity. The interior of the bag is spacious and well-organized, allowing you to store and organize your belongings effectively\r\n', '1.png', 100, ''),
(85, 3, 'Sling Bag Fashion L V', 10, 300000000, 'BAG SPECIFICATIONS \r\nProduct Name : Sling Bag Fashion L V Model T1117 \r\nSize : 22 X 11 X 18 CM \r\nHandle Height : 7 CM \r\nMaterial: PU Weight : 400 Grams Colors: Red, Black, Dusty Pink, White, Purple \r\nProduct Code : T1117\r\n', '2.png', 100, ''),
(86, 3, 'LOVA MILA BAG', 10, 20000000, 'This product is made by a local garment factory, making it affordable with the best quality in its class. The bag consists of 2 large compartments and 1 small compartment at the front, all lined with fabric on the inside. It is made of flexible synthetic leather material that is easy to clean.', '3.png', 100, ''),
(87, 4, 'Christian Dior SE Handbag', 5, 5000000, 'The Christian Dior SE handbag is a luxurious handbag produced by the renowned fashion company, Christian Dior SE. The bag is known for its iconic design and excellent quality.\r\nChristian Dior SE handbags come in various styles and sizes, offering a range of material options such as genuine leather, canvas, and high-quality synthetic materials. Each bag embodies a perfect blend of elegance, sophistication, and functionality.\r\n', '4.png', 200, ''),
(88, 3, 'Small Lady Dior My ABCDior Bag', 10, 6000000, 'The Lady Dior My ABCDior bag epitomizes Dior&amp;#039;s vision of elegance and beauty. Sleek and refined, the timeless and modern style is crafted in sand-colored lambskin with Cannage stitching, creating the instantly recognizable quilted texture. Pale gold-finish metal D.I.O.R. charms further embellish its silhouette with an elegant touch. Featuring a shoulder strap that can be personalized with badges, the small, unique design may be carried by hand or worn crossbody.', '5.png', 300, ''),
(89, 3, 'Louis Vuitton Neverfull', 10, 25000000, 'The Neverfull MM tote unites timeless design with heritage details. Made from supple Monogram canvas with natural cowhide trim, it is roomy yet not bulky, with side laces that cinch for a sleek allure or loosen for a casual look. Slim, comfortable handles slip easily over the shoulder or arm. Lined in colorful textile, it features a removable pouch which can be used as a clutch or an extra pocket.', '7.png', 3000, ''),
(90, 3, 'VE Handbag', 30, 3000000, 'VE Handbag is a stylish and functional handbag. It is designed with attention to detail and high-quality craftsmanship.\r\nVE Handbag comes in various styles and sizes, allowing you to choose according to your preferences and needs. The brand uses high-quality materials to ensure durability and an attractive appearance.\r\n', '8.png', 500, ''),
(91, 3, 'Women Delvaux Brillant Leather Handbag', 100, 600000, 'Curved like a horseshoe and pretty as a jewel, its spells out the &#039;D&#039; for Delvaux. Its refined front strap and fastening system make it one of a kind. Decorated with pearls or crystals, two-tone or monochrome, metallic or other, the Brillant&#039;s buckle transforms with every collection. A true showpiece every time.', '9.png', 500, ''),
(92, 3, 'H&amp;D Collection Bag ', 20, 200000, 'Bags from H&amp;D Collection are available in various styles and sizes to suit your needs. This brand offers bags with elegant and functional designs, using high-quality materials to ensure durability and an appealing appearance.', '11.png', 200, ''),
(95, 4, 'Higher State Trail Waterproof Lite Jacket', 10, 300000, 'Using a lightweight technical construction, provides the garment with exceptional breathability and weatherproof abilities, keeping you cool, dry and focused on the run ahead. The 10,000mm waterproofing keeps the material dry during wet weather conditions, keeping you protected whatever the weather. Windproof, the jacket provides shielding from the wind, stopping windchill from penetrating through the garment for superior comfort. With 5,00g/m2 breathability, the jacket allows air to flow through the jacket helping to reduce the build-up of intolerable heat, for a comfortable wearing experience. Designed with a performance fit, the anatomical cut of the jacket is designed for optimal movement and comfort in motion; allowing you to perform at your best. The jacket is also constructed with ergonomic seams that ensure a functional fit, allowing natural movement while working out. Keeping you feeling protected outdoors the jacket is integrated with UV protection which offers the skin prote', '1.jpg', 100, ''),
(96, 4, 'Peru Jersey', 10, 200000, 'Peru Jersey is the football uniform worn by the Peruvian national football team. The jersey is designed with the team&#039;s iconic colors of red and white, reflecting the identity and culture of the country. ', '2121.png', 100, ''),
(97, 4, 'Montane F Alpine Spirit Women&#039;s Jacket FAREJPAP', 20, 220000, 'The Montane Alpine Spirit womens waterproof jacket is the most durable waterproof shell in our range. Engineered with thicker GORE- TEX fabric, this waterproof jacket for women has been designed with extreme conditions in mind. Combining durability with breathability makes the Alpine Spirit highly versatile and ideal for hiking or mountaineering, providing reliable waterproof and windproof protection to help keep you comfortable, no matter what the weather throws at you.', '2.jpg', 20, ''),
(98, 4, 'Higher State Trail Shorts', 30, 300000, 'Developed to support you along any trail the Higher State Trail Shorts have two layers to provide you with both comfort and support. Kicking off the shorts is the inner compression short, designed to increase muscle oxygenation and reduce blood lactate whilst supporting and stabilising active muscles to enhanced performance and speed up recovery time. The compression shorts sit tight to the skin for ultimate support by reducing fatigue to the muscles and reducing the risk of injury. Featuring flatlock seams to prevent any chafing or abrasion the inner shorts offer freedom of movement for ultimate comfort. The upper shorts enhance free movement thanks to four-way stretch fabric that doesn&#039;t restrict your natural motion. For added comfort the outer short has laser punched shaped side panels that promote airflow and breathability; thus providing you with a cool feeling when temperatures rise. The waistband offers extra comfort against the skin made with a soft lycra stretch sitting f', '3.jpg', 30, ''),
(99, 4, 'Balance Men&#039;s Accelerate Short', 20, 500000, 'The Accelerate 5&quot; Short from New Balance offers the performance technology you need to achieve your next milestone. The lightweight NB Dry fabric design wicks away moisture with NB Dry technology and enhances your visibility with reflective details. Additionally, the elastic drawstring waist and internal brief ensure a secure fit', '3214.jpg', 20, ''),
(100, 4, 'Nike Air Zoom Pegasus 33', 50, 5000000, 'Nike Air Zoom Pegasus 33 is a high-performance running shoe from the Nike brand. It is designed to provide a comfortable and responsive running experience,The Nike Air Zoom Pegasus 33 features a lightweight and breathable upper that offers excellent ventilation and support. The shoe is equipped with Nike Zoom Air units in the forefoot and heel, providing responsive cushioning and a smooth ride.\r\n', '4.png', 300, ''),
(101, 4, 'Higher State 7 inch Running Shorts', 20, 520000, 'Super lightweight and breathable, the Higher State 2 in 1 7 Inch Running Short provides you with outstanding comfort all day. Breathable, the shorts allow a constant airflow that will keep you feeling fresh. The composition of the shorts is windproof which provides shielding from the wind. Designed with a performance fit, the anatomical cut of the shorts is designed for optimal movement and comfort in motion; allowing you to perform at your best. The performance fit is teamed with ergonomic seams that ensure a functional fit, allowing natural movement while working out. Reflective details on the shorts increase visibility during low-level lighting; great for early morning training sessions or late night runs. Keeping you feeling protected the shorts are integrated with UV protection which offers the skin protection from harmful UV rays.', '5.jpg', 200, ''),
(102, 4, 'Man Montane Podium Pull On Running Jacket', 10, 300000, 'Crafted with mountain athletes in mind, the Montane Unisex Podium Pull-On Smock will easily pack away into your kit bag without taking up much space or weight so you will always have the competitive edge over the competition. Made from lightweight and incredibly breathable waterproof fabric, it offers the perfect shield in adverse conditions so you can run for longer and stay focused. Cut in a close fit with micro-taped seams, a pre-elasticated trail hood with stiffened peak and storm flap zip, alongside elasticated hem and cuffs enhance the fit, coverage and protective aspects of this pull-on smock. 360 VIA Trail Series® reflective details also keep you visible when training or racing in low light, while a a handy stuff sack allows you to easily pack it away when not in use.', '6.jpg', 100, ''),
(103, 4, 'Higher State Freedom Running Socklet', 10, 60000, 'Higher State Freedom Women&#039;s Running Socklet Structured anatomical design woven with precision performance comfort. This is Higher State Freedom Running, providing the tools you need to get the job done. Utilising a profusion of technical design features the Freedom Running Socklet create a seamless transition between comfort, support and fit. Designed for the runner, by the runner the Freedom Running Socklet will become an essential addition to your training arsenal. Supportive Fit, Performance Comfort Weaving together a range of technical fabrics with a blend of a high cotton content (27%) creates a highly structured design that feels lusciously soft against the skin yet retains its intelligent design features; delivering a piece that balances exquisite comfort with performance requirements. Equipping you with the perfect kit to excel at what Higher State is all about, running. Run hard, run long, run in a higher state. The structure of the Freedom Running Socklet employs differ', '7.jpg', 100, ''),
(104, 4, 'Higher State Hiking Padded Hooded Jacket', 10, 600000, 'Designed to keep you warm during outdoor activities, the Higher State padded hooded jacket provides a great warmth-to-weight ratio, secure storage for essentials, and a stylish look while on the move.', '8.jpg', 100, ''),
(105, 4, 'Nike Mercurial', 10, 520000, 'The field is yours when you lace up in the Nike Mercurial. We added a Zoom Air unit, made specifically for soccer, and grippy texture up top for exceptional touch, so you can dominate in the waning minutes of a match—when it matters most. Feel the explosive speed as you race around the field, making the critical plays with velocity and pace. Fast is in the Air.', '8.png', 100, ''),
(106, 4, 'Skins Men&#039;s Series-3 Compression Long Tights', 10, 10000000, 'The SKINS SERIES 3 Compression Tights with gradient compression technology will boost your circulation, bringing more oxygen-rich blood to your muscles so you can perform better, stronger, and longer with less fatigue and a quicker post activity recovery. This enhanced circulation also forces blood lactate to circulate more effectively, further improving muscle efficiency and power. By strategically wrapping and supporting your muscles, SKINS compression clothing also dramatically reduces muscle vibration/oscillation, leading to fewer muscle tears and lowering the risk of injury as well as reducing DOMS (delayed onset muscle soreness) after activity. By containing muscles in their firing position, SKINS also helps you maintain your posture and technique as you push through your fatigue curve during activity. In addition to the strategic mapping of our compression panels, the other secret lies in SKINS&#039; proprietary material - powerful, yet lightweight and breathable and structured ', '9.jpg', 100, ''),
(107, 4, 'Rab Stance Sketch Tee', 10, 100000, 'Built from soft and durable organic cotton, the Stance Mountain SS Tee comes with a Rab sketch logo print and sleeve label.The Stance Sketch SS Tee is a short-sleeved, regular-fit cotton tee with a crew neck and stylised Rab graphic on the chest, available in a choice of three vibrant colours.\r\n', '11.jpg', 100, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pembeli` (`id_pembeli`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
