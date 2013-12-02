-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 19. Nopember 2013 jam 23:10
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mitrasoft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `image`, `file`, `active`, `sort`) VALUES
(4, '', '', '1', 1),
(5, '', '', '1', 2),
(6, '', '', '1', 3),
(7, '', '', '1', 4),
(8, '', '', '1', 5),
(9, '', '', '1', 6),
(10, '', '', '1', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_description`
--

CREATE TABLE IF NOT EXISTS `about_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `about_description`
--

INSERT INTO `about_description` (`id`, `about_id`, `language_id`, `name`, `content`) VALUES
(10, 2, 1, 'Konsultasi Tulang Belakang', '<p>ore than 80% of people suffer from back pain or neck pain at least once in a life time. Majority is not serious and can be treated with simple physiotherapy, exercise and change of posture. Rarely, it can be caused by something more serious such as nerve compression, tumor, infection and fracture that require early and more specific treatment.</p>\r\n'),
(11, 1, 1, 'Layanan Fisioterapi', '<p>More than 80% of people suffer from back pain or neck pain at least once in a life time. Majority is not serious and can be treated with simple physiotherapy, exercise and change of posture. Rarely, it can be caused by something more serious such as nerve compression, tumor, infection and fracture that require early and more specific treatment.</p>\r\n'),
(12, 3, 1, 'Rujukan tindakan medis', '<p>More than 80% of people suffer from back pain or neck pain at least once in a life time. Majority is not serious and can be treated with simple physiotherapy, exercise and change of posture. Rarely, it can be caused by something more serious such as nerve compression, tumor, infection and fracture that require early and more specific treatment.</p>\r\n'),
(22, 4, 1, 'Introduction', '<p><img alt="" src="/bethesda/upload/images/ill-about.jpg" style="width: 609px; height: 285px;" /></p>\r\n\r\n<p>More than 80% of people suffer from back pain or neck pain at least once in a life time. Majority is not serious and can be treated with simple physiotherapy, exercise and change of posture. Rarely, it can be caused by something more serious such as nerve compression, tumor, infection and fracture that require early and more specific treatment.</p>\r\n\r\n<p>Bethesda Spine clinic take care patients with back and neck problems. We offer comprehensive services from medical consultations, physiotherapy treatment and advice. For more complex cases, we work closely with out visiting consultants from Surabaya and Singapore. Our visiting consultants are Dr Tony Setiobudi (Spine Surgeon, Singapore), Dr Tan Tee Yong (Pain Specialist, Singapore).</p>\r\n'),
(23, 4, 2, 'Introduction', '<p><img alt="" src="/bethesda/upload/images/ill-about.jpg" style="width: 609px; height: 285px;" /></p>\r\n\r\n<p>More than 80% of people suffer from back pain or neck pain at least once in a life time. Majority is not serious and can be treated with simple physiotherapy, exercise and change of posture. Rarely, it can be caused by something more serious such as nerve compression, tumor, infection and fracture that require early and more specific treatment.</p>\r\n\r\n<p>Bethesda Spine clinic take care patients with back and neck problems. We offer comprehensive services from medical consultations, physiotherapy treatment and advice. For more complex cases, we work closely with out visiting consultants from Surabaya and Singapore. Our visiting consultants are Dr Tony Setiobudi (Spine Surgeon, Singapore), Dr Tan Tee Yong (Pain Specialist, Singapore).</p>\r\n'),
(24, 5, 1, 'Are back pain and neck pain treatable conditions?', '<p>Back pain and neck pain are treatable conditions. The treatment depends on the cause of the problem. With appropriate treatment and advice, 80% of patients get better within 6 weeks. Operation is rarely required and is usually reserved if other conservative treatments fail to improve the conditions.</p>\r\n'),
(25, 5, 2, 'Are back pain and neck pain treatable conditions?', '<p>Back pain and neck pain are treatable conditions. The treatment depends on the cause of the problem. With appropriate treatment and advice, 80% of patients get better within 6 weeks. Operation is rarely required and is usually reserved if other conservative treatments fail to improve the conditions.</p>\r\n'),
(26, 6, 1, 'When do I need to see a doctor for my back pain and neck pain?', '<p>You should see your doctor if the back pain does not show any sign of improvement within a month or you feel unwell. Your doctor will ask detailed questions, do physical examination and order some radiological investigations to determine what could be the cause of the problem. Generally the cause is not serious. The doctor may give you medicine to control the pain. It is not advisible to take pain killer for a long term because of its side effects. Less than 5% of back pain and neck pain are caused by something more serious such as tumor, infection, fracture and nerve compression. These conditionsoften require early treatment.</p>\r\n'),
(27, 6, 2, 'When do I need to see a doctor for my back pain and neck pain?', '<p>You should see your doctor if the back pain does not show any sign of improvement within a month or you feel unwell. Your doctor will ask detailed questions, do physical examination and order some radiological investigations to determine what could be the cause of the problem. Generally the cause is not serious. The doctor may give you medicine to control the pain. It is not advisible to take pain killer for a long term because of its side effects. Less than 5% of back pain and neck pain are caused by something more serious such as tumor, infection, fracture and nerve compression. These conditionsoften require early treatment.</p>\r\n'),
(28, 7, 1, 'When do you need to have physiotherapy treatment?', '<p>Most of back pain and neck pain can be treated with physiotherapy. The doctors will decide if physiotherapy treatment is suitable for you. The aims of the physiotherapy treatment are to first control the pain to an acceptable level and then to strengthen the back and neck muscles. Strong muscles stabilize the spine to further reduce the pain from instability and to reduce the rate of ageing in the spine.</p>\r\n'),
(29, 7, 2, 'When do you need to have physiotherapy treatment?', '<p>Most of back pain and neck pain can be treated with physiotherapy. The doctors will decide if physiotherapy treatment is suitable for you. The aims of the physiotherapy treatment are to first control the pain to an acceptable level and then to strengthen the back and neck muscles. Strong muscles stabilize the spine to further reduce the pain from instability and to reduce the rate of ageing in the spine.</p>\r\n'),
(30, 8, 1, 'What to expect after physiotherapy treatment?', '<p>On the first physiotherapy visit, the physiotherapist will advise you on how many times and how often you need to have the physiotherapy treatment. Usually the pain improves significantly within a few weeks. If there is evidence of ageing in the spine, the pain may not go away completely. The pain may come back on and off. You may require more frequent treatment to control the pain.</p>\r\n'),
(31, 8, 2, 'What to expect after physiotherapy treatment?', '<p>On the first physiotherapy visit, the physiotherapist will advise you on how many times and how often you need to have the physiotherapy treatment. Usually the pain improves significantly within a few weeks. If there is evidence of ageing in the spine, the pain may not go away completely. The pain may come back on and off. You may require more frequent treatment to control the pain.</p>\r\n'),
(32, 9, 1, 'What other treatments can I have for my back and neck pain?', '<p>Other treatments like yoga, pillate and massage may help to control the pain. Regular exercises like brisk walking, jogging and swimming help to strengthen the back and neck muscles. We do not encourage our patients to have chiropractic treatment. It is generally not harmful. However, there are differences in the philosophy on the causes and the management of spine problems.</p>\r\n'),
(33, 9, 2, 'What other treatments can I have for my back and neck pain?', '<p>Other treatments like yoga, pillate and massage may help to control the pain. Regular exercises like brisk walking, jogging and swimming help to strengthen the back and neck muscles. We do not encourage our patients to have chiropractic treatment. It is generally not harmful. However, there are differences in the philosophy on the causes and the management of spine problems.</p>\r\n'),
(34, 10, 1, 'Why does our clinic treat only spine problems?', '<p>Spine is a very complex region to understand. In order to deliver the highest quality of service to our patients,there are highly trained and dedicated doctors and physiotherapists who only manage spine problems. We also have visiting consultant spine surgeons from Surabaya and Singapore who will help us to manage the more complex cases.</p>\r\n'),
(35, 10, 2, 'Why does our clinic treat only spine problems?', '<p>Spine is a very complex region to understand. In order to deliver the highest quality of service to our patients,there are highly trained and dedicated doctors and physiotherapists who only manage spine problems. We also have visiting consultant spine surgeons from Surabaya and Singapore who will help us to manage the more complex cases.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_input` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `active` enum('0','1') NOT NULL,
  `image` varchar(200) NOT NULL,
  `writer` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `date_input`, `date_modif`, `active`, `image`, `writer`) VALUES
(1, '2013-11-18 21:24:47', '0000-00-00 00:00:00', '1', '{"image":"8b15a-136221248-617x416.jpg","x":"6","y":"29","w":"606","h":"358.2565130260521"}', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_description`
--

CREATE TABLE IF NOT EXISTS `artikel_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `artikel_description`
--

INSERT INTO `artikel_description` (`id`, `artikel_id`, `language_id`, `title`, `content`) VALUES
(1, 1, 1, 'Technology', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrator', 'admin', NULL, 'N;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin.artikel.create', 0, 'Artikel Create', NULL, 'N;'),
('admin.artikel.delete', 0, 'Artikel Delete', NULL, 'N;'),
('admin.artikel.index', 0, 'Artikel Index', NULL, 'N;'),
('admin.artikel.sort', 0, 'Artikel Sort', NULL, 'N;'),
('admin.artikel.update', 0, 'Artikel Update', NULL, 'N;'),
('admin.artikel.upload', 0, 'Artikel Upload', NULL, 'N;'),
('admin.askus.create', 0, 'Askus Create', NULL, 'N;'),
('admin.askus.delete', 0, 'Askus Delete', NULL, 'N;'),
('admin.askus.index', 0, 'Askus Index', NULL, 'N;'),
('admin.askus.sort', 0, 'Askus Sort', NULL, 'N;'),
('admin.askus.update', 0, 'Askus Update', NULL, 'N;'),
('admin.home.logout', 0, 'Home Logout', NULL, 'N;'),
('admin.icon.create', 0, 'Icon Create', NULL, 'N;'),
('admin.icon.delete', 0, 'Icon Delete', NULL, 'N;'),
('admin.icon.index', 0, 'Icon Index', NULL, 'N;'),
('admin.icon.update', 0, 'Icon Update', NULL, 'N;'),
('admin.language.create', 0, 'Language Create', NULL, 'N;'),
('admin.language.delete', 0, 'Language Delete', NULL, 'N;'),
('admin.language.index', 0, 'Language Index', NULL, 'N;'),
('admin.language.sort', 0, 'Language Sort', NULL, 'N;'),
('admin.language.update', 0, 'Language Update', NULL, 'N;'),
('admin.layanan.create', 0, 'Layanan Create', NULL, 'N;'),
('admin.layanan.delete', 0, 'Layanan Delete', NULL, 'N;'),
('admin.layanan.index', 0, 'Layanan Index', NULL, 'N;'),
('admin.layanan.sort', 0, 'Layanan Sort', NULL, 'N;'),
('admin.layanan.update', 0, 'Layanan Update', NULL, 'N;'),
('admin.layanan.upload', 0, 'Layanan Upload', NULL, 'N;'),
('admin.menuBackend.create', 0, 'MenuBackend Create', NULL, 'N;'),
('admin.menuBackend.delete', 0, 'MenuBackend Delete', NULL, 'N;'),
('admin.menuBackend.index', 0, 'MenuBackend Index', NULL, 'N;'),
('admin.menuBackend.sort', 0, 'MenuBackend Sort', NULL, 'N;'),
('admin.menuBackend.update', 0, 'MenuBackend Update', NULL, 'N;'),
('admin.page.create', 0, 'Page Create', NULL, 'N;'),
('admin.page.delete', 0, 'Page Delete', NULL, 'N;'),
('admin.page.index', 0, 'Page Index', NULL, 'N;'),
('admin.page.sort', 0, 'Page Sort', NULL, 'N;'),
('admin.page.update', 0, 'Page Update', NULL, 'N;'),
('admin.page.upload', 0, 'Page Upload', NULL, 'N;'),
('admin.setting.create', 0, 'Setting Create', NULL, 'N;'),
('admin.setting.delete', 0, 'Setting Delete', NULL, 'N;'),
('admin.setting.index', 0, 'Setting Index', NULL, 'N;'),
('admin.setting.log', 0, 'Setting Log', NULL, 'N;'),
('admin.setting.update', 0, 'Setting Update', NULL, 'N;'),
('admin.site.index', 0, 'Site Index', NULL, 'N;'),
('admin.slide.create', 0, 'Slide Create', NULL, 'N;'),
('admin.slide.delete', 0, 'Slide Delete', NULL, 'N;'),
('admin.slide.index', 0, 'Slide Index', NULL, 'N;'),
('admin.slide.sort', 0, 'Slide Sort', NULL, 'N;'),
('admin.slide.update', 0, 'Slide Update', NULL, 'N;'),
('admin.slide.upload', 0, 'Slide Upload', NULL, 'N;'),
('admin.user.create', 0, 'User Create', NULL, 'N;'),
('admin.user.delete', 0, 'User Delete', NULL, 'N;'),
('admin.user.edit', 0, 'User Edit', NULL, 'N;'),
('admin.user.index', 0, 'User Index', NULL, 'N;'),
('admin.user.update', 0, 'User Update', NULL, 'N;'),
('admin.userGroup.create', 0, 'UserGroup Create', NULL, 'N;'),
('admin.userGroup.delete', 0, 'UserGroup Delete', NULL, 'N;'),
('admin.userGroup.index', 0, 'UserGroup Index', NULL, 'N;'),
('admin.userGroup.update', 0, 'UserGroup Update', NULL, 'N;'),
('Administrator', 2, '', NULL, 'N;'),
('page_editActive', 0, 'Page EditActive', NULL, 'N;'),
('page_editHidden', 0, 'Page EditHidden', NULL, 'N;'),
('page_editIntro', 0, 'Page EditIntro', NULL, 'N;'),
('page_editKode', 0, 'Page EditKode', NULL, 'N;'),
('page_editModule', 0, 'Page EditModule', NULL, 'N;'),
('page_showHome', 0, 'Page ShowHome', NULL, 'N;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Administrator', 'admin.artikel.create'),
('Administrator', 'admin.artikel.delete'),
('Administrator', 'admin.artikel.index'),
('Administrator', 'admin.artikel.sort'),
('Administrator', 'admin.artikel.update'),
('Administrator', 'admin.artikel.upload'),
('Administrator', 'admin.askus.create'),
('Administrator', 'admin.askus.delete'),
('Administrator', 'admin.askus.index'),
('Administrator', 'admin.askus.sort'),
('Administrator', 'admin.askus.update'),
('Administrator', 'admin.home.logout'),
('Administrator', 'admin.layanan.create'),
('Administrator', 'admin.layanan.delete'),
('Administrator', 'admin.layanan.index'),
('Administrator', 'admin.layanan.sort'),
('Administrator', 'admin.layanan.update'),
('Administrator', 'admin.layanan.upload'),
('Administrator', 'admin.page.index'),
('Administrator', 'admin.page.update'),
('Administrator', 'admin.setting.create'),
('Administrator', 'admin.setting.delete'),
('Administrator', 'admin.setting.home'),
('Administrator', 'admin.setting.index'),
('Administrator', 'admin.setting.log'),
('Administrator', 'admin.setting.update'),
('Administrator', 'admin.slide.create'),
('Administrator', 'admin.slide.delete'),
('Administrator', 'admin.slide.index'),
('Administrator', 'admin.slide.sort'),
('Administrator', 'admin.slide.update'),
('Administrator', 'admin.slide.upload'),
('Administrator', 'admin.user.create'),
('Administrator', 'admin.user.delete'),
('Administrator', 'admin.user.edit'),
('Administrator', 'admin.user.index'),
('Administrator', 'admin.user.update'),
('Administrator', 'page_editIntro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_main_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_main_id`, `title`, `image`) VALUES
(1, 1, 'Contoh Image', '7c127-Koala.jpg'),
(2, 1, 'Contoh Image', '52156-Lighthouse.jpg'),
(3, 1, 'Contoh Image', '4d40a-Hydrangeas.jpg'),
(4, 2, 'Contoh Image', '53208-Jellyfish.jpg'),
(5, 2, 'Contoh Image', 'c58c0-Desert.jpg'),
(6, 2, 'Contoh Image', '866bc-Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_main`
--

CREATE TABLE IF NOT EXISTS `gallery_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_input` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `gallery_main`
--

INSERT INTO `gallery_main` (`id`, `date_input`, `date_modif`, `active`) VALUES
(1, '2013-06-18 10:41:48', '2013-06-18 11:11:03', '1'),
(2, '2013-06-18 10:40:27', '2013-06-18 11:11:14', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_main_description`
--

CREATE TABLE IF NOT EXISTS `gallery_main_description` (
  `di` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_main_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`di`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `gallery_main_description`
--

INSERT INTO `gallery_main_description` (`di`, `gallery_main_id`, `language_id`, `title`, `content`) VALUES
(7, 1, 1, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error illum neque sed quis fugit ullam nam! Illum, harum totam vitae eos neque ut in. Maxime, quas, quis officia vitae et nobis repudiandae officiis totam ducimus optio eos sed sint tempore!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, voluptatum, rem, quo aperiam nostrum expedita voluptatibus sint quas perspiciatis sunt dolor quis. Explicabo, dolores, consectetur, tenetur quod nesciunt aspernatur distinctio in voluptas quaerat perferendis et mollitia eveniet esse minus earum tempore iusto dignissimos pariatur nulla quibusdam fugit autem consequatur ipsa.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit ad asperiores sequi ut nulla amet consequatur illo ipsam cumque enim sunt praesentium officia ex vel quas laboriosam? Commodi, ab, asperiores, dolorem illum magnam nulla voluptatem quas sunt dolor fugit corporis voluptas inventore provident eaque porro id dolores! Similique, quo, aliquam optio asperiores fuga et voluptas dolore veniam nisi aperiam accusantium recusandae saepe! Totam excepturi maiores perferendis commodi dignissimos labore!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, inventore quae ipsum error quis quam tempore officia quod repudiandae facere non suscipit recusandae eveniet alias officiis necessitatibus et. Accusamus, at, sunt consequuntur nihil distinctio provident praesentium hic neque iusto reiciendis dolorem aliquid maiores et veniam blanditiis fugiat saepe cupiditate dolorum velit obcaecati dignissimos fugit mollitia est deleniti quia voluptates dolore animi ullam magnam quod. Quibusdam eum laudantium provident ut deserunt.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, expedita, blanditiis aspernatur saepe excepturi totam accusamus voluptates recusandae reprehenderit eum veniam quaerat dolorem quisquam suscipit cupiditate iusto quae aliquid non!</p>\r\n'),
(8, 2, 1, 'maiores perferendis', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error illum neque sed quis fugit ullam nam! Illum, harum totam vitae eos neque ut in. Maxime, quas, quis officia vitae et nobis repudiandae officiis totam ducimus optio eos sed sint tempore!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, voluptatum, rem, quo aperiam nostrum expedita voluptatibus sint quas perspiciatis sunt dolor quis. Explicabo, dolores, consectetur, tenetur quod nesciunt aspernatur distinctio in voluptas quaerat perferendis et mollitia eveniet esse minus earum tempore iusto dignissimos pariatur nulla quibusdam fugit autem consequatur ipsa.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit ad asperiores sequi ut nulla amet consequatur illo ipsam cumque enim sunt praesentium officia ex vel quas laboriosam? Commodi, ab, asperiores, dolorem illum magnam nulla voluptatem quas sunt dolor fugit corporis voluptas inventore provident eaque porro id dolores! Similique, quo, aliquam optio asperiores fuga et voluptas dolore veniam nisi aperiam accusantium recusandae saepe! Totam excepturi maiores perferendis commodi dignissimos labore!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, inventore quae ipsum error quis quam tempore officia quod repudiandae facere non suscipit recusandae eveniet alias officiis necessitatibus et. Accusamus, at, sunt consequuntur nihil distinctio provident praesentium hic neque iusto reiciendis dolorem aliquid maiores et veniam blanditiis fugiat saepe cupiditate dolorum velit obcaecati dignissimos fugit mollitia est deleniti quia voluptates dolore animi ullam magnam quod. Quibusdam eum laudantium provident ut deserunt.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, expedita, blanditiis aspernatur saepe excepturi totam accusamus voluptates recusandae reprehenderit eum veniam quaerat dolorem quisquam suscipit cupiditate iusto quae aliquid non!</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `icon`
--

CREATE TABLE IF NOT EXISTS `icon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `icon`
--

INSERT INTO `icon` (`id`, `name`, `img`) VALUES
(1, 'advertising', 'advertising.png'),
(2, 'add', 'Button-Add-icon.png'),
(3, 'note', 'cutie_icon_set_preview_01.jpg'),
(4, 'profile', 'cutie_icon_set_preview_02.jpg'),
(5, 'RSS', 'cutie_icon_set_preview_03.jpg'),
(6, 'mail', 'cutie_icon_set_preview_04.jpg'),
(7, 'Favorite', 'cutie_icon_set_preview_05.jpg'),
(8, 'Calendar', 'cutie_icon_set_preview_06.jpg'),
(9, 'Bird', 'cutie_icon_set_preview_07.jpg'),
(10, 'News', 'cutie_icon_set_preview_08.jpg'),
(11, 'Speedmeter', 'cutie_icon_set_preview_09.jpg'),
(12, 'Cart', 'cutie_icon_set_preview_10.jpg'),
(13, 'Baloon Chat', 'cutie_icon_set_preview_11.jpg'),
(14, 'Slide', 'cutie_icon_set_preview_12.jpg'),
(15, 'Zoom', 'cutie_icon_set_preview_13.jpg'),
(16, 'HP', 'cutie_icon_set_preview_14.jpg'),
(17, 'Folder', 'cutie_icon_set_preview_15.jpg'),
(18, 'Umbrela', 'cutie_icon_set_preview_16.jpg'),
(19, 'Lock', 'cutie_icon_set_preview_17.jpg'),
(20, 'Lamp', 'cutie_icon_set_preview_18.jpg'),
(21, 'Handtag', 'cutie_icon_set_preview_19.jpg'),
(22, 'Pallete', 'cutie_icon_set_preview_20.jpg'),
(23, 'Dollar', 'dollar_currency_sign.png'),
(24, 'Door', 'Door.png'),
(25, 'Bug Trash', 'gatheringgrounds-coffee-icon.png'),
(26, 'Gear', 'gear.png'),
(27, 'Key', 'Icon_-_Plugins_-_Key_Fob.png'),
(28, 'Agreement', 'icon-agreement.png'),
(29, 'Building', 'icon-building.jpg'),
(30, 'Photo', 'icon-slidekits-xl.png'),
(31, 'Star', 'icon-star.png'),
(32, 'Location Tag', 'location-1.png'),
(33, 'People', 'members.png'),
(34, 'Cart 2', 'Outlet-malls.jpg'),
(35, 'Home', 'home-65.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `sort`, `status`) VALUES
(1, 'Bahasa', 'id', 0, '1'),
(2, 'English', 'en', 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `image`, `file`, `active`, `sort`) VALUES
(1, '{"image":"4769a-tf3.jpg","x":"3","y":"1","w":"497","h":"293.8176352705411"}', '', '1', 1),
(2, '{"image":"41749-trucking.jpg","x":"0","y":"60","w":"388","h":"229.3787575150301"}', '', '1', 2),
(3, '{"image":"1253d-Singapore-Car-Rental-Rent-Car-Singapore-2-73744-1.jpg","x":"0","y":"0","w":"500","h":"295.5911823647295"}', '', '1', 3),
(4, '{"image":"1eecd-Singapore-Car-Rental-Rent-Car-Singapore-2-73744-1.jpg","x":"0","y":"36","w":"384","h":"227.01402805611224"}', '', '1', 4),
(5, '{"image":"ef785-financial-crisis-backgrounds-wallpapers.jpg","x":"0","y":"71","w":"500","h":"295.5911823647295"}', '', '1', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_description`
--

CREATE TABLE IF NOT EXISTS `layanan_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `layanan_description`
--

INSERT INTO `layanan_description` (`id`, `layanan_id`, `language_id`, `name`, `content`) VALUES
(1, 1, 1, 'Forwarding Management', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(2, 2, 1, 'Tracking Management', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(4, 3, 1, 'Trading Management', '<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(5, 4, 1, 'Rental Management', '<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(6, 5, 1, 'Office Management', '<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=732 ;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `username`, `activity`, `time`) VALUES
(1, 'root', 'Login: root', '2013-06-14 10:16:39'),
(2, 'root', 'Login: root', '2013-06-14 10:17:04'),
(3, 'root', 'Login: root', '2013-06-14 10:48:47'),
(4, 'root', 'MenuBackendController Create 13', '2013-06-14 11:11:28'),
(5, 'root', 'MenuBackendController Update 13', '2013-06-14 11:11:46'),
(6, 'root', 'LanguageController Create 1', '2013-06-14 11:14:27'),
(7, 'root', 'LanguageController Create 2', '2013-06-14 11:14:29'),
(8, 'root', 'LanguageController Update 2', '2013-06-14 11:15:02'),
(9, 'root', 'LanguageController Update 2', '2013-06-14 11:15:04'),
(10, 'root', 'LanguageController Update 1', '2013-06-14 11:16:54'),
(11, 'root', 'Page Controller Create 1', '2013-06-14 12:14:45'),
(12, 'root', 'Page Controller Update 1', '2013-06-14 12:23:38'),
(13, 'root', 'Page Controller Update 1', '2013-06-14 12:25:42'),
(14, 'root', 'Page Controller Update 1', '2013-06-14 12:25:50'),
(15, 'root', 'Page Controller Create 2', '2013-06-14 12:28:39'),
(16, 'root', 'Page Controller Create 3', '2013-06-14 12:30:04'),
(17, 'root', 'Page Controller Create 4', '2013-06-14 12:33:23'),
(18, 'root', 'Page Controller Create 5', '2013-06-14 12:33:34'),
(19, 'root', 'Page Controller Create 6', '2013-06-14 12:36:01'),
(20, 'root', 'Page Controller Create 7', '2013-06-14 12:38:01'),
(21, 'root', 'Page Controller Create 8', '2013-06-14 12:38:29'),
(22, 'root', 'Page Controller Create 9', '2013-06-14 12:40:39'),
(23, 'root', 'Page Controller Update 9', '2013-06-14 12:40:44'),
(24, 'root', 'Page Controller Create 10', '2013-06-14 12:42:00'),
(25, 'root', 'Page Controller Update 10', '2013-06-14 12:42:05'),
(26, 'root', 'Page Controller Create 11', '2013-06-14 12:43:36'),
(27, 'root', 'Page Controller Create 12', '2013-06-14 12:54:39'),
(28, 'root', 'Page Controller Create 13', '2013-06-14 12:54:56'),
(29, 'root', 'Page Controller Create 14', '2013-06-14 12:58:05'),
(30, 'root', 'Page Controller Create 15', '2013-06-14 14:01:29'),
(31, 'root', 'Page Controller Update 15', '2013-06-14 14:01:55'),
(32, 'root', 'MenuBackendController Create 14', '2013-06-14 14:03:45'),
(33, 'root', 'MenuBackendController Create 15', '2013-06-14 14:04:53'),
(34, 'root', 'MenuBackendController Create 16', '2013-06-14 14:05:46'),
(35, 'root', 'MenuBackendController Create 17', '2013-06-14 14:08:02'),
(36, 'root', 'MenuBackendController Create 18', '2013-06-14 14:08:43'),
(37, 'root', 'Page Controller Update 5', '2013-06-14 14:15:03'),
(38, 'root', 'LanguageController Update 2', '2013-06-14 15:09:48'),
(39, 'root', 'LanguageController Update 2', '2013-06-14 15:15:23'),
(40, 'root', 'LanguageController Update 2', '2013-06-14 15:21:05'),
(41, 'root', 'LanguageController Update 2', '2013-06-14 15:48:54'),
(42, 'root', 'Page Controller Update 1', '2013-06-14 15:56:26'),
(43, 'root', 'Page Controller Update 2', '2013-06-14 15:56:48'),
(44, 'root', 'Page Controller Update 9', '2013-06-14 15:57:00'),
(45, 'root', 'Page Controller Update 10', '2013-06-14 15:57:12'),
(46, 'root', 'Page Controller Update 11', '2013-06-14 15:57:48'),
(47, 'root', 'Page Controller Update 12', '2013-06-14 15:58:15'),
(48, 'root', 'Page Controller Update 13', '2013-06-14 15:58:23'),
(49, 'root', 'Page Controller Update 3', '2013-06-14 15:58:39'),
(50, 'root', 'Page Controller Update 8', '2013-06-14 15:59:58'),
(51, 'root', 'Page Controller Update 2', '2013-06-14 16:06:48'),
(52, 'root', 'MenuBackendController Create 19', '2013-06-14 16:14:38'),
(53, 'root', 'LanguageController Update 2', '2013-06-14 17:14:20'),
(54, 'root', 'LanguageController Update 2', '2013-06-14 17:15:17'),
(55, 'root', 'Layanan Controller Create 1', '2013-06-14 17:18:58'),
(56, 'root', 'Layanan Controller Update 1', '2013-06-14 17:35:06'),
(57, 'root', 'Layanan Controller Update 1', '2013-06-14 17:35:24'),
(58, 'root', 'Layanan Controller Update 1', '2013-06-14 17:35:47'),
(59, 'root', 'Layanan Controller Update 1', '2013-06-14 17:38:57'),
(60, 'root', 'Login: root', '2013-06-17 10:33:24'),
(61, 'root', 'Layanan Controller Create 2', '2013-06-17 10:39:39'),
(62, 'root', 'Layanan Controller Update 2', '2013-06-17 10:40:11'),
(63, 'root', 'Layanan Controller Update 2', '2013-06-17 11:19:11'),
(64, 'root', 'Layanan Controller Update 1', '2013-06-17 11:28:42'),
(65, 'root', 'Login: root', '2013-06-17 15:09:06'),
(66, 'root', 'Artikel Create 1', '2013-06-17 15:31:19'),
(67, 'root', 'Artikel Update 1', '2013-06-17 15:46:56'),
(68, 'root', 'Artikel Update 1', '2013-06-17 15:47:22'),
(69, 'root', 'Artikel Create 2', '2013-06-17 15:49:12'),
(70, 'root', 'Login: root', '2013-06-18 09:40:32'),
(71, 'root', 'Page Controller Update 5', '2013-06-18 10:36:14'),
(72, 'root', 'MenuBackendController Create 20', '2013-06-18 10:43:32'),
(73, 'root', 'MenuBackendController Update 16', '2013-06-18 10:43:58'),
(74, 'root', 'MenuBackendController Update 20', '2013-06-18 10:45:18'),
(75, 'root', 'MenuBackendController Update 16', '2013-06-18 10:55:29'),
(76, 'root', 'MenuBackendController Update 16', '2013-06-18 10:56:12'),
(77, 'root', 'MenuBackendController Update 16', '2013-06-18 10:56:17'),
(78, 'root', 'MenuBackendController Update 16', '2013-06-18 10:56:28'),
(79, 'root', 'MenuBackendController Update 16', '2013-06-18 10:56:31'),
(80, 'root', 'MenuBackendController Update 20', '2013-06-18 10:56:45'),
(81, 'root', 'GalleryMain Create 1', '2013-06-18 11:02:22'),
(82, 'root', 'Gallery Create 1', '2013-06-18 11:34:57'),
(83, 'root', 'Gallery Create 2', '2013-06-18 11:35:19'),
(84, 'root', 'Gallery Create 3', '2013-06-18 11:35:26'),
(85, 'root', 'GalleryMain Update 1', '2013-06-18 11:36:34'),
(86, 'root', 'GalleryMain Create 2', '2013-06-18 11:40:03'),
(87, 'root', 'Gallery Create 4', '2013-06-18 11:44:15'),
(88, 'root', 'Gallery Create 5', '2013-06-18 11:44:24'),
(89, 'root', 'Gallery Create 6', '2013-06-18 11:44:32'),
(90, 'root', 'GalleryMain Update 2', '2013-06-18 11:44:54'),
(91, 'root', 'GalleryMain Update 1', '2013-06-18 11:45:33'),
(92, 'root', 'GalleryMain Update 2', '2013-06-18 11:45:39'),
(93, 'root', 'GalleryMain Update 1', '2013-06-18 12:10:39'),
(94, 'root', 'GalleryMain Update 2', '2013-06-18 12:10:50'),
(95, 'root', 'MenuBackendController Create 21', '2013-06-18 12:40:47'),
(96, 'root', 'MenuBackendController Create 22', '2013-06-18 12:41:12'),
(97, 'root', 'MenuBackendController Create 23', '2013-06-18 15:01:07'),
(98, 'root', 'MenuBackendController Update 22', '2013-06-18 15:01:19'),
(99, 'root', 'MenuBackendController Update 21', '2013-06-18 15:01:36'),
(100, 'root', 'MasterStateController Create 1', '2013-06-18 15:16:41'),
(101, 'root', 'MasterStateController Create 2', '2013-06-18 15:17:25'),
(102, 'root', 'MasterStateController Create 3', '2013-06-18 15:17:33'),
(103, 'root', 'MasterStateController Create 4', '2013-06-18 15:17:43'),
(104, 'root', 'MasterStateController Create 5', '2013-06-18 15:17:53'),
(105, 'root', 'MasterCityController Create 1', '2013-06-18 15:25:01'),
(106, 'root', 'MasterCityController Update 1', '2013-06-18 15:25:06'),
(107, 'root', 'MasterCityController Update 1', '2013-06-18 15:25:11'),
(108, 'root', 'MasterCityController Update 1', '2013-06-18 15:25:29'),
(109, 'root', 'MasterCityController Create 2', '2013-06-18 15:25:44'),
(110, 'root', 'MasterCityController Create 3', '2013-06-18 15:25:51'),
(111, 'root', 'MasterCityController Create 4', '2013-06-18 15:25:59'),
(112, 'root', 'MasterCityController Create 5', '2013-06-18 15:26:06'),
(113, 'root', 'MasterCityController Create 6', '2013-06-18 15:26:15'),
(114, 'root', 'MasterCityController Create 7', '2013-06-18 15:26:25'),
(115, 'root', 'MasterCityController Create 8', '2013-06-18 15:26:33'),
(116, 'root', 'MasterCityController Create 9', '2013-06-18 15:26:40'),
(117, 'root', 'MasterCityController Update 1', '2013-06-18 15:28:05'),
(118, 'root', 'MasterCityController Update 2', '2013-06-18 15:28:11'),
(119, 'root', 'MasterCityController Update 3', '2013-06-18 15:28:17'),
(120, 'root', 'MasterCityController Update 4', '2013-06-18 15:28:23'),
(121, 'root', 'MasterCityController Update 4', '2013-06-18 15:28:27'),
(122, 'root', 'MasterCityController Update 5', '2013-06-18 15:28:33'),
(123, 'root', 'MasterCityController Update 6', '2013-06-18 15:28:40'),
(124, 'root', 'MasterCityController Update 7', '2013-06-18 15:28:50'),
(125, 'root', 'MasterCityController Update 8', '2013-06-18 15:28:56'),
(126, 'root', 'MasterCityController Update 9', '2013-06-18 15:29:02'),
(127, 'root', 'Login: root', '2013-06-19 09:35:32'),
(128, 'root', 'MenuBackendController Update 1', '2013-06-19 09:38:13'),
(129, 'root', 'JaringanController Create 1', '2013-06-19 10:35:09'),
(130, 'root', 'JaringanController Update 1', '2013-06-19 10:37:34'),
(131, 'root', 'JaringanController Update 1', '2013-06-19 10:37:38'),
(132, 'root', 'JaringanController Create 2', '2013-06-19 10:44:06'),
(133, 'root', 'JaringanController Create 3', '2013-06-19 10:44:15'),
(134, 'root', 'JaringanController Create 4', '2013-06-19 10:44:28'),
(135, 'root', 'JaringanController Create 5', '2013-06-19 10:44:39'),
(136, 'root', 'JaringanController Create 6', '2013-06-19 10:44:53'),
(137, 'root', 'JaringanController Create 7', '2013-06-19 10:45:07'),
(138, 'root', 'JaringanController Create 8', '2013-06-19 10:45:17'),
(139, 'root', 'JaringanController Create 9', '2013-06-19 10:45:28'),
(140, 'root', 'JaringanController Create 10', '2013-06-19 10:45:37'),
(141, 'root', 'JaringanController Create 11', '2013-06-19 10:45:49'),
(142, 'root', 'JaringanController Create 12', '2013-06-19 10:45:57'),
(143, 'root', 'JaringanController Create 13', '2013-06-19 10:46:08'),
(144, 'root', 'JaringanController Create 14', '2013-06-19 10:46:17'),
(145, 'root', 'JaringanController Create 15', '2013-06-19 10:46:29'),
(146, 'root', 'MenuBackendController Create 24', '2013-06-19 14:50:12'),
(147, 'root', 'KantorController Create 1', '2013-06-19 14:56:07'),
(148, 'root', 'KantorController Create 2', '2013-06-19 14:56:08'),
(149, 'root', 'KantorController Update 1', '2013-06-19 14:59:30'),
(150, 'root', 'KantorController Update 1', '2013-06-19 14:59:52'),
(151, 'root', 'KantorController Update 1', '2013-06-19 15:04:42'),
(152, 'root', 'KantorController Update 1', '2013-06-19 15:05:27'),
(153, 'root', 'KantorController Update 1', '2013-06-19 15:06:08'),
(154, 'root', 'Page Controller Create 16', '2013-06-19 15:14:06'),
(155, 'root', 'Page Controller Update 16', '2013-06-19 15:18:25'),
(156, 'root', 'Page Controller Update 16', '2013-06-19 15:19:17'),
(157, 'root', 'MenuBackendController Create 25', '2013-06-19 15:27:47'),
(158, 'root', 'Karir Create 1', '2013-06-19 16:14:32'),
(159, 'root', 'Karir Update 1', '2013-06-19 16:18:04'),
(160, 'root', 'Karir Create 2', '2013-06-19 16:32:23'),
(161, 'root', 'Karir Update 2', '2013-06-19 16:32:31'),
(162, 'root', 'Page Controller Update 15', '2013-06-19 16:40:48'),
(163, 'root', 'Karir Create 3', '2013-06-19 16:46:12'),
(164, 'root', 'Login: root', '2013-06-20 09:44:46'),
(165, 'root', 'Artikel Update 1', '2013-06-20 09:51:35'),
(166, 'root', 'Artikel Update 2', '2013-06-20 09:51:48'),
(167, 'root', 'Artikel Update 1', '2013-06-20 09:51:56'),
(168, 'root', 'MenuBackendController Create 26', '2013-06-20 10:49:09'),
(169, 'root', 'Slide Delete 2', '2013-06-20 11:07:46'),
(170, 'root', 'Slide Delete 1', '2013-06-20 11:07:49'),
(171, 'root', 'Slide Create 3', '2013-06-20 11:24:41'),
(172, 'root', 'Slide Create 4', '2013-06-20 11:26:01'),
(173, 'root', 'Slide Update 3', '2013-06-20 12:39:02'),
(174, 'root', 'Setting Update address1 5', '2013-06-20 16:09:34'),
(175, 'root', 'Setting Update email 4', '2013-06-20 16:10:07'),
(176, 'root', 'Setting Update phone 7', '2013-06-20 16:10:23'),
(177, 'root', 'Setting Update twitter 14', '2013-06-20 16:10:44'),
(178, 'root', 'Setting Update fax 8', '2013-06-20 16:10:58'),
(179, 'root', 'Setting Update hotline 11', '2013-06-20 16:11:03'),
(180, 'root', 'Setting Update title 1', '2013-06-20 16:11:41'),
(181, 'root', 'Setting Update keywords 2', '2013-06-20 16:11:47'),
(182, 'root', 'Setting Update description 3', '2013-06-20 16:11:52'),
(183, 'root', 'Login: root', '2013-06-21 14:47:08'),
(184, 'root', 'Login: root', '2013-07-18 11:20:00'),
(185, 'root', 'Login: root', '2013-07-22 09:51:10'),
(186, 'root', 'MenuBackendController Update 1', '2013-07-22 10:03:22'),
(187, 'root', 'MenuBackendController Create 27', '2013-07-22 10:07:47'),
(188, 'root', 'MenuBackendController Update 26', '2013-07-22 10:08:48'),
(189, 'root', 'MenuBackendController Update 27', '2013-07-22 10:09:02'),
(190, 'root', 'MenuBackendController Update 20', '2013-07-22 10:10:16'),
(191, 'root', 'MenuBackendController Update 16', '2013-07-22 10:10:38'),
(192, 'root', 'MenuBackendController Update 17', '2013-07-22 10:10:52'),
(193, 'root', 'MenuBackendController Update 22', '2013-07-22 10:11:15'),
(194, 'root', 'MenuBackendController Update 21', '2013-07-22 10:11:21'),
(195, 'root', 'MenuBackendController Update 23', '2013-07-22 10:11:31'),
(196, 'root', 'MenuBackendController Update 18', '2013-07-22 10:11:41'),
(197, 'root', 'Layanan Controller Update 2', '2013-07-22 11:08:53'),
(198, 'root', 'Layanan Controller Update 1', '2013-07-22 11:09:20'),
(199, 'root', 'Layanan Controller Create 3', '2013-07-22 11:13:19'),
(200, 'root', 'MenuBackendController Update 25', '2013-07-22 11:14:43'),
(201, 'root', 'Artikel Update 1', '2013-07-22 11:53:42'),
(202, 'root', 'Artikel Update 1', '2013-07-22 11:54:07'),
(203, 'root', 'Artikel Update 2', '2013-07-22 11:54:23'),
(204, 'root', 'Artikel Update 2', '2013-07-22 11:54:38'),
(205, 'root', 'Artikel Update 1', '2013-07-22 11:55:21'),
(206, 'root', 'MenuBackendController Update 19', '2013-07-22 11:57:48'),
(207, 'root', 'MenuBackendController Update 15', '2013-07-22 11:58:10'),
(208, 'root', 'MenuBackendController Update 15', '2013-07-22 11:58:19'),
(209, 'root', 'MenuBackendController Update 24', '2013-07-22 11:59:08'),
(210, 'root', 'Setting Update title 1', '2013-07-22 12:04:41'),
(211, 'root', 'Setting Update keywords 2', '2013-07-22 12:04:46'),
(212, 'root', 'Setting Update description 3', '2013-07-22 12:04:50'),
(213, 'root', 'Setting Update email 4', '2013-07-22 12:05:08'),
(214, 'root', 'Setting Update email 4', '2013-07-22 12:05:24'),
(215, 'root', 'Setting Update address1 5', '2013-07-22 12:05:39'),
(216, 'root', 'Setting Update phone 7', '2013-07-22 12:05:52'),
(217, 'root', 'MenuBackendController Update 26', '2013-07-22 12:11:27'),
(218, 'root', 'MenuBackendController Update 8', '2013-07-22 12:18:06'),
(219, 'root', 'MenuBackendController Create 28', '2013-07-22 12:20:18'),
(220, 'root', 'MenuBackendController Update 28', '2013-07-22 12:20:35'),
(221, 'root', 'MenuBackendController Update 28', '2013-07-22 12:20:56'),
(222, 'admin', 'Login: admin', '2013-07-22 12:21:10'),
(223, 'root', 'Login: root', '2013-07-22 12:21:25'),
(224, 'root', 'MenuBackendController Update 27', '2013-07-22 12:22:31'),
(225, 'root', 'Page Controller Update 1', '2013-07-22 12:38:07'),
(226, 'root', 'Page Controller Update 2', '2013-07-22 12:38:51'),
(227, 'root', 'Page Controller Update 3', '2013-07-22 12:39:27'),
(228, 'root', 'Page Controller Update 4', '2013-07-22 12:39:59'),
(229, 'root', 'Page Controller Update 5', '2013-07-22 12:40:28'),
(230, 'root', 'Page Controller Update 14', '2013-07-22 12:41:21'),
(231, 'root', 'User Update 2 admin', '2013-07-22 12:51:25'),
(232, 'root', 'MenuBackendController Create 29', '2013-07-22 14:12:10'),
(233, 'root', 'About Delete 2', '2013-07-22 14:25:00'),
(234, 'root', 'About Delete 1', '2013-07-22 14:28:21'),
(235, 'root', 'About Delete 3', '2013-07-22 14:28:22'),
(236, 'root', 'About Controller Create 4', '2013-07-22 14:29:07'),
(237, 'root', 'About Controller Create 5', '2013-07-22 14:29:25'),
(238, 'root', 'About Controller Create 6', '2013-07-22 14:29:41'),
(239, 'root', 'About Controller Create 7', '2013-07-22 14:29:54'),
(240, 'root', 'About Controller Create 8', '2013-07-22 14:30:08'),
(241, 'root', 'About Controller Create 9', '2013-07-22 14:30:21'),
(242, 'root', 'About Controller Create 10', '2013-07-22 14:30:34'),
(243, 'root', 'Page Controller Update 14', '2013-07-22 14:43:28'),
(244, 'root', 'Page Controller Update 1', '2013-07-22 14:44:03'),
(245, 'root', 'Page Controller Update 1', '2013-07-22 14:44:29'),
(246, 'root', 'Page Controller Update 2', '2013-07-22 14:45:04'),
(247, 'root', 'Page Controller Update 3', '2013-07-22 14:45:13'),
(248, 'root', 'Page Controller Update 4', '2013-07-22 14:46:06'),
(249, 'root', 'Page Controller Update 5', '2013-07-22 14:46:14'),
(250, 'root', 'Page Controller Update 4', '2013-07-22 14:46:50'),
(251, 'root', 'Page Controller Update 1', '2013-07-22 14:53:34'),
(252, 'root', 'Page Controller Update 1', '2013-07-22 14:54:18'),
(253, 'root', 'Page Controller Update 2', '2013-07-22 14:54:27'),
(254, 'root', 'Page Controller Update 3', '2013-07-22 14:54:40'),
(255, 'root', 'Page Controller Update 4', '2013-07-22 14:54:53'),
(256, 'root', 'Page Controller Update 5', '2013-07-22 14:55:02'),
(257, 'root', 'About Controller Update 4', '2013-07-22 15:20:23'),
(258, 'root', 'About Controller Update 4', '2013-07-22 15:21:42'),
(259, 'root', 'Page Controller Update 2', '2013-07-22 15:43:29'),
(260, 'root', 'Page Controller Update 2', '2013-07-22 15:45:00'),
(261, 'root', 'Page Controller Update 2', '2013-07-22 15:45:04'),
(262, 'root', 'Page Controller Update 2', '2013-07-22 15:45:09'),
(263, 'root', 'Layanan Controller Update 2', '2013-07-22 15:55:10'),
(264, 'root', 'Layanan Controller Update 1', '2013-07-22 15:55:18'),
(265, 'root', 'Layanan Controller Update 3', '2013-07-22 15:55:25'),
(266, 'root', 'Layanan Controller Update 2', '2013-07-22 15:55:42'),
(267, 'root', 'Login: root', '2013-07-23 09:48:10'),
(268, 'root', 'Setting Update', '2013-07-23 12:27:07'),
(269, 'root', 'Setting Update', '2013-07-23 12:27:43'),
(270, 'root', 'Setting Update', '2013-07-23 12:31:35'),
(271, 'root', 'Setting Update', '2013-07-23 12:32:05'),
(272, 'root', 'MenuBackendController Update 27', '2013-07-23 15:01:12'),
(273, 'root', 'Setting Update', '2013-07-23 15:02:14'),
(274, 'root', 'Setting Update', '2013-07-23 15:02:28'),
(275, 'root', 'Setting Update', '2013-07-23 15:02:35'),
(276, 'root', 'MenuBackendController Create 30', '2013-07-23 15:20:40'),
(277, 'root', 'IconController Create 1', '2013-07-23 15:23:59'),
(278, 'root', 'IconController Create 2', '2013-07-23 15:25:58'),
(279, 'root', 'IconController Create 3', '2013-07-23 15:26:12'),
(280, 'root', 'IconController Create 4', '2013-07-23 15:27:06'),
(281, 'root', 'IconController Create 5', '2013-07-23 15:27:18'),
(282, 'root', 'IconController Create 6', '2013-07-23 15:27:25'),
(283, 'root', 'IconController Create 7', '2013-07-23 15:27:38'),
(284, 'root', 'IconController Create 8', '2013-07-23 15:27:50'),
(285, 'root', 'IconController Create 9', '2013-07-23 15:28:14'),
(286, 'root', 'IconController Create 10', '2013-07-23 15:28:23'),
(287, 'root', 'IconController Create 11', '2013-07-23 15:28:36'),
(288, 'root', 'IconController Create 12', '2013-07-23 15:28:45'),
(289, 'root', 'IconController Create 13', '2013-07-23 15:28:57'),
(290, 'root', 'IconController Create 14', '2013-07-23 15:30:06'),
(291, 'root', 'IconController Create 15', '2013-07-23 15:30:18'),
(292, 'root', 'IconController Create 16', '2013-07-23 15:30:30'),
(293, 'root', 'IconController Create 17', '2013-07-23 15:30:38'),
(294, 'root', 'IconController Create 18', '2013-07-23 15:30:50'),
(295, 'root', 'IconController Create 19', '2013-07-23 15:31:06'),
(296, 'root', 'IconController Create 20', '2013-07-23 15:31:18'),
(297, 'root', 'IconController Create 21', '2013-07-23 15:31:53'),
(298, 'root', 'IconController Create 22', '2013-07-23 15:32:11'),
(299, 'root', 'IconController Create 23', '2013-07-23 15:32:18'),
(300, 'root', 'IconController Create 24', '2013-07-23 15:32:25'),
(301, 'root', 'IconController Create 25', '2013-07-23 15:32:35'),
(302, 'root', 'IconController Create 26', '2013-07-23 15:32:44'),
(303, 'root', 'IconController Create 27', '2013-07-23 15:32:51'),
(304, 'root', 'IconController Create 28', '2013-07-23 15:33:38'),
(305, 'root', 'IconController Create 29', '2013-07-23 15:33:50'),
(306, 'root', 'IconController Create 30', '2013-07-23 15:34:02'),
(307, 'root', 'IconController Create 31', '2013-07-23 15:34:10'),
(308, 'root', 'IconController Create 32', '2013-07-23 15:34:22'),
(309, 'root', 'IconController Create 33', '2013-07-23 15:34:31'),
(310, 'root', 'IconController Create 34', '2013-07-23 15:34:40'),
(311, 'root', 'MenuBackendController Update 27', '2013-07-23 15:42:00'),
(312, 'root', 'MenuBackendController Update 12', '2013-07-23 15:42:31'),
(313, 'root', 'MenuBackendController Update 29', '2013-07-23 15:44:21'),
(314, 'root', 'MenuBackendController Update 19', '2013-07-23 15:44:36'),
(315, 'root', 'MenuBackendController Update 15', '2013-07-23 15:44:46'),
(316, 'root', 'MenuBackendController Update 11', '2013-07-23 15:46:00'),
(317, 'root', 'MenuBackendController Update 13', '2013-07-23 15:46:24'),
(318, 'root', 'MenuBackendController Update 8', '2013-07-23 15:46:39'),
(319, 'root', 'MenuBackendController Update 7', '2013-07-23 15:48:48'),
(320, 'root', 'MenuBackendController Update 3', '2013-07-23 15:48:57'),
(321, 'root', 'MenuBackendController Update 10', '2013-07-23 15:49:06'),
(322, 'root', 'MenuBackendController Update 28', '2013-07-23 16:17:46'),
(323, 'root', 'Login: root', '2013-07-24 09:19:37'),
(324, 'root', 'MenuBackendController Update 12', '2013-07-24 10:53:32'),
(325, 'root', 'MenuBackendController Create 31', '2013-07-24 11:44:17'),
(326, 'root', 'MenuBackendController Update 7', '2013-07-24 11:44:27'),
(327, 'root', 'MenuBackendController Update 7', '2013-07-24 11:44:54'),
(328, 'root', 'MenuBackendController Create 32', '2013-07-24 11:45:32'),
(329, 'root', 'MenuBackendController Update 13', '2013-07-24 12:57:51'),
(330, 'root', 'User Update Access 2 admin', '2013-07-24 14:40:14'),
(331, 'admin', 'Login: admin', '2013-07-24 14:40:36'),
(332, 'root', 'Login: root', '2013-07-24 14:42:25'),
(333, 'root', 'MenuBackendController Update 7', '2013-07-24 14:42:50'),
(334, 'root', 'MenuBackendController Update 32', '2013-07-24 14:42:57'),
(335, 'root', 'MenuBackendController Update 31', '2013-07-24 14:43:12'),
(336, 'admin', 'Login: admin', '2013-07-24 14:45:13'),
(337, 'root', 'Login: root', '2013-07-24 14:58:33'),
(338, 'admin', 'Login: admin', '2013-07-24 14:58:46'),
(339, 'root', 'MenuBackendController Update 12', '2013-07-24 15:00:13'),
(340, 'admin', 'Page Controller Update 14', '2013-07-24 15:02:08'),
(341, 'root', 'MenuBackendController Update 12', '2013-07-24 15:02:57'),
(342, 'root', 'MenuBackendController Update 12', '2013-07-24 15:13:20'),
(343, 'root', 'MenuBackendController Update 12', '2013-07-24 15:16:56'),
(344, 'root', 'MenuBackendController Update 12', '2013-07-24 15:17:22'),
(345, 'root', 'Page Controller Update 14', '2013-07-24 15:19:41'),
(346, 'admin', 'Page Controller Update 14', '2013-07-24 15:23:23'),
(347, 'admin', 'Page Controller Update 14', '2013-07-24 15:23:28'),
(348, 'admin', 'Page Controller Update 14', '2013-07-24 15:23:34'),
(349, 'root', 'Page Controller Update 14', '2013-07-24 15:39:35'),
(350, 'admin', 'Page Controller Update 14', '2013-07-24 15:39:41'),
(351, 'admin', 'Page Controller Update 14', '2013-07-24 15:41:16'),
(352, 'root', 'MenuBackendController Update 8', '2013-07-24 15:49:27'),
(353, 'root', 'Menu Backend Delete 27', '2013-07-24 15:59:08'),
(354, 'root', 'Setting Update', '2013-07-24 16:32:16'),
(355, 'admin', 'Login: admin', '2013-07-24 16:41:09'),
(356, 'admin', 'Login: admin', '2013-07-25 11:36:54'),
(357, 'root', 'Login: root', '2013-07-26 11:28:16'),
(358, 'root', 'LanguageController Update 2', '2013-07-26 11:28:28'),
(359, 'root', 'About Controller Update 4', '2013-07-26 11:28:48'),
(360, 'root', 'About Controller Update 5', '2013-07-26 11:29:05'),
(361, 'root', 'About Controller Update 6', '2013-07-26 11:29:58'),
(362, 'root', 'About Controller Update 7', '2013-07-26 11:30:13'),
(363, 'root', 'About Controller Update 8', '2013-07-26 11:30:26'),
(364, 'root', 'About Controller Update 9', '2013-07-26 11:30:44'),
(365, 'root', 'About Controller Update 10', '2013-07-26 11:31:02'),
(366, 'root', 'Layanan Controller Update 2', '2013-07-26 11:32:04'),
(367, 'root', 'Layanan Controller Update 1', '2013-07-26 11:32:21'),
(368, 'root', 'Layanan Controller Update 3', '2013-07-26 11:32:34'),
(369, 'root', 'Artikel Update 1', '2013-07-26 11:32:48'),
(370, 'root', 'Artikel Update 2', '2013-07-26 11:33:03'),
(371, 'root', 'Login: root', '2013-07-26 14:28:12'),
(372, 'root', 'Page Controller Create 17', '2013-07-26 14:30:06'),
(373, 'root', 'Page Controller Update 1', '2013-07-26 14:30:52'),
(374, 'root', 'Page Controller Update 2', '2013-07-26 14:31:27'),
(375, 'root', 'Page Controller Update 3', '2013-07-26 14:32:29'),
(376, 'root', 'Page Controller Update 17', '2013-07-26 14:33:52'),
(377, 'root', 'Page Controller Update 17', '2013-07-26 14:54:24'),
(378, 'root', 'Page Controller Update 17', '2013-07-26 14:55:29'),
(379, 'root', 'Login: root', '2013-07-29 09:47:28'),
(380, 'root', 'Page Controller Update 14', '2013-07-29 11:00:46'),
(381, 'root', 'Login: root', '2013-07-29 11:07:43'),
(382, 'root', 'Page Controller Update 1', '2013-07-29 11:20:54'),
(383, 'root', 'Page Controller Update 1', '2013-07-29 11:22:31'),
(384, 'root', 'Page Controller Update 1', '2013-07-29 11:25:24'),
(385, 'root', 'Page Controller Update 1', '2013-07-29 11:25:28'),
(386, 'root', 'Page Controller Update 2', '2013-07-29 11:26:27'),
(387, 'root', 'Page Controller Update 3', '2013-07-29 11:26:37'),
(388, 'root', 'Page Controller Update 1', '2013-07-29 11:30:15'),
(389, 'root', 'Page Controller Update 2', '2013-07-29 11:30:30'),
(390, 'root', 'Page Controller Update 3', '2013-07-29 11:30:49'),
(391, 'root', 'Page Controller Update 2', '2013-07-29 11:30:58'),
(392, 'root', 'Page Controller Update 1', '2013-07-29 11:31:05'),
(393, 'root', 'MenuBackendController Update 29', '2013-07-29 12:22:52'),
(394, 'root', 'Page Controller Update 1', '2013-07-29 12:23:03'),
(395, 'root', 'Setting Update', '2013-07-29 12:29:03'),
(396, 'root', 'Page Controller Update 4', '2013-07-29 12:32:08'),
(397, 'root', 'Page Controller Update 5', '2013-07-29 12:32:31'),
(398, 'root', 'Page Controller Update 3', '2013-07-29 12:33:59'),
(399, 'root', 'Page Controller Update 3', '2013-07-29 12:34:09'),
(400, 'root', 'Page Controller Update 1', '2013-07-29 12:37:09'),
(401, 'root', 'Setting Update', '2013-07-29 12:39:14'),
(402, 'root', 'Page Controller Update 14', '2013-07-29 12:41:10'),
(403, 'root', 'Page Controller Update 14', '2013-07-29 12:42:01'),
(404, 'root', 'Page Controller Update 14', '2013-07-29 12:42:41'),
(405, 'root', 'Page Controller Update 14', '2013-07-29 12:43:06'),
(406, 'root', 'Page Controller Update 14', '2013-07-29 12:44:41'),
(407, 'root', 'Page Controller Update 14', '2013-07-29 12:46:03'),
(408, 'root', 'Page Controller Update 1', '2013-07-29 12:59:10'),
(409, 'root', 'LanguageController Update 1', '2013-07-29 13:02:47'),
(410, 'root', 'LanguageController Update 1', '2013-07-29 13:03:01'),
(411, 'root', 'Page Controller Update 14', '2013-07-29 14:21:17'),
(412, 'root', 'Setting Update', '2013-07-29 14:27:49'),
(413, 'root', 'Setting Update', '2013-07-29 14:28:16'),
(414, 'root', 'Page Controller Update 1', '2013-07-29 14:50:23'),
(415, 'root', 'Page Controller Update 2', '2013-07-29 14:50:43'),
(416, 'root', 'Page Controller Update 3', '2013-07-29 14:50:58'),
(417, 'root', 'Page Controller Update 17', '2013-07-29 14:51:25'),
(418, 'root', 'Page Controller Update 4', '2013-07-29 14:51:54'),
(419, 'root', 'Page Controller Update 5', '2013-07-29 14:52:29'),
(420, 'root', 'Page Controller Update 1', '2013-07-29 14:57:21'),
(421, 'root', 'Page Controller Update 2', '2013-07-29 14:57:35'),
(422, 'root', 'Page Controller Update 3', '2013-07-29 14:57:47'),
(423, 'root', 'Page Controller Update 17', '2013-07-29 14:57:59'),
(424, 'root', 'Page Controller Update 4', '2013-07-29 14:58:09'),
(425, 'root', 'Page Controller Update 5', '2013-07-29 14:58:20'),
(426, 'root', 'Artikel Update 1', '2013-07-29 15:05:37'),
(427, 'root', 'Artikel Update 1', '2013-07-29 15:05:45'),
(428, 'root', 'Artikel Update 1', '2013-07-29 15:07:44'),
(429, 'root', 'Artikel Update 1', '2013-07-29 15:08:22'),
(430, 'root', 'Artikel Delete 2', '2013-07-29 15:09:10'),
(431, 'root', 'Layanan Delete 2', '2013-07-29 15:13:30'),
(432, 'root', 'Layanan Delete 1', '2013-07-29 15:13:31'),
(433, 'root', 'Layanan Delete 3', '2013-07-29 15:13:32'),
(434, 'root', 'Layanan Controller Create 4', '2013-07-29 15:20:44'),
(435, 'root', 'Layanan Controller Create 5', '2013-07-29 15:24:14'),
(436, 'root', 'Layanan Controller Update 5', '2013-07-29 15:24:31'),
(437, 'root', 'Layanan Controller Create 6', '2013-07-29 15:26:51'),
(438, 'root', 'Page Controller Update 2', '2013-07-29 15:27:25'),
(439, 'root', 'Page Controller Update 4', '2013-07-29 15:28:08'),
(440, 'root', 'Page Controller Update 5', '2013-07-29 15:29:16'),
(441, 'root', 'Page Controller Update 1', '2013-07-29 16:53:29'),
(442, 'root', 'Login: root', '2013-07-29 17:03:59'),
(443, 'root', 'Page Controller Update 17', '2013-07-29 17:04:40'),
(444, 'root', 'MenuBackendController Create 33', '2013-07-29 17:35:44'),
(445, 'root', 'Slide Delete 3', '2013-07-29 17:37:22'),
(446, 'root', 'Slide Delete 4', '2013-07-29 17:37:40'),
(447, 'root', 'Slide Create 5', '2013-07-29 17:38:20'),
(448, 'root', 'Slide Create 6', '2013-07-29 17:38:43'),
(449, 'root', 'Page Controller Update 1', '2013-07-29 17:40:01'),
(450, 'root', 'Login: root', '2013-07-30 09:33:22'),
(451, 'root', 'Page Controller Update 17', '2013-07-30 09:34:23'),
(452, 'root', 'Page Controller Update 4', '2013-07-30 09:37:35'),
(453, 'root', 'Page Controller Update 4', '2013-07-30 09:39:50'),
(454, 'root', 'Page Controller Update 5', '2013-07-30 09:42:09'),
(455, 'root', 'Layanan Controller Update 4', '2013-07-30 09:43:07'),
(456, 'root', 'Layanan Controller Update 5', '2013-07-30 09:44:49'),
(457, 'root', 'Page Controller Update 3', '2013-07-30 09:45:44'),
(458, 'root', 'Page Controller Update 5', '2013-07-30 09:48:31'),
(459, 'root', 'Artikel Update 1', '2013-07-30 10:04:11'),
(460, 'root', 'Page Controller Update 17', '2013-07-30 10:07:46'),
(461, 'root', 'Page Controller Update 4', '2013-07-30 10:08:58'),
(462, 'root', 'Page Controller Update 4', '2013-07-30 10:11:49'),
(463, 'root', 'Page Controller Update 4', '2013-07-30 10:12:13'),
(464, 'root', 'Page Controller Update 4', '2013-07-30 10:12:43'),
(465, 'root', 'Page Controller Update 5', '2013-07-30 10:13:47'),
(466, 'root', 'Page Controller Update 14', '2013-07-30 10:39:45'),
(467, 'root', 'Slide Update 6', '2013-07-30 11:04:49'),
(468, 'root', 'Slide Create 7', '2013-07-30 11:05:15'),
(469, 'root', 'Slide Create 8', '2013-07-30 11:05:45'),
(470, 'root', 'Slide Create 9', '2013-07-30 11:06:00'),
(471, 'root', 'Login: root', '2013-07-31 16:01:51'),
(472, 'root', 'Login: root', '2013-08-01 11:07:10'),
(473, 'root', 'Page Controller Update 1', '2013-08-01 11:12:53'),
(474, 'root', 'Layanan Controller Update 6', '2013-08-01 11:14:20'),
(475, 'root', 'Login: root', '2013-08-02 15:29:15'),
(476, 'root', 'Layanan Controller Update 6', '2013-08-02 15:30:32'),
(477, 'root', 'Login: root', '2013-08-02 15:31:12'),
(478, 'root', 'Layanan Controller Update 6', '2013-08-02 15:31:33'),
(479, 'root', 'Login: root', '2013-08-02 15:32:11'),
(480, 'root', 'Layanan Controller Update 6', '2013-08-02 15:32:50'),
(481, 'root', 'Login: root', '2013-08-02 15:33:28'),
(482, 'admin', 'Login: admin', '2013-08-13 18:22:19'),
(483, 'root', 'Login: root', '2013-08-13 18:23:59'),
(484, 'admin', 'Login: admin', '2013-08-13 18:25:18'),
(485, 'admin', 'Page Controller Update 1', '2013-08-13 18:27:24'),
(486, 'admin', 'Slide Delete 5', '2013-08-13 18:34:41'),
(487, 'root', 'Login: root', '2013-08-13 18:36:27'),
(488, 'root', 'MenuBackendController Update 19', '2013-08-13 18:36:57'),
(489, 'root', 'MenuBackendController Update 33', '2013-08-13 18:37:23'),
(490, 'admin', 'Login: admin', '2013-08-13 18:37:42'),
(491, 'root', 'Login: root', '2013-08-13 18:38:26'),
(492, 'admin', 'Login: admin', '2013-08-13 18:39:37'),
(493, 'admin', 'Slide Create 12', '2013-08-13 18:51:38'),
(494, 'admin', 'Slide Delete 12', '2013-08-13 18:51:58'),
(495, 'admin', 'Login: admin', '2013-08-14 09:49:08'),
(496, 'admin', 'Login: admin', '2013-08-14 10:54:33'),
(497, 'admin', 'Login: admin', '2013-08-14 11:42:48'),
(498, 'root', 'Login: root', '2013-08-15 16:32:25'),
(499, 'root', 'Setting Update', '2013-08-15 16:32:57'),
(500, 'root', 'Login: root', '2013-08-15 17:21:41'),
(501, 'root', 'Login: root', '2013-08-16 12:29:50'),
(502, 'root', 'Login: root', '2013-08-16 12:30:02'),
(503, 'root', 'Setting Update', '2013-08-16 12:30:19'),
(504, 'root', 'Setting Update', '2013-08-16 12:32:12'),
(505, 'root', 'Login: root', '2013-08-19 11:35:50'),
(506, 'root', 'Login: root', '2013-08-19 11:36:25'),
(507, 'root', 'Page Controller Update 1', '2013-08-19 11:36:52'),
(508, 'root', 'Login: root', '2013-08-19 12:19:24'),
(509, 'root', 'Layanan Controller Update 5', '2013-08-19 12:21:06'),
(510, 'admin', 'Login: admin', '2013-08-22 14:11:00'),
(511, 'admin', 'Page Controller Update 5', '2013-08-22 14:13:30'),
(512, 'admin', 'Page Controller Update 4', '2013-08-22 14:14:02'),
(513, 'admin', 'Login: admin', '2013-08-22 14:20:50'),
(514, 'admin', 'Setting Update', '2013-08-22 14:53:55'),
(515, 'admin', 'Askus Create 1', '2013-08-22 15:36:01'),
(516, 'admin', 'Askus Delete 1', '2013-08-22 15:36:37'),
(517, 'root', 'Login: root', '2013-08-22 17:39:49'),
(518, 'root', 'Setting Update', '2013-08-22 17:41:43'),
(519, 'root', 'Page Controller Update 14', '2013-08-22 17:45:52'),
(520, 'root', 'Page Controller Update 1', '2013-08-22 17:47:45'),
(521, 'root', 'Layanan Controller Update 4', '2013-08-22 17:50:05'),
(522, 'root', 'Layanan Controller Update 5', '2013-08-22 17:51:31'),
(523, 'root', 'Layanan Controller Update 4', '2013-08-22 17:51:49'),
(524, 'root', 'Layanan Controller Update 6', '2013-08-22 17:58:02'),
(525, 'root', 'ListVisitController Update 1', '2013-08-22 17:59:58'),
(526, 'root', 'Setting Update', '2013-08-22 18:01:24'),
(527, 'root', 'Setting Update', '2013-08-22 18:07:05'),
(528, 'root', 'Setting Update', '2013-08-22 18:07:45'),
(529, 'root', 'Login: root', '2013-08-23 10:30:39'),
(530, 'root', 'Artikel Delete 15', '2013-08-23 10:32:53'),
(531, 'root', 'Setting Update', '2013-08-23 10:51:44'),
(532, 'root', 'Setting Update', '2013-08-23 10:53:38'),
(533, 'root', 'Login: root', '2013-08-24 12:58:08'),
(534, 'root', 'Setting Update', '2013-08-24 12:58:55'),
(535, 'root', 'Setting Update', '2013-08-24 12:59:45'),
(536, 'root', 'Login: root', '2013-08-24 13:00:13'),
(537, 'root', 'Setting Update', '2013-08-24 13:00:29'),
(538, 'root', 'Login: root', '2013-08-24 13:48:39'),
(539, 'root', 'Layanan Controller Update 5', '2013-08-24 13:49:35'),
(540, 'root', 'Layanan Controller Update 6', '2013-08-24 13:50:16'),
(541, 'root', 'Page Controller Update 4', '2013-08-24 14:14:54'),
(542, 'root', 'Page Controller Update 4', '2013-08-24 14:15:19'),
(543, 'root', 'Setting Update', '2013-08-24 14:19:57'),
(544, 'root', 'Page Controller Update 5', '2013-08-24 14:37:39'),
(545, 'root', 'Page Controller Update 5', '2013-08-24 14:37:58'),
(546, 'root', 'Login: root', '2013-08-24 15:55:41'),
(547, 'root', 'ListVisitController Update 1', '2013-08-24 16:07:33'),
(548, 'root', 'ListVisitController Update 2', '2013-08-24 16:07:48'),
(549, 'root', 'ListVisitController Update 3', '2013-08-24 16:08:01'),
(550, 'root', 'Login: root', '2013-08-24 16:19:32'),
(551, 'root', 'Setting Update', '2013-08-24 16:19:58'),
(552, 'root', 'Login: root', '2013-08-26 23:29:21'),
(553, 'root', 'Artikel Create 16', '2013-08-26 23:50:37'),
(554, 'root', 'Artikel Create 17', '2013-08-27 00:11:47'),
(555, 'root', 'Login: root', '2013-08-27 10:19:44'),
(556, 'root', 'Artikel Update 14', '2013-08-27 10:20:02'),
(557, 'root', 'Artikel Update 16', '2013-08-27 10:20:15'),
(558, 'root', 'Artikel Update 17', '2013-08-27 10:20:27'),
(559, 'root', 'Login: root', '2013-08-27 10:24:31'),
(560, 'root', 'MenuBackendController Update 35', '2013-08-27 10:25:17'),
(561, 'root', 'Artikel Update 16', '2013-08-27 10:32:47'),
(562, 'root', 'Artikel Update 17', '2013-08-27 10:45:03'),
(563, 'root', 'Login: root', '2013-08-27 11:03:12'),
(564, 'root', 'Artikel Update 16', '2013-08-27 11:06:05'),
(565, 'root', 'Artikel Update 16', '2013-08-27 11:06:39'),
(566, 'root', 'Artikel Update 17', '2013-08-27 11:07:34'),
(567, 'root', 'Artikel Update 16', '2013-08-27 11:08:04'),
(568, 'root', 'Setting Update', '2013-08-27 11:09:21'),
(569, 'root', 'Setting Update', '2013-08-27 11:10:11'),
(570, 'root', 'Setting Update', '2013-08-27 11:10:39'),
(571, 'root', 'Setting Update', '2013-08-27 11:10:58'),
(572, 'root', 'Setting Update', '2013-08-27 11:11:21'),
(573, 'root', 'Setting Update', '2013-08-27 11:11:40'),
(574, 'root', 'Setting Update', '2013-08-27 11:12:00'),
(575, 'root', 'Setting Update', '2013-08-27 11:12:21'),
(576, 'root', 'Setting Update', '2013-08-27 11:12:39'),
(577, 'root', 'Setting Update', '2013-08-27 11:12:53'),
(578, 'root', 'Setting Update', '2013-08-27 11:13:12'),
(579, 'root', 'Setting Update', '2013-08-27 11:13:30'),
(580, 'root', 'Setting Update', '2013-08-27 11:14:08'),
(581, 'root', 'Setting Update', '2013-08-27 11:16:06'),
(582, 'root', 'Setting Update', '2013-08-27 11:16:41'),
(583, 'root', 'Setting Update', '2013-08-27 11:19:02'),
(584, 'root', 'Artikel Update 17', '2013-08-27 11:52:05'),
(585, 'root', 'Artikel Update 17', '2013-08-27 11:52:53'),
(586, 'admin', 'Login: admin', '2013-08-29 10:34:54'),
(587, 'admin', 'Slide Update 6', '2013-08-29 10:37:15'),
(588, 'admin', 'Slide Update 6', '2013-08-29 10:37:36'),
(589, 'admin', 'Slide Update 8', '2013-08-29 10:42:33'),
(590, 'admin', 'Slide Delete 9', '2013-08-29 10:43:11'),
(591, 'root', 'Login: root', '2013-08-29 11:44:34'),
(592, 'root', 'Page Controller Update 14', '2013-08-29 11:47:00'),
(593, 'root', 'Page Controller Update 1', '2013-08-29 11:49:55'),
(594, 'root', 'Layanan Controller Update 4', '2013-08-29 11:51:21'),
(595, 'root', 'Layanan Controller Update 5', '2013-08-29 11:51:52'),
(596, 'root', 'Layanan Controller Update 6', '2013-08-29 11:53:16'),
(597, 'root', 'Login: root', '2013-08-29 14:37:41'),
(598, 'root', 'Page Controller Update 4', '2013-08-29 14:40:05'),
(599, 'root', 'Page Controller Update 5', '2013-08-29 14:41:20'),
(600, 'root', 'Setting Update', '2013-08-29 14:50:53'),
(601, 'root', 'Login: root', '2013-09-09 10:41:08'),
(602, 'root', 'Page Controller Update 14', '2013-09-09 10:43:26'),
(603, 'root', 'Page Controller Update 2', '2013-09-09 10:45:20'),
(604, 'root', 'Page Controller Update 2', '2013-09-09 10:46:37'),
(605, 'root', 'Page Controller Update 2', '2013-09-09 10:47:01'),
(606, 'root', 'Layanan Controller Update 4', '2013-09-09 10:57:58'),
(607, 'root', 'Layanan Controller Update 5', '2013-09-09 10:58:27'),
(608, 'root', 'Page Controller Update 2', '2013-09-09 11:00:41'),
(609, 'root', 'Page Controller Update 2', '2013-09-09 11:01:39'),
(610, 'root', 'Login: root', '2013-09-09 11:59:49'),
(611, 'root', 'Page Controller Update 5', '2013-09-09 12:11:25'),
(612, 'root', 'Login: root', '2013-09-09 15:35:50'),
(613, 'root', 'Setting Update', '2013-09-09 15:36:46'),
(614, 'root', 'Login: root', '2013-09-10 12:00:56'),
(615, 'root', 'Login: root', '2013-09-10 12:13:36'),
(616, 'root', 'Artikel Update 14', '2013-09-10 12:18:38'),
(617, 'root', 'Artikel Update 14', '2013-09-10 12:29:24'),
(618, 'root', 'Login: root', '2013-09-10 13:05:01'),
(619, 'root', 'Page Controller Update 1', '2013-09-10 13:05:57'),
(620, 'root', 'Layanan Controller Update 4', '2013-09-10 13:10:54'),
(621, 'root', 'Layanan Controller Update 4', '2013-09-10 13:11:16'),
(622, 'root', 'Layanan Controller Update 5', '2013-09-10 13:11:49'),
(623, 'root', 'Layanan Controller Update 6', '2013-09-10 13:12:23'),
(624, 'root', 'Login: root', '2013-09-11 14:37:06'),
(625, 'root', 'Artikel Update 14', '2013-09-11 14:39:16'),
(626, 'root', 'Artikel Update 14', '2013-09-11 14:40:07'),
(627, 'root', 'Login: root', '2013-09-11 17:24:31'),
(628, 'root', 'Login: root', '2013-09-12 10:39:29'),
(629, 'root', 'Setting Update', '2013-09-12 10:40:11'),
(630, 'root', 'Login: root', '2013-09-13 11:28:50'),
(631, 'root', 'Artikel Update 14', '2013-09-13 11:30:58'),
(632, 'admin', 'Login: admin', '2013-09-14 08:58:20'),
(633, 'root', 'Login: root', '2013-09-14 10:41:36'),
(634, 'root', 'Page Controller Update 5', '2013-09-14 10:43:46'),
(635, 'root', 'Page Controller Update 4', '2013-09-14 10:52:11'),
(636, 'root', 'MenuBackendController Update 12', '2013-09-14 10:53:57'),
(637, 'root', 'MenuBackendController Update 16', '2013-09-14 10:54:18'),
(638, 'root', 'MenuBackendController Update 17', '2013-09-14 10:54:39'),
(639, 'root', 'MenuBackendController Update 18', '2013-09-14 10:54:52'),
(640, 'root', 'MenuBackendController Update 25', '2013-09-14 10:55:12'),
(641, 'root', 'MenuBackendController Update 19', '2013-09-14 11:15:43'),
(642, 'root', 'MenuBackendController Update 19', '2013-09-14 11:16:58'),
(643, 'root', 'MenuBackendController Update 15', '2013-09-14 11:17:09'),
(644, 'root', 'MenuBackendController Update 34', '2013-09-14 11:17:25'),
(645, 'admin', 'Login: admin', '2013-09-15 11:45:41'),
(646, 'admin', 'Page Controller Update 14', '2013-09-15 12:33:52'),
(647, 'admin', 'Page Controller Update 2', '2013-09-15 12:35:27'),
(648, 'admin', 'Page Controller Update 14', '2013-09-15 12:39:30'),
(649, 'admin', 'Page Controller Update 14', '2013-09-15 12:41:33'),
(650, 'admin', 'Page Controller Update 14', '2013-09-15 12:41:49'),
(651, 'admin', 'Login: admin', '2013-09-16 14:22:37'),
(652, 'admin', 'Login: admin', '2013-09-16 18:47:20'),
(653, 'admin', 'Page Controller Update 14', '2013-09-16 18:47:53'),
(654, 'admin', 'Artikel Update 14', '2013-09-16 18:49:29'),
(655, 'admin', 'Artikel Update 14', '2013-09-16 18:49:51'),
(656, 'admin', 'Artikel Update 16', '2013-09-16 18:51:16'),
(657, 'admin', 'Artikel Update 17', '2013-09-16 18:51:45'),
(658, 'admin', 'Login: admin', '2013-09-17 09:29:39'),
(659, 'admin', 'Artikel Update 16', '2013-09-17 09:34:53'),
(660, 'admin', 'Login: admin', '2013-09-22 17:44:09'),
(661, 'admin', 'Login: admin', '2013-09-22 18:14:23'),
(662, 'admin', 'Login: admin', '2013-09-22 20:20:23'),
(663, 'admin', 'Login: admin', '2013-09-23 09:19:15'),
(664, 'admin', 'Login: admin', '2013-09-25 09:14:22'),
(665, 'admin', 'Login: admin', '2013-09-25 09:24:16'),
(666, 'admin', 'Artikel Create 18', '2013-09-25 09:27:15'),
(667, 'admin', 'Artikel Update 18', '2013-09-25 09:29:16'),
(668, 'admin', 'Artikel Update 18', '2013-09-25 10:06:06'),
(669, 'admin', 'Artikel Update 18', '2013-09-25 10:07:59'),
(670, 'root', 'Login: root', '2013-09-25 15:11:17'),
(671, 'admin', 'Login: admin', '2013-09-25 15:46:31'),
(672, 'root', 'Artikel Create 19', '2013-09-25 15:56:26'),
(673, 'root', 'Login: root', '2013-09-25 16:09:00'),
(674, 'root', 'Artikel Update 19', '2013-09-25 16:12:50'),
(675, 'admin', 'Login: admin', '2013-09-25 16:29:29'),
(676, 'admin', 'Artikel Update 14', '2013-09-25 16:30:05'),
(677, 'admin', 'Artikel Update 14', '2013-09-25 16:30:45'),
(678, 'admin', 'Artikel Update 14', '2013-09-25 16:31:11'),
(679, 'admin', 'Artikel Update 14', '2013-09-25 16:31:20'),
(680, 'admin', 'Artikel Update 14', '2013-09-25 16:32:32'),
(681, 'admin', 'Artikel Update 14', '2013-09-25 16:32:39'),
(682, 'admin', 'Login: admin', '2013-09-26 10:38:25'),
(683, 'admin', 'Artikel Update 14', '2013-09-26 10:39:08'),
(684, 'admin', 'Artikel Update 14', '2013-09-26 10:39:15'),
(685, 'admin', 'Artikel Update 18', '2013-09-26 10:40:29'),
(686, 'admin', 'Artikel Update 19', '2013-09-26 10:41:17'),
(687, 'Admin', 'Login: Admin', '2013-09-26 18:29:31'),
(688, 'admin', 'Login: admin', '2013-09-26 18:31:52'),
(689, 'root', 'Login: root', '2013-10-13 20:47:08'),
(690, 'root', 'Menu Backend Delete 35', '2013-10-13 20:47:57'),
(691, 'root', 'Menu Backend Delete 15', '2013-10-13 20:48:26'),
(692, 'root', 'Menu Backend Delete 17', '2013-10-13 20:48:47'),
(693, 'root', 'Menu Backend Delete 18', '2013-10-13 20:48:52'),
(694, 'root', 'Menu Backend Delete 19', '2013-10-13 20:49:34'),
(695, 'root', 'Menu Backend Delete 25', '2013-10-13 20:49:45'),
(696, 'root', 'Menu Backend Delete 34', '2013-10-13 20:49:47'),
(697, 'root', 'LanguageController Update 2', '2013-10-13 21:06:20'),
(698, 'root', 'Login: root', '2013-10-23 03:40:58'),
(699, 'root', 'Login: root', '2013-11-15 21:07:49'),
(700, 'root', 'Page Controller Update 1', '2013-11-15 21:09:36'),
(701, 'root', 'Menu Backend Delete 29', '2013-11-15 21:10:49'),
(702, 'root', 'Page Controller Update 2', '2013-11-15 21:13:56'),
(703, 'root', 'Page Controller Update 2', '2013-11-15 21:16:25'),
(704, 'root', 'Page Controller Update 2', '2013-11-15 21:17:06'),
(705, 'root', 'MenuBackendController Create 34', '2013-11-15 21:24:38'),
(706, 'root', 'Page Controller Update 3', '2013-11-15 21:25:28'),
(707, 'root', 'MenuBackendController Create 35', '2013-11-15 21:26:56'),
(708, 'root', 'Page Controller Create 15', '2013-11-15 21:30:47'),
(709, 'root', 'Login: root', '2013-11-17 23:00:56'),
(710, 'root', 'Login: root', '2013-11-18 19:43:37'),
(711, 'root', 'Layanan Controller Create 1', '2013-11-18 20:05:02'),
(712, 'root', 'Layanan Controller Create 2', '2013-11-18 20:06:45'),
(713, 'root', 'Layanan Controller Create 3', '2013-11-18 20:14:53'),
(714, 'root', 'Layanan Controller Update 3', '2013-11-18 20:18:00'),
(715, 'root', 'Layanan Controller Create 4', '2013-11-18 20:21:59'),
(716, 'root', 'Layanan Controller Create 5', '2013-11-18 20:22:54'),
(717, 'root', 'Page Controller Update 15', '2013-11-18 20:25:27'),
(718, 'root', 'Page Controller Update 15', '2013-11-18 20:26:01'),
(719, 'root', 'Page Controller Update 15', '2013-11-18 20:26:28'),
(720, 'root', 'Page Controller Update 15', '2013-11-18 20:28:18'),
(721, 'root', 'Page Controller Update 15', '2013-11-18 20:30:15'),
(722, 'root', 'Page Controller Create 16', '2013-11-18 20:53:53'),
(723, 'root', 'Page Controller Update 16', '2013-11-18 20:54:12'),
(724, 'root', 'Artikel Create 1', '2013-11-18 21:24:23'),
(725, 'root', 'MenuBackendController Update 12', '2013-11-18 21:48:49'),
(726, 'root', 'MenuBackendController Update 12', '2013-11-18 21:48:57'),
(727, 'root', 'MenuBackendController Update 12', '2013-11-18 21:49:25'),
(728, 'root', 'MenuBackendController Create 36', '2013-11-18 21:58:08'),
(729, 'root', 'MenuBackendController Update 36', '2013-11-18 21:59:04'),
(730, 'root', 'MenuBackendController Update 36', '2013-11-18 21:59:47'),
(731, 'root', 'MenuBackendController Update 12', '2013-11-18 22:00:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_backend`
--

CREATE TABLE IF NOT EXISTS `menu_backend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `action` varchar(250) NOT NULL,
  `sub_action` varchar(250) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL,
  `shortcut` enum('0','1') NOT NULL,
  `hidden` enum('0','1') NOT NULL,
  `active` enum('0','1') NOT NULL,
  `position` enum('0','1') NOT NULL,
  `get` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `menu_backend`
--

INSERT INTO `menu_backend` (`id`, `parent`, `name`, `desc`, `url`, `action`, `sub_action`, `icon`, `sort`, `shortcut`, `hidden`, `active`, `position`, `get`) VALUES
(1, 0, 'Home', '', 'site', 'index', '', 'no_icon', 1, '0', '1', '1', '0', ''),
(2, 0, 'Setting', '', '', '', '', '', 3, '1', '0', '1', '1', ''),
(3, 0, 'Change Password', '', 'user', 'edit', '', '', 6, '0', '0', '1', '1', ''),
(7, 31, 'User', '', 'user', 'index|create|update|delete', '', '', 1, '0', '0', '1', '1', ''),
(8, 2, 'Log Activity', '', 'setting', 'log', '', 'cutie_icon_set_preview_06.jpg', 3, '1', '0', '1', '1', ''),
(9, 10, 'Menu Backend', '', 'menuBackend', 'index|create|update|delete|sort', '', 'no_icon', 1, '1', '0', '1', '0', ''),
(10, 0, 'Root', '', '', '', '', '', 7, '0', '0', '1', '1', ''),
(11, 2, 'Overview', '', 'setting', 'index|create|update|delete', '', 'gear.png', 1, '1', '0', '1', '0', ''),
(12, 0, 'Content', '', 'page', 'index|create|update|delete|sort|upload', 'editModule|showHome|editActive|editHidden|editIntro|editKode', 'cutie_icon_set_preview_15.jpg', 4, '1', '0', '1', '0', ''),
(13, 2, 'Language', '', 'language', 'index|create|update|delete|sort', '', 'icon-star.png', 2, '0', '0', '1', '1', ''),
(14, 0, 'Shortcut', '', '', '', '', '', 2, '1', '0', '1', '0', ''),
(16, 14, 'Gallery Images', '', 'gallery', 'index|create|update|delete|sort', '', '', 3, '0', '1', '0', '', ''),
(20, 14, 'Gallery', '', 'galleryMain', 'index|create|update|delete|sort', '', '', 1, '0', '0', '0', '', ''),
(28, 0, 'Logout', '', 'home', 'logout', '', '', 8, '0', '0', '1', '1', ''),
(30, 10, 'List Menu Icon', '', 'icon', 'index|create|update|delete', '', '', 2, '0', '0', '1', '1', ''),
(31, 0, 'Users', '', '', '', '', '', 5, '0', '0', '1', '1', ''),
(32, 31, 'User Groups', '', 'userGroup', 'index|create|update|delete', '', '', 2, '0', '0', '1', '', ''),
(33, 14, 'Slide Home', '', 'slide', 'index|create|update|delete|sort|upload', '', 'cutie_icon_set_preview_12.jpg', 4, '1', '0', '1', '', ''),
(34, 14, 'List Services', '', 'layanan', 'index|create|update|delete|sort|upload', '', 'cutie_icon_set_preview_09.jpg', 5, '1', '0', '1', '', ''),
(35, 14, 'List News and Artikel', '', 'artikel', 'index|create|update|delete|sort|upload', '', 'cutie_icon_set_preview_08.jpg', 6, '1', '0', '1', '', ''),
(36, 14, 'Page illustrasi', '', 'PageIllustrasi', 'index|create|update|delete', '', 'icon-slidekits-xl.png', 2, '1', '0', '1', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `name`, `target`, `active`) VALUES
(1, 'Static', 'static', '1'),
(2, 'Artikel', 'artikel', '1'),
(3, 'Gallery', 'gallery', '0'),
(6, 'Home', 'home', '1'),
(9, 'Contact', 'contact', '1'),
(10, 'About', 'about', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `modul_target` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `date_input` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `active` enum('0','1') NOT NULL,
  `hidden` enum('0','1') NOT NULL,
  `modul` enum('0','1') NOT NULL,
  `menu_modul` varchar(250) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `hide_menu` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `parent`, `url`, `kode`, `modul_target`, `sort`, `date_input`, `date_modif`, `active`, `hidden`, `modul`, `menu_modul`, `icon`, `hide_menu`) VALUES
(1, 0, 'about-us', 'About Us', 'about', 2, '2013-06-14 11:26:13', '2013-11-15 21:10:00', '1', '0', '1', '', 'icon-building.jpg', '0'),
(2, 0, 'our-services', 'Our Services', 'static', 3, '2013-06-14 11:29:03', '2013-11-15 21:17:30', '1', '0', '1', 'layanan', 'gear.png', '0'),
(3, 0, 'news-articles', 'News & Articles', 'artikel', 4, '2013-06-14 11:30:28', '2013-11-15 21:25:52', '1', '0', '1', 'artikel', 'cutie_icon_set_preview_08.jpg', '0'),
(5, 0, 'contact-us', 'Contact Us', 'contact', 7, '2013-06-14 11:33:58', '2013-09-14 09:44:10', '1', '0', '1', '', 'cutie_icon_set_preview_01.jpg', '0'),
(14, 0, 'home', 'Home', 'home', 1, '2013-06-14 11:58:29', '2013-09-16 17:48:17', '1', '0', '1', 'slide', 'home-65.png', '0'),
(15, 0, 'portofolio', 'portofolio', 'static', 6, '2013-11-15 21:31:11', '2013-11-18 20:30:39', '1', '0', '0', '', '', '0'),
(16, 0, 'our-process', 'our process', 'static', 7, '2013-11-18 20:54:17', '2013-11-18 20:54:36', '1', '0', '0', '', '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_description`
--

CREATE TABLE IF NOT EXISTS `page_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `intro` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

--
-- Dumping data untuk tabel `page_description`
--

INSERT INTO `page_description` (`id`, `page_id`, `language_id`, `title`, `intro`, `content`) VALUES
(244, 5, 1, 'Hubungi Kami', 'HUBUNGI KAMI', '<p>Masukan anda akan membantu kami untuk meningkatkan kualitas pelayanan di <strong>Bethesda Clinic</strong>. Silakan bagikan pemikiran anda kepada kami dengan mengisi formulir di bawah ini.</p>\r\n'),
(258, 14, 1, 'Home', '<i class="icon-home"></i>', '<h3>Apa itu Bethesda Clinic?</h3>\r\n\r\n<p><em>Fasilitas layanan kesehatan yang lebih fokus menangani segala jenis perawatan masalah tulang belakang.</em></p>\r\n\r\n<p>Kami&nbsp;mengobati masalah tulang belakang &nbsp;dari yang paling sederhana hingga yang paling kompleks dengan cara&nbsp;tanpa operasi terlebih dahulu. Operasi dicadangkan sebagai pilihan terakhir jika penanganan tanpa operasi tidak dapat menyembuhkan masalah utama dan mengurangi rasa nyeri.&nbsp;Dokter&nbsp;dan&nbsp;fisioterapis di klinik kami mendapatkan training secara regular untuk memastikan penanganan kami memenuhi standar internasional.&nbsp;Konsultan ahli tulang belakang&nbsp;dari Singapura akan membantu kami untuk mengobati&nbsp;kasus&nbsp;yang kompleks dan kasus yang memerlukan penanganan khusus.</p>\r\n'),
(259, 1, 1, 'Tentang Kami', 'TENTANG KAMI', ''),
(262, 2, 1, 'Our Services', '', ''),
(263, 3, 1, 'Blog & News', '', ''),
(269, 15, 1, 'Portofolio', 'Portofolio', '<p>Page Portoflio</p>\r\n'),
(271, 16, 1, 'Our Process', 'Our Process', '<p style="line-height: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_illustrasi`
--

CREATE TABLE IF NOT EXISTS `page_illustrasi` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_page` int(50) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `images` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `page_illustrasi`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `hide` int(11) NOT NULL,
  `group` varchar(100) NOT NULL,
  `dual_language` enum('n','y') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `name`, `value`, `type`, `hide`, `group`, `dual_language`) VALUES
(1, 'title', '', 'text', 0, 'setting', 'y'),
(2, 'keywords', '', 'text', 0, 'setting', 'y'),
(3, 'description', '', 'textarea', 0, 'setting', 'y'),
(4, 'email', 'info@bethesda-clinic.com', 'text', 0, 'setting', 'n'),
(5, 'address1', 'Spazio, 2nd Floor, Unit 215 <br>\r\nJalan Lingkar Dalam Barat No. 33<br>\r\nSurabaya 60226, Jawa Timur', 'textarea', 0, 'setting', 'n'),
(7, 'phone', '(62 31) 9900 1242', 'text', 0, 'setting', 'n'),
(8, 'fax', '(62 31) 9900 1243', 'text', 0, 'setting', 'n'),
(10, 'general_fasilities', 'Individually controlled air-conditioning\r\nWe''re proud to provide TV Program with 60 channels consist of entertainment, movies, sport, news, science, etc, for your viewing satisfaction.\r\nMini bar\r\nDirect Dial Telephone, Home Country Direct\r\nCoffee and Tea Making Facilities.\r\nRoom Service (24 hours)\r\nLaundry Service/Dry Cleaning', 'textarea', 1, 'setting', 'n'),
(11, 'hotline', '(031) 566 3939', 'text', 1, 'setting', 'n'),
(13, 'facebook', 'http://www.facebook.com/', 'text', 1, 'setting', 'n'),
(14, 'twitter', 'http://www.twitter.com/', 'text', 1, 'setting', 'n'),
(15, 'welcome', '', 'text', 0, 'setting', 'y'),
(16, 'title_home', '', 'text', 1, 'home', 'y'),
(17, 'intro', '', 'textarea', 1, 'home', 'y'),
(18, 'content', '', 'textarea', 1, 'home', 'y'),
(19, 'open', '', 'ckeditor', 0, 'setting', 'y'),
(20, 'askus_email', 'info@bethesda-clinic.com', 'text', 0, 'setting', 'n'),
(21, 'location', '', 'text', 0, 'setting', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_description`
--

CREATE TABLE IF NOT EXISTS `setting_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `setting_description`
--

INSERT INTO `setting_description` (`id`, `setting_id`, `language_id`, `value`) VALUES
(1, 1, 1, 'Bethesda Clinic Surabaya - Menangani masalah tulang belakang'),
(2, 2, 1, 'spine clinic, spine problem, klinik tulang belakang, klinik fisioterapi, klinik Bethesda surabaya, klinik surabaya, klinik spazio'),
(3, 3, 1, 'Bethesda Spine Clinic Surabaya - Klinik Tulang Belakang melayani segala keluhan dan problem pada tulang belakang.'),
(4, 15, 1, 'Selamat datang di Bethesda Clinic'),
(5, 16, 1, 'Siapakah yang memerlukan bantuan kami?'),
(6, 17, 1, 'Ibarat sebuah mesin dengan kualitas terbaik, tulang manusiapun memerlukan sebuah perlakuan khusus untuk dapat melakukan fungsinya secara optimal.'),
(7, 18, 1, 'Tulang belakang / Spine merupakan titik pada tubuh manusia yang memiliki jaringan saraf-saraf penting di tubuh. Dengan supervisi dari dr. Alex Tong - Singapore, klinik Bethesda hadir dekat dengan Anda untuk menjadi sarana dan prasarana berbagai kepentingan terkait dengan kesehatan tulang belakang Anda.'),
(8, 19, 1, '<table border="0" cellpadding="1" cellspacing="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>Senin - Sabtu</td>\r\n			<td>13.00 - 22.00 WIB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Minggu</td>\r\n			<td>Tutup</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hari Libur Nasional</td>\r\n			<td>Tutup</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(9, 1, 2, 'Bethesda Clinic Surabaya - Devoted to treat spine problems'),
(10, 2, 2, 'spine clinic, spine problem, klinik tulang belakang, klinik fisioterapi, klinik Bethesda surabaya, klinik surabaya, klinik spazio'),
(11, 3, 2, 'Bethesda Spine Clinic Surabaya - Klinik Tulang Belakang melayani segala keluhan dan problem pada tulang belakang.'),
(12, 15, 2, 'Welcome to Bethesda Clinic'),
(13, 19, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Monday &ndash; Saturday</td>\r\n			<td>01.00 pm &ndash; 10.00 pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunday</td>\r\n			<td>Closed</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Public Holiday</td>\r\n			<td>Closed</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(14, 21, 1, 'Lihat Peta Lokasi'),
(15, 21, 2, 'View Our Location');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `image`, `url`, `sort`) VALUES
(6, '{"image":"d8dd1-fcs-2.jpg","x":"3","y":"0","w":"847","h":"505.21058823529415"}', '', 2),
(8, '{"image":"32e14-fcs02.jpg","x":"0","y":"-5.684341886080802e-14","w":"850","h":"507.00000000000006"}', '', 2),
(10, '{"image":"e96cd-fcs04.jpg","x":"0","y":"-5.684341886080802e-14","w":"850","h":"507.00000000000006"}', '', 4),
(11, '{"image":"8a0a9-fcs05.jpg","x":"0","y":"-5.684341886080802e-14","w":"850","h":"507.00000000000006"}', '', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide_description`
--

CREATE TABLE IF NOT EXISTS `slide_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `slide_description`
--

INSERT INTO `slide_description` (`id`, `slide_id`, `language_id`, `desc`) VALUES
(2, 4, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, quis, nesciunt necessitatibus neque officiis maxime tenetur harum libero aspernatur tempora incidunt veritatis debitis eligendi p'),
(3, 3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, quis, nesciunt necessitatibus neque officiis maxime tenetur harum libero aspernatur tempora incidunt veritatis debitis eligendi p'),
(10, 5, 1, ''),
(11, 5, 2, ''),
(20, 7, 1, ''),
(21, 7, 2, ''),
(26, 9, 1, ''),
(27, 9, 2, ''),
(28, 10, 1, ''),
(29, 10, 2, ''),
(30, 11, 1, ''),
(31, 11, 2, ''),
(32, 12, 1, ''),
(33, 12, 2, ''),
(36, 6, 1, 'bethesda spine clinic'),
(37, 6, 2, ''),
(38, 8, 1, 'bethesda spine clinic'),
(39, 8, 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user`, `email`, `pass`, `last_login`, `sts`) VALUES
(1, 'root', 'ibnudrift@gmail.com', '564fda17f517ae04a86734c2b2341327ed4fd565', '2013-10-13 20:33:48', 1),
(2, 'admin', 'info@mitrasoft-tech.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2013-10-13 20:33:35', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
