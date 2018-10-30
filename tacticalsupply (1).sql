-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2018 a las 01:19:53
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tacticalsupply`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'sinfoto.jpg',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'Sony', '1530551450.jpeg', '2018-07-02', '2018-07-02'),
(4, 'Apple', '1530551588.png', '2018-07-02', '2018-07-02'),
(5, 'Microsoft', '1530551645.png', '2018-07-02', '2018-07-02'),
(6, 'Logitech', '1530559308.png', '2018-07-02', '2018-07-02'),
(7, 'Genius', '1530559337.svg', '2018-07-02', '2018-07-02'),
(8, 'Samsung', '1530559416.png', '2018-07-02', '2018-07-02'),
(9, 'Huawei', '1530559447.png', '2018-07-02', '2018-07-02'),
(10, 'LG', '1530559531.png', '2018-07-02', '2018-07-02'),
(11, 'Razer', '1530559577.png', '2018-07-02', '2018-07-02'),
(12, 'Acer', '1530559618.png', '2018-07-02', '2018-07-02'),
(13, 'Bose', '1530565148.png', '2018-07-02', '2018-07-02'),
(14, 'Philips', '1530565362.png', '2018-07-02', '2018-07-02'),
(15, 'JBL', '1530565393.png', '2018-07-02', '2018-07-02'),
(16, 'Nintendo', '1530565477.png', '2018-07-02', '2018-07-02'),
(17, 'Motorola', '1530565860.png', '2018-07-02', '2018-07-02'),
(18, 'Nvidia', '1530641899.png', '2018-07-03', '2018-07-03'),
(19, 'Sentey', '1530642258.png', '2018-07-03', '2018-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 19, 1, '2018-07-06', '2018-07-06'),
(3, 23, 1, '2018-07-06', '2018-07-06'),
(5, 13, 1, '2018-07-06', '2018-07-06'),
(8, 32, 1, '2018-07-19', '2018-07-19'),
(9, 35, 13, '2018-07-25', '2018-07-25'),
(10, 33, 15, '2018-07-26', '2018-07-26'),
(11, 40, 12, '2018-07-26', '2018-07-26'),
(12, 29, 1, '2018-07-26', '2018-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'sinfoto.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `updated_at`, `created_at`, `picture`) VALUES
(1, 'Celulares', '2018-07-03', '2018-06-27', '1530646280.png'),
(2, 'Notebooks', '2018-07-03', '2018-06-27', '1530646300.png'),
(3, 'Audio & Musica', '2018-07-03', '2018-06-27', '1530646332.webp'),
(4, 'Consolas', '2018-07-03', '2018-06-27', '1530646368.png'),
(5, 'Desktop', '2018-07-03', '2018-06-27', '1530646409.png'),
(6, 'Camaras', '2018-07-03', '2018-06-27', '1530646436.png'),
(7, 'Electrodomesticos', '2018-07-03', '2018-06-27', '1530646483.png'),
(8, 'Televisores', '2018-07-03', '2018-07-02', '1530646560.png'),
(9, 'Monitores', '2018-07-03', '2018-07-03', '1530646584.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `value` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `value`, `state`, `created_at`, `updated_at`) VALUES
(1, 'WINTER2018', 20, 1, '2018-07-06', '2018-07-06'),
(2, 'DIGITALHOUSE', 15, 1, '2018-07-26', '2018-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `product_id`, `message`, `created_at`, `updated_at`) VALUES
(9, 1, 29, 'Un producto de tu lista de deseos esta en oferta!', '2018-07-23', '2018-07-23'),
(10, 1, 37, 'Un producto de tu lista de deseos esta en oferta!', '2018-07-26', '2018-07-26'),
(11, 1, 40, 'Un producto de tu lista de deseos esta en oferta!', '2018-07-26', '2018-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(15) NOT NULL,
  `category` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(225) NOT NULL DEFAULT 'sinfoto.jpg',
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `ofert` float NOT NULL,
  `ofert_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brand`, `category`, `description`, `picture`, `stock`, `sold`, `available`, `created_at`, `updated_at`, `ofert`, `ofert_date`) VALUES
(8, 'Xbox One S', 15999, 'Microsoft', 'Consolas', 'CPU: x86 de 8 núcleos fabricado por Microsoft\r\nProcesador gráfico (GPU): chip D3d 11.1 con 32 MB de memoria embebida\r\nDimensiones: 33,3 de largo x 27,4 de ancho x 7,9 de alto.\r\nMandos que soporta: 8\r\nRAM: memoria DDR3 de 8 GB.\r\nAlmacenamiento: disco duro de 500 GB no extraíble; posibilidad de almacenamiento externo por USB\r\nUnidad de lectura: lector Blu-ray / DVD\r\nPuertos: USB 3.0, HDMI a 1080p\r\nConexiones de red: wifi, puerto ethernet y tres radiotransmisores 802.11n para los mandos y otros dispositivos\r\nGrabación de vídeo digital: sí, para socios Gold\r\nFuente de alimentación: externa\r\nDetección de movimiento incluida: sí (Kinect 2)', '1530499190.jpg', 10, 0, 1, '2018-07-02', '2018-07-02', 0, NULL),
(9, 'Xbox One Joystick', 999, 'Microsoft', 'Consolas', 'White Joystick Xbox One', '1530499998.jpg', 22, 0, 1, '2018-07-02', '2018-07-02', 0, NULL),
(10, 'Iphone 8 Plus', 15999, 'Apple', 'Celulares', 'Iphone 8 PLUS', '1530502263.jpg', 5, 0, 1, '2018-07-02', '2018-07-03', 0, NULL),
(11, 'Notebook Acer 15 pulgadas', 9999, 'Acer', 'Notebooks', 'asdsada', '1530539441.png', 5, 0, 1, '2018-07-02', '2018-07-03', 0, NULL),
(12, 'Mouse Razer Naga 2018', 2690, 'Razer', 'Desktop', 'asfasfasf', '1530539629.jpeg', 6, 0, 1, '2018-07-02', '2018-07-26', 0, NULL),
(13, 'Monitor LG 24 pulgadas 4K', 5890, 'LG', 'Televisores', 'hdfhdfh', '1530541184.jpg', 9, 0, 1, '2018-07-02', '2018-07-26', 0, NULL),
(14, 'Smart Watches 3 SWR50', 8700, 'Apple', 'Celulares', '- Ion-X glass \r\n- OLED Retina display with Force Touch (450 nits)</br>\r\n- Speaker and microphone\r\n- Wi-Fi (802.11b/g/n 2.4GHz)\r\n- Bluetooth 4.0\r\n- watchOS 3', '1530545682.jpg', 29, 0, 1, '2018-07-02', '2018-07-03', 10, '2018-08-05'),
(15, 'Razer Mamba Tournament Edition', 2980, 'Razer', 'Desktop', 'Obtenga la ventaja de juego que necesita con la respuesta de precisión del mouse con cable Razer Mamba Tournament Edition. Su sensor láser 5G rastrea hasta 16, 000 ppp y tan poco como incrementos de 1 ppp. Optimizado para pantallas múltiples de resolución ultra alta, también rastrea la distancia de corte de despegue de 0.1 mm para reducir la inestabilidad y mantener la puntería.', '1530560961.jpg', 24, 0, 1, '2018-07-02', '2018-07-02', 5, '2018-08-05'),
(16, 'Samsung J7', 1799, 'Samsung', 'Celulares', 'El Samsung Galaxy J7 (2017) funciona con un procesador octa-core de 1.6GHz y viene con 3GB de RAM. El teléfono incluye 16 GB de almacenamiento interno que se pueden ampliar hasta 256 GB mediante una tarjeta microSD. En lo que respecta a las cámaras, el Samsung Galaxy J7 (2017) incluye una cámara principal de 13 megapíxeles en la parte trasera y un disparador frontal de 13 megapíxeles para selfies.', '1530561380.jpeg', 16, 0, 1, '2018-07-02', '2018-07-02', 0, NULL),
(18, 'Samsung s8', 9999, 'Samsung', 'Celulares', 'Imagina un teléfono con un mundo dentro. Se abre cuando ve su cara, aprende de usted y borra las barreras entre usted y el mundo en una hermosa y expansiva pantalla Infinity. El nuevo Galaxy S8, con una atractiva pantalla curva de 5,8 pulgadas, te libera para vivir cada parte de tu vida en cualquier lugar. Desconecta tu teléfono y descubre las características infinitamente increíbles del Galaxy S8.', '1530582165.jpg', 22, 0, 1, '2018-07-02', '2018-07-04', 0, NULL),
(19, 'iPhone X Gris Espacial', 19999, 'Apple', 'Celulares', 'El iPhone X es todo pantalla y diseño. Con su pantalla Super Retina de 5,8 pulgadas ahora llega hasta los extremos ajustándose a los bordes redondeados con total precisión y elegancia. Pantalla OLED con colores deslumbrantes, negros auténticos, y un brillo espectacular que nos da un contraste de 1.000.000:1. Diseñado en vidrio, tanto en su aparte frontal como su aparte posterior, con el cristal más resistente usado en un Smartphone y combinado con acero inoxidable de calidad quirúrgica\r\n\r\nIntegra el novedoso reconocimiento facial, con el que puedes desbloquear el iPhone X con el nuevo Face ID, identifícate y utiliza Apple Pay con total seguridad. El nuevo Face ID se sirve de la nueva cámara TrueDepth que proyecta y analiza 30.000 puntos invisibles creando un mapa de profundidad detallado de tu cara.', '1530562384.jpg', 20, 0, 1, '2018-07-02', '2018-07-03', 10, '2018-08-04'),
(22, 'Monitor Led Gamer Lg 24', 7629, 'LG', 'Monitores', '• Tamaño de pantalla: 23.8\r\n• Tipo de panel: IPS\r\n• Gama de colores (CIE 1931): sRGB por encima de 99 %\r\n• Profundidad cromática (cantidad de colores):\r\n6 bit + control de velocidad de imagen avanzado (A-FRC), \r\n16.7 millones de colores\r\n• Densidad de pixel (mm): 0.2745 x 0.2745\r\n• Tiempo de respuesta: Gris a gris (GTG) de 5 ms, máxima \r\nde transferencia de bits (MBR) de 1 ms\r\n• Frecuencia de actualización: 75 Hz\r\n• Relación de aspecto: 16:09\r\n• Resolución: 1920x1080\r\n• Brillo: 250 cd/m2\r\n• Relación de contraste: Mega\r\n• Ángulo de visión: 178/178\r\n• Tratamiento de superficie: Antirreflejo 3H', '1530634879.png', 9, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(23, 'Auriculares Razer Meka D', 3629, 'Razer', 'Audio & Musica', 'Equipado con un gran imán de neodimio, su auricular D.Va Razer MEKA le proporciona un sonido nítido cuando disfruta de sus canciones favoritas o frustra un ataque furtivo en el campo de batalla.', '1530634964.png', 8, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(24, 'Auriculares Razer Gamer Kraken', 3980, 'Razer', 'Audio & Musica', 'Auriculares Kraken RAZER', '1530635134.png', 11, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(25, 'Teclado Gamer Razer Cynosa', 2550, 'Razer', 'Desktop', 'JUEGO ABSOLUTO. ILUMINACIÓN INFINITA.\r\nEste teclado no solo es potente, sino que lleva la personalización a otro nivel totalmente distinto. El teclado Razer Cynosa Chroma se ha diseñado para conseguir un rendimiento definitivo para juegos y permite personalizar hasta cada tecla individual con toda la gama de colores.', '1530635243.png', 15, 0, 1, '2018-07-03', '2018-07-26', 8, '2018-08-01'),
(26, 'Smart Tv Lg Led 43 Lj5500', 15999, 'LG', 'Televisores', 'webOS 3.5 de uso simple y divertido\r\n- Enriquece los colores a niveles nunca antes vistos\r\n- Mejora cualquier imagen con Resolution Upscaler\r\n- Entretente con Virtual Surround Plus\r\n- Conecta una unidad USB para más contenido\r\n- Full HD que revoluciona la claridad y color de la imagen', '1530640147.png', 7, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(27, 'Smart Tv Led 32 Hd Tda Wif', 5399, 'LG', 'Televisores', 'SMART TV LED 32\" KEN BROWN S2000SA ANDROID 4.4.2\r\nDescripción\r\nEl modelo S2000SA cuenta con sistema operativo Android 4.4.2 .entradas hdmi y usb y control remoto full para usar en la funcion smart. 177-KEB-300.\r\nSe puede descargar NETFLIX.', '1530640325.png', 12, 0, 1, '2018-07-03', '2018-07-14', 0, NULL),
(28, 'Smart Tv Led 4k Lg 49 Uj6560', 22999, 'LG', 'Televisores', 'PANTALLA\r\n- Tamaño de pantalla 49\"\r\n- Resolución 3840 x 2160\r\n- Panel IPS \r\n- Procesador Quad', '1530640410.png', 12, 0, 1, '2018-07-03', '2018-07-03', 10, '2018-08-01'),
(29, 'Mouse Logitech G Pro Gaming', 978, 'Logitech', 'Desktop', 'En los juegos de hoy en día, la diferencia entre la victoria y la derrota ya no se mide en metros o segundos, sino en micrómetros y milisegundos. Cuando te lo juegas todo, un solo clic puede hacer que te lleves a casa 5.000 €... o 500.000 €. Por eso Logitech G ha creado el ratón Pro Gaming Mouse. El cuerpo ligero y el sensor óptico para gaming se han diseñado para alcanzar la velocidad y precisión de acción sin precedentes requeridas en el nivel superior de cualquier competición.', '1530641840.png', 22, 0, 1, '2018-07-03', '2018-07-26', 10, '2018-08-05'),
(30, 'Placa Msi Geforce Gtx 1050ti', 9260, 'Nvidia', 'Desktop', '-GPU: NVIDIA® GeForce® GTX 1050 Ti\r\n-Interfase: PCI Express x16 3.0\r\n-CUDA Core: 768 Units\r\n-Frecuencia GPU: \r\n• 1493 MHz / 1379 MHz (OC Mode)\r\n• 1468 MHz / 1354 MHz (Gaming Mode)\r\n• 1392 MHz / 1290 MHz (Silent Mode)\r\n-Frecuencia Memoria: \r\n• 7108 MHz (OC Mode)', '1530641949.png', 24, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(31, 'Gaming Pc Oficina Gri Baires 4', 5730, 'Logitech', 'Desktop', 'Tapizado en ecocuero, 3 variantes: SÓLO SE MOSTRARÁ/N LA/S VARIANTE/S CON STOCK DISPONIBLE:\r\n*Ecocuero NEGRO con detalles en BLANCO y costuras BLANCAS\r\n*Ecocuero NEGRO con detalles en BLANCO y costuras ROJAS\r\n*Ecocuero NEGRO con detalles en GRIS y costuras BLANCAS', '1530642059.png', 8, 0, 1, '2018-07-03', '2018-07-03', 0, NULL),
(32, 'Gabinete Pc Gamer Sentey', 990, 'Sentey', 'Desktop', 'Nombre Carved\r\n- Modelo GS-6002\r\n- Part Number GS-6002\r\n- Garantía 1 Año\r\n- EAN 812366024398\r\n- UPC 812366024398\r\n\r\nSISTEMA DE COOLERS\r\n- Cooler frontal 1 x 120mm con Led Azul\r\n- Cooler lateral 1x120mm Opcional\r\n- Cooler lateral p/CPU No\r\n- Cooler superior No\r\n- Cooler inferior No\r\n- Cooler trasero 1x80mm Negro\r\n- Cooler HDD No', '1530642226.png', 21, 0, 1, '2018-07-03', '2018-07-03', 5, '2018-08-10'),
(33, 'Gabinete Pc Gamer Sentey M20', 3399, 'Sentey', 'Desktop', '- Equilibrio entre costo y rendimiento\r\nEl sentey m20 es un gabinete con todos las prestaciones necesarias para Transformarse en un gabinete ideal para Gamers\r\n\r\n- Vidrio Templado Con Vidrio Templado, que hara lucir los Coolers de 33 blue leds, de manera extremadamente Gamer. La ma¿yoria de las ventanas suelen ser de materia acrilico. Por esa razon el m20 de Sentey muestra un aspecto único de proimera calidad', '1530885572.png', 7, 0, 1, '2018-07-06', '2018-07-06', 0, NULL),
(34, 'Auricular Beats Hd 900', 2500, 'Acer', 'Audio & Musica', 'Auricular Monster Beats By Dr Dre. BLUETOOTH\r\n- En caja Nuevo. COLOR Azul\r\n- Bluetooth / MP3 / Headset.\r\n- Control Talk / Lector de memoria / Radio.\r\n- Incluye cable cargador y cable 3.5mm.\r\n- Compatible con todos los dispositivos.\r\n- Consulte stock antes de ofertar.', '1532552856.jpg', 24, 0, 1, '2018-07-25', '2018-07-26', 5, '2018-08-03'),
(35, 'Huawei P20 Lite', 10999, 'Huawei', 'Celulares', 'El Huawei P20 Lite es la variante lite de la nueva línea P de Huawei para el 2018. El P20 Lite tiene una pantalla de 5.84 pulgadas a 1080 x 2280 pixels de resolución, procesador Kirin 659, 4GB de RAM, cámara dual de 16 MP + 2 MP, cámara frontal de 16 MP, lector de huellas y batería de 3000 mAh.', '1532553114.webp', 5, 0, 1, '2018-07-25', '2018-07-25', 0, NULL),
(36, 'Samsung S9 Plus', 36999, 'Samsung', 'Celulares', '» Modelo: SM-G9650\r\n» Origen: Argentina\r\n» Pantalla\r\n• Tipo de Pantalla: Super AMOLED \r\n• Tamaño Pantalla: 6.2\" pulgadas\r\n• Resolución de Pantalla: 1440 x 2960 píxeles\r\n• Multitouch: Si\r\n\r\n» Plataforma\r\n• OS: Android 8.0 (Oreo)\r\n\r\n» Hardware y Memoria\r\n• Chipset: 64bits - Samsung Exynos 9 Octa 9810 (10nm) \r\n• Procesador/ Núcleos: Octa-Core, 2 procesadores: 2.7Ghz Quad-Core Kryo 385 Gold / 1.7Ghz Quad-Core Kryo 385 Silver\r\n• Memoria Ram: 6GB LPDDR4X\r\n• Memoria interna: 64GB\r\n• Expandible a: Hasta 400GB microSD, microSDHC, microSDXC', '1532553222.jpg', 10, 0, 1, '2018-07-25', '2018-07-25', 0, NULL),
(37, 'Samsung J5 Prime', 6889, 'Samsung', 'Celulares', '- Modelo: SM-G570\r\n- Nombre de Fantasia: Galaxy J5 Prime\r\n- Fabricante: Samsung\r\n- Operador: LIBRE\r\n- Internet: si\r\n- Smartphone: si\r\n- Camara Frontal (en megapixeles): 5\r\n- Camara Trasera (en megapixeles): 13', '1532553310.webp', 6, 0, 1, '2018-07-25', '2018-07-26', 8, '2018-08-01'),
(38, 'Philips Btm2355/77', 4490, 'Philips', 'Audio & Musica', 'Transmití música de manera inalámbrica a través de Bluetooth™ desde tu smartphone***\r\nBluetooth es una tecnología de comunicación inalámbrica de corto alcance sólida y de bajo consumo. La tecnología permite una fácil conexión inalámbrica a iPod/iPhone/iPad u otros dispositivos Bluetooth, como smartphone, tablet o incluso computadoras portátiles. Por eso, podés disfrutar fácilmente de tu música favorita, el sonido de los videos o los juegos de forma inalámbrica con este parlante.', '1532553563.webp', 4, 0, 1, '2018-07-25', '2018-07-25', 0, NULL),
(39, 'SoundBar Hw-k360', 4999, 'Samsung', 'Audio & Musica', 'La sound bar Samsung HW-K360 de 2.1 canales con sonido Surround y un subwoofer inalámbrico de 5 pulgadas, tiene todo lo que necesitás para conseguir que las películas, tus series favoritas y la música cobren vida de forma instantánea. Ubicala en la parte frontal del televisor y controlá tu barra de sonido desde tu smartphone con la aplicación Samsung Audio Remote (compatible únicamente con Android) o mediante el control remoto incluido.', '1532553832.webp', 5, 0, 1, '2018-07-25', '2018-07-25', 0, NULL),
(40, 'Parlante Sony V11', 9750, 'Sony', 'Audio & Musica', 'Parlante Sony Bluetooth Cd Usb Nfc Dj Mhc-v11\r\n\r\nDiseño compacto para portabilidad máxima\r\nCrea un ambiente festivo con las luces del parlante\r\nFunciones de karaoke para que también cantes', '1532553882.webp', 8, 0, 1, '2018-07-25', '2018-07-26', 20, '2018-08-10'),
(41, 'Jbl Flip 4 Bluetooth', 3290, 'JBL', 'Audio & Musica', 'JBL Flip 4 posee un diseño basado en un cilindro compacto con una zona de rejilla metálica y disponible en varios colores. Es un altavoz Bluetooth fácil de transportar en la mano y perfecto para guardar en una mochila sin que ocupe sitio. El peso está justificado por la sólida y robusta construcción metálica, recubierto de goma para hacerlo más resistente a caídas y al agua. Así no habrá problema alguno para trasladar el JBL Flip 4 del escritorio a la piscina.', '1532553943.webp', 6, 0, 1, '2018-07-25', '2018-07-26', 25, '2018-08-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sinfoto.jpg',
  `phone` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `phone`, `role_id`) VALUES
(1, 'Julian Alexis Drets', 'juliandrets@gmail.com', '$2y$10$TW0bHi9xsmsh9plWgumMQuaMYOQfs6ChACWW/ucNF8q4fD6SrL/qq', 'HlhXD3DX2h5D96Dcf6AqIpWyoBMniiQKGm7EmBoClJ7tWETwoj2q8ChMNUrW', '2018-06-27 17:23:55', '2018-07-09 18:47:56', '1531151276.png', 1568830242, 1),
(12, 'Pedrito', 'asd@asd.asd', '$2y$10$f.V2diFMkebsDoAfVlntxOGnBo8h4Rgi4wK5/h4qNLxqY7FwoRkUu', 'GDrULvwtDMfJxJCWlzTQ4D3pkIDtaurKvWAF8RuZClWHv0xIVdROkqz57w6h', '2018-07-27 17:51:53', '2018-07-27 17:51:53', 'sinfoto.jpg', 0, 2),
(13, 'Veronica', 'verogenoni@hotmail.com', '$2y$10$ZW/LiCtatZwamn2wCPyVUeOmV802Pyg0yC.aA6tQLgjBSw9SK5DYK', NULL, '2018-08-04 03:00:20', '2018-08-04 03:00:20', 'sinfoto.jpg', 0, 2),
(14, 'Julian', 'aaaa@asd.asd', '$2y$10$jq4QpjqyYZrPULY6hJXAk.llCIUT6lt4C8AKskClxIFn8IVA2y23i', 'CjCPFCVDybe0zF3iGStcP70HeMwFJL46dNL3gW2XYgai9PKzUn9G7AESjfx3', '2018-10-26 03:36:48', '2018-10-26 03:36:48', 'sinfoto.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishes`
--

CREATE TABLE `wishes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wishes`
--

INSERT INTO `wishes` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 29, 1, '2018-07-23', '2018-07-23'),
(10, 8, 14, '2018-07-25', '2018-07-25'),
(11, 37, 1, '2018-07-26', '2018-07-26'),
(12, 40, 1, '2018-07-26', '2018-07-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
