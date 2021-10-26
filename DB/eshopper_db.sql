CREATE TABLE user_roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    role  varchar(30) 
);
CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    role_id int ,
    full_name varchar(50) NOT NULL,
    username varchar(255)  UNIQUE,
    email varchar(50)  UNIQUE,
    password varchar(50) NOT NULL,
    address varchar(200),
     FOREIGN KEY (role_id) REFERENCES user_roles(id) ON DELETE CASCADE  
);
CREATE TABLE category(
    cid int  PRIMARY KEY AUTO_INCREMENT,
    cat_name varchar(50)
    );
CREATE TABLE  subcategory(
    sid int  PRIMARY KEY AUTO_INCREMENT,
    category_id int,
    sub_name varchar(50),
     FOREIGN KEY (category_id) REFERENCES category(cid) ON DELETE CASCADE
    
    );

CREATE TABLE  products(
    pid int   PRIMARY KEY AUTO_INCREMENT,
    category_id int,
    subcategory_id int,
    description varchar(700),
    rating int(7),
    yearOfRelease varchar(4),
    photo varchar(100),
    price int(10),
    name varchar(100),
    FOREIGN KEY (category_id) REFERENCES category(cid) ON DELETE CASCADE,
    FOREIGN KEY (subcategory_id) REFERENCES subcategory(sid) ON DELETE CASCADE
    );
CREATE TABLE order_details (  
    order_id int  PRIMARY KEY  AUTO_INCREMENT, 
    user_id int,
    product_id int,
    dateOfPurchase varchar(20),   
    quantity int, 
total_amount float(10,2),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(pid) ON DELETE CASCADE
);


INSERT INTO user_roles(id,role) VALUES(1,'admin');
INSERT INTO user_roles(id,role) VALUES(2,'user');

INSERT INTO users(id,role_id,full_name,username,email,password,address) VALUES(1,1,'Administrator','admin007','admin@gmail.com',md5('admin123'),'');
INSERT INTO users(id,role_id,full_name,username,email,password,address) VALUES(2,2,'User Test','usertest01','test@yahoo.com',md5('test2021'),'test 3001');

INSERT INTO category(cid,cat_name) VALUES(1,'Desktop');
INSERT INTO category(cid,cat_name) VALUES(2,'Laptop');
INSERT INTO category(cid,cat_name) VALUES(3,'Phone');
INSERT INTO category(cid,cat_name) VALUES(4,'Test Category');

INSERT INTO subcategory(sid,category_id,sub_name) VALUES(1,1,'Asus');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(2,1,'Dell');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(3,1,'HP');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(4,1,'Lenovo');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(5,2,'MacBook');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(6,2,'Acer');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(7,2,'Fujitsu');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(8,3,'Samsung');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(9,3,'Xiaomi');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(10,3,'IPhone');
INSERT INTO subcategory(sid,category_id,sub_name) VALUES(11,4,'Subcategory Test');

INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('1', '1', '1', 'CPU: Intel Core i7-1165G7GPU: Intel Graphics RAM: 16GB Storage: 1TB M.2 PCI 3.0 SSD Display: 13.3 inches, 1920 x 1080 Size: 11.9 x 8 x 0.5 inches Weight: 2.5 pounds ', '125', ' 2020', 'asus1.jpg ', ' 600', 'Asus ZenBook 13 UX325E ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('2', '1', '1', ' CPU: Intel Core i3-10110U GPU: Intel UHD RAM: 8GB Storage: 128GB SSD Display: 14 inches, 1080p Size: 12.6 x 8.1 x 0.5 inches Weight: 2.5 pounds', '650', '2020 ', 'asus2.jpg', '450 ', 'Asus Chromebook Flip C436 ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('3', '1', '1', 'CPU: Intel Core i7-9750H GPU: Nvidia GeForce GTX 2060 RAM: 16GBStorage: 1TB SSD Display: 15.6-inch 1080p Size: 14.2 x 10.8 x 1 inches Weight: 4.3 pounds ', '110', ' 2020', 'asus3.jpg ', '759 ', 'asus3.jpg ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('4', '1', '2', ' 2021 Newest Dell Inspiron 15 Business Laptop Computer: 15.6" HD Display, Intel Celeron N4020(Up to 2.8GHz), 16GB RAM, 256GB SSD+1TB HDD, WiFi, Bluetooth, HDMI, Webcam, Windows 10 Pro, Gift', '30', '2021', 'dell1.jpg', '300 ', 'Dell Inspiron 15 ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('5', '1', '2', ' 2021 DELL Inspiron Laptop Notebook Computer, 15.6" FHD Touch Screen, 10th Gen Intel Core i5-1035G1 (Beat i7-7500U), HDMI, Wi-Fi, Webcam, Windows 10 Home in S Mode (16GB/1TB SSD) 4.6 out of 5 stars 3', '60', ' 2021', 'dell2.jpg ', '749 ', 'DELL Inspiron Laptop ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('6', '1 ', '2', '27-inch FHD (1920 x 1080) Infinity Touch Display 11th Generation Intel Core i7-1165G7 Processor (12MB Cache, up to 4.7 GHz) 12GB 2666MHz DDR4 , 256 GB M.2 PCIe NVMe SSD Boot and 1 TB 5400 RPM SATA HDD Storage Intel Iris Xe Graphics with shared graphics memory Intel Wi-Fi 6 2x2 (Gig plus) and Bluetooth 5.0 ','100', '2020 ', 'dell3.jpg ', '1200 ', 'Dell Inspiron 7700 AIO ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('7', '1', '3', 'HP Chromebook 14 Laptop, Intel Celeron N4000 Processor, 4 GB RAM, 32 GB eMMC, 14” HD Display, Chrome, Lightweight Computer with Webcam and Dual Mics, Home, School, Music, Movies (14a-na0021nr, 2021) ', '200', '2020 ', 'hp1.jpg ', '250 ', 'HP Chromebook ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('8', '1', '3', 'HP Pavilion Gaming 15-Inch Micro-EDGE Laptop, Intel Core i5-9300H Processor, NVIDIA GeForce GTX 1650 (4 GB), 8 GB SDRAM, 256 GB SSD, Windows 10 Home (15-dk0020nr, Shadow Black/Acid Green) ', '65', '2020 ', 'hp2.jpg ', '799 ', 'HP Pavilion Gaming ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('9', '1', '3', 'HP EliteBook 840 G6 Laptop, 14" FHD Non-Touch, Intel Core i7-8565U @1.8GHz, 16GB DDR4, 256 GB PCIe NVMe M.2 SSD, Wi-fi, Bluetooth, Webcam, Windows 10 Pro (Renewed) ', '66', '2021 ', 'hp3.jpg ', '899 ', 'HP EliteBook ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('10', '1', '4', 'Lenovo IdeaPad 3 15" Laptop, 15.6" HD (1366 x 768) Display, AMD Ryzen 3 3250U Processor, 4GB DDR4 Onboard RAM, 128GB SSD, AMD Radeon Vega 3 Graphics, Windows 10, 81W10094US, Business Black ', '125', '2021 ', 'lenovo1.jpg', '329 ', 'Lenovo IdeaPad  ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('11', '1', '4', 'Lenovo Chromebook Flex 5 13" Laptop, FHD (1920 x 1080) Touch Display, Intel Core i3-10110U Processor, 4GB DDR4 Onboard RAM, 64GB eMMC, Intel Integrated Graphics, Chrome OS, 82B80006UX, Graphite Grey ', '652', '2021', 'lenovo2.jpg', '356', 'Lenovo Chromebook Flex');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('12', '1', '4', ' Lenovo Legion 5 Gaming Laptop, 15.6" FHD (1920x1080) IPS Screen, AMD Ryzen 7 4800H Processor, 16GB DDR4, 512GB SSD, NVIDIA GTX 1660Ti, Windows 10, 82B1000AUS, Phantom Black', '650', '2021', 'lenovo3.jpg ', '1129 ', 'Lenovo Legion 5');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('13', '2', '5 ', 'Apple MacBook Air MD760LL/A Intel Core i5-4250U X2 1.3GHz 4GB 256GB SSD 13.3in, Silver (Renewed) ', '65', '2019 ', 'mac1.jpg', '129 ', 'Apple MacBook Air ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('14', '2', '5', 'Apple MacBook Pro ME664LL/A 15.4-Inch Laptop with Retina Display (OLD VERSION) (Renewed). Renewed products look and work like new. These pre-owned products have been inspected and tested by Amazon-qualified suppliers, which typically perform a full diagnostic test, replacement of any defective parts, and a thorough cleaning process. Packaging and accessories may be generic. All products on Amazon Renewed come with a minimum 90-day supplier-backed warranty. 15" Apple Retina 2.6GHz, Intel Core i7 8GB Memory, 256GB Solid State Drive NVIDIA GeForce GT 650M Graphics Connectivity includes 3-stream AirPort Extreme (802.11a/b/g/n), Bluetooth 4.0, two USB 3.0 ports, two "Thunderbolt" ports, HDMI ', '121', '2019 ', 'mac2.jpg ', ' 569', 'Apple MacBook Pro ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('15', '2', '5', 'Apple 13.3" MacBook Pro (2020) Intel Core i5 Quad-Core 2.0GHz, 16GB DDR4 RAM, 512GB Solid State Drive, macOS, Space Gray (Renewed). Powerful new Iris Plus graphics delivers up to 80 percent faster graphics performance than the previous generation. That means effortless video editing, faster 3D rendering, and smoother gaming. Built-in stereo speakers with high dynamic range. Three microphone array with directional beamforming. 3.5mm headphone port. Support for Dolby Atmos playback ', '230', '2020 ', 'mac2.jpg ', '1363 ', 'Apple 13.3" MacBook Pro ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('16', '2', '6', 'Acer Aspire Laptop, 17.3" HD+ Screen, Intel Core i5-1035G1 Processor 1.0GHz to 3.6GHz, 12GB RAM, 512GB PCIe SSD, DVD-RW, Wireless-AC, Bluetooth, Windows 10 Home, Black.Screen】17.3" HD+ (1600 x 900) Energy-efficient LED backlight Display Tech Specs1 x COMBO audio jack, 1 x Type-A USB 3.2, 2 x USB 2.0 port(s), 1 x HDMI, 1 x RJ-45, DVD-Writer, Windows 10 Home 64 bit Included in the package.Mousepad from PConline365 ', '66', '2020 ', 'acer1.jpg', '719 ', 'Acer Aspire Laptop ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('17', '2', '6', 'Acer Swift 3 Thin & Light Laptop, 14" Full HD IPS, AMD Ryzen 7 4700U Octa-Core with Radeon Graphics, 8GB LPDDR4, 512GB NVMe SSD, Wi-Fi 6, Backlit KB, Fingerprint Reader, Alexa Built-in.AMD Ryzen 7 4700U Octa-Core Mobile Processor (Up to 4.1 GHz) with Radeon Graphics; 8GB LPDDR4 Memory; 512GB PCIe NVMe SSD 14" Full HD Widescreen IPS LED-backlit display (1920 x 1080 resolution; 16:9 aspect ratio) Intel wireless Wi-Fi 6 AX200 802.11ax; HD webcam (1280 x 720); Backlit keyboard; Fingerprint reader. ', '132', '2020 ', 'acer2.jpg', '615 ', 'Acer Swift 3 Thin & Light ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('18', '2', '6', 'Acer Nitro 5 Gaming Laptop, 9th Gen Intel Core i5-9300H, NVIDIA GeForce GTX 1650, 15.6" Full HD IPS Display, 8GB DDR4, 256GB NVMe SSD, Wi-Fi 6, Backlit Keyboard, Alexa Built-in, AN515-54-5812.9th Generation Intel Core i5-9300H Processor (Up to 4.1 GHz) 15.6 inches Full HD Widescreen IPS LED-backlit display; NVIDIA GeForce GTX 1650 Graphics with 4 GB of dedicated GDDR5 VRAM 8GB DDR4 2666MHz Memory; 256GB PCIe NVMe SSD (2 x PCIe M.2 slots - 1 slot open for easy upgrades) & 1 - Available hard drive bay. ', '230', '2021', 'acer3.jpg  ', '859', 'Acer Nitro 5 Gaming Laptop ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('19', '2', '7', 'Fujitsu Lifebook P772 12" Laptop, Intel Core i5, 8GB RAM, 320GB HDD, Win10 Home. Refurbished.Microsoft Authorized Refurbished 12 inch Laptop Intel Core i5-3rd Gen @ 2.70 GHz 8GB RAM; 320GB HDD Windows 10 Home 1 Year Warranty for Hardware Parts and Labor ', '120', '2020 ', 'fujitsu1.jpg', '1000 ', 'Fujitsu Lifebook P772 ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('20', '2', '7', 'Fujitsu LIFEBOOK U904 35.56 cm (14 ) 3200 x 1800 WQHD+ LED Intel Core i5-4200U 1.6GHz, Intel HD Graphics 4400, 4GB DDR3L SDRAM, 500GB hybrid (16GB flash), Wi-Fi, Bluetooth, SD, SDHC, SDXC, Gigabit Ethernet, Windows 8.1 Pro 64-bit ', '652', '2019', 'fujitsu2.jpg', '999', 'Fujitsu LIFEBOOK U904 ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('21', '2', '7', 'Fujitsu LifeBook S751 (XBUY-S751-W7-004) 14" Windows 7 Professional 64-bit Notebook. Specific Uses For Product:Personal Display Size: 14 inches LCD Operating System: Windows 7 Professional Resolution: 720p ', '211', '2021 ', 'fujitsu3.jpg ', '700 ', 'Fujitsu LifeBook S751');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('22', '3', '8', 'Samsung Galaxy A10S A107M 32GB Unlocked GSM DUOS Phone w/ Dual 13MP & 2MP Camera (International Variant/US Compatible LTE) – Black ', '59', '2020 ', 'sams1.jpg', '169', 'Samsung Galaxy A10S ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('23', '3', '8', 'Samsung Galaxy S21 Ultra 5G Factory Unlocked Android Cell Phone 128GB US Version Smartphone Pro-Grade Camera 8K Video 108MP High Res, Phantom Silver.PRO-GRADE CAMERA: Zoom in close with 100X Space Zoom, and take photos and videos like a pro with our easy-to-use, multi-lens camera. SHARP 8K VIDEO: Capture your life’s best moments in head-turning, super-smooth, cinema quality 8K Video. MULTIPLE WAYS TO RECORD: Create share-ready videos and GIFs with multi-cam recording and automatic, professional-style effects. ', '658', '2021 ', 'sams2.jpg ', '999 ', 'Samsung Galaxy S21');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('24', '3', '8', 'Samsung Galaxy A51 A515F 128GB DUOS GSM Unlocked Phone w/Quad Camera 48 MP + 12 MP + 5 MP + 5 MP (International Variant/US Compatible LTE) - Prism Crush Blue.Display: 6.5 inches Super AMOLED capacitive touchscreen w/ Corning Gorilla Glass 3 - Resolution: 1080 x 2400 pixels Memory: 128GB 4GB RAM - microSD, up to 512GB Platform: OS Android - Chipset: Exynos 9611 - Processor: Octa-core (4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53) - Graphics: Mali-G72 MP3', '333', '2021 ', 'sams3.jpg ', '310', 'Samsung Galaxy A51');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('25', '3', '9', 'Xiaomi Poco X3 NFC M2007J20CG - Smartphone 6 GB + 128 GB, Dual Sim ', '60', '2020', 'xiaomi1.jpg ', '267 ', 'Xiaomi Poco X3 ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('26', '3', '9', 'Xiaomi Redmi Note 8 Pro Smartphone, 6 GB + 64 GB, Blu (Ocean Blue) ', '33', '2020 ', 'xiaomi2.jpg ', '204 ', 'Xiaomi Redmi Note 8  ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('27', '3', '9', 'Xiaomi Mi 10T - Smartphone 6 GB + 128 GB, Dual Sim, Alexa Hands-Free, Nero (Cosmic Black).Factory Unlocked Smartphones are compatible with most GSM carriers. This phone is not compatible with CDMA carriers like Verizon and Sprint. This phone is only 5G capable in Europe. ', '156', '2021 ', 'xiaomi3.jpg ', '384 ', 'Xiaomi Mi 10T - Smartphone ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('28', '3', '10', '(Refurbished) Apple iPhone 11 Pro Max, US Version, 64GB, Space Gray - Unlocked.This phone is unlocked and compatible with any carrier of choice on GSM and CDMA networks (e.g. AT&T, T-Mobile, Sprint, Verizon, US Cellular, Cricket, Metro, Tracfone, Mint Mobile, etc.).Please check with your carrier to verify compatibility. When you receive the phone, insert a SIM card from a compatible carrier. Then, turn it on, connect to Wi-Fi, and follow the on screen prompts to activate service. ', '256', '2020 ', 'iphone1.jpg ', '719 ', 'Apple iPhone 11 Pro Max ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('29', '3', '10', 'Apple iPhone 12 Pro Max, 128GB, Gold - Fully Unlocked (Renewed).Fully unlocked and compatible with any carrier of choice (e.g. AT&T, T-Mobile, Sprint, Verizon, US-Cellular, Cricket, Metro, etc.). The device does not come with headphones or a SIM card. It does include a charger and charging cable that may be generic. Inspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm length ', '659', '2021', 'iphone2.jpg ', '1350 ', 'Apple iPhone 12 Pro Max ');
INSERT INTO `products` (`pid`, `category_id`, `subcategory_id`, `description`, `rating`, `yearOfRelease`, `photo`, `price`, `name`) VALUES ('30', '3', '10', 'Apple iPhone 11.This phone is unlocked and compatible with any carrier of choice on GSM and CDMA networks (e.g. AT&T, T-Mobile, Sprint, Verizon, US Cellular, Cricket, Metro, Tracfone, Mint Mobile, etc.). ', '255', '2019 ', 'iphone3.jpg ', '517 ', 'Apple IPhone 11 ');



