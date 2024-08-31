-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 07:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caughtscene`
--

-- --------------------------------------------------------

--
-- Table structure for table `tv-list`
--

CREATE TABLE `tv-list` (
  `tvID` int(100) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Story` text NOT NULL,
  `Links` varchar(100) NOT NULL,
  `S1` text NOT NULL,
  `S2` text NOT NULL,
  `S3` text NOT NULL,
  `S4` text NOT NULL,
  `S5` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv-list`
--

INSERT INTO `tv-list` (`tvID`, `Title`, `Image`, `Genre`, `Date`, `Story`, `Links`, `S1`, `S2`, `S3`, `S4`, `S5`) VALUES
(22, 'Hawkeye', 'https://i.postimg.cc/MZhTcPRp/Hawkeye-2021.webp', 'Action, Adventure, Crime', '2021-11-24', 'Former Avenger Clint Barton has a seemingly simple mission: get back to his family for Christmas. Possible? Maybe with the help of Kate Bishop, a 22-year-old archer with dreams of becoming a Super Hero. The two are forced to work together when a presence from Barton’s past threatens to derail far more than the festive spirit.', 'Hawkeye-2021', '1^4Cf6q3MM2MQY&qHKcWGYgMLYW', '', '', '', ''),
(21, 'House of Secrets: The Burari Deaths', 'https://i.postimg.cc/DzdkdJTJ/House-of-Secrets-The-Burari-Deaths.webp', 'Crime, History, Documentary', '2021-10-08', 'Suicide, murder or something else? This docuseries examines chilling truths and theories around the deaths of 11 members of a Delhi family.', 'House-of-Secrets-The-Burari-Deaths', '1^7whfXJ5hGhlg&CdbRjK0kFUf9&acRahasabjRD^ivnik29g53th&bsx0w23dyzad&veox2v62i79e', '', '', '', ''),
(20, 'Only Murders in the Building', 'https://i.postimg.cc/dVj1nbFZ/Only-Murders-in-the-Building.webp', 'Comedy, Crime, Drama', '2021-', 'Three strangers who share an obsession with true crime suddenly find themselves caught up in one.', 'Only-Murders-in-the-Building', '1^zJaX4zC0wPjh&nEP8JhBf1Ecu&g4wj3XIOTtkS&ofRqjt5Mc3o9&yFZOVOFgUGiT&jUno8LPFXXPv&njKBJz4J3EKu^k0w60spom7dy&ceydkbtrsjjn&de8nk3bzvvrc&7kljdw6617mm&i36r4ikr7jw9&aig8qhp0lqna&vn1xzehliufl', '', '', '', ''),
(19, 'Squid Game', 'https://i.postimg.cc/htGXfx2w/squid-game.webp', 'Drama, Adventure, Action', '2021-09-17', 'A story of people who fail at life for various reasons, but suddenly receive a mysterious invitation to participate in a survival game to win ten million US dollars. The game takes place at an unknown location, and the participants are locked up until there is a final winner.', 'squid-game-netflix', '1^kmrpVZQ5yDZQ&efYmijiShPw1&O6N2Tbzy1mF7&4P8sI3xEp5qK&fPG4GI57AWmK&rIdejHzY4z3l&AgIESQmY14gz&zuCG33zic7pF&njFAFbQMZP6C^1ixzgfrn689c&bcj7u493tvxs&71b4k53zo07j&0yme1e605rnl&2i7r0c59u6jx&ng1x0hhdjjha&u0lhtfy1hfyi&yhqhn1d7shn3&tmqngnbxcmjp', '', '', '', ''),
(18, 'Z Nation', 'https://i.postimg.cc/j5GjPp97/z-nation.webp', 'Action, Comedy, Drama', '2014–2018', 'Three years after the zombie virus has gutted the country, a team of everyday heroes must transport the only known survivor of the plague from New York to California, where the last functioning viral lab waits for his blood.', 'z-nation', '1^X6zxApQLSaWV&qR6eRDcOz8gk&LsSWUcSp4TX1&ycI8opUBDCvl&gejfpP0OGxfa&GKvvELVlx3zG&21kVYXdZ02zK&2514uAIFy6Uw&rrruzDeGNmeN&HBanyeeCuaHD&xNSwMh7luEK5&zKGdnXpFLB4O&W37tBNJj78np^w2spyup34ru4&oi2m6naxrv4y&xwcsdku9lcya&18ifbjwivcwx&jerxp5dzar6c&pzgjx0nj02rr&qz7syyw3jbe5&24kl8hjgibzm&ilg8rk37gjb5&g4twftprm9f3&nxh84yl227yz&pi0lp2jzclwv&p3whgki6hpb4', '', '', '', ''),
(17, 'Sex Education', 'https://i.postimg.cc/02SBQNJX/sex-education.webp', 'Comedy, Drama', '2019-', 'A teenage virgin who lives with his sex therapist mother teams up with a smart and edgy high school classmate to start their own health clinic.', 'sex-education', '3^LWQ8WU6UBqx9&fizU8pVpkMG0&jinYKeddkYxH&FCcamnAQDZdu&L5rg5NPtRaEh&V91mnssY324z&xZ1O0MlfvhLK&m2JJmQJUJgux^lsr4jpc19lm9&xs4zmbkfz957&scq9v9gwny4n&az4j55huucmw&om5yoe7x3xev&vpkwi0ezoymv&mjakza5at7pu&p4sg8vlbgric', '3^xL59jndG7WFi&EL4daxingAc4&UjSPkFqgyuSL&kG87OOUt6AVx&EfGKT5Scrb4O&dZ5rPgcPN5cU&hDzP8XZYTJ6p&olqujEUvMASM^xyqtwief5h7t&mi8nlw7khkbn&1rcizhai520x&bo4j6cl06zw3&zybicz2ql8c1&1kuutx3fga7j&rt1hc243mbxm&muvbgif3h3zo', '3^UTt1ybmJG3K3&55GYAKmz1Z9u&Q8P9KETkxg90&IwXoHjYYkTll&zJvyqjHTfQ0B&1oMMcTUYC93b&DxgW4kmaKj14&mUS3PkGS0jhq^tyii5vtfh4z3&t5h3t046tdd8&gy9nwyjxkem1&65shk4w93hk2&674k2s2fhx87&ltuq9phtmrii&ihzg0vhi3wpb&qjp64lkhqcjd', '', ''),
(16, 'The Good Doctor', 'https://i.postimg.cc/cJWGBGpv/the-good-doctor.webp', 'Drama', '2017-', 'Shaun Murphy, a young surgeon with autism and savant syndrome, relocates from a quiet country life to join a prestigious hospital surgical unit. Alone in the world and unable to personally connect with those around him, Shaun uses his extraordinary medical gifts to save lives and challenge the skepticism of his colleagues.', 'the-good-doctor', '2^fvncv2IemYrX&TPRFKixyaR03&2zc3x2BZiJOa&SzdSXJAHPgP8&YWEDL0DQJbrF&zRMIygaYtBB4&WcEutyN2ZMAO&BoI6KsGKfWLl&DTJgoxmb5Fun&N1dqv24cwOG4&N2vabKoFPEhP&9L9aYqx4SaYy&CeIF3Co0CtbX&btmesm8njumm&Z6r4R2aMktWE&B5lHzRRAKQYU&6yyt4NlTtJcU&SNqPKc7SAmce^sqkei4eks46a&kcnmr7f0gode&gaup8d5omzvn&28nme5vjjyvx&pbgnxgf7rqur&g5hmztul6fc2&u52os89mgyp1&hrr8h7z2k46y&x4ikeejewo0w&6v2kbcf53o6x&vpuirkpwlulg&vwu2ljggddnb&9jxb81dxrcxz&rby9j5sfrzyv&jbpgsho19b6x&7g4ql91qift7&hwm27d03r79g&1ecr1tpwruqk', '2^MSP107n1I3u0&iNJjWaW47hUx&ceIeKGUXypYU&NCAWhoLvSZtu&PLyGUXINxUV7&lCCJAvmohn7w&aApfLw29RS1x&m2cqzkoY6E6V&9vgJQ3e9Qa0q&DW3rwJgEqfVt&uOwHXcyjZ1FZ&zyt5RAy8640B&JUZbk4JsNSTh&ZE65CNgNFGQH&JYnnufpoghpe&86go6W9PjZ3S&74TpjCuwg4ag&Wyzso5cJPSY7^ztpme9w0pha8&zyp7gsxo2qzf&29f785vog8ao&i8g6vohjgy7d&mti551r6war3&1bnu016i8c9j&esv2oo0c8lde&m7j98ctz9lfl&uclk9g9shxxd&sglyaf70h09b&vsyh2ovyqkxw&x88v15o48hsh&fed921sbl64q&mvw65qwao57m&y3flgpxytw49&fxt0j7ecd9zs&av87ct9es24g&ipkgpp96mpzz', '', '', ''),
(15, 'Lucifer', 'https://i.postimg.cc/V6NqBFtt/lucifer.webp', 'Crime, Drama, Fantasy', '2016–2021', 'Lucifer, bored from his sulking life in hell comes to live in Los Angeles only to help humanity with its miseries through his experience and telepathic abilities to bring people\'s deepest desires and thoughts out of them.', 'lucifer', '5^jXj2QudYsxVY&HrXoxWfJawtO&hbPf6t45SxJW&9sg9On28fW2z&2oJUlkmhHmrZ&OwEm6PptLc97&2Ma7dWVrhagq&rzgZxUqWGtZ3&oPYT0xsnK2RR&FgiE47GfYQuP&tsqFdqk7pC70&Mprw5KQMNdFV&n6vvoGYGuTT4^z3d5dlukmg48&6czky1q1y1xm&hyoxjokbnbwl&f6b39sids029&t8qqwo6u8mil&67xmnc65tr56&rgm8m55zvuor&rcx6pkespxjt&0v68dd4trb03&cilgj7qan0l7&4i6gr1voesu1&g8waef92jr9n&f9lvsj0n9l4a', '5^q8sdiwPbd0c4&0AlRYIYK10Pn&9wMJNsMIZvxN&zg71efj50RiC&Unt4XVJzJuks&EfdihQcMpF0B&8AelXIKueVhy&vFPnAZO4u3gF&dirEnNTL70TE&mbzk5TWYnxnV&dyKG748vjI2X&oPRtZJLoMHZ5&cKIBfeqHg629&i9TYYI4BhxLc&3tUceMGTFUwp&AlbeUYz2L3Nt&uvlIk2yKmBRU&m09Nljlt5Lh6^x9sl07v2f104&yedkcfwqssw2&mpg9djlhly7f&zutb3ud99p1s&693h65n85sgb&0h7yqc24k0jy&z9gkw79lwp4r&cxxwlc6h6ttx&9b4ao728w881&976k4ovcpigt&p82rtnsp1mbj&q9nmt1paykur&k1qzq0fmc0ky&bw3k3zszeb1g&ge9gdid5c865&hiwpb0b1ck2h&z71cwei1272z&9qmdz0f0dr4p', '5^yGCvEdBWuC77&QSAa9bFgX1HY&Ew2GR7icT1jM&ZcN7OG4i0zRo&biC1o0qrWocn&XqlXHwbQrdeX&90cFE94Qrm8U&4oVQKvC7kvyd&lIBviaf45W2u&ezprVjdp4tQ0&FzoRXCioaLaZ&Lfc3Kxr0svqp&LHxuEDbKyJMY&kfwTaObpa8Ns&qzsa4TH9ZGCY&XyfZI2krebnM&fWpXsVyhUada&Fu8UT0tCsQ3y&tm4oGESaFyzK&hENSVknfwYUD&sruW2ZxF7B4z&b622f01DOog2&G5afpVOVW9gv&nzewABfcrz54&VteBKhFUjfjc&hi6pzQ3iOey0^0j6ls7xxack6&n8zg799c96w5&19hackgsie9b&vjpepocdrn7q&qpz7m7m8hh78&1wdx9zgy5slo&s8upgj5agd7t&kzmlmrtxydcu&rui6hdrzb0kg&eyiepq4lfqqc&shf9yo3orgvm&donf5w6rjrb2&s4igd1kq9pre&g3s7n05rengb&wf4utkmtxuc3&ck9bdrbmi2ru&8ifsor77extz&e5febbq1i37r&rhkmsokpus5j&6tcsvg15ov12&vj1ksjp59kh7&b96wsdyghwll&n92m38s2xrug&yjphue00gr9p&li93un733147&275tgu2atwcx', '5^tACL9DQQmrB3&tsAppu19OtaB&279rQLwAdCyx&gXT3uZT61Riy&z19049kDWbOa&81r53TtcHLFq&xuVrBjD0NMHp&zKrNfKW6F69C&OQy7A5hTAyQo&HUPWQSMu81dz^fq0w4lpv9atx&mqvkhdyzz5fg&hvjxu680lukc&ivo1fm4b5wo8&9amicngnn4ns&zzs2zo3n7wxj&jwtd1ekn6u45&l80aum552f1m&k5jm5r886uya&qv05z7pub4kg', '5^jJJsmp21RyHe&e0KyTooiBBPk&mKgfenAtJ2EF&aTCKy0cAs8IH&qtKpOuO8EGZ1&pBNy032WZCjC&vI8oEwbgJ8Ja&UdhklXsQnmTT&Qkwy0Vlp3YLA&VkDcpr3Z7uWH&xicOvIZzkF2j&ZnYClz8dSXNk&7VraEwELLGOu&Dcl8e480A7AR&N0FNljcwkNPO&ZLhnhPo6rxev^8nstca9bn6xn&4p7esopvo490&okdeb275lnwb&aw4f8slbn8ct&0x3lp4kebr9b&e2ve56qs7f0p&ep2tok9yr98o&hkyo86y6alpc&zklxv7v04ldo&6wv6z4757nw4&soss6d501rvm&1kvdx6qzxvpq&l5l0dohkexc5&cwjcgqh5yt3j&mkm6wsb85304&kqkmnlqc03ct'),
(14, 'What If...?', 'https://i.postimg.cc/hvH2Bhxd/marvel-what-if.webp', '2021-08-11', 'Animation, Adventure', 'Exploring pivotal moments from the Marvel Cinematic Universe and turning them on their head, leading the audience into uncharted territory.', 'marvel-what-if', '1^SMzARfNPPe3i&PFp4Q9a5sl5h&ILbv9AVQ7FIb&K3TxDQRPQhGE&VOoFEsM8vITT&M2n6MaHjW9Gz&BeKCZzzaJ62B&SO8wYS3VTsLb&i4zAsvlxcvnL^hdwfmgtgnz64&b6j4li6a8op5&jxxsm98jp9wx&op94p5fiqrvv&kpjh4y8osa3f&q1c4lenorjnu&3mq3qnb6quy1&4z70ulyg9hjw&96sh7arvy62d', '', '', '', ''),
(13, 'Girl From Nowhere', 'https://i.postimg.cc/hGv0q2bM/girl-from-nowhere.webp', 'Crime, Fantasy, Mystery', '2018–', 'A mysterious, clever girl named Nanno transfers to different schools, exposing the lies and misdeeds of the students and faculty at every turn.', 'girl-from-nowhere', '2^uZTj2jnbCOsF&0S1xNZURD1am&UUkpZhzk7x9W&r9uJiHiAH8jS&7CAIPUcebrr8&AHs3B7ugE5VV&36TcverGHyEQ&T2IOc2oEgxYH&UiffefEmyI2s&TTEMcLXYcjTU&IfCQ3b23ZTOl&1bZuyHV15AcT&xE6gYSgLW5pS^zzaqgykvjjhx&gdyc0ria1x72&pbw5add5fhca&lnweaasjpje0&kaokb5oc65e3&l1pwb2ezha98&14x220gv8ubu&h1da97emh796&0amwu880zapb&djr5lclaq9wu&n6ycnw0sqjx1&h74ypbfhu4lr&fd9by6r82vup', '2^cPW2tSgGQKyL&YVxEm2Babine&XhMMVJ9tQ1h1&ivM4kX9D2kAy&7AkTZnh1wH62&FJpsdFLNlkit&9tqQdENpQ2Hq&B62A3uJS2huC^1obfj34ts6zf&qu04iigtwa0b&9ei7b8cxk88y&exkoirezhlur&rhqz40q2nodz&lm6k6wjryp22&howuxlnj70n1&z0ufpwh8rg04', '', '', ''),
(12, 'Loki', 'https://i.postimg.cc/JnNRBpfr/loki.webp', 'Action, Adventure, Fantasy, Sci-Fi', '2021–', 'A new Marvel chapter with Loki at its center.', 'loki', '1^Kyiyxoij9YBZ&Ryv0k4Ftn0Cp&YA0LebplBGZa&aiyaI1fk32vT&73ALfUYgifMw&HzOUfKa8vkyY^7q0bix8edrp5&c7r1h9izw06v&oawwbnv1fcwc&4u4ud9wxolu2&2ifackz2d48q&8ftawrd066hi', '', '', '', ''),
(11, 'Rick and Morty', 'https://i.postimg.cc/6qh6FMcj/rick-and-morty.webp', 'Adventure, Animation, Comedy', '2013–', 'An animated series on adult-swim about the infinite adventures of Rick, a genius alcoholic and careless scientist, with his grandson Morty, a 14 year-old anxious boy who is not so smart, but always tries to lead his grandfather with his own morale compass.', 'rick-and-morty', '1^jj4GAx2NnkGa&7HHAxz5SMYNO&F6Lw9ajrKl8K&xw7HqmOF28Sv&wr2e42jHsV3r&a6g64Kgn6lwD&jjcvKLtzH1nd&kSQsAZYq1gZ5&REF6Hbhr2BNH&q4fhg87I8uOM&9tBhAbRtfVO1^q2ousjwlppem&wmg0aajjao8t&7sbm5sn460wy&gnjr00m3ibx3&nu4g74xpor6b&9thgnfewfsry&glsrdfb5d24o&xmotnrelpikh&m61yffxfycn7&9eqsubx6i42m&9oatjpklzz87', '', '', '', ''),
(10, 'WandaVision', 'https://i.postimg.cc/BQrqbqzC/wanda-vision.webp', 'Action, Adventure, Comedy, Drama, Fantasy, Sci-Fi', '2021', 'Blends the style of classic sitcoms with the MCU in which Wanda Maximoff and Vision -two super-powered beings living their ideal suburban lives-begin to suspect that everything is not as it seems.', 'wanda-vision', '1^wdFLFDRXxNIE&iQcvgsy1fj6f&2yOfFFyRg8N0&iwa8cnh8NGxN&vutY7Te4ypkB&zYIPg4yGKZVi&gXcHZoOaWRnp&ArvLiEI6QMXW&nch6zppTdLQ0^ooaxy27fbuko&56xvc9qh2dpw&qlu480nzgce8&uookp8cq17ul&qgnbmy3pvzsb&f2k0g63b5ell&x93sfmsdrz6r&0k8ep826v9up&9ncu9nng95y1', '', '', '', ''),
(9, 'Money Heist', 'https://i.postimg.cc/MpF35sG5/money-heist.webp', 'Action, Crime, Mystery, Thriller', '2017–2021', 'A group of unique robbers assault the Factory of Moneda and Timbre to carry out the most perfect robbery in the history of Spain and take home 2.4 billion euros.', 'money-heist', '5^Zv2VJn1XsfgN&vKc72mjpACGG&rDb8jn467R7U&R1yXbmejzZI4&j8mlBH9dcWNW&syvGn6eyp1cP&40GKBCCQRIRa&m9dcgirkyS3I&U7vUEJMpiigl&8GzGvsxKGwAg&JSpIjzkCt5iC&wWfwDuv6rqHK&aXl7kFj2qd3Q^2i4tgf7fp4jp&6p6zty36kwm6&l0oc1b1ev6pp&p0spx0ciwzvc&7qxefqkoymeo&3h7wj3xl38d2&kgsqzwy3e388&6o6kz6k3jxis&jixmys492r56&v36irkt1wvpq&dy9m1sutd3n8&wyrug09f10u9&my1blxzdyb9m', '5^HpTomAUioRp6&rOxQruXAwUpb&5T8RQos4K9W3&qY3NpOnqcNz8&feFT3yTd6zns&tgYwfmmFdRa9&JuLwOivGUgS7&py7WX3figSwa&rFYd9vnYS1WE^u6hflw8pfp47&jfe8rbuqprbi&ti744d1im1tz&1zq1odrixluq&oj5mc55x3089&0i8rewx5rgu9&ewsbqttnefxm&3m8pnc9zr1it&u5kofm3lpb6h', '5^R07NJr7HpKHq&Xaz9xUeg49Xa&G9YXRaq9cdZb&ZE2xBwEXWM45&vYycTIsvXGnh&5DnECnlxE8aI&tSSlMUFa9PoX&JxDOIILHipn0^p2s116op9ngm&7u8mtlx4u02y&lpic97p9n3qk&zptv3d2kew3v&06cgngb5pj2d&9x3p8e49ri7a&1wtk5rl5a8g6&z6yxd1zp94hx', '5^wbrUrh7LchbX&xXBHsfLXqcrS&6wyDcvq0yxg8&w2JJaOW75QUL&6gzbs6bzLO5u&zjprA6Y4l9DT&XHkGmyET03L7&ceh791i7Yxvf^k5s3fokqgaga&z4myz3rlbcsw&v3q14sm7h1gb&b9glsrj72v4k&cc3ey9zqgm8y&142dl2iuo3sf&iuq3bngic8ax&tod62xyhbd1b', '5^YJzwDC6kuWlO&q6YElt1O5xEU&wMI19wc60PlC&6oqscHco3VRv&RYPypyMzor0q&WoBO4fiSY6BU&PZLkIFnlt4kC&HVGAH25DIQ4E&DDV8xwp1JVas&8yFWVNqAxsi6^yegz0utt6nq4&jv9y8vq55oa4&o5pxa3bfi90y&ssxt15xqgh4d&2hsmmmvwichw&mi7legy4vnf0&25s0ye1w70fl&f4mc2sdfula1&k5yxt0s19mjs&wxanofymr6w5'),
(8, 'The Falcon and the Winter Soldier', 'https://i.postimg.cc/3rjwywhX/falcon-and-the-winter-soldier.webp', 'Action, Adventure, Drama, Sci-Fi', '2021', 'Following the events of \'Avengers: Endgame,\' Sam Wilson/Falcon and Bucky Barnes/Winter Soldier team up in a global adventure that tests their abilities -- and their patience.', 'falcon-and-the-winter-soldier', '1^HAsySkiEI6id&XNsPTDcG9Mfx&TeRqind5CXqN&g8CKPDWOj7HW&lERJ4YbRaExM&26iw2Xf9Z6KF^0esfacsy8p98&6o60sheh56xq&avelziuviuos&7lzxduqq1ssu&0wpb5juard45&vxhvti0w8s2p', '', '', '', ''),
(7, 'Sex Life', 'https://i.postimg.cc/VvwL7xq0/sex-life.webp', 'Comedy, Drama, Romance', '2021–', 'A suburban mother of two takes a fantasy-charged trip down memory lane that sets her very married present on a collision course with her wild-child past.', 'sex-life', '1^hLAlNpkgdD5m&StXFuaVkyOZE&MckvxXLQUI9h&Rt4uvJ6p7auo&zqvojgQjZhPL&uwJrp5FFl6y7&xoF8Pq5LcJKg&WRUjD4aGjEWv^4meht2ob8fqj&015b0xy7grrr&vige1etv2q48&nugnp2ueft5e&zulrghfbo9qy&gw18p8eo75sv&4ozyo8l49mjp&x74uqid5ravf', '', '', '', ''),
(6, 'Trese', 'https://i.postimg.cc/yYV80z6w/trese.webp', 'Action, Adventure, Animation, Crime, Fantasy, Horror, Mystery, Sci-Fi, Thriller', '2021–', 'Set in Manila where the mythical creatures of Philippine folklore live in hiding amongst humans, Alexandra Trese finds herself going head to head with a criminal underworld comprised of malevolent supernatural beings.', 'trese', '1^dLuZa6ZSNbLS&o8tt7jitkicX&wLp0bESuxF30&0IOGzXxq0Ing&o247T5rYfdDB&n2njCbdEmn2r^m7k8zelg442p&3iwi1g1s4ewf&6xo7p8i8vd0w&ir0ykzlmwur4&j4qx48zywr4p&cgpezmr75254', '', '', '', ''),
(5, 'Legacies', 'https://i.postimg.cc/vm6YGYX6/legacies.webp', 'Adventure, Drama, Fantasy, Horror, Mystery', '2018–', '\'Legacies\' is a 2018 spin-off of \'The Vampire Diaries\' and \'The Originals\'. Hope Mikaelson, the daughter of a werewolf, vampire and granddaughter of a witch attends the Salvatore School in Mystic Falls, while dealing with everyday teen life and controlling the power of living as the only tribrid in existence.', 'legacies', '1^53NRvEm7lr19&mlxMwlrkyiMu&dlZFCrwFMfPL&D3XPQepgQGNz&NLvbFKML49tr&IlGlCJgwIRJA&59w9H4ULWhei&hNiVmr0uska2&HUOGjDot3Xgr&cqPCeWiHoU2E&yZqQyEWYRhXA&8DCqG29ytzKS&wU03wSMM5veG&lY0g0Dp96EgS&lSGjwGiw5UKz&xwXGbjmdUHy1^9encihlbzwrl&0pvyuf74b2jf&zip5tbsurdjv&8ibabmarvmtp&57mowxeqxhpy&177vu02hzroy&eaz9kw3jjacy&ost65dsemrl9&7pipc68rb4z1&uv5i9hq92b50&7r51rd2biw7a&69nug47t0xuj&nfra8v1uh4rm&ctrysddbsjc7&t3a2q611byub&2x9xz73qlykt', '', '', '', ''),
(4, 'Elite', 'https://i.postimg.cc/gkNkDBnr/elite.webp', 'Crime, Drama, Thriller', '2018–', 'Las Encinas is the most exclusive school in the country- where the Elite sends their children to study. In there, three working-class teens have just been admitted after an earthquake destroyed their school. ', 'elite', '1^7JMWwambg9RD&lq9hV5WuhCId&vvwSwkim6hEq&ZMwTKtf0ppca&g8QcWIzYB4dR&ZKcvPPv56dnJ&pkjpD4BnlMHn&I6cTbWgTMC4q^ufz0o2zbmfk6&xcwsj40hmfte&8oqi7ezvsaia&pizpeo3r8nwr&mwhqwum20648&imzea0smhg6e&a5srdvijx56x&t4a86m5soqa1', '', '', '', ''),
(3, 'Stranger Things', 'https://i.postimg.cc/4xy4Fb9P/stranger-things.webp', 'Drama, Fantasy, Horror', '2016–', 'In a small town where everyone knows everyone, a peculiar incident starts a chain of events that leads to the disappearance of a child - which begins to tear at the fabric of an otherwise peaceful community.', 'stranger-things', '1^gJBHlNHrSGKJ&4rroypVZ1kzH&JH9rQPoVXzaO&Pwo4vbEv5Qfb&m8wtRGQ3eLS6&V3dJ7BcX2bho&rUD1XqWx9vyM&co2ptmy2FrEA^b0se0q1szhqg&9dek1cypvvdw&xzjzh96d0acm&cmnccozw92oh&rpdkzk0mu7x9&s0q5g2io25ej&l061y7x3o65p&dlbofrtmg0h8', '', '', '', ''),
(2, 'Dota: Dragon\'s Blood', 'https://i.postimg.cc/15nmygvt/dota-dragons-blood.webp', 'Action, Adventure, Animation, Fantasy', '2021–', 'After encounters with a dragon and a princess on her own mission, a Dragon Knight becomes embroiled in events larger than he could have ever imagined.', 'dota-dragons-blood', '1^ZdFj2jaD5yrb&GLIX9Etj4jbW&40cbspeJNgzY&ss65jdDKjVsH&bERP6kxVbxzk&sRltf6woYMn5&JLn9X8nZ4siz&2imYaVsOelxh^0vlq95t04pnm&ggj1jfq1tixg&babuum56odvg&iobpzqno801i&iw39boyrjvch&av6mtx3u6wyf&31jm8q7kwk7j&ioz0rencscvz', '', '', '', ''),
(1, 'Invincible', 'https://i.postimg.cc/0y79JTR1/invincible.webp', 'Action, Adventure, Animation, Drama, Fantasy', '2021–', 'An adult animated series based on the Skybound/Image comic about a teenager whose father is the most powerful superhero on the planet.', 'invincible', '1^N86vJJXEhTxu&5WOBJLxolGWA&APDzSoYzYl97&1GkFqV1NL5eD&wSvszTyotDTY&5Q84KlCc5m42&GzjVcaThNuM2&jaabidzUb6Sq^1s3sz3cm6ix2&thrxo27f848a&o3aey5wpi6xv&35bi9e5g4v7z&xr0gtulcsydf&38raqlx274u3&0nxs7mvm8b74&p4cmhgvk9cru', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tv-list`
--
ALTER TABLE `tv-list`
  ADD PRIMARY KEY (`tvID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tv-list`
--
ALTER TABLE `tv-list`
  MODIFY `tvID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
