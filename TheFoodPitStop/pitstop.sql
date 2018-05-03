-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 05:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pitstop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `subject`, `email`, `message`) VALUES
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'wwewee', 'qwerr', 'cas@hshsh.com', '                    '),
(0, 'James', 'Prices', 'james@email.com', 'Hi, I need prices');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` mediumint(9) NOT NULL,
  `pId` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_fr` varchar(100) NOT NULL,
  `BrandId` varchar(6) DEFAULT NULL,
  `brand` varchar(100) NOT NULL,
  `CategoryId` varchar(7) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `category_fr` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qtyOnHand` int(11) DEFAULT '0',
  `description1` text NOT NULL,
  `description2` text NOT NULL,
  `description1_fr` text NOT NULL,
  `description2_fr` text NOT NULL,
  `imageType` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pId`, `name`, `name_fr`, `BrandId`, `brand`, `CategoryId`, `category`, `category_fr`, `price`, `qtyOnHand`, `description1`, `description2`, `description1_fr`, `description2_fr`, `imageType`) VALUES
(6, 'B0003', 'Villaggio Toscana Extra Soft Crustini Hamburger Buns\r\n', 'Pains crustini extra-moelleux Toscana de Villaggio', 'BR0001', 'VILLAGGIO', 'CTG0001', 'Bakery', 'Boulangerie', '2.97', 0, 'Pack of 8', 'Over the years, Toscane has been worldly famous for culinary experiences through its unique colours, tastes & scents. Inspired by this Italian region, Villaggio Toscana Extra Soft crustini buns offer. \r\n\r\nEnriched Wheat Flour, Water, Vegetable Oil (Canola Or Soybean), Sugar/Glucose-Fructose, Yeast*, Salt, Wheat Gluten, Vinegar, Vegetable Monoglycerides, Corn Flour, Calcium Propionate, Sodium Stearoyl-2', 'Paq. de 8', 'Au fil des années, la Toscane a acquis une réputation mondiale pour les expériences culinaires aux couleurs, aux goûts et aux parfums uniques qu’elle offre. Inspirés de cette région italienne, les pains crustini extra-moelleux Toscana de Villaggio, au goût naturel d’huile d’olive, complètent parfaitement vos délicieux repas au barbecue.\r\n', 'jpg'),
(5, 'B0002', 'Great Value Plain English Muffins', 'Great Value Muffins anglais nature', 'BR0002', 'Great Value', 'CTG0001', 'Bakery', 'Boulangerie', '1.98', 0, 'Pack of 6', 'Make gourmet-style breakfast sandwiches in the comfort of your own home using Great Value Plain English Muffins. Try a combination of Havarti cheese, scrambled egg whites, and roasted red peppers for a delicious alternative to fast food breakfast sandwiches.', 'Paq. de 6', 'Préparez des sandwiches-déjeuners de style gourmet dans le confort de votre maison en utilisant les muffins anglais nature Great Value. Essayez une combinaison de fromage havarti, des blancs d\'œufs brouillés et des poivrons rouges rôtis pour une délicieuse solution de rechange aux sandwiches-déjeuners de restauration rapide.', 'jpg'),
(4, 'B0001', 'Dempster\'s Everything Bagels', 'Pains crustini extra-moelleux Toscana de Villaggio', 'BR0003', 'Dempster\'s', 'CTG0001', 'Bakery', 'Boulangerie', '3.00', 0, 'Pack of 6', 'Each bagel is made using a special recipe and authentic baking process for the texture you love - soft and chewy on the inside, crispy on the outside. Ingredients:\r\nEnriched Wheat Flour; Water; Wheat Gluten*; Sugar; Sesame Seeds; Toasted Onions; Poppy Seeds; Fried Onions (Onion; Vegetable Oil; Wheat Flour; Salt); Yeast*; Salt; Cornmeal; Vegetable Oil (Canola Or Soybean); Garlic Powder; Calcium Propionate; Fumaric Acid; Acetylated Tartaric Acid Esters Of Mono And Diglycerides; Malted Barley Flour; Potassium Sorbate. * Order May Change Contains Wheat; Sesame Seeds And BarleyMay Contain Milk; Eggs And Sulphites**Nutritional values and ingredients on packaging may vary slightly versus what is shown above due to variances in manufacturing processes across multiple manufacturing locations. Please reference the product packaging as it reflects the most accurate information.', 'Paq. de 6', 'Au fil des annÃ©es, la Toscane a acquis une rÃ©putation mondiale pour les expÃ©riences culinaires aux couleurs, aux goÃ»ts et aux parfums uniques quâ€™elle offre. InspirÃ©s de cette rÃ©gion italienne, les pains crustini extra-moelleux Toscana de Villaggio, au goÃ»t naturel dâ€™huile dâ€™olive, complÃ¨tent parfaitement vos dÃ©licieux repas au barbecue.', 'jpg'),
(7, 'B0004', 'Dempster\'s® Original', 'Pains à hot-dog nature originaux Dempster\'s®', 'BR0003', 'Dempster\'s', 'CTG0001', 'Bakery', 'Boulangerie', '2.47', 0, 'Pack of 8', 'Satisfy a hungry crowd with our Dempster\'s® original hot dog buns. Toast them on the grill for even more flavour!\r\n\r\nIngredients:\r\nEnriched Wheat Flour, Water, Sugar / Glucose-Fructose, Yeast*, Vegetable Oil (Canola Or Soybean), Vinegar, Salt, Wheat Gluten, Monoglycerides, Sodium Stearoyl-2-Lactylate, Calcium Propionate, Sorbic Acid, *Order May Change, May Contain Sesame Seeds And Soybean.', 'Paq. de 8', 'Vous réussirez à satisfaire l\'appétit de vos invités grâce aux pains à hot-dog Dempster\'s® original. Grillez-les sur le barbecue pour encore plus de saveur!\r\n', 'jpg'),
(8, 'B0005', 'Your Fresh Market Banana Chocolate Chunk Muffins', 'Muffins Mon marché fraîcheur aux bananes et aux morceaux de chocolat', 'BR0004', 'Your Fresh Market', 'CTG0001', 'Bakery', 'Boulangerie', '4.00', 0, '600 g', 'Your Fresh Market Banana Chocolate Chunk Muffins have a new and improved recipe. The perfect treat for breakfast or break time.\r\n\r\nIngredients:\r\nEnriched wheat flour, soybean and/or canola oil, sugar, liquid whole egg, bananas, chocolate (sugar, unsweetened chocolate, cocoa butter, soy lecithin, vanilla extract, artificial flavour), water, liquid egg white, modified corn starch, buttermilk powder, baking soda, sodium acid pyrophosphate, baking powder, xanthan gum, monocalcium phosphate, salt, mono- and diglycerides, calcium propionate, potassium sorbate, calcium sulfate, sodium stearoyl-lactate, rapeseed and soy lecithin, flavour. Contains: Wheat, eggs, milk, soy. May Contain: Peanuts, tree nuts, sesame.', '600 g', 'Les muffins Mon marché fraîcheur aux bananes et aux morceaux de chocolat ont une nouvelle recette et améliorée. Le plaisir parfait pour le petit-déjeuner ou la pause.', 'jpg'),
(9, 'B0006', 'Your Fresh Market Sliced Banana Walnut Loaf Cake', 'Gâteau quatre-quarts tranché Mon marché fraicheur aux bananes et aux noix', 'BR0004', 'Your Fresh Market', 'CTG0001', 'Bakery', 'Boulangerie', '3.97', 0, '454 g', 'Your Fresh Market Banana Walnut Loaf Cake comes pre-sliced so that you can easily enjoy a slice anywhere on the go. Ideal for taking to work as a tea-break dessert, picnics, or just sharing with a friend, this sweet and nutty cake is sure to have you reaching for another slice.\r\n\r\nIngredients:\r\nIngredients:Enriched Wheat Flour, Bananas, Soybean and/or Canola Oil, Sugar, Liquid Whole Egg, Brown Sugar, Walnuts, Buttermilk Powder, Oats, Cellulose Gum, Baking Powder, Sodium Bicarbonate, Shortening (Canola, Modified Palm and Palm Kernel Oil), Monoglycerides, Salt, Guar Gum, Wheat Bran, Calcium Propionate, Water, Cinnamon, Fancy Molasses, Natural Flavour, Corn Syrup Solids, Amylase, Soy Lecithin. Contains: Milk Eggs, Wheat, Walnuts, Oats, Soy. May Contain: Other tree nuts.', '454 g', 'Le gâteau quatre-quarts aux bananes et aux noix Mon marché fraîcheur est précoupé afin que vous puissiez facilement en déguster une tranche sur la route. Vous ne pourrez vous empêcher de manger une deuxième tranche de ce gâteau sucré aux noix – il est idéal à apporter au travail comme dessert à l’heure du thé, à des pique-niques ou pour partager avec un ami.', 'jpg'),
(10, 'B0007', 'Donut Time Mini Crullers', 'Donut Time Mini roussettes', 'BR0005', 'Donut Time', 'CTG0001', 'Bakery', 'Boulangerie', '1.24', 0, '155 g', 'These mini crullers make for the perfect snack.\r\n\r\nIngredients:\r\nEnrichd wheat flour, water, sugar, icing sugar, modified palm oil, vegetable oil, soya flour, skim milk powder, whey powder, dried yolk, salt, sodium bicarbonate, sodium acid pyrophosphate, calcium sulphate, glucose solids, locust bean gum, mono and diglycerides, agar, soya lecithin, sodium diacetate, xantham gum, artificial flavour, vanillin, colour.', '155 g', 'Ces mini beignets font pour la collation parfaite.\r\n\r\nValeur Nutritive: par 42g: \r\n• Calories - 170\r\n• Lipides - 10 g / 15 %\r\n• Satures - 2 g + trans - 0 g / 11 %\r\n• Polyinsatures - 1 g\r\n• Monoinsatures - 3,5 g\r\n• Cholesterol - 5 mg\r\n• Sodium - 180 mg / 8 %\r\n• Glucides - 20 g / 7 %\r\n• Fibres - 0 g\r\n• Sucres - 10 g\r\n• Proteines - 2 g\r\n• Vitamine A - 0 %\r\n• Vitamine C- 0 %\r\n• Calcium - 2 %,\r\n• Fer - 4%', 'jpg'),
(11, 'B0008', 'Donut Time Chocolate Glazed Mini Donuts', 'Donut Time Mini beignes glacés au chocolat', 'BR0005', 'Donut Time', 'CTG0001', 'Bakery', 'Boulangerie', '1.24', 0, '155 g', 'Classic chocolate glazed donut. A delicious, fun snack.\r\n\r\nIngredients:\r\nWater, enriched wheat flour (with malted barley, sugar, icing sugar, palm oil, soya oil, defatted soya flour, sodium bicarbonate, cocoa powder, sodium acid pyrophosphate, dextrose, wheat starch, hydrogenated soya and cottonseed oils, modified milk ingredients, salt, mono and diglycerides, sodium aluminum phosphate, sodium propionate, potassium sorbate, sorbic acid, corn starch, calcium carbonate, dried egg-white(with sodium lauryl sulfate), natural and artificial flavours, agar, soya lecithin, dried egg yolks(with sodium silicoaluminate), sodium stearoyl-2-lactylate, monocalcium phosphate, cellulose gum, dextrin, glucono delta lactone, guar gum, calcium caseinate, colour(with tartrazine), karaya gum, amylase, sorbiatn monostearate, citric acid.', '155 g', 'Beigne classique glacé au chocolat. Une délicieuse collation.\r\n\r\nValeur nutritive : pour 3 mini beignes (54 g)\r\n• Calories - 230\r\n• Lipides - 13 g / 19 %\r\n• Lipides saturés - 7 g +trans - 0.1 g / 34 %\r\n• Cholestérol - 5 mg\r\n• Sodium - 130 mg / 5 %\r\n• Glucides - 28 g / 9 %\r\n• Fibres - 1 g / 4 %\r\n• Sucres - 15 g\r\n• Protéines - 3 g\r\n• Vitamine A - 0 %\r\n• Vitamine C - 0 %\r\n• Calcium - 4 %\r\n• Fer - 8 %', 'jpg'),
(12, 'B0009', 'Generic Mini Donuts Chocolate Boston Cream', 'Mini beignes à crème au chocolat Boston de Generic', 'BR0006', 'Generic', 'CTG0001', 'Bakery', 'Boulangerie', '3.27', 0, 'Pack of 6', 'MINI DONUTS Chocolate Boston Cream, 6 pack\r\n\r\nIngredients:\r\nWHEAT FLOUR, WATER, VEGETABLE SHORTENING (PALM OIL, MODIFIED PALM OIL, CANOLA OIL), SUGAR, GLUCOSE-FRUCTOSE, DEXTROSE, SOY OIL, YEAST, MODIFIED CORN STARCH, COCOA POWDER, SALT, SOY FLOUR, GLYCERIN, BAKING POWDER, WHEY POWDER, MONO- AND DIGLYCERIDES, WHEAT GLUTEN, SODIUM STEAROYL-2-LACTYLATE, DRIED WHOLE EGG, VEGETABLE OILS (HYDROGENATED COCONUT OIL, HYDROGENATED SOYBEAN OIL), PROPYLENE GLYCOL MONO- AND DIESTERS OF FATTY ACIDS, SKIM MILK POWDER, ACETYLATED TARTARIC ACID ESTERS OF MONO- AND DIGLYCERIDES, CALCIUM PROPIONATE, SOY LECITHIN, POTASSIUM SORBATE, SODIUM BENZOATE, BETA-CAROTENE, NATURAL AND ARTIFICIAL FLAVOUR, AMYLASE, GLUCOSE, POLYSORBATE 80, GLYCERIN, TITANIUM DIOXIDE, METHYLCELLULOSE, XANTHAN GUM, POLYSORBATE 60, GLUCONO DELTA LACTONE, SODIUM ACID SULPHATE, CORN STARCH, CARAMEL COLOUR, ARTIFICIAL COLOURS (TARTRAZINE).CONTAINS: WHEAT, SOY, MILK, EGGS. MAY CONTAIN SULPHITES.', 'Paq. de 6', 'Mini beignes à crème au chocolat Boston de Generic, paq. de 6.\r\n\r\n• Moins de 200 calories par beignet\r\n• Sans arachides\r\n• Kosher latier\r\n• Fabrique au Canada', 'jpg'),
(13, 'B0010', 'Generic Mini Donuts Caramel Crunch', 'Mini beignes à Crunch crème remplie de Generic', 'BR0006', 'Generic', 'CTG0001', 'Bakery', 'Boulangerie', '3.27', 0, 'Pack of 6', 'MINI DONUTS Caramel Crunch, 6 pack\r\n\r\nIngredients:\r\nWHEAT FLOUR, WATER, SUGAR, VEGETABLE SHORTENING (PALM OIL, MODIFIED PALM OIL, CANOLA OIL), DEXTROSE, SOY OIL, YEAST, SALT, SOYA FLOUR, BAKING POWDER, MODIFIED MILK INGREDIENTS, HYDROGENATED PALM KERNEL OIL, MONO AND DIGLYCERIDES, HIGH FRUCTOSE CORN SYRUP, CORN SYRUP, BROWN SUGAR, PROPYLENE GLYCOL MONO- AND DIESTERS OF FATTY ACIDS, WHEAT GLUTEN, SODIUM STEAROYL-2-LACTYLATE, DRY WHOLE EGGS, SKIM MILK POWDER, ENRICHED WHEAT FLOUR, ACETYLATED TARTARIC ACID ESTERS OF MONO- AND DIGLYCERIDES, CALCIUM PROPIONATE, SOY LECITHIN, BETA-CAROTENE, NATURAL AND ARTIFICIAL FLAVOUR, AMYLASE, GLUCOSE, GLUCOSE-FRUCTOSE, POLYSORBATE 80, GLYCERIN, CARBOHYDRATE GUM, CARAMEL COLOUR, POLYSORBATE 60, SOY PROTEIN ISOLATE, MODIFIED CORN STARCH, SODIUM BENZOATE, POTASSIUM SORBATE, HYDROGENATED SOY OIL, POLYGLYCEROL ESTERS OF FATTY ACIDS, HYDROGENATED MODIFIED PALM OIL, XANTHAN GUM, CORN STARCH, GLUCONO DELTA LACTONE, SODIUM ACID SULFATE, CARAMEL COLOR, ARTIFICIAL COLOUR, SODIUM PROPIONATE, SULPHITES,CONTAINS: WHEAT, SOY, MILK, EGGS AND SULPHITES.', 'Paq. de 6', 'Mini beignes à Crunch crème remplie de Generic, paq. de 6.\r\n\r\n• Moins de 200 calories par beignet\r\n• Sans arachides\r\n• Kosher latier\r\n• Fabrique au Canada', 'jpg'),
(14, 'B0011', 'Our Finest Chocolate Lover\'s Variety Cheesecake', 'Assortiment de gâteaux au fromage pour amateurs de chocolat Notre Excellence', 'BR0007', 'Our Finest', 'CTG0001', 'Bakery', 'Boulangerie', '14.00', 0, '12 x 84 g', 'Our Finest Chocolate Lover\'s Variety Cheesecakes features four delectable flavours of authentic New York-style cheesecake - Triple Chocolate, Chocolate Brownie, White Chocolate Raspberry and Pecan, Chocolate & Caramel.\r\n\r\nIngredients: cream cheese (milk ingredients, bacterial culture, salt, carob bean gum, guar gum, xanthan gum), sugar, liquid whole egg, sour cream (cultured pasteurized milk, cream, modified corn starch, sodium phosphate, carob bean gum, carrageenan, microbial enzyme), chocolate crumb (enriched wheat flour, soybean and/or palm oil, sugar, cocoa powder, corn syrup, salt), raspberries, pecans, chocolate chips (chocolate liquor, sugar, anhydrous dextrose, soya lecithin, vanillin), modified corn starch, cream, caramel (cornsyrup, water, butter, brown sugar, natural flavour, salt, blackstrap molasses, pectin, soy lecithin, canola oil, modified palm oil, modified palm kernel oil, mono and diglycerides, xanthan gum, carob bean gum, cellulose gum, non-hydrogenated coconut oil), corn syrup, whole milk powder, cocoa butter, natural flavour, modified palm oil, butter oil, water, propylene glycol alginate, xanthan gum, citric acid, carob bean gum, carrageenan, salt, ascorbic acid, soybean oil, palm oil, soy lecithin, colour.Contains: milk, eggs, wheat, soy and pecans. may contain: other tree nuts not listed.', '12 x 84 g', 'Les gâteaux au fromage assortis pour amateurs de chocolat Notre Excellence présentent quatre succulentes saveurs de gâteau au fromage à la new-yorkaise authentique : triple chocolat, carré au chocolat, framboises et chocolat blanc et pacanes, chocolat et caramel.', 'jpg'),
(15, 'B0012', 'Your Fresh Market Marble Coffee Cake', 'Mon marché fraîcheur Gâteau quatre-quarts Marbé', 'BR0004', 'Your Fresh Market', 'CTG0001', 'Bakery', 'Boulangerie', '4.00', 0, '454 g', 'Wow your family and friends with the help of a lovely Your Fresh Market Marble Coffee Cake. A rich combination of moist cake with luscious chocolate and vanilla flavoured swirls, this convenient confection from Your Fresh Market makes for a fantastically fun treat.\r\n\r\nIngredients: cake: enriched wheat flour, sugar, liquid whole egg, canola and/or soybean oil, water, modified corn starch, modified milk ingredients, cocoa, natural flavour, baking powder, wheat starch, salt, cellulose gum, calcium propionate. Icing: icing sugar, water, glucose, dextrose, propylene glycol, natural and artificial flavours, colour, agar, sorbic acid, mono and diglycerides, carob bean gum.Contains: wheat, eggs, milk.May contain: peanuts, tree nuts, soy, sulphites.', '454 g', 'Impressionnez votre famille et vos amis grâce au joli gâteau danois marbré Mon marché fraîcheur. Ce riche gâteau moelleux agrémenté de délicieux tourbillons au chocolat et à la vanille transforme cette confection Mon marché fraîcheur pratique en une gâterie amusante.', 'jpg'),
(16, 'B0013', 'Dempster’s100% Whole Grains 12 Grain Bread', 'Pain de grains entiers à 100 % 12 céréales Dempster’s', 'BR0003', 'Dempster\'s', 'CTG0001', 'Bakery', 'Boulangerie', '2.37', 0, '600 g', 'Whole Grain Whole Wheat Flour Including The Germ; Water; Grain Blend (Flaxseeds; Rye Flour; Sunflower Seeds; Oat Flakes; Malted Wheat Flakes; Millet; Triticale Flakes; Sesame Seeds; Cornmeal; Rice Flo', '600 g', 'Savourez la saveur robuste de ces 12 céréales et graines nourrissantes qui vous offrent une expérience gustative copieuse et sauront vous satisfaire tout au long de la journée! Chaque tranche est une source de fibres et de gras polyinsaturés oméga-3. Issu de notre meilleure recette à ce jour, votre pain aux 12 céréales préféré ne contient pas de saveurs ni colorants artificiels.', 'jpg'),
(17, 'B0014', 'Great Value Enriched White Bread', 'Great Value Pain à blanc enrichi', 'BR0002', 'Great Value', 'CTG0001', 'Bakery', 'Boulangerie', '1.64', 0, '675 g', 'Your family will enjoy the classic great taste of Great Value Enriched White Bread. Always be prepared to make a quick meal on the go when you keep a bag or two of Great Value Enriched White Bread on hand in your pantry or freezer.', '675 g', 'Votre famille adorera le goût délicieux et classique du pain blanc enrichi Great Value. Soyez toujours prêt à préparer un repas rapidement lorsque vous conservez un sac ou deux de pain blanc enrichi Great Value dans votre garde-manger ou dans votre congélateur.', 'jpg'),
(18, 'B0015', 'Villaggio® Classico Thick Sliced Italian Style Bread', 'Pain blanc Classico de VillaggioMD de style italien à tranches épaisses', 'BR0001', 'VILLAGGIO', 'CTG0001', 'Bakery', 'Boulangerie', '2.97', 0, '675 g', 'Villaggio® bread is baked with a golden crust and topped with flour dusting. Soft, hearty and delicious – Villaggio is simply irresistible.\r\n\r\nIngredients:\r\nEnriched Wheat Flour,Water,Yeast*,Sugar/Glucose-Fructose,Vegetable Oil (Canola Or Soybean),Salt,Wheat Gluten*,Vinegar,Calcium Propionate,Sodium Stearoyl-2-Lactylate,Sorbic Acid,Acetylated Tartaric Acid Esters Of Mono And Diglycerides,Soybean Lecithin. *Order May Change. Contains Wheat And Soybean.May Contain Sesame Seeds.', '675 g', 'Le pain de VillaggioMD à la croûte dorée est saupoudré de farine. Moelleux, copieux et délicieux; Villaggio est tout simplement irrésistible.\r\n\r\n', 'jpg'),
(19, 'B0016', 'All But Gluten Gluten-Free Whole Grain Loaf', 'Pain à céréales entières sans gluten de Tout Sauf Gluten', 'BR0008', 'All But Gluten', 'CTG0001', 'Bakery', 'Boulangerie', '4.98', 0, '600 g', 'Finally a great tasting nutritious gluten-free whole grain bread \r\nA source of fibre \r\nEnriched with vitamins & minerals \r\nDairy free & Kosher\r\n\r\nIngredients:\r\nENRICHED GLUTEN-FREE BLEND [BROWN RICE FLOUR, TAPIOCA STARCH, CORN STARCH, FLAX SEEDS, SUNFLOWER SEEDS, BUCKWHEAT FLOUR, THIAMINE (VITAMIN B1), RIBOFLAVIN (VITAMIN B2), NIACIN, IRON, FOLATE], WATER, DRIED EGG-WHITE (DRIED EGG-WHITE, YEAST, CITRIC ACID), SOYBEAN AND/OR CANOLA OIL, CHICORY ROOT INULIN, SUGAR, YEAST, XANTHAN GUM, SALT, VEGETABLE MONOGLYCERIDES, CALCIUM PROPIONATE, MODIFIED CELLULOSE, SORBIC ACID,CALCIUM CARBONATE, CALCIUM PANTOTHENATE, CALCIUM SULPHATE, PYRIDOXINE HYDROCHLORIDE, TRICALCIUM PHOSPHATE, ENZYME.May contain: sesame seeds, soy', '600 g', 'Enfin un pain de grains entiers sans gluten délicieux et nourrissant \r\nUne source de fibres \r\nEnrichi de vitamines et minéraux \r\nAucun produit laitier et certifié casher\r\n\r\nProduit fabriqué dans une usine certifiée sans gluten Arbore le symbole GFCP, endossé par l\'Association canadienne de la maladie coeliaque \r\nRépond aux normes de Santé Canada car il ne contient que 20 parties par million de gluten \r\nOffert dans le rayon des produits de boulangerie frais, et non celui des congelés', 'jpg'),
(20, 'B0019', 'Old El Paso™ Soft Souples Tortillas\r\n', 'Tortillas souples d\'Old El PasoMC', 'BR0009', 'Old El Paso', 'CTG0001', 'Bakery', 'Boulangerie', '2.97', 0, '8 Tortillas, 334 g', 'Great food comes wrapped up with Old El Paso™ Flour Tortillas. Gently warmed, these light and soft tortillas are simply delicious wrapped around your favourite ingredients to create mouth-watering meals in minutes. Get creative, wrap \'em up and enjoy!\r\n\r\nIngredients:\r\nEnriched Wheat Flour, Water, Soybean Oil Shortening, Glycerin, Corn Syrup Solids, Salt, Baking Soda, Sodium Aluminum Phosphate, Fumaric Acid, Potassium Sorbate, Calcium Propionate, Monoglycerides, Wheat Starch, Amylase, Xylanase, L-Cysteine Hydrochloride. Contains Wheat Ingredients.', '8 Tortillas, 334 g', 'Une bonne nourriture est enveloppé avec des tortillas à la farine d’Old El PasoMC. Doucement réchauffés, ces tortillas légères et douces sont tout simplement délicieux enroulé autour de vos ingrédients préférés pour créer des repas appétissants en quelques minutes. Soyez créatif, enroulez et savourez!\r\n\r\n• Essayez également les autres coquilles et tortillas Old El Paso\r\n', 'jpg'),
(21, 'B0020', 'Tia Rosa Fajita Kit\r\n', 'Ensemble à fajita Tia Rosa\r\n', 'BR0011', 'Tia Rosa', 'CTG0001', 'Bakery', 'Boulangerie', '4.98', 0, '12 Pk', 'Voici l’ensemble à fajita au goût authentique de la marque de tortillas no 1 au Mexique, Tia RosaMD. Chaque ensemble contient 12 tortillas, un sachet de sauce et un sachet d’assaisonnement. L’ensemble à fajita Tia RosaMD ne contient pas d’arômes ni de colorants artificiels et est offert dans le rayon des pains chez Walmart. Un souper rapide et délicieux qui plaira assurément à votre famille!\r\n', '12 Pk', 'Voici l’ensemble à fajita au goût authentique de la marque de tortillas no 1 au Mexique, Tia RosaMD. Chaque ensemble contient 12 tortillas, un sachet de sauce et un sachet d’assaisonnement. L’ensemble à fajita Tia RosaMD ne contient pas d’arômes ni de colorants artificiels et est offert dans le rayon des pains chez Walmart. Un souper rapide et délicieux qui plaira assurément à votre famille!\r\n', 'jpg'),
(22, 'D0001', 'Pepsi Carbonated Soft Drink\r\n', 'Boisson gazeuse de Pepsi\r\n', 'BR0012', 'Pepsi', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, '6x222 mL', 'Pepsi Mini Cans – perfect for parties, meals, and celebrations big and small! Each can has only 100 calories, making them great for portion control. Little cans – big satisfaction.\r\n\r\nIngredients:\r\nCarbonated water, glucose-fructose and/or sugar, caramel colour, phosphoric acid, caffeine, citric acid, natural flavour.', '6x222 mL', 'Mini-canettes de Pepsi en emballage de 6 x 222 ml – le format parfait pour les rassemblements, les repas et les célébrations en tout genre! Chaque canette ne contient que 100 calories, ce qui en fait le format parfait pour le contrôle des portions. De petites canettes remplies de plaisir!\r\n', 'jpg'),
(23, 'D0002', 'Coca-Cola Classic\r\n', 'Coca-Cola Classique\r\n', 'BR0013', 'Coca-Cola', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, '6 x 222 mL', 'The same Coca-Cola taste you love is now available in a sleek new package. At 100 calories or less per serving, the new Coca-Cola sleek can is perfectly portioned for consumers who want a little treat at meal time, snack time or any time! It\'s slim design means no more crushed sandwiches in those lunch bags - it fits comfortably in your lunch containers, bags and backpacks.\r\n\r\nCarbonated Water, Sugar/glucose-fructose, Caramel Colour, Phosphoric Acid, Natural Flavours, Caffeine \r\n', '6 x 222 mL', 'Le même bon goût de Coca-Cola, maintenant offert dans un nouvel emballage épuré. À moins de 100 calories par portion, les nouvelles canettes au design épuré de Coke sont parfaitement proportionnées pour les consommateurs qui veulent s\'offrir une petite gâterie aux repas, aux collations ou à n\'importe quel moment! Petites, elles n\'écraseront pas les sandwichs et se mettront facilement dans les boîtes à lunch, les sacs et les sacs à dos.\r\n\r\nEau Gazeifiee, Sucre/glucose-fructose, Colorant Au Caramel, Acide Phosphorique, Essences Naturelles, Cafeine\r\n', 'jpg'),
(24, 'D0003', 'Diet Coke 6x222mL\r\n\r\n', 'Coke Diete 6x222mL\r\n', 'BR0013', 'Coca-Cola', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, 'Diet Coke 6PK', 'The same Diet Coke taste you love is now available in a sleek new package.  At 100 calories or less per serving, the new Coca-Cola sleek can is perfectly portioned for consumers who want a little treat at meal time, snack time or any time! It\'s slim design means no more crushed sandwiches in those lunch bags - it fits comfortably in your lunch containers, bags and backpacks. \r\n\r\nCarbonated Water, Caramel Colour, Phosphoric And Citric Acid, Aspartame (contains Phenylalanine), Flavours, Sodium Benzoate, Caffeine, Acesulfame-potassium \r\n', 'Coke Diete 6PK', 'Le même bon goût de Coke Diete, maintenant offert dans un nouvel emballage épuré.  À moins de 100 calories par portion, les nouvelles canettes au design épuré de Coke sont parfaitement proportionnées pour les consommateurs qui veulent s\'offrir une petite gâterie aux repas, aux collations ou à n\'importe quel moment! Petites, elles n\'écraseront pas les sandwichs et se mettront facilement dans les boîtes à lunch, les sacs et les sacs à dos. \r\n\r\nEau Gazeifiee, Colorant Au Caramel, Acide Phosphorique Et Citrique, Aspartame (contient De La Phenylalanine), Essences, Benzoate De Sodium, Cafeine, Acesulfame-potassium\r\n', 'jpg'),
(25, 'D0004', 'Dr. Pepper Diet Carbonated Soft Drink\r\n', 'Boisson gazeuse Dr. Pepper Diète\r\n', 'BR0014', 'Dr. Pepper', 'CTG0002', 'Drinks', '', '4.97', 0, '12x355 mL', 'If you\'re looking for a soft drink with an authentically different taste, nothing satisfies quite like a Diet Dr Pepper Soda. Diet Dr Pepper has an original recipe of 23 signature flavors blended into one deliciously unique beverage that doesn\'t sacrifice great taste for zero calories. Established in 1885, Dr Pepper has an iconic history of delivering satisfying refreshment. Often imitated and never duplicated, Diet Dr Pepper is always one of a kind.\r\n\r\nIngredients:\r\nCarbonated Water, Colour, Aspartame (183.6 Mg/355 Ml, Contains Phenylalanine), Phosphoric Acid, Natural And Artificial Flavour, Sodium Benzoate, Caffeine.', '12 x 355 ml', 'Si vous recherchez une boisson gazeuse qui a un goût authentique vraiment différent, rien n’est aussi bon qu’un Dr Pepper diète. La recette originale de Dr Pepper diète contient 23 saveurs distinctes qui s’unissent pour devenir une boisson délicieusement unique. De plus, aucun compromis en matière de goût n’est fait, même lorsqu’il y a zéro calorie. Dr Pepper est reconnu pour être totalement rafraîchissant depuis 1885… en voilà une histoire incroyable! Souvent imité, mais jamais reproduit, Dr Pepper diète est toujours unique en son genre.\r\n', 'jpg'),
(26, 'D0005', 'Sprite', 'Sprite', 'BR0013', 'Coca-Cola', 'CTG0002', 'Drinks', 'Boissons', '5.97', 0, '12 x 355 mL', 'Sprite is a caffeine free lemon-lime sparkling beverage with no artificial flavours or colours.\r\n\r\nCarbonated Water, Sugar/glucose-fructose, Citric Acid, Sodium Citrate, Natural Flavours, Sodium Benzoate \r\n', '12 x 355 mL', 'Sprite est une boisson gazeuse à saveur de citron-lime sans caféine et sans arôme ou colorant artificiel.', 'jpg'),
(27, 'D0006', '7UP® Carbonated Soft Drink\r\n', 'Boisson gazeuse 7UP(MD)\r\n', 'BR0015', '7UP', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, '6x222 mL', 'Enjoy the refreshing taste of 7up® made with 100% natural flavours. A clear soda that is an uplifting combination of lemon, lime, and bubbles. Natural lemon and lime flavours. Caffeine Free.\r\n\r\nIngredients:\r\nCarbonated Water, Glucose-Fructose And/Or Sugar, Natural Flavours, Citric Acid, Malic Acid, Sodium Citrate, Sodium Benzoate.', '6x222 mL', 'Savourez le goût rafraîchissant des boissons gazeuses 7UP(MD) faites à 100 % à partir d’arômes naturels. Il s’agit d’une boisson claire et pétillante qui offre la combinaison parfaite de citron et de lime. Sans caféine.\r\n', 'jpg'),
(28, 'D0007', 'Canada Dry Gingerale\r\n', 'Canada Dry Soda Gingembre\r\n', 'BR0013', 'Coca-Cola', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, '6 x 222 mL', 'The same Canada Dry Gingerale taste you love is now available in a sleek new package. At 100 calories or less per serving, the new Coca-Cola sleek can is perfectly portioned for consumers who want a little treat at meal time, snack time or any time! It\'s slim design means no more crushed sandwiches in those lunch bags - it fits comfortably in your lunch containers, bags and backpacks.\r\n\r\nCarbonated water, sugar/glucose-fructose, citric acid, natural flavour, sodium benzoate, colour ', '6 x 222 mL', 'Le même bon goût de Canada Dry Soda Gingembre , maintenant offert dans un nouvel emballage épuré. À moins de 100 calories par portion, les nouvelles canettes au design épuré de Coke sont parfaitement proportionnées pour les consommateurs qui veulent s\'offrir une petite gâterie aux repas, aux collations ou à n\'importe quel moment. Petites, elles n\'écraseront pas les sandwichs et se mettront facilement dans les boîtes à lunch, les sacs et les sacs à dos.\r\n\r\nEau gazeifiee, sucre/glucose-fructose, acide citrique, essence naturelle, benzoate de sodium, colorant\r\n', 'jpg'),
(29, 'D0008', 'Schweppes Ginger Ale Soda\r\n', 'Soda de gingembre de Schweppes\r\n', 'BR0016', 'Schweppes', 'CTG0002', 'Drinks', 'Boissons', '2.77', 0, '6x222 mL', 'Perfectly refined since 1783, Schweppes Ginger Ale packs a crisp and clean taste you are sure to love! Authentic and original, Schweppes Ginger Ale is the ultimate in refreshment. The new slim can design provides the ultimate flexibility in refreshment. Refresh yourself with Schweppes Ginger Ale in a 222mL single serve. All of the bold taste you love in a smaller can!\r\n\r\nIngredients:\r\nCarbonated Water, Sugar/Glucose-Fructose, Citric Acid, Sodium Benzoate, Colour, Natural Flavour.', '6x222 mL', 'Parfaitement raffiné depuis 1783, Schweppes Soda gingembre est rempli du goût pur et vif que vous aimez! Authentique et original, Schweppes Soda gingembre est le rafraîchissement par excellence. La nouvelle mini cannette vous permet d’augmenter les occasions de vous rafraîchir. Savourez tout le goût intense du Schweppes Soda gingembre que vous aimez dans cette petite cannette de 222 ml.\r\n', 'jpg'),
(30, 'D0009', 'Perrier Carbonated Natural Spring Water\r\n', 'Perrier Eau de source naturelle gazéifiée\r\n', 'BR0017', 'Perrier', 'CTG0002', 'Drinks', 'Boissons', '1.33', 0, '750 mL', 'The ultimate refreshment to quench all thirsts. The strength of Perrier\'s bubbles will leave you wanting more.\r\n', '750 mL', 'L’incroyable pouvoir désaltérant des bulles de Perrier étanche toutes les soifs. Vous en redemanderez !\r\n', 'jpg'),
(31, 'D0010', 'Great Value Diet Ginger Ale\r\n', 'Great Value soda gingembre diète\r\n', 'BR0002', 'Great Value', 'CTG0002', 'Drinks', 'Boissons', '0.97', 0, '2 L', 'Great Value Diet Ginger Ale. Calorie free, sugar free soda.\r\n\r\nIngredients:\r\nCarbonated water, citric acid, natural flavour, potassium benzoate, sucralose 55mg/ 355mL, colour, acesulfame-potassium 21mg/ 355mL', '2 L', 'Great Value soda gingembre diète. Soda sans calorie/ sans sucre.\r\n', 'jpg'),
(32, 'D0011', 'Schweppes Tonic Water\r\n', 'Soda Tonique de Schweppes\r\n', 'BR0016', 'Schweppes', 'CTG0002', 'Drinks', 'Boissons', '1.97', 0, '2 L', 'Perfectly refined since 1783, Schweppes Tonic Water offers a unique sparkling drink, pefect for mixing. Provide the pefect mixer, to your social event with this 2L of Schweppes Tonic Water. 2L allows everyone to enjoy the unique sparkling taste of Schweppes Tonic Water.\r\n\r\nIngredients:\r\nCarbonated Water, Sugar/Glucose-Fructose, Citric Acid, Sodium Benzoate, Quinine, Natural Flavour.', '2 L', 'Parfaitement raffiné depuis 1783, Schweppes Soda tonique est une boisson pétillante unique qui se mélange parfaitement aux cocktails. La bouteille de 2 l du Schweppes Soda tonique sera bien accueillie à votre prochaine réception! Ainsi, tout le monde pourra savourer le goût unique de cette boisson pétillante.\r\n', 'jpg'),
(33, 'D0012', 'Sprite Zero Diet Soft Drinks\r\n', 'Boissons gazeuses dietes zero de Sprite\r\n', 'BR0018', 'Sprite', 'CTG0002', 'Drinks', 'Boissons', '1.97', 0, '2 L', 'Same great Lemon-Lime taste as regular Sprite but with, 0 Calories, 0 Caffeine.\r\n', '2 L', 'Possède la même saveur citron-lime que le Sprite classique, mais sans calories ni caféine.\r\n', 'jpg'),
(34, 'D0013', 'Allen\'s 100% Pure Apple Juice\r\n', 'Jus de pomme Allen\'s 100 % pur\r\n', 'BR0019', 'Allen\'s', 'CTG0002', 'Drinks', 'Boissons', '0.97', 0, '1 L', '100% Pure Apple Juice from concentrateVitamin C addedNo sugar addedLow Acid\r\n\r\nShake well, Serve chilled, Refrigerate after openingShelf life in fridge after container opened: 10 daysDo not consume if out of refrigerator for 6 hours or moreKeep refrigerated  ( 00 to 40 C ) Assembled product dimensions: L 8.00 cm x W 7.50 cm x H 24.30 cm x W 107.46 grams', '1 L', 'Jus de Pomme fait de concentré 100% PurVitamine C ajoutéeSans sugre ajoutéÀ faible acidité\r\n\r\nBien agiter, Servir froid, Réfrigérer après ouvertureDurée de vie au réfrigérateur après ouverture: 10 joursNombre d\'heures hors réfrigération (Ne pas consommer après ce délai): 6 heuresGarder réfrigéré ( 00 à 40 C )Dimensions du produit assemblé : l 8.00 cm x P 7.50 cm x L 24.30 cm x p 107.46 grams\r\n', 'jpg'),
(35, 'D0014', 'Oasis Pure Breakfast Orange Juice\r\n', 'Jus Pur Déjeuner Orange Oasis\r\n', 'BR0020', 'Oasis', 'CTG0002', 'Drinks', '', '1.67', 0, '960 mL', '100% JuiceA blend of fruit juice made from concentrateVitamin C addedNo sugar addedExcellente juice to begin the day.\r\n\r\nShake well, Serve chilled, Refrigerate after openingShelf life in fridge after container opened: 10 daysDo not consume if out of refrigerator for 4 hours or moreKeep refrigerated  ( 00 to 40 C ) Assembled product dimensions: L 8.00 cm x W 7.50 cm x H 24.30 cm x W 103.37 grams\r\n', '960 mL', '100% JusUn mélange de jus fait de concentréVitamin C ajoutéeSans sucre ajouté Excellent jus pour débuter la journée.\r\n\r\nBien agiter, Servir froid, Réfrigérer après ouvertureDurée de vie au réfrigérateur après ouverture: 10 joursNombre d\'heures hors réfrigération (Ne pas consommer après ce délai): 4 heuresGarder réfrigéré ( 00 à 40 C )Dimensions du produit assemblé : l 8.00 cm x P 7.50 cm x L 24.30 cm x p 103.37 grams\r\n', 'jpg'),
(36, 'D0015', 'SunRype 100% Pineapple Juice\r\n', 'Ananas\r\n', 'BR0021', 'Sun-Rype Products Lt', 'CTG0002', 'Drinks', 'Boissons', '1.67', 0, '900 mL', 'Try pineapple for a golden tropical taste sensation. It’s fruitfully delicious with no added sugar and no artificial flavours or colours.\r\n', '900 mL', 'Savourez le goût de l’ananas et laissez-vous emporter par la vague tropicale. Généreusement fruité, sans sucre ajouté, ni arôme ou colorant artificiels\r\n', 'jpg'),
(37, 'D0016', 'Great Value Orange Juice\r\n', 'Jus Orange Great Value\r\n', 'BR0002', 'Great Value', 'CTG0002', 'Drinks', 'Boissons', '1.00', 0, '1 L', 'Make your family\'s morning a bright and sunny one when you serve up the refreshing citrus flavour of Great Value Orange Juice from concentrate. Unsweetened and pasteurized, this classic orange juice is a great source of Vitamin C, and an even greater way to start your morning with the yummy zing of a glass of OJ. \r\n\r\nShake well, Serve chilled, Refrigerate after openingShelf life in fridge after container opened: 10 daysDo not consume if out of refrigerator for 4 hours or more  Assembled product dimensions: L 6.03 cm x W 9.40 cm x H 20.32 cm x W 108.86 grams\r\n', '1 L', 'Ensoleillez le réveil de votre famille en lui servant le goût d’agrumes rafraîchissant du Jus d’orange fait de concentré Great Value. Pasteurisé et non sucré, ce jus d’orange classique est une excellente source de vitamine C, mais aussi une manière fantastique de commencer la journée avec un grand verre de jus délicieux.\r\n\r\nBien agiter, Servir froid, Réfrigérer après ouvertureDurée de vie au réfrigérateur après ouverture: 10 joursNombre d\'heures hors réfrigération (Ne pas consommer après ce délai): 4 heures   Dimensions du produit assemblé : l 6.03 cm x P 9.40 cm x L 20.32 cm x p 108.86 grams', 'jpg'),
(38, 'D0017', 'McCafé Coffee-Ground Premium Roast\r\n', 'Café moulu de McCafé - torréfaction supérieure\r\n', 'BR0022', 'McCafé', 'CTG0002', 'Drinks', 'Boissons', '17.97', 0, '950 g', 'McCafé coffee-ground premium roast\r\n\r\nAvailable for Shipping to Canada PostYesDecaffeinated No Lifestyle & Dietary Need N/A Product Type Ground Storage Type Shelf Brand McCafé Product IdentifiersWalmart Item #31013443 SKU 6000188475472 UPC', '950 g', 'Café moulu Torréfaction supérieure McCafé\r\n\r\nOffert pour l’expédition à un emplacement Postes CanadaOuiDécaféiné Non Style de vie et besoin alimentaire N.D. Type d\'entreposage Tablette Type de produit Moulu Marque McCafé Identificateurs de produitN° d’article Walmart31013443 CUP 6618800311 SKU 6000188475472', 'jpg'),
(39, 'D0018', 'Keurig Van Houtte Colombian Medium Ground Coffee Beans\r\n', 'Grains de café moulu Mi-Noir Colombien Van Houtte de Keurig\r\n', 'BR0023', 'Keurig', 'CTG0002', 'Drinks', 'Boissons', '15.77', 0, '908 g', 'Colombian coffee is second to none for the aficionado\'s palate. Dark roasted, this bold coffee unveils a rich aroma intensified by its fruity notes and fragrance.\r\n\r\nIngredients:\r\n100% Arabica coffee', '908 g', 'Sans pareil pour le palais des aficionados, le café colombien demeure un incontournable. Torréfié noir, il dévoile une saveur corsée et un arôme riche intensifié par ses notes relevées de fruits et par son bouquet soutenu.\r\n', 'jpg'),
(40, 'D0019', 'Tetley Chai Tea\r\n', 'Thé chaï de Tetley\r\n', 'BR0024', 'Tetley Tea', 'CTG0002', 'Drinks', 'Boissons', '3.47', 0, 'Pack of 20', 'Taste the exotic with the deliciously balanced flavours of cinnamon, cardamom, ginger, star anise and cloves. Inspired by the traditional Indian Chai, this flavourful and aromatic adventure is sure to soothe and delight.\r\n\r\nTetley Chai Tea\r\n', '20 pk', 'Essayez ce mélange exotique et délicieusement équilibré aux accents de cannelle, de cardamome, d’anis étoilé, de clou de girofle et de gingembre. Inspiré par la recette du traditionnel thé chaï indien, ce thé savoureux et aromatique à souhait apaise tout en charmant les sens.\r\n\r\nThé chaï de Tetley', 'jpg'),
(41, 'D0020', 'Nabob Tradition Fine Grind Medium Roast Coffee\r\n', 'Ingredient: 100% Arabica Coffee.', 'BR0025', 'Nabob', 'CTG0002', 'Drinks', 'Boissons', '16.97', 0, '930 g\r\n', 'Over 115 years of attention went into this perfectly balanced cup of coffee with delicate hints of cocoa and citrus. As our Roastmaster’s original coffee, this blend is perfect for those who appreciate the classics.\r\n\r\nIngredient: 100% Arabica Coffee.\r\n', '930 g', 'Plus de 115 ans de savoir-faire nous aident à torréfier ce café parfaitement équilibré, aux notes délicates de cacao et d’agrumes. Café original de nos maîtres torréfacteurs, ce mélange est parfait pour les personnes qui apprécient les cafés classiques.\r\n', 'jpg'),
(42, 'B0017', 'Dempster\'s 10\" Whole Wheat Tortillas', 'Dempster\'s Tortillas de blé entier 10 po', 'BR0003', 'Dempster\'s', 'CTG0001', 'Bakery', '', '3.98', 0, '10 x 61 g', 'Discover the many quick and delicious meals your family can enjoy with Dempster\'s soft and versatile tortillas!\r\n\r\nIngredients:\r\nWhole Grain Whole Wheat Flour Including The Germ,Water,Vegetable Oil (Canola Or Soybean),Mono And Diglycerides,Molasses,Salt,Potassium Sorbate,Sugar,Sodium Bicarbonate,Sodium Propionate,Sodium Acid Pyrophosphate,Sodium Stearoyl-2-Lactylate,Fumaric Acid,Cornstarch,Monocalcium Phosphate,Guar Gum,Cellulose Gum,Maltodextrin,Carrageenan,Calcium Acid Pyrophosphate,Calcium Peroxide. MAY CONTAIN SESAME SEEDS, SOYBEAN, MILK INGREDIENTS, EGG AND SULPHITES.', '10 x 61 g', 'Découvrez les nombreux repas rapides et délicieux dont toute la famille raffolera avec les tortillas souples et polyvalentes de Dempster\'s!\r\n\r\n', 'jpg'),
(43, 'B0018', 'Great Value White Tortillas 10\"', 'Great Value Tortillas blanches 10\"\r\n', 'BR0002', 'Great Value', 'CTG0001', 'Bakery', 'Boulangerie', '3.87', 0, '10 x 61 g', 'Great Value White Tortillas give you limitless possibilities for delicious and reasonably-priced meals that the whole family will love. Wrap up your favourite sandwich fillings, load up with taco fixings, or melt cheese in these round white tortillas for a tasty alternative to bread.\r\n', '10 x 61 g', 'Les tortillas blanches de Great Value vous offrent des possibilités illimitées de repas délicieux et à prix raisonnable dont toute la famille raffolera. Enroulez vos garnitures à sandwiches préférées, remplissez-les d\'une préparation à tacos, ou faites fondre du fromage dans ces tortillas blanches rondes comme option savoureuse en remplacement du pain.\r\n', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` mediumint(9) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pickupDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pickupTime` varchar(15) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(6,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `username`, `pickupDate`, `pickupTime`, `subtotal`, `tax`, `total`) VALUES
(1, '2018-04-26 00:00:00', 'stev@abc.com', '2018-04-26 00:00:00', 'Morning', '17.58', '0.00', '17.58'),
(2, '2018-04-26 00:00:00', 'stev@abc.com', '2018-04-26 00:00:00', 'Evening', '12.96', '0.00', '12.96'),
(0, '2018-04-29 00:00:00', 'james@email.com', '2018-04-29 00:00:00', 'Evening', '2.97', '0.00', '2.97'),
(0, '2018-04-30 00:00:00', 'val@mac.com', '2018-04-30 00:00:00', 'Afternoon', '1.98', '0.00', '1.98'),
(0, '2018-04-30 00:00:00', 'val@mac.com', '2018-04-30 00:00:00', 'Evening', '4.00', '0.00', '4.00'),
(0, '2018-04-30 00:00:00', 'val@mac.com', '2018-04-30 00:00:00', 'Evening', '3.97', '0.00', '3.97'),
(0, '2018-04-30 00:00:00', 'val@mac.com', '2018-04-30 00:00:00', 'Evening', '1.98', '0.00', '1.98'),
(0, '2018-05-01 00:00:00', 'val@mac.com', '2018-05-01 00:00:00', 'Evening', '8.91', '0.00', '8.91'),
(0, '2018-05-01 00:00:00', 'val@mac.com', '2018-05-01 00:00:00', 'Evening', '11.92', '0.00', '11.92'),
(0, '2018-05-02 00:00:00', 'tb@mail.com', '0000-00-00 00:00:00', '', '87.15', '0.00', '87.15');

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` mediumint(9) NOT NULL,
  `salesId` mediumint(9) NOT NULL,
  `productId` varchar(9) NOT NULL,
  `Qty` mediumint(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesdetails`
--

INSERT INTO `salesdetails` (`id`, `salesId`, `productId`, `Qty`) VALUES
(1, 1, 'B0003', 1),
(2, 1, 'B0001', 1),
(3, 1, 'B0018', 3),
(4, 2, 'B0005', 1),
(5, 2, 'B0001', 1),
(6, 2, 'B0002', 2),
(0, 0, 'B0003', 1),
(0, 0, 'B0002', 1),
(0, 0, 'B0005', 1),
(0, 0, 'B0006', 1),
(0, 0, 'B0002', 1),
(0, 0, 'B0003', 3),
(0, 0, 'B0005', 1),
(0, 0, 'B0002', 1),
(0, 0, 'B0003', 2),
(0, 0, 'B0005', 1),
(0, 0, 'B0011', 1),
(0, 0, 'B0002', 1),
(0, 0, 'B0001', 3),
(0, 0, 'D0003', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `firstName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `plateNo` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `firstName`, `lastName`, `email`, `phone`, `plateNo`) VALUES
(0, 'SP', '$2y$10$kjYdzWWGKZPjujnDDYsjZuJYuDmkZOOLL24xP63va1P0VzhxPpadK', 0, 'Sean', 'Park', 'sp@mail.com', '1234566789', 'asd1222'),
(0, 'TB', '$2y$10$SATtwlX.8zgL8nIv0Dnw8uRnLu/hvQx38G/h4htdlA1wNsfjWoa1O', 0, 'Tom', 'Baker', 'tom@mac.com', '1234445555', 'wee2323'),
(0, 'SB', '$2y$10$heOF.xUfYVU9fqTnFMDPw.hDzCVcjfgsFBb2Zv12OmI0q8raldWb2', 0, 'Sam', 'Baker', 'sam@email.com', '514-123 4556', 'ddf334'),
(0, 'JB', '$2y$10$mG.kyHN4zfDZY3Zy76G62eDxtp7MnVNfYsosm7RMhQiqJv1P.Osyq', 0, 'James', 'Bond', 'james@email.com', '514-122 1234', 'qwe123'),
(0, 'Val', '$2y$10$v88T4h/b9tyG2YJ5L.sS1.j3AyZN3jL6htLLq1cLa9FzPBdzTVn5K', 1, 'Val', 'Ran', 'val@mac.com', '123454666', 'sff223'),
(0, 'username', '$2y$10$x6O4W7heMZA2UtGI96dO7./qOZkH2sFuNWw53pPixDSyRzsZMmjOa', 0, 'firstName', 'LastName', 'user@mail.com', '514-122 1234', 'asd3445'),
(0, 'dfs', '$2y$10$Lq.xE1xL5QFQjurLA2M/nOxCkRspRXLuDVvjTa08FtmPNOyLSGKQy', 0, 's', 's', 's@abc.com', '(555)555-5555', '123444'),
(0, 'PP', '$2y$10$6TQ1elCZuUiDsUxof9GhrOfYOlM8JbKhr47yuDSHdmQoeuHMwg5jO', 0, 'Peter', 'Pan', 'peter@mail.com', '514 234 1234', 'asdd1223'),
(0, 'HC', '$2y$10$EY0vDBoYZ.gP294D6zu4QOHoyOq/ztlE7uymH5EcJP9qXAhwbA8T6', 0, 'Hilary', 'Clinton', 'hilary@mac.com', '514-122-1222', 'DFDFG123'),
(0, 'SD', '$2y$10$mVOOMtfXF2dxPIH2X7byq.sGDgs5tjOJNY4SgTmCG0xA2R0paqVvu', 0, 'Valini', 'asad', 'jon@mail.com', 'w41241', 'wddw'),
(0, 'eqwew', '$2y$10$n692cEphHqc.9n90hhnfNeXP/TxUl8IAFtBA5K/ZyfmvE2ZYb9.j2', 0, 'qeqw', 'qeqee', 'aff@mail.com', '123 445 6778', 'sffs33'),
(0, 'ew', '$2y$10$altOX8GI1hMAx.sqtBq88.JRCNfz61zxla5U8jOvM8maYq3FkiyfK', 0, 'qewqe', 'qwewwq', 'qw@mas.com', '123242434334', 'dsdsd32332'),
(0, 'errt', '$2y$10$J6uLrD0dx.qLj0kF.3kXr.IePCqm2DLrY8RLoEAvXZT9joJKaEFfG', 0, 'vak', 'qwe', 'sdd@mail.com', '12345677', 'sd123333'),
(0, 'JU', '$2y$10$Tm.xcyUGeV8KJmB/Ovg.LexeEvOvR6mPArFH18vLfGgWiibVUaLnC', 0, 'james', 'underwood', 'jbe@mail.com', '123 345 5667', 'sffff'),
(0, 'ss', '$2y$10$M1EnWv3ngVsQ/rXASASotOB2ob.N73JFCkfQBjjACMijd8XJ9Uc0i', 0, 'tss', 'sss', 'ma@mail.com', '514 122 1234', 'ssss'),
(0, 'wer', '$2y$10$1PoObhzAQtmCHEvdBZsBDeGW9ucy.P50LFvRYRD17Sl748kEbnJnC', 0, 'asdd', 'qwee', 'as@eam.com', '312  123 4566', 'ddd2333'),
(0, 'wer', '$2y$10$GyWCMsSubd4CK/J0QwQQAu778tYmqxU2atsMI1j8Jj4WdQi24rjlu', 0, 'weeddff', 'fff', 'assg@email.com', '12344566667', 'dddfdf'),
(0, 'rrr', '$2y$10$0sLvVzbjAJBAPJqckH/DDu5AVtdgZQyJqr/A2DblkHq5i/DD7Y9a.', 0, 'wweew', 'wdwdw', 'as@ssd.vuh', '12344566667', 'ssds`23113'),
(0, 'qettr', '$2y$10$H8Tv9Qc6wWRZJBt5xs3QuOI6VObKe1EdG.x1xmszt2bxaF/804xXS', 0, 'sddsvs', 'qwdwqq', 'dds@email.com', '42242424253', 'we1233'),
(0, 'weeefef', '$2y$10$ErcpRho7BKK/UjG5x4mNTeebKxpfsSyWb/RN28teUukKqqO.gG2li', 0, 'fweweffew', 'qwqqw', 'mail@com.com', '31333213232', 'qewqrrrr'),
(0, 'TB', '$2y$10$Pq5vCDhTTTCxdj33SiBAZuGXgUE3.n5gRF1E4BNRqFzXxUXXHhxf6', 0, 'Toopy', 'Binou', 'tb@mail.com', '12324455666', 'ssada12211212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
