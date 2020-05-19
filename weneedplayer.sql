-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 sep. 2019 à 10:13
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `weneedplayer`
--

-- --------------------------------------------------------

--
-- Structure de la table `actuality`
--

DROP TABLE IF EXISTS `actuality`;
CREATE TABLE IF NOT EXISTS `actuality` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `photo` varchar(250) DEFAULT 'ffp.jpg',
  `ligue_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ligue_id` (`ligue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actuality`
--

INSERT INTO `actuality` (`id`, `date`, `title`, `contenu`, `photo`, `ligue_id`) VALUES
(9, '2019-09-14', 'PACAFPS 2019/2020', 'Bonsoir a tous,\r\nMardi soir a eu lieu l’assemblée général\r\nle compte rendu sera publié plus tard.\r\nAfin de pouvoir bien gérer au mieux les démarches administrative les dossiers doivent passer par la ligue pour être validé.\r\nDate butoir de réception des dossier d\'affiliation et inscription à la ligue paca le 31/08\r\nDate butoir de réception des demande de licences 15/09\r\nVous trouverez le liens ci dessous:\r\nDossier a envoyer a l\'adresse ci dessous:\r\n\r\nLigue Paca FFP\r\n5 rue des droits de l\'homme\r\n83390 Cuers\r\n\r\n<a href=\"http://www.ffpaintball.fr/licences-affiliation\" target=\"_blank\">http://www.ffpaintball.fr/licences-affiliation/</a><br>\r\n\r\nMerci a tous et a bientôt', 'f8e60cc35bb9a29d45e5510e85674688.jpg', 18),
(11, '2019-07-23', 'Equipe de France de Paintball – Vétéran 2019', 'Cet été 29 joueurs se sont présentés aux 2 détections de l’équipe de France de Paintball Vétérans.\r\n\r\nVoici les 16 joueurs sélectionnés pour défendre nos couleurs à la Nation Cup qui se déroulera le 26/27 septembre 2019 à Amsterdam.\r\n\r\nAprès la contre-performance de l’année dernière (7eme) nous avons renouvelés plus de 80% de l’équipe et avons décidés de nous préparer au mieux avec 3 trainings préparatoires le 7/8 septembre à Marseille et PBS91 puis le 21/22 septembre à PBS91.\r\n\r\nLe roster final sera composé de 12 joueurs et de 4 réservistes.\r\n\r\nNous remercions la société Techniques Haute Pression qui sponsorise les Jerseys de cette équipe ainsi que des billes d’entrainement.\r\n\r\nAux armes !!!', 'EDF_Veteran_2019.jpg', 1),
(12, '2019-07-20', 'Olivier Gaudin rejoint le Pôle France FFP', '<div class=\"post-content\">\r\n<p>Bonjour &agrave; tous,</p>\r\n<p>Dans le cadre du P&ocirc;le France, nous avons le plaisir&nbsp; de vous annoncer que Monsieur Olivier Gaudin int&egrave;gre le staff afin d&rsquo;assister les &eacute;quipes de France et plus particuli&egrave;rement l&rsquo;&eacute;quipe de France Seniors Masculins.</p>\r\n<p>L&rsquo;exp&eacute;rience op&eacute;rationnelle au plus haut niveau d&rsquo;Olivier sera une aide appr&eacute;ciable pour les joueurs et coachs !</p>\r\n<p>Bienvenue dans l&rsquo;aventure Olivier !</p>\r\n<p>Laurent Capron<br />Pr&eacute;sident de la FFP</p>\r\n</div>', 'Olivier-Gaudin.jpg', 1),
(13, '2019-07-28', 'LIDFPS 2019/2020', '<div class=\"_2cuy _3dgx _2vxa\"><strong><span class=\"_4yxo\">LIDFPS 2019/2020</span></strong></div>\r\n<div class=\"_2cuy _3dgx _2vxa\">Ouverture des pr&eacute;-inscriptions...</div>\r\n<div class=\"_2cuy _3dgx _2vxa\">La saison 2018/2019 s\'ach&egrave;ve &agrave; peine que la saison 2019/2020 est lanc&eacute;e...</div>\r\n<div class=\"_2cuy _3dgx _2vxa\"><strong>Formats propos&eacute;s :</strong></div>\r\n<ul class=\"_5a_q _5yj1\" dir=\"ltr\">\r\n<li class=\"_2cuy _509q _2vxa\"><span class=\"_4yxo _4yxp\">D2-S5-Race to 4-M500</span></li>\r\n<li class=\"_2cuy _509q _2vxa\"><span class=\"_4yxo _4yxp\">D3-S5-Race to 2-M500</span></li>\r\n<li class=\"_2cuy _509q _2vxa\"><span class=\"_4yxo _4yxp\">D4-S3-Race to 2-M500</span></li>\r\n<li class=\"_2cuy _509q _2vxa\"><span class=\"_4yxo _4yxp\">U16-S3-Race to 2 au loader</span></li>\r\n</ul>\r\n<div class=\"_2cuy _3dgx _2vxa\"><span class=\"_4yxo\">Rappel :</span> 1 &eacute;quipe par association, par format except&eacute; les U16, autoris&eacute;s &agrave; 2 &eacute;quipes par association.</div>\r\n<div class=\"_2cuy _3dgx _2vxa\">Comme d\'habitude, l\'axe principal sera vous offrir un championnat de qualit&eacute; avec un maximum de temps de jeu...</div>\r\n<div class=\"_2cuy _3dgx _2vxa\">Nous comptons maintenir 5 &agrave; 6 manches par division, mais tout cela sera confirm&eacute; lorsque le nombre d\'&eacute;quipes participantes sera arr&ecirc;t&eacute;.</div>\r\n<div class=\"_2cuy _3dgx _2vxa\"><span class=\"_4yxo\">Arbitrage :</span> De nombreux arbitres d\'exp&eacute;rience ont pris leur \"retraite f&eacute;d&eacute;rale\"... De jeunes arbitres peu exp&eacute;riment&eacute;s sont arriv&eacute;s la saison pr&eacute;c&eacute;dente... Mais, nous nous retrouvons en p&eacute;nurie d\'arbitres... C\'est pourquoi, deux sessions (Sept et Oct) seront dispens&eacute;es... <span class=\"_4yxo _4yxp\">Nous avons besoins des hommes au maillot ray&eacute;... sans eux... pas de jeu...</span></div>\r\n<div class=\"_2cuy _3dgx _2vxa\"><span class=\"_4yxo _4yxp\">Affiliation et Licences FFP 2019/2020</span></div>\r\n<div class=\"_2cuy _3dgx _2vxa\">D&egrave;s &agrave; pr&eacute;sent, vous pouvez affilier votre club et effectuer vos demandes de licences aupr&egrave;s de la f&eacute;d&eacute;ration</div>\r\n<div class=\"_2cuy _3dgx _2vxa\"><span class=\"_4yxp\">Documents dans \"Fichiers\"</span></div>\r\n<div class=\"_2cuy _3dgx _2vxa\">Bon mercato et bonnes AG &agrave; tous et toutes</div>\r\n<div class=\"_2cuy _3dgx _2vxa\">Et surtout... Bonnes vacances</div>\r\n<div class=\"_2cuy _3dgx _2vxa\">&nbsp;</div>', '43534416_10216823517570910_5546018053017305088.jpg', 9),
(14, '2019-09-15', 'Inscription Open Ligue PACA', '<p>Bonjour &agrave; tous. <br />Je vous rappelle que les inscriptions pour l\'open de la ligue PACA du 22 septembre sont ouvertes et resteront ouvertes jusqu\'au mercredi 18 septembre.<br />Les inscriptions sont ouvertes &agrave; tous les licenci&eacute;s de France. <br />Donc n\'h&eacute;sitez pas &agrave; vous inscrire pour pr&eacute;parer Amsterdam !<br />Inscription 50&euro; par &eacute;quipe</p>', 'ffp.jpg', 18),
(15, '2019-06-14', 'Remerciements pour le CDF 2019', '<p>Suite au beau week-end pass&eacute; pour le CDF 2019, la F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball tenait &agrave; remercier dans un premier temps le site R&eacute;cr&eacute;a Game de nous avoir accueilli tout un week-end pour ce bel &eacute;v&egrave;nement.</p>\r\n<p>Ensuite, remerciements chaleureux au staff/b&eacute;n&eacute;voles et aux arbitres.</p>\r\n<p>F&eacute;licitations et remerciements &eacute;galement &agrave; toutes les &eacute;quipes, joueurs et coachs ayant particip&eacute; &agrave; ce week-end ainsi qu&rsquo;aux supporters qui ont fait le d&eacute;placement (de plus ou moins loin).</p>\r\n<p>Merci aux professionnels pr&eacute;sents sur place d&rsquo;avoir&nbsp;particip&eacute; au village exposants et pr&eacute;sent&eacute; leurs produits et expertises.</p>\r\n<p>Et pour finir nous remercions le temps, qui a &eacute;t&eacute; cl&eacute;ment avec nous ce week-end !</p>', 'cb76402bd447c70f2744b3f099f1d9d9.jpg', 1),
(16, '2019-05-27', 'Layout du Championnat De France 2019', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'c177162f258dbb3060241d8a1d35baac.jpg', 1),
(17, '2019-05-22', 'Affiche du Championnat de France 2019', '<div class=\"post-content\">\r\n<p>Voici l&rsquo;affiche pour le Championnat de France 2019 o&ugrave; figure l&rsquo;ensemble des partenaires de cet &eacute;v&eacute;nement:</p>\r\n<ul>\r\n<li><a href=\"http://www.access-custom.com/\">ACCESS CUSTOM</a></li>\r\n<li><a href=\"https://www.alliancepaintball.com/\">ALLIANCE PAINTBALL</a></li>\r\n<li><a href=\"https://www.anthraxpaintball.com\">ANTHRAX</a></li>\r\n<li><a href=\"https://www.paintball-camp.com/\">CAMP PAINTBALL</a></li>\r\n<li><a href=\"https://www.gisportz.com/\">G.I. SPORTZ</a></li>\r\n<li><a href=\"https://www.gogeurope.com/\">GOG EUROPE</a></li>\r\n<li><a href=\"https://hkarmy.com/\">HK HARMY</a></li>\r\n<li><a href=\"https://www.paintball-connexion.com/\">PAINTBALL CONNEXION</a></li>\r\n<li><a href=\"https://www.facebook.com/paintballgarage/\">PAINTBALL GARAGE</a></li>\r\n<li><a href=\"http://www.paintballgames62.com/\">PAINTBALL GAMES 62</a></li>\r\n<li><a href=\"https://www.facebook.com/Pbs91/\">PBS 91</a></li>\r\n<li><a href=\"http://www.pro-shar.fr/\">PROSHAR</a></li>\r\n<li><a href=\"http://www.supairball.com/\">SUP AIRBALL</a></li>\r\n<li><a href=\"http://www.tomahawkpaintballs.com\">TOMAHAWK</a></li>\r\n</ul>\r\n</div>', '6780c068dce4710abcfa3edb635c36c8.jpg', 1),
(18, '2019-05-21', 'Equipes qualifiées au CDF 2019', '<div class=\"post-content\">\r\n<p>MAJ du 27 mai 2019: Suite au forfait de l&rsquo;&eacute;quipe Toulouse Purple, l&rsquo;&eacute;quipe CS TEAM est qualifi&eacute;e pour le Championnat de France en D3. F&eacute;licitations &agrave; eux !</p>\r\n<p>Sous r&eacute;serve de r&eacute;ception des inscriptions, voici toutes les &eacute;quipes qualifi&eacute;es et rep&ecirc;ch&eacute;es ayant exprim&eacute;es leur souhait de venir au CDF 2019.</p>\r\n<p>En rouge les places l&acirc;ch&eacute;es et en bleu les rep&ecirc;chages.</p>\r\n</div>', '6e01d0e9c403a36dbeaf3cc9a4b6d331.png', 1),
(19, '2019-05-15', 'Compte-Rendu de la commission de discipline du 14/05/2019', '<div class=\"post-content\">\r\n<p>Bonjour,</p>\r\n<p>Suite &agrave; la demande de Pascal HAUSSER, la commission de discipline de la F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball s&rsquo;est r&eacute;unie <strong>mardi 14 mai 2019 &agrave; 17H</strong> dans les locaux lou&eacute; &agrave; cette occasion <strong>rue Beccaria 75012 Paris.</strong></p>\r\n<p><strong>L&rsquo;ordre du jour &eacute;tait le suivant :</strong></p>\r\n<ul>\r\n<li>Statuer sur les accusations de refus d&rsquo;obtemp&eacute;rer &agrave; une d&eacute;cision arbitrale, &agrave; l&rsquo;occasion du Championnat de France 2018, lors de la journ&eacute;e du 10 juin 2018, ayant entrain&eacute; le blocage du d&eacute;roulement de la comp&eacute;tition.</li>\r\n<li>Statuer sur les sanctions qui ont &eacute;t&eacute; appliqu&eacute;es par le Comit&eacute; Directeur de la F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball &agrave; votre encontre : <br />\r\n<ul>\r\n<li>Pour refus d&rsquo;obtemp&eacute;rer aux d&eacute;cisions du corps arbitral et propos allant &agrave; l&rsquo;encontre de l&rsquo;int&eacute;grit&eacute; d&rsquo;un arbitre, la sanction est la <strong>suspension de Mr Hausser Pascal de toutes les comp&eacute;titions D1 durant la saison 2018-2019 </strong>&ndash; celui-ci ne pourra ni jouer, ni &ecirc;tre pr&eacute;sent durant les manches.&nbsp;De plus, un sursis, de 2 saisons suppl&eacute;mentaires, de suspension est &eacute;galement d&eacute;cid&eacute;, il sera valable durant les 3 prochaines saisons.</li>\r\n</ul>\r\n</li>\r\n<li>Statuer sur la violation de cette sanction lors de la manche 2 de Division 1, du 24 mars 2019.</li>\r\n</ul>\r\n<p><strong>Pr&eacute;sents:</strong></p>\r\n<p>C&eacute;dric M.&nbsp; &ndash; Membre du Comit&eacute; Directeur de la F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball<br />Cyril A. &ndash; Membre de la commission de discipline &ndash; Ext&eacute;rieur au monde du Paintball<br />Eric N. &ndash; Membre du Comit&eacute; Directeur de la F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball<br />Pascal H. &ndash; Entraineur de l&rsquo;&eacute;quipe D1 Paintball Family<br />Pascal R. &ndash; Membre de la commission de discipline &ndash; Ext&eacute;rieur au monde du Paintball<br />Philippe M. &ndash; Membre de la commission de discipline &ndash; Ext&eacute;rieur au monde du Paintball</p>\r\n<p><strong>D&eacute;roulement de la R&eacute;union</strong></p>\r\n<p>D&eacute;but de la r&eacute;union 17H19</p>\r\n<p>&ndash; Enonc&eacute; de l&rsquo;ordre du jour</p>\r\n<p><em>1. Faits portant sur le Championnat de France 2018&nbsp;:</em></p>\r\n<p>&ndash; D&eacute;bat autour du fait que la d&eacute;cision arbitrale est r&eacute;vocable (point sur lequel P. HAUSSER souhaite revenir) =&gt; Accord sur le fait que la d&eacute;cision est irr&eacute;vocable</p>\r\n<p>&ndash; Recentrage des d&eacute;bats&nbsp; vers le fait que la sanction porte sur le fait que la d&eacute;cision est principalement d&eacute;finie sur le refus d&rsquo;obtemp&eacute;rer.</p>\r\n<p>&ndash; Accord de P. HAUSSER sur le fait qu&rsquo;il a bien refus&eacute; d&rsquo;obtemp&eacute;rer &agrave; la d&eacute;cision arbitrale (mais r&eacute;fute la r&eacute;alit&eacute; de la raison pour laquelle la sanction a &eacute;t&eacute; appliqu&eacute;e)</p>\r\n<p>&ndash; Expos&eacute; de ce que P. HAUSSER estime &ecirc;tre des circonstances att&eacute;nuantes lors de ce refus d&rsquo;obtemp&eacute;rer</p>\r\n<p><em>2. Faits portant sur la seconde manche de Division 1 du 24/03/2019 &agrave; N&icirc;mes&nbsp;:</em></p>\r\n<p>&ndash; Apr&egrave;s &eacute;tude du t&eacute;moignage du chef arbitre de la manche de N&icirc;mes et l&rsquo;audition de P. HAUSSER, les faits ne sont pas retenus.</p>\r\n<p>&ndash; Il a cependant &eacute;t&eacute; fait rappel &agrave; Pascal Hausser sur le fait qu&rsquo;il n&rsquo;a pas le droit de Coacher son &eacute;quipe (y compris d&rsquo;une zone spectateur) et n&rsquo;a pas &agrave; acc&eacute;der (ou circuler) &agrave; une zone joueur.</p>\r\n<p>Fin de la r&eacute;union : 19H05</p>\r\n<p><strong>D&eacute;cision de la commission :</strong><br /><br />&ndash; Confirmation de la sanction de suspension ferme d&rsquo;une saison. <br /><br />&ndash; R&eacute;duction de la p&eacute;riode avec sursis &agrave; deux manches pour la saison 2019-2020</p>\r\n</div>', 'ffp.jpg', 1),
(20, '2019-04-29', 'Résultats de la seconde manche', '<p>Ce samedi 27 et dimanche 28 avril a eu lieu la second manche &laquo;&nbsp;NORD&nbsp;&raquo; de la Coupe de la f&eacute;d&eacute;ration u16 avec un vent fort et persistant mais une bonne humeur affich&eacute; par tous.</p>\r\n<p>13 &eacute;quipes avaient fait le d&eacute;placement sur le terrain de <a href=\"http://coyotes.paintball.free.fr/\">Coyotes Gravelines</a> dont l&rsquo;&eacute;quipe adulte a assur&eacute; l&rsquo;arbitrage.</p>\r\n<p>La F&eacute;d&eacute;ration Fran&ccedil;aise de Paintball remercie les b&eacute;n&eacute;voles, les arbitres , les coachs et les &eacute;quipes qui ont fait de ces deux manches une exp&eacute;rience enrichissante tant sur le plan sportif qu&rsquo;humain et ont permis qu&rsquo;elle se d&eacute;roule dans les meilleures conditions possible.</p>\r\n<p>Merci &eacute;galement aux terrains de <a href=\"http://fanaticpaintball.com/\">Fanatic Paintball</a> et <a href=\"http://coyotes.paintball.free.fr/\">Coyotes Gravelines</a> qui &oelig;uvrent au d&eacute;veloppement du Paintball U16 et ont accueillis gracieusement ces deux manches.</p>', 'c14cfa44f91cbb97defd9e2ecc82f675.png', 1),
(21, '2019-04-08', 'ATTENTION – Information CDF 2019', '<p>Faute d&rsquo;avoir un nombre suffisant d&rsquo;arbitres ayant un niveau d&rsquo;arbitrage sensiblement &eacute;quivalent pour que le CDF 2019 puisse se d&eacute;rouler sur 2 jours avec 3 terrains, nous sommes oblig&eacute;s de modifier les dates de notre championnat. Il se d&eacute;roulera donc du samedi 08 juin 2019 au lundi 10 juin 2019. Ce changement doit intervenir afin de conserver &agrave; votre championnat toutes ses qualit&eacute;s organisationnelles. Les dossiers d&rsquo;inscription seront disponibles sous peu, sur le site internet de la f&eacute;d&eacute;ration et partag&eacute;s sur les r&eacute;seaux sociaux. Nous vous remercions de votre compr&eacute;hension.</p>', 'ffp.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(60) NOT NULL,
  `contenu` text NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `ligue_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_id` (`skill_id`),
  KEY `categorie_id` (`category_id`),
  KEY `ligue_id` (`ligue_id`),
  KEY `utilisateur_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `date`, `title`, `contenu`, `category_id`, `skill_id`, `ligue_id`, `user_id`) VALUES
(2, '2019-07-31', 'Covoiturage pour le 31/09', '<p>Salut &agrave; tous, <br /><br />Je recherche un covoiturage pour le 31/09, pour me rendre sur la manche de ligue de P&eacute;lissane du 01/10/2019. <br /><br />Si vous avez des infos ou autres vous pouvez me joindre par t&eacute;l&eacute;phone. <br /><br />Merci &agrave; tous, et bon paint ;)</p>', 3, 2, 18, 2),
(3, '2019-07-28', 'Covoiturage pour le CDF', '<p>Salut les painteux !</p>\r\n\r\n<p>Comme mentinné dans le titre, je rechercherai des personnes qui vont au CDF au Mans, pour pouvoir monter avec eux !</p>\r\n\r\n<p>Donc si tu à de la place viens me voi !</p>\r\n\r\n<p>ps : je ne suis pas méchant ;p</p>', 3, 3, 18, 3),
(4, '2019-07-06', 'Je recherche une équipe', '<p>Bonjour,</p>\r\n<p>Je suis nouveau sur le site et je joue en Pro en Belgique mais pour les 3 prochaines mois, je suis dispo pour des training techniques et des points.</p>\r\n<p>Donc si une équipe à besoins de mes services contacter moi !</p>', 1, 4, 1, 18),
(5, '2019-09-02', 'Nous recherchons des joueurs', '<p>Salut &agrave; tous,</p>\r\n<p>La team RAZAT 1, bas&eacute; &agrave; cuers recherchent pour la prochaine saison de ligue PACA, plusieurs, joueurs de tout niveau (d&eacute;butant, exp&eacute;riment&eacute;, expert).</p>\r\n<p>Alors si tu veux postuler et int&eacute;grer une bonne &eacute;quipe, contacte nous ;) ou viens nous voir tout les dimanches sur notre terrain &agrave; cuers !</p>\r\n<p>Alors n\'attends plus et rejoins nous :p</p>', 2, 4, 18, 19);

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `annee` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`id`, `annee`) VALUES
(1, 2017),
(2, 2018),
(3, 2019);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Recherche une équipe'),
(2, 'Recherche un joueur'),
(3, 'Recherche un covoiturage');

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

DROP TABLE IF EXISTS `classement`;
CREATE TABLE IF NOT EXISTS `classement` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ordre` int(11) NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `archive_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `archive_id` (`archive_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classement`
--

INSERT INTO `classement` (`id`, `ordre`, `team_id`, `archive_id`) VALUES
(1, 1, 1, 3),
(2, 2, 2, 3),
(3, 3, 7, 3),
(4, 4, 4, 3),
(5, 5, 8, 3),
(6, 6, 9, 3),
(7, 1, 16, 3),
(8, 7, 6, 3),
(9, 8, 3, 3),
(10, 9, 5, 3),
(11, 2, 11, 3),
(12, 3, 13, 3),
(13, 4, 10, 3),
(14, 5, 15, 3),
(15, 10, 20, 3),
(16, 6, 14, 3),
(17, 7, 17, 3),
(18, 8, 12, 3),
(19, 9, 18, 3),
(20, 10, 19, 3),
(21, 1, 26, 3),
(22, 2, 27, 3),
(23, 3, 28, 3),
(24, 4, 29, 3),
(25, 5, 30, 3),
(26, 6, 31, 3),
(27, 7, 32, 3),
(28, 9, 34, 3),
(29, 10, 35, 3),
(30, 8, 33, 3);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `datec` date NOT NULL,
  `content` varchar(255) NOT NULL,
  `annonce_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `depth` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `annonce_id` (`annonce_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `datec`, `content`, `annonce_id`, `user_id`, `parent_id`, `depth`) VALUES
(68, '2019-09-02', 'Je suis dispo pour la saison prochaine', 5, 2, 0, 0),
(69, '2019-09-02', 'Appelle moi', 5, 19, 68, 1);

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE IF NOT EXISTS `format` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  `taille_field` varchar(10) NOT NULL,
  `nb_players` varchar(10) NOT NULL,
  `pbs` varchar(25) NOT NULL,
  `tps_play` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`id`, `libelle`, `taille_field`, `nb_players`, `pbs`, `tps_play`) VALUES
(1, 'U14', 'U16 (2L4C)', '3vs3', 'CAL 50 @ 280fpd', '45s'),
(2, 'U16', 'U16 (2L4C)', '3vs3', 'CAL 50 @ 280fps', '45s'),
(3, 'U18', '36x45', '3vs3', 'CAL 68 @ 280fps', '1 min'),
(4, 'D4', '36x45', '3vs3', 'CAL 68 @ 300fps', '2 min 30s'),
(5, 'D3', '36x45', '5vs5', 'CAL 68 @ 300fps', '3 min'),
(6, 'D2', '36x45', '5vs5', 'CAL 68 @ 300fps', '7 min'),
(7, 'D1 Champion', '36x45', '5vs5', 'CAL 68 @ 300fps', '8 min'),
(8, 'D1 Challenger', '36x45', '5vs5', 'CAL 68 @ 300fps', '8 min');

-- --------------------------------------------------------

--
-- Structure de la table `format_d1`
--

DROP TABLE IF EXISTS `format_d1`;
CREATE TABLE IF NOT EXISTS `format_d1` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `format_d1`
--

INSERT INTO `format_d1` (`id`, `libelle`) VALUES
(1, 'Poule A'),
(2, 'Poule B'),
(3, 'Poule C'),
(4, 'Poule D');

-- --------------------------------------------------------

--
-- Structure de la table `format_team`
--

DROP TABLE IF EXISTS `format_team`;
CREATE TABLE IF NOT EXISTS `format_team` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `format_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `format_id` (`format_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `format_team`
--

INSERT INTO `format_team` (`id`, `format_id`, `team_id`) VALUES
(1, 7, 2),
(2, 7, 3),
(3, 7, 4),
(4, 7, 5),
(5, 7, 6),
(6, 7, 7),
(7, 7, 8),
(8, 7, 1),
(9, 7, 9),
(10, 8, 10),
(11, 8, 11),
(12, 8, 12),
(13, 8, 13),
(14, 8, 14),
(15, 8, 16),
(16, 8, 15),
(17, 8, 17),
(18, 8, 19),
(19, 7, 20),
(20, 8, 18),
(21, 5, 25),
(23, 6, 26),
(24, 6, 27),
(25, 6, 28),
(26, 6, 33),
(27, 6, 34),
(28, 6, 31),
(29, 6, 32),
(30, 6, 29),
(31, 6, 30),
(32, 6, 35);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id`, `libelle`) VALUES
(1, 'Championnat D1'),
(9, 'Ile de France'),
(18, 'Provence-Alpes-Côte d\'Azur');

-- --------------------------------------------------------

--
-- Structure de la table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nationality`
--

INSERT INTO `nationality` (`id`, `libelle`, `image`) VALUES
(1, 'France', 'fr.png'),
(2, 'Angletaire', 'gb.png'),
(3, 'Allemagne', 'de.png'),
(4, 'Etats-Unis', 'us.png');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `nationality_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`,`team_id`,`nationality_id`),
  KEY `nationalite_id` (`nationality_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `nom`, `prenom`, `ville`, `numero`, `position_id`, `team_id`, `nationality_id`) VALUES
(1, 'Gaudin', 'Axel', 'Marseille', 91, 5, 1, 1),
(2, 'Columbo', 'Fabrice Tava', 'Marseille', 1, 2, 1, 1),
(3, 'Gravalon', 'Maxime', 'Montpellier', 45, 10, 1, 1),
(4, 'Mirmont', 'Thomas', 'Féjus', 97, 1, 1, 1),
(5, 'Szpytma', 'Thomas', 'Pontpoint', 89, 10, 1, 1),
(6, 'Chave', 'Pierre', 'Marseille', 3, 10, 1, 1),
(7, 'Naudy', 'Sylvain', 'Trets', 21, 10, 25, 1),
(8, 'PBN', 'Romain', 'Aix-en-Provence', 6, 10, 25, 1),
(9, 'Peletier', 'Cyril', 'La Celle', 8, 5, 25, 1),
(10, 'Giordano', 'Baptiste', 'Brignoles', 69, 1, 25, 1),
(11, 'Heams', 'William', 'La Celle', 10, 5, 25, 1),
(12, 'Rodini', 'Damien', 'Puiloubier', 13, 1, 25, 1),
(13, 'Heams', 'Dominique', 'La Celle', 1, 2, 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `position`
--

INSERT INTO `position` (`id`, `libelle`) VALUES
(1, 'Front'),
(2, 'Back'),
(3, 'Snake'),
(4, 'Coach'),
(5, 'Front / Snake'),
(6, 'Back / Snake'),
(7, 'Back / Coach'),
(8, 'Front / Coach'),
(9, 'Snake / Coach'),
(10, 'Back / Front'),
(11, 'Owner'),
(12, 'Manager');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `libelle`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Expérimenté'),
(4, 'Pro');

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `nationality_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `team_id` (`team_id`),
  KEY `nationality_id` (`nationality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id`, `nom`, `prenom`, `ville`, `position_id`, `team_id`, `nationality_id`) VALUES
(1, 'Hausser', 'Pascal', 'Marseille', 4, 1, 1),
(2, 'Gaudin', 'Olivier', 'Fréjus', 12, 1, 1),
(3, 'Marino', 'Julien', 'Le Val', 11, 25, 1),
(4, 'PBN', 'Romain', 'Aix-en-Provence', 4, 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `photo` varchar(250) DEFAULT 'ffp.jpg',
  `ligue_id` int(10) UNSIGNED NOT NULL,
  `archive_id` int(10) UNSIGNED DEFAULT NULL,
  `format_d1_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ligue_id` (`ligue_id`),
  KEY `participation_id` (`archive_id`),
  KEY `format_d1` (`format_d1_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `nom`, `ville`, `photo`, `ligue_id`, `archive_id`, `format_d1_id`) VALUES
(1, 'Marseille TonTon', 'Marseille', '44079062_2188178301207066_4439196906299588608_n.jpg', 1, 3, 2),
(2, 'Paris Canrnage', 'Paris', '51661658_1120409914804230_7680842267732475904_n.jpg', 1, 3, 1),
(3, 'Saint-Tropez Family', 'Saint-Tropez', '32853920_2095340250738186_8340213781682454528_n.jpg', 1, 3, 1),
(4, 'Pelissanne Joe Bar', 'Pelissanne', '43952907_2625505027675419_5778377329919131648_n.jpg', 1, 3, 1),
(5, 'Montpellier Helly\'s', 'Montpellier', '14292507_1098699896844558_2004755919419207043_n.jpg', 1, 3, 1),
(6, 'Saulx les Ch. SCALP', 'Saulx les Ch.', '13062253_10156875341335014_763867833383615_n.jpg', 1, 3, 1),
(7, 'Valence Outrage', 'Valence', '32581666_1813069635421248_8416234359224270848_n.jpg', 1, 3, 2),
(8, 'Annecy Section Paradise', 'Annecy', NULL, 1, 3, 2),
(9, 'Paris Triade', 'Paris', '44115847_1878542825526328_6100132996717740032_n.jpg', 1, 3, 2),
(10, 'Paris Resurrection', 'Paris', '32337015_641388696194146_7936047167171461120_n.jpg', 1, 3, 3),
(11, 'Paris Carnage 2', 'Paris', '24294017_812917158887701_1710959407526379688_n2017.jpg', 1, 3, 3),
(12, 'Grenoble Vision PPC', 'Grenoble', '55504294_2611893692185700_2064300185994919936_n.jpg', 1, 3, 3),
(13, 'Martigny Lion\'s', 'Martigny', '57882531_2270556366337687_328946683297660928_n.jpg', 1, 3, 3),
(14, 'Valence Outrage 2', 'Valence', '46331487_2075807062480836_5170084384551731200_n.jpg', 1, 3, 3),
(15, 'Nîmes Black Legion', 'Nîmes', '1017487_168592863319584_270965168_n.jpg', 1, 3, 4),
(16, 'Bordeaux Pirate', 'Bordeaux', '31942255_1687292341359773_5912113282847604736_n.jpg', 1, 3, 4),
(17, 'Saulx les Ch. Brousses B.', 'Saulx les Ch.', NULL, 1, 3, 4),
(18, 'Toulouse Offenders', 'Toulouse', '33106773_1662518583855899_4489681034228531200_n.jpg', 1, 3, 4),
(19, 'Toulouse Dagnir Dae', 'Toulouse', '35126868_10156171353554927_6343925571050799104_n.jpg', 1, 3, 4),
(20, 'Bordeaux 33BPS', 'Bordeaux', '29595116_273580349848871_6388904284184355822_n.jpg', 1, 3, 2),
(24, 'test', 'test', 'fe9666d54e2b3dc73b779f8e21f5f13f.jpg', 2, 3, NULL),
(25, 'Le Val', 'Le Val', 'a0e23b428a320d2ad92500d24d0ab393.jpg', 18, 3, NULL),
(26, 'Razat 1', 'Cuers', '43398207_10213356400373314_50501402287407104_n.jpg', 18, 3, NULL),
(27, 'La Sect', 'La Sect', '72000b832851d18137b13f27f067f9fa.jpg', 18, 3, NULL),
(28, 'Joebard Kidz', 'Pélissane', 'dca14a663fcaf020f26cdbb5011d84b0.jpg', 18, 3, NULL),
(29, 'Bannis 1', 'N/A', 'ffp.jpg', 18, 3, NULL),
(30, 'Razat 2', 'Cuers', 'c0dbcf0e2d80f223376a60f0b5511052.jpg', 18, 3, NULL),
(31, 'EXK', 'Manosque', '64327370_2262380487423459_4536562474870112256_n.jpg', 18, 3, NULL),
(32, 'Thunder Strike', 'Marseille', '49864086_10217546380269939_6575660106304716800_n.jpg', 18, 3, NULL),
(33, 'Azur 1', 'Apt', 'ffp.jpg', 18, 3, NULL),
(34, 'PGS', 'Apt', '45416775_536137736855608_5357973355322408960_n.jpg', 18, 3, NULL),
(35, 'Mirtown', 'Miramas', '18519769_1900626706873332_829929788368952429_n.jpg', 18, 3, NULL),
(36, 'Bannis 2', 'N/A', '418cfd08880a3c88d372789757437e23.jpg', 18, 3, NULL),
(37, 'Bannis 3', 'N/A', 'ffp.jpg', 18, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `ville` varchar(60) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `user_team` varchar(60) DEFAULT NULL,
  `ligue_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(250) DEFAULT 'user-icon.png',
  `login` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ligue_id` (`ligue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `ville`, `mail`, `phone`, `user_team`, `ligue_id`, `photo`, `login`, `pwd`) VALUES
(2, 'Naudy', 'Sylvain', '356 - Chemin de Marseille', 'Trets', 'silvain_17@hotmail.fr', '0699948106', 'Le Val', 18, 'a2401b042f1d75a613f9a90bf810cd63.jpg', 'sylvain', '$2y$10$9oO2SzzGAIOaXuYpmP3Neu0xjpnZTzuavfGS78reUhzYbCkuilo1.'),
(3, 'Rodini', 'Damien', 'test', 'test', 'test@mail.fr', '0606060606', 'Le Val', 18, '34472430_10213626911680137_8876914690286944256_n.jpg', 'damien', '$2y$10$9oO2SzzGAIOaXuYpmP3Neu0xjpnZTzuavfGS78reUhzYbCkuilo1.'),
(4, 'Cyril', 'Peletier', NULL, NULL, 'cyril.peletier@gmail.com', '0606060606', NULL, NULL, '68803048_1353574064806786_2814955311356444672_n.jpg', 'cyrilp', '$2y$10$cl8DljY3xk.ZLxuq2Jac2efSvvbkXUxuTtLjoeNnRaYRUI1/QlxtC'),
(16, 'Dare', 'Anthony', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, 'user-icon.png', 'anthodu13', '$2y$10$DZk5JrHYGTFnLjASQAGwo.88H8Hvu/zwmDAoj6QNUWv.ogDR53jBq'),
(18, 'Piegois', 'Thomas', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, '', 'thomasp', '$2y$10$NBdo8hffUb5JQjqP2bVinejYvNqqqoVVhlXMyuWG1f3mcRU4pn6.2'),
(19, 'Lubrano', 'Maxime', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, '45382343_534735620329153_8808076114107826176_n.jpg', 'maximel', '$2y$10$2c6FmpcPU2WUV2qWw510GerU9RejkRtU8QjlcfPViauB2ClgQOmOu'),
(21, 'Hems', 'Dom', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, 'f7870e5a4769200322a3ca9599e55362.jpg', 'domh', '$2y$10$VC/RXmxAHmbFiJon.A7lBuJj2XwJ/yoMJyDP3jmARB.oL0RuRDfAC'),
(23, 'Anfonsi', 'Peter', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, '35701575_1809312255779296_2850493885103210496_n.jpg', 'sylvain', '$2y$10$VVZeR0vRcS0SWVwZ1I31du2amzvF/fQTRD3BA37EtaTc8yfpg24XO'),
(25, 'Lonu', 'Loic', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, 'user-icon.png', 'loic13', '$2y$10$hxEazWb.gIS8/QSA/0fMme9HJKMMIfkJmwsh2NEsj5COI/Ek8UBfy'),
(27, 'Ledu', 'Maxime', NULL, NULL, 'test@test.fr', '0606060606', NULL, NULL, '34105150_1743082245738653_8747235342559477760_n.jpg', 'max13', '$2y$10$IypY3Ckcoe8EuXlD3kw5/OvApx6g6o/13jGjcl.BN9k.ny9wWCWwW');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actuality`
--
ALTER TABLE `actuality`
  ADD CONSTRAINT `actuality_ibfk_1` FOREIGN KEY (`ligue_id`) REFERENCES `ligue` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `annonce_ibfk_4` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  ADD CONSTRAINT `annonce_ibfk_5` FOREIGN KEY (`ligue_id`) REFERENCES `ligue` (`id`),
  ADD CONSTRAINT `annonce_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `classement`
--
ALTER TABLE `classement`
  ADD CONSTRAINT `classement_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `classement_ibfk_2` FOREIGN KEY (`archive_id`) REFERENCES `archive` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `format_team`
--
ALTER TABLE `format_team`
  ADD CONSTRAINT `format_team_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `format_team_ibfk_2` FOREIGN KEY (`format_id`) REFERENCES `format` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ligue_id`) REFERENCES `ligue` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
